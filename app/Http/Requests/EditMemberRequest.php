<?php

namespace Librory\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class EditMemberRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    protected function validationData()
    {
        if (! isset($this->password)) {
            unset($this['password']);
        }

        return $this->all();
    }

    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($this->memberId())
            ]
        ];
    }

    public function memberId()
    {
        return $this->route('member')->id;
    }
}
