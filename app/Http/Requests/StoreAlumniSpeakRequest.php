<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlumniSpeakRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'student_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required|string|max:500',
            'student_name' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'company_logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'boolean',
        ];
    }
}
