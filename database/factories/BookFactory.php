<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Investigator;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           'name' => $this->faker->unique()->word(),
           'cover' => $this->faker->url(),
           'url'=> $this->faker->url(),
        ];
    }

    public function relationship()
    {
        $book = Book::factory()
            ->has(Investigator::factory()->count(3))
            ->create();
    }
}
