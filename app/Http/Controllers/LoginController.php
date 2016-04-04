<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\createLoginRequest ;
// this is same as \App\Http\Requests\createLoginRequest it consider it as ur standing on route not inside namespace
use Auth;

class LoginController extends Controller
{
    //
    public function showLoginForm(){
    	 return view('login');
    }
    public function processLogin(createLoginRequest $req){
    	   // get credentials
            // $req is called dependecy injection
            $credential=$req->only("username","password");

            // ask authenticator
            if(Auth::attempt($credential)){
                return redirect("types/1");

            }
            else{
                return redirect("login")->with("message","Try again!");
                // with is for flashing message this message wll be their only for particular session
            }
    }
    public function logout(){
    	   //log you out
            Auth::logout();
            //redirect to login
            return redirect("login");
            // not restfull
    }
}
