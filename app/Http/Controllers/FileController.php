<?php

namespace App\Http\Controllers;

use App\Http\Helper\FileHelper;
use App\Http\Requests\EditFileRequest;
use App\Models\Media;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function edit(EditFileRequest $request)
    {
        $data = $request->only('files');
        foreach ($data["files"] as $item) {
            if (array_key_exists('file',$item)) {
                $media = Media::where('id', $item['id'])->first();
                Storage::disk('public')->delete($media->path);
                FileHelper::editFile($media, $item['file']);
            }
        }
        return redirect()->back();
    }
}
