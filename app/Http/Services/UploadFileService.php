<?php

namespace App\Http\Services;

use Illuminate\Http\Request;

class UploadFileService
{
  public function upload($request): array
  {
    $response = ['status' => false, 'path' => null];

    if ($request->validated()) {
      // Get the original file name
      $originalFileName = $request->file('file')->getClientOriginalName();

      // Store the file in the desired directory
      $path = $request->file('file')->storeAs('uploads', $originalFileName, 'assets');

      // Check if file was successfully stored
      if ($path) {
        $response['status'] = true;
        $response['data'] = [$path, $originalFileName];
      }
    }

    return $response;
  }

  public function getUploadStatusMessage(bool $isSuccessUpload, $data): string
  {
    [$path, $originalFileName] = $data;
    $message = $isSuccessUpload ? $originalFileName . ' to ' . $path : 'Failed to upload file.';
    return $message;
  }
}
