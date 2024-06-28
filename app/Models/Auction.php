<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'description',
        'start_date',
        'end_date',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function auction_products(){
        return $this->hasMany(Auction_product::class);
    }
}
