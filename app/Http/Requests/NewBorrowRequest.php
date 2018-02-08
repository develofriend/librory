<?php

namespace Librory\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewBorrowRequest extends FormRequest
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
            'return_date' => 'required',
            'books' => 'required|min:1'
        ];
    }
}
