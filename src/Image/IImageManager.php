<?php declare(strict_types=1);

namespace App\Image;

interface IImageManager
{
    public function read(string $path): Image;

    public function copy(Image $image): Image;

    public function scale(Image $image, int $height, int $width): Image;

    public function scaleByNumberOfPixel(Image $image, int $maxPixel): Image;

    public function move(Image $image, string $path): void;

    public function convert(Image $image, ImageType $type, int $quality = null): Image;

    public function save(Image $image, string $path = null, int $quality = null): void;
}