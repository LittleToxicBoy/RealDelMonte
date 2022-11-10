<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\helpers\imageController;
use Image;


class TestUploadImage extends Component
{
    use WithFileUploads;
    public $image;


    public function upload(){
        $image = $this->image;
        $imageController  =  new imageController();
        $url = $imageController->uploadImageGcs($image,'olabb','lugares');
        dd($url);
    }

    public function render()
    {


        return view('livewire.test-upload-image');
    }
}
