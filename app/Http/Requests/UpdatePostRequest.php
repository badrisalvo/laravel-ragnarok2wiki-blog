<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Sesuaikan dengan kebutuhan otorisasi Anda
    }

    public function rules()
    {
        return [
            'judul' => 'required|max:255',
            'category_id' => 'required|exists:category,id',
            'content' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Aturan untuk gambar
        ];
    }
}
