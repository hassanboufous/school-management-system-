<?php
namespace App\traits;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\DBAL\TimestampType;

trait UploadImg {

  public function uplodIgmage($file,$folder,$disk="public") {
    $filename = $file->extension();
    $file_name = now()->timestamp .'.' . $filename;
    $path = $file->storeAs($folder,$file_name,$disk);
    return $path ;
  }

  public function DeleteFromStorage($file,$disk="public"){
    $exists = Storage::disk($disk)->exists($file);
    if($exists){
      Storage::disk($disk)->delete($file);
    }
  }
}
