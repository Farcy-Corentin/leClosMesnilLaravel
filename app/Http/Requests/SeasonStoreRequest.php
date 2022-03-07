<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeasonStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'started_at' => 'required|date_format:d/m/Y|after:now',
            'finished_at' => 'required|date_format:d/m/Y|after:started_at',
            'price' => 'required|integer',
        ];
    }
}
