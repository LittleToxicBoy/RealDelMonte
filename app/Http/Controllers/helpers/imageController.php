<?php

namespace App\Http\Controllers\helpers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;

class imageController extends Controller
{
    protected function compressImage($image)
    {
        try {
            $imageResize = Image::make($image)->encode('webp', 90);
            if ($imageResize->width() > 1024) {
                $imageResize->resize(1024, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }
            $compresedImage = $imageResize->stream();
            return $compresedImage;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function uploadImageGcs($image, $filename, $folder)
    {
        try {
            $compresedImage = $this->compressImage($image);
            $path = 'images/' . $folder . '/' . $filename . '.webp';
            $name = Storage::disk('gcs')->put($path, $compresedImage);
            $name = str_replace("/", "%2f", $path);
            $urlPath = env('GOOGLE_CLOUD_STORAGE_URL') . $name . '?alt=media';
            return $urlPath;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function deleteImageGcs($pathImage)
    {
        try {
            $path = str_replace("%2f", "/", substr(substr($pathImage, 73), 0, -10));
            Storage::disk('gcs')->delete($path);
            return 'ok';
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function updateImageGcs($pathImage, $image)
    {
        try {
            $path = str_replace("%2f", "/", substr(substr($pathImage, 73), 0, -10));
            $compresedImage = $this->compressImage($image);
            $name = Storage::disk('gcs')->put($path, $compresedImage);
            return 'ok';
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
