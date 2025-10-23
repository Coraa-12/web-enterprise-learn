<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Book;
use App\Models\Profile;
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
        $testUser = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Create profile for test user (One-to-One relationship)
        Profile::create([
            'user_id' => $testUser->id,
            'bio' => 'Dedicated admin managing our community and ensuring smooth operations. Passionate about web development and teaching.',
        ]);

        // Create additional users with profiles
        $johnDoe = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);

        Profile::create([
            'user_id' => $johnDoe->id,
            'bio' => 'Full-stack developer specializing in Laravel and Vue.js. Loves building scalable web applications.',
        ]);

        $janeDoe = User::factory()->create([
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
        ]);

        Profile::create([
            'user_id' => $janeDoe->id,
            'bio' => 'UI/UX designer with a passion for creating beautiful and intuitive user experiences.',
        ]);
    }
}
