<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\auth>
 */
class AuthFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'username' => fake('id_ID')->userName(),
            'password' => Hash::make('123456'),
            //'role'     => 'admin'
            'role'     => 'admin'
        ];
    }
}
