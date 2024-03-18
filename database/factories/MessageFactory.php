<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'message_date' => fake()->date(),
            'message_number' => fake()->unique()->randomNumber(),
            'received_date' => fake()->date(),
            'sender_name' => fake()->name(),
            'sender_city' => fake()->city(),
            'message_object' => fake()->sentence(),
        ];
    }

    
}
