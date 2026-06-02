<?php

namespace Modules\User\Dto;

use Illuminate\Http\Request;

class SubscribeData
{
    public function __construct(
        public string $email,
        public bool $privacy_policy,
    ) {}

    public static function fromRequest(Request $request): self
    {
        $data = $request->validated();

        return new self(
            email: $data['email'],
            privacy_policy: $data['privacy_policy'],
        );
    }
}
