@extends('layouts.main')

@section('title', 'Riwayat Order')

@section('content')
<style>
    .order-history-card {
        background: linear-gradient(120deg, #e3f0ff 0%, #f3e7fe 100%);
        border-radius: 1.5rem;
        box-shadow: 0 4px 24px rgba(80, 80, 200, 0.10);
        padding: 2.5rem 2rem 2rem 2rem;
        margin-bottom: 2rem;
        animation: fadeInOrder 1s cubic-bezier(.68,-0.55,.27,1.55) 0.1s both;
    }
    @keyframes fadeInOrder {
        from { opacity: 0; transform: translateY(40px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .order-table {
        background: #fff;
        border-radius: 1rem;
        box-shadow: 0 2px 8px rgba(80, 80, 200, 0.06);
        overflow: hidden;
        animation: fadeInOrder 1.2s 0.2s both;
    }
    .order-table th {
        background: #1976f3;
        color: #fff;
        font-weight: 600;
        font-size: 1.08rem;
        border: none;
    }
    .order-table td {
        font-size: 1.05rem;
        border: none;
    }
    .order-id {
        font-weight: 700;
        color: #1976f3;
    }
    .order-total {
        font-weight: 700;
        color: #00bcd4;
    }
    .order-detail-list {
        padding-left: 1.2rem;
        margin-bottom: 0;
    }
    .order-detail-list li {
        margin-bottom: 0.2rem;
        color: #555;
    }
    .order-empty {
        background: #fff3cd;
        color: #856404;
        border-radius: 1rem;
        padding: 1.2rem;
        font-size: 1.1rem;
        margin-bottom: 1.5rem;
        animation: fadeInOrder 1s 0.2s both;
    }
    .order-btn {
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
    .order-btn:hover {
        background: #00bcd4;
        color: #fff;
        transform: scale(1.04);
        box-shadow: 0 8px 32px rgba(80, 80, 200, 0.18);
    }
</style>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="order-history-card">
                <h2 class="fw-bold mb-4" style="color:#1976f3;">Riwayat Order Anda</h2>
                @if($orders->isEmpty())
                    <div class="order-empty">Belum ada order.</div>
                @else
                    <div class="table-responsive">
                        <table class="table order-table align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>ID Order</th>
                                    <th>Tanggal</th>
                                    <th>Total</th>
                                    <th>Detail Barang</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                    <tr style="animation: fadeInOrder 0.7s {{ (0.1 + $loop->index * 0.08) . 's' }} both;">
                                        <td class="order-id">#{{ $order->id }}</td>
                                        <td>{{ $order->created_at->format('d M Y H:i') }}</td>
                                        <td class="order-total">Rp{{ number_format($order->total, 0, ',', '.') }}</td>
                                        <td>
                                            <ul class="order-detail-list">
                                                @foreach($order->orderItems as $item)
                                                    <li>{{ $item->product->name }} <span class="text-muted">x{{ $item->quantity }}</span></li>
                                                @endforeach
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
                <a href="{{ route('products.index') }}" class="order-btn mt-4 d-inline-block">Belanja Lagi</a>
            </div>
        </div>
    </div>
</div>
@endsection 