<?php

namespace Modules\Media\Helpers;

use Illuminate\Support\Facades\Cache;
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

    public static function urlCacheKey(int|string $fileId, string $size = 'medium'): string
    {
        return 'media_file_view_url:' . $fileId . ':' . $size;
    }

    public static function forgetUrlCache(int|string|null $fileId): void
    {
        if ($fileId === null || $fileId === '') {
            return;
        }

        foreach (array_keys(self::$defaultSize) as $size) {
            Cache::forget(self::urlCacheKey($fileId, $size));
        }
    }

    public static function url($fileId, $size = 'medium', $resize = true)
    {
        if ($fileId instanceof MediaFile) {
            return $fileId->view_url ?: false;
        }

        if (empty($fileId)) {
            return false;
        }

        $cacheKey = self::urlCacheKey($fileId, $size);

        $url = Cache::remember($cacheKey, now()->addDay(), function () use ($fileId) {
            $file = MediaFile::find($fileId);

            return $file?->view_url ?? '';
        });

        return $url !== '' ? $url : false;
    }
}
