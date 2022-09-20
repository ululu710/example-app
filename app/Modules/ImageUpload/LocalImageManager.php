<?php
/**
 *
 * @author t.nari
 * @copyright FRIENDIT Inc.
 */

namespace App\Modules\ImageUpload;

use Illuminate\Support\Facades\Storage;

class LocalImageManager implements ImageManagerInterface
{

    /**
     * @inheritDoc
     */
    public function save($file): string
    {
        $path = (string) Storage::putFile('public/images', $file);
        $array = explode("/", $path);

        return end($array);
    }

    public function delete(string $name): void
    {
        $filePath = 'public/images/' . $name;
        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
        }
    }
}
