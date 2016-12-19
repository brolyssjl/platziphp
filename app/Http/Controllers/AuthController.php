<?php

namespace PlatziPHP\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  public function index(){
    return view('auth.login');
  }

  public function store(Request $request){
    $this->validate($request, [
      'email' => 'required|email',
      'password' => 'required'
    ]);
    if(!Auth::attempt($request->only(['email', 'password']))){
      return redirect()->route('auth_show_path')->withErrors('No encontramos al usuario');
    } else {
      return redirect('/');
    }
  }

  public function destroy(){
    Auth::logout();

    return redirect()->route('auth_show_path');
  }
}
