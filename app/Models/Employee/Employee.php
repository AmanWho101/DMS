<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Model;



class Employee extends Model
{

    public $table = 'employees';
    


    public $fillable = [
        'first_name',
        'last_name',
        'job',
        'age',
        'gender',
        'email'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
