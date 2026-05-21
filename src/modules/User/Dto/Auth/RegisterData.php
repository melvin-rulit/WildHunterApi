<?php

namespace Modules\User\Dto\Auth;

use Illuminate\Http\Request;

class RegisterData
{
    public function __construct(
        public string $first_name,
        public string $last_name,
        public string $email,
        public string $password,
        public string $phone,
        public string $role,
        public bool $term,
    ) {}

    public static function fromRequest(Request $request): self
    {
        $data = $request->validated();

        return new self(
            first_name: $data['first_name'],
            last_name: $data['last_name'],
            email: $data['email'],
            password: $data['password'],
            phone: $data['phone'],
            role: $data['role'],
            term: (bool) $data['term'],
        );
    }
}
