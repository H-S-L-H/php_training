<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentImport implements ToModel,WithHeadingRow
{
    public function model(array $row)
    {
        return new Student([
            'id' => $row['id'],
            'roll' => $row['roll'],
            'name' => $row['name'],
            'major_id' => $row['major_id'],
            'phone' => $row['phone'],
            'email' => $row['email'],
            'address' => $row['address'],
        ]);
    }
}
