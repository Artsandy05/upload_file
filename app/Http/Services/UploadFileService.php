<?php

namespace App\Http\Services;

class UploadFileService
{
  public function upload($request): bool
  {
    if ($request->validated()) {
      // Get the original file name
      $originalFileName = $request->file('file')->getClientOriginalName();

      // Store the file in the desired directory
      $path = $request->file('file')->storeAs('uploads', $originalFileName, 'assets');

      // Check if file was successfully stored
      if ($path) {
        return true;
      }
    }

    return false; // File upload failed
  }
}
