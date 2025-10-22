# 📋 File Guide - What Does Each File Do?

> New to this project? Here's what every file is for!

---

## 🎯 FILES YOU'LL USE (Double-click these!)

### `start.bat` ▶️
**What:** Starts your development environment
**When:** Beginning of every work session
**Does:** Starts PHP, MySQL, Nginx, phpMyAdmin
**Time:** 30-60 seconds first time, 10 seconds after

### `stop.bat` ⏹️
**What:** Stops your development environment
**When:** End of work session or shutting down PC
**Does:** Cleanly stops all containers, saves everything
**Time:** 5-10 seconds

### `restart.bat` 🔄
**What:** Stops then starts everything
**When:** Something acts weird or after changes
**Does:** Full restart, clears most issues
**Time:** 15-20 seconds

### `check-system.bat` 🔍
**What:** Verifies your setup is ready
**When:** First time, or when troubleshooting
**Does:** Checks Docker installed/running, ports free
**Time:** 5 seconds

### `open-website.bat` 🌐
**What:** Opens your website in browser
**When:** Quick access shortcut
**Does:** Opens http://localhost:8080
**Time:** Instant

### `open-database.bat` 🗄️
**What:** Opens phpMyAdmin in browser
**When:** Need to manage database
**Does:** Opens http://localhost:8081
**Time:** Instant

### `reset-database.bat` ⚠️
**What:** DELETES ALL DATABASE DATA and starts fresh
**When:** Only when you want to start over
**Does:** Destroys database volume, recreates empty
**Time:** 30 seconds
**WARNING:** This is permanent! Backup first!

---

## 📖 DOCUMENTATION FILES (Read these!)

### `START-HERE.md` 👈
**What:** First file you should read
**For:** Everyone, especially first-timers
**Contains:** Quick navigation to other docs

### `SETUP-FIRST.md` 🆕
**What:** Complete beginner's installation guide
**For:** Never used Docker before
**Contains:**
- Step-by-step Docker installation
- AI prompts for help
- Detailed troubleshooting
- Assumes zero knowledge

### `QUICK-START.md` ⚡
**What:** One-page reference card
**For:** Quick lookup, daily reference
**Contains:**
- Command reference
- URLs and credentials
- Common fixes
- Print this!

### `README.md` 📚
**What:** Complete project documentation
**For:** Everyone eventually
**Contains:**
- Full feature list
- How everything works
- Advanced usage
- FAQ

### `TROUBLESHOOTING.md` 🔧
**What:** Detailed problem-solving guide
**For:** When something breaks
**Contains:**
- Every common error
- Step-by-step fixes
- AI prompts for complex issues
- Nuclear options (last resort)

---

## 🏗️ PROJECT FILES (Your work goes here!)

### `public/` folder
**What:** Your PHP files go here (like htdocs in XAMPP)
**Examples:**
- `public/index.php` → http://localhost:8080/index.php
- `public/login.php` → http://localhost:8080/login.php
- `public/api/users.php` → http://localhost:8080/api/users.php

### `public/index.php`
**What:** Main homepage
**Edit this:** To change what shows at http://localhost:8080

### `public/status.php`
**What:** System status dashboard
**Shows:** What containers are running (green/red lights)
**Don't edit:** Unless you want to customize it

### `src/` folder
**What:** PHP classes and organized code (optional)
**For:** More advanced projects, OOP code
**Auto-loaded:** Via Composer PSR-4

### `tests/` folder
**What:** Your test files (optional)
**For:** Automated testing with Pest
**Run tests:** See Makefile or README.md

---

## ⚙️ CONFIGURATION FILES (Don't touch unless you know why!)

### `docker-compose.yml`
**What:** Defines what Docker containers run
**Contains:** PHP, Nginx, MySQL, phpMyAdmin setup
**Edit when:**
- Changing ports
- Adding new services
- Changing database credentials

### `Dockerfile`
**What:** Defines how PHP container is built
**Contains:** PHP version, extensions, Composer
**Edit when:**
- Changing PHP version
- Adding PHP extensions
- Installing system packages

### `composer.json`
**What:** PHP dependencies and autoloading
**Contains:** Required packages, PSR-4 autoloading
**Edit when:**
- Installing packages
- Changing namespaces

### `Makefile`
**What:** Shortcuts for terminal commands (optional)
**For:** Advanced users with `make` installed
**Alternative:** Use the `.bat` files instead!

### `phpunit.xml`
**What:** PHPUnit test configuration
**For:** Running tests
**Usually:** Don't need to change

### `phpstan.neon`
**What:** PHPStan static analysis config
**For:** Code quality checks
**Usually:** Don't need to change

### `docker/nginx/default.conf`
**What:** Nginx web server configuration
**Contains:** Routing rules, PHP forwarding
**Edit when:**
- Changing document root
- Adding custom routes
- Advanced server config

---

## 🚫 FILES YOU CAN IGNORE

### `.gitignore`
**What:** Tells Git what not to upload
**Ignore unless:** You're managing Git yourself

### `vendor/` folder (after composer install)
**What:** Downloaded PHP packages
**Ignore:** This is auto-generated

---

## 🎯 QUICK DECISION TREE

**"Which file do I use?"**

```
┌─ Want to START working?
│  └─→ Double-click: start.bat
│
┌─ Want to STOP working?
│  └─→ Double-click: stop.bat
│
┌─ Something BROKEN?
│  └─→ Try: restart.bat
│  └─→ Still broken? Read: TROUBLESHOOTING.md
│
┌─ FIRST TIME here?
│  └─→ Read: START-HERE.md
│  └─→ Then: SETUP-FIRST.md
│
┌─ Want to WRITE CODE?
│  └─→ Create files in: public/ folder
│
┌─ Want to MANAGE DATABASE?
│  └─→ Double-click: open-database.bat
│
┌─ Need HELP?
│  └─→ Quick fix: QUICK-START.md
│  └─→ Broken: TROUBLESHOOTING.md
│  └─→ Learning: README.md
```

---

## 📁 COMPLETE FILE TREE

```
web-enterprise-learn/
│
├── 🎮 DOUBLE-CLICK SCRIPTS
│   ├── start.bat              ← Start everything
│   ├── stop.bat               ← Stop everything
│   ├── restart.bat            ← Restart everything
│   ├── check-system.bat       ← Check setup
│   ├── open-website.bat       ← Open in browser
│   ├── open-database.bat      ← Open phpMyAdmin
│   └── reset-database.bat     ← Reset database (DANGER!)
│
├── 📖 DOCUMENTATION
│   ├── START-HERE.md          ← Read this first!
│   ├── SETUP-FIRST.md         ← Complete beginner guide
│   ├── QUICK-START.md         ← Quick reference
│   ├── README.md              ← Full documentation
│   ├── TROUBLESHOOTING.md     ← When things break
│   └── FILE-GUIDE.md          ← You are here!
│
├── 🏗️ YOUR WORK
│   ├── public/                ← Your PHP files go here
│   │   ├── index.php         ← Main page (edit this!)
│   │   └── status.php        ← Status dashboard
│   ├── src/                   ← PHP classes (optional)
│   └── tests/                 ← Tests (optional)
│
├── ⚙️ CONFIGURATION
│   ├── docker-compose.yml     ← Container definitions
│   ├── Dockerfile             ← PHP container config
│   ├── composer.json          ← PHP dependencies
│   ├── Makefile               ← Terminal shortcuts (optional)
│   ├── phpunit.xml            ← Test config
│   ├── phpstan.neon           ← Static analysis config
│   └── docker/
│       └── nginx/
│           └── default.conf   ← Nginx config
│
└── 🚫 AUTO-GENERATED (ignore)
    └── vendor/                ← Downloaded packages
```

---

## 💡 PRO TIPS

### For Beginners:
- **Only touch:** `.bat` files and `public/` folder
- **Read first:** START-HERE.md → SETUP-FIRST.md
- **Bookmark:** http://localhost:8080/status.php

### For Intermediate:
- **Learn:** How docker-compose.yml works
- **Customize:** Ports, versions, extensions
- **Use:** Makefile shortcuts if comfortable with terminal

### For Advanced:
- **Modify:** Dockerfile for custom PHP setup
- **Add:** New services to docker-compose.yml
- **Create:** Custom .bat scripts for team

### For Everyone:
- **Always run:** stop.bat before shutting down
- **Never run:** reset-database.bat without backup
- **Bookmark:** All three .md documentation files

---

## 🎓 LEARNING PATH

1. **Day 1:** Read START-HERE.md, run check-system.bat
2. **Day 1:** Read SETUP-FIRST.md if new to Docker
3. **Day 1:** Run start.bat, see it work!
4. **Day 2-7:** Use it daily, refer to QUICK-START.md
5. **Week 2:** Read full README.md when curious
6. **When broken:** TROUBLESHOOTING.md is your friend
7. **Advanced:** Experiment with docker-compose.yml

---

## ❓ STILL CONFUSED?

**"I just want to code PHP!"**
→ Double-click `start.bat`, edit files in `public/`, refresh browser

**"Where do I put my files?"**
→ In the `public/` folder, just like XAMPP's `htdocs`

**"How do I manage the database?"**
→ Double-click `open-database.bat`, login: root / secret

**"Something broke!"**
→ Try `restart.bat` first, then read TROUBLESHOOTING.md

**"I'm completely lost!"**
→ Start from START-HERE.md and follow the path

---

<p align="center">
<strong>You've got this! 💪</strong>
<br>
<em>Every expert was once a beginner. Just start with start.bat!</em>
</p>
