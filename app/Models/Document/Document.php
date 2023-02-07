<?php

namespace App\Models\Document;

use Illuminate\Database\Eloquent\Model;



class Document extends Model
{

    public $table = 'documents';
    


    public $fillable = [
        'file_name',
        'file_path'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'file_name' => 'string',
        'file_path' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
