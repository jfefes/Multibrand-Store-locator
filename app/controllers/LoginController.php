<?php

class LoginController extends BaseController {

  protected $layout = 'layouts.base';

  public function index()
  {
    return View::make("login");
  }

  public function doLogin() {
    $input = Input::all();


    if (Auth::attempt(array('username' => $input['username'], 'password' => $input['password']), true)) {
      return Redirect::intended('/dashboard');
    } else {

      return View::make("login", array('error' => true));
    }
  }


  public function doLogout() {
    Auth::logout();
    return Redirect::intended('login');
  }

}
