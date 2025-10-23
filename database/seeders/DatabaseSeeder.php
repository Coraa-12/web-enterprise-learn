<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Book;
use App\Models\Profile;
use App\Models\Author;
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

        // Create sample authors
        $rifqi = Author::create([
            'name' => 'M. Rifqi',
            'email' => 'rifqi@example.com',
            'bio' => 'Experienced Laravel developer and technical writer. Author of multiple programming books focused on web development.',
        ]);

        $johnDoeAuthor = Author::create([
            'name' => 'John Doe',
            'email' => 'johndoe.author@example.com',
            'bio' => 'PHP enthusiast with 10+ years of experience. Passionate about teaching programming to beginners.',
        ]);

        $fitzgerald = Author::create([
            'name' => 'F. Scott Fitzgerald',
            'email' => 'fitzgerald@example.com',
            'bio' => 'Classic American novelist known for depicting the Jazz Age. Author of The Great Gatsby and other literary masterpieces.',
        ]);

        $asimov = Author::create([
            'name' => 'Isaac Asimov',
            'email' => 'asimov@example.com',
            'bio' => 'Prolific science fiction writer and biochemistry professor. Known for Robot and Foundation series.',
        ]);

        // Create sample books (One-to-Many: Author has many Books)
        Book::create([
            'book_code' => '001',
            'title' => 'Laravel',
            'author_id' => $rifqi->id,
            'price' => 100000,
            'category_id' => $programming->id,
        ]);

        Book::create([
            'book_code' => '002',
            'title' => 'PHP for Beginners',
            'author_id' => $johnDoeAuthor->id,
            'price' => 85000,
            'category_id' => $programming->id,
        ]);

        Book::create([
            'book_code' => '003',
            'title' => 'The Great Gatsby',
            'author_id' => $fitzgerald->id,
            'price' => 75000,
            'category_id' => $fiction->id,
        ]);

        // Additional books to demonstrate one-to-many (M. Rifqi has multiple books)
        Book::create([
            'book_code' => '004',
            'title' => 'Advanced Laravel Techniques',
            'author_id' => $rifqi->id,
            'price' => 120000,
            'category_id' => $programming->id,
        ]);

        Book::create([
            'book_code' => '005',
            'title' => 'Foundation',
            'author_id' => $asimov->id,
            'price' => 95000,
            'category_id' => $science->id,
        ]);

        Book::create([
            'book_code' => '006',
            'title' => 'I, Robot',
            'author_id' => $asimov->id,
            'price' => 85000,
            'category_id' => $science->id,
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
