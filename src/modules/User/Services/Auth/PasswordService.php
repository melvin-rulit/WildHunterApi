<?php

namespace Modules\User\Services\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Exceptions\BusinessException;
use Illuminate\Support\Facades\Crypt;
use App\Exceptions\ValidationException;
use Modules\User\Dto\Auth\UpdatePasswordData;
use Illuminate\Contracts\Auth\Authenticatable;
use Random\RandomException;

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

    /**
     * @throws RandomException
     */
    public function sendResetCode($email): array
    {
        $ttl = (int) config('auth.password_reset.ttl');

        $code = (string) random_int(100000, 999999);

        $key = "reset-password:{$email}";

        Cache::put($key, $code, now()->addMinutes($ttl));

        return [
            'code' => 'code_send_successfully',
            'reset_code' => $code,
            'ttl' => $ttl,
        ];
    }

    /**
     * @throws BusinessException
     */
    public function resetCode($email, $code, $password): array
    {
        $key = "reset_password:{$email}";

        $cachedCode = Cache::get($key);

        if (!$cachedCode) {
            throw new BusinessException(
                errorCode: 'code_expired',
                domain: 'password'
            );
        }

        if ($cachedCode !== $code) {
            throw new BusinessException(
                errorCode: 'code_invalid',
                domain: 'password'
            );
        }

        Cache::forget($key);

        $user = User::where('email', $email)->first();

        $user->tokens()->delete();

        $user->password = Hash::make($password);
        $user->current_password = Crypt::encryptString($password);

        $token = $user->createToken('auth_token')->plainTextToken;

        $user->save();

        return [
            'code' => 'code_reset_successfully',
            'token' => $token,
        ];
    }
}
