<?php

namespace Database\Factories;

use App\Models\Sales;
use Illuminate\Database\Eloquent\Factories\Factory;

class SalesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sales::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id'=>$this->faker->numberBetween(1,10),
            'quantity'=>$this->faker->numberBetween(0,100),
            'discount'=>$this->faker->numberBetween(1,10),
            'invoice_id'=>$this->faker->numberBetween(1,6),
            'created_at'=>$this->faker->dateTimeBetween('-6 month','+1 month'),
        ];
    }
}
