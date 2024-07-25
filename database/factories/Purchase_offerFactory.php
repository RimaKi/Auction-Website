<?php

namespace Database\Factories;

use App\Models\Auction_product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Purchase_offer>
 */
class Purchase_offerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'auction_product_id'=>Auction_product::all()->shuffle()->first()->id,
            'user_id'=>User::factory()->create(['is_admin' => false])->id,
            'amount' => rand(500,5000) + (rand(50,250)*rand(1,10))
        ];
    }
}
