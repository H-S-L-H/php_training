<?php

namespace App\Contracts\Services;

interface AuthServiceInterface
{
  public function loginUser($request);

  public function registerUser($request);
}