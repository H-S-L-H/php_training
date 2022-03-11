<?php

namespace App\Dao;

use App\Contracts\Dao\StudentDaoInterface;
use App\Models\Student;
use App\Models\Major;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class StudentDao implements StudentDaoInterface {

    public function getstudent(){
        return Student::with('major')->get();
    }

    public function getmajor(){
      return Major::with('student')->get();
    }

    public function store(Request $request){
      $token = Str::random(64);
      DB::table('password_resets')->insert([
          'email' => $request->email,
          'token' => $token,
          'created_at' => Carbon::now()
      ]);
      Mail::send('student.createMail', ['name' => $request->name], function ($message) use ($request) {
        $message->to($request->email);
        $message->subject('Created New Student');
      });

      return  Student::create($request->all());
  }

    public function deleteById($id){
      $student = Student::findOrFail($id);
      if ($student){
        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $student->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        Mail::send('student.deleteMail', ['name' => $student->name], function ($message) use ($student) {
          $message->to($student->email);
          $message->subject('Deleted New Student');
        });
    }
      return Student::findOrFail($id)->delete();
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
}