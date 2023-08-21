<?php

namespace Database\Factories;

use App\Models\Investigator;
use App\Models\Model;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
        ];
    }

    public function relationship()
    {
        $tag = Tag::factory()
            ->has(Investigator::factory()->count(3))
            ->create();
    }
}
