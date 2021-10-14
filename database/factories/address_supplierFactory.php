<?php

namespace Database\Factories;

use App\Models\address_supplier;
use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class address_supplierFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = address_supplier::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'address_id'=>$this->faker->numberBetween(1,20),
            'suppliers_id'=>$this->faker->numberBetween(1,20)
        ];
    }
}
