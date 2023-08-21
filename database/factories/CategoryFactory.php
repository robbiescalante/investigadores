<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Investigator;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word(),
            'slug' => $this->faker->slug(),
        ];
    }

    /* public function relationship()
    {
        $category = Category::factory()
            ->has(Investigator::factory()->count(3))
            ->create();
    } */
}
