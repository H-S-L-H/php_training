<?php
  
namespace App\Http\Controllers\Api;
  
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateApiRequest;
use App\Http\Requests\EditApiRequest;
use App\Models\Student;
use App\Models\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Contracts\Services\StudentServiceInterface;

  
class StudentController extends Controller
{

    private $studentService;

    public function __construct(StudentServiceInterface $studentService)
    {
      $this->studentService = $studentService;
    }

    public function getStudents()
    {
      $students = $this->studentService->getstudent();
      return response()->json(['message : Showed all students', $students]);
    }

    public function getStudentById($id)
    {
      $students = $this->studentService->getStudentById($id);
      if (is_null($students)) {
        return response()->json('Student not found', 404); 
      }
      return response()->json(['message : Showed student id='.$id, $students]);
    }

    public function createStudent(CreateApiRequest $request)
    {
      $request->validated();
      $students = $this->studentService->store($request);
      return response()->json(['message : Successfully created student', $students]);
    }

    public function updateStudent(EditApiRequest $request, $id)
    {
      $request->validated();
      $students = $this->studentService->updateInfo($request, $id);
      return response()->json(['message : Successfully updated student id='.$id, $students]);
    }

    public function deleteStudent($id)
    {
      $students = $this->studentService->deleteById($id);
      return response()->json(['message : Successfully deleted student id='.$id]);
    }
}