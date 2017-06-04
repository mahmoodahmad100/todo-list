<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;
use App\User;

class UserController extends Controller
{
    public function getSign_up_in()
    {
    	if(Auth::user())
    		return redirect()->route('items');
    	return view('sign');
    }

	public function postLogin(Request $request)
	{
		$this->validate($request,[
				'email' => 'required|email',
				'password'=> 'required'
			]);

		if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']]))
			return redirect()->route('items');
		else{
			Session::flash('error_msg','the email or the password is wrong');	
			return redirect()->back();
		}
	}

	public function postRegister(Request $request)
	{
		$this->validate($request,[
				'email' => 'required|email|unique:users',
				'password'=> 'required'
			]);

		$user = new User();
		$user->email    = $request['email'];
		$user->password = bcrypt($request['password']);
		$user->registered_at = date("Y-m-d h:i:s");
		$user->save();
		Auth::login($user);

		Session::flash('success_msg','<strong>Well done!</strong> you registered successfully!');
		return redirect()->route('items');
	}

	public function getLogout()
	{
		Auth::logout();
		Session::flash('success_msg','We hope we can see you soon again!');
		return redirect()->route('home');
	}
}
