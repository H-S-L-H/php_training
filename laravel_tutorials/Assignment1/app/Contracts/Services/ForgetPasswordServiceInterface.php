<?php

namespace App\Contracts\Services;

interface ForgetPasswordServiceInterface
{
  public function saveForgetPassword($request);

  public function saveResetPassword($request);
}