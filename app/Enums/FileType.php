<?php

namespace App\Enums;

enum FileType: string
{
    case Video = 'video';
    case File = 'file';
    case Photo = 'photo';
}
