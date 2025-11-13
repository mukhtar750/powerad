<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile Photo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="antialiased bg-[#0E0D1C] text-gray-100 font-sans">
    <div class="max-w-xl mx-auto p-6">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-2xl font-bold">Profile Photo</h1>
                <p class="text-gray-400 text-sm">Upload or change your profile picture</p>
            </div>
            @php
                $role = strtolower(Auth::user()->role ?? 'loap');
                $dashRoute = match ($role) {
                    'admin' => 'dashboard.admin',
                    'advertiser' => 'dashboard.advertiser',
                    'regulator' => 'dashboard.regulator',
                    'service_provider' => 'dashboard.serviceprovider',
                    default => 'loap.dashboard',
                };
            @endphp
            <a href="{{ route($dashRoute) }}" class="text-sm text-blue-400 hover:text-blue-300">Back to Dashboard</a>
        </div>

        @if(session('success'))
            <div class="bg-green-900 text-green-200 px-4 py-2 rounded mb-4">{{ session('success') }}</div>
        @endif
        @if($errors->any())
            <div class="bg-red-900 text-red-200 px-4 py-2 rounded mb-4">
                <ul class="list-disc list-inside text-sm">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
            <div class="flex items-center gap-4 mb-4">
                @if($user->avatar_path)
                    <img src="{{ asset('storage/'.$user->avatar_path) }}" alt="Avatar" class="w-20 h-20 rounded-full object-cover border border-gray-600">
                @else
                    <div class="w-20 h-20 rounded-full bg-gray-700"></div>
                @endif
                <div>
                    <div class="text-sm text-gray-400">{{ $user->name }}</div>
                    <div class="text-xs text-gray-500">{{ ucfirst(str_replace('_',' ', $user->role)) }}</div>
                </div>
            </div>

            <form method="POST" action="{{ route('profile.photo.update') }}" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div>
                    <label for="avatar" class="block text-sm font-medium text-gray-300 mb-2">Select Image</label>
                    <input type="file" name="avatar" id="avatar" accept="image/*" class="text-sm text-gray-300" required />
                    <p class="text-xs text-gray-500 mt-1">Accepted formats: JPG, PNG. Max size 4MB.</p>
                </div>
                <button type="submit" class="bg-orange text-white px-4 py-2 rounded hover:bg-orange-600">Upload Photo</button>
            </form>
        </div>
    </div>
</body>
</html>