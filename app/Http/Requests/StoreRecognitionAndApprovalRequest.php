<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRecognitionAndApprovalRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'status' => 'boolean',
        ];
    }
}
