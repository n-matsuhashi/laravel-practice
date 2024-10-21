<?php

namespace Database\Factories;

use App\Models\Office;
use Illuminate\Database\Eloquent\Factories\Factory;

class OfficeFactory extends Factory
{
    protected $model = Office::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'post_code' => $this->faker->randomNumber(7, true),
            'address' => $this->faker->address,
            'stair' => $this->faker->numberBetween(1, 20),
        ];
    }
}
