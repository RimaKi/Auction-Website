<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media>
 */
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description'=>$this->faker->text,
            'path'=>'Product/flower.jpeg',
            'type'=>'photo',
            'size'=>$this->faker->randomFloat(3,1,9000),
            'fileable_id'=>Product::all()->shuffle()->first()->id,
            'fileable_type'=>Product::class
        ];
    }
}
