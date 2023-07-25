<?php declare(strict_types=1);

namespace App\Image;

interface IImageReader
{

    public function read(string $path);
}