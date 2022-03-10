<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
 
class Major extends Model
{
    
    protected $fillable = [
        'id',
        'major_name',
    ];
 
    public function student()
    {
        return $this->hasMany(Student::class, 'major_id', 'id');
    }
}