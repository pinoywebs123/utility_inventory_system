<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function main(){
    	return view('auth.login');
    }
    public function login(Request $request){
    	$this->validate($request, [
    		'username'=> 'required|max:12',
    		'password'=> 'required|min:6|max:12'
    	]);

    	if(Auth::attempt(['username'=> $request['username'], 'password'=> $request['password']])){
    		return redirect()->route('staff');
    	}else{
    		return redirect()->back()->with('error', 'Invalid Username/Password Combination');
    	}

    }
}
