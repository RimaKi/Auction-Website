<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuctionSearchRequest;
use App\Models\Auction;
use App\Models\Product;
use App\Models\Purchase_offer;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function viewData(AuctionSearchRequest $request)
    {
        $auctions = Auction::query()
            ->when($request->search, function ($q) use ($request) {
                return $q->where('title', 'like', "%$request->search%")->orWhere('description', 'like', "%$request->search%");
            })->when($request->start_date, function ($q) use ($request) {
                return $q->whereDate('start_date', ">=", $request->start_date);
            })->when($request->end_date, function ($q) use ($request) {
                return $q->whereDate('end_date', "<=", $request->end_date);
            })->where('end_date', '>=', Carbon::now())->get();

        return view('dashboard',
            ['auctions' => $auctions, 'search' => $request->search, 'start_date' => $request->start_date, 'end_date' => $request->end_date]
        );
    }



}
