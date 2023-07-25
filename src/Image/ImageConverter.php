<?php declare(strict_types=1);

namespace App\Image;

use Exception;

class ImageConverter implements IImageConverter
{

    use TImageFunctionByType;

    private IImageManager $imageManager;

    /**
     * @param IImageManager $imageManager
     */
    public function setImageManager(IImageManager $imageManager): void
    {
        $this->imageManager = $imageManager;
    }

    /**
     * @throws ImageTypeNotSupportedException
     * @throws Exception
     */
    public function convert(Image $image, ImageType $type, int $quality = null): Image
    {
        $saveFunction = $this->getImageFunctionByType($type);

        $path = __DIR__ . '/ImageBuffer/buffer'. md5(sprintf("%.3f", rand())) . '.' . strtolower($type->name);

        if ($quality === null) {
            $saveFunction($image->gdImage, $path);
        } else {
            $saveFunction($image->gdImage, $path, $quality);
        }

        $image = $this->imageManager->read($path);
        $image->metadata->isBuffered = true;


        return $image;
    }
}