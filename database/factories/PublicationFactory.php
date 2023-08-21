<?php

namespace Database\Factories;

use App\Models\Investigator;
use App\Models\Publication;
use Illuminate\Database\Eloquent\Factories\Factory;

class PublicationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Publication::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'apa' => $this->faker->sentence(10, true),
        ];
    }

    public function relationship()
    {
        $publication = Publication::factory()
            ->has(Investigator::factory()->count(3))
            ->create();
    }
}
