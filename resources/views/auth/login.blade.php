<x-guest-layout>
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
        }
        .login-card {
            animation: fadeIn 1.2s;
            box-shadow: 0 8px 32px rgba(80, 80, 200, 0.18), 0 1.5px 6px rgba(0,0,0,0.08);
            border-radius: 1.5rem;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .login-title {
            font-size: 2rem;
            font-weight: bold;
            color: #4f46e5;
            margin-bottom: 1rem;
            letter-spacing: 1px;
        }
        .login-icon {
            font-size: 3rem;
            color: #4f46e5;
            margin-bottom: 0.5rem;
        }
        .login-link {
            color: #4f46e5;
            text-decoration: underline;
        }
        .login-link:hover {
            color: #3730a3;
        }
    </style>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="login-card bg-white p-5" style="min-width:340px; max-width:400px; width:100%;">
            <div class="text-center">
                <span class="login-icon"><i class="bi bi-person-circle"></i></span>
                <div class="login-title">Login Pengguna</div>
            </div>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <!-- Email Address -->
                <div class="mb-3">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <!-- Password -->
                <div class="mb-3">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <!-- Remember Me -->
                <div class="form-check mb-3">
                    <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                    <label for="remember_me" class="form-check-label">{{ __('Remember me') }}</label>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    @if (Route::has('password.request'))
                        <a class="login-link" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                    <button type="submit" class="btn btn-primary px-4">{{ __('Log in') }}</button>
                </div>
            </form>
            <div class="mt-3 text-center">
                <a href="{{ route('register') }}" class="login-link">Belum punya akun? Daftar di sini</a>
            </div>
        </div>
    </div>
</x-guest-layout>
