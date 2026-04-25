<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|numeric',
            'course' => 'required|string|max:255',
            'year' => 'required|integer|min:1|max:10',
            'gpa' => 'required|numeric|min:0|max:5',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already registered.',
            'phone.required' => 'The phone field is required.',
            'phone.numeric' => 'The phone must be a numeric value.',
            'course.required' => 'The course field is required.',
            'year.required' => 'The year field is required.',
            'year.integer' => 'The year must be an integer.',
            'year.min' => 'The year must be at least 1.',
            'year.max' => 'The year must not exceed 10.',
            'gpa.required' => 'The GPA field is required.',
            'gpa.numeric' => 'The GPA must be a numeric value.',
            'gpa.min' => 'The GPA must be at least 0.',
            'gpa.max' => 'The GPA must not exceed 5.',
        ];
    }
}

