<?php

namespace App\Contracts\Dao;

use Illuminate\Http\Request;

interface AuthDaoInterface
{
  public function registerUser($request);
}