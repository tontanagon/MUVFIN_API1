<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'first_name' =>$this-> faker->firstName,
            'last_name' =>$this-> faker->lastName,
            'email' => function (array $attributes) {
                // ให้ CustomerFactory ใช้ email จาก UserFactory
                return $attributes['email'] ?? $this->faker->unique()->safeEmail;
            },
            'phone' =>$this-> faker->phoneNumber,
            'status'=>1,
        ];
    }
}
