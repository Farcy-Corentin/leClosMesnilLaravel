<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required','string','max:100',
            'content' => 'required','string',
            'category_id' => 'required',
            'image_path' => 'required','file',
            'image_name' => 'required'
        ];
    }
}
