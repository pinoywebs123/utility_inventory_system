<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

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
    		
            if(Auth::user()->role_id == 1){
                return redirect()->route('staff');
            }else{
                return redirect()->route('user_main');
            }
    	}else{
    		return redirect()->back()->with('error', 'Invalid Username/Password Combination');
    	}

    }

    public function register(){
        return view('auth.register');
    }

    public function register_check(Request $request){
        $this->validate($request, [
            'username'=> 'required',
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'contact' => 'required|max:15',
            'password'=> 'required',
            'repeat_password' => 'required|same:password',
        ]);

        $user = new User;
        $user->fname = $request['first_name'];
        $user->mname = $request['middle_name'];
        $user->lname = $request['last_name'];
        $user->contact = $request['contact'];
        $user->username = $request['username'];
        $user->role_id = 2;
        $user->password = bcrypt($request['password']);
        $user->save();

        return redirect()->back()->with('ok', 'You have registered successfully!');
        
    }
}
