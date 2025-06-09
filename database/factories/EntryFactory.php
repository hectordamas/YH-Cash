<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Entry>
 */
class EntryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'contable_id' => $this->faker->numberBetween(1, 41),
            'cash_id' => $this->faker->numberBetween(1, 6),
            'monto' => $this->faker->randomFloat(2, 1, 2000),
            'descripcion' => $this->faker->text,
        ];
    }
}
