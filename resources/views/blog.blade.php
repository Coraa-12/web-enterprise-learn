@extends('layouts.app')

@section('title', 'Blog')
@section('header_title', 'All Blog Posts')
@section('header_subtitle', 'Browse our latest articles and updates')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <!-- This is a placeholder - you'll connect to database later -->
        <div class="alert alert-info">
            <strong>Coming Soon!</strong> Blog posts will be loaded from the database here.
        </div>

        <!-- Sample blog post -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="small text-muted">{{ date('F d, Y') }}</div>
                <h2 class="card-title">Sample Blog Post</h2>
                <p class="card-text">This is where your dynamic blog posts from the database will appear. You'll learn how to create controllers and models to fetch posts!</p>
                <a class="btn btn-primary" href="#!">Read more →</a>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">Tip</div>
            <div class="card-body">
                Check LARAVEL-GUIDE.md to learn how to create a Post model and display real blog posts here!
            </div>
        </div>
    </div>
</div>
@endsection
