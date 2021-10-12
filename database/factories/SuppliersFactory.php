<?php

namespace Database\Factories;

use App\Models\Suppliers;
use Illuminate\Database\Eloquent\Factories\Factory;

class SuppliersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Suppliers::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name'=>$this->faker->name('male'),
            'last_name'=>$this->faker->lastName(),
            'gst_no'=>$this->faker->numberBetween(0,999999),
            'company_name'=>$this->faker->company(),
            'phone_no'=>$this->faker->phoneNumber(),
            'email'=>$this->faker->email()
        ];
    }
}
