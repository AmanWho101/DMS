<?php

namespace App\Http\Requests\Documnt;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Documnt\Documnt;

class UpdateDocumntRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Documnt::$rules;
    }
}
