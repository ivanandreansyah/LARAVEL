<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())
            ->with('product')
            ->get();
        
        $total = $cartItems->sum(function($item) {
            return $item->quantity * $item->price;
        });

        return view('cart.index', compact('cartItems', 'total'));
    }

    public function add(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        // Check if product already in cart
        $existingCart = Cart::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->first();

        if ($existingCart) {
            $existingCart->update([
                'quantity' => $existingCart->quantity + $request->quantity
            ]);
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $product->id,
                'quantity' => $request->quantity,
                'price' => $product->price
            ]);
        }

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    public function update(Request $request, Cart $cart)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        if ($cart->user_id !== Auth::id()) {
            abort(403);
        }

        $cart->update(['quantity' => $request->quantity]);

        return redirect()->route('cart.index')->with('success', 'Jumlah produk berhasil diupdate!');
    }

    public function remove(Cart $cart)
    {
        if ($cart->user_id !== Auth::id()) {
            abort(403);
        }

        $cart->delete();

        return redirect()->route('cart.index')->with('success', 'Produk berhasil dihapus dari keranjang!');
    }

    public function clear()
    {
        Cart::where('user_id', Auth::id())->delete();

        return redirect()->route('cart.index')->with('success', 'Keranjang berhasil dikosongkan!');
    }

    public static function getCartCount()
    {
        return Cart::where('user_id', Auth::id())->sum('quantity');
    }

    public function checkout()
    {
        $user = Auth::user();
        $cartItems = \App\Models\Cart::where('user_id', $user->id)->with('product')->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang belanja kosong!');
        }

        // Buat order
        $order = \App\Models\Order::create([
            'user_id' => $user->id,
            'total' => $cartItems->sum(fn($item) => $item->quantity * $item->price),
        ]);

        // Simpan detail order
        foreach ($cartItems as $item) {
            \App\Models\OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->price,
            ]);
            // Kurangi stok produk
            $item->product->decrement('stock', $item->quantity);
        }

        // Kosongkan keranjang
        \App\Models\Cart::where('user_id', $user->id)->delete();

        return redirect()->route('orders.latest')->with('success', 'Pembelian berhasil! Silakan lakukan pembayaran.');
    }
}
