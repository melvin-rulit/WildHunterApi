<?php

namespace Modules\Hotel\Controllers;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Hotel\Dto\HotelFilterData;
use App\Http\Responses\SuccessResponse;
use Modules\Hotel\Services\HotelService;
use Modules\Hotel\Http\Resources\HotelResource;
use Modules\Hotel\Http\Request\HotelFilterRequest;

class HotelController extends Controller
{
    public function __construct(private HotelService $hotelService)
    {
    }
    public function getHotels(HotelFilterRequest $request): JsonResponse
    {
        $dto = HotelFilterData::fromRequest($request);
        $result = $this->hotelService->getHotels($dto);

        return new SuccessResponse(
            data: HotelResource::collection($result['data'])
        );
    }
}
