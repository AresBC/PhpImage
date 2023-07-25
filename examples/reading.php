<?php declare(strict_types=1);

ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);


use App\Image\IImageManager;
use App\Image\IImageManagerFactory;
use App\Image\ImageManagerFactory;


require_once __DIR__ . '/../vendor/autoload.php';


$url = __DIR__ . '/../assets/images/phpfanti_crazy.png';


/** @var IImageManagerFactory $imageManagerFactory */
$imageManagerFactory = new ImageManagerFactory();

/** @var IImageManager $imageManager */
$imageManager = $imageManagerFactory->create();


$image = $imageManager->read($url);

var_dump($image);
