<x-app-layout>
    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-200 overflow-hidden shadow-xl sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead class="bg-sky-200">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">ID Tiket</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">Name</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">No Telp</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">Email</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">Seat</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">Total Price</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">Status</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-100 divide-y divide-gray-300">
                        @foreach($pendingOrders as $order)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-900">{{ $order->id_tiket }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-900">{{ $order->nama }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-900">{{ $order->no_telp }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-900">{{ $order->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-900">{{ $order->jumlah_kursi }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-900">{{ $order->total_harga }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-900">{{ $order->status }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-600">
                                <form action="{{ route('orders.markAsSuccess', $order->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                        Success
                                    </button>
                                </form>


                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
