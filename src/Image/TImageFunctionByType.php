<?php

namespace App\Image;

trait TImageFunctionByType
{
    /**
     * @throws ImageTypeNotSupportedException
     */
    private function getImageFunctionByType(ImageType $type): string
    {
        return match ($type) {
            ImageType::PNG => 'imagepng',
            ImageType::JPEG => 'imagejpeg',
            default => throw new ImageTypeNotSupportedException("Image type \"{$type}\" not supported.")
        };
    }
}