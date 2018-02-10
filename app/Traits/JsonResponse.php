<?php

namespace Librory\Traits;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

trait JsonResponse
{
    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();

        throw new HttpResponseException(response()->json([
            'error' => view('components.errors', compact('errors'))->render()
        ], 200));
    }
}
