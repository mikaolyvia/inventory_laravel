# 🎵 Inventory Management App (Laravel Refactoring - Pertemuan 5)

Aplikasi Pengelolaan Inventaris Toko Musik berbasis **Laravel Framework (MVC)**. Proyek ini merupakan hasil _refactoring_ dan migrasi arsitektur dari aplikasi PHP Native (Pertemuan 4) dengan tetap mempertahankan seluruh _business rules_, konsistensi database relasional, dan validasi data.

---

## 📌 Fitur Utama & Acceptance Criteria (P5)

1. **Arsitektur MVC Murni**: Pemisahan tanggung jawab yang jelas antara Model, View, dan Controller.
2. **Database Migrations & Seeders**: Skema database terkelola secara otomatis via migration lengkap dengan relasi Foreign Key dan data awal (seeder).
3. **Relasi Model Eloquent**: Relasi One-to-Many antara `Category` dan `Product` (`hasMany` & `belongsTo`) dengan Eager Loading (`with('category')`).
4. **Resource Controller & Routing**: Mengimplementasikan standar RESTful CRUD 7 rute menggunakan `Route::resource`.
5. **Validasi Server-Side**: Mencegah duplikasi SKU, validasi tipe data, serta pembatasan harga dan stok non-negatif.
6. **Blade Templating**: Menggunakan Master Layout (`layouts/app.blade.php`), proteksi CSRF (`@csrf`), direktif `@error`, dan partial component.
7. **Pencarian, Filter & Paginasi**: Pencarian nama/SKU, filter kategori dinamis, dan pagination yang mempertahankan query string (`withQueryString()`).
8. **Business Rules P4 Terjaga**:
    - Peringatan stok kritis otomatis untuk produk dengan stok < 5.
    - Perhitungan otomatis subtotal nilai dan total valuasi aset inventaris.

---

## 🏗️ Penjelasan Arsitektur MVC Proyek

Alur penanganan data mengikuti siklus standar Laravel:
$$\text{HTTP Request} \longrightarrow \text{Route} \longrightarrow \text{Controller} \longrightarrow \text{Model (Eloquent)} \longrightarrow \text{Database} \longrightarrow \text{Blade View (Response)}$$

- **Model (`app/Models/`):**
    - `Category.php`: Merepresentasikan tabel kategori dan mendefinisikan relasi `hasMany(Product::class)`.
    - `Product.php`: Merepresentasikan tabel produk, mendefinisikan atribut mass-assignment `$fillable`, serta relasi `belongsTo(Category::class)`.
- **Controller (`app/Http/Controllers/ProductController.php`):**
    - Menangani alur request CRUD, mengeksekusi validasi input server-side, memanggil query Eloquent, dan mengarahkan response/redirect dengan _flash message_.
- **View (`resources/views/`):**
    - `layouts/app.blade.php`: Master layout utama berbasis Bootstrap 5.
    - `products/index.blade.php`: Menampilkan ringkasan statistik, filter pencarian, tabel produk, dan paginasi.
    - `products/create.blade.php` & `products/edit.blade.php`: Form penambahan dan pengubahan produk lengkap dengan feedback pesan validasi.

---

## 🚀 Panduan Instalasi & Menjalankan Proyek

Ikuti langkah-langkah berikut untuk menjalankan proyek di komputer lokal:

### 1. Clone Repositori

```bash
git clone [https://github.com/mikaolyvia/inventory_laravel.git](https://github.com/mikaolyvia/inventory_laravel.git)
cd inventory_laravel
```
