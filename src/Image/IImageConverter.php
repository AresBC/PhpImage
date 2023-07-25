<?php declare(strict_types=1);

namespace App\Image;

interface IImageConverter
{
    public function convert(Image $image, ImageType $type): Image;
    public function setImageManager(IImageManager $imageManager): void;
}