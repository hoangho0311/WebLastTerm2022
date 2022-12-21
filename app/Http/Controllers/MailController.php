<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\MailNotify;

class MailController extends Controller
{
    public function index(Request $request){
        $email = $request->email;
        $product = $request->product;
        Mail::to($email)->send(new MailNotify($product));
        return redirect()->route('details')->with('success', 'Check Your Mail');
    }
}
