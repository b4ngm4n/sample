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


## SECURITY

### TROUBLE

#### 1. Gate x MANUAL

##### Bahasa Indonesia
Saya telah mencoba beberapa cara sebelum menggunakan Gate x Policy, berikut beberapa cara yang telah dicoba

Menggunakan fungsi pada model langsung, Example : 
```bash
public function getUserPermissionsAttribute()
{
   $user = auth()->user();

   return [
      'canView' => $user->hasPermission('read-kelurahan'),
      'canEdit' => $user->hasPermission('edit-kelurahan'),
      'canDelete' => $user->hasPermission('delete-kelurahan'),
   ];
}
```
kode View
```bash
@if ($kelurahan->user_permissions['canEdit'])
   <a href="{{ route('kelurahan.edit', $kelurahan->uuid) }}" class="btn btn-sm btn-warning"><i class="ti-pencil-alt"></i></a>
@endif
```
dengan ini, akan lebih efektif pada penggunaan Gate & Policy yang berulang pada masing masing data yang berulang. seperti read, edit, delete
tapi kekurangannya adalah, harus membuatnya pada masing masing model.

#### 2. Gate x Policy

##### Bahasa Indonesia

Keamanan aplikasi ditingkatkan dengan Gate dan Policy, menawarkan sistem otorisasi yang kuat dan fleksibel. Berikut adalah poin-poin utamanya:

1. **Gate**: Gate adalah pendekatan otorisasi berbasis closure yang sederhana, didefinisikan dalam `AuthServiceProvider`. Mereka cocok untuk tindakan yang tidak memerlukan interaksi dengan basis data.

   - **Penggunaan**: Gate biasanya digunakan untuk memeriksa apakah seorang pengguna dapat melakukan tindakan tertentu. Mereka mengembalikan `true` atau `false` berdasarkan kemampuan pengguna.
   
   - **Contoh**: Sebuah gate mungkin menentukan apakah pengguna dapat memperbarui model tertentu, memeriksa peran atau izin pengguna.

2. **Policy**: Policy berbasis kelas, menyediakan pendekatan otorisasi yang lebih terstruktur, terutama berguna untuk model.

   - **Penggunaan**: Policy mengenkapsulasi logika otorisasi terkait model, dengan metode yang sesuai untuk tindakan yang berbeda seperti `view`, `create`, `update`, dan `delete`.
   
   - **Contoh**: Policy untuk model `Post` dapat menentukan siapa yang dapat mengedit atau menghapus pos berdasarkan hubungan pengguna dengan pos tersebut.

3. **Integrasi**: Baik Gate maupun Policy dapat diintegrasikan dengan middleware untuk menerapkan pemeriksaan otorisasi pada level rute.

   - **Contoh**: Menerapkan policy pada rute untuk memastikan hanya pengguna yang diotorisasi yang dapat mengakses sumber daya.

##### Kelebihan Gate & Policy
- Kelebihan:
  - Flexibel, dapat disesuaikan dengan kebutuhan aplikasi.
  - Mudah digunakan, karena hanya perlu mengimpor kelas yang sesuai.
  - Dapat digunakan untuk mengatur akses ke berbagai sumber daya, seperti model, route, dan lainnya.
  - Dapat digunakan untuk mengatur akses berdasarkan peran, izin, dan lainnya.
- Kekurangan:
  - Harus dipahami dengan baik sebelum digunakan.
  - Memerlukan waktu yang cukup lama untuk memahami dan mengatur.
  - Tidak dapat digunakan untuk mengatur akses ke sumber daya yang tidak berbasis model.
  - Gate yang berulang

##### Example
- Create Policy
```bash
php artisan make:policy KelurahanPolicy --model=Kelurahan
```

Di KelurahanPolicy
```bash
public function view(User $user, Kelurahan $kelurahan): bool
{
   return $user->hasPermission('read-kelurahan');
}
```
di KelurahanController
```bash
 public function show(Kelurahan $kelurahan)
{
   $this->authorize('view', $kelurahan);
   return view('dashboard.page.kelurahan.show', compact('kelurahan'));
}
```
di View
```bash
@can('view', $kelurahan)
<a href="{{ route('kelurahan.show', $kelurahan->uuid) }}" class="btn btn-sm btn-info"><i
      class="ti-info-alt"></i></a>
@endcan
```
di AuthServiceProvider
```bash
protected $policies = [
   Kelurahan::class => KelurahanPolicy::class
];

public function boot(): void
{
   $this->registerPolicies();
}
```
dan hasil Debugbar
```bash
view App\Models\Kelurahan(id=1) [▼
  "ability" => "view"
  "target" => "App\Models\Kelurahan(id=1)"
  "result" => true
  "user" => 1
  "arguments" => "[0 => Object(App\Models\Kelurahan)]"
]
```

#### karena ini menghasilkan banyak sekali gate. makanya saya merubah kembali dengan menggunakan manual

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

### 5. Laravel Telescope