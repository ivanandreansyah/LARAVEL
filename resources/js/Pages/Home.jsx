import React from 'react';

export default function Home() {
    return (
        <div className="min-h-screen flex flex-col items-center justify-center relative overflow-hidden">
            {/* Animated Gradient Background */}
            <div className="absolute inset-0 -z-10 animate-gradient bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500"></div>
            <div className="bg-white bg-opacity-80 rounded-xl shadow-lg p-10 text-center animate-fade-in">
                <h1 className="text-5xl font-bold mb-4 animate-slide-down">Selamat Datang di <span className="text-indigo-600">Toko Mebel Modern</span>!</h1>
                <p className="text-lg mb-8 animate-fade-in-delay">Temukan berbagai produk mebel berkualitas, desain kekinian, dan harga terbaik untuk rumah Anda.</p>
                <a href={route('products.index')} className="inline-block px-8 py-3 bg-indigo-600 text-white font-semibold rounded-full shadow-lg hover:bg-indigo-700 transition transform hover:scale-105 animate-bounce">
                    Lihat Produk
                </a>
            </div>
            {/* Custom CSS for animation */}
            <style>{`
                @keyframes gradient {
                    0% { background-position: 0% 50%; }
                    50% { background-position: 100% 50%; }
                    100% { background-position: 0% 50%; }
                }
                .animate-gradient {
                    background-size: 200% 200%;
                    animation: gradient 8s ease-in-out infinite;
                }
                @keyframes fadeIn {
                    from { opacity: 0; }
                    to { opacity: 1; }
                }
                .animate-fade-in {
                    animation: fadeIn 1.2s ease;
                }
                @keyframes fadeInDelay {
                    from { opacity: 0; }
                    to { opacity: 1; }
                }
                .animate-fade-in-delay {
                    animation: fadeInDelay 2s 0.5s both;
                }
                @keyframes slideDown {
                    from { transform: translateY(-40px); opacity: 0; }
                    to { transform: translateY(0); opacity: 1; }
                }
                .animate-slide-down {
                    animation: slideDown 1s cubic-bezier(.68,-0.55,.27,1.55);
                }
            `}</style>
        </div>
    );
} 