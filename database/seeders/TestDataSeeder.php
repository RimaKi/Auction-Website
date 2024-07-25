<?php

namespace Database\Seeders;

use App\Models\Auction;
use App\Models\Auction_product;
use App\Models\Media;
use App\Models\Product;
use App\Models\Purchase_offer;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new User([
            'first_name' => 'jad3an',
            'last_name' => 'Al jad3',
            'email' => 'jad3an@gmail.com',
            'phone' => '+963999999999',
            'password' => '123123123',
            'is_male' => true,
            'is_admin' => true
        ]);
        $admin->save();

        $uesr = new User([
            'first_name' => 'fawzy',
            'last_name' => 'Al fawz',
            'email' => 'fawzy@gmail.com',
            'phone' => '+963999999999',
            'password' => '123123123',
            'is_male' => true,
            'is_admin' => false
        ]);
        $uesr->save();

        $auctions = Auction::factory(4)->create();
        Product::factory(3)->create([
            'user_id'=>2
        ])->each(function ($p) {
            $media = Media::factory(2)->create([
                'fileable_id' => $p->id,
                'fileable_type' => Product::class
            ]);
        });

        foreach ($auctions as $auction) {

            $products = Product::factory(3)->create()->each(function ($p) use ($auction) {
                $j = 3;
                $media = Media::factory(2)->create([
                    'fileable_id' => $p->id,
                    'fileable_type' => Product::class
                ]);
                $aucPro = Auction_product::create([
                    'auction_id' => $auction->id,
                    'product_id' => $p->id
                ]);
                $offers = Purchase_offer::factory(4)->create([
                    'auction_product_id' => $aucPro->id,
                ]);
            });

        }

        Auction::query()->where('end_date', '<=', Carbon::now())->get()->each(function ($a) {
            $auction_products = $a->auction_products()->get();
            $auction_products->each(function ($product) {
                $id = $product->purchase_offers()->orderBy('amount', 'desc')->first()->id;
                $product->update(['purchase_offer_id' => $id]);
            });
        });

    }
}
