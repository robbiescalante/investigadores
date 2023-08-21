<?php

namespace Database\Factories;

use App\Models\Investigator;
use App\Models\Site;
use Illuminate\Database\Eloquent\Factories\Factory;

class SiteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Site::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'url' => $this->faker->url(),
            'type' => $this->faker->word(),
        ];
    }

    public function relationship()
    {
        $site = Site::factory()
            ->has(Investigator::factory()->count(3))
            ->create();
    }
}
