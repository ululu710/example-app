<?php
/**
 *
 * @author t.nari
 * @copyright FRIENDIT Inc.
 */

declare(strict_types=1);

if (! function_exists('image_url')) {
    function image_url(string $path): string
    {
        if (app()->environment('production')) {
            return asset('storage/images' . $path);
        }
    }
}
