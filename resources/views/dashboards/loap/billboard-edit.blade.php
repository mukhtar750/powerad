<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Billboard - LOAP Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('build/assets/app-BdhG_vQw.css') }}">
    <style>
        .font-orbitron { font-family: 'Orbitron', monospace; }
        .logo-container { display: flex; align-items: center; }
        .footer-logo-container { display: flex; align-items: center; }
    </style>
    @php
        $featuresString = is_array($billboard->features) ? implode(',', $billboard->features ?? []) : ($billboard->features ?? '');
    @endphp
</head>
<body class="antialiased bg-[#0E0D1C] text-gray-100 font-sans">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-[#15132B] p-6 space-y-6 flex flex-col justify-between shadow-lg">
            <div>
                <!-- Logo Section -->
                <div class="flex items-center space-x-3 mb-6">
                    <div class="flex">
                        <img src="{{ asset('images/primarylogo.png') }}" alt="PowerAD International Logo" class="h-8 w-auto">
                    </div>
                    <div>
                        <div class="text-orange text-sm font-medium">LOAP</div>
                    </div>
                </div>
                <nav>
                    <a href="/dashboard/loap" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">Dashboard</a>
                    <a href="/dashboard/loap/billboards" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2 bg-gray-700">My Billboards</a>
                </nav>
            </div>
            <div class="flex items-center">
                <div class="w-10 h-10 bg-gray-600 rounded-full mr-3"></div>
                <div>
                    <div class="font-bold">{{ auth()->user()->name ?? 'LOAP User' }}</div>
                    <div class="text-sm text-gray-400">LOAP</div>
                </div>
            </div>
            <form action="/logout" method="POST" class="mt-6">
                @csrf
                <button type="submit" class="block py-2 px-4 rounded hover:bg-gray-700 w-full text-left">Logout</button>
            </form>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            <div class="max-w-6xl mx-auto">
                <div class="flex items-center justify-between mb-6">
                    <h1 class="text-2xl font-bold">Edit Billboard</h1>
                    <a href="{{ route('loap.billboards.show', $billboard) }}" class="text-sm text-orange hover:underline">View</a>
                </div>

                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-600/20 border border-red-600 rounded">
                        <div class="font-semibold mb-2">Please fix the following errors:</div>
                        <ul class="list-disc ml-5 text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('loap.billboards.update', $billboard) }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-[#15132B] p-6 rounded-lg shadow">
                    @csrf
                    @method('PUT')

                    <!-- Basic Info -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm mb-1">Title</label>
                            <input type="text" name="title" value="{{ old('title', $billboard->title) }}" class="w-full bg-[#0E0D1C] border border-gray-700 rounded px-3 py-2" required>
                        </div>
                        <div>
                            <label class="block text-sm mb-1">Location</label>
                            <input type="text" name="location" value="{{ old('location', $billboard->location) }}" class="w-full bg-[#0E0D1C] border border-gray-700 rounded px-3 py-2" required>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm mb-1">Description</label>
                            <textarea name="description" rows="3" class="w-full bg-[#0E0D1C] border border-gray-700 rounded px-3 py-2" required>{{ old('description', $billboard->description) }}</textarea>
                        </div>
                    </div>

                    <!-- Address & Geo -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm mb-1">Address</label>
                            <input type="text" name="address" value="{{ old('address', $billboard->address) }}" class="w-full bg-[#0E0D1C] border border-gray-700 rounded px-3 py-2" required>
                        </div>
                        <div>
                            <label class="block text-sm mb-1">City</label>
                            <input type="text" name="city" value="{{ old('city', $billboard->city) }}" class="w-full bg-[#0E0D1C] border border-gray-700 rounded px-3 py-2" required>
                        </div>
                        <div>
                            <label class="block text-sm mb-1">State</label>
                            <input type="text" name="state" value="{{ old('state', $billboard->state) }}" class="w-full bg-[#0E0D1C] border border-gray-700 rounded px-3 py-2" required>
                        </div>
                        <div>
                            <label class="block text-sm mb-1">Country</label>
                            <input type="text" name="country" value="{{ old('country', $billboard->country) }}" class="w-full bg-[#0E0D1C] border border-gray-700 rounded px-3 py-2" required>
                        </div>
                        <div>
                            <label class="block text-sm mb-1">Latitude</label>
                            <input type="text" name="latitude" value="{{ old('latitude', $billboard->latitude) }}" class="w-full bg-[#0E0D1C] border border-gray-700 rounded px-3 py-2" placeholder="e.g. 6.5244">
                        </div>
                        <div>
                            <label class="block text-sm mb-1">Longitude</label>
                            <input type="text" name="longitude" value="{{ old('longitude', $billboard->longitude) }}" class="w-full bg-[#0E0D1C] border border-gray-700 rounded px-3 py-2" placeholder="e.g. 3.3792">
                        </div>
                    </div>

                    <!-- Specs -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label class="block text-sm mb-1">Size</label>
                            <input type="text" name="size" value="{{ old('size', $billboard->size) }}" class="w-full bg-[#0E0D1C] border border-gray-700 rounded px-3 py-2" required>
                        </div>
                        <div>
                            <label class="block text-sm mb-1">Type</label>
                            <select name="type" class="w-full bg-[#0E0D1C] border border-gray-700 rounded px-3 py-2" required>
                                @foreach (['Digital','Static','LED','Traditional'] as $type)
                                    <option value="{{ $type }}" @selected(old('type', $billboard->type) === $type)>{{ $type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm mb-1">Orientation</label>
                            <select name="orientation" class="w-full bg-[#0E0D1C] border border-gray-700 rounded px-3 py-2" required>
                                @foreach (['Portrait','Landscape'] as $o)
                                    <option value="{{ $o }}" @selected(old('orientation', $billboard->orientation) === $o)>{{ $o }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Pricing -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label class="block text-sm mb-1">Price per Day</label>
                            <input type="number" step="0.01" name="price_per_day" value="{{ old('price_per_day', $billboard->price_per_day) }}" class="w-full bg-[#0E0D1C] border border-gray-700 rounded px-3 py-2" required>
                        </div>
                        <div>
                            <label class="block text-sm mb-1">Price per Week</label>
                            <input type="number" step="0.01" name="price_per_week" value="{{ old('price_per_week', $billboard->price_per_week) }}" class="w-full bg-[#0E0D1C] border border-gray-700 rounded px-3 py-2" required>
                        </div>
                        <div>
                            <label class="block text-sm mb-1">Price per Month</label>
                            <input type="number" step="0.01" name="price_per_month" value="{{ old('price_per_month', $billboard->price_per_month) }}" class="w-full bg-[#0E0D1C] border border-gray-700 rounded px-3 py-2" required>
                        </div>
                    </div>

                    <!-- Features -->
                    <div>
                        <label class="block text-sm mb-1">Features (comma-separated)</label>
                        <input type="text" name="features" value="{{ old('features', $featuresString) }}" class="w-full bg-[#0E0D1C] border border-gray-700 rounded px-3 py-2" placeholder="e.g. Lighting, Near Mall, High Traffic">
                    </div>

                    <!-- Images -->
                    <div class="space-y-3">
                        <label class="block text-sm">Images</label>
                        @if ($billboard->images && count($billboard->images))
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-4">
                                @foreach ($billboard->images as $image)
                                    <div class="bg-[#0E0D1C] border border-gray-700 rounded p-2">
                                        <img src="{{ asset('storage/' . $image) }}" alt="Billboard Image" class="w-full h-32 object-cover rounded">
                                    </div>
                                @endforeach
                            </div>
                            <p class="text-xs text-gray-400">Uploading new images will replace existing ones.</p>
                        @endif
                        <input type="file" name="images[]" multiple accept="image/*" class="w-full bg-[#0E0D1C] border border-gray-700 rounded px-3 py-2">
                        <p class="text-xs text-gray-400">Accepted: jpeg, png, jpg, gif. Max size per image: 5MB.</p>
                    </div>

                    <div class="flex items-center justify-between pt-4">
                        <a href="{{ route('loap.billboards') }}" class="px-4 py-2 bg-gray-700 hover:bg-gray-600 rounded">Cancel</a>
                        <button type="submit" class="px-4 py-2 bg-orange text-black font-semibold rounded hover:opacity-90">Save Changes</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
    
    <!-- Footer -->
    <footer class="mt-10 p-6">
        <div class="footer-logo-container">
            <img src="{{ asset('images/primarylogo.png') }}" alt="PowerAD International Logo" class="h-6 w-auto">
            <div class="ml-3 text-sm text-gray-400">PowerAD International © {{ date('Y') }}</div>
        </div>
    </footer>
</body>
</html>