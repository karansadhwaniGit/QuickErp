<?php

namespace Database\Factories;

use App\Models\Customers;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customers::class;

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
            'phone_no'=>$this->faker->phoneNumber(),
            'email'=>$this->faker->email()
        ];
    }
}
