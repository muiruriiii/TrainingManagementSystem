<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeCourses extends Model
{
    use HasFactory;
        protected $fillable = ['id','employeeID','courseID','isDeleted'];

}
