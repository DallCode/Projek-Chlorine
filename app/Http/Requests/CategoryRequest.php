<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'is_publish' => 'required|boolean',
        ];
    }

    /**
     * Custom error messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'The category name is required.',
            'name.max' => 'The category name must not exceed 255 characters.',
            'is_publish.required' => 'The publish status is required.',
            'is_publish.boolean' => 'The publish status must be either true or false.',
        ];
    }
}
