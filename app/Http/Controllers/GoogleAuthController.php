<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Models\Infors;
use Illuminate\Support\Facades\Auth;

class GoogleAuthController extends Controller
{
    public function redirect(){
        return Socialite::driver('google')->redirect();
    }

    function callbackGoogle(){
        try {
            $google_user = Socialite::driver('google')->user();
            $user = User::Where('google_id', $google_user->getId())->first();

            if(!$user){
                
                    $new_user = User::create([
                        'name'=>$google_user->getName(),
                        'email'=>$google_user->getEmail(),
                        'google_id'=>$google_user->getId()
                    ]);


                    Auth::login($new_user);

                    $userInfor = new Infors();
                    $userInfor->iduser = $google_user->getEmail();
                    $userInfor->save();
                
                return redirect()->route('dashboard');
                
            }else{
                Auth::login($user);

                return redirect()->route('dashboard');
            }

            

        } catch (\Throwable $th) {
            dd("error");
        }
    }
}
