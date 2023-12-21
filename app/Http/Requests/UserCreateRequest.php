<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
            'firstname' => 'required|max:50|min:3',
            'endname' => 'required|max:50|min:3',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'roles' => 'required|in:admin,staff','user',
            'password' => 'required|min:8|max:8',
            'password_confirmation' => 'required|min:8|max:8',
        ];
    }

    public function messages()
    {
        return [
            'firstname.required' => 'First name must be filled in completely',
            'firstname.max' => 'First name maximum 50 letters',
            'firstname.min' => 'First name minimum 50 letters',
            'endname.required' => 'End name must be filled in completely',
            'endname.max' => 'End name maximum 50 letters',
            'endname.min' => 'End name minimum 50 letters',
            'email.required' => 'Email is required',
            'email.email' => 'Email must be filled in',
            'email.unique' => 'Email is already in use',
            'phone.required' => 'Phone is required',
            'roles.required' => 'Roles is required',
            'password.required' => 'Password is required',
            'password.min' => 'Password minimum 8 letters',
            'password.max' => 'Password maximum 8 letters',
            'password_confirmation.required' => 'Password confirmation is required',
            'password_confirmation.min' => 'Password confirmation minimum 8 letters',
            'password_confirmation.max' => 'Password confirmation maximum 8 letters',
        ];
    }
}
