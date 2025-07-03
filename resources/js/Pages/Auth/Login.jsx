import { Head, Link, useForm } from '@inertiajs/react';

export default function Login({ status, canResetPassword }) {
    const { data, setData, post, processing, errors, reset } = useForm({
        email: '',
        password: '',
        remember: false,
    });

    const submit = (e) => {
        e.preventDefault();
        post(route('login'), { onFinish: () => reset('password') });
    };

    return (
        <div className="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-400 via-purple-400 to-pink-400">
            <Head title="Login" />
            <div className="bg-white rounded-2xl shadow-2xl p-8 w-full max-w-md animate-fade-in">
                <div className="text-center mb-6">
                    <div className="text-4xl text-indigo-600 mb-2">
                        <i className="bi bi-person-circle"></i>
                    </div>
                    <h2 className="text-2xl font-bold">Login Pengguna</h2>
                </div>
                {status && (
                    <div className="mb-4 text-sm font-medium text-green-600">{status}</div>
                )}
                <form onSubmit={submit}>
                    <div className="mb-4">
                        <input
                            type="email"
                            name="email"
                            value={data.email}
                            onChange={e => setData('email', e.target.value)}
                            className="form-control block w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            placeholder="Email"
                            required
                        />
                        {errors.email && <div className="text-danger mt-1">{errors.email}</div>}
                    </div>
                    <div className="mb-4">
                        <input
                            type="password"
                            name="password"
                            value={data.password}
                            onChange={e => setData('password', e.target.value)}
                            className="form-control block w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            placeholder="Password"
                            required
                        />
                        {errors.password && <div className="text-danger mt-1">{errors.password}</div>}
                    </div>
                    <div className="flex items-center justify-between mb-4">
                        <label className="flex items-center">
                            <input
                                type="checkbox"
                                name="remember"
                                checked={data.remember}
                                onChange={e => setData('remember', e.target.checked)}
                                className="form-checkbox"
                            />
                            <span className="ml-2 text-sm text-gray-600">Remember me</span>
                        </label>
                        {canResetPassword && (
                            <Link href={route('password.request')} className="text-sm text-indigo-600 hover:underline">
                                Forgot password?
                            </Link>
                        )}
                    </div>
                    <button
                        type="submit"
                        className="w-full py-2 px-4 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition font-semibold shadow animate-bounce"
                        disabled={processing}
                    >
                        Log in
                    </button>
                </form>
                <div className="mt-4 text-center">
                    <Link href={route('register')} className="text-indigo-600 hover:underline">
                        Belum punya akun? Daftar di sini
                    </Link>
                </div>
            </div>
            <style>{`
                @keyframes fadeIn {
                    from { opacity: 0; transform: translateY(40px);}
                    to { opacity: 1; transform: translateY(0);}
                }
                .animate-fade-in {
                    animation: fadeIn 1s;
                }
            `}</style>
        </div>
    );
}
