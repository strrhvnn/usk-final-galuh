<x-app-layout>
    <div class="max-w-xl mx-auto shadow-md rounded-lg overflow-hidden">
        <div class="p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-6">Form Pesanan Tiket</h2>

            <form method="POST" action="{{ route('order') }}" id="orderForm">
                @csrf

                <!-- Nama -->
                <div>
                    <x-input-label for="nama" :value="__('Nama')" />
                    <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" :value="old('nama')" required autofocus />
                </div>

                <!-- Nomor Telepon -->
                <div class="mt-4">
                    <x-input-label for="no_telp" :value="__('Nomor Telepon')" />
                    <x-text-input id="no_telp" class="block mt-1 w-full" type="tel" name="no_telp" :value="old('no_telp')" required />
                </div>

                <!-- Email -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                </div>

                <!-- Jumlah Kursi -->
                <div class="mt-4">
                    <x-input-label for="jumlah_kursi" :value="__('Jumlah Kursi')" />
                    <x-text-input id="jumlah_kursi" class="block mt-1 w-full" type="number" name="jumlah_kursi" :value="old('jumlah_kursi')" required oninput="calculateTotal()" />
                </div>

                <!-- Total Harga -->
                <div class="mt-4">
                    <x-input-label for="total_harga" :value="__('Total Harga')" />
                    <x-text-input id="total_harga" class="block mt-1 w-full" type="number" name="total_harga" :value="old('total_harga')" required readonly />
                </div>

                <!-- Tiket ID -->
                <input type="hidden" name="id_tiket" value="{{ $tikets->id }}" />
                <input type="hidden" name="id_user" value="{{ $users->id }}" />

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button type="button" onclick="document.getElementById('orderForm').submit()">
                        {{ __('Buat Pesanan Tiket') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

<script>
    function calculateTotal() {
        // Ambil nilai jumlah kursi dan harga dari input form
        let jumlahKursi = parseInt(document.getElementById('jumlah_kursi').value);
        let harga = parseInt({{ $tikets->price }}); // Ambil harga dari PHP dan konversi ke integer

        // Hitung total harga
        let totalHarga = jumlahKursi * harga;

        // Set nilai total harga ke input form
        document.getElementById('total_harga').value = totalHarga;
    }
</script>
