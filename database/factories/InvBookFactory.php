<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\InvBook;
use App\Models\Investigator;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvBookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = InvBook::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'investigator_id' => Investigator::factory(),
            'book_id' => Book::factory(),
        ];
    }

    public function relationship()
    {
        $investigator = Investigator::factory()
            ->hasAttached(
                Book::factory()->count(3),
                ['active' => true]
            )
            ->create();
    }
}
