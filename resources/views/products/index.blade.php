@extends('layouts.app')

@section('content')
<!-- Header & Tombol Tambah -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="fw-bold mb-1">Daftar Inventaris Produk</h3>
        <p class="text-muted mb-0 small">Sistem Pengelolaan Stok, Valuasi Aset, dan Monitoring Stok Kritis</p>
    </div>
    <a href="{{ route('products.create') }}" class="btn btn-primary d-inline-flex align-items-center gap-2 shadow-sm px-3 py-2">
        <i class="bi bi-plus-lg"></i> Tambah Produk
    </a>
</div>

<!-- 3 Kartu Ringkasan (Menyamping) -->
<div class="row g-3 mb-4">
    <div class="col-12 col-md-4">
        <div class="card shadow-sm h-100 border-start border-primary border-4 p-3 bg-white">
            <span class="text-muted small fw-semibold text-uppercase">Total Item Produk</span>
            <h4 class="fw-bold text-dark mt-2 mb-0">{{ $products->total() }} Produk</h4>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="card shadow-sm h-100 border-start border-success border-4 p-3 bg-white">
            <span class="text-muted small fw-semibold text-uppercase">Total Valuasi Aset</span>
            <h4 class="fw-bold text-success mt-2 mb-0">
                Rp {{ number_format($products->sum(fn($p) => $p->price * $p->stock), 0, ',', '.') }}
            </h4>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="card shadow-sm h-100 border-start border-danger border-4 p-3 bg-white">
            <span class="text-muted small fw-semibold text-uppercase">Produk Stok Kritis (&lt; 5)</span>
            <h4 class="fw-bold text-danger mt-2 mb-0">
                {{ $products->filter(fn($p) => $p->stock < 5)->count() }} Item
            </h4>
        </div>
    </div>
</div>

<!-- Card Filter & Tabel Data -->
<div class="card shadow-sm border-0">
    <div class="card-body p-4">
        <!-- Form Pencarian & Filter Kategori -->
        <form method="GET" action="{{ route('products.index') }}" class="row g-2 mb-4">
            <div class="col-12 col-md-5">
                <input type="text" name="search" class="form-control" value="{{ request('search') }}" placeholder="Cari nama produk atau SKU...">
            </div>
            <div class="col-12 col-md-4">
                <select name="category_id" class="form-select">
                    <option value="">-- Semua Kategori --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-md-3 d-flex gap-2">
                <button type="submit" class="btn btn-secondary w-100">
                    <i class="bi bi-search me-1"></i> Cari
                </button>
                @if(request('search') || request('category_id'))
                    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">Reset</a>
                @endif
            </div>
        </form>

        <!-- Tabel Produk -->
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;">No</th>
                        <th>SKU</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga Satuan</th>
                        <th class="text-center">Stok</th>
                        <th>Subtotal Nilai</th>
                        <th class="text-center" style="width: 140px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $index => $product)
                        <tr class="{{ $product->stock < 5 ? 'table-warning' : '' }}">
                            <td class="text-center text-muted">{{ $products->firstItem() + $index }}</td>
                            <td><span class="badge bg-light text-dark border font-monospace">{{ $product->sku }}</span></td>
                            <td>
                                <div class="fw-semibold">{{ $product->name }}</div>
                                @if($product->stock < 5)
                                    <span class="badge bg-danger mt-1">Stok Menipis</span>
                                @endif
                            </td>
                            <td><span class="badge bg-secondary-subtle text-dark border">{{ $product->category->name ?? '-' }}</span></td>
                            <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                            <td class="text-center">
                                <span class="fw-bold {{ $product->stock < 5 ? 'text-danger' : 'text-dark' }}">
                                    {{ $product->stock }}
                                </span>
                            </td>
                            <td class="fw-semibold text-primary">
                                Rp {{ number_format($product->price * $product->stock, 0, ',', '.') }}
                            </td>
                            <td class="text-center">
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('products.edit', $product) }}" class="btn btn-outline-warning">Edit</a>
                                    <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-4 text-muted">
                                Tidak ada data produk yang ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Paginasi -->
        <div class="d-flex justify-content-between align-items-center mt-4">
            <small class="text-muted">
                Menampilkan {{ $products->firstItem() ?? 0 }} - {{ $products->lastItem() ?? 0 }} dari {{ $products->total() }} produk
            </small>
            <div>
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
@endsection