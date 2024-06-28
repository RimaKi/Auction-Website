<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auction_product extends Model
{
    use HasFactory;

    protected $fillable = [
        'auction_id',
        'product_id',
        'purchase_offer_id'
    ];

    public function auction()
    {
        return $this->belongsTo(Auction::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function purchase_offer_selected()
    {
        return $this->hasOne(Purchase_offer::class, 'id', 'purchase_offer_id');
    }
    public function purchase_offers()
    {
        return $this->hasMany(Purchase_offer::class,'auction_product_id','id');
    }
}
