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

## PACKAGE INSTALLATION
resource package installation

### 1. Sweet Alert
URL : https://github.com/realrashid/sweet-alert
```bash
composer require realrashid/sweet-alert
```
how to use in controller
```bash
toast('Message', 'status');
```
Example
```bash
toast('Data in Saved', 'success');
```

### 2. Debugbar
if you can use or view query you can use this package

Url
```bash
https://github.com/barryvdh/laravel-debugbar
```

open terminal and install
```bash
composer require barryvdh/laravel-debugbar
```

### 3. PDF
Url
```bash
https://github.com/barryvdh/laravel-dompdf
```

Configuration
```bash
composer require barryvdh/laravel-dompdf
```

Publish
```bash
php artisan vendor:publish --provider="Barryvdh\DomPDF\ServiceProvider"
```

Using
```bash
use Barryvdh\DomPDF\Facade\Pdf;

$pdf = Pdf::loadView('pdf.invoice', $data);
return $pdf->download('invoice.pdf');
```
or
```bash
Pdf::loadHTML($html)->setPaper('a4', 'landscape')->setWarnings(false)->save('myfile.pdf')
```

### 4. Excel

Url
```bash
https://docs.laravel-excel.com/3.1/getting-started/
```