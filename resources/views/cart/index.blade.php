@extends('layouts.main')

@section('title', 'Keranjang Belanja')

@section('content')
    <style>
        .cart-container {
            background: linear-gradient(120deg, #e3f0ff 0%, #f3e7fe 100%);
            border-radius: 1.5rem;
            box-shadow: 0 4px 24px rgba(80, 80, 200, 0.10);
            padding: 2.5rem 2rem 2rem 2rem;
            margin-bottom: 2rem;
            animation: cartFadeIn 1s cubic-bezier(.68,-0.55,.27,1.55) 0.1s both;
        }
        @keyframes cartFadeIn {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .cart-title {
            font-size: 2.2rem;
            font-weight: 700;
            color: #1976f3;
            margin-bottom: 1.5rem;
        }
        .cart-item-card {
            background: #fff;
            border-radius: 1rem;
            box-shadow: 0 2px 8px rgba(80, 80, 200, 0.06);
            padding: 1rem;
            margin-bottom: 1rem;
            transition: transform 0.2s;
            animation: cartFadeIn 0.8s both;
        }
        .cart-item-card:hover {
            transform: scale(1.02);
        }
        .cart-product-img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 0.7rem;
            box-shadow: 0 2px 8px rgba(80, 80, 200, 0.1);
        }
        .cart-product-name {
            font-weight: 600;
            font-size: 1.1rem;
            color: #1976f3;
        }
        .cart-price {
            font-weight: 700;
            font-size: 1.1rem;
            color: #00bcd4;
        }
        .cart-summary {
            background: #fff;
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 2px 8px rgba(80, 80, 200, 0.06);
            position: sticky;
            top: 2rem;
        }
        .cart-summary-title {
            font-weight: 700;
            font-size: 1.3rem;
            color: #1976f3;
            margin-bottom: 1rem;
        }
        .cart-btn {
            background: #1976f3;
            color: #fff;
            font-weight: 600;
            border-radius: 2rem;
            padding: 0.7rem 2rem;
            font-size: 1.1rem;
            box-shadow: 0 4px 16px rgba(80, 80, 200, 0.12);
            border: none;
            transition: 0.2s;
        }
        .cart-btn.checkout {
            background: #2e7d32;
        }
        .cart-btn:hover {
            background: #00bcd4;
            color: #fff;
            transform: scale(1.04);
            box-shadow: 0 8px 32px rgba(80, 80, 200, 0.18);
        }
        .cart-empty {
            background: #fff3cd;
            color: #856404;
            border-radius: 1rem;
            padding: 1.5rem;
            text-align: center;
            font-size: 1.2rem;
            animation: cartFadeIn 1s 0.2s both;
        }
    </style>

    <div class="container py-5">
        <div class="cart-container">
            <h2 class="cart-title">Keranjang Belanja</h2>
            @if(session('success'))
                <div class="alert alert-success animate-fade-in">{{ session('success') }}</div>
            @endif
            @if($cartItems->count() > 0)
                <div class="row g-4">
                    <div class="col-lg-8">
                        @foreach($cartItems as $item)
                            <div class="cart-item-card" style="animation-delay: <?php echo ($loop->index * 0.1) . 's'; ?>;">
                                <div class="row align-items-center">
                                    <div class="col-md-2 text-center">
                                        <img src="{{ asset('storage/'.$item->product->image) }}" class="cart-product-img" alt="{{ $item->product->name }}">
                                    </div>
                                    <div class="col-md-4">
                                        <div class="cart-product-name">{{ $item->product->name }}</div>
                                        <div class="cart-price">Rp{{ number_format($item->price, 0, ',', '.') }}</div>
                                    </div>
                                    <div class="col-md-3">
                                        <form action="{{ route('cart.update', $item) }}" method="POST" class="d-flex align-items-center">
                                            @csrf
                                            @method('PUT')
                                            <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="form-control form-control-sm me-2" style="width: 70px;">
                                            <button type="submit" class="btn btn-sm btn-outline-primary"><i class="bi bi-arrow-clockwise"></i></button>
                                        </form>
                                    </div>
                                    <div class="col-md-2 text-end">
                                        <div class="fw-bold">Rp{{ number_format($item->quantity * $item->price, 0, ',', '.') }}</div>
                                    </div>
                                    <div class="col-md-1 text-end">
                                        <form action="{{ route('cart.remove', $item) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin hapus item ini?')"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-lg-4">
                        <div class="cart-summary">
                            <div class="cart-summary-title">Ringkasan Belanja</div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Total Item:</span>
                                <span class="fw-bold">{{ $cartItems->sum('quantity') }}</span>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span>Total Harga:</span>
                                <span class="fw-bold fs-5 text-primary">Rp{{ number_format($total, 0, ',', '.') }}</span>
                            </div>
                            <hr>
                            <div class="d-grid gap-2">
                                <form action="{{ route('cart.checkout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="cart-btn checkout w-100">Checkout</button>
                                </form>
                                <a href="{{ route('products.index') }}" class="btn btn-outline-secondary w-100">Lanjut Belanja</a>
                                <form action="{{ route('cart.clear') }}" method="POST" class="mt-2">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-danger w-100" onclick="return confirm('Yakin kosongkan keranjang?')">
                                        <i class="bi bi-trash"></i> Kosongkan Keranjang
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="cart-empty">
                    <i class="bi bi-cart-x me-2"></i> Keranjang belanja Anda kosong.
                </div>
                <a href="{{ route('products.index') }}" class="cart-btn mt-3 d-inline-block">Mulai Belanja</a>
            @endif
        </div>
    </div>
@endsection 