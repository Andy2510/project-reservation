<?php

namespace App\Helpers;

class PhotoHelper
{
  public function generateUrl($photo)
  {
    // return str_replace('public', 'storage', $this->file_name);
    $photoUrl = explode('/', $photo->imageUrl);

    $photoUrl[0] = 'storage';
    $photoUrl = implode('/', $photoUrl);
    return asset($photoUrl);
    // irasius asset(), mes graziname absolute path, t.y. prideda http://192.168.33.10 ir visuomet nuoroda i nuotrauku kataloga visada liks tokia pati, nebeprides /show/ url'e
  }


  public function deleteOne($photo)
  {
    $this->deleteOneFromFileSystem($photo);

    $photo->delete();
  }

    /**
     * @param $photo
     */

  protected function deleteOneFromFileSystem($photo)
  {
    $path = storage_path('app/' . $photo->file_name);

    if (file_exists($path)){
        unlink($path);
    }
  }
}
