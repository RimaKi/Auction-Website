<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'link',
        'user_id',
        'type_id',
        'bid_amount',
        'min_price',
        'closing_price',
        'reach_rate',
        'status'

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function auction_products()
    {
        return $this->hasMany(Auction_product::class);
    }

    public function media()
    {
        return $this->morphMany(Media::class, 'fileable');
    }
}
