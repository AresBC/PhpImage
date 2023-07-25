<?php declare(strict_types=1);

namespace App\Image;

use Exception;

class ImageMetadataDeterminer implements IImageMetadataDeterminer
{

    /**
     * @throws Exception
     */
    public function determineByPath(string $path): Metadata
    {

        $metadata = new Metadata();

        /** @var array|false $metadataBuffer */
        $metadataBuffer = getimagesize($path);
        if ($metadataBuffer === false) {
            throw new Exception("No image found by path: \"{$path}\"");
        }

        $metadata->width = $metadataBuffer[0];
        $metadata->height = $metadataBuffer[1];
        $metadata->type = ImageType::getImageTypeByGetImageSizeType($metadataBuffer[2]);
        $metadata->bits = $metadataBuffer['bits'];
        $metadata->mime = $metadataBuffer['mime'];

        /** @var int|false $size */
        $size = filesize($path);
        if ($size === false) {
            throw new Exception('File size could not be read.');
        }

        $metadata->size = $size;


        return $metadata;
    }
}