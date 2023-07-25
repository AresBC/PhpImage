<?php declare(strict_types=1);

namespace App\Image;

use Exception;
use GdImage;

class ImageReader implements IImageReader
{
    public function __construct(
        private readonly IImageMetadataDeterminer $imageMetadataDeterminer
    )
    {
    }

    /**
     * @throws Exception
     */
    public function read(string $path): Image
    {
        $metadata = $this->imageMetadataDeterminer->determineByPath($path);
        $gdImage = $this->createFrom($path, $metadata->type);


        return new Image($gdImage, $metadata, $path);
    }


    /**
     * @throws Exception
     */
    private function createFrom(string $path, ImageType $type): GdImage
    {
        $gdImage = match ($type) {
            ImageType::PNG => imagecreatefrompng($path),
            ImageType::JPEG => imagecreatefromjpeg($path),
            default => throw new ImageTypeNotSupportedException("Image type {$type->name}.")
        };

        if ($gdImage === false) {
            throw new Exception('Image could not read.');
        }


        return $gdImage;
    }
}