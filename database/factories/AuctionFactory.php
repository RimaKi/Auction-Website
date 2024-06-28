<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Auction>
 */
class AuctionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>$this->faker->title,
            'description'=>$this->faker->text,
            'start_date'=>$this->faker->dateTimeBetween('-6 week', '0 week'),
            'end_date'=>$this->faker->dateTimeBetween('-1 week', '+6 week'),
            'user_id'=>User::factory()->create(['is_admin' => true])->id,
        ];
    }
}
