@extends('layouts.main')

@section('title', 'Daftar Produk')

@section('content')
    <style>
        .produk-animate {
            opacity: 0;
            transform: translateY(40px);
            animation: produkFadeIn 1s cubic-bezier(.68,-0.55,.27,1.55) 0.1s forwards;
        }
        @keyframes produkFadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .produk-card {
            background: linear-gradient(120deg, #e3f0ff 0%, #f3e7fe 100%);
            border-radius: 1.2rem;
            box-shadow: 0 4px 24px rgba(80, 80, 200, 0.10);
            border: none;
            transition: box-shadow 0.3s, transform 0.3s;
            overflow: hidden;
            position: relative;
        }
        .produk-card:hover {
            box-shadow: 0 8px 32px rgba(80, 80, 200, 0.18), 0 3px 12px rgba(0,0,0,0.10);
            transform: scale(1.03);
        }
        .produk-img {
            border-radius: 1.2rem 1.2rem 0 0;
            object-fit: cover;
            height: 180px;
            width: 100%;
            background: #fff;
            box-shadow: 0 2px 8px rgba(80, 80, 200, 0.06);
        }
        .produk-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: #1976f3;
        }
        .produk-price {
            font-size: 1.1rem;
            font-weight: 700;
            color: #00bcd4;
        }
        .produk-btn {
            background: #1976f3;
            color: #fff;
            font-weight: 600;
            border-radius: 2rem;
            padding: 0.5rem 1.2rem;
            font-size: 1rem;
            box-shadow: 0 4px 16px rgba(80, 80, 200, 0.12);
            border: none;
            transition: 0.2s;
        }
        .produk-btn:hover {
            background: #00bcd4;
            color: #fff;
            transform: scale(1.04);
            box-shadow: 0 8px 32px rgba(80, 80, 200, 0.18);
        }
        .produk-empty {
            background: #fff3cd;
            color: #856404;
            border-radius: 1rem;
            padding: 1.2rem;
            font-size: 1.1rem;
            margin-bottom: 1.5rem;
            animation: produkFadeIn 1s 0.2s both;
        }
    </style>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold produk-animate">Daftar Produk</h2>
        <a href="{{ route('products.create') }}" class="btn btn-success produk-btn">Tambah Produk</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success produk-animate">{{ session('success') }}</div>
    @endif
    <div class="row g-4">
        @forelse($products as $product)
            <div class="col-12 col-sm-6 col-md-4 produk-animate" style="animation-delay: {{ $loop->index * 0.1 . 's' }}; animation-fill-mode: both;">
                <div class="produk-card h-100">
                    @if($product->image)
                        <img src="{{ asset('storage/'.$product->image) }}" class="produk-img" alt="{{ $product->name }}">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="produk-title mb-1">{{ $product->name }}</h5>
                        <p class="card-text text-muted mb-2">{{ $product->description }}</p>
                        <p class="produk-price mb-3">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                        <div class="mt-auto d-flex flex-wrap gap-1">
                            <a href="{{ route('products.show', $product) }}" class="btn btn-info btn-sm produk-btn">Detail</a>
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm produk-btn">Edit</a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus produk?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm produk-btn">Hapus</button>
                            </form>
                            <form action="{{ route('cart.add', $product) }}" method="POST" class="d-inline">
                                @csrf
                                <input type="number" name="quantity" value="1" min="1" class="form-control form-control-sm d-inline-block" style="width: 60px;">
                                <button type="submit" class="btn btn-success btn-sm produk-btn"><i class="bi bi-cart-plus me-1"></i>Keranjang</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 produk-animate">
                <div class="produk-empty text-center">Belum ada produk.</div>
            </div>
        @endforelse
    </div>
@endsection 