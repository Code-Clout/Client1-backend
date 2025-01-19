<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationStudentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'mobile' => 'required|string|max:15',
            'DOB' => 'nullable|date',
            'email' => 'nullable|email|max:255',
            'father_first_name' => 'nullable|string|max:255',
            'father_last_name' => 'nullable|string|max:255',
            'mother_first_name' => 'nullable|string|max:255',
            'mother_last_name' => 'nullable|string|max:255',
            'gender' => 'nullable|string|in:Male,Female',
            'nationality' => 'nullable|string|max:255',
            'street_address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'pin_code' => 'nullable|string|max:10',
            'reason' => 'nullable|string',
           'payment_screenshot' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'transaction_id' => 'nullable|string|max:255',
            'agree_to_terms' => 'boolean'
        ];
    }
}
