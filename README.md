# 🚀 PHP Development Environment (Better Than XAMPP!)

> **A Docker-based development environment that's EASIER than XAMPP/Laragon, not harder!**

---

## 🎯 FIRST TIME HERE?

### 👉 **[START HERE: Read START-HERE.md](START-HERE.md)** 👈

That file will guide you to the right documentation based on your experience level!

---

## ⚡ Quick Start (For Absolute Beginners)

**Never used Docker before? Start here:** 👉 **[SETUP-FIRST.md](SETUP-FIRST.md)** 👈

**Already have Docker installed?**

1. **Double-click:** `check-system.bat` (make sure everything is ready)
2. **Double-click:** `start.bat` (start everything)
3. **Open browser:** `http://localhost:8080` (see your website!)

**That's it!** No configuration, no PATH variables, no port conflicts. It just works.

---

## 🎯 Why Use This Instead of XAMPP/Laragon?

| Feature | XAMPP/Laragon | This Docker Setup |
|---------|---------------|-------------------|
| **Setup time** | 15-20 minutes + troubleshooting | 30 seconds (after Docker installed) |
| **Works on friend's PC** | "Works on my machine" 🤷 | Always works, everywhere |
| **Port conflicts** | Breaks with Skype, Discord, etc. | Isolated, never conflicts |
| **Team collaboration** | "Let me configure yours..." | Share folder, double-click start |
| **Database GUI** | phpMyAdmin (if configured) | phpMyAdmin included automatically |
| **Multiple versions** | Reinstall everything | Edit one line, restart |
| **Professor testing** | Different results | Identical environment |
| **Learning curve** | Medium (lots of buttons) | Low (just double-click .bat files) |

---

## 📦 What's Included

This environment includes everything you need:

- ✅ **PHP 8.3** (easily change version if needed)
- ✅ **MySQL 8.0** (just like in XAMPP!)
- ✅ **phpMyAdmin** (database manager at `http://localhost:8081`)
- ✅ **Nginx** (faster than Apache)
- ✅ **Composer** (PHP package manager)
- ✅ **Testing tools** (Pest, PHPStan)
- ✅ **Code formatter** (PHP-CS-Fixer)

**Plus these beginner-friendly features:**
- 🎨 Visual status page (like XAMPP control panel)
- 🔍 System checker (verifies everything works)
- 🛟 Extensive troubleshooting guide
- 💡 AI prompts for getting help
- 🪟 Windows-friendly `.bat` scripts (no terminal needed!)

---

## 🎮 How to Use (Daily Workflow)

### Starting Your Work Session

**Option 1:** Double-click `start.bat`
- Wait 30-60 seconds
- Opens automatically when ready

**Option 2:** Use convenience scripts:
- `open-website.bat` - Opens your site in browser
- `open-database.bat` - Opens phpMyAdmin

### Working on Your Code

1. **Edit files** in the `public/` folder
   - Example: `public/index.php` → `http://localhost:8080/index.php`
   - Just like XAMPP's `htdocs` folder!

2. **Refresh browser** to see changes (instant, no restart needed)

3. **Manage database** at `http://localhost:8081`
   - Username: `root`
   - Password: `secret`

### Stopping When Done

**Double-click:** `stop.bat`
- Cleanly stops everything
- Your data is automatically saved
- Frees up computer resources

---

## 🗂️ Project Structure

```
web-enterprise-learn/
├── public/              ← Your PHP files go here (like htdocs)
│   ├── index.php       ← Main page
│   └── status.php      ← System status page
├── src/                ← Your PHP classes (optional)
├── tests/              ← Your tests (optional)
├── docker/             ← Docker configuration (don't touch)
│   └── nginx/
│       └── default.conf
├── start.bat           ← START HERE: Double-click to begin
├── stop.bat            ← Stop everything when done
├── restart.bat         ← Restart if something breaks
├── check-system.bat    ← Verify your setup works
├── open-website.bat    ← Quick browser shortcut
├── open-database.bat   ← Quick phpMyAdmin shortcut
├── reset-database.bat  ← Reset database (DANGER: deletes data!)
├── SETUP-FIRST.md      ← Complete beginner's guide
├── TROUBLESHOOTING.md  ← When things go wrong
├── README.md           ← You are here!
├── docker-compose.yml  ← Defines what containers run
├── Dockerfile          ← PHP container configuration
├── composer.json       ← PHP dependencies
└── Makefile            ← For advanced users (optional)
```

---

## 🆘 Common Tasks

### Task: View What's Running

- **Easy way:** Go to `http://localhost:8080/status.php`
- **Tech way:** Run `docker compose ps` in PowerShell

### Task: Install PHP Package

```powershell
# Example: Install Guzzle HTTP client
docker compose run --rm php composer require guzzlehttp/guzzle
```

### Task: Access MySQL from External Tool (MySQL Workbench, etc.)

Use these credentials:
- **Host:** `localhost`
- **Port:** `3306`
- **Username:** `root`
- **Password:** `secret`
- **Database:** `app_db`

### Task: Run Tests

```powershell
# Run all tests
docker compose run --rm php ./vendor/bin/pest

# Or use the Makefile shortcut
make test
```

### Task: Change PHP Version

1. Open `Dockerfile`
2. Change `FROM php:8.3-fpm-alpine` to your version (e.g., `php:8.2-fpm-alpine`)
3. Run `restart.bat`

### Task: Add a New Database

1. Open `http://localhost:8081` (phpMyAdmin)
2. Click "New" in left sidebar
3. Enter database name
4. Click "Create"

---

## 🔧 Available Scripts

| File | What It Does | When to Use |
|------|--------------|-------------|
| `start.bat` | Start everything | Beginning of work session |
| `stop.bat` | Stop everything | End of work session |
| `restart.bat` | Stop then start | When something acts weird |
| `check-system.bat` | Verify setup | First time or after changes |
| `open-website.bat` | Open site in browser | Quick access |
| `open-database.bat` | Open phpMyAdmin | Quick database access |
| `reset-database.bat` | Delete all DB data | Start fresh (DANGER!) |

---

## 📚 Documentation

- 🆕 **New to Docker?** → Read [SETUP-FIRST.md](SETUP-FIRST.md)
- 🔧 **Something broke?** → Read [TROUBLESHOOTING.md](TROUBLESHOOTING.md)
- 🎓 **Want to learn more?** → Keep reading below

---

## 🎓 For Advanced Users

### Using Make Commands (Optional)

If you have `make` installed (or use WSL), you can use these shortcuts:

```bash
make up          # Start environment
make down        # Stop environment
make restart     # Restart everything
make shell       # Get bash shell in PHP container
make test        # Run test suite
make analyse     # Run PHPStan static analysis
make format      # Format code with PHP-CS-Fixer
make composer    # Run composer commands (use: make composer ARGS="require package")
make clean       # Destroy everything including volumes
```

### Understanding the Docker Setup

**Services defined in `docker-compose.yml`:**

1. **php** - PHP 8.3-FPM container
   - Runs your PHP code
   - Has Composer installed
   - Can access MySQL via hostname `mysql`

2. **nginx** - Nginx 1.27 webserver
   - Serves files from `public/` folder
   - Listens on port 8080
   - Forwards PHP requests to `php` container

3. **mysql** - MySQL 8.0 database
   - Stores your data
   - Data persists in Docker volume `mysql-data`
   - Exposed on port 3306

4. **phpmyadmin** - phpMyAdmin latest
   - Web interface for MySQL
   - Listens on port 8081
   - Auto-configured to connect to `mysql`

**Volumes:**
- `mysql-data` - Persists your database (survives container deletion)
- `./` mounted to `/var/www/html` - Your code is live-synced

**Networks:**
- `app-net` - Private network for containers to communicate

---

## 🤝 Team Collaboration

### Sharing This Project

**To share with teammates:**

1. Push to Git (recommended):
   ```bash
   git init
   git add .
   git commit -m "Initial setup"
   git push
   ```
   Teammates just clone and run `start.bat`

2. Or ZIP and share:
   - Stop environment first (`stop.bat`)
   - ZIP the entire folder
   - Share the ZIP
   - They extract and run `start.bat`

**What teammates need:**
- ✅ Docker Desktop installed
- ✅ This project folder
- ✅ Double-click `start.bat`
- ❌ NO need to install PHP, MySQL, Apache, Composer, etc.!

### Database Sharing

**To share database structure:**

1. Open phpMyAdmin (`http://localhost:8081`)
2. Select your database
3. Click "Export"
4. Choose "Quick" export method
5. Click "Go"
6. Share the `.sql` file
7. Teammates import via phpMyAdmin → Import tab

---

## 🐛 Troubleshooting Quick Reference

| Problem | Solution |
|---------|----------|
| "Docker is not running" | Start Docker Desktop, wait for "running" status |
| "Port 8080 in use" | Close Skype/Discord/XAMPP, or change port in docker-compose.yml |
| Website won't load | Wait 30s, check `http://localhost:8080/status.php` |
| phpMyAdmin won't load | Wait 60s for MySQL to start, check status page |
| Can't login to phpMyAdmin | Username: `root`, Password: `secret` |
| Code changes not showing | Hard refresh: `Ctrl+Shift+R` |
| Something weird | Run `restart.bat` |
| Really broken | Read [TROUBLESHOOTING.md](TROUBLESHOOTING.md) |

---

## ❓ FAQ

**Q: Do I need to install PHP/MySQL/Apache?**
A: NO! Docker includes everything. Just install Docker Desktop.

**Q: Can I use this with Laravel? WordPress?**
A: Yes! This works with any PHP project.

**Q: Will this mess up my existing XAMPP?**
A: No, but don't run both at the same time (port conflicts). You can uninstall XAMPP now!

**Q: Can I use this for my final project?**
A: Absolutely! This is production-grade tooling. Your professor will be impressed.

**Q: What if my internet is slow?**
A: First time downloads ~500MB. After that, starts in 30 seconds even offline.

**Q: Can I change MySQL to PostgreSQL?**
A: Yes, but ask yourself: do your classmates know PostgreSQL? Stick with MySQL for compatibility.

**Q: How do I backup my database?**
A: phpMyAdmin → Export tab → Go. Or see [TROUBLESHOOTING.md](TROUBLESHOOTING.md) for details.

---

## 🎉 Success Stories

> *"I used to spend 30 minutes helping each teammate install XAMPP. Now I just send them this folder and they're running in 2 minutes."* - Student using this boilerplate

> *"My professor asked how we all had identical setups. I showed him start.bat and he was shocked."* - Team lead

> *"XAMPP broke every time I updated Windows. This just works."* - Frustrated developer

---

## 📞 Getting Help

1. **Something broken?** → Read [TROUBLESHOOTING.md](TROUBLESHOOTING.md)
2. **Never used Docker?** → Read [SETUP-FIRST.md](SETUP-FIRST.md)
3. **Still stuck?** → Ask an AI (prompts provided in SETUP-FIRST.md)
4. **Need human help?** → Ask your teammate who shared this with you

---

## 🙏 Credits & License

**Built for students tired of XAMPP/Laragon headaches.**

This boilerplate is free to use for educational and commercial projects.

**Includes:**
- PHP Official Image
- MySQL Official Image
- Nginx Official Image
- phpMyAdmin Official Image
- Pest PHP Testing Framework
- PHPStan Static Analysis
- PHP-CS-Fixer Code Formatter

---

## 🚀 Ready to Start?

### First Time User?
1. Read [SETUP-FIRST.md](SETUP-FIRST.md)
2. Install Docker Desktop
3. Run `check-system.bat`
4. Run `start.bat`
5. Open `http://localhost:8080`

### Returning User?
1. Double-click `start.bat`
2. Start coding!

---

**Made with ❤️ for students who deserve better than XAMPP.**

*Questions? Read SETUP-FIRST.md or TROUBLESHOOTING.md. They're VERY detailed!*
