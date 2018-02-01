<?php

namespace Librory\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class EditBookRequest extends FormRequest
{
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
            'title' => 'required',
            'isbn' => [
                'required',
                Rule::unique('books')->ignore($this->bookId())
            ],
            'publisher_id' => 'required'
        ];
    }

    protected function bookId()
    {
        return $this->route('book')->id;
    }
}
