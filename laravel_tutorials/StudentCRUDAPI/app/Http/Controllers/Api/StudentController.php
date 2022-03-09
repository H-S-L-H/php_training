<?php
  
namespace App\Http\Controllers\Api;
  
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\Student;
use App\Models\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Contracts\Services\StudentServiceInterface;
  
class StudentController extends Controller
{

    public function getStudents()
    {
      return response()->json(Student::with('major')->get(), 200);
    }

    public function getStudentById($id)
    {
      return response()->json(Student::with('major')->find($id), 200);
    }

    public function createStudent(Request $request)
    {
      return response()->json(Student::create($request->all()), 201);
    }

    public function updateStudent(Request $request, Student $student)
    {
      $student->update($request->all());
      return response()->json($student, 200);
    }

    public function deleteStudent(Request $request, Student $student)
    {
      $student->delete();
      return response()->json(null, 204);
    }
}