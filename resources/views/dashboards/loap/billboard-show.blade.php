<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $billboard->title }} - LOAP Dashboard</title>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('build/assets/app-BdhG_vQw.css') }}">
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'dark-blue': '#2E6EAC',
                        'orange': '#F58634',
                        'dark-grey': '#373435',
                        'light-green': '#E0E7E0',
                        'dark-green': '#2B411C',
                        'yellow': '#FFCC29',
                        'jacarta': '#2E6EAC',
                        'jacarta-dark': '#1E4A7A',
                    },
                    fontFamily: {
                        'orbitron': ['Orbitron', 'sans-serif'],
                        'exo': ['Exo 2', 'sans-serif'],
                        'futura': ['Futura', 'sans-serif'],
                    },
                },
            },
        }
    </script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="antialiased bg-[#0E0D1C] text-gray-100 font-sans">
<div class="flex h-screen relative">
    <!-- Sidebar -->
    <aside id="sidebar" class="w-64 bg-[#15132B] p-6 space-y-6 flex flex-col justify-between shadow-lg hidden lg:flex">
        <div>
            <!-- Logo Section -->
            <div class="flex items-center space-x-3 mb-6">
                <img src="{{ asset('images/primarylogo.png') }}" 
                     alt="PowerAD International Logo" 
                     class="h-8 w-auto">
                <div>
                    <div class="text-orange text-sm font-medium">LOAP Dashboard</div>
                </div>
            </div>
            <nav>
                <a href="/dashboard/loap" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">
                    <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    Dashboard
                </a>
                <a href="/dashboard/loap/billboards" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2 bg-gray-700">
                    <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"></path></svg>
                    Billboards
                </a>
                <a href="/dashboard/loap/earnings" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">
                    <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    Earnings
                </a>
                <a href="/dashboard/loap/analytics" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">
                    <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    Analytics
                </a>
                <a href="/dashboard/loap/profile" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">
                    <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    Profile
                </a>
            </nav>
        </div>
        <div class="flex items-center">
            <div class="w-10 h-10 bg-gray-600 rounded-full mr-3"></div>
            <div>
                <div class="font-bold"><?php echo auth()->user()->name; ?></div>
                <div class="text-sm text-gray-400">LOAP</div>
            </div>
        </div>
        <form action="/logout" method="POST" class="mt-6">
            @csrf
            <button type="submit" class="block py-2 px-4 rounded hover:bg-gray-700 w-full text-left">
                <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0v6m0-6h6m-6 0H6"></path></svg>
                Logout
            </button>
        </form>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-4 md:p-6 overflow-y-auto">
        <!-- Mobile Menu Button -->
        <div class="lg:hidden mb-4">
            <button id="mobile-menu-btn" class="p-2 rounded-lg bg-gray-700 text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>

        <div class="min-h-screen bg-[#0E0D1C]">
            <!-- Header -->
            <div class="bg-[#15132B] border-b border-gray-700">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                    <div class="flex justify-between items-center">
                        <div>
                            <nav class="flex items-center space-x-2 text-sm text-gray-400 mb-2">
                                <a href="/dashboard/loap" class="hover:text-orange">Dashboard</a>
                                <span>/</span>
                                <a href="/dashboard/loap/billboards" class="hover:text-orange">Billboards</a>
                                <span>/</span>
                                <span class="text-gray-100">{{ $billboard->title }}</span>
                            </nav>
                            <h1 class="text-3xl font-bold text-gray-100">{{ $billboard->title }}</h1>
                            <p class="text-gray-400 mt-1">{{ $billboard->location }}, {{ $billboard->city }}</p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <a href="{{ route('loap.billboards.edit', $billboard) }}" 
                               class="bg-orange text-white px-4 py-2 rounded-md font-medium hover:bg-orange-600 transition-colors">
                                <i class="fas fa-edit mr-2"></i> Edit Billboard
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Main Content -->
                    <div class="lg:col-span-2 space-y-8">
                        <!-- Billboard Image -->
                        <div class="bg-gray-800 rounded-lg border border-gray-700 overflow-hidden">
                            @if($billboard->main_image)
                                <img src="{{ asset('storage/' . $billboard->main_image) }}" 
                                     alt="{{ $billboard->title }}" 
                                     class="w-full h-64 object-cover">
                            @else
                                <div class="w-full h-64 bg-gray-700 flex items-center justify-center">
                                    <i class="fas fa-image text-gray-500 text-4xl"></i>
                                </div>
                            @endif
                        </div>

                        <!-- Description -->
                        <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                            <h2 class="text-xl font-semibold text-gray-100 mb-4">Description</h2>
                            <p class="text-gray-300 leading-relaxed">{{ $billboard->description }}</p>
                        </div>

                        <!-- Features -->
                        <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                            <h2 class="text-xl font-semibold text-gray-100 mb-4">Features</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                @foreach($billboard->features as $feature)
                                    <div class="flex items-center text-gray-300">
                                        <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                        <span>{{ $feature }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Recent Bookings -->
                        <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                            <h2 class="text-xl font-semibold text-gray-100 mb-4">Recent Bookings</h2>
                            <div class="space-y-4">
                                @forelse($billboard->bookings()->latest()->take(5)->get() as $booking)
                                    <div class="flex items-center justify-between p-4 bg-gray-700 rounded-lg">
                                        <div>
                                            <p class="text-gray-100 font-medium">{{ $booking->advertiser->name }}</p>
                                            <p class="text-gray-400 text-sm">{{ $booking->start_date }} - {{ $booking->end_date }}</p>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-orange font-semibold">₦{{ number_format($booking->total_amount) }}</p>
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                                @if($booking->status === 'active') bg-green-900 text-green-200
                                                @elseif($booking->status === 'pending') bg-yellow-900 text-yellow-200
                                                @elseif($booking->status === 'completed') bg-blue-900 text-blue-200
                                                @else bg-gray-900 text-gray-200 @endif">
                                                {{ ucfirst($booking->status) }}
                                            </span>
                                        </div>
                                    </div>
                                @empty
                                    <div class="text-center py-8">
                                        <i class="fas fa-calendar-times text-gray-500 text-3xl mb-3"></i>
                                        <p class="text-gray-400">No bookings yet</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div class="space-y-6">
                        <!-- Status Card -->
                        <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                            <h3 class="text-lg font-semibold text-gray-100 mb-4">Status</h3>
                            <div class="space-y-3">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-300">Billboard Status</span>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                        @if($billboard->status === 'available') bg-green-900 text-green-200
                                        @elseif($billboard->status === 'booked') bg-blue-900 text-blue-200
                                        @elseif($billboard->status === 'maintenance') bg-yellow-900 text-yellow-200
                                        @else bg-gray-900 text-gray-200 @endif">
                                        {{ ucfirst($billboard->status) }}
                                    </span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-300">Verification</span>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                        @if($billboard->is_verified) bg-green-900 text-green-200
                                        @else bg-yellow-900 text-yellow-200 @endif">
                                        {{ $billboard->is_verified ? 'Verified' : 'Pending' }}
                                    </span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-300">Active</span>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                        @if($billboard->is_active) bg-green-900 text-green-200
                                        @else bg-red-900 text-red-200 @endif">
                                        {{ $billboard->is_active ? 'Yes' : 'No' }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Pricing -->
                        <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                            <h3 class="text-lg font-semibold text-gray-100 mb-4">Pricing</h3>
                            <div class="space-y-3">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-300">Per Day</span>
                                    <span class="text-orange font-semibold">₦{{ number_format($billboard->price_per_day) }}</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-300">Per Week</span>
                                    <span class="text-orange font-semibold">₦{{ number_format($billboard->price_per_week) }}</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-300">Per Month</span>
                                    <span class="text-orange font-semibold">₦{{ number_format($billboard->price_per_month) }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Specifications -->
                        <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                            <h3 class="text-lg font-semibold text-gray-100 mb-4">Specifications</h3>
                            <div class="space-y-3">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-300">Size</span>
                                    <span class="text-gray-100">{{ $billboard->size }}</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-300">Type</span>
                                    <span class="text-gray-100">{{ $billboard->type }}</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-300">Orientation</span>
                                    <span class="text-gray-100">{{ $billboard->orientation }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Location -->
                        <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                            <h3 class="text-lg font-semibold text-gray-100 mb-4">Location</h3>
                            <div class="space-y-3">
                                <div class="flex items-start">
                                    <i class="fas fa-map-marker-alt text-orange mr-3 mt-1"></i>
                                    <div>
                                        <p class="text-gray-100">{{ $billboard->address }}</p>
                                        <p class="text-gray-400 text-sm">{{ $billboard->city }}, {{ $billboard->state }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Actions -->
                        <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                            <h3 class="text-lg font-semibold text-gray-100 mb-4">Quick Actions</h3>
                            <div class="space-y-3">
                                <a href="{{ route('loap.billboards.edit', $billboard) }}" 
                                   class="block w-full bg-orange text-white py-2 px-4 rounded-md text-center hover:bg-orange-600 transition-colors">
                                    <i class="fas fa-edit mr-2"></i> Edit Billboard
                                </a>
                                <form method="POST" action="{{ route('loap.billboards.toggle-status', $billboard) }}" class="w-full">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" 
                                            class="w-full bg-gray-600 text-white py-2 px-4 rounded-md hover:bg-gray-500 transition-colors">
                                        <i class="fas fa-power-off mr-2"></i> 
                                        {{ $billboard->is_active ? 'Deactivate' : 'Activate' }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<script>
// Mobile menu toggle
document.getElementById('mobile-menu-btn').addEventListener('click', function() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('hidden');
});
</script>
</body>
</html>
