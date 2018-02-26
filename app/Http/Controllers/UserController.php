<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class UserController extends Controller
{
	public function __construct(){
		$this->middleware('usercheck');
	}
    
    public function user_main(){
    	return view('users.main');
    }

    public function user_consume(){
    	return view('users.consume');
    }

    public function user_mr(){
    	return view('users.mr');
    }

    public function user_logout(){
    	Auth::logout();
    	return redirect()->route('index');
    } 
}
