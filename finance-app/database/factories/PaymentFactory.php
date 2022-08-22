<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "attendAmount" => $this->faker->numberBetween(1,30),
            "illAmount" => $this->faker->numberBetween(1,30),
            "absenceAmount" => $this->faker->numberBetween(1,30),
        ];
    }
}
