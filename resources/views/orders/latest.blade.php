@extends('layouts.main')

@section('title', 'Order Terakhir')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 p-4">
                <h2 class="fw-bold mb-3 text-primary">Order Terakhir Anda</h2>
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if(!$order)
                    <div class="alert alert-info">Belum ada order.</div>
                @else
                    <div class="mb-3">
                        <strong>ID Order:</strong> #{{ $order->id }}<br>
                        <strong>Tanggal:</strong> {{ $order->created_at->format('d M Y H:i') }}<br>
                        <strong>Total:</strong> <span class="text-success fw-bold">Rp{{ number_format($order->total, 0, ',', '.') }}</span>
                    </div>
                    <h5 class="fw-bold mb-2">Detail Barang:</h5>
                    <ul class="list-group mb-4">
                        @foreach($order->orderItems as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>{{ $item->product->name }}</strong><br>
                                    <small class="text-muted">x{{ $item->quantity }} @ Rp{{ number_format($item->price, 0, ',', '.') }}</small>
                                </div>
                                <span class="fw-bold">Rp{{ number_format($item->quantity * $item->price, 0, ',', '.') }}</span>
                            </li>
                        @endforeach
                    </ul>
                    <h5 class="fw-bold mb-2 text-primary">Cara Pembayaran</h5>
                    <div class="mb-3">
                        Silakan transfer total pembayaran ke rekening berikut:<br>
                        <ul>
                            <li><b>BCA</b> 1234567890 a.n. Ivan Gallery</li>
                            <li><b>Mandiri</b> 9876543210 a.n. Ivan Gallery</li>
                        </ul>
                        Setelah transfer, konfirmasi ke WhatsApp <b>0812-3456-7890</b> dengan menyertakan bukti pembayaran dan ID Order Anda.<br>
                        <span class="text-danger">*Order akan diproses setelah pembayaran diterima.</span>
                    </div>
                    <a href="{{ route('orders.index') }}" class="btn btn-outline-primary">Lihat Semua Riwayat Order</a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection 