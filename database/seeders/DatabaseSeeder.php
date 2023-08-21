<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use App\Models\Institute;
use App\Models\Investigator;
use App\Models\Publication;
use App\Models\Site;
use App\Models\Study;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Investigator::factory(5)
            ->has(Publication::factory()->count(4))
            ->has(Site::factory()->count(2))
            ->has(Study::factory()->count(5))
            ->has(Tag::factory()->count(2))
            ->has(Category::factory()->count(2))
            ->has(Book::factory()->count(3))
            ->create();

    }
}
