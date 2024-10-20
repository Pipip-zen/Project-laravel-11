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
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts,slug,' . $this->post->id,
            'category_id' => 'required',
            'body' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'Silakan pilih file image',
            'image.image' => 'File yang dipilih bukan file image',
            'image.mimes' => 'File yang dipilih harus berupa jpeg, png, jpg, gif, atau svg',
            'image.max' => 'Ukuran file yang dipilih melebihi 2048 kilobyte',
        ];
    }
}