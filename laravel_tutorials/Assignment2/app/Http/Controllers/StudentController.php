<?php
  
namespace App\Http\Controllers;
  
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\Student;
use App\Models\Major;
use App\Exports\StudentExport;
use App\Imports\StudentImport;
use Maatwebsite\Excel\Facades\Excel;
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

    public function index()
    {
        $students = $this->studentService->getstudent();
        $majors =  $this->studentService->getmajor();
        
        return view('index', compact('students', 'majors'));
    }  

    public function create(StoreRequest $request)
    {
        $this->studentService->store($request);

        $students = $this->studentService->getstudent();
        $majors =  $this->studentService->getmajor();

        return view('index', compact('students', 'majors'));
    }

    public function edit($id)
    {
        $students = $this->studentService->editStudent($id);
        $majors =  $this->studentService->getmajor();
        return view('edit', compact('students', 'majors'));
    }
    
    public function update(UpdateRequest $request, $id)
    {
        
        $this->studentService->updateInfo($request, $id);
        return redirect()->route('students');
    }
   
    public function delete($id)
    {
        $this->studentService->deleteById($id);

        return redirect()->route('students');
    }

    public function export()
    {
        return $this->studentService->export();
    }

    public function import()
    {
        $this->studentService->import();
        return redirect()->route('students');
    }

    public function importExportCsv()
    {
       return view('import');
    }
}