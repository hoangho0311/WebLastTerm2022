<?php

namespace App\Http\Controllers;

use App\Models\Currentcar;
use App\Models\cars;
use App\Models\vnpay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CurrentcarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
    public function store(Request $request,$id)
    {
            if(DB::table('currentcars')->where('iduser', Auth::user()->id)->count()==0){
                
                error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
                date_default_timezone_set('Asia/Ho_Chi_Minh');
            
                $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
                $vnp_Returnurl = "http://127.0.0.1:8000/confirmPay";
                $vnp_TmnCode = "V6F8ZCVY";//Mã website tại VNPAY 
                $vnp_HashSecret = "IGJOVYWUNYKSYVOMXATJCXZVXXBIORVV"; //Chuỗi bí mật
            
                $vnp_TxnRef = random_int(100000, 999999); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
                $vnp_OrderInfo = $id;
                $vnp_OrderType = 'billpayment';
                $vnp_Amount = $request->price * 100;
                $vnp_Locale = 'vn';
                $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
                //Add Params of 2.0.1 Version
                // $vnp_ExpireDate = $_POST['txtexpire'];
                //Billing
                
                $inputData = array(
                    "vnp_Version" => "2.1.0",
                    "vnp_TmnCode" => $vnp_TmnCode,
                    "vnp_Amount" => $vnp_Amount,
                    "vnp_Command" => "pay",
                    "vnp_CreateDate" => date('YmdHis'),
                    "vnp_CurrCode" => "VND",
                    "vnp_IpAddr" => $vnp_IpAddr,
                    "vnp_Locale" => $vnp_Locale,
                    "vnp_OrderInfo" => $vnp_OrderInfo,
                    "vnp_OrderType" => $vnp_OrderType,
                    "vnp_ReturnUrl" => $vnp_Returnurl,
                    "vnp_TxnRef" => $vnp_TxnRef
                );
            
                if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                    $inputData['vnp_BankCode'] = $vnp_BankCode;
                }
                if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                    $inputData['vnp_Bill_State'] = $vnp_Bill_State;
                }
            
                //var_dump($inputData);
                ksort($inputData);
                    $query = "";
                    $i = 0;
                    $hashdata = "";
                foreach ($inputData as $key => $value) {
                    if ($i == 1) {
                        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                    } else {
                        $hashdata .= urlencode($key) . "=" . urlencode($value);
                        $i = 1;
                    }
                    $query .= urlencode($key) . "=" . urlencode($value) . '&';
                }
            
                $vnp_Url = $vnp_Url. "?" . $query;
                if (isset($vnp_HashSecret)) {
                    $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
                    $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash ;
                }


                $returnData = array('code' => '00'
                    , 'message' => 'success'
                    , 'data' => $vnp_Url);
                    if (isset($_POST['redirect'])) {
                        header('Location: ' . $vnp_Url);
                        die();
                    } else {
                        echo json_encode($returnData);
                    }
                }
            else{
                return redirect()->route('dashboard');
            }
            return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Currentcar  $currentcar
     * @return \Illuminate\Http\Response
     */
    public function show(Currentcar $currentcar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Currentcar  $currentcar
     * @return \Illuminate\Http\Response
     */
    public function edit(Currentcar $currentcar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Currentcar  $currentcar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Currentcar $currentcar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Currentcar  $currentcar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Currentcar = Currentcar::find($id);
        $cars = cars::where('id', $Currentcar->idproduct)->first();
        $cars->increment('quantity');
        $Currentcar->delete();
  
        return redirect()->route('dashboard');
    }
}
