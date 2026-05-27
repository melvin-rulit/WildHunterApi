<?php

namespace Modules\User\Dto\Auth;

use Illuminate\Http\Request;

class UpdatePasswordData
{
    public function __construct(
        public string $current_password,
        public string $new_password,
        public string $new_password_confirmation

    ) {}

    public static function fromRequest(Request $request): self
    {
        $data = $request->validated();

        return new self(
            current_password: $data['current_password'],
            new_password: $data['new_password'],
            new_password_confirmation: $data['new_password_confirmation'],
        );
    }
}
