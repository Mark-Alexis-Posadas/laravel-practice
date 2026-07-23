<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePersonalInformationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $personalInformation = $this->route('personal_information');

        return [
            'first_name' => 'required|string|min:2|max:50',
            'middle_name' => 'nullable|string|max:50',
            'last_name' => 'required|string|min:2|max:50',
            'birthday' => 'required|date|before:today',
            'gender' => 'required|in:Male,Female',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('personal_information')->ignore($personalInformation),
            ],
            'phone' => 'required|regex:/^09\d{9}$/',
            'address' => 'required|string|min:10|max:500',
        ];
    }

    public function messages(): array
    {
        return (new StorePersonalInformationRequest())->messages();
    }
}
