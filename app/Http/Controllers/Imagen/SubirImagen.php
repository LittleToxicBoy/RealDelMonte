<?php

namespace App\Http\Controllers\Imagen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubirImagen extends Controller
{
    public function subir(Request $request)
    {
        // dd($request->file('imagen'));
        echo pathinfo($request->file('imagen')->orifin, PATHINFO_EXTENSION);;
        // $storage = app('firebase.storage'); // This is an instance of Google\Cloud\Storage\StorageClient from kreait/firebase-php library
        // $defaultBucket = $storage->getBucket();
        // $image = $request->file('image');

        // $extension = pathinfo($image, PATHINFO_EXTENSION);
        // $name = (string) Str::uuid().".".$extension; // use Illuminate\Support\Str;
        // echo $extension;

        // $pathName = $image->getPathName();
        // $file = fopen($pathName, 'r');
        // $object = $defaultBucket->upload($file, [
        //      'name' => $name,
        //      'predefinedAcl' => 'publicRead'
        // ]);
        // $image_url = 'https://storage.googleapis.com/'.env('FIREBASE_PROJECT_ID').'.appspot.com/'.$name;

        // echo $uploadedObject->signedUrl($expiresAt) . PHP_EOL;

        // Direct access
        // echo $storage->getBucket()->object('test.jpg')->signedUrl($expiresAt);

        // $image = $request->imagen; //image file from frontend  
        // $student   = app('firebase.firestore')->database()->collection('Student')->newDocument();
        // $firebase_storage_path = 'Student/';  
        // $name     = $student->id();  
        // $localfolder = public_path('firebase-temp-uploads') .'/';  
        // $extension = pathinfo($image, PATHINFO_EXTENSION);
        // $file      = $name. '.' . $extension;  
        // if ($image->move($localfolder, $file)) {  
        //     $uploadedfile = fopen($localfolder.$file, 'r');  
        //     app('firebase.storage')->getBucket()->upload($uploadedfile, ['name' => $firebase_storage_path . $name]);  
        //     //will remove from local laravel folder  
        //     unlink($localfolder . $file);  
        //     echo 'success';  
        // } else {  
        //     echo 'error';  
        // }  
    }
}
