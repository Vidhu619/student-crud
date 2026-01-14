# Installation Guide – Student CRUD Application (Laravel)

This guide explains how to set up and run the Student CRUD Application locally.

---

## System Requirements

- PHP 8.1 or higher
- Composer
- Node.js & npm
- MySQL
- Git

---

## Installation Steps

---

### 1. Clone the repository

```bash
git clone https://github.com/Vidhu619/student-crud.git
cd student-crud
```

---

### 2. Install PHP dependencies

```bash
composer install
```

---

### 3. Install frontend dependencies

```bash
npm install
npm run build
```

> If PowerShell blocks npm execution:
```powershell
Set-ExecutionPolicy -Scope CurrentUser -ExecutionPolicy RemoteSigned
```

---

### 4. Create environment file

```bash
cp .env.example .env
```

---

### 5. Configure database

Open `.env` and update:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=student_crud
DB_USERNAME=root
DB_PASSWORD=
```

Create database:

```sql
CREATE DATABASE student_crud;
```

---

### 6. Generate application key

```bash
php artisan key:generate
```

---

### 7. Run migrations

```bash
php artisan migrate
```

---

### 8. Create Admin account (required)

```bash
php artisan tinker
```

```php
use App\Models\User;

User::create([
    'name' => 'Admin',
    'email' => 'admin@example.com',
    'password' => bcrypt('admin123'),
    'role' => 'admin'
]);
```

Exit:

```php
exit
```

---

### 9. Start the server

```bash
php artisan serve
```

Open:

```
http://127.0.0.1:8000
```

Login with:

```
Email: admin@example.com
Password: admin123
```

---

## Default Roles

| Role | Permissions |
|------|------------|
| admin | Full CRUD access |
| user | View only |

New registrations are assigned the `user` role by default.

---

## Notes

- Admin account must be created manually.
- Login back-button cache prevention is already configured.
- All student operations use AJAX (no page reloads).
- DataTables is used for listing students.

---

## Troubleshooting

### Database connection error

- Check `.env` credentials
- Ensure MySQL service is running

### Icons not showing

- Ensure internet connection (Bootstrap Icons CDN)

### npm command blocked

Run:

```powershell
Set-ExecutionPolicy -Scope CurrentUser -ExecutionPolicy RemoteSigned
```

---


