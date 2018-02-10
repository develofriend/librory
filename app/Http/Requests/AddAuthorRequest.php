<?php

namespace Librory\Http\Requests;

use Librory\Traits\JsonResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class AddAuthorRequest extends FormRequest
{
    use JsonResponse;

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
}
