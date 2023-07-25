<?php declare(strict_types=1);

namespace App\Image;

use Exception;

enum ImageType
{
    case GIF;
    case JPEG;
    case PNG;
    case SWF;
    case PSD;
    case BMP;
    case TIFF_II;
    case TIFF_MM;
    case JPC;
    case JP2;
    case JPX;
    case JB2;
    case SWC;
    case IFF;
    case WBMP;
    case XBM;
    case ICO;
    case COUNT;

    /**
     * @throws Exception
     */
    public static function getImageTypeByGetImageSizeType(int $index): ImageType
    {
        return match ($index) {
            1 => ImageType::GIF,
            2 => ImageType::JPEG,
            3 => ImageType::PNG,
            4 => ImageType::SWF,
            5 => ImageType::PSD,
            6 => ImageType::BMP,
            7 => ImageType::TIFF_II,
            8 => ImageType::TIFF_MM,
            9 => ImageType::JPC,
            10 => ImageType::JP2,
            11 => ImageType::JPX,
            12 => ImageType::JB2,
            13 => ImageType::SWC,
            14 => ImageType::IFF,
            15 => ImageType::WBMP,
            16 => ImageType::XBM,
            17 => ImageType::ICO,
            18 => ImageType::COUNT,
            default => throw new Exception('Image type is unknown.'),
        };
    }
}