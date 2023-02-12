<?php

namespace App\Service;

use Gedmo\Sluggable\Util\Urlizer;
use League\Flysystem\Filesystem;
use League\Flysystem\FilesystemException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UploaderHelper
{
    public const USER_IMAGE = 'user_images';
    public const PROJECT_IMAGE = 'project_images';


    public function __construct( private Filesystem $filesystem)
    {
    }

    /**
     * @throws FilesystemException
     */
    public function uploadProjektThumblImage(UploadedFile $uploadedFile): string
    {
        $destination = self::PROJECT_IMAGE;

        $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
        $newFilename = Urlizer::urlize($originalFilename).'-'.uniqid('ProjectThumbImage', true).'.'.$uploadedFile->guessExtension();

        $this->filesystem->write(
            $destination.'/'.$newFilename,
            file_get_contents($uploadedFile->getPathname())
        );

        return $newFilename;
    }

}