<?php

namespace Database\Factories;

use App\Models\product_supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

class product_supplierFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = product_supplier::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'supplier_id'=>$this->faker->numberBetween(0,20),
            'product_id'=>$this->faker->numberBetween(0,20),
        ];
    }
}
