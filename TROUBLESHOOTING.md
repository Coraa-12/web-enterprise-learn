# 🔧 Troubleshooting Guide

> **When things go wrong (and they will), this is your rescue guide.**

---

## 🚨 Emergency Quick Fixes

**Try these FIRST before reading the rest:**

1. **Run `restart.bat`** - Fixes 60% of problems
2. **Restart Docker Desktop** - Fixes 20% of problems
3. **Restart your computer** - Fixes 15% of problems
4. **Check `http://localhost:8080/status.php`** - Shows what's actually broken

Still broken? Keep reading. 👇

---

## 🔴 Critical Errors

### Error: "Docker is not running"

**What you see:**
```
[ERROR] Docker is not running!
Please start Docker Desktop first
```

**What it means:** Docker Desktop is installed but not started.

**Solutions (try in order):**

1. **Look in taskbar (bottom-right):**
   - See Docker whale icon? → Click it, wait for "Docker Desktop is running"
   - Don't see it? → Open Docker Desktop from Start menu

2. **Docker won't start?**
   - Right-click Docker whale → Quit Docker Desktop
   - Wait 10 seconds
   - Start Docker Desktop again from Start menu
   - Wait 2-3 minutes (it's slow to start)

3. **Still won't start?**
   - Restart your computer
   - After restart, manually start Docker Desktop
   - Wait until taskbar icon says "running"

4. **STILL broken?**
   - Docker Desktop might need WSL 2
   - Copy this to AI:
   ```
   Docker Desktop won't start on Windows. When I open it, [describe what happens].
   I need WSL 2 installation instructions that are simple and step-by-step.
   ```

---

### Error: "Port 8080 is already in use"

**What you see:**
```
Error response from daemon: Ports are not available: exposing port TCP 0.0.0.0:8080 -> 0.0.0.0:0: listen tcp 0.0.0.0:8080: bind: Only one usage of each socket address
```

**What it means:** Another program is using port 8080.

**Solutions:**

1. **Find and close the culprit:**
   - **Skype?**
     - Open Skype → Settings → Advanced → Connection
     - Uncheck "Use ports 80 and 443"
     - Restart Skype

   - **Discord?**
     - Close Discord completely (right-click taskbar icon → Quit)

   - **XAMPP/Laragon still installed?**
     - Open XAMPP/Laragon Control Panel
     - Stop Apache
     - OR better yet: Uninstall them! You don't need them anymore.

   - **Something else?**
     - Open PowerShell as Administrator
     - Run: `netstat -ano | findstr :8080`
     - Look at the number in the last column (PID)
     - Open Task Manager → Details tab → Find that PID
     - End that process

2. **Can't find what's using it? Change the port:**
   - Open `docker-compose.yml` in a text editor
   - Find this line: `"8080:80"`
   - Change it to: `"8090:80"`
   - Save the file
   - Run `restart.bat`
   - Now use `http://localhost:8090` instead

---

### Error: "Cannot connect to the Docker daemon"

**What you see:**
```
Cannot connect to the Docker daemon at unix:///var/run/docker.sock. Is the docker daemon running?
```

**What it means:** Docker Desktop is installed but the background service isn't running.

**Solutions:**

1. **Restart Docker Desktop service:**
   - Press `Win + R`
   - Type: `services.msc`
   - Press Enter
   - Find "Docker Desktop Service"
   - Right-click → Restart

2. **Still broken? Reinstall Docker Desktop:**
   - Uninstall Docker Desktop (Settings → Apps → Docker Desktop → Uninstall)
   - Download fresh from https://www.docker.com/products/docker-desktop/
   - Install again
   - Restart computer
   - Try `start.bat` again

---

## ⚠️ Common Issues

### Website shows "502 Bad Gateway"

**What it means:** Nginx is running but can't talk to PHP.

**Solutions:**

1. **Wait 30 seconds** - PHP might still be starting
2. **Check status:** `http://localhost:8080/status.php`
   - Is PHP service green? If not, wait longer
3. **Restart:** Run `restart.bat`
4. **Check logs:**
   - Open PowerShell in project folder
   - Run: `docker compose logs php`
   - Look for errors, paste them into AI for help

---

### Website shows "Connection refused"

**What it means:** Nothing is listening on port 8080.

**Solutions:**

1. **Check if containers are running:**
   - Open PowerShell in project folder
   - Run: `docker compose ps`
   - All services should say "running"
   - If not: Run `start.bat` again

2. **Check Docker Desktop:**
   - Open Docker Desktop
   - Go to "Containers" tab
   - Should see 4 containers running
   - If not: Click "Start" on the web-enterprise-learn group

---

### Website works but phpMyAdmin doesn't

**What you see:** `http://localhost:8081` won't load or shows error.

**Solutions:**

1. **Check phpMyAdmin is running:**
   - Go to: `http://localhost:8080/status.php`
   - Is phpMyAdmin service green? If not, wait 1 minute

2. **Check port 8081:**
   - Maybe something else is using port 8081
   - Same fix as port 8080 above, but change `"8081:80"` in phpmyadmin section

3. **Restart everything:**
   - Run `restart.bat`
   - Wait 1 full minute
   - Try `http://localhost:8081` again

---

### phpMyAdmin login fails

**What you see:** "Access denied" or "Login without a password is forbidden"

**Solutions:**

1. **Double-check credentials:**
   - Username: `root` (lowercase, no spaces)
   - Password: `secret` (lowercase, no spaces)
   - Don't use "root@localhost", just "root"

2. **MySQL still starting:**
   - Wait 30 seconds
   - Try again
   - Check `http://localhost:8080/status.php` - MySQL green?

3. **Database got corrupted:**
   - Run `reset-database.bat` (WARNING: Deletes all data!)
   - Start fresh

---

### "I changed my code but nothing updates"

**What it means:** Browser is caching or file sync isn't working.

**Solutions:**

1. **Hard refresh browser:**
   - Press: `Ctrl + Shift + R` (Windows)
   - Or: `Ctrl + F5`

2. **Clear browser cache:**
   - Press: `Ctrl + Shift + Delete`
   - Select "Cached images and files"
   - Clear

3. **Check file location:**
   - Are you editing files in the right folder?
   - Files must be in: `[project]/public/` folder
   - NOT in a copy somewhere else!

4. **Disable browser cache (for development):**
   - Open browser DevTools: Press `F12`
   - Go to Network tab
   - Check "Disable cache" checkbox
   - Keep DevTools open while developing

5. **Check file saved:**
   - Sounds dumb, but check your editor actually saved the file
   - Look for `*` in tab title (means unsaved)

---

### "Downloads are stuck at 'Downloading...'"

**What you see:** `start.bat` runs forever, stuck downloading.

**What it means:** Slow internet or Docker Hub is having issues.

**Solutions:**

1. **Just wait:**
   - First time downloads ~500MB
   - On slow internet this can take 10-20 minutes
   - Go get coffee ☕

2. **Check internet:**
   - Open browser, try loading google.com
   - If that's slow, your internet is the problem

3. **Cancel and retry:**
   - Press `Ctrl + C` in the PowerShell window
   - Run `start.bat` again
   - Docker will resume where it left off

---

### "Everything worked yesterday, broken today"

**Common causes:**

1. **Windows updated overnight:**
   - Restart your computer
   - Start Docker Desktop manually
   - Try `start.bat` again

2. **Docker Desktop updated:**
   - Open Docker Desktop
   - Check for update notifications
   - Let it finish updating
   - Restart computer
   - Try again

3. **Ran out of disk space:**
   - Check C: drive has at least 5GB free
   - If full: Clean up old files or Docker images
   - To clean Docker: Docker Desktop → Settings → Resources → Advanced → Disk image location → Clean/Purge data

---

## 🐌 Performance Issues

### "Everything is really slow"

**Solutions:**

1. **Give Docker more resources:**
   - Open Docker Desktop
   - Settings → Resources
   - Increase:
     - CPUs: At least 2
     - Memory: At least 4GB
     - Swap: 1GB
   - Click "Apply & Restart"

2. **Close other programs:**
   - Docker uses RAM and CPU
   - Close Chrome tabs, games, etc.

3. **Check antivirus:**
   - Some antivirus software scans Docker files constantly
   - Add Docker folder to exclusions:
     - `C:\Program Files\Docker`
     - `C:\ProgramData\Docker`
     - Your project folder

---

### "Start/stop takes forever"

**Why:** Docker is saving/loading everything carefully.

**Solutions:**

1. **This is normal-ish:**
   - Starting: 30-60 seconds is normal
   - Stopping: 10-20 seconds is normal
   - If longer, read below

2. **Clean up old containers:**
   - Open PowerShell
   - Run: `docker system prune -a`
   - Type `y` and press Enter
   - This deletes old, unused images

3. **SSD vs HDD:**
   - If your project is on a slow external drive, it'll be slow
   - Move project to your main SSD drive (usually C:)

---

## 💾 Database Issues

### "Lost all my database data!"

**What probably happened:** You ran `reset-database.bat` or `clean` command.

**Prevention:**
- ⚠️ NEVER run `reset-database.bat` unless you want to delete everything
- ⚠️ NEVER run `docker compose down -v` (the `-v` deletes volumes)
- ✅ DO run `stop.bat` (safe, keeps data)

**Recovery:**
- If you exported database before: Import it via phpMyAdmin
- If not: Data is gone 😢 Always backup important data!

**How to backup regularly:**
1. Open phpMyAdmin (`http://localhost:8081`)
2. Click database name
3. Click "Export"
4. Click "Go"
5. Save the .sql file somewhere safe
6. Do this before trying risky things!

---

### "Can't create new database or tables"

**Solutions:**

1. **Check phpMyAdmin logged in as root:**
   - Username must be `root` (not `app` or anything else)
   - `root` has full permissions

2. **Check MySQL is running:**
   - Go to `http://localhost:8080/status.php`
   - MySQL should be green

3. **Disk space full:**
   - Docker can't grow database if disk is full
   - Free up space on C: drive

---

## 🔍 How to Debug Like a Pro

### Get container logs

When something is broken:

```powershell
# See all container status
docker compose ps

# See logs from PHP container
docker compose logs php

# See logs from MySQL container
docker compose logs mysql

# See logs from Nginx container
docker compose logs nginx

# Follow logs in real-time (Ctrl+C to stop)
docker compose logs -f
```

### Get inside a container

Want to poke around inside?

```powershell
# Get a shell in the PHP container
docker compose exec php bash

# Now you're inside! Try:
php -v                    # Check PHP version
cd /var/www/html         # Go to your code
ls -la                   # List files
```

Type `exit` to get out.

---

## 🆘 Nuclear Options (Last Resort)

### "Nothing works, I want to start over"

**Option 1: Reset just the database**
```powershell
# Run this in project folder
docker compose down -v
docker compose up -d
```
⚠️ This deletes ALL database data!

**Option 2: Delete everything and rebuild**
```powershell
# Stop everything
docker compose down -v

# Delete all images
docker system prune -a

# Run this (will say "yes" to prompt)
# WARNING: Deletes ALL Docker stuff, not just this project
docker system prune -a --volumes

# Start fresh
.\start.bat
```
⚠️ This deletes EVERYTHING Docker-related! Use only if truly desperate.

**Option 3: Reinstall Docker Desktop**
1. Export/backup your database first!
2. Uninstall Docker Desktop (Settings → Apps)
3. Delete these folders:
   - `C:\Program Files\Docker`
   - `C:\ProgramData\Docker`
   - `C:\Users\[YourName]\.docker`
4. Restart computer
5. Reinstall Docker Desktop
6. Try `start.bat` again

---

## 🤖 When to Ask AI for Help

If none of this worked, ask AI. Here's the template:

```
I'm using a Docker-based PHP development environment and I have a problem.

WHAT I'M TRYING TO DO:
[Describe what you want to accomplish]

WHAT'S HAPPENING INSTEAD:
[Describe the problem]

ERROR MESSAGE (exact text):
```
[Paste the ENTIRE error message here]
```

WHAT I TRIED:
1. [List everything you tried]
2. [Be specific]
3. [Include commands you ran]

SYSTEM INFO:
- Windows version: [Check: Windows key + R, type "winver"]
- Docker version: [Run: docker --version]
- Project location: [Example: C:\Users\Me\Documents\project]

MY KNOWLEDGE LEVEL:
- I'm a beginner/intermediate/advanced
- I understand/don't understand [Docker/PHP/MySQL/etc.]

Please help me fix this step-by-step with simple explanations.
```

---

## 📞 Getting Human Help

### Who to ask:

1. **Your friend who shared this with you** (they probably know!)
2. **Classmates** (someone else might have hit the same issue)
3. **Your TA/Professor** (might surprise you - they might know Docker!)
4. **Discord/Slack** (if your class has one)

### What to share:

- **Screenshots** of error messages (take a photo with your phone if needed)
- **What you tried** from this troubleshooting guide
- **Your `docker compose ps` output**
- **Status page screenshot** (`http://localhost:8080/status.php`)

### What NOT to do:

- ❌ "It doesn't work" (too vague!)
- ❌ "I think I might have..." (either you did or didn't)
- ❌ Skip the "what I tried" part
- ❌ Say "nevermind" and give up without explaining what fixed it

---

## ✅ How to Prevent Issues

### Good habits:

1. **Always run `stop.bat` when done**
   - Don't just shut down your PC with Docker running
   - Clean stop = less corruption

2. **Keep Docker Desktop updated**
   - When it prompts to update, do it
   - But do it when you're NOT in the middle of work!

3. **Backup your database weekly**
   - Export via phpMyAdmin
   - Save the .sql file somewhere safe
   - Name it with date: `backup-2025-10-22.sql`

4. **Don't edit Docker files randomly**
   - If you don't know what it does, don't change it
   - Ask first!

5. **Keep at least 10GB free on C: drive**
   - Docker needs space to breathe

6. **Restart Docker Desktop once a week**
   - Even if working fine
   - Prevents weird issues

---

## 🎓 Understanding Error Messages

Docker errors can look scary. Here's how to read them:

### Pattern 1: Port already in use
```
Error: bind: address already in use
```
**Translation:** Another program is using the port.
**Fix:** Close that program or change the port in docker-compose.yml

### Pattern 2: Can't connect to daemon
```
Cannot connect to the Docker daemon
```
**Translation:** Docker Desktop isn't running.
**Fix:** Start Docker Desktop

### Pattern 3: Image not found
```
Error: pull access denied / repository does not exist
```
**Translation:** Typo in image name OR Docker Hub is down.
**Fix:** Check spelling in Dockerfile/docker-compose.yml

### Pattern 4: Out of space
```
Error: no space left on device
```
**Translation:** Your hard drive is full.
**Fix:** Free up space or move Docker to bigger drive

### Pattern 5: Permission denied
```
Error: permission denied
```
**Translation:** Docker needs admin rights or file permissions are wrong.
**Fix:** Run PowerShell as Administrator

---

**Remember:** 90% of issues are:
1. Docker not running (start it)
2. Port conflicts (close other apps)
3. Need to restart (run restart.bat)

**Don't panic. This guide has you covered! 🛟**
