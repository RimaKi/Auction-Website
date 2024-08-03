<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuctionRequest;
use App\Http\Requests\EditAuctionRequest;
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
            if(!auth()->check() || !auth()->user()->is_admin){
                return $query->whereIn('status', ['publish', 'sold'])->with('media');
            }
        })->first();
        if(auth()->check() && auth()->user()->is_admin){
            return view('admin-pages.auction-details', ['data' => $data, 'types' => $types]);

        }
        return view('user-pages.auction-details', ['data' => $data, 'types' => $types]);
    }

    public function addForm(){
        return view('admin-pages.add-auction');
    }

    public function add(AuctionRequest $request)
    {
        $data = $request->only(['title', 'description', 'start_date', 'end_date']);
        $data['user_id'] = auth()->user()->id;
        $auction = Auction::create($data);
        return redirect('/auction/'.$auction->id);
    }

    public function editForm(Auction $id){
        return view('admin-pages.edit-auction',['auction'=>$id]);
    }

    public function edit(EditAuctionRequest $request,Auction $id){
        $data=$request->only(['title','description','start_date','end_date']);
        $id->update($data);
        return redirect('/auction/'.$id->id);
    }




}
