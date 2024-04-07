<?php

namespace App\Http\Services;

class UploadRedirectService
{
  public function redirectToUploadPage($isSuccessUpload)
  {
    $message = $isSuccessUpload ? 'File uploaded successfully.' : 'Failed to upload file.';
    return redirect('/upload-page')->with($isSuccessUpload ? 'success' : 'error', $message);
  }
}
