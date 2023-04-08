<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function download(Request $request, $file)
    {
        return response()->download(('project/uploads/attachments/'.$file));
    }
    public function fileDownload(Request $request, $file)
    {
        return response()->download(('project/uploads/files/'.$file));
    }
}
