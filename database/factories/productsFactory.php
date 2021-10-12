<?php

namespace Database\Factories;

use App\Models\products;
use Illuminate\Database\Eloquent\Factories\Factory;

class productsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = products::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_name'=>$this->faker->company(),
            'specification'=>$this->faker->catchPhrase(),
            'hsn'=>$this->faker->numberBetween(0,999999),
            'supplier'=>$this->faker->name(),
            'category'=>$this->faker->bs(),
            'selling_price'=>$this->faker->randomNumber(),
            'eoq'=>$this->faker->randomNumber(),
            'danger_level'=>$this->faker->randomNumber(),
        ];
    }
}
