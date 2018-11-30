<?php

namespace App\Http\Controllers\Uploader;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageUploadController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function upload(Request $request)
    {
        dd($request->file);
    }
}
