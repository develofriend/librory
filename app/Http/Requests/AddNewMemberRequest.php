<?php

namespace Librory\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddNewMemberRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    protected function validationData()
    {
        $this['role_id'] = 2;

        return $this->all();
    }

    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'role_id' => 'required',
            'email' => 'required|unique:users,email|email',
            'password' => 'required',
        ];
    }
}
