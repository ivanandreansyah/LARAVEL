@extends('layouts.main')

@section('title', 'Daftar Produk')

@section('content')
    <h2>Daftar Produk</h2>
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ $product['image'] }}" class="card-img-top" alt="{{ $product['name'] }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product['name'] }}</h5>
                        <p class="card-text">{{ $product['description'] }}</p>
                        <p class="card-text"><strong>Rp{{ number_format($product['price'], 0, ',', '.') }}</strong></p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection 