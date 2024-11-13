<?php

namespace App\Http\Controllers;

use App\Models\TemporaryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class ClearTmpController extends Controller
{
    public function clearTempFolder()
    {
        $tempDir = public_path('images/tmp');
        if (File::isDirectory($tempDir)) {
            File::cleanDirectory($tempDir);
        }

        $temporaryImages = TemporaryImage::all();
        foreach($temporaryImages as $image){
            $image->delete();
        }

        return response()->json(['status' => 'Temp folder cleaned']);
    }
}
