@extends('layouts.main')

@section('title', 'Tambah Produk')

@section('content')
<style>
    .produk-form-card {
        background: linear-gradient(120deg, #e3f0ff 0%, #f3e7fe 100%);
        border-radius: 1.5rem;
        box-shadow: 0 4px 24px rgba(80, 80, 200, 0.10);
        padding: 2.5rem 2rem 2rem 2rem;
        margin-bottom: 2rem;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
        animation: produkFormFadeIn 1s cubic-bezier(.68,-0.55,.27,1.55) 0.1s both;
    }
    @keyframes produkFormFadeIn {
        from { opacity: 0; transform: translateY(40px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .produk-form-title {
        font-size: 2rem;
        font-weight: 700;
        color: #1976f3;
        margin-bottom: 1.5rem;
        text-align: center;
    }
    .produk-form-label {
        font-weight: 600;
        color: #1976f3;
    }
    .produk-form-btn {
        background: #1976f3;
        color: #fff;
        font-weight: 600;
        border-radius: 2rem;
        padding: 0.6rem 2rem;
        font-size: 1.1rem;
        box-shadow: 0 4px 16px rgba(80, 80, 200, 0.12);
        border: none;
        transition: 0.2s;
    }
    .produk-form-btn:hover {
        background: #00bcd4;
        color: #fff;
        transform: scale(1.04);
        box-shadow: 0 8px 32px rgba(80, 80, 200, 0.18);
    }
    .produk-form-cancel {
        background: #888;
        color: #fff;
        border-radius: 2rem;
        padding: 0.6rem 1.5rem;
        font-size: 1.1rem;
        border: none;
        margin-left: 0.5rem;
        transition: 0.2s;
    }
    .produk-form-cancel:hover {
        background: #bdbdbd;
        color: #222;
    }
</style>
<div class="produk-form-card">
    <div class="produk-form-title">Tambah Produk</div>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label produk-form-label">Nama Produk</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            @error('name')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label produk-form-label">Deskripsi</label>
            <textarea name="description" class="form-control" required>{{ old('description') }}</textarea>
            @error('description')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label produk-form-label">Harga</label>
            <input type="number" name="price" class="form-control" value="{{ old('price') }}" required>
            @error('price')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label produk-form-label">Stok</label>
            <input type="number" name="stock" class="form-control" value="{{ old('stock', 0) }}" min="0" required>
            @error('stock')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label produk-form-label">Gambar (opsional)</label>
            <input type="file" name="image" class="form-control">
            @error('image')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="d-flex justify-content-center gap-2 mt-4">
            <button type="submit" class="produk-form-btn">Simpan</button>
            <a href="{{ route('products.index') }}" class="produk-form-cancel">Batal</a>
        </div>
    </form>
</div>
@endsection 