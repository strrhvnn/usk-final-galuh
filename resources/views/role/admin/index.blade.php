<x-app-layout>
    <div class="bg-white text-gray-900">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-gray-100 overflow-hidden shadow-xl sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-sky-200">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Nama</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Email</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Role</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-300">
                            @foreach($users as $user)
                            <tr>
                                <td class="px-4 py-2 whitespace-nowrap text-gray-600">{{ $user->name }}</td>
                                <td class="px-4 py-2 whitespace-nowrap text-gray-600">{{ $user->email }}</td>
                                <td class="px-4 py-2 whitespace-nowrap text-gray-600">{{ $user->role }}</td>
                                <td class="px-4 py-2 whitespace-nowrap text-gray-600">
                                    <form method="POST" action="{{ route('update-role', $user->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="inline-flex items-center px-2 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                            Verifikasi
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
    </div>
</x-app-layout>
