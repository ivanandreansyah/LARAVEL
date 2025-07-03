@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
<style>
    .dashboard-container {
        display: flex;
        gap: 2rem;
        min-height: 70vh;
    }
    .dashboard-sidebar {
        background: linear-gradient(135deg, #1976f3 60%, #7ec8e3 100%);
        color: #fff;
        border-radius: 1.5rem;
        width: 230px;
        min-width: 180px;
        padding: 2rem 1rem 2rem 1rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        box-shadow: 0 4px 24px rgba(80, 80, 200, 0.10);
    }
    .dashboard-sidebar .logo {
        font-size: 2.2rem;
        font-weight: 700;
        letter-spacing: 1px;
        margin-bottom: 2rem;
        display: flex;
        align-items: center;
        gap: 0.7rem;
    }
    .dashboard-sidebar .logo-icon {
        background: #fff;
        color: #1976f3;
        border-radius: 10px;
        padding: 0.3rem 0.5rem;
        font-size: 1.7rem;
        margin-right: 0.3rem;
    }
    .dashboard-sidebar ul {
        list-style: none;
        padding: 0;
        width: 100%;
    }
    .dashboard-sidebar ul li {
        margin-bottom: 1.2rem;
    }
    .dashboard-sidebar ul li a {
        color: #fff;
        text-decoration: none;
        font-weight: 500;
        font-size: 1.08rem;
        display: flex;
        align-items: center;
        gap: 0.7rem;
        transition: 0.2s;
        border-radius: 8px;
        padding: 0.4rem 0.7rem;
    }
    .dashboard-sidebar ul li a.active, .dashboard-sidebar ul li a:hover {
        background: rgba(255,255,255,0.13);
        color: #fff;
    }
    .dashboard-main {
        flex: 1;
        padding: 1.5rem 0 1.5rem 0;
    }
    .dashboard-title {
        font-size: 2.1rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        color: #222;
    }
    .dashboard-cards {
        display: flex;
        gap: 1.2rem;
        margin-bottom: 2rem;
        flex-wrap: wrap;
    }
    .dashboard-card {
        flex: 1 1 180px;
        min-width: 180px;
        background: #fff;
        border-radius: 1.2rem;
        box-shadow: 0 4px 24px rgba(80, 80, 200, 0.10);
        padding: 1.2rem 1.5rem;
        color: #fff;
        font-weight: 600;
        font-size: 1.2rem;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        position: relative;
    }
    .dashboard-card.blue { background: #1976f3; }
    .dashboard-card.green { background: #2e7d32; }
    .dashboard-card.yellow { background: #ffb300; color: #222; }
    .dashboard-card.cyan { background: #00bcd4; }
    .dashboard-card .card-title {
        font-size: 1.1rem;
        font-weight: 500;
        margin-bottom: 0.5rem;
    }
    .dashboard-card .card-value {
        font-size: 2.1rem;
        font-weight: 700;
        margin-bottom: 0.2rem;
    }
    .dashboard-card .card-desc {
        font-size: 0.95rem;
        font-weight: 400;
        color: #e3e3e3;
    }
    .dashboard-card.yellow .card-desc { color: #555; }
    .dashboard-section {
        margin-bottom: 2rem;
    }
    .dashboard-section .section-title {
        font-size: 1.1rem;
        font-weight: 700;
        margin-bottom: 0.7rem;
        color: #fff;
        background: #e53935;
        padding: 0.5rem 1rem;
        border-radius: 0.7rem 0.7rem 0 0;
        display: inline-block;
    }
    .dashboard-section .section-title.blue {
        background: #1976f3;
        color: #fff;
    }
    .dashboard-table {
        background: #fff;
        border-radius: 0 0 1rem 1rem;
        box-shadow: 0 2px 8px rgba(80, 80, 200, 0.06);
        padding: 1rem;
        margin-bottom: 1rem;
    }
    .dashboard-table th, .dashboard-table td {
        padding: 0.5rem 0.7rem;
        font-size: 1rem;
    }
    .dashboard-activity {
        background: #fff;
        border-radius: 1rem;
        box-shadow: 0 2px 8px rgba(80, 80, 200, 0.06);
        padding: 1rem 1.2rem;
        max-height: 320px;
        overflow-y: auto;
    }
    .dashboard-activity .activity-item {
        border-left: 4px solid #1976f3;
        margin-bottom: 1.1rem;
        padding-left: 0.7rem;
    }
    .dashboard-activity .activity-item.red { border-color: #e53935; }
    .dashboard-activity .activity-item.green { border-color: #2e7d32; }
    .dashboard-activity .activity-title {
        font-weight: 600;
        font-size: 1.05rem;
    }
    .dashboard-activity .activity-date {
        font-size: 0.92rem;
        color: #888;
    }
    .dashboard-activity .activity-desc {
        font-size: 0.98rem;
        color: #444;
    }
    @media (max-width: 991px) {
        .dashboard-container { flex-direction: column; }
        .dashboard-sidebar { width: 100%; min-width: 0; flex-direction: row; justify-content: center; border-radius: 1rem; margin-bottom: 1.5rem; }
        .dashboard-sidebar ul { flex-direction: row; display: flex; gap: 1.5rem; }
        .dashboard-sidebar ul li { margin-bottom: 0; }
    }
</style>
<div class="dashboard-container">
    <div class="dashboard-sidebar">
        <div class="logo">
            <span class="logo-icon"><i class="bi bi-shop-window"></i></span>
            Ivan Gallery
        </div>
        <ul>
            <li><a href="#" class="active"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
            <li><a href="{{ route('profile.edit') }}"><i class="bi bi-person"></i> Profile User</a></li>
            <li><a href="{{ route('products.index') }}"><i class="bi bi-box-seam"></i> Produk</a></li>
            <li><a href="{{ route('orders.index') }}"><i class="bi bi-receipt"></i> Order</a></li>
            <li><a href="{{ route('profile.edit') }}"><i class="bi bi-gear"></i> Setting</a></li>
        </ul>
    </div>
    <div class="dashboard-main">
        <div class="dashboard-title">Dashboard Detail</div>
        {{-- <div class="dashboard-cards">
            <div class="dashboard-card blue">
                <div class="card-title">Barang Masuk Hari Ini</div>
                <div class="card-value">0</div>
                <div class="card-desc">Minggu ini: 0</div>
            </div>
            <div class="dashboard-card green">
                <div class="card-title">Barang Keluar Hari Ini</div>
                <div class="card-value">0</div>
                <div class="card-desc">Minggu ini: 0</div>
            </div>
            <div class="dashboard-card yellow">
                <div class="card-title">Stok Menipis</div>
                <div class="card-value">0</div>
                <div class="card-desc">Barang perlu restock</div>
            </div>
            <div class="dashboard-card cyan">
                <div class="card-title">Total Nilai Inventory</div>
                <div class="card-value">Rp 0</div>
                <div class="card-desc">Nilai seluruh stok</div>
            </div>
        </div> --}}
        <div class="row g-4">
            <div class="col-lg-7">
                <div class="dashboard-section">
                    <div class="section-title blue"><i class="bi bi-bar-chart-line me-1"></i> Diagram Penjualan</div>
                    <div class="bg-white rounded-3 p-3 shadow-sm">
                        <canvas id="salesChart" height="180"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="dashboard-section">
                    <div class="section-title blue"><i class="bi bi-arrow-repeat me-1"></i> Aktivitas Terbaru</div>
                    <div class="dashboard-activity">
                        @forelse($orders as $order)
                            <div class="activity-item green">
                                <div class="activity-title">
                                    <i class="bi bi-bag-check me-1"></i> Pembelian Order #{{ $order->id }}
                                </div>
                                <div class="activity-date">{{ $order->created_at->format('d M Y H:i') }}</div>
                                <div class="activity-desc">
                                    @foreach($order->orderItems as $item)
                                        {{ $item->product->name }} x{{ $item->quantity }}<br>
                                    @endforeach
                                    <span class="text-muted">Total: Rp{{ number_format($order->total, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        @empty
                            <div class="text-muted">Belum ada aktivitas pembelian.</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // Data dinamis dari backend
            const salesLabels = @json($salesLabels);
            const salesData = @json($salesData);
            const ctx = document.getElementById('salesChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: salesLabels,
                    datasets: [{
                        label: 'Penjualan',
                        data: salesData,
                        backgroundColor: 'rgba(25, 118, 243, 0.7)',
                        borderRadius: 8,
                        maxBarThickness: 40,
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { display: false },
                        title: { display: false }
                    },
                    scales: {
                        y: { beginAtZero: true }
                    }
                }
            });
        </script>
    </div>
</div>
@endsection
