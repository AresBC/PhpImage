<?php declare(strict_types=1);

namespace App\Image;

class ImageManagerFactory implements IImageManagerFactory
{
    function create(): IImageManager
    {
        return new ImageManager(
            new ImageReader(
                new ImageMetadataDeterminer()
            ),
            new ImageCopier(),
            new ImageScaler(),
            new ImageMover(),
            new ImageConverter(),
            new ImageSaver()
        );
    }
}