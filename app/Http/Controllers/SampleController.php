<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\cars;
use App\Models\User;
use App\Models\comment;
use App\Models\Replycomment;
use App\Models\vnpay;
use App\Models\Infors;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class SampleController extends Controller
{
    function index(){
        return view('login/login');
    }

    function insertProduct(){
        if(Auth::check())
        {
            $car = null;
            if(DB::table('carts')->where('iduser', Auth::user()->id)->get()==null){
                return view('action/insertProduct')->with('data',$car);
            }else{
                $carts = DB::table('carts')->where('iduser', Auth::user()->id)->get();
                return view('action/insertProduct',  ["carts" => $carts])->with('data',$car);
            }
            
        }
    }

    function login(){
        return view('login/login');
    }

    function registration(){
        return view('login/registration');
    }


    function comment(){
        if(Auth::check())
        {
            $comment = DB::table('comments')->get();
            $user = DB::table('users')->get();
            $replycomment = DB::table('replycomments')->get();
            return view('action/commentpage', compact("comment"), compact("user"))->with('replycomment', $replycomment);
        }
    }

    function profile(){
        if(Auth::check())
        {   
            $user = DB::table('users')->where('email', Auth::user()->email)->first();
            $profile = DB::table('infors')->where('iduser', Auth::user()->email)->first();
            return view('profile', compact("profile"), compact("user"));
        }
        return view('login/login');
    }

    function dashboard(){
        if(Auth::check())
        {
            $total=0;
            $totalnewUser=0;
            $comment = DB::table('comments')->get();
            $commentuser = DB::table('users')->get();
            $currentcars = DB::table('currentcars')->where('iduser', Auth::user()->id);
            $currentcarData = DB::table('currentcars')->where('iduser', Auth::user()->id)->first();
            $user = Auth::user();
           
            return view('dashboard', compact("comment"), compact("commentuser"))->with('user', $user)->with('currentcars', $currentcars)->with('currentcarData', $currentcarData);
        }
        return view('login/login');
    }

    function dashboardAdmin(){
        if(Auth::check())
        {
            $total=0;
            $totalnewUser=0;
            $TotalIncome=0;
            $comment = DB::table('comments')->get();
            $commentuser = DB::table('users')->get();
        
            $user = Auth::user();
            $topsellcar = DB::table('cars')->orderBy('inOrder', 'desc')->take(5)->get();
            $totalorder = DB::table('cars')->where('inOrder', '>', 0)->get();
            foreach ($totalorder as $data){ 
                $total += (int)$data->inOrder;
            }
            $mytime = Carbon::now();
            $newUser = User::where('email',$mytime)->get();
            $vnpay = vnpay::all();
            foreach ($newUser as $data){ 
                $totalnewUser ++;
            }
            foreach ($vnpay as $data){ 
                $TotalIncome += (int)$data->vnp_Amount;
            }
            return view('admin/dashboardAdmin', compact("comment"), compact("commentuser"))->with('TotalIncome', $TotalIncome)->with('user', $user)->with('topsellcar', $topsellcar)->with('totalorder', $total)->with('totalnewUser', $totalnewUser);
        }
        return view('login/login');
    }

    function validate_registration(Request $request){

        $data = $request->all();

        if(DB::table('users')->where('email', $data['email'])->count()==0){
            User::create([
                'name'=>$data['name'],
                'email'=>$data['email'],
                'password'=>Hash::make($data['password'])
            ]);
        }else{
            $user = User::where('email',$data['email'])->first();
            $user-> password = Hash::make($data['password']);
            $user-> save();
        }
       

        $userInfor = new Infors();
        $userInfor->iduser = $data['email'];
        $userInfor->save();

        return redirect('login')->with('success', 'You can login now');
    }

    function validate_login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials))
        {
            $user = Auth::user();
            if($user->access == 'admin'){
                return redirect()->route('dashboardAdmin');
            }else{
                return redirect()->route('dashboard');
            }
        }
        return view('login/login');
    }

    function sellcar()
    {
        if(Auth::check())
        {
            $user = Auth::user();
            return view('sellcar')->with('user', $user);
        }
        return view('login/login');
    }

    function logout(){
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }

    function details(){
        return view('detail');
    }

    function cardetail($id){
        $product = DB::table('cars')->where('id', $id)->first();
        return view('product/cardetail', compact("product"));
    }

    function managerUser(){
        if(Auth::check())
        {
            $users = User::where('access','!=', 'admin')->paginate(10);
            $infor = Infors::all();
            return view('admin/managerUser')->with('users', $users)->with('infor', $infor);
        }
        return view('login/login');
    }

    public function update(Request $request, $id){
        $member = User::find($id);
        $input = $request->all();
        $member->fill($input)->save();
 
        return redirect('managerUser');
    }
 
    public function delete($id)
    {
        $members = User::find($id);
        $userInfor = Infors::where('iduser',$members->email);
        $userInfor->delete();
        $members->delete();
        
        return redirect('managerUser');
    }

   public function confirmPay(){
    if(Auth::check())
    {
        return view('action/ConfirmPay');
    }
     return view('login/login');
   }

   function searchUser(Request $request)
    {
        $output = "";
        $user = User::where('id','like','%'.$request->data.'%')->orWhere('name','like','%'.$request->data.'%')->orWhere('email','like','%'.$request->data.'%')->get();
        $infor = Infors::all();
        foreach($user as $user){
            foreach($infor as $data){
                if($data->iduser == $user->email){
                    $output.='  
                    <tr>
                        <td>'.$user->id.'</td>
                        <td>'.$data->fname.' '.$data->lname.'</td>
                        <td>'.$user->email.'</td>
                        <td>'.$user->google_id.'</td>
                        <td>'.$user->created_at.'</td>
                        <td>
                            <div class="d-flex align-items-center gap-3 fs-6">
                            <a class="text-primary"  data-bs-placement="bottom" title="" data-bs-original-title="View detail" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                            <a class="text-warning" href="#edit'.$user->id.'" data-bs-toggle="modal" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                            <a class="text-danger" href="#delete'.$user->id.'" data-bs-toggle="modal" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                            '.@include('action/usermanager/action').'
                            </div>
                        </td>
                    </tr>
                    ';
                }
            }
        }

        return response($output);
    }

}
