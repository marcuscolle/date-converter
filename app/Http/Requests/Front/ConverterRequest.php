<?php

namespace App\Http\Requests\Front;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class ConverterRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->method() === 'POST';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [];

        if($this->input('date') !== null) {
            $rules['date'] = ['required', 'date_format:d-m-Y' ];
        }

        if($this->input('roman') !== null) {
            $rules['roman'] = ['required', 'regex:/^([MDCLXVI]+-?)*$/i'];
        }

        return $rules;

    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'date.required' => 'The number field is required.',
            'roman.required' => 'The roman field is required. Use - to separate the roman numerals as DD-MM-YYYY.',
            'roman.regex' => 'The roman field must be a valid Roman numeral. Use - to separate the roman numerals as DD-MM-YYYY.',
        ];
    }
}
