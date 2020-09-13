<?php

namespace App\Http\Controllers;

use File;
use Storage;
use Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AssetController extends Controller
{
    /**
     * Stream private asset.
     *
     * @param string $encryptedPath
     * @return Response
     */
    public function stream(string $encryptedPath)
    {
        $path = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, Storage::path(decrypt($encryptedPath)));

        if (!File::exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $type = File::mimeType($path);

        return Response::make($file, 200)->header("Content-Type", $type);
    }
}
