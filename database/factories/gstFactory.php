<?php

namespace Database\Factories;

use App\Models\gst;
use Illuminate\Database\Eloquent\Factories\Factory;

class gstFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = gst::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'hsn_code'=>$this->faker->numberBetween(00000,99999),
            'gst_rate'=>$this->faker->numberBetween(2,18),
            'with_effect_from'=>$this->faker->date()
        ];
    }
}
