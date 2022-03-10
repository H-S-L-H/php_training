<?php

namespace App\Contracts\Dao;

use Illuminate\Http\Request;

interface AuthDaoInterface {
  public function loginUser($request);

  public function registerUser($request);
}