<?php declare(strict_types=1);

namespace App\Image;

interface IImageMetadataDeterminer
{
    public function determineByPath(string $path): Metadata;
}