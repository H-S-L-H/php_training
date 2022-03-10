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

  public function loginUser($request)
  {
    return $this->authDao->loginUser($request);
  }

  public function registerUser($request)
  {
    return $this->authDao->registerUser($request);
  }
}