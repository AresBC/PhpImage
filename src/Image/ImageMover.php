<?php declare(strict_types=1);

namespace App\Image;

use Exception;

class ImageMover implements IImageMover
{
    /**
     * @throws Exception
     */
    public function move(Image $image, string $path): void
    {
        if ($image->path === null) {
            throw new Exception('Image object has bo path.');
        }
        rename($image->path, $path);
    }
}