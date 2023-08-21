<?php

namespace Database\Factories;

use App\Models\Institute;
use App\Models\Investigator;
use Illuminate\Database\Eloquent\Factories\Factory;

class InstituteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Institute::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word(),
            'country' => $this->faker->country(),
            'logo' => $this->faker->url(),
        ];
    }

    public function relationship()
    {
        $institute = Institute::factory()
            ->has(Investigator::factory()->count(3))
            ->create();
    }
}
