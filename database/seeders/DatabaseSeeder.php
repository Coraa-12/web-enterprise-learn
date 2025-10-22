<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create sample categories
        $programming = Category::create([
            'name' => 'Programming',
        ]);

        $fiction = Category::create([
            'name' => 'Fiction',
        ]);

        $science = Category::create([
            'name' => 'Science',
        ]);

        // Create sample books
        Book::create([
            'book_code' => '001',
            'title' => 'Laravel',
            'author' => 'M. Rifqi',
            'price' => 100000,
            'category_id' => $programming->id,
        ]);

        Book::create([
            'book_code' => '002',
            'title' => 'PHP for Beginners',
            'author' => 'John Doe',
            'price' => 85000,
            'category_id' => $programming->id,
        ]);

        Book::create([
            'book_code' => '003',
            'title' => 'The Great Gatsby',
            'author' => 'F. Scott Fitzgerald',
            'price' => 75000,
            'category_id' => $fiction->id,
        ]);

        // Create test user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
