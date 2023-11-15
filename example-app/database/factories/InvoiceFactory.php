<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Customer;
use App\Models\Invoice;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Invoice::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = fake()->randomElement(['B', 'P', 'V']);
        
        return [
            'customer_id' => Customer::factory(),
            'amount' => fake()->numberBetween(100, 20000),
            'status' => $status,
            'billed_at' => fake()->dateTimeThisDecade(),
            'paid_at' => $status == 'P' ? fake()->dateTimeThisDecade() : NULL
        ];
    }
}
