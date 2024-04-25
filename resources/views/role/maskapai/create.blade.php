<x-app-layout>
    <div class="max-w-xl mx-auto shadow-md rounded-lg overflow-hidden mt-4">
        <div class="p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-6">Formulir Tiket Jadwal Penerbangan</h2>

            <form method="POST" action="{{ route('tiket.store') }}">
                @csrf

                <!-- No Penerbangan -->
                <div>
                    <x-input-label for="no_penerbangan" :value="__('Nomor Penerbangan')" />
                    <x-text-input id="no_penerbangan" class="block mt-1 w-full" type="text" name="no_penerbangan" :value="old('no_penerbangan')" required autofocus />
                </div>

                <!-- Nama Maskapai -->
                <div class="mt-4">
                    <x-input-label for="nama_maskapai" :value="__('Nama Maskapai')" />
                    <x-text-input id="nama_maskapai" class="block mt-1 w-full" type="text" name="nama_maskapai" :value="old('nama_maskapai')" required />
                </div>

                <!-- Dari Bandara -->
                <div class="mt-4">
                    <x-input-label for="dari_bandara" :value="__('Dari Bandara')" />
                    <x-text-input id="dari_bandara" class="block mt-1 w-full" type="text" name="dari_bandara" :value="old('dari_bandara')" required />
                </div>

                <!-- Tujuan Bandara -->
                <div class="mt-4">
                    <x-input-label for="tujuan_bandara" :value="__('Tujuan Bandara')" />
                    <x-text-input id="tujuan_bandara" class="block mt-1 w-full" type="text" name="tujuan_bandara" :value="old('tujuan_bandara')" required />
                </div>

                <!-- Tanggal Keberangkatan -->
                <div class="mt-4">
                    <x-input-label for="tanggal_keberangkatan" :value="__('Tanggal Keberangkatan')" />
                    <x-text-input id="tanggal_keberangkatan" class="block mt-1 w-full" type="date" name="tanggal_keberangkatan" :value="old('tanggal_keberangkatan')" required />
                </div>

                <!-- Jam Pergi -->
                <div class="mt-4">
                    <x-input-label for="jam_pergi" :value="__('Jam Pergi')" />
                    <x-text-input id="jam_pergi" class="block mt-1 w-full" type="time" name="jam_pergi" :value="old('jam_pergi')" required />
                </div>

                <!-- Jam Sampai -->
                <div class="mt-4">
                    <x-input-label for="jam_sampai" :value="__('Jam Sampai')" />
                    <x-text-input id="jam_sampai" class="block mt-1 w-full" type="time" name="jam_sampai" :value="old('jam_sampai')" required />
                </div>

                <!-- Jumlah Kursi -->
                <div class="mt-4">
                    <x-input-label for="jumlah_kursi" :value="__('Jumlah Kursi')" />
                    <x-text-input id="jumlah_kursi" class="block mt-1 w-full" type="number" name="jumlah_kursi" :value="old('jumlah_kursi')" required />
                </div>

                <!-- Harga -->
                <div class="mt-4">
                    <x-input-label for="price" :value="__('Harga')" />
                    <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price')" required />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button>
                        {{ __('Buat Tiket') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
