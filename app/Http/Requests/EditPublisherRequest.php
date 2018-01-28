<?php

namespace Librory\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class EditPublisherRequest extends FormRequest
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
            'name' => [
                'required',
                Rule::unique('publishers')->ignore($this->publisherId())
            ],
            'address' => 'required',
            'contact_number' => 'required'
        ];
    }

    protected function publisherId()
    {
        return $this->route('publisher')->id;
    }
}
