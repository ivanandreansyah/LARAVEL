@extends('layouts.main')

@section('title', 'Tentang Kami')

@section('content')
<style>
    .about-animate {
        opacity: 0;
        transform: translateY(40px);
        animation: aboutFadeIn 1s cubic-bezier(.68,-0.55,.27,1.55) 0.1s forwards;
    }
    @keyframes aboutFadeIn {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .about-card {
        background: linear-gradient(120deg, #e3f0ff 0%, #f3e7fe 100%);
        border-radius: 2rem;
        box-shadow: 0 8px 32px rgba(80, 80, 200, 0.10), 0 1.5px 6px rgba(0,0,0,0.08);
        transition: box-shadow 0.3s, transform 0.3s;
        background: #fff;
        padding: 2.5rem 2rem 2rem 2rem;
        margin-bottom: 2rem;
        animation: aboutFadeIn 1s cubic-bezier(.68,-0.55,.27,1.55) 0.1s both;
    }
    .about-card:hover {
        box-shadow: 0 16px 48px rgba(80, 80, 200, 0.18), 0 3px 12px rgba(0,0,0,0.10);
        transform: scale(1.01);
    }
    .about-icon {
        font-size: 3.5rem;
        color: #1976f3;
        margin-bottom: 0.5rem;
        animation: aboutIconBounce 1.2s infinite alternate;
    }
    @keyframes aboutIconBounce {
        from { transform: translateY(0);}
        to { transform: translateY(-10px);}
    }
    .about-img {
        max-width: 100%;
        border-radius: 1.2rem;
        box-shadow: 0 4px 24px rgba(80, 80, 200, 0.10);
        margin-bottom: 1rem;
        animation: aboutFadeIn 1.2s 0.3s both;
        opacity: 0;
        transform: translateY(40px);
    }
    .about-title {
        font-size: 2.2rem;
        font-weight: 700;
        color: #1976f3;
        margin-bottom: 1rem;
    }
    .about-highlight {
        color: #00bcd4;
        font-weight: 700;
    }
    .about-section {
        margin-bottom: 1.5rem;
    }
    @media (max-width: 767px) {
        .about-flex {
            flex-direction: column !important;
        }
        .about-img {
            margin-bottom: 2rem;
        }
    }
</style>
<div class="container py-5" style="background: #f6f7fb; min-height: 70vh;">
    <div class="row justify-content-center">
        <div class="col-12 col-xl-10 mx-auto">
            <div class="about-card about-animate">
                <div class="d-flex about-flex align-items-center gap-4">
                    <!-- Gambar soffa -->
                    <div class="flex-shrink-0" style="width: 320px; max-width: 100%;">
                        <img src="https://images.unsplash.com/photo-1519710164239-da123dc03ef4?auto=format&fit=crop&w=600&q=80" alt="Soffa Mebel" class="about-img">
                    </div>
                    <!-- Konten utama -->
                    <div class="flex-grow-1">
                        <div class="about-icon mb-2 text-center text-lg-start">
                            <i class="bi bi-info-circle-fill"></i>
                        </div>
                        <div class="about-title">Tentang <span class="about-highlight">Ivan Gallery</span></div>
                        <div class="about-section mb-3">
                            <span class="fw-semibold text-primary">Toko Mebel Modern</span> adalah toko online yang menyediakan berbagai produk mebel berkualitas dengan harga terbaik.<br>
                            Kami berkomitmen memberikan pelayanan terbaik untuk kebutuhan furniture rumah Anda.
                        </div>
                        <ul class="list-unstyled text-start mb-4" style="max-width: 350px;">
                            <li class="mb-2"><i class="bi bi-geo-alt-fill text-primary me-2"></i>Alamat: Jl. Contoh No. 123, Kota Mebel</li>
                            <li class="mb-2"><i class="bi bi-envelope-fill text-primary me-2"></i>Email: info@mebel.com</li>
                            <li><i class="bi bi-telephone-fill text-primary me-2"></i>Telepon: 0812-3456-7890</li>
                        </ul>
                        <hr>
                        <div class="about-section mt-4">
                            <h5 class="fw-bold mb-2 text-primary"><i class="bi bi-clock-history me-2"></i>Sejarah Toko</h5>
                            <p class="mb-0" style="text-align: justify;">
                                Berdiri sejak tahun <b>2010</b>, Ivan Gallery berawal dari usaha keluarga kecil di Kota Mebel. Dengan semangat inovasi dan pelayanan, kami berkembang menjadi salah satu toko mebel online terpercaya di Indonesia. Kami selalu berusaha menghadirkan produk-produk terbaru, desain kekinian, dan kualitas terbaik untuk pelanggan setia kami.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 