<?php declare(strict_types=1);

namespace App\Image;

use Exception;

class ImageSaver implements IImageSaver
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
     * @throws Exception
     */
    public function save(Image $image, string $path = null, int $quality = null): void
    {
        if ($image->metadata->type === null) {
            throw new Exception('Image type is not defined.');
        }

        if ($path === null) {
            if ($image->path === null) {
                throw new Exception('Param path not ist not set and image object has no path.');
            }
            $path = $image->path;
        }

        $extension = $image->metadata->type->name;
        $extension = strtolower($extension);
        $path .= '.' . $extension;

        if($image->metadata->isBuffered) {
            $this->imageManager->move($image, $path);
            return;
        }

        $saveFunction = $this->getImageFunctionByType($image->metadata->type);


        if ($quality === null) {
            $saveFunction($image->gdImage, $path);
        } else {
            $saveFunction($image->gdImage, $path, $quality);
        }
    }
}