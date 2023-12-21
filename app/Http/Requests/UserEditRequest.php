<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:50|min:3',
            'email' => 'required|email',
            'phone' => 'required',
            'roles' => 'required',
            // 'password' => 'required|min:8|max:8',
            // 'password_confirmation' => 'required|min:8|max:8',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name must be filled in completely',
            'name.max' => 'Name maximum 50 letters',
            'name.min' => 'Name minimum 50 letters',
            'email.required' => 'Email is required',
            'email.email' => 'Email must be filled in',
            'phone.required' => 'Phone is required',
            'roles.required' => 'Roles is required',
        ];
    }
}
