<?php

namespace App\Http\Controllers;

use App\Http\Helper\FileHelper;
use App\Http\Requests\AddOldProductRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Auction_product;
use App\Models\Product;
use App\Models\Purchase_offer;
use App\Models\Type;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function addProductView()
    {
        //TODO
        $ids = Product::query()->whereHas('auction_products.auction', function ($query) {
            return $query->where('end_date', '>', Carbon::now());
        })->select('id')->get();
        $oldProduct = Product::query()->where('user_id', auth()->user()->id)
            ->where('status', 'publish')
            ->whereNotIn('id', $ids)->with('type', 'media')->get();
        $types = Type::all();

        return view('user-pages.add-product', ['products' => $oldProduct, 'types' => $types]);
    }

    public function addOldProduct(AddOldProductRequest $request)
    {
        $data = $request->only(['auction_id', 'product_ids']);
        foreach ($data['product_ids'] as $id) {
            Auction_product::create([
                'auction_id' => $data['auction_id'],
                'product_id' => $id
            ]);
        }
        return redirect('/auction/' . $data['auction_id']);
    }


    public function addNewProduct(ProductRequest $request)
    {
        DB::transaction(function () use ($request) {
            $data = $request->only('auction_id', 'name', 'description', 'link', 'type_id', 'bid_amount',
                'min_price', 'closing_price', 'reach_rate', 'files');
            $data['user_id'] = auth()->user()->id;
            $data['status'] = 'pending';
            $product = Product::create($data);
            if ($request->has('files')) {
                foreach ($data['files'] as $file) {
                    FileHelper::addFile($product, $file);
                }
            }
            Auction_product::create([
                'auction_id' => $data['auction_id'],
                'product_id' => $product->id
            ]);
        });

        return redirect('/auction/' . $request->auction_id);

    }

    public function editProductView($product)
    {
        $product = Product::query()->where('id', $product)->with('media', 'type')->first();
        return view('user-pages.edit-product', ['product' => $product, 'types' => Type::all()]);
    }

    public function edit(ProductRequest $request, Product $product)
    {
        $data = $request->only('name', 'description', 'link', 'type_id', 'bid_amount', 'min_price',
            'closing_price', 'reach_rate');

        $product->update($data);
        return redirect('product/edit-form/' . $product->id);
    }

    public function viewHistory()
    {
        $products = Product::query()->where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'DESC')
            ->with(['media'])
            ->get();
        $offers = Purchase_offer::query()->where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'DESC')
            ->with('auction_product.product')->get();
        return view('user-pages.history', ['products' => $products, 'offers' => $offers]);
    }

    public function view($id){
        $product = Product::where('id',$id)->with(['auction_products'=>function($q){
            $q->with(['auction','purchase_offers'=>function($query){
                $query->orderBy('created_at', 'DESC')->with('user');
            }]);
        }])->first();
//        return $product;
        return view('user-pages.view-product-details',['product'=>$product]);

    }
}
