<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Users</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="antialiased bg-[#0E0D1C] text-gray-100 font-sans">
    <div class="max-w-7xl mx-auto p-4 md:p-6">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold">Users</h1>
                <p class="text-gray-400 text-sm">Search, filter, and manage users</p>
            </div>
            <a href="/dashboard/admin" class="text-sm text-blue-400 hover:text-blue-300">Back to Dashboard</a>
        </div>

        <form method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-3 mb-4">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search name, email, company" class="bg-[#15132B] border border-gray-700 rounded-lg py-2 px-3 text-sm placeholder-gray-500 focus:outline-none">
            <select name="role" class="bg-[#15132B] border border-gray-700 rounded-lg py-2 px-3 text-sm">
                <option value="">All roles</option>
                @foreach(['admin','loap','advertiser','regulator','service_provider'] as $role)
                    <option value="{{ $role }}" @selected(request('role')===$role)>{{ ucfirst(str_replace('_',' ',$role)) }}</option>
                @endforeach
            </select>
            <button class="bg-orange hover:bg-orange/90 text-white rounded-lg text-sm px-4">Filter</button>
        </form>

        @if(session('status'))
            <div class="mb-4 text-green-400 text-sm">{{ session('status') }}</div>
        @endif
        @if($errors->any())
            <div class="mb-4 text-red-400 text-sm">{{ $errors->first() }}</div>
        @endif

        <div class="overflow-x-auto bg-[#15132B] border border-gray-700 rounded-lg">
            <table class="min-w-full text-left text-sm">
                <thead>
                    <tr class="text-gray-400">
                        <th class="py-2 px-4 font-medium">Avatar</th>
                        <th class="py-2 px-4 font-medium">Name</th>
                        <th class="py-2 px-4 font-medium">Email</th>
                        <th class="py-2 px-4 font-medium">Role</th>
                        <th class="py-2 px-4 font-medium">Company</th>
                        <th class="py-2 px-4 font-medium">Status</th>
                        <th class="py-2 px-4 font-medium">ID Card</th>
                        <th class="py-2 px-4 font-medium text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-800">
                    @forelse($users as $u)
                    <tr>
                        <td class="py-3 px-4">
                            @if($u->avatar_path)
                            <img src="{{ asset('storage/'.$u->avatar_path) }}" class="w-8 h-8 rounded-full object-cover" alt="Avatar" />
                            @else
                            <div class="w-8 h-8 rounded-full bg-gray-700"></div>
                            @endif
                        </td>
                        <td class="py-3 px-4">{{ $u->name }}</td>
                        <td class="py-3 px-4">{{ $u->email }}</td>
                        <td class="py-3 px-4">{{ ucfirst(str_replace('_',' ',$u->role)) }}</td>
                        <td class="py-3 px-4">{{ $u->company ?? '—' }}</td>
                        <td class="py-3 px-4">
                            <span class="px-2 py-1 rounded-full text-xs {{ $u->is_verified ? 'bg-green-500/20 text-green-300' : 'bg-yellow-500/20 text-yellow-300' }}">{{ $u->is_verified ? 'Verified' : 'Unverified' }}</span>
                        </td>
                        <td class="py-3 px-4">
                            @if($u->id_card_path)
                                <a href="{{ asset('storage/'.$u->id_card_path) }}" target="_blank" class="text-blue-400 hover:text-blue-300 text-xs">View</a>
                            @else
                                <span class="text-gray-500 text-xs">—</span>
                            @endif
                        </td>
                        <td class="py-3 px-4 text-right">
                            <a href="{{ route('dashboard.admin.users.show', $u) }}" class="text-blue-400 hover:text-blue-300 text-sm mr-3">View</a>
                            <a href="{{ route('dashboard.admin.users.edit', $u) }}" class="text-blue-400 hover:text-blue-300 text-sm mr-3">Edit</a>
                            @if(!$u->is_verified)
                            <form action="{{ route('dashboard.admin.users.verify', $u) }}" method="POST" class="inline-block mr-2">
                                @csrf
                                <button class="text-green-400 hover:text-green-300 text-sm">Verify</button>
                            </form>
                            @else
                            <form action="{{ route('dashboard.admin.users.unverify', $u) }}" method="POST" class="inline-block mr-2">
                                @csrf
                                <button class="text-yellow-400 hover:text-yellow-300 text-sm">Unverify</button>
                            </form>
                            @endif
                            <form action="{{ route('dashboard.admin.users.destroy', $u) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this user?')">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-400 hover:text-red-300 text-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="py-3 px-4 text-gray-400" colspan="6">No users found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">{{ $users->links() }}</div>
    </div>
</body>
</html>

