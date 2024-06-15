<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOffer extends Model
{
    use HasFactory;

    protected $fillable = [
        'postId',
        'userId',
        'amount',
        'isSelected'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId', 'id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'postId', 'id');
    }
}
