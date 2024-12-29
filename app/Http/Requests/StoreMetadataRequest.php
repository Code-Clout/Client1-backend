<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMetadataRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'image_type' => 'required|in:Certificates,RecruiterCompanies,GalleryPhoto',
            'image_path' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'boolean',
        ];
    }
}
