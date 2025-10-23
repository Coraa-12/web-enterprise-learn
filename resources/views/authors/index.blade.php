@extends('layouts.app')

@section('content')
<!-- Page Content-->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <!-- Page Heading -->
            <div class="mb-4">
                <h1 class="fw-bolder">Authors & Their Books</h1>
                <p class="text-muted">Demonstrating One-to-Many Eloquent Relationship (Author → Books)</p>
            </div>

            <!-- Authors Cards -->
            @forelse ($authors as $author)
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="mb-0">{{ $author->name }}</h4>
                                <small>{{ $author->email }}</small>
                            </div>
                            <span class="badge bg-light text-dark">
                                {{ $author->books->count() }} {{ Str::plural('Book', $author->books->count()) }}
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Author Bio -->
                        <div class="mb-3">
                            <h6 class="text-muted">About the Author:</h6>
                            <p class="mb-0">{{ $author->bio }}</p>
                        </div>

                        <!-- Author's Books -->
                        @if($author->books->count() > 0)
                            <h6 class="text-muted mb-3">Books by {{ $author->name }}:</h6>
                            <div class="table-responsive">
                                <table class="table table-hover table-sm mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th style="width: 10%;">Code</th>
                                            <th style="width: 40%;">Title</th>
                                            <th style="width: 25%;">Category</th>
                                            <th style="width: 25%;" class="text-end">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($author->books as $book)
                                            <tr>
                                                <td><code>{{ $book->book_code }}</code></td>
                                                <td class="fw-bold">{{ $book->title }}</td>
                                                <td>
                                                    <span class="badge bg-secondary">
                                                        {{ $book->category->name }}
                                                    </span>
                                                </td>
                                                <td class="text-end">Rp {{ number_format($book->price, 0, ',', '.') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="alert alert-info mb-0">
                                <i class="bi bi-info-circle"></i> This author hasn't published any books yet.
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <div class="alert alert-warning">
                    No authors found. Please run the database seeder.
                </div>
            @endforelse

            <!-- Relationship Information Card -->
            <div class="card mt-4 shadow-sm border-success">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">📚 One-to-Many Relationship Explanation</h5>
                </div>
                <div class="card-body">
                    <h6 class="fw-bold">Database Schema:</h6>
                    <ul>
                        <li><code>authors</code> table: Contains id, name, email, bio</li>
                        <li><code>books</code> table: Contains id, book_code, title, <strong>author_id (FK)</strong>, price, category_id</li>
                    </ul>

                    <h6 class="fw-bold mt-3">Eloquent Relationships:</h6>
                    <pre class="bg-light p-3 rounded"><code>// Author Model
public function books(): HasMany 
{
    return $this->hasMany(Book::class);
}

// Book Model
public function author(): BelongsTo 
{
    return $this->belongsTo(Author::class);
}</code></pre>

                    <h6 class="fw-bold mt-3">Key Features:</h6>
                    <ul>
                        <li>✅ <strong>One Author</strong> can write <strong>MANY Books</strong></li>
                        <li>✅ <strong>Each Book</strong> belongs to <strong>ONE Author</strong></li>
                        <li>✅ <strong>Cascade Delete</strong>: Deleting an author removes all their books</li>
                        <li>✅ <strong>Eager Loading</strong>: Uses <code>Author::with('books')</code> to avoid N+1 queries</li>
                        <li>✅ <strong>Collection Methods</strong>: Can use <code>$author->books->count()</code>, <code>->sum('price')</code>, etc.</li>
                    </ul>

                    <h6 class="fw-bold mt-3">Examples in This Data:</h6>
                    <ul>
                        <li><strong>M. Rifqi</strong> has written 2 books (Laravel, Advanced Laravel Techniques)</li>
                        <li><strong>Isaac Asimov</strong> has written 2 books (Foundation, I Robot)</li>
                        <li><strong>John Doe</strong> and <strong>F. Scott Fitzgerald</strong> each have 1 book</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
