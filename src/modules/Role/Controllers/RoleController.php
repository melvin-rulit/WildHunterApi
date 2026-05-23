<?php

namespace Modules\Role\Controllers;

use Illuminate\Http\JsonResponse;
use Modules\Role\Services\RoleService;
use App\Http\Responses\SuccessResponse;

class RoleController
{
    public function __construct(protected RoleService $roleService)
    {
    }

    public function roles(): JsonResponse
    {
        $result = $this->roleService->roles();

        return new SuccessResponse(data: $result);
    }

    public function getById(int $id): JsonResponse
    {
        $result = $this->roleService->getById($id);

        return new SuccessResponse(data: $result);
    }
    public function getByCode(string $code): JsonResponse
    {
        $result = $this->roleService->getByCode($code);

        return new SuccessResponse(data: $result);
    }
}
