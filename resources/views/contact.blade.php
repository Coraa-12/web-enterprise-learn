@extends('layouts.app')

@section('title', 'Contact Us')
@section('header_title', 'Contact Us')
@section('header_subtitle', 'We\'d love to hear from you!')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">Send us a Message</div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Your name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" rows="5" placeholder="Your message..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card mb-4">
            <div class="card-header">Contact Information</div>
            <div class="card-body">
                <p><strong>Email:</strong><br>contact@example.com</p>
                <p><strong>Phone:</strong><br>+1 (234) 567-8900</p>
                <p><strong>Address:</strong><br>123 Street Name<br>City, State 12345</p>
            </div>
        </div>
    </div>
</div>
@endsection
