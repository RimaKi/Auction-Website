<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\Product;
use App\Models\Type;

class AuctionController extends Controller
{
    public function view($id, $type_id = null)
    {
        $types = Type::with('media')->get();
        $data = Auction::query()->where('id', $id)->with('auction_products.product', function ($query) use ($type_id) {
            if ($type_id != null) {
                return $query->where('type_id', $type_id)->whereIn('status', ['publish', 'sold'])->with('media');
            }
            return $query->whereIn('status', ['publish', 'sold'])->with('media');
        })->first();
        return view('user-pages.auction-details', ['data' => $data, 'types' => $types]);
    }

}
