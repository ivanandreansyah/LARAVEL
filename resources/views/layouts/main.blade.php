<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Produk Mebel')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(120deg, #e3f0ff 0%, #f3e7fe 30%, #c2e9fb 60%, #a1c4fd 100%, #fbc2eb 120%);
            background-size: 400% 400%;
            animation: gradientMove 16s ease-in-out infinite;
            position: relative;
        }
        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .wave-bg {
            position: fixed;
            left: 0; right: 0; bottom: 0;
            width: 100vw;
            height: 220px;
            z-index: 0;
            pointer-events: none;
        }
        .wave-bg svg {
            width: 100%;
            height: 100%;
            display: block;
        }
        .wave1 {
            animation: waveMove1 12s linear infinite alternate;
            filter: blur(2px);
        }
        .wave2 {
            animation: waveMove2 18s linear infinite alternate-reverse;
            opacity: 0.7;
        }
        @keyframes waveMove1 {
            0% { transform: translateX(0); }
            100% { transform: translateX(-80px); }
        }
        @keyframes waveMove2 {
            0% { transform: translateX(0); }
            100% { transform: translateX(60px); }
        }
        .container, .dashboard-container, .produk-form-card, .order-history-card, .about-card, .cart-container, .profile-card {
            position: relative;
            z-index: 1;
        }
    </style>
</head>
<body>
    <div class="wave-bg">
        <svg class="wave1" viewBox="0 0 1440 320"><path fill="#a1c4fd" fill-opacity="0.5" d="M0,224L60,202.7C120,181,240,139,360,154.7C480,171,600,245,720,261.3C840,277,960,235,1080,197.3C1200,160,1320,128,1380,112L1440,96L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>
        <svg class="wave2" viewBox="0 0 1440 320"><path fill="#fbc2eb" fill-opacity="0.4" d="M0,288L60,272C120,256,240,224,360,197.3C480,171,600,149,720,154.7C840,160,960,192,1080,197.3C1200,203,1320,181,1380,170.7L1440,160L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>
    </div>
    @include('partials.header')
    @include('partials.menu')

    @auth
    <div class="container mt-2 mb-2 d-flex justify-content-end">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger btn-sm">Logout</button>
        </form>
    </div>
    @endauth

    <div class="container my-4">
        @yield('content')
    </div>

    @include('partials.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 