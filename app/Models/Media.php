<?php

namespace App\Models;

use App\Enums\FileType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'path',
        'type',
        'size',
        'fileable_id',
        'fileable_type'
    ];

    public function fileable()
    {
        return $this->morphTo();
    }
    public function getUrlAttribute(){
        if($this->getAttribute("path")!=null ||$this->getAttribute("path")!=""
            &&Storage::disk("public")->exists($this->getAttribute("path")) ){
            return Storage::disk("public")->url($this->getAttribute("path"));
        }
        return "";
    }

}
