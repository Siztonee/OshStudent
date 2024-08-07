<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\Group::class;

    public function definition()
    {
        $abbreviation = $this->faker->randomElement(['ППК', 'ТОСВТ', 'ПОВТАС', 'ЭНК']);
        $number = $this->faker->numberBetween(1, 7);
        $year = $this->faker->numberBetween(23, 24);

        return [
            'name' => "{$abbreviation}-9-{$number}-{$year}",
        ];
    }
}
