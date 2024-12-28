<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePackageRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'package_type' => 'required|in:highest,average,minimum',
            'amount' => 'required|numeric|min:0',
        ];
    }
}
