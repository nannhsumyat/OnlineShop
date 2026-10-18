<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'vocher_no' => $this->faker->ean8,
            'total' => $this->faker->numberBetween(50, 100),
            'qty' => $this->faker->numberBetween(0, 50),
            'payment_slip' => $this->faker->creditCardType,
            'status' => $this->faker->numberBetween(0, 1),
            'notes' => $this->faker->sentence,
            'item_id' => rand(1, 10),
            'payment_id' => rand(1, 10),
            'user_id' => rand(1, 2)
        ];
    }
}
