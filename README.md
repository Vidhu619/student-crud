1.CREATE DATABASE student_crud;
2.php artisan config:clear
3.php artisan migrate
Add validation rules
npm install
npm run build
use App\Models\User;
php artisan tinker

User::create([
  'name' => 'Admin',
  'email' => 'admin@example.com',
  'password' => bcrypt('admin123')
]);
exit;
 php artisan make:middleware PreventBackHistory


