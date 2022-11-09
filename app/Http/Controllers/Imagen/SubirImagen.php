<?php

namespace App\Http\Controllers\Imagen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubirImagen extends Controller
{
    public function subir(Request $request)
    {   
        $Event=request()->except('_token');
        dd($Event);
        // $imagen = $request->imagen;
        // $storage = app('firebase.storage');
        // $imageFile = file_get_contents($request);

        // $uploadedObject = $storage
        //     ->getBucket()
        //     ->upload($imageFile, [
        //         'name' => '2.jpg'
        //     ]);

        // $expiresAt = new \DateTime('tomorrow');

        // echo $uploadedObject->signedUrl($expiresAt) . PHP_EOL;

        // // Direct access
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
