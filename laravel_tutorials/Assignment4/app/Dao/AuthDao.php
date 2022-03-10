<?php

namespace App\Dao;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Contracts\Dao\AuthDaoInterface;

class AuthDao implements AuthDaoInterface
{
  public function loginUser($request)
  {
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
      return redirect("dashboard")->withSuccess('You have Successfully loggedin');
    }else{
      return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }
  }

  public function registerUser($request)
  {
    User::create([
      'name' => $request['name'],
      'email' => $request['email'],
      'password' => Hash::make($request['password'])
    ]);
  
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
        return redirect("login")->withSuccess('Great! You have Successfully loggedin');
    }
  }
}