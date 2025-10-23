# One-to-One Relationship: User and Profile

## 📖 Overview

This guide explains how the **one-to-one relationship** between `User` and `Profile` models works in our Laravel application. Each user has exactly **one profile**, and each profile belongs to exactly **one user**.

## 🗂️ Database Structure

### Tables Created

**users** table (Laravel default):
```sql
id (Primary Key)
name
email
password
created_at
updated_at
```

**profiles** table:
```sql
id (Primary Key)
user_id (Foreign Key, UNIQUE) ← This UNIQUE constraint enforces one-to-one!
bio (TEXT, nullable)
created_at
updated_at
```

### Key Database Features

✅ **UNIQUE Constraint** on `user_id`: Prevents multiple profiles for the same user  
✅ **Foreign Key** with `CASCADE DELETE`: Deleting a user automatically deletes their profile  
✅ **Nullable Bio**: Users can have a profile without a bio

## 🔗 Eloquent Relationships

### User Model (`app/Models/User.php`)

```php
/**
 * Get the profile associated with the user (One-to-One).
 */
public function profile(): HasOne
{
    return $this->hasOne(Profile::class);
}
```

**Usage:**
```php
$user = User::find(1);
$bio = $user->profile->bio; // Access profile data directly
```

### Profile Model (`app/Models/Profile.php`)

```php
/**
 * Get the user that owns the profile (One-to-One).
 */
public function user(): BelongsTo
{
    return $this->belongsTo(User::class);
}
```

**Usage:**
```php
$profile = Profile::find(1);
$userName = $profile->user->name; // Access user data from profile
```

## 💻 Implementation Files

### Migration (`database/migrations/2025_10_23_033859_create_profiles_table.php`)

```php
Schema::create('profiles', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('user_id')->unique(); // CRITICAL: unique for 1-to-1
    $table->text('bio')->nullable();
    $table->timestamps();
    
    $table->foreign('user_id')
          ->references('id')
          ->on('users')
          ->onDelete('cascade');
});
```

### Seeder (`database/seeders/DatabaseSeeder.php`)

```php
// Create user
$testUser = User::factory()->create([
    'name' => 'Test User',
    'email' => 'test@example.com',
]);

// Create profile for that user (one-to-one)
Profile::create([
    'user_id' => $testUser->id,
    'bio' => 'Dedicated admin managing our community...',
]);
```

### Controller (`app/Http/Controllers/UserController.php`)

```php
public function index()
{
    // Eager load profiles to avoid N+1 query problem
    $users = User::with('profile')->get();

    return view('users.index', compact('users'));
}
```

**Why Eager Loading?**  
Without `with('profile')`, Laravel would execute 1 query for users + N queries for each user's profile (N+1 problem). Eager loading fetches everything in just 2 queries.

### Route (`routes/web.php`)

```php
Route::get('/users', [UserController::class, 'index'])->name('users.index');
```

### View (`resources/views/users/index.blade.php`)

```blade
@forelse ($users as $user)
    <tr>
        <td>{{ $user->name }}</td>
        <td>
            @if($user->profile)
                {{ $user->profile->bio }}
            @else
                <span class="text-muted">No profile available</span>
            @endif
        </td>
    </tr>
@endforelse
```

## 🧪 Testing the Relationship

### 1. View Users with Profiles

Visit: `http://localhost:8080/users`

You should see a table with:
- Test User → "Dedicated admin managing our community..."
- John Doe → "Full-stack developer specializing in Laravel..."
- Jane Doe → "UI/UX designer with a passion for..."

### 2. Test in Tinker

```bash
docker compose exec php php artisan tinker
```

**Fetch user and their profile:**
```php
$user = User::find(1);
$user->profile->bio; // Returns the bio text
```

**Fetch profile and their user:**
```php
$profile = Profile::find(1);
$profile->user->name; // Returns the user's name
```

**Try to create duplicate profile (should fail):**
```php
Profile::create(['user_id' => 1, 'bio' => 'This will fail!']);
// Error: Integrity constraint violation (unique constraint)
```

### 3. Test Cascade Delete

```php
$user = User::find(1);
$user->delete(); // This deletes the user AND their profile automatically

Profile::find(1); // Returns null (profile was deleted)
```

### 4. Check Database in phpMyAdmin

1. Open: `http://localhost:8081`
2. Login: `root` / `secret`
3. Select `app_db` database
4. View `profiles` table
5. Confirm each `user_id` appears only once (unique constraint working)

## 🚨 Common Mistakes and Solutions

### ❌ Mistake 1: Forgetting UNIQUE Constraint

**Problem:** Multiple profiles for the same user  
**Solution:** Migration must have `->unique()` on `user_id` column

### ❌ Mistake 2: N+1 Query Problem

**Problem:** Too many database queries  
**Bad Code:**
```php
$users = User::all(); // 1 query
foreach ($users as $user) {
    echo $user->profile->bio; // N additional queries!
}
```

**Solution:** Use eager loading
```php
$users = User::with('profile')->get(); // Just 2 queries total
```

### ❌ Mistake 3: Null Profile Errors

**Problem:** Calling `$user->profile->bio` when user has no profile crashes  
**Solution:** Always check if profile exists in views
```blade
@if($user->profile)
    {{ $user->profile->bio }}
@else
    No profile
@endif
```

## 📊 One-to-One vs. Other Relationships

| Relationship | Example | Database Constraint |
|--------------|---------|---------------------|
| **One-to-One** | User → Profile | UNIQUE foreign key |
| One-to-Many | Category → Books | Regular foreign key (no unique) |
| Many-to-Many | Students ↔ Courses | Pivot table (e.g., `course_student`) |

## 🎯 Key Takeaways

1. ✅ **UNIQUE constraint** on foreign key = one-to-one relationship
2. ✅ Use `hasOne()` in the parent model (User)
3. ✅ Use `belongsTo()` in the child model (Profile)
4. ✅ Always use **eager loading** (`with()`) to avoid N+1 queries
5. ✅ Check for null profiles in views to prevent errors
6. ✅ Cascade delete ensures no orphaned profiles

## 🔄 Recreating This Feature

If you need to recreate this feature:

```bash
# 1. Create model and migration
docker compose exec php php artisan make:model Profile -m

# 2. Edit migration file (add unique user_id, bio, foreign key)
# 3. Add relationships to User and Profile models

# 4. Run migration
docker compose exec php php artisan migrate

# 5. Update DatabaseSeeder with profile data
# 6. Seed the database
docker compose exec php php artisan db:seed

# 7. Create controller
docker compose exec php php artisan make:controller UserController

# 8. Add route, create view
# 9. Visit http://localhost:8080/users
```

## 🆘 Need Help?

**AI Prompt for ChatGPT/Claude:**
```
I'm working with Laravel's one-to-one Eloquent relationships. I have a User model 
that hasOne Profile, and a Profile model that belongsTo User. The profiles table 
has a unique user_id foreign key. Can you help me [explain your specific issue]?
```

**Useful Commands:**
```bash
# Check current database structure
docker compose exec php php artisan migrate:status

# Reset and reseed everything
docker compose exec php php artisan migrate:fresh --seed

# Test relationships in Tinker
docker compose exec php php artisan tinker
```

---

**📝 Documentation created as part of web-enterprise-learn project**  
**Database relationships teaching module for Web Programming Enterprise class**
