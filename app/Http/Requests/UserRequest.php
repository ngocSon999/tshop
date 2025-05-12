<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
                'name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users',
                'phone' => 'nullable|unique:users',
                'password' => [
                    'required',
                    'string',
                    'min:6',
                    'max:32'
                ],
                'password_confirmation' => [
                    Rule::requiredIf(function () {
                        if ($this->request->get('password') !== null) {
                            return true;
                        }
                        return false;
                    }),
                    'same:password',
                ],
                'avatar' => [
                    'nullable',
                    'image',
                    'mimes:jpeg,png,jpg,gif,svg',
                    'max:2048',
                ],
            ],
            'PUT', 'PATCH' => [
                'name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users,email,' . $this->route('id'),
                'phone' => 'nullable|unique:users,phone,' . $this->route('id'),
                'password' => [
                    'nullable',
                    'string',
                    'min:6',
                    'max:32'
                ],
                'password_confirmation' => [
                    Rule::requiredIf(function () {
                        if ($this->request->get('password') !== null) {
                            return true;
                        }
                        return false;
                    }),
                    'same:password',
                ],
                'avatar' => [
                    'nullable',
                    'image',
                    'mimes:jpeg,png,jpg,gif,svg',
                    'max:2048',
                ],
            ],
            default => [],
        };
    }
}
