<?php

namespace Modules\User\Dto\Auth;

use Illuminate\Http\Request;

class LoginData
{
    public function __construct(
        public string $email,
        public string $password,
    ) {}

    public static function fromRequest(Request $request): self
    {
        $data = $request->validated();

        return new self(
            email: $data['email'],
            password: $data['password'],
        );
    }
}
