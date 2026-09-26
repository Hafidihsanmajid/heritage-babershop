<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

class ImageService
{
    /**
     * Resize and crop image to exact target dimensions and save to public storage.
     *
     * @param UploadedFile $file
     * @param string $folder ('services' or 'barbers')
     * @param int $targetWidth
     * @param int $targetHeight
     * @return string Public URL path
     */
    public static function uploadAndResize(UploadedFile $file, string $folder, int $targetWidth, int $targetHeight): string
    {
        $storagePath = storage_path('app/public/' . $folder);
        if (!File::exists($storagePath)) {
            File::makeDirectory($storagePath, 0755, true);
        }

        $extension = strtolower($file->getClientOriginalExtension());
        $sourcePath = $file->getRealPath();

        $srcImage = null;
        switch ($extension) {
            case 'jpeg':
            case 'jpg':
                $srcImage = @imagecreatefromjpeg($sourcePath);
                break;
            case 'png':
                $srcImage = @imagecreatefrompng($sourcePath);
                break;
            case 'webp':
                $srcImage = @imagecreatefromwebp($sourcePath);
                break;
            case 'gif':
                $srcImage = @imagecreatefromgif($sourcePath);
                break;
            default:
                $fileContent = @file_get_contents($sourcePath);
                if ($fileContent) {
                    $srcImage = @imagecreatefromstring($fileContent);
                }
        }

        if (!$srcImage) {
            // Fallback: save original if GD cannot decode
            $fallbackName = $folder . '_' . uniqid() . '.' . $extension;
            $file->move($storagePath, $fallbackName);
            return '/storage/' . $folder . '/' . $fallbackName;
        }

        $origWidth = imagesx($srcImage);
        $origHeight = imagesy($srcImage);

        // Aspect ratio cover calculation (smart center crop)
        $targetRatio = $targetWidth / $targetHeight;
        $origRatio = $origWidth / $origHeight;

        if ($origRatio > $targetRatio) {
            $cropHeight = $origHeight;
            $cropWidth = (int) round($origHeight * $targetRatio);
            $cropX = (int) round(($origWidth - $cropWidth) / 2);
            $cropY = 0;
        } else {
            $cropWidth = $origWidth;
            $cropHeight = (int) round($origWidth / $targetRatio);
            $cropX = 0;
            $cropY = (int) round(($origHeight - $cropHeight) / 2);
        }

        $destImage = imagecreatetruecolor($targetWidth, $targetHeight);

        // Transparency handling
        imagealphablending($destImage, false);
        imagesavealpha($destImage, true);
        $transparent = imagecolorallocatealpha($destImage, 0, 0, 0, 127);
        imagefilledrectangle($destImage, 0, 0, $targetWidth, $targetHeight, $transparent);
        imagealphablending($destImage, true);

        // Resample image
        imagecopyresampled(
            $destImage,
            $srcImage,
            0, 0,
            $cropX, $cropY,
            $targetWidth, $targetHeight,
            $cropWidth, $cropHeight
        );

        $filename = $folder . '_' . uniqid() . '.webp';
        $destination = $storagePath . '/' . $filename;

        if (function_exists('imagewebp')) {
            imagewebp($destImage, $destination, 90);
        } else {
            $filename = $folder . '_' . uniqid() . '.jpg';
            $destination = $storagePath . '/' . $filename;
            imagejpeg($destImage, $destination, 90);
        }

        imagedestroy($srcImage);
        imagedestroy($destImage);

        return '/storage/' . $folder . '/' . $filename;
    }
}

