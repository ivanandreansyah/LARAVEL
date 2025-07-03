@extends('layouts.main')

@section('title', 'Detail Produk')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                @if($product->image)
                    <img src="{{ asset('storage/'.$product->image) }}" class="img-fluid rounded shadow" alt="{{ $product->name }}">
                @else
                    <div class="bg-light rounded d-flex align-items-center justify-content-center" style="height: 400px;">
                        <i class="bi bi-image text-muted display-4"></i>
                    </div>
                @endif
            </div>
            <div class="col-md-6">
                <h2 class="fw-bold mb-3">{{ $product->name }}</h2>
                <p class="text-muted mb-4">{{ $product->description }}</p>
                <div class="mb-4">
                    <span class="h3 fw-bold text-primary">Rp{{ number_format($product->price, 0, ',', '.') }}</span>
                </div>
                
                <form action="{{ route('cart.add', $product) }}" method="POST" class="mb-4">
                    @csrf
                    <div class="row align-items-end">
                        <div class="col-md-4">
                            <label for="quantity" class="form-label">Jumlah:</label>
                            <input type="number" name="quantity" id="quantity" value="1" min="1" class="form-control">
                        </div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-success btn-lg w-100">
                                <i class="bi bi-cart-plus me-2"></i>Tambah ke Keranjang
                            </button>
                        </div>
                    </div>
                </form>
                
                <div class="d-flex gap-2">
                    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left me-2"></i>Kembali
                    </a>
                    <a href="{{ route('cart.index') }}" class="btn btn-outline-primary">
                        <i class="bi bi-cart3 me-2"></i>Lihat Keranjang
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection 