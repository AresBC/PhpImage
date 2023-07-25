<?php declare(strict_types=1);

namespace App\Image;

interface IImageCopier
{
    public function copy(Image $image): Image;
}