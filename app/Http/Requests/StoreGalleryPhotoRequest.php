<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGalleryPhotoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
           'gallery_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'boolean',
        ];
    }
}
