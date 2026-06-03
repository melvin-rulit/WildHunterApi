<?php

    namespace Modules\Location\Models;

    use App\Models\BaseModel;
    use Kalnoy\Nestedset\NodeTrait;
    use Modules\Media\Helpers\FileHelper;
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
        protected string $slugField     = 'slug';
        protected string $slugFromField = 'name';
        protected string $seo_type      = 'location';
        protected $casts         = [
            'trip_ideas' => 'array'
        ];

        public static function getModelName()
        {
            return __("location.name.model_name");
        }

        public function getImageUrl($size = "medium")
        {
            $url = FileHelper::url($this->image_id, $size);
            return $url ? $url : '';
        }

        public function scopePublished($query)
        {
            return $query->where('status', 'publish');
        }
    }
