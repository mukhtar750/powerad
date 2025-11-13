<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="antialiased bg-[#0E0D1C] text-gray-100 font-sans">
    <div class="max-w-3xl mx-auto p-4 md:p-6">
        <a href="{{ route('dashboard.admin.users.index') }}" class="text-sm text-blue-400 hover:text-blue-300">← Back to Users</a>
        <h1 class="text-2xl md:text-3xl font-bold mt-3 mb-6">Edit User</h1>

        @if($errors->any())
            <div class="mb-4 text-red-400 text-sm">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('dashboard.admin.users.update', $user) }}" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm text-gray-400 mb-1">Name</label>
                <input name="name" value="{{ old('name', $user->name) }}" class="w-full bg-[#15132B] border border-gray-700 rounded-lg py-2 px-3 text-sm" />
            </div>
            <div>
                <label class="block text-sm text-gray-400 mb-1">Email</label>
                <input name="email" type="email" value="{{ old('email', $user->email) }}" class="w-full bg-[#15132B] border border-gray-700 rounded-lg py-2 px-3 text-sm" />
            </div>
            <div>
                <label class="block text-sm text-gray-400 mb-1">Role</label>
                <select name="role" class="w-full bg-[#15132B] border border-gray-700 rounded-lg py-2 px-3 text-sm">
                    @foreach(['admin','loap','advertiser','regulator','service_provider'] as $role)
                        <option value="{{ $role }}" @selected(old('role', $user->role)===$role)>{{ ucfirst(str_replace('_',' ', $role)) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm text-gray-400 mb-1">Company</label>
                    <input name="company" value="{{ old('company', $user->company) }}" class="w-full bg-[#15132B] border border-gray-700 rounded-lg py-2 px-3 text-sm" />
                </div>
                <div>
                    <label class="block text-sm text-gray-400 mb-1">Phone</label>
                    <input name="phone" value="{{ old('phone', $user->phone) }}" class="w-full bg-[#15132B] border border-gray-700 rounded-lg py-2 px-3 text-sm" />
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm text-gray-400 mb-1">Avatar</label>
                    <input type="file" name="avatar" accept="image/*" class="w-full bg-[#15132B] border border-gray-700 rounded-lg py-2 px-3 text-sm" />
                    @if($user->avatar_path)
                        <img src="{{ asset('storage/'.$user->avatar_path) }}" class="mt-2 w-16 h-16 rounded-full object-cover" alt="Avatar"/>
                    @endif
                </div>
                <div>
                    <label class="block text-sm text-gray-400 mb-1">ID Card</label>
                    <input type="file" name="id_card" accept="image/*" class="w-full bg-[#15132B] border border-gray-700 rounded-lg py-2 px-3 text-sm" />
                    @if($user->id_card_path)
                        <a href="{{ asset('storage/'.$user->id_card_path) }}" target="_blank" class="mt-2 inline-block text-blue-400 text-xs">View current ID</a>
                    @endif
                </div>
            </div>
            <label class="inline-flex items-center gap-2">
                <input type="checkbox" name="is_verified" value="1" @checked(old('is_verified', $user->is_verified))>
                <span class="text-sm text-gray-300">Mark as Verified</span>
            </label>
            <div class="pt-2">
                <button class="bg-orange hover:bg-orange/90 text-white rounded-lg text-sm px-4 py-2">Save Changes</button>
            </div>
        </form>
    </div>
</body>
</html>

