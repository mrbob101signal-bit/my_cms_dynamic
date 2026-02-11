<?php

namespace App\Service;

class FileUploadService
{
   public function imageUpload($request, $model, $column_name, $path = 'uploads/')
   {
      // Check if the request has a file for the specified column
      if ($request->hasFile($column_name)) {
         $uploaded_file = $request->file($column_name);

         $file_extension = $uploaded_file->getClientOriginalExtension();
         $target_path = public_path($path);

         // Create the target directory if it doesn't exist
         if (!file_exists($target_path)) {
            mkdir($target_path, 0755, true);
         }

         $file_name = $model->id . '_' . time() . '.' . $file_extension;
         $uploaded_file->move($target_path, $file_name);
         // Delete the old file if it existss
         if ($model->$column_name) {
            $old_file = public_path($path . $model->$column_name);
            if (file_exists($old_file)) {
               unlink($old_file);
            }
         }
         return $file_name;
      }

      return null;
   }
}
