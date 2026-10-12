@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-6">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center border-bottom">
                <h5 class="mb-0 fw-bold">Tambah Produk Baru</h5>
                <a href="{{ route('products.index') }}" class="btn btn-sm btn-outline-secondary">
                    &larr; Kembali
                </a>
            </div>

            <div class="card-body p-4">
                <form action="{{ route('products.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="category_id" class="form-label fw-semibold">Kategori</label>
                        <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="sku" class="form-label fw-semibold">SKU (Kode Barang)</label>
                        <input type="text" name="sku" id="sku" value="{{ old('sku') }}" placeholder="Contoh: ACC-001" class="form-control @error('sku') is-invalid @enderror">
                        @error('sku')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold">Nama Produk</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Nama produk..." class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-7 mb-3">
                            <label for="price" class="form-label fw-semibold">Harga (Rp)</label>
                            <input type="number" name="price" id="price" min="0" step="0.01" value="{{ old('price') }}" placeholder="Contoh: 150000" class="form-control @error('price') is-invalid @enderror">
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-5 mb-3">
                            <label for="stock" class="form-label fw-semibold">Stok Awal</label>
                            <input type="number" name="stock" id="stock" min="0" value="{{ old('stock', 0) }}" class="form-control @error('stock') is-invalid @enderror">
                            @error('stock')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="form-label fw-semibold">Deskripsi (Opsional)</label>
                        <textarea name="description" id="description" rows="3" class="form-control @error('description') is-invalid @enderror" placeholder="Catatan spesifikasi produk...">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary py-2 fw-semibold">Simpan Produk</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection