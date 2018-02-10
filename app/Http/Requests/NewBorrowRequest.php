<?php

namespace Librory\Http\Requests;

use Carbon\Carbon;
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
     * Get data to be validated from the request.
     *
     * @return array
     */
    protected function validationData()
    {
        try {
            $this['return_date'] = Carbon::parse($this->return_date);
        } catch (\Exception $e) {
            $this['return_date'] = null;
        }

        return $this->all();
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
