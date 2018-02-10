<?php

namespace Librory\Http\Requests;

use Illuminate\Validation\Rule;
use Librory\Traits\JsonResponse;
use Illuminate\Foundation\Http\FormRequest;

class EditAuthorRequest extends FormRequest
{
    use JsonResponse;

    public function authorize()
    {
        return auth()->check() and auth()->user()->isLibrorian();
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
                Rule::unique('authors')->ignore($this->authorId())
            ]
        ];
    }

    protected function authorId()
    {
        return $this->route('author')->id;
    }
}
