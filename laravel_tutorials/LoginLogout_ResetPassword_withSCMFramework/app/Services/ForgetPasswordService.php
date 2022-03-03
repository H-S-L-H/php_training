<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Contracts\Dao\ForgetPasswordDaoInterface;
use App\Contracts\Services\ForgetPasswordServiceInterface;


class ForgetPasswordService implements ForgetPasswordServiceInterface
{

  private $forgetPasswordDao;

  public function __construct(ForgetPasswordDaoInterface $forgetPasswordDao)
  {
    $this->forgetPasswordDao = $forgetPasswordDao;
  }

  public function saveForgetPassword($request)
  {
    return $this->forgetPasswordDao->saveForgetPassword($request);
  }

  public function saveResetPassword($request)
  {
    return $this->forgetPasswordDao->saveResetPassword($request);
  }
}