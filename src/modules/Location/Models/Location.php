<?php

    namespace Modules\Location\Models;

    use App\BaseModel;
    use Kalnoy\Nestedset\NodeTrait;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class Location extends BaseModel
    {
        use SoftDeletes, NodeTrait;

        protected $table         = 'bc_locations';
        protected $fillable      = [
            'name',
            'content',
            'image_id',
            'map_lat',
            'map_lng',
            'map_zoom',
            'status',
            'parent_id',
            'banner_image_id',
            'trip_ideas',
        ];
        protected $slugField     = 'slug';
        protected $slugFromField = 'name';
        protected $seo_type      = 'location';
        protected $casts         = [
            'trip_ideas' => 'array'
        ];

        public static function getModelName()
        {
            return __("location.name.model_name");
        }
    }
