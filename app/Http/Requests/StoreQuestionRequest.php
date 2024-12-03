<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'question_text' => 'required|string',
            'options' => 'required|array|min:4|max:4',
            'options.*.option_text' => 'required|string',
            'options.*.is_correct' => 'required|boolean',
            'status' => 'nullable|boolean',
        ];
    }
}
