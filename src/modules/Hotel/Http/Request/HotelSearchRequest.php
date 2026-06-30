<?php

namespace Modules\Hotel\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class HotelSearchRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'location_id' => ['nullable', 'integer'],
            'animal_id' => ['nullable', 'integer'],
            'check_in' => ['required', 'date'],
            'check_out' => ['required', 'date', 'after:check_in'],
            'adults' => ['nullable', 'integer', 'min:1'],
            'children' => ['nullable', 'integer', 'min:0'],

            'order_by' => ['nullable', 'string'],
            'order_direction' => ['nullable', 'string', 'in:asc,desc'],
            'limit' => ['nullable', 'numeric', 'min:1'],
        ];
    }

    public function messages(): array
    {
        return [
            'location_id.integer' => __('hotel.validation.location_id_must_be_integer'),

            'animal_id.integer' => __('hotel.validation.animal_id_must_be_integer'),

            'check_in.required' => __('hotel.validation.check_in_required'),
            'check_in.date' => __('hotel.validation.check_in_must_be_date'),

            'check_out.required' => __('hotel.validation.check_out_required'),
            'check_out.date' => __('hotel.validation.check_out_must_be_date'),
            'check_out.after' => __('hotel.validation.check_out_must_be_after_check_in'),

            'adults.integer' => __('hotel.validation.adults_must_be_integer'),
            'adults.min' => __('hotel.validation.adults_min_value'),

            'children.integer' => __('hotel.validation.children_must_be_integer'),
            'children.min' => __('hotel.validation.children_min_value'),

            'order_by.string' => __('hotel.validation.order_by_must_be_string'),

            'order_direction.string' => __('hotel.validation.order_direction_must_be_string'),
            'order_direction.in' => __('hotel.validation.order_direction_invalid'),

            'limit.numeric' => __('hotel.validation.limit_must_be_numeric'),
            'limit.min' => __('hotel.validation.limit_min_value'),
        ];
    }
}
