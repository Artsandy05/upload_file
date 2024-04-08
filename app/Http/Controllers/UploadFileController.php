<?php

namespace App\Http\Controllers;

use App\Http\Services\UploadFileService;
use App\Http\Requests\UploadFileRequest;
use Illuminate\Http\Request;

class UploadFileController extends Controller
{
  protected $uploadFileService;

  public function __construct(UploadFileService $uploadFileService)
  {
    $this->uploadFileService = $uploadFileService;
  }

  public function uploadPage()
  {
    return view('upload');
  }

  public function uploadFile(UploadFileRequest $request)
  {
    $response = $this->uploadFileService->upload($request);
    return $this->uploadFileService->getUploadStatusMessage($response['status'], $response['data']);
  }
}
