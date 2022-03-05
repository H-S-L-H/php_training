<?php

namespace App\Dao;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Contracts\Dao\AuthDaoInterface;

class AuthDao implements AuthDaoInterface
{
  public function registerUser($request)
  {
    User::create([
      'name' => $request['name'],
      'email' => $request['email'],
      'password' => Hash::make($request['password'])
    ]);
  
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
        return redirect("login")
            ->withSuccess('Great! You have Successfully loggedin');
    }
  }
}