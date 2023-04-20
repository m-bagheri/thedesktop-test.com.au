<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'file_url' => ['nullable', 'mimes:pdf'],
            'category' => ['required', 'string'],
            'author_id' => ['required', 'integer'],
            'isbn' => ['required', 'string'],
        ];
    }
}
