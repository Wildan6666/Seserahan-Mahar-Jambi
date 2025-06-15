@extends('layouts.admin')

@section('content')
<div class="container mx-auto py-6">
    <h2 class="text-2xl font-bold mb-6">Manajemen Pengguna</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif
    

    <div class="overflow-x-auto bg-white shadow rounded-lg">
    <table class="min-w-full divide-y divide-gray-200 text-sm">
        <thead class="bg-gray-100 text-gray-700">
            <tr>
                <th class="px-4 py-3 text-left font-semibold">ID</th>
                <th class="px-4 py-3 text-left font-semibold">Nama</th>
                <th class="px-4 py-3 text-left font-semibold">Email</th>
                <th class="px-4 py-3 text-left font-semibold">Role</th>
                <th class="px-4 py-3 text-left font-semibold">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @foreach($users as $user)
            <tr class="hover:bg-gray-50 transition">
                <td class="px-4 py-3 text-gray-700">{{ $user->id }}</td>
                <td class="px-4 py-3 text-gray-800">{{ $user->name }}</td>
                <td class="px-4 py-3 text-gray-700">{{ $user->email }}</td>
                <td class="px-4 py-3 capitalize text-gray-600">{{ $user->role }}</td>
                <td class="px-4 py-3 whitespace-nowrap">
                    <div class="flex items-center gap-2">
                        <button onclick='openEditModal(@json($user))'
                                class="inline-flex items-center gap-1 px-3 py-1 bg-blue-100 text-blue-700 rounded-full hover:bg-blue-200 transition text-xs font-medium">
                             Edit
                        </button>

                        <form method="POST" action="{{ route('admin.usermanajemen.destroy', $user) }}"
                              onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="inline-flex items-center gap-1 px-3 py-1 bg-red-100 text-red-700 rounded-full hover:bg-red-200 transition text-xs font-medium">
                                 Hapus
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


    <div class="mt-4">
        {{ $users->links() }}
    </div>
</div>

<!-- Modal Edit -->
<div id="editModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 hidden justify-center items-center z-50">
    <div class="bg-white p-6 rounded shadow-md w-full max-w-md">
        <h3 class="text-lg font-semibold mb-4">Edit Pengguna</h3>
        <form id="editForm" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700">Nama</label>
                <input type="text" name="name" id="editName" class="w-full border rounded px-3 py-2">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Email</label>
                <input type="email" name="email" id="editEmail" class="w-full border rounded px-3 py-2">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Role</label>
                <select name="role" id="editRole" class="w-full border rounded px-3 py-2">
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>
            <div class="flex justify-end">
                <button type="button" onclick="closeEditModal()" class="mr-2 px-4 py-2 bg-gray-300 rounded">Batal</button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openEditModal(user) {
        document.getElementById('editName').value = user.name;
        document.getElementById('editEmail').value = user.email;
        document.getElementById('editRole').value = user.role;
        document.getElementById('editForm').action = `/admin/usermanajemen/${user.id}`;
        document.getElementById('editModal').classList.remove('hidden');
        document.getElementById('editModal').classList.add('flex');
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
        document.getElementById('editModal').classList.remove('flex');
    }
</script>
@endsection
