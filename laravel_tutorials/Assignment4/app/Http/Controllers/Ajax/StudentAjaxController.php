<?php
  
namespace App\Http\Controllers\Ajax;
  
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
  
class StudentAjaxController extends Controller
{
    private $studentService;

    public function __construct(StudentServiceInterface $studentService)
    {
      $this->studentService = $studentService;
    }

    public function index()
    {
        $students = $this->studentService->getstudent();
        $majors =  $this->studentService->getmajor();
        
        return view('ajax.ajax_index', compact('students', 'majors'));
    }  

    public function edit($id)
    {
        $students = $this->studentService->editStudent($id);
        $majors =  $this->studentService->getmajor();
        return view('ajax.ajax_edit', compact('students', 'majors'));
    }
}