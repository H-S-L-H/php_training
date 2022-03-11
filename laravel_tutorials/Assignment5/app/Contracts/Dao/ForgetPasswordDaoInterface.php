<?php

namespace App\Contracts\Dao;



interface ForgetPasswordDaoInterface
{
  public function saveForgetPassword($request);

  public function saveResetPassword($request);
}