<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $fillable = ["employee_code", "first_name", "last_name", "phone", "email", "gender", "date_of_birth", "designation", "department", "salary", "hire_date", "employment_type", "status", "address"];
}
