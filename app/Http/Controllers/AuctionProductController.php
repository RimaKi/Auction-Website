<?php

namespace App\Http\Controllers;

use App\Models\Auction_product;
use Illuminate\Http\Request;

class AuctionProductController extends Controller
{
    public function view($id){
        $data = Auction_product::query()->where('id',$id)->with(['product.media','product.type','purchase_offers'=>function($q){
           $q->where('user_id',auth()->user()->id);
        }])->first();
        return view('user-pages.view-auction-product',['data'=>$data]);
    }

    public function viewInfoForAdmin($id){
        $data = Auction_product::query()->where('id',$id)
            ->with(['product.user','product.media','product.type','purchase_offers.user'])
            ->first();
        return view('admin-pages.view-auction-product',['data'=>$data]);
    }
}

