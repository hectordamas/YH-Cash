<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expense>
 */
class ExpenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'fecha' => $this->faker->date($format = 'Y-m-d'),
            'monto' => $this->faker->randomFloat(2, 1, 2000),
            'forma_de_pago' => 'Efectivo',
            'numero' => '12345',
            'concepto' => $this->faker->text,
            'descripcion' => $this->faker->text,
            'company_id' => $this->faker->numberBetween(1, 2),
            'bank_id' => $this->faker->numberBetween(1, 3),
            'cash_id' => $this->faker->numberBetween(1, 9),
            'provider_id' => $this->faker->numberBetween(1, 403),
            'contable_id' => $this->faker->numberBetween(1, 42),
            'recibo' => time() . $this->faker->numberBetween(1, 1000)
        ];
    }
}
