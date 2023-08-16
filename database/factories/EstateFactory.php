<?php

namespace Database\Factories;

use App\Models\Estate;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Estate>
 */
class EstateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => 'test',
            'is_published' => true,
            'price' => 12000,
            'state' => Estate::LOCATION,
            'paiement' => Estate::YEARLY,
            'description' => '<p>Test</p>',
            'localisation' => '[47.517451, -18.9333]',
            'agence_id' => 1,
        ];
    }
}
