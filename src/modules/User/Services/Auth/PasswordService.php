<?php

namespace Modules\User\Services\Auth;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use App\Exceptions\ValidationException;
use Modules\User\Dto\Auth\UpdatePasswordData;
use Illuminate\Contracts\Auth\Authenticatable;

class PasswordService
{
    public function __construct()
    {
    }


    /**
     * @throws ValidationException
     */
    public function update(Authenticatable $user, UpdatePasswordData $dto)
    {
        if (!Hash::check($dto->current_password, $user->password)) {
            throw new ValidationException(
                errorCode: 'current_password_incorrect',
                domain: 'password'
            );
        }

        $user->password = Hash::make($dto->new_password);
        $user->current_password = Crypt::encryptString($dto->new_password);
        $user->setRememberToken(Str::random(60));

        $user->save();

        return [
            'code' => 'password_update_successfully',
            'data' => $user
        ];
    }
}
