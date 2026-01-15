# Installation Guide – Student CRUD Application (Laravel)



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



### 5. Generate application key

```bash
php artisan key:generate
```

---

### 6. Run migrations

```bash
php artisan migrate
```

---

### 7. Create Admin account (required)

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

### 8. Start the server

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




