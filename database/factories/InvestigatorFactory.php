<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Category;
use App\Models\Institute;
use App\Models\Investigator;
use App\Models\Publication;
use App\Models\Site;
use App\Models\Study;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvestigatorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Investigator::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'institute_id' => Institute::factory(),
            'picture' => $this->faker->sentence(),
            'name' => $this->faker->name(),
            'description' => '<p>' . implode('</p><p>', $this->faker->paragraphs(6)) . '</p>',
            'number' => $this->faker->unique()->tollFreePhoneNumber(),
            'office' => $this->faker->address(),
            'website' => $this->faker->url(),
            'cv' => $this->faker->url(),
            'slug' => $this->faker->slug(),
        ];
    }

}
