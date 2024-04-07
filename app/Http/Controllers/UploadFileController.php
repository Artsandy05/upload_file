<?php

namespace App\Http\Controllers;

use App\Http\Services\UploadFileService;
use App\Http\Services\UploadRedirectService;
use App\Http\Requests\UploadFileRequest;

class UploadFileController extends Controller
{
  protected $uploadFileService;
  protected $uploadRedirectService;

  public function __construct(UploadFileService $uploadFileService, UploadRedirectService $uploadRedirectService)
  {
    $this->uploadFileService = $uploadFileService;
    $this->uploadRedirectService = $uploadRedirectService;
  }

  public function uploadPage()
  {
    return view('upload');
  }

  public function uploadFile(UploadFileRequest $request)
  {
    $isSuccessUpload = $this->uploadFileService->upload($request);
    return $this->uploadRedirectService->redirectToUploadPage($isSuccessUpload);
  }
}
