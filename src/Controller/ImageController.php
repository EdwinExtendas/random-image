<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ImageController
{
    /**
     * @Route("/", name="random_image")
     * @param $image_dir
     */
    public function getRandomImage($image_dir)
    {
        $directory = array_diff(
                scandir($image_dir),
                ['.', '..']
        );

        $image = $directory[array_rand($directory)];
        return new BinaryFileResponse(
            sprintf('%s/%s',$image_dir,$image)
        );

    }
}
