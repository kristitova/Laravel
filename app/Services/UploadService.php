<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Symfony\Component\HttpFoundation\File\Exception\UploadException;


class UploadService
{

    public function uploadImage(UploadedFile $uploadedfile): string
    {
        $path = $uploadedfile->storeAs('news', $uploadedfile->hashName(), 'public');
        if($path === false) {
            throw new UploadException('File is not upload');
        }
        
        return $path;
    }
}