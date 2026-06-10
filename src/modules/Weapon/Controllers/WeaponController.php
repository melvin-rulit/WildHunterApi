<?php
namespace Modules\Weapon\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Responses\SuccessResponse;
use Illuminate\Http\JsonResponse;
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
    public function destroy($id)
    {

    }
}
