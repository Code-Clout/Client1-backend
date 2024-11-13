<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnquiryRequest extends FormRequest
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
            'contact_number' => 'required|string|max:15',
            'email_address' => 'required|email|unique:student_enquiries,email_address',
            'city' => 'required|string|max:255',
            'course_interested' => 'required|string|max:255',
            'more_info' => 'nullable|string',
        ];
    }
}
