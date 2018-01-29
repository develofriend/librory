<?php

namespace Librory\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class AddAuthorRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() and auth()->user()->isLibrorian();
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:authors'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();

        throw new HttpResponseException(response()->json([
            'error' => view('components.errors', compact('errors'))->render()
        ], 200));
    }
}
