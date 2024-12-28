<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRecognitionAndApprovalRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:1000',
            'status' => 'boolean',
        ];
    }
}
