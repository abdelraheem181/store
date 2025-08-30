<?php

namespace App\Traits;

trait SaveFilesTrait
{
    public function saveFile($file, $path)
    {
      $fileName = time() . '.' . $file->getClientOriginalExtension();
      $file->move(public_path($path), $fileName);
      return $path . '/' . $fileName;
      
    }

    public function deleteFile($path)
    {
      if (file_exists(public_path($path))) {
        unlink(public_path($path));
      }
    }
}