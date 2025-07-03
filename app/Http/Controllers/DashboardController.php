<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $orders = Order::with('orderItems.product')
            ->where('user_id', $userId)
            ->latest()
            ->take(10)
            ->get();

        // Ambil data order per bulan (6 bulan terakhir)
        $sales = Order::selectRaw('DATE_FORMAT(created_at, "%b %Y") as month, COUNT(*) as total')
            ->where('user_id', $userId)
            ->where('created_at', '>=', now()->subMonths(6)->startOfMonth())
            ->groupBy('month')
            ->orderByRaw('MIN(created_at)')
            ->get();
        $salesLabels = $sales->pluck('month');
        $salesData = $sales->pluck('total');

        return view('dashboard', compact('orders', 'salesLabels', 'salesData'));
    }
}
