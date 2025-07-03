<header class="header-modern py-3 mb-3 animate__animated animate__fadeInDown">
    <div class="container d-flex align-items-center justify-content-between flex-wrap">
        <div class="d-flex align-items-center gap-3">
            <div class="header-logo-glass d-flex align-items-center justify-content-center me-2">
                <svg width="44" height="44" viewBox="0 0 64 64" fill="none">
                    <defs>
                        <linearGradient id="furn-gradient" x1="0" y1="0" x2="64" y2="64" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#00c6ff"/>
                            <stop offset="0.5" stop-color="#8f5cff"/>
                            <stop offset="1" stop-color="#7ec8e3"/>
                        </linearGradient>
                    </defs>
                    <!-- Sofa base -->
                    <rect x="8" y="28" width="48" height="16" rx="6" fill="url(#furn-gradient)" />
                    <!-- Sofa back -->
                    <rect x="14" y="16" width="36" height="16" rx="6" fill="#fff" fill-opacity="0.7"/>
                    <!-- Left arm -->
                    <rect x="4" y="32" width="8" height="12" rx="3" fill="url(#furn-gradient)" />
                    <!-- Right arm -->
                    <rect x="52" y="32" width="8" height="12" rx="3" fill="url(#furn-gradient)" />
                    <!-- Legs -->
                    <rect x="14" y="44" width="4" height="8" rx="2" fill="#a1c4fd"/>
                    <rect x="46" y="44" width="4" height="8" rx="2" fill="#a1c4fd"/>
                </svg>
            </div>
            <span class="ivan-gradient-text fw-bold">Ivan Gallery</span>
        </div>
    </div>
    <style>
        .header-modern {
            background: rgba(255,255,255,0.15);
            border-bottom: 4px solid #7ec8e3;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.10);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }
        .header-logo-glass {
            width: 56px;
            height: 56px;
            border-radius: 16px;
            background: linear-gradient(135deg, #00c6ff 0%, #0072ff 50%, #8f5cff 100%);
            box-shadow: 0 2px 16px #a1c4fd55;
        }
        .ivan-gradient-text {
            font-size: 2.5rem;
            background: linear-gradient(90deg, #ff7e5f, #feb47b 20%, #00c6ff 50%, #8f5cff 80%, #7ec8e3 100%);
            background-size: 200% 200%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: gradientMove 4s ease-in-out infinite;
            text-shadow: 0 2px 16px #a1c4fd33;
            letter-spacing: 2px;
        }
        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        @media (max-width: 600px) {
            .ivan-gradient-text { font-size: 1.5rem; }
            .header-logo-glass { width: 40px; height: 40px; }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</header> 