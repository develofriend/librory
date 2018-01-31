<?php

namespace Librory\Http\Requests;

use Illuminate\Validation\Rule;
use Librory\Traits\JsonResponse;
use Illuminate\Foundation\Http\FormRequest;

class EditShelfRequest extends FormRequest
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
            'name' => [
                'required',
                Rule::unique('shelves')->ignore($this->shelfId())
            ]
        ];
    }

    public function shelfId()
    {
        return $this->route('shelf')->id;
    }
}
