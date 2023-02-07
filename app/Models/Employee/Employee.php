<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Model;



class Employee extends Model
{

    public $table = 'employees';
    


    public $fillable = [
        'first_name',
        'last_name',
        'wu'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'first_name' => 'string',
        'last_name' => 'string',
        'wu' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
