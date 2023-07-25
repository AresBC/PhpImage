<?php declare(strict_types=1);

namespace App\Image;

interface IImageMover
{
    public function move(Image $image, string $path): void;
}