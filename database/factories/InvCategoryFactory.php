<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\InvCategory;
use App\Models\Investigator;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = InvCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'investigator_id' => Investigator::factory(),
            'category_id' => Category::factory(),
        ];
    }

    public function relationship()
    {
        $investigator = Investigator::factory()
            ->hasAttached(
                Category::factory()->count(3),
                ['active' => true]
            )
            ->create();
    }
}
