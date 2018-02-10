<?php

namespace Librory\Http\Requests;

use Librory\Traits\JsonResponse;
use Illuminate\Foundation\Http\FormRequest;

class AddShelfRequest extends FormRequest
{
    use JsonResponse;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check() and auth()->user()->isLibrorian();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:shelves,name'
        ];
    }
}
