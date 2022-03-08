<?php

namespace App\Contracts\Dao;

use Illuminate\Http\Request;

interface StudentDaoInterface {
  public function getstudent();

  public function getmajor();

  public function store(Request $request);

  public function deleteById($id);

  public function editStudent($id);

  public function updateInfo(Request $request, $id);

  public function export();

  public function import();

  public function studentsSearch($search);
}