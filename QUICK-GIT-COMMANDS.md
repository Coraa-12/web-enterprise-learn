# 🚀 Quick Setup Commands (Copy-Paste These)

## Initial Git Setup (Do Once)

```powershell
# Remove that stray 'nul' file
Remove-Item -Path "nul" -Force -ErrorAction SilentlyContinue

# Add all changes
git add .

# Commit with descriptive message
git commit -m "feat: complete beginner-friendly transformation

- Add Windows .bat scripts for one-click operation
- Replace PostgreSQL with MySQL + phpMyAdmin
- Add visual status page (XAMPP-like control panel)
- Add 7 comprehensive documentation files
- Add automated system checker
- Add Git workflow guides
- Make fully beginner-proof (assumes zero knowledge)"

# Push to main
git push origin main

# Create dev branch
git checkout -b dev
git push -u origin dev

# Create student template branch
git checkout -b student-template
git push -u origin student-template

# Return to main
git checkout main
```

## Your Daily Workflow

```powershell
# Start work (always work on dev!)
git checkout dev
git pull origin dev

# Make changes, then:
git add .
git commit -m "feat: your change description"
git push origin dev

# When ready to release to main:
git checkout main
git merge dev
git push origin main

# Back to dev
git checkout dev
```

## If You Need to Undo

```powershell
# Discard uncommitted changes
git reset --hard HEAD

# Undo last commit (keep changes)
git reset --soft HEAD~1

# Undo last commit (discard changes)
git reset --hard HEAD~1
```

## Emergency: Start Over

```powershell
# Get back to clean state
git checkout main
git reset --hard origin/main
```
