<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\cars;
use App\Models\User;
use App\Models\comment;
use App\Models\Replycomment;
use App\Models\Infors;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SampleController extends Controller
{
    function index(){
        return view('login/login');
    }

    function insertProduct(){
        if(Auth::check())
        {
            if(DB::table('carts')->where('iduser', Auth::user()->id)->get()==null){
                return view('action/insertProduct');
            }else{
                $carts = DB::table('carts')->where('iduser', Auth::user()->id)->get();
                return view('action/insertProduct',  ["carts" => $carts]);
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
            $comment = DB::table('comments')->get();
            $commentuser = DB::table('users')->get();
            $currentcars = DB::table('currentcars')->where('iduser', Auth::user()->id);
            $user = Auth::user();
            return view('dashboard', compact("comment"), compact("commentuser"))->with('user', $user)->with('currentcars', $currentcars);
        }
        return view('login/login');
    }

    function analytics(){
        if(Auth::check())
        {
            $user = DB::table('users')->where('email', Auth::user()->email)->first();
            return view('analytics', compact("user"));
        }
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
            return redirect()->route('dashboard');
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

}
