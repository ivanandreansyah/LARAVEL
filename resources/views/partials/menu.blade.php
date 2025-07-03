<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3 shadow-lg animated-navbar" style="backdrop-filter: blur(8px); background: rgba(30,34,44,0.92);">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse animate__animated animate__fadeIn" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link nav-anim" href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link nav-anim" href="{{ route('products.index') }}">Produk</a></li>
                <li class="nav-item"><a class="nav-link nav-anim" href="{{ route('about') }}">Tentang</a></li>
            </ul>
            <ul class="navbar-nav">
                @auth
                    <li class="nav-item">
                        <a class="nav-link position-relative nav-anim" href="{{ route('cart.index') }}">
                            <i class="bi bi-cart3 me-1 cart-icon"></i>Keranjang
                            @if($cartCount > 0)
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger animate__animated animate__pulse animate__infinite">
                                    {{ $cartCount > 99 ? '99+' : $cartCount }}
                                </span>
                            @endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-anim" href="{{ route('orders.index') }}">
                            <i class="bi bi-clock-history me-1 order-icon"></i>Riwayat Order
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
    <style>
        .gradient-text {
            background: linear-gradient(90deg, #00c6ff, #0072ff, #8f5cff, #fbc2eb, #a1c4fd);
            background-size: 200% 200%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: gradientMove 4s ease-in-out infinite;
            text-shadow: 0 2px 16px #a1c4fd55;
        }
        .mebel-logo {
            filter: drop-shadow(0 0 8px #a1c4fd88);
        }
        .nav-anim {
            position: relative;
            transition: color 0.3s;
            overflow: hidden;
        }
        .nav-anim::after {
            content: '';
            display: block;
            position: absolute;
            left: 0; bottom: 0;
            width: 0; height: 2px;
            background: linear-gradient(90deg, #00c6ff, #8f5cff, #fbc2eb);
            transition: width 0.4s cubic-bezier(.4,2,.6,1);
        }
        .nav-anim:hover, .nav-anim:focus {
            color: #00c6ff !important;
        }
        .nav-anim:hover::after, .nav-anim:focus::after {
            width: 100%;
        }
        .cart-icon, .order-icon {
            transition: transform 0.2s;
        }
        .cart-icon:hover, .order-icon:hover {
            transform: scale(1.2) rotate(-8deg);
            color: #8f5cff;
        }
        .animated-navbar {
            animation: fadeInDown 1s;
        }
        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-30px);}
            to { opacity: 1; transform: translateY(0);}
        }
        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
    </style>
    <!-- Optional: Animate.css CDN for more effects -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</nav> 