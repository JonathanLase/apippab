<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Glsap>
 */
class GlsapFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'glsap' => $this->faker->randomNumber(8, true),
            'costcenter' => $this->faker->regexify('[A-Z]{5}[0-4]{3}'),
            'namarekening' => $this->faker->sentence(),
        ];
    }
}
