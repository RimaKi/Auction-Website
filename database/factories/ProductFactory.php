<?php

namespace Database\Factories;

use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'link' => $this->faker->url,
            'user_id' => User::factory()->create(['is_admin' => false])->id,
            'type_id' => Type::all()->shuffle()->first()->id,
            'bid_amount' => rand(50,250),
            'min_price' => rand(500,5000),
            'closing_price' => rand(7000,10000),
            'reach_rate' => $this->faker->randomFloat(3,1000),
//            'status'=>$this->faker->randomElements(['pending','publish','sold','rejected'])
            'status' => 'publish'
        ];
    }
}
