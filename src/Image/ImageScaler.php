<?php declare(strict_types=1);

namespace App\Image;

class ImageScaler implements IImageScaler
{

    public function __construct()
    {
    }

    public function scale(Image $image, int $height, int $width): Image
    {
        $gdImage = imagescale($image->gdImage, $height, $width);
        $metaData = new Metadata();
        $metaData->height = $height;
        $metaData->width = $width;
        $metaData->type = $image->metadata->type;
        $metaData->mime = $image->metadata->mime;


        return new Image($gdImage, $metaData);
    }
}