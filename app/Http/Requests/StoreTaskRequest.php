<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title'           => 'required',
            'description'     => 'nullable',
            'start_date'      => 'required|date|date_format:Y-m-d|after:yesterday',
            'end_date'        => 'required|date|date_format:Y-m-d|after:start_date',
            'priority'        => 'nullable'
        ];
    }
}