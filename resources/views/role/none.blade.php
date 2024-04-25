<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Aduh Akun Kamu Belum Terverifikasi Sebagai Maskapai, Untuk Mengetahui Lebih Lanjut Agar Akunmu Bisa Segera Digunakan Hubungi Admin Secepatnya Untuk Meminta Verifikasi Akun.") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
