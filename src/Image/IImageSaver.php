<?php

namespace App\Image;

interface IImageSaver
{
    public function save(Image $image, string $path = null): void;
    public function setImageManager(IImageManager $imageManager): void;
}