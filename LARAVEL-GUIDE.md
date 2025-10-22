# 🚀 Laravel Quick Start Guide

Welcome! Your Docker environment now has **Laravel 12** installed and ready to use!

## 🎯 What Is Laravel?

Laravel is a PHP framework that makes building websites easier. Think of it as a pre-built toolbox that handles the boring stuff (user login, database connections, security) so you can focus on building your unique features.

**Why students love Laravel:**
- ✅ Clear, readable code structure
- ✅ Built-in user authentication (login/register)
- ✅ Powerful database tools (no raw SQL needed!)
- ✅ Huge community = tons of tutorials
- ✅ Used by real companies (makes you job-ready!)

---

## 📂 Important Folders (Where Your Code Lives)

```
📁 your-project/
├── 📁 app/               ← Your PHP code lives here!
│   ├── 📁 Http/Controllers/   ← Controllers (handle web requests)
│   └── 📁 Models/             ← Models (talk to database)
├── 📁 database/
│   └── 📁 migrations/         ← Database table definitions
├── 📁 public/            ← CSS, JS, images go here
├── 📁 resources/
│   └── 📁 views/              ← HTML templates (.blade.php files)
├── 📁 routes/
│   └── web.php                ← Define your website URLs here
└── .env                  ← Configuration (database password, etc.)
```

**👉 Most of your time will be spent in:**
1. `routes/web.php` - Define URLs
2. `app/Http/Controllers/` - Write logic
3. `resources/views/` - Create HTML pages
4. `database/migrations/` - Design database tables

---

## 🎮 Essential Commands (All Windows-Friendly!)

### Running Your Site
```batch
start.bat          ← Start Docker (always run this first!)
open-website.bat   ← Opens http://localhost:8080 in browser
stop.bat           ← Stop Docker when you're done
```

### Database Commands
```batch
migrate.bat        ← Create/update database tables
open-database.bat  ← Open phpMyAdmin (visual database manager)
```

### Laravel Commands (Copy-Paste in PowerShell)
```powershell
# Create a new controller
docker compose exec php php artisan make:controller HomeController

# Create a new database table definition
docker compose exec php php artisan make:migration create_products_table

# Create a model (talks to database)
docker compose exec php php artisan make:model Product

# See all available commands
docker compose exec php php artisan list
```

---

## 🏗️ Your First Feature (Step-by-Step)

Let's build a simple "About Us" page in **4 easy steps**:

### Step 1: Create a Route (Define the URL)
Open `routes/web.php` and add:

```php
Route::get('/about', function () {
    return view('about');
});
```

**Translation:** "When someone visits `/about`, show them the `about` view"

---

### Step 2: Create a View (The HTML Page)
Create file: `resources/views/about.blade.php`

```html
<!DOCTYPE html>
<html>
<head>
    <title>About Us</title>
</head>
<body>
    <h1>About Our Company</h1>
    <p>We make awesome websites! 🚀</p>
</body>
</html>
```

---

### Step 3: Test It!
1. Run `start.bat` (if not already running)
2. Open browser: `http://localhost:8080/about`
3. See your page! 🎉

---

### Step 4: Make It Dynamic (Use a Controller)
Instead of putting code in `routes/web.php`, let's use a controller:

**Create controller:**
```powershell
docker compose exec php php artisan make:controller AboutController
```

**Edit `app/Http/Controllers/AboutController.php`:**
```php
<?php

namespace App\Http\Controllers;

class AboutController extends Controller
{
    public function index()
    {
        $teamMembers = ['Alice', 'Bob', 'Charlie'];
        return view('about', ['team' => $teamMembers]);
    }
}
```

**Update route in `routes/web.php`:**
```php
use App\Http\Controllers\AboutController;

Route::get('/about', [AboutController::class, 'index']);
```

**Update view `resources/views/about.blade.php`:**
```html
<h1>About Us</h1>
<h2>Our Team:</h2>
<ul>
    @foreach($team as $member)
        <li>{{ $member }}</li>
    @endforeach
</ul>
```

**Refresh browser** - Now you have a dynamic page! 🎊

---

## 🗄️ Working with Database (The Easy Way)

### Step 1: Define a Table Structure (Migration)
```powershell
docker compose exec php php artisan make:migration create_posts_table
```

**Edit the created file in `database/migrations/`:**
```php
public function up()
{
    Schema::create('posts', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('content');
        $table->timestamps(); // Adds created_at and updated_at
    });
}
```

### Step 2: Create the Table
```batch
migrate.bat
```
Now check phpMyAdmin at `http://localhost:8081` - your table exists!

### Step 3: Create a Model
```powershell
docker compose exec php php artisan make:model Post
```

### Step 4: Use the Model in a Controller
```php
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all(); // Get all posts from database
        return view('posts.index', ['posts' => $posts]);
    }

    public function store()
    {
        // Create a new post
        Post::create([
            'title' => 'My First Post',
            'content' => 'Hello Laravel!'
        ]);
    }
}
```

**No SQL needed!** Laravel handles it all. 🪄

---

## 🆘 Common Problems & Fixes

### "404 Not Found" After Creating a Route
**Fix:** Clear Laravel's route cache
```powershell
docker compose exec php php artisan route:clear
```

### "Class 'X' not found"
**Fix:** Rebuild autoload files
```powershell
docker compose exec php composer dump-autoload
```

### Changes Not Showing Up
**Fix:** Clear all caches
```powershell
docker compose exec php php artisan cache:clear
docker compose exec php php artisan config:clear
docker compose exec php php artisan view:clear
```

### Database Connection Error
**Fix:** Check your `.env` file has:
```env
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=app_db
DB_USERNAME=root
DB_PASSWORD=secret
```

### "Something is wrong" (Generic Error)
**Fix:** The magic trio:
```batch
1. stop.bat
2. start.bat
3. Refresh browser
```

---

## 📚 Learning Resources (Beginner-Friendly!)

### Official Documentation
- **Laravel Docs:** https://laravel.com/docs
  - Start with: "Getting Started" → "Routing" → "Controllers"
  - Then: "Database" → "Eloquent ORM"

### Video Tutorials (FREE!)
- **Laracasts:** https://laracasts.com/series/laravel-11-for-beginners
  - The Netflix of Laravel tutorials
  - Start with the "Laravel for Beginners" series

### When You're Stuck
Use this AI prompt (copy-paste to ChatGPT/Claude):

```
I'm a university student learning Laravel 12 in a Docker environment.
I'm trying to [describe your task], but I'm getting this error:

[paste error message]

Here's my code:
[paste relevant code]

Can you explain what's wrong in simple terms and show me the fix?
I'm new to Laravel, so please explain any technical terms.
```

---

## 🎯 Assignment Survival Tips

### Before You Start Coding
1. ✅ Run `start.bat` and verify http://localhost:8080 works
2. ✅ Open phpMyAdmin at http://localhost:8081 (test DB connection)
3. ✅ Check status.php shows all services GREEN

### During Development
- **Save files often** - Docker auto-reloads changes
- **Test in browser after each change** - catch errors early
- **Use phpMyAdmin** to check if database changes worked
- **Read error messages carefully** - Laravel errors are helpful!

### Before Submitting
- [ ] All pages load without errors
- [ ] Database tables exist (check phpMyAdmin)
- [ ] No hardcoded passwords in code (use `.env`)
- [ ] Run `stop.bat` when done to free up RAM

---

## 🤝 Getting Help

**In order of speed:**
1. **TROUBLESHOOTING.md** - 50+ solved issues
2. **AI Assistant** - Use the prompt template above
3. **Laravel Docs** - Search for your problem
4. **Classmates** - They might have hit the same issue!
5. **Stack Overflow** - Search: "Laravel 12 [your problem]"

---

## 🚀 Next Steps

Now that Laravel is installed:

1. **Read official docs:** https://laravel.com/docs/routing
2. **Build something small:** Todo list, blog, contact form
3. **Learn Blade templating:** https://laravel.com/docs/blade
4. **Master database queries:** https://laravel.com/docs/eloquent

**You've got this!** 💪 Laravel might seem scary at first, but thousands of students have learned it successfully. Take it one feature at a time.

---

**Last Updated:** When Laravel 12 was installed
**Docker Environment:** PHP 8.3 + MySQL 8.0 + Nginx
**Need Help?** Check TROUBLESHOOTING.md or use the AI prompt above!
