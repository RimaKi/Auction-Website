<?php

namespace App\Models;

use App\Enums\FileType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $fillable=[
        'description',
        'filePath',
        'type',
        'size',
        'postId'
    ];
    protected function casts(): array
    {
        return [
            'type' => FileType::class,
        ];
    }

    public function post(){
        return $this->belongsTo(Post::class,'postId','id');
    }
}
