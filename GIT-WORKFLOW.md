# 🔒 Git Workflow Guide (For Repository Owner)

> **This guide is for YOU (the repo maintainer), not your classmates!**

---

## 📊 Branch Strategy

### Branch Structure:

```
main (protected)
  ├── Latest stable release
  ├── Protected from direct pushes
  └── Only merge from dev after testing

dev (your workspace)
  ├── Your active development
  ├── Test changes here first
  └── Merge to main when stable

student-template (frozen snapshot)
  ├── Clean starting point for students
  ├── No vendor/, no .env, no database
  └── Updated only for major releases
```

---

## 🚀 Initial Setup (Do This Once)

### Step 1: Commit Current Changes

```powershell
# Add all new files
git add .

# Commit the baby-proof transformation
git commit -m "feat: transform into beginner-friendly setup

- Add Windows .bat scripts (no terminal needed)
- Replace PostgreSQL with MySQL + phpMyAdmin
- Add comprehensive beginner documentation
- Add visual status page
- Add automated system checker
- Make fully XAMPP-refugee compatible"
```

### Step 2: Create Development Branch

```powershell
# Create and switch to dev branch
git checkout -b dev

# Push dev branch to remote
git push -u origin dev
```

### Step 3: Create Student Template Branch

```powershell
# Create student template from current state
git checkout -b student-template

# Remove things students don't need in initial download
git rm -r --cached vendor/ 2>$null
git rm --cached .env 2>$null

# Commit the template
git commit -m "chore: create clean student template"

# Push to remote
git push -u origin student-template
```

### Step 4: Protect Main Branch (On GitHub)

Go to GitHub:
1. Repository → Settings → Branches
2. Add rule for `main` branch:
   - ✅ Require pull request reviews before merging
   - ✅ Require status checks to pass
   - ✅ Include administrators (even you need PR!)
3. Save changes

---

## 🔄 Daily Workflow (For You)

### Starting New Work

```powershell
# Always work on dev
git checkout dev

# Make sure you're up to date
git pull origin dev

# Create feature branch (optional, for big changes)
git checkout -b feature/your-feature-name
```

### Making Changes

```powershell
# Make your changes...
# Edit files, test locally

# Check what changed
git status

# Add specific files
git add path/to/file

# Or add everything (be careful!)
git add .

# Commit with good message
git commit -m "feat: add new feature"
```

### Pushing Your Work

```powershell
# Push to dev branch
git push origin dev

# Or push feature branch
git push origin feature/your-feature-name
```

### Releasing to Main (Stable Release)

```powershell
# Switch to main
git checkout main

# Merge dev into main
git merge dev

# Push to main
git push origin main

# Tag the release (optional but recommended)
git tag -a v1.0.0 -m "Release v1.0.0: Initial baby-proof version"
git push origin v1.0.0
```

---

## 👥 For Your Classmates (Distribution Strategy)

### Option 1: Download ZIP (Recommended for Git-Ignorant)

**Tell them:**
1. Go to: `https://github.com/Coraa-12/web-enterprise-learn`
2. Click green "Code" button
3. Click "Download ZIP"
4. Extract and use

**Pros:**
- No Git knowledge needed
- Can't accidentally push
- Clean copy every time

**Cons:**
- Can't pull updates easily
- Must download new ZIP for updates

---

### Option 2: Clone (For Slightly More Advanced)

**Tell them:**
```powershell
# Clone the student template branch
git clone -b student-template https://github.com/Coraa-12/web-enterprise-learn.git

# Enter directory
cd web-enterprise-learn

# They work here, but NEVER push
```

**Pros:**
- Can pull updates with `git pull`
- Feels more "real"

**Cons:**
- Might accidentally try to push
- Need to explain Git commands

---

### Option 3: Fork (If They INSIST on Git)

**Tell them:**
1. Click "Fork" button on GitHub
2. Clone THEIR fork (not yours)
3. They can push to their fork all they want
4. Can submit Pull Requests to you if they want

**Pros:**
- They can learn Git safely
- Can't break your repo
- You can review their PRs

**Cons:**
- More complex setup
- They need GitHub accounts

---

## 📝 Student Instructions Document

Create this file: `HOW-TO-DOWNLOAD.md`

```markdown
# 🎯 How to Get This Project

## Option 1: Download ZIP (Easiest - Recommended!)

1. Go to: https://github.com/Coraa-12/web-enterprise-learn
2. Click the green **"Code"** button
3. Click **"Download ZIP"**
4. Extract the ZIP file
5. Double-click `start.bat`

**That's it!** No Git needed.

## Option 2: If You Know Git

```bash
git clone -b student-template https://github.com/Coraa-12/web-enterprise-learn.git
cd web-enterprise-learn
```

⚠️ **IMPORTANT:** Do NOT push anything! This is read-only for students.

## Getting Updates

### If you downloaded ZIP:
- Download a fresh ZIP
- Copy your `public/` folder to the new version

### If you cloned with Git:
```bash
git pull origin student-template
```

## Need Help?

Read `START-HERE.md` in the project folder!
```

---

## 🛡️ Protecting Your Repo

### .gitignore Additions

Make sure these are in `.gitignore`:

```gitignore
# Environment
.env
.env.local

# Dependencies
/vendor/

# Docker volumes
/data/
/mysql-data/

# IDE
.vscode/
.idea/

# OS
.DS_Store
Thumbs.db

# Student work (if you want to ignore their custom files)
/public/student-work/
```

### Pre-commit Hook (Optional - Prevents Accidental Pushes to Main)

Create `.git/hooks/pre-commit`:

```bash
#!/bin/sh
BRANCH=$(git rev-parse --abbrev-ref HEAD)

if [ "$BRANCH" = "main" ]; then
  echo "🚨 You're committing directly to main!"
  echo "Switch to dev branch first:"
  echo "  git checkout dev"
  exit 1
fi
```

Make it executable:
```powershell
chmod +x .git/hooks/pre-commit
```

---

## 🔄 Common Scenarios

### Scenario: Student Wants to Share Their Work

**What they should do:**
1. Email you their `public/` folder
2. Or share via Google Drive
3. Or show you in person

**What you do:**
1. Review their code
2. Add to your `dev` branch if good
3. Merge to `main` when ready

---

### Scenario: Student Found a Bug

**What they should do:**
1. Tell you in person/chat
2. Or create GitHub Issue (if they know how)

**What you do:**
1. Fix on `dev` branch
2. Test
3. Merge to `main`
4. Announce update to class

---

### Scenario: You Want to Release an Update

```powershell
# On dev branch
git checkout dev

# Make changes
# ... edit files ...

# Commit
git add .
git commit -m "fix: improve documentation clarity"

# Test thoroughly
.\start.bat
# ... test everything ...

# Merge to main
git checkout main
git merge dev
git push origin main

# Update student template if needed
git checkout student-template
git merge main
git push origin student-template

# Tell students
# "New version available! Re-download from GitHub"
```

---

## 📊 Branch Permissions Summary

| Branch | Who Can Push | Purpose |
|--------|--------------|---------|
| `main` | Only you (via PR) | Stable releases |
| `dev` | Only you | Active development |
| `student-template` | Only you | Clean student downloads |
| `feature/*` | Only you | Experimental features |

**Students:** Download only, never push ❌

---

## 🎓 Teaching Moment (Optional)

If you want to teach them Git later:

1. After project is done
2. Create a `git-tutorial` branch
3. Add `GIT-BASICS.md` with safe commands
4. Let them practice on forks

But for now? **Keep it simple. No Git for them.**

---

## ✅ Quick Command Reference

```powershell
# Start of day
git checkout dev
git pull origin dev

# Work...
git add .
git commit -m "feat: your changes"
git push origin dev

# Release
git checkout main
git merge dev
git push origin main

# Back to work
git checkout dev
```

---

**Remember:** You're protecting them from themselves. Git is powerful but dangerous for beginners. Let them learn Docker first, Git later! 🛡️
