<?php

namespace App\Service\FileService;

use Illuminate\Support\Facades\Storage;

class ImageService {

    protected $prefix;

    function __construct()
    {
        $this->prefix = 'images';
    }

    public function putFile($file): string
    {
        $path = $file->store($this->prefix);

        return $path;
    }

    public function getFileTemporaryUrl($file): string
    {
        $path = $file->store($this->prefix);

        return $path;
    }

    public function deleteFile(string $path)
    {
        if (Storage::exists($path)) {

            Storage::delete($path);

        }

        return $this;
    }
}
