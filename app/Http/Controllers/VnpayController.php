<?php

namespace App\Http\Controllers;

use App\Models\vnpay;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\HistoryOrders;
use App\Models\Currentcar;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Mail;
use App\Mail\MailNotify;
use App\Mail\ThankMailNotify;

class VnpayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check())
        {
            $total=0;
            $vnpay = vnpay::all();
            foreach ($vnpay as $data){ 
                $total += (int)$data->vnp_Amount;
            }
            return view('analytics')->with('vnpay', $vnpay)->with('total', $total);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vnpay = new vnpay;
        $vnpay->id = $request->vnp_TransactionNo;
        $vnpay->id_user = Auth::user()->id;
        $vnpay->id_product = $request->vnp_OrderInfo;
        $vnpay->vnp_Amount = $request->vnp_Amount;
        $vnpay->vnp_BankCode = $request->vnp_BankCode;
        $vnpay->vnp_OrderInfo = $request->vnp_BankTranNo;
        $vnpay->vnp_TransactionStatus = $request->vnp_TransactionStatus;
        $vnpay->save();

        if($request->vnp_TransactionStatus=="success"){
            $car = new Currentcar;
            $car->idproduct = $request->vnp_OrderInfo;
            $car->iduser = Auth::user()->id;
            $product = DB::table('cars')->where('id', $request->vnp_OrderInfo);
            $product->increment('inOrder');
            $product->decrement('quantity');
            if((float)$product->first()->quantity < 0.0){
                return redirect()->route('dashboard');
            }
            $car->save();
            $HistoryOrders = new HistoryOrders;
            $HistoryOrders->iduser = Auth::user()->id;
            $HistoryOrders->idproduct=$request->vnp_OrderInfo;
            $HistoryOrders->Amount=$request->vnp_Amount;
            $HistoryOrders->OrderStatus= "running" ;
            $HistoryOrders->save();

            $email = $request->email;
            Mail::to(Auth::user()->email)->send(new ThankMailNotify());
        } 
          return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\vnpay  $vnpay
     * @return \Illuminate\Http\Response
     */
    public function show(vnpay $vnpay)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\vnpay  $vnpay
     * @return \Illuminate\Http\Response
     */
    public function edit(vnpay $vnpay)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\vnpay  $vnpay
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vnpay $vnpay)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\vnpay  $vnpay
     * @return \Illuminate\Http\Response
     */
    public function destroy(vnpay $vnpay)
    {
        //
    }

    function searchPay(Request $request)
    {
        $output = "";
        $vnpay = vnpay::where('id','like','%'.$request->data.'%')->get();

        foreach($vnpay as $row){
            $output.='
                <tr>
                <td>'.$row->id.'</td>
                <td>'.$row->id_user.'</td>
                <td>'.$row->id_product.'</td>
                <td>'.$row->vnp_Amount.'$</td>
                <td>'.$row->vnp_BankCode.'</td>
                <td>'.$row->vnp_OrderInfo.'</td>
                <td>'.$row->vnp_TransactionStatus.'</td>
                <td>'.$row->created_at.'</td>
                </tr>
            ';
        }

        return response($output);
    }
}
