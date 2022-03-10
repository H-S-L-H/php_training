<?php

namespace App\Dao;

use App\Contracts\Dao\StudentDaoInterface;
use App\Models\Student;
use App\Models\Major;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Exports\StudentExport;
use App\Imports\StudentImport;
use Maatwebsite\Excel\Facades\Excel;

class StudentDao implements StudentDaoInterface {

    public function getstudent(){
        return Student::with('major')->get();
    }

    public function getStudentById($id){
      return Student::with('major')->find($id);
  }

    public function getmajor(){
      return Major::with('student')->get();
    }

    public function store(Request $request){
      return  Student::create($request->all());
  }

    public function deleteById($id){
      return  Student::findOrFail($id)->delete();
  }

    public function editStudent($id){
      return  Student::findOrFail($id);
  }

  public function updateInfo(Request $request, $id){
    return Student::whereId($id)->update(
      [
        'roll' => $request->roll,
        'name' => $request->name,
        'major_id' => $request->major_id,
        'phone' => $request->phone,
        'email' => $request->email,
        'address' => $request->address
    ]
    );
  }

    public function export(){

      return Excel::download(new StudentExport, 'students.csv');
  }

  public function import(){

      return Excel::import(new StudentImport,request()->file('file'));
  }

  public function studentsSearch($search){
    
    return Student::with('major')
    ->where('roll', 'like', '%'.$search.'%')
    ->orWhere('name', 'like', '%'.$search.'%')
    ->orWhere(function ($query) use ($search) {
      $query->whereHas('major', function ($majorquery) use ($search) {
          $majorquery->where('major_name', 'LIKE', '%' . $search . '%');
      });})
    ->orWhere('phone', 'like', '%'.$search.'%')
    ->orWhere('email', 'like', '%'.$search.'%')
    ->orWhere('address', 'like', '%'.$search.'%')
    ->get();
  }

}