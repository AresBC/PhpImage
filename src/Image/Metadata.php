<?php declare(strict_types=1);

namespace App\Image;

class Metadata
{
    public int $height;
    public int $width;
    public ?ImageType $type = null;
    public ?int $bits = null;
    public ?string $mime = null;
    public ?int $size = null;
    public bool $isBuffered = false;
}
