<?php
namespace Modules\Weapon\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Responses\SuccessResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Modules\Weapon\Dto\SaveUserWeaponData;
use Modules\Weapon\Http\Requests\SaveUserWeaponRequest;
use Modules\Weapon\Http\Resources\CaliberResource;
use Modules\Weapon\Services\WeaponService;
use Modules\Weapon\Http\Resources\WeaponResource;

class WeaponController extends Controller
{
    public function __construct(private WeaponService $weaponService)
    {
    }

    public function weapons(): JsonResponse
    {
        $result = $this->weaponService->gertWeapons();

        return new SuccessResponse(data: WeaponResource::collection($result));
    }
    public function calibers(): JsonResponse
    {
        $result = $this->weaponService->gertCalibers();

        return new SuccessResponse(data: CaliberResource::collection($result));
    }

    public function store(SaveUserWeaponRequest $request): JsonResponse
    {
        $dto = SaveUserWeaponData::fromRequest($request);
        $result = $this->weaponService->storeUserWeapon(Auth::id(), $dto);

        return new SuccessResponse(code: $result['code'], domain: 'weapon');
    }
    public function destroy($id)
    {

    }
}
