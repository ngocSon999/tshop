<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
        return match ($this->method()) {
            'POST' => [
                'name' => 'required|max:255|unique:categories',
                'description' => 'nullable|max:255',
                'image' => [
                    'required',
                    'image',
                    'mimes:jpeg,png,jpg',
                    'max:5120',
                ],
            ],
            'PUT', 'PATCH' => [
                'name' => 'required|max:255|unique:categories,name,' . $this->route('id'),
                'description' => 'nullable|max:255',
                'image' => [
                    'nullable',
                    'image',
                    'mimes:jpeg,png,jpg,gif,svg',
                    'max:5120',
                ],
            ],
            default => [],
        };
    }
}
