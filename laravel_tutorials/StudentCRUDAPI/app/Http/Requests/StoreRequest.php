<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Student;
use App\Models\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Contracts\Services\StudentServiceInterface;

class StoreRequest extends FormRequest
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
        return [
          'roll' => 'required|unique:students',
          'name' => 'required|max:255',
          'major_id' => 'required',
          'email' => 'required|email|unique:students',
          'phone' => 'required|numeric',
          'address' => 'required'
        ];
    }
}