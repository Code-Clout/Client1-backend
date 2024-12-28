<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFeeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'without_hostel' => 'nullable|numeric',
            'with_hostel' => 'nullable|numeric',
        ];
    }
}
