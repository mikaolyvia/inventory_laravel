@extends('layouts.app')

@section('content')
<div class="card" style="max-width: 600px; margin: 0 auto;">
    <div style="margin-bottom: 16px;">
        <a href="{{ route('products.index') }}" class="btn btn-secondary">&larr; Kembali</a>
    </div>

    <h2>Edit Produk: {{ $product->name }}</h2>

    <form action="{{ route('products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="category_id">Kategori</label>
            <select name="category_id" id="category_id" class="{{ $errors->has('category_id') ? 'is-invalid' : '' }}">
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="sku">SKU (Kode Barang)</label>
            <input type="text" name="sku" id="sku" value="{{ old('sku', $product->sku) }}" class="{{ $errors->has('sku') ? 'is-invalid' : '' }}">
            @error('sku')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="name">Nama Produk</label>
            <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" class="{{ $errors->has('name') ? 'is-invalid' : '' }}">
            @error('name')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">Harga (Rp)</label>
            <input type="number" name="price" id="price" min="0" step="0.01" value="{{ old('price', $product->price) }}" class="{{ $errors->has('price') ? 'is-invalid' : '' }}">
            @error('price')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="stock">Jumlah Stok</label>
            <input type="number" name="stock" id="stock" min="0" value="{{ old('stock', $product->stock) }}" class="{{ $errors->has('stock') ? 'is-invalid' : '' }}">
            @error('stock')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea name="description" id="description" rows="3">{{ old('description', $product->description) }}</textarea>
            @error('description')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-warning">Perbarui Produk</button>
    </form>
</div>
@endsection