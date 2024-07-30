<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'judul' => 'required|string|max:255',
            'category_id' => 'required|exists:category,id',
            'content' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi gambar
            'tags' => 'array',
            'tags.*' => 'exists:tags,id',
        ];
    }
}
