<?php
/**
 *
 * @author t.nari
 * @copyright FRIENDIT Inc.
 */

declare(strict_types=1);

namespace App\Modules\ImageUpload;

use Cloudinary\Cloudinary;

class CloudinaryImageManager implements ImageManagerInterface
{

    public function __construct(private Cloudinary $cloudinary){}

    /**
     * @inheritDoc
     */
    public function save($file): string
    {
        return $this->cloudinary
            ->uploadApi()
            ->upload(is_string($file) ? $file : $file->getRealPath())['public_id'];
    }

    public function delete(string $name): void
    {
        $this->cloudinary->uploadApi()->destroy($name);
    }
}
