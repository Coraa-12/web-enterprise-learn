@extends('layouts.app')

@section('content')
<!-- Page Content-->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <!-- Page Heading -->
            <div class="mb-4">
                <h1 class="fw-bolder">User Profiles</h1>
                <p class="text-muted">Demonstrating One-to-One Eloquent Relationship (User → Profile)</p>
            </div>

            <!-- Users Table -->
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">All Users with Their Profiles</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 5%;">#</th>
                                    <th style="width: 20%;">Name</th>
                                    <th style="width: 25%;">Email</th>
                                    <th style="width: 50%;">Bio</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="fw-bold">{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if($user->profile)
                                                {{ $user->profile->bio }}
                                            @else
                                                <span class="text-muted fst-italic">No profile available</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-4 text-muted">
                                            No users found. Please run the database seeder.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Relationship Information Card -->
            <div class="card mt-4 shadow-sm border-info">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">📚 One-to-One Relationship Explanation</h5>
                </div>
                <div class="card-body">
                    <h6 class="fw-bold">Database Schema:</h6>
                    <ul>
                        <li><code>users</code> table: Contains id, name, email, password</li>
                        <li><code>profiles</code> table: Contains id, <strong>user_id (UNIQUE)</strong>, bio</li>
                    </ul>

                    <h6 class="fw-bold mt-3">Eloquent Relationships:</h6>
                    <pre class="bg-light p-3 rounded"><code>// User Model
public function profile(): HasOne
{
    return $this->hasOne(Profile::class);
}

// Profile Model
public function user(): BelongsTo
{
    return $this->belongsTo(User::class);
}</code></pre>

                    <h6 class="fw-bold mt-3">Key Features:</h6>
                    <ul>
                        <li>✅ <strong>Unique Constraint</strong> on <code>user_id</code> ensures each user has only ONE profile</li>
                        <li>✅ <strong>Cascade Delete</strong>: Deleting a user automatically deletes their profile</li>
                        <li>✅ <strong>Eager Loading</strong>: Uses <code>User::with('profile')</code> to avoid N+1 queries</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
