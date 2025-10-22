# 🎯 QUICK START CARD

> Print this or keep it open in a browser tab!

---

## 📥 FIRST TIME SETUP

1. Install Docker Desktop: https://www.docker.com/products/docker-desktop/
2. Download/clone this project
3. Double-click: `check-system.bat`
4. Double-click: `start.bat`
5. Open browser: http://localhost:8080

**Having trouble?** Read [SETUP-FIRST.md](SETUP-FIRST.md)

---

## 🎮 DAILY COMMANDS

| Action | File to Double-Click |
|--------|---------------------|
| **Start working** | `start.bat` |
| **Stop working** | `stop.bat` |
| **Something broken** | `restart.bat` |
| **Open website** | `open-website.bat` |
| **Open database** | `open-database.bat` |

---

## 🌐 IMPORTANT URLs

| Service | URL | Description |
|---------|-----|-------------|
| **Your Website** | http://localhost:8080 | Your PHP files |
| **Status Page** | http://localhost:8080/status.php | What's running |
| **phpMyAdmin** | http://localhost:8081 | Database manager |

---

## 🔑 DATABASE CREDENTIALS

```
Host:     localhost
Port:     3306
Username: root
Password: secret
Database: app_db
```

---

## 📁 WHERE TO PUT FILES

```
public/           ← Your PHP files go here
  ├── index.php   ← Main page (edit this!)
  ├── login.php   ← Create new pages here
  └── api.php     ← APIs, includes, etc.

src/              ← PHP classes (optional)
tests/            ← Tests (optional)
```

**Example:**
- Save file: `public/test.php`
- Access at: http://localhost:8080/test.php

---

## 🆘 WHEN THINGS BREAK

### Try These In Order:

1. ✅ Run `restart.bat`
2. ✅ Check http://localhost:8080/status.php (all green?)
3. ✅ Close Skype/Discord/XAMPP
4. ✅ Restart Docker Desktop
5. ✅ Restart your computer
6. ✅ Read [TROUBLESHOOTING.md](TROUBLESHOOTING.md)

### Common Fixes:

| Problem | Solution |
|---------|----------|
| "Docker not running" | Start Docker Desktop from Start menu |
| "Port 8080 in use" | Close Skype/Discord, or change port |
| Website won't load | Wait 30 seconds, refresh |
| Code not updating | Press `Ctrl+Shift+R` (hard refresh) |
| Can't login phpMyAdmin | Username: `root`, Password: `secret` |

---

## 💡 PRO TIPS

✅ **DO:**
- Run `stop.bat` when done (saves resources)
- Backup database weekly (phpMyAdmin → Export)
- Check status page if unsure: http://localhost:8080/status.php
- Save files in `public/` folder

❌ **DON'T:**
- Run XAMPP and this at the same time
- Run `reset-database.bat` unless you want to delete everything
- Shut down PC without running `stop.bat` first
- Edit Docker files unless you know what you're doing

---

## 🎓 CONVINCE YOUR TEAMMATES

**Show them this comparison:**

| Task | XAMPP | This Setup |
|------|-------|------------|
| Install | 20 min | 2 min |
| Share with team | "Install XAMPP first..." | Share folder, done |
| Port conflicts | Constant issues | Never happens |
| Works on Mac | No | Yes |
| Professor tests | Different results | Always identical |

---

## 📞 GET HELP

1. **Read:** [TROUBLESHOOTING.md](TROUBLESHOOTING.md) - Very detailed!
2. **Read:** [SETUP-FIRST.md](SETUP-FIRST.md) - Complete beginner guide
3. **Ask AI:** Both files have prompts you can copy-paste
4. **Ask human:** Your teammate who shared this

---

## 🔄 WORKFLOW EXAMPLE

**Morning:**
1. Double-click `start.bat`
2. Wait 30 seconds
3. Click notification or run `open-website.bat`

**During work:**
1. Edit files in `public/`
2. Refresh browser to see changes
3. Use phpMyAdmin for database

**Evening:**
1. Double-click `stop.bat`
2. Done!

---

## 📊 CHECK IF EVERYTHING IS WORKING

Visit: http://localhost:8080/status.php

**All green circles?** ✅ You're good!
**Red circles?** ❌ Read what it says, wait 30s, refresh

---

## 🎉 YOU'RE READY!

Bookmark these:
- http://localhost:8080 (your site)
- http://localhost:8080/status.php (status checker)
- http://localhost:8081 (phpMyAdmin)

**Now go build something awesome! 🚀**

---

*Made with ❤️ for students tired of XAMPP headaches*
