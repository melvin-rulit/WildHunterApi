<?php

namespace Modules\User\Http\Requests;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class SubscribeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'privacy_policy' => ['accepted'],
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => __('user.validation.email_required'),
            'email.email' => __('user.validation.email_invalid'),

            'privacy_policy.accepted' => __('user.validation.privacy_policy_accepted'),
        ];
    }
}
