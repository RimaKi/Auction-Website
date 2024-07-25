<?php

namespace App\Http\Helper;

use App\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FileHelper
{

    public static function addFile(Model $object, $file)
    {
        $className = class_basename($object);
        $object->media()->create([
            'type' => 'photo',
            'size' => $file->getSize(),
            'path' => Storage::disk('public')->put($className, $file)
        ]);
    }

    public static function editFile(Media $fileId, $file)
    {
        DB::transaction(function () use ($fileId, $file) {
            if ($fileId->path != "") {
                Storage::disk('public')->delete($fileId->path);
            }
            $path = explode('/', $fileId->path)[0];
            $fileId->update([
                'size' => $file->getSize(),
                'path' => Storage::disk('public')->put($path, $file)
            ]);
        });
    }

}
