<?php

class UserController extends BaseController {

	public function settings()
	{
		$user = User::where('id', Auth::id())->first();

		dd($user->username);

		return View::make('users.settings');
	}

	public function create(){
		$input = Input::all();

		$user = new User;
		$user->username= $input['username'];
		$user->password = Hash::make('password');
		$user->save();

		$email = $user->username;


		$data = array('email' => $email);

		Mail::send('emails.new-user', $data, function($message) use ($email)
    {
      $message->from('noreply@locator.togllc.com', ' TOG Dealer Locator');
      $message->to('jfefes@togllc.com')->subject('Dealer locator account created');
    });

		return Redirect::back();
	}

	public function getUser($username){
		$user =  User::where('username', $username)->first();

		return View::make('users.set-password', array('user'=>$user));
	}

	public function setpassword(){
		$input = Input::all();

		$user = User::where('username', $input['username'])->first();

		if($input['password']==$input['passwordconfirm']){
			$user->password = Hash::make($input['password']);
			$user->save();
			Session::flash('success', true);

			return Redirect::back();
		}
		else{
			Session::flash('error', true);
			return Redirect::back();
		}
	}

}
