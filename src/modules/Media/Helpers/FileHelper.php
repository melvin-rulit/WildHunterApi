<?php

namespace Modules\Media\Helpers;

use Modules\Media\Models\MediaFile;

class FileHelper
{
    public static array $defaultSize = [
        'thumb' => [
            150,
            150
        ],
        'medium' => [
            600,
            600
        ],
        'large' => [
            1024,
            1024
        ],
        'max_large' => [
            2500,
            2500
        ],
    ];


    public static function list_size(): array
    {
        $sizes = [];
        foreach (self::$defaultSize as $size) {
            $sizes[] = $size[0];
        }
        return $sizes;
    }

    public static function url($fileId, $size = 'medium', $resize = true)
    {
        if ($fileId instanceof MediaFile) {
            $file = $fileId;
        } else {
            $file = (new MediaFile())->findById($fileId);
        }
        if (empty($file)) {
            return false;
        }
        switch ($file->driver) {
            default:
                $url = $file->view_url;
                $cdn_url = config('bc.cdn_url');
                if ($cdn_url) {
                    $width = static::$defaultSize[$size][0] ?? static::$defaultSize['medium'][0];
                    if ($width == 'full') $width = '';
                    return $cdn_url . '/' . ($width ? 'width=' . $width : '') . ',quality=70,f=auto/uploads/' . $file->file_path;
                }
        }
        return $url;
    }
}
