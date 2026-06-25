<?php

namespace Modules\Animals\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Responses\SuccessResponse;
use Modules\Animals\Services\AnimalService;
use Modules\Animals\Http\Resources\AnimalResource;


class AnimalController extends Controller
{
    public function __construct(private AnimalService $animalService)
    {
    }

    public function getAnimals(): JsonResponse
    {
        $result = $this->animalService->getAnimals();

        return new SuccessResponse(data: AnimalResource::collection($result['animals']));
    }
}
