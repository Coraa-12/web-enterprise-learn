@extends('layouts.app')

@section('title', 'About Us')
@section('header_title', 'About Us')
@section('header_subtitle', 'Learn more about our team and mission')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <h2>Our Story</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

        <h2 class="mt-4">Our Mission</h2>
        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">Quick Info</div>
            <div class="card-body">
                <p><strong>Founded:</strong> 2023</p>
                <p><strong>Location:</strong> Your City</p>
                <p><strong>Team Size:</strong> 10+</p>
            </div>
        </div>
    </div>
</div>
@endsection
