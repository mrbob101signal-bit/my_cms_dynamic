<?php

namespace App\Helpers;

use Illuminate\Support\Str;


class FileUpload
{


   // public static function upload(
   //    string $path,
   //    string $name,
   //    string $type = "",
   //    string $size = "",
   //    string $error = "",
   //    string $tmp_name = "",
   //    string $extension = ""
   // ) {

   //    $file = [
   //       "path" => $path,
   //       "name" => $name,
   //       "type" => $type,
   //       "size" => $size,
   //       "error" => $error,
   //       "tmp_name" => $tmp_name,
   //       "extension" => $extension,
   //    ];

   //    return $file;
   // }

   # Image Upload 
   // public static function ImageUpload(){}

   // public static function ImageDelete(){}

   // public static function uploadImage($file, $path = 'uploads', $oldFile = null)
   // {
   //    if (!$file) {
   //       return $oldFile; 
   //    }

   //    if ($oldFile && file_exists(public_path($oldFile))) {
   //       unlink(public_path($oldFile));
   //    }

   //    $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();

   //    $file->move(public_path($path), $filename);

   //    return $path . '/' . $filename;
   // }


   public static function uploadImage($file, $folder)
   {

      $filename = time() . '.' . $file->getClientOriginalExtension();
     // $file->move(public_path('uploads/' . $folder), $filename);
      $url = $file->move('uploads/blog/', $filename);
      // return $url;
      return "uploads/$folder/" . $filename;
   }

}
