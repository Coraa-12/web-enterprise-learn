# 🌳 Branch & Version Guide

This repository has **different versions** for different purposes. Choose the right starting point for your project!

---

## 📦 Available Versions

### 1. **`boilerplate-generic`** - Clean Laravel Boilerplate
**🎯 Use this when:** Starting ANY new Laravel project (e-commerce, portfolio, API, etc.)

**What's included:**
- ✅ Laravel 12 with Docker (PHP 8.3, MySQL 8.0, Nginx, phpMyAdmin)
- ✅ Beginner-friendly Windows .bat scripts
- ✅ Comprehensive documentation
- ✅ **NO theme/templates** - blank canvas
- ✅ **NO specific design** - pure Laravel

**Download:**
```bash
git clone -b boilerplate-generic https://github.com/Coraa-12/web-enterprise-learn.git
```

**Or download ZIP:**
- Go to: https://github.com/Coraa-12/web-enterprise-learn/tree/boilerplate-generic
- Click "Code" → "Download ZIP"

---

### 2. **`dev`** - Blog Starter with Bootstrap Theme
**🎯 Use this when:** Building a blog, news site, or content platform

**What's included:**
- ✅ Everything from `boilerplate-generic`
- ✅ **Start Bootstrap Blog Home template** (Bootstrap 5)
- ✅ Pre-built pages: Home, About, Contact, Blog
- ✅ Responsive navbar with active states
- ✅ Blog-ready layout system
- ✅ Ready to connect to database for posts

**Download:**
```bash
git clone -b dev https://github.com/Coraa-12/web-enterprise-learn.git
```

---

### 3. **`main`** - Production Releases
**🎯 Use this when:** You want the latest stable, tested version

**What's included:**
- ✅ Merged and tested features from `dev`
- ✅ Production-ready code
- ✅ Regularly updated

---

### 4. **`student-template`** - Clean Download for Classmates
**🎯 Use this when:** You're a student downloading for the first time

**What's included:**
- ✅ Same as `main` branch
- ✅ Optimized for students with zero Git knowledge
- ✅ Download as ZIP, double-click `start.bat`, done!

**Download ZIP:**
- Go to: https://github.com/Coraa-12/web-enterprise-learn/tree/student-template
- Click "Code" → "Download ZIP"

---

## 🏷️ Version Tags

### `v1.0-generic-laravel`
Snapshot of **pure Laravel 12 boilerplate** (no theme).

**Download specific version:**
```bash
git clone --branch v1.0-generic-laravel https://github.com/Coraa-12/web-enterprise-learn.git
```

---

## 🤔 Which Version Should I Use?

| Your Project Type | Recommended Branch |
|-------------------|-------------------|
| 📝 **Blog / News Site** | `dev` (Bootstrap blog theme) |
| 🛒 **E-commerce** | `boilerplate-generic` (start fresh) |
| 💼 **Portfolio** | `boilerplate-generic` (start fresh) |
| 🔌 **REST API** | `boilerplate-generic` (no views needed) |
| 📱 **General Web App** | `boilerplate-generic` (maximum flexibility) |
| 🎓 **Learning Laravel** | `boilerplate-generic` (learn from scratch) |
| 📰 **Blog Assignment** | `dev` (pre-styled, focus on features) |

---

## 🔄 Branch Workflow (For Maintainers)

```
boilerplate-generic  ← Clean Laravel, never add themes here
    ↓
   dev               ← Active development (Bootstrap blog)
    ↓
   main              ← Stable releases
    ↓
student-template     ← Student downloads
```

**Rules:**
- `boilerplate-generic` stays **clean** forever (generic Laravel only)
- `dev` is where you add project-specific features
- Never merge `dev` into `boilerplate-generic` (they diverge intentionally)

---

## 💾 Preserving Generic Version

**If you add more themes/projects:**

1. **Keep generic clean:**
   ```bash
   git checkout boilerplate-generic
   # This branch never gets themes!
   ```

2. **Create project branches:**
   ```bash
   git checkout -b project-ecommerce boilerplate-generic
   # Add e-commerce theme...
   
   git checkout -b project-portfolio boilerplate-generic
   # Add portfolio theme...
   ```

3. **Always start from generic:**
   ```bash
   # DON'T branch from 'dev' (has blog theme)
   # DO branch from 'boilerplate-generic'
   ```

---

## 📖 Documentation

- **SETUP-FIRST.md** - First-time Docker setup
- **LARAVEL-GUIDE.md** - Laravel basics for beginners
- **TROUBLESHOOTING.md** - 50+ solved issues
- **GIT-WORKFLOW.md** - Git branch management (maintainers only)

---

## 🆘 Quick Help

**I want a clean Laravel setup:**
→ Use branch: `boilerplate-generic`

**I want the blog theme:**
→ Use branch: `dev`

**I want to start a NEW project type:**
→ Branch from: `boilerplate-generic`

**I messed up Git:**
→ Download ZIP from the branch you want, start fresh

---

**Last Updated:** October 22, 2025  
**Maintainer:** @Coraa-12  
**Repository:** https://github.com/Coraa-12/web-enterprise-learn
