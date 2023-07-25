<?php declare(strict_types=1);

namespace App\Image;

use App\MathAlgorithm\EuclideanAlgorithm;

class ImageManager implements IImageManager
{

    public function __construct(
        private readonly IImageReader    $imageReader,
        private readonly IImageCopier    $imageCopier,
        private readonly IImageScaler    $imageScaler,
        private readonly IImageMover     $imageMover,
        private readonly IImageConverter $imageConverter,
        private readonly IImageSaver     $imageSaver,
    )
    {
        $this->imageSaver->setImageManager($this);
        $this->imageConverter->setImageManager($this);
    }

    public function read(string $path): Image
    {
        return $this->imageReader->read($path);
    }

    public function copy(Image $image): Image
    {
        return $this->imageCopier->copy($image);
    }

    public function scale(Image $image, int $height, int $width): Image
    {
        return $this->imageScaler->scale($image, $height, $width);
    }

    public function scaleByNumberOfPixel(Image $image, $maxPixel): Image
    {
        // calculate height and width for thumbnail
        $width = imagesx($image->gdImage);
        $height = imagesy($image->gdImage);
        $gcd = (new EuclideanAlgorithm)->execute($height, $width);
        $imageFormat = [$height / $gcd, $width / $gcd];
        $factor = $imageFormat[0] * $imageFormat[1];
        $unit = sqrt($maxPixel / $factor);
        $newHeight = (int)floor($imageFormat[0] * $unit);
        $newWidth = (int)floor($imageFormat[1] * $unit);


        return $this->imageScaler->scale($image, $newHeight, $newWidth);
    }

    public function move(Image $image, string $path): void
    {
        $this->imageMover->move($image, $path);
    }

    public function convert(Image $image, ImageType $type, int $quality = null): Image
    {
        return $this->imageConverter->convert($image, $type, $quality);
    }

    public function save(Image $image, string $path = null, int $quality = null): void
    {
        $this->imageSaver->save($image, $path, $quality);
    }
}