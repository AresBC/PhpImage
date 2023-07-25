<?php declare(strict_types=1);

namespace App\Image;

use Exception;

class ImageTypeNotSupportedException extends Exception
{
    public function __construct($msg = '')
    {
        if ($msg === '') $msg .= 'Image type is not supported.';
        parent::__construct($msg);
    }
}