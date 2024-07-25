<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddOfferRequest;
use App\Http\Requests\OfferRequest;
use App\Models\Auction_product;
use App\Models\Purchase_offer;

class OfferController extends Controller
{
    private function editStatus(Purchase_offer $offer, $amount)
    {
        $auction_product = $offer->auction_product()->first();
        $product = $auction_product->product()->first();
        if ($amount >= $product->closing_price) {
            $product->update(['status' => 'sold']);
            $auction_product->update(['purchase_offer_id' => $offer->id]);
        }
    }

    public function edit(OfferRequest $request, Purchase_offer $id)
    {
        $data = $request->only('amount');
        $id->update($data);
        $this->editStatus($id, $data['amount']);
        return redirect()->back();
    }


    public function add(OfferRequest $request, Auction_product $auction_product)
    {
        $data = $request->only('amount');
        $data['user_id'] = auth()->user()->id;
        $offer = $auction_product->purchase_offers()->create($data);
        $this->editStatus($offer,$data['amount']);
        return redirect()->back();
    }
}
