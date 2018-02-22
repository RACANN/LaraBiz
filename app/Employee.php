<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['ssn', 'employee_number', 'first_name', 'last_name', 'birth_date', 'phone', 'email',  'hire_date', 'pay'];


}
