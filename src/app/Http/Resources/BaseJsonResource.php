<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\MissingValue;

class BaseJsonResource extends JsonResource
{
    public $needs = [];
    private mixed $preserveKeys;

    public function __construct($resource,$needs = [])
    {
        parent::__construct($resource);
        if(is_array($needs)) $this->needs = $needs;
    }

    /**
     * Retrieve a value based on a given condition.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @param  mixed  $default
     * @return \Illuminate\Http\Resources\MissingValue|mixed
     */
    protected function whenNeed($key, $value, $default = null)
    {
        if (in_array($key,$this->needs)) {
            return value($value);
        }

        return func_num_args() === 3 ? value($default) : new MissingValue;
    }

    public static function collection($resource, array $needs = []): BaseResourceCollection
    {
        $collection = new BaseResourceCollection($resource, static::class);

        $collection->needs = $needs;

        if (property_exists(static::class, 'preserveKeys')) {
            $collection->preserveKeys = (new static([]))->preserveKeys === true;
        }

        return $collection;
    }
}
