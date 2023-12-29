<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class CVDownloadController extends Controller
{
    public function download(Request $request, $filepath)
    {
        $disk = 'cvs'; // Make sure this is the correct disk name in your filesystems configuration

        // The path should now include the subdirectories
        if (!Storage::disk($disk)->exists($filepath)) {
            abort(404); // File not found
        }

        // Storage::download automatically sets the correct headers for file download
        return Storage::disk($disk)->download($filepath);
    }
}

