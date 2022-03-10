<?php

namespace App\Services;

use App\Contracts\Dao\StudentDaoInterface;
use App\Contracts\Services\StudentServiceInterface;
use Illuminate\Http\Request;
use App\Exports\StudentExport;
use App\Imports\StudentImport;
use Maatwebsite\Excel\Facades\Excel;

class StudentService implements StudentServiceInterface
{
    private $studentDao;

    public function __construct(StudentDaoInterface $studentDao)
    {
        $this->studentDao = $studentDao;
    }

    public function getstudent()
    {
        return $this->studentDao->getstudent();
    }

    public function getStudentById($id)
    {
        return $this->studentDao->getStudentById($id);
    }

    public function getmajor()
    {
        return $this->studentDao->getmajor();
    }

    public function store(Request $request)
    {
        return $this->studentDao->store($request);
    }

    public function deleteById($id)
    {
        return $this->studentDao->deleteById($id);
    }

    public function editStudent($id)
    {
        return $this->studentDao->editStudent($id);
    }

    public function updateInfo(Request $request, $id)
    {
        return $this->studentDao->updateInfo($request, $id);
    }

    public function export(){

        return $this->studentDao->export();
    }

    public function import(){

        return $this->studentDao->import();
    }

    public function studentsSearch($search){

        return $this->studentDao->studentsSearch($search);
    }

}