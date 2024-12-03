## Sample Project Laravel 10
Create Project Sample With Laravel 10 Full

### Clone this project 
```bash
git clone https://github.com/b4ngm4n/sample.git
```

### Move to project
```bash
cd sample
```

### Configure

```bash
composer install
```


### Setup Database

```bash
cp .env.example .env
```

```bash
nano .env
```

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database-anda
DB_USERNAME=usernama-database-anda
DB_PASSWORD=password-database-anda
```

```bash
php artisan key:generate
```

```bash
php artisan migrate
```

If you have a seeder you can using this command
```bash
php artisan db:seed
```

## KONFIGURASI MULTI PERMISSION

Process sync permission. where you can using this command and create permission in database
```bash
php artisan permission:sync
```

you can see process sync permission in file `app/Console/Commands/SyncPermission.php`

and checking permission role in file `app/Http/Middleware/CheckPermission.php`
and register to kernel in file `app/Http/Kernel.php`