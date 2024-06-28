<?php

namespace App\Models;

use App\Enums\FileType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

}
