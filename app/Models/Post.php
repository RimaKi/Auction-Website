<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'categoryId',
        'minimumPrice',
        'unit',
        'bidAmount',
        'userId'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId', 'id');
    }
 public function category()
    {
        return $this->belongsTo(Category::class, 'categoryId', 'id');
    }

    public function medias()
    {
        return $this->hasMany(Media::class, 'postId', 'id');
    }

    public function purchaseOffers()
    {
        return $this->hasMany(PurchaseOffer::class, 'postId', 'id');
    }

}
