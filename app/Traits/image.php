<?php

namespace App\Traits;
use Illuminate\Support\Facades\Storage;

trait image{
    public function singleFileUpload($file, $directory, $oldFilePath = null): string
    {
        $imageName = time() . "." . $file->getClientOriginalExtension();

        Storage::put("public/$directory/$imageName", file_get_contents($file));

        if (!is_null($oldFilePath)) {
            $this->deleteFile($oldFilePath);
        }

        return "$directory/$imageName";
    }

    public function deleteFile($path){
       if( Storage :: exists("public/".$path)){
            Storage::delete("public/".$path);
       }
    }
}


?>