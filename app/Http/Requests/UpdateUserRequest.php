<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        // Getting the current user's ID from the route parameters
        $userId = $this->route('id');

        return [
            'name' => 'string|max:255',
            'email' => 'email|unique:users,email,' . $userId, 
            'phone' => 'string|unique:users,phone,' . $userId, 
            'password' => 'nullable|string|min:6', 
        ];
    }
}
