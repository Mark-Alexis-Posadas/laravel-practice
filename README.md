# 🚀 Git Flow Guide

A simple Git workflow for individual developers and teams.

---

# Branch Structure

There are two main branches:

```text
main
│
develop
```

## `main`

- Production-ready code
- Always stable
- Do not commit directly unless necessary

## `develop`

- Integration branch
- All completed features are merged here before going to `main`

---

# Feature Branches

Create a separate branch for every task or feature.

Examples:

```text
feature/add-person-modal
feature/delete-person
feature/pagination
feature/search-person
feature/sort-by-id
```

Workflow:

```text
develop
│
├── feature/add-person-modal
├── feature/delete-person
├── feature/search-person
└── feature/pagination
```

---

# Step 1 - Clone the Repository

```bash
git clone https://github.com/your-company/project.git
```

---

# Step 2 - Switch to the Develop Branch

```bash
git checkout develop
```

---

# Step 3 - Pull the Latest Changes

Always synchronize your local branch before starting new work.

```bash
git pull origin develop
```

---

# Step 4 - Create a Feature Branch

```bash
git checkout -b feature/add-person-modal
```

Now you're working on your own branch.

---

# Step 5 - Start Coding

Example tasks:

- Create modal
- Add validation
- Connect API
- Test functionality

---

# Step 6 - Check Modified Files

```bash
git status
```

---

# Step 7 - Stage Changes

Stage all files:

```bash
git add .
```

Or stage specific files:

```bash
git add resources/views/person/index.blade.php
```

---

# Step 8 - Commit Your Changes

Use meaningful commit messages.

```bash
git commit -m "feat: add person modal"
```

Common commit prefixes:

| Prefix   | Description                                |
| -------- | ------------------------------------------ |
| feat     | New feature                                |
| fix      | Bug fix                                    |
| refactor | Code improvement without changing behavior |
| style    | Formatting or UI changes                   |
| docs     | Documentation                              |
| test     | Tests                                      |
| chore    | Maintenance tasks                          |

Examples:

```bash
git commit -m "feat: add search functionality"
```

```bash
git commit -m "fix: sorting by ID descending"
```

```bash
git commit -m "refactor: simplify pagination logic"
```

---

# Step 9 - Push Your Branch

```bash
git push origin feature/add-person-modal
```

---

# Step 10 - Create a Pull Request

Create a Pull Request from:

```text
feature/add-person-modal
        │
        ▼
develop
```

A teammate reviews the changes before merging.

---

# After Merge

Switch back to the develop branch.

```bash
git checkout develop
```

Pull the latest changes.

```bash
git pull origin develop
```

Delete your local feature branch.

```bash
git branch -d feature/add-person-modal
```

---

# Start a New Task

Always start from an updated `develop` branch.

```bash
git checkout develop

git pull origin develop

git checkout -b feature/update-person
```

---

# Example Project Structure

```text
main
│
develop
│
├── feature/add-person
├── feature/edit-person
├── feature/delete-person
├── feature/view-person
├── feature/pagination
├── feature/search
├── feature/sort
└── feature/export
```

---

# Bug Fix Branches

For fixing bugs, use descriptive branch names.

```text
bugfix/modal-validation
bugfix/api-error
bugfix/pagination
```

Example commit:

```bash
git commit -m "fix: prevent duplicate person submission"
```

---

# Release Process

Once all features have been tested:

```text
develop
    │
    ▼
main
```

Merge into production.

```bash
git checkout main

git merge develop

git push origin main
```

---

# Daily Workflow

```bash
git checkout develop

git pull origin develop

git checkout -b feature/add-person

# Write your code

git add .

git commit -m "feat: add person modal"

git push origin feature/add-person
```

After your Pull Request has been merged:

```bash
git checkout develop

git pull origin develop

git branch -d feature/add-person
```

---

# Best Practices

- Never work directly on the `main` branch.
- Pull the latest changes before creating a new feature branch.
- Keep feature branches focused on a single task.
- Write clear and descriptive commit messages.
- Open a Pull Request for every completed feature.
- Delete feature branches after they have been merged.
- Keep commits small and meaningful.
- Review code before merging.

---

# Recommended Branch Naming

```text
feature/login
feature/user-profile
feature/payment-gateway
feature/export-report

bugfix/login-error
bugfix/api-timeout

hotfix/security-patch

release/v1.0.0
release/v2.1.0
```

---

# Conventional Commit Examples

```text
feat: add authentication
fix: resolve login validation issue
refactor: simplify user service
style: improve dashboard layout
docs: update installation guide
test: add API unit tests
chore: update dependencies
```

---

# Summary

```text
1. Checkout develop
2. Pull latest changes
3. Create feature branch
4. Develop the feature
5. Stage changes
6. Commit changes
7. Push feature branch
8. Open Pull Request
9. Merge into develop
10. Delete feature branch
11. Repeat
```

Happy Coding! 🚀
