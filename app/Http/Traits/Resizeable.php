<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;

trait Resizeable
{
    public function resize(string $fileContent, string $directory, int $width, int $height, int $quality = 100): bool
    {
        Storage::makeDirectory($directory);
        $extension = File::extension($this->path); // Obtenir l'extension à partir du nom du fichier
        $filename = uniqid() . '.' . $extension;

        $saveFormat = match ($extension) {
            'jpeg', 'jpg' => 'toJpeg',
            'png' => 'toPng',
            'gif' => 'toGif',
            'webp' => 'toWebp',
            default => throw new \Exception("Unsupported file extension: $extension"),
        };

        $manager = new ImageManager(Driver::class);
        $thumbnailImage = $manager->read($fileContent)
            ->scale($width, $height)->$saveFormat($quality);

        Storage::put($directory . '/' . $filename, $thumbnailImage);
        $thumbnail_path = $directory . '/' . $filename;
        $thumbnail_url = Storage::disk('public')->url($thumbnail_path);

        $this->update([
            'thumbnail_path' => $thumbnail_path,
            'thumbnail_url' => $thumbnail_url,
        ]);

        return true;
    }

}
