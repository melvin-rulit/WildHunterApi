<?php

namespace Modules\User\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name'  => ['required', 'string', 'max:255'],

            'role' => ['required', 'in:hunter,baseadmin'],

            'phone' => ['required', 'string', 'unique:users,phone'],

            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],

            'password' => [
                'required',
                'string',
                Password::min(8)
                    ->mixedCase()
                    ->numbers()
                    ->uncompromised(),
            ],

            'term' => ['required', 'accepted'],
        ];
    }
    public function messages(): array
    {
        return [
            'first_name.required' => __('auth.validation.first_name_required'),
            'last_name.required'  => __('auth.validation.last_name_required'),

            'role.required' => __('auth.validation.role_required'),
            'role.in'       => __('auth.validation.role_invalid'),

            'phone.required' => __('auth.validation.phone_required'),
            'phone.unique'   => __('auth.validation.phone_unique'),

            'email.required' => __('auth.validation.email_required'),
            'email.email'    => __('auth.validation.email_invalid'),
            'email.unique'   => __('auth.validation.email_unique'),

            'password.required' => __('auth.validation.password_required'),
            'password.min'      => __('auth.validation.password_min'),
            'password.mixed'  => __('auth.validation.password_upper_lower'),
            'password.numbers' => __('auth.validation.password_number'),

            'term.required'  => __('auth.validation.term_required'),
            'term.accepted'  => __('auth.validation.term_accepted'),
        ];
    }
}
