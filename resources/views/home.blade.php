@extends('layouts.main')

@section('title', 'Beranda')

@section('content')
<style>
    .hero-bg {
        background: linear-gradient(120deg, #2b5876 0%, #4e8fd3 100%);
        color: #fff;
        border-radius: 1.5rem;
        position: relative;
        overflow: hidden;
        min-height: 480px;
    }
    .hero-title {
        font-size: 3rem;
        font-weight: 700;
        background: linear-gradient(90deg, #ff7e5f, #7ec8e3 70%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    .hero-desc {
        font-size: 1.2rem;
        margin-bottom: 2rem;
    }
    .hero-btn {
        font-weight: 600;
        border-radius: 2rem;
        padding: 0.7rem 2rem;
        margin-right: 1rem;
        transition: 0.2s;
    }
    .hero-btn:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 16px rgba(80, 80, 200, 0.12);
    }
    .hero-stats {
        margin: 2.5rem 0 1.5rem 0;
        font-size: 2.2rem;
        font-weight: 600;
        color: #e3e8ee;
        display: flex;
        gap: 3rem;
        justify-content: flex-start;
    }
    .hero-stats-label {
        font-size: 1rem;
        color: #b6c6e3;
        font-weight: 400;
        margin-top: -0.5rem;
        letter-spacing: 1px;
    }
    .hero-img {
        max-width: 420px;
        border-radius: 1.2rem;
        box-shadow: 0 8px 32px rgba(80, 80, 200, 0.18);
        background: #fff;
        margin-top: 1.5rem;
        margin-bottom: 1rem;
        animation: fadeInSoffa 1.2s 0.3s both;
    }
    @keyframes fadeInSoffa {
        from { opacity: 0; transform: translateY(40px);}
        to { opacity: 1; transform: translateY(0);}
    }
    .hero-circle {
        position: absolute;
        right: 5%;
        top: 60%;
        width: 160px;
        height: 160px;
        background: rgba(255,255,255,0.13);
        border-radius: 50%;
        z-index: 0;
    }
    @media (max-width: 991px) {
        .hero-title { font-size: 2.2rem; }
        .hero-stats { font-size: 1.3rem; gap: 1.5rem;}
        .hero-img { max-width: 100%; }
    }
    @media (max-width: 767px) {
        .hero-bg { padding: 2rem 1rem; }
        .hero-title { font-size: 1.5rem; }
        .hero-stats { flex-direction: column; gap: 0.5rem;}
        .hero-img { margin: 1.5rem auto 0 auto; display: block;}
    }
</style>
<div class="hero-bg p-5 mb-4">
    <div class="row align-items-center">
        <div class="col-lg-7 position-relative" style="z-index:2;">
            <div class="hero-title mb-2">Ivan <span style="font-weight:400;">Gallery</span></div>
            <div class="hero-desc mb-4">
                Temukan furniture berkualitas untuk menciptakan ruangan impian<br>
                Anda dengan koleksi eksklusif kami
            </div>
            <div class="mb-4 d-flex flex-wrap gap-2">
                <a href="{{ route('products.index') }}" class="btn btn-light hero-btn shadow-sm">Lihat Produk</a>
                <a href="{{ route('about') }}" class="btn btn-outline-light hero-btn">Tentang Kami</a>
            </div>
            <div class="hero-stats">
                <div>
                    1000+<div class="hero-stats-label">PELANGGAN PUAS</div>
                </div>
                <div>
                    500+<div class="hero-stats-label">PRODUK TERSEDIA</div>
                </div>
                <div>
                    5.0<div class="hero-stats-label">RATING</div>
                </div>
            </div>
        </div>
        <div class="col-lg-5 d-flex justify-content-center align-items-center">
            <img src="https://images.unsplash.com/photo-1519710164239-da123dc03ef4?auto=format&fit=crop&w=600&q=80" alt="Soffa" class="hero-img">
        </div>
    </div>
    <div class="hero-circle"></div>
</div>
@endsection 