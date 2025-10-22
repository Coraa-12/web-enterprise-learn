# 📥 How to Download This Project

> **Choose the method that matches your skill level!**

---

## 🎯 Option 1: Download ZIP (Easiest - Recommended!)

**Best for:** Everyone, especially if you don't know Git

### Steps:

1. **Go to GitHub:**
   ```
   https://github.com/Coraa-12/web-enterprise-learn
   ```

2. **Click the green "Code" button** (top right)

3. **Click "Download ZIP"**

4. **Extract the ZIP file** to somewhere easy to find:
   - Recommended: `Documents\web-enterprise-learn\`
   - NOT recommended: Desktop (gets messy)

5. **Open the extracted folder**

6. **Double-click: `check-system.bat`**

7. **Double-click: `start.bat`**

8. **Done!** Open http://localhost:8080

---

## 🔄 Option 2: Clone with Git

**Best for:** If you already know basic Git commands

### Steps:

```powershell
# Open PowerShell in your desired folder
cd Documents

# Clone the student template branch
git clone -b student-template https://github.com/Coraa-12/web-enterprise-learn.git

# Enter the directory
cd web-enterprise-learn

# Check system
.\check-system.bat

# Start working
.\start.bat
```

### ⚠️ IMPORTANT RULES:

- ✅ **DO** pull updates: `git pull origin student-template`
- ❌ **DON'T** push anything (you don't have permission anyway)
- ❌ **DON'T** mess with Git unless you know what you're doing
- ❌ **DON'T** commit your personal work to this repo

**Your personal work stays local!**

---

## 🔄 Getting Updates

### If You Downloaded ZIP:

1. Download a fresh ZIP from GitHub
2. Extract to a NEW folder (don't overwrite!)
3. **IMPORTANT:** Copy your `public/` folder from old to new
4. Delete old folder
5. Use new folder

### If You Cloned with Git:

```powershell
# Navigate to project folder
cd path\to\web-enterprise-learn

# Stop the environment first
.\stop.bat

# Get latest updates
git pull origin student-template

# Restart
.\start.bat
```

**If Git complains about conflicts:**
```powershell
# Backup your work first!
# Then force update (WARNING: Loses local changes)
git fetch origin
git reset --hard origin/student-template
```

---

## 🤝 Sharing Your Work

**DO NOT TRY TO PUSH TO GIT!**

Instead, share your work like this:

### Method 1: Share Your Files
1. Copy your `public/` folder
2. ZIP it
3. Email/share with teammate or instructor

### Method 2: Share Your Database
1. Open phpMyAdmin: http://localhost:8081
2. Click your database
3. Click "Export" tab
4. Click "Go"
5. Share the `.sql` file

### Method 3: In-Person Demo
1. Show on your laptop
2. Or share screen in Discord/Teams

---

## 🆘 Common Issues

### "I can't download - Access Denied"

**Solution:** The repository might be private. Contact the owner (Coraa-12) for access.

---

### "Download is really slow"

**Solution:**
- The project is ~50MB
- On slow internet, this takes 5-10 minutes
- Get coffee ☕

---

### "I downloaded but can't find it"

**Solution:**
- Check your Downloads folder
- Search for "web-enterprise-learn" in File Explorer
- Extract the ZIP first!

---

### "Git says 'permission denied'"

**Solution:**
- This is CORRECT! Students can't push.
- You can only pull/download, not push/upload
- If you need to share work, see "Sharing Your Work" above

---

### "I made changes and now Git is confused"

**Solution:**
```powershell
# See what changed
git status

# If you want to keep changes
# Don't use Git, just keep working locally

# If you want to discard changes and get fresh copy
git reset --hard origin/student-template
```

---

## 🎓 First Time Setup (After Download)

No matter which method you used:

1. **Read this first:** `START-HERE.md`

2. **Then read:** `SETUP-FIRST.md` (if new to Docker)

3. **Run:** `check-system.bat`

4. **Start:** `start.bat`

5. **Open:** http://localhost:8080

6. **Bookmark:**
   - http://localhost:8080 (your site)
   - http://localhost:8080/status.php (status)
   - http://localhost:8081 (phpMyAdmin)

7. **Start coding!**

---

## 📁 What You Get

```
web-enterprise-learn/
├── ✅ All .bat files (double-click scripts)
├── ✅ Documentation (START-HERE.md, etc.)
├── ✅ Docker configuration
├── ✅ Example files
└── ❌ NO vendor/ folder (auto-downloads on first start)
```

---

## 🚫 What You Should NOT Do

- ❌ Try to push to GitHub
- ❌ Delete files you don't understand
- ❌ Edit Docker files without knowing what they do
- ❌ Share your `.env` file (if it exists)
- ❌ Commit sensitive data (passwords, API keys)

---

## ✅ What You SHOULD Do

- ✅ Work in the `public/` folder
- ✅ Run `stop.bat` when done
- ✅ Backup your database weekly (phpMyAdmin → Export)
- ✅ Ask questions if stuck
- ✅ Read the documentation

---

## 💡 Pro Tip

**Bookmark this page:**
```
https://github.com/Coraa-12/web-enterprise-learn
```

That way you can always get the latest version!

---

## 🎯 Quick Start (TL;DR)

1. Download ZIP from GitHub
2. Extract
3. Double-click `start.bat`
4. Open http://localhost:8080
5. Start coding!

---

## 📞 Need Help?

1. Read `TROUBLESHOOTING.md`
2. Check `SETUP-FIRST.md`
3. Ask your teammate who shared this
4. Create GitHub Issue (if repo is public)
5. Email the maintainer

---

**Happy coding! 🚀**

*P.S. - Yes, it's okay to not know Git. Focus on learning Docker and PHP first!*
