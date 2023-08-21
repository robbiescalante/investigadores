<?php

namespace Database\Factories;

use App\Models\Investigator;
use App\Models\InvTag;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvTagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = InvTag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'investigator_id' => Investigator::factory(),
            'tag_id' => Tag::factory(),
        ];
    }

    public function relationship()
    {
        $investigator = Investigator::factory()
            ->hasAttached(
                Tag::factory()->count(3),
                ['active' => true]
            )
            ->create();
    }
}
