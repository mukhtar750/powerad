<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Billboard - LOAP Dashboard</title>
    <link rel="stylesheet" href="{{ asset('build/assets/app-BdhG_vQw.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&display=swap" rel="stylesheet">
    <style>
        .font-orbitron { font-family: 'Orbitron', monospace; }
        .logo-container { display: flex; align-items: center; }
    </style>
</head>
<body class="antialiased bg-[#0E0D1C] text-gray-100 font-sans">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-[#15132B] p-6 space-y-6 flex flex-col justify-between shadow-lg">
            <div>
                <!-- Logo Section -->
                <div class="flex items-center space-x-3 mb-6">
                    <div class="flex">
                        <img src="{{ asset('images/primarylogo.png') }}" 
                             alt="PowerAD International Logo" 
                             class="h-8 w-auto">
                    </div>
                    <div>
                        <div class="text-orange text-sm font-medium">LOAP</div>
                    </div>
                </div>
                <nav>
                    <a href="/dashboard/loap" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">
                        <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        Dashboard
                    </a>
                    <a href="/dashboard/loap/billboards" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2 bg-gray-700">
                        <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        My Billboards
                    </a>
                    <a href="/dashboard/loap/bookings" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">
                        <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        Bookings
                    </a>
                    <a href="/dashboard/loap/revenue" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">
                        <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        Revenue
                    </a>
                    <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">
                        <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.329 1.176l1.519 4.674c.3.921-.755 1.688-1.539 1.175l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.784.513-1.838-.254-1.539-1.175l1.519-4.674a1 1 0 00-.329-1.176l-3.976-2.888c-.784-.57-.382-1.81.588-1.81h4.915a1 1 0 00.95-.69l1.519-4.674z"></path></svg>
                        Reviews
                    </a>
                    <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">
                        <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                        Messages
                    </a>
                    <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">
                        <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        Settings
                    </a>
                </nav>
            </div>
            
            <!-- User Profile -->
            <div class="border-t border-gray-700 pt-4">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-gray-600 rounded-full mr-3"></div>
                    <div>
                        <div class="font-bold"><?php echo auth()->user()->name; ?></div>
                        <div class="text-sm text-gray-400">LOAP</div>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto bg-[#0E0D1C] p-8">
            <div class="max-w-4xl mx-auto">
                <!-- Header -->
                <div class="mb-8">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-3xl font-bold text-white font-orbitron mb-2">Add New Billboard</h1>
                            <p class="text-gray-400">Create a new billboard listing to start earning</p>
                        </div>
                        <a href="{{ route('loap.billboards') }}" class="bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition-colors">
                            ← Back to Billboards
                        </a>
                    </div>
                </div>

                <!-- Success/Error Messages -->
                @if(session('success'))
                    <div class="bg-green-900 border border-green-700 text-green-100 px-4 py-3 rounded mb-6">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="bg-red-900 border border-red-700 text-red-100 px-4 py-3 rounded mb-6">
                        <ul class="list-disc list-inside">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Billboard Creation Form -->
                <form action="{{ route('loap.billboards.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                    @csrf
                    
                    <!-- Basic Information -->
                    <div class="bg-[#15132B] rounded-lg p-6">
                        <h2 class="text-xl font-semibold text-white mb-4">Basic Information</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-300 mb-2">Billboard Title *</label>
                                <input type="text" id="title" name="title" value="{{ old('title') }}" 
                                       class="w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-lg text-white focus:outline-none focus:border-orange-500" 
                                       placeholder="e.g., Premium LED Billboard on Lagos-Ibadan Expressway" required>
                            </div>
                            
                            <div>
                                <label for="type" class="block text-sm font-medium text-gray-300 mb-2">Billboard Type *</label>
                                <select id="type" name="type" 
                                        class="w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-lg text-white focus:outline-none focus:border-orange-500" required>
                                    <option value="">Select Type</option>
                                    <option value="Digital" {{ old('type') == 'Digital' ? 'selected' : '' }}>Digital</option>
                                    <option value="Static" {{ old('type') == 'Static' ? 'selected' : '' }}>Static</option>
                                    <option value="LED" {{ old('type') == 'LED' ? 'selected' : '' }}>LED</option>
                                    <option value="Traditional" {{ old('type') == 'Traditional' ? 'selected' : '' }}>Traditional</option>
                                </select>
                            </div>
                            
                            <div>
                                <label for="size" class="block text-sm font-medium text-gray-300 mb-2">Size *</label>
                                <input type="text" id="size" name="size" value="{{ old('size') }}" 
                                       class="w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-lg text-white focus:outline-none focus:border-orange-500" 
                                       placeholder="e.g., 10x20, 20x40" required>
                            </div>
                            
                            <div>
                                <label for="orientation" class="block text-sm font-medium text-gray-300 mb-2">Orientation *</label>
                                <select id="orientation" name="orientation" 
                                        class="w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-lg text-white focus:outline-none focus:border-orange-500" required>
                                    <option value="">Select Orientation</option>
                                    <option value="Portrait" {{ old('orientation') == 'Portrait' ? 'selected' : '' }}>Portrait</option>
                                    <option value="Landscape" {{ old('orientation') == 'Landscape' ? 'selected' : '' }}>Landscape</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="mt-6">
                            <label for="description" class="block text-sm font-medium text-gray-300 mb-2">Description *</label>
                            <textarea id="description" name="description" rows="4" 
                                      class="w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-lg text-white focus:outline-none focus:border-orange-500" 
                                      placeholder="Describe your billboard, its visibility, traffic count, and unique features..." required>{{ old('description') }}</textarea>
                        </div>
                    </div>

                    <!-- Location Information -->
                    <div class="bg-[#15132B] rounded-lg p-6">
                        <h2 class="text-xl font-semibold text-white mb-4">Location Information</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="location" class="block text-sm font-medium text-gray-300 mb-2">Location Name *</label>
                                <input type="text" id="location" name="location" value="{{ old('location') }}" 
                                       class="w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-lg text-white focus:outline-none focus:border-orange-500" 
                                       placeholder="e.g., Lagos-Ibadan Expressway" required>
                            </div>
                            
                            <div>
                                <label for="city" class="block text-sm font-medium text-gray-300 mb-2">City *</label>
                                <input type="text" id="city" name="city" value="{{ old('city') }}" 
                                       class="w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-lg text-white focus:outline-none focus:border-orange-500" 
                                       placeholder="e.g., Lagos" required>
                            </div>
                            
                            <div>
                                <label for="state" class="block text-sm font-medium text-gray-300 mb-2">State *</label>
                                <input type="text" id="state" name="state" value="{{ old('state') }}" 
                                       class="w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-lg text-white focus:outline-none focus:border-orange-500" 
                                       placeholder="e.g., Lagos State" required>
                            </div>
                            
                            <div>
                                <label for="country" class="block text-sm font-medium text-gray-300 mb-2">Country *</label>
                                <input type="text" id="country" name="country" value="{{ old('country', 'Nigeria') }}" 
                                       class="w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-lg text-white focus:outline-none focus:border-orange-500" required>
                            </div>
                        </div>
                        
                        <div class="mt-6">
                            <label for="address" class="block text-sm font-medium text-gray-300 mb-2">Full Address *</label>
                            <textarea id="address" name="address" rows="2" 
                                      class="w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-lg text-white focus:outline-none focus:border-orange-500" 
                                      placeholder="Enter the complete address of the billboard location..." required>{{ old('address') }}</textarea>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                            <div>
                                <label for="latitude" class="block text-sm font-medium text-gray-300 mb-2">Latitude (Optional)</label>
                                <input type="number" id="latitude" name="latitude" value="{{ old('latitude') }}" 
                                       step="any" 
                                       class="w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-lg text-white focus:outline-none focus:border-orange-500" 
                                       placeholder="e.g., 6.5244">
                            </div>
                            
                            <div>
                                <label for="longitude" class="block text-sm font-medium text-gray-300 mb-2">Longitude (Optional)</label>
                                <input type="number" id="longitude" name="longitude" value="{{ old('longitude') }}" 
                                       step="any" 
                                       class="w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-lg text-white focus:outline-none focus:border-orange-500" 
                                       placeholder="e.g., 3.3792">
                            </div>
                        </div>
                    </div>

                    <!-- Pricing Information -->
                    <div class="bg-[#15132B] rounded-lg p-6">
                        <h2 class="text-xl font-semibold text-white mb-4">Pricing Information</h2>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <label for="price_per_day" class="block text-sm font-medium text-gray-300 mb-2">Price per Day (₦) *</label>
                                <input type="number" id="price_per_day" name="price_per_day" value="{{ old('price_per_day') }}" 
                                       step="0.01" min="0" 
                                       class="w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-lg text-white focus:outline-none focus:border-orange-500" 
                                       placeholder="0.00" required>
                            </div>
                            
                            <div>
                                <label for="price_per_week" class="block text-sm font-medium text-gray-300 mb-2">Price per Week (₦) *</label>
                                <input type="number" id="price_per_week" name="price_per_week" value="{{ old('price_per_week') }}" 
                                       step="0.01" min="0" 
                                       class="w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-lg text-white focus:outline-none focus:border-orange-500" 
                                       placeholder="0.00" required>
                            </div>
                            
                            <div>
                                <label for="price_per_month" class="block text-sm font-medium text-gray-300 mb-2">Price per Month (₦) *</label>
                                <input type="number" id="price_per_month" name="price_per_month" value="{{ old('price_per_month') }}" 
                                       step="0.01" min="0" 
                                       class="w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-lg text-white focus:outline-none focus:border-orange-500" 
                                       placeholder="0.00" required>
                            </div>
                        </div>
                    </div>

                    <!-- Images Upload -->
                    <div class="bg-[#15132B] rounded-lg p-6">
                        <h2 class="text-xl font-semibold text-white mb-4">Billboard Images</h2>
                        <div>
                            <label for="images" class="block text-sm font-medium text-gray-300 mb-2">Upload Images *</label>
                            <input type="file" id="images" name="images[]" multiple accept="image/*" 
                                   class="w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-lg text-white focus:outline-none focus:border-orange-500" required>
                            <p class="text-sm text-gray-400 mt-2">Upload multiple images (JPG, PNG, GIF). First image will be used as the main image.</p>
                        </div>
                    </div>

                    <!-- Features -->
                    <div class="bg-[#15132B] rounded-lg p-6">
                        <h2 class="text-xl font-semibold text-white mb-4">Features</h2>
                        <div>
                            <label for="features" class="block text-sm font-medium text-gray-300 mb-2">Special Features (Optional)</label>
                            <input type="text" id="features" name="features" value="{{ old('features') }}" 
                                   class="w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-lg text-white focus:outline-none focus:border-orange-500" 
                                   placeholder="e.g., High visibility, 24/7 lighting, Weather resistant, Digital display">
                            <p class="text-sm text-gray-400 mt-2">Separate multiple features with commas</p>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end space-x-4">
                        <a href="{{ route('loap.billboards') }}" 
                           class="px-6 py-3 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition-colors">
                            Cancel
                        </a>
                        <button type="submit" 
                                class="px-6 py-3 bg-orange-600 hover:bg-orange-700 text-white rounded-lg transition-colors font-medium">
                            Create Billboard
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>
</html>
