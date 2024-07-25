<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase_offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'auction_product_id',
        'user_id',
        'amount',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function auction_product()
    {
        return $this->belongsTo(Auction_product::class);
    }

}
