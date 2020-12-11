<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'username'=>'required|unique:customers,username',
            'email'=>'required|email|unique:customers,email',
            'birthday'=>'required|date|before:-13 years',
            'address'=>'required',
            'images'=>'nullable|image'
        ];
    }
}
