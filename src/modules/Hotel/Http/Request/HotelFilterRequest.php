<?php

namespace Modules\Hotel\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class HotelFilterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'order_by' => ['string'],
            'order_direction' => ['string', 'in:asc,desc'],
            'limit' => ['numeric', 'min:1'],
        ];
    }

    public function messages(): array
    {
        return [
            'order_by.string' => __('hotel.validation.order_by_must_be_string'),

            'order_direction.string' => __('hotel.validation.order_direction_must_be_string'),
            'order_direction.in' => __('hotel.validation.order_direction_invalid'),

            'limit.numeric' => __('hotel.validation.limit_must_be_numeric'),
            'limit.min' => __('hotel.validation.limit_min_value'),
        ];
    }
}
