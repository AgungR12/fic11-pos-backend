<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
            'name' => 'required|max:200|min:3',
            'description' => 'max:200|min:5',
            'price' => 'required|min:3|max:200',
            'stock' => 'required|max:20',
            'category' => 'required',
            // 'image' => 'mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name must be filled in completely',
            'name.max' => 'Name maximum 200 letters',
            'name.min' => 'Name minimum 5 letters',
            'description.max' => 'Description maximum 200 letters',
            'description.min' => 'Description minimum 5 letters',
            'price.required' => 'Price must be filled in completely',
            'price.min' => 'Price minimum 3 letters',
            'price.max' => 'Price maximum 200 letters',
            'stock.required' => 'Stock must be filled in completely',
            'stock.max' => 'Stock maximum 20 letters',
            'category.required' => 'Category must be filled in completely',
            'image.mimes' => 'Size not found',
            'image.max' => 'Image maximum 2MB',
        ];
    }
}
