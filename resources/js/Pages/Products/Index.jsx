import React from 'react';
import { Link } from '@inertiajs/react';

export default function Products({ products }) {
    return (
        <div className="min-h-screen bg-gradient-to-br from-gray-100 to-indigo-100 py-10 px-4">
            <div className="max-w-7xl mx-auto">
                <h2 className="text-4xl font-bold text-center mb-10 animate-fade-in">Daftar Produk</h2>
                <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                    {products.map((product, idx) => (
                        <div key={product.id} className="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center transform transition duration-500 hover:scale-105 hover:shadow-2xl animate-slide-up" style={{ animationDelay: `${idx * 0.1}s` }}>
                            <img src={product.image || 'https://via.placeholder.com/300x200?text=Produk'} alt={product.name} className="w-full h-40 object-cover rounded-lg mb-4" />
                            <h3 className="text-xl font-semibold mb-2">{product.name}</h3>
                            <p className="text-gray-600 mb-2">{product.description}</p>
                            <p className="text-indigo-600 font-bold mb-4">Rp{product.price.toLocaleString('id-ID')}</p>
                            <Link href={route('products.show', product.id)} className="px-4 py-2 bg-indigo-600 text-white rounded-full shadow hover:bg-indigo-700 transition">Detail</Link>
                        </div>
                    ))}
                </div>
            </div>
            <style>{`
                @keyframes fadeIn {
                    from { opacity: 0; }
                    to { opacity: 1; }
                }
                .animate-fade-in {
                    animation: fadeIn 1s ease;
                }
                @keyframes slideUp {
                    from { transform: translateY(40px); opacity: 0; }
                    to { transform: translateY(0); opacity: 1; }
                }
                .animate-slide-up {
                    animation: slideUp 0.8s cubic-bezier(.68,-0.55,.27,1.55) both;
                }
            `}</style>
        </div>
    );
} 