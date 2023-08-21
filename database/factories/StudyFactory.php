<?php

namespace Database\Factories;

use App\Models\Investigator;
use App\Models\Model;
use App\Models\Study;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Study::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'level' => $this->faker->word(),
            'school' => $this->faker->company(),
            'career' => $this->faker->jobTitle(),
            'period' => $this->faker->year($max = 'now'),
        ];
    }

    public function relationship()
    {
        $study = Study::factory()
            ->has(Investigator::factory()->count(3))
            ->create();
    }
}
