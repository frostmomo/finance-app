<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Position>
 */
class PositionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name" => $this->faker->randomElement([
                "IT Support",
                "Web Dev",
                "Mobile Dev",
                "NW Dev",
                "OB",
                "Kang sapu",
                "Kang jagal",
                "Apawelah",
                "Yang lain lainnya",
                "kang fotocopy",
            ]),
            "amount" => $this->faker->numberBetween(1000000, 3000000)
        ];
    }
}
