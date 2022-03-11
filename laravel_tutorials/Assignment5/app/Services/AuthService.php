<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Contracts\Dao\AuthDaoInterface;
use App\Contracts\Services\AuthServiceInterface;


class AuthService implements AuthServiceInterface
{

  private $authDao;

  public function __construct(AuthDaoInterface $authDao)
  {
    $this->authDao = $authDao;
  }

  public function loginUser($request){
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
      return redirect("dashboard")
                    ->withSuccess('You have Successfully loggedin');
    }else{
      return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }
  }

  public function registerUser($request)
  {
    return $this->authDao->registerUser($request);
  }

  public function dashboard()
  {
      if(Auth::check()){
          return view('dashboard');
      }
      return redirect("login")->withSuccess('Opps! You do not have access');
  }
}