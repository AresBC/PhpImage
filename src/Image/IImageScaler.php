<?php declare(strict_types=1);

namespace App\Image;

interface IImageScaler
{

    public function scale(Image $image, int $height, int $width): Image;
}