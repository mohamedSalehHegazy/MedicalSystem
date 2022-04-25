<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


    function uploads_img($file, $path)
    {
        if($file) {

                $fileName = date('YmdHi').$file->getClientOriginalName();
                Storage::disk('local')->put($path . $fileName, File::get($file));
                // dd($fileName);
                return $fileName;

            }
}

