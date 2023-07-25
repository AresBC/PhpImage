<?php declare(strict_types=1);

namespace App\Image;

use GdImage;

class Image
{
    function __construct(
        public readonly GdImage  $gdImage,
        public readonly Metadata $metadata = new Metadata(),
        public ?string           $path = null,
    )
    {
    }

    public function __destruct()
    {
        if ($this->metadata->isBuffered) {
            unlink($this->path);
        }
    }
}