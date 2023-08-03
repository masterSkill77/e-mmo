<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agence>
 */
class AgenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'agence_name' => $this->faker->company(),
            'agence_phone' => $this->faker->phoneNumber(),
            'agence_adresse' => $this->faker->address(),
            'agence_status' => 'SARL',
            'agence_mail' => $this->faker->email(),
            'agence_sender_mail' => $this->faker->email(),
            'agence_smtp_host' => 'localhost',
            'agence_smtp_port' => 2525,
            'agence_smtp_username' => $this->faker->firstName(),
            'agence_logo_id' => 1,
            'agence_site_url' => $this->faker->url(),
            'agence_smtp_password' => '$2y$10$92IXUNpkjO0rOQ',
            'responsable_id' => 1
        ];
    }
}
