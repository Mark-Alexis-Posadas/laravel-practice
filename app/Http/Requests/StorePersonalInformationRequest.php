<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePersonalInformationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validation rules.
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|min:2|max:50',
            'middle_name' => 'nullable|string|max:50',
            'last_name' => 'required|string|min:2|max:50',
            'birthday' => 'required|date|before:today',
            'gender' => 'required|in:Male,Female',
            'email' => 'required|email|max:255|unique:personal_information,email',
            'phone' => 'required|regex:/^09\d{9}$/',
            'address' => 'required|string|min:10|max:500',
        ];
    }

    /**
     * Custom error messages.
     */
    public function messages(): array
    {
        return [
            'first_name.required' => 'First name is required.',
            'first_name.min' => 'First name must be at least 2 characters.',

            'last_name.required' => 'Last name is required.',

            'birthday.required' => 'Birthday is required.',
            'birthday.before' => 'Birthday must be before today.',
            'birthday.before_or_equal' => 'Birthday cannot be a future date.',
            'gender.required' => 'Please select a gender.',
            'gender.in' => 'Invalid gender selected.',

            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email already exists.',

            'phone.required' => 'Phone number is required.',
            'phone.regex' => 'Enter a valid Philippine mobile number.',

            'address.required' => 'Address is required.',
            'address.min' => 'Address should be at least 10 characters.',
        ];
    }
}
