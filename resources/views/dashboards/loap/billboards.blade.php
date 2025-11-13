<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Billboards - LOAP Dashboard</title>
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
                    <h1 class="text-3xl font-bold text-gray-100">My Billboards</h1>
                    <p class="text-gray-400 mt-1">Manage your billboard listings and track performance</p>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('loap.billboards.create') }}" 
                       class="bg-orange text-white px-6 py-3 rounded-lg font-medium hover:bg-orange-600 transition-colors">
                        <i class="fas fa-plus mr-2"></i> Add New Billboard
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Filters and Search -->
        <div class="bg-gray-800 rounded-lg p-6 mb-8 border border-gray-700">
            <form method="GET" action="{{ route('loap.billboards') }}" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <!-- Search -->
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Search</label>
                        <input type="text" name="search" value="{{ request('search') }}" 
                               placeholder="Search billboards..." 
                               class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-gray-100 focus:outline-none focus:ring-2 focus:ring-orange focus:border-orange">
                    </div>

                    <!-- Status Filter -->
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Status</label>
                        <select name="status" class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-gray-100 focus:outline-none focus:ring-2 focus:ring-orange focus:border-orange">
                            <option value="">All Status</option>
                            <option value="verified" {{ request('status') == 'verified' ? 'selected' : '' }}>Verified</option>
                            <option value="unverified" {{ request('status') == 'unverified' ? 'selected' : '' }}>Unverified</option>
                            <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <!-- Sort -->
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Sort By</label>
                        <select name="sort" class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-gray-100 focus:outline-none focus:ring-2 focus:ring-orange focus:border-orange">
                            <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest First</option>
                            <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest First</option>
                            <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price: High to Low</option>
                            <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price: Low to High</option>
                            <option value="most_booked" {{ request('sort') == 'most_booked' ? 'selected' : '' }}>Most Booked</option>
                        </select>
                    </div>

                    <!-- Actions -->
                    <div class="flex items-end space-x-2">
                        <button type="submit" class="bg-orange text-white px-6 py-2 rounded-md font-medium hover:bg-orange-600 transition-colors">
                            <i class="fas fa-search mr-2"></i> Filter
                        </button>
                        <a href="{{ route('loap.billboards') }}" class="bg-gray-700 text-gray-300 px-6 py-2 rounded-md font-medium hover:bg-gray-600 transition-colors">
                            <i class="fas fa-times mr-2"></i> Clear
                        </a>
                    </div>
                </div>
            </form>
        </div>

        <!-- Results Count -->
        <div class="mb-6">
            <p class="text-gray-300">
                Showing {{ $billboards->count() }} of {{ $billboards->total() }} billboards
                @if(request()->hasAny(['search', 'status', 'sort']))
                    <span class="text-orange">(filtered)</span>
                @endif
            </p>
        </div>

        <!-- Billboards Grid -->
        @if($billboards->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                @foreach($billboards as $billboard)
                    <div class="bg-gray-800 rounded-lg shadow-md overflow-hidden relative border border-gray-700">
                        <!-- Status Badge -->
                        <div class="absolute top-4 right-4 z-10">
                            @if($billboard->is_verified)
                                <span class="bg-green-500 text-white px-3 py-1 rounded-full text-xs font-medium">
                                    <i class="fas fa-check mr-1"></i> Verified
                                </span>
                            @else
                                <span class="bg-yellow-500 text-white px-3 py-1 rounded-full text-xs font-medium">
                                    <i class="fas fa-clock mr-1"></i> Pending
                                </span>
                            @endif
                        </div>

                        <!-- Image -->
                        <div class="h-48 bg-gray-700 relative overflow-hidden">
                            @if($billboard->main_image)
                                <img src="{{ $billboard->main_image_url }}" alt="{{ $billboard->title }}" 
                                     class="w-full h-full object-cover">
                            @else
                                <div class="flex items-center justify-center h-full text-gray-400">
                                    <i class="fas fa-image text-4xl"></i>
                                </div>
                            @endif
                        </div>

                        <!-- Content -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-100 mb-2">{{ $billboard->title }}</h3>
                            <p class="text-gray-300 mb-3">{{ Str::limit($billboard->description, 100) }}</p>
                            
                            <!-- Location -->
                            <div class="flex items-center text-gray-400 mb-3">
                                <i class="fas fa-map-marker-alt mr-2"></i>
                                <span>{{ $billboard->location }}, {{ $billboard->city }}</span>
                            </div>

                            <!-- Details -->
                            <div class="grid grid-cols-2 gap-2 mb-4 text-sm">
                                <div class="flex items-center">
                                    <i class="fas fa-tag mr-2 text-gray-400"></i>
                                    <span class="text-gray-300">{{ $billboard->type }}</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-expand-arrows-alt mr-2 text-gray-400"></i>
                                    <span class="text-gray-300">{{ $billboard->size }}</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-mobile-alt mr-2 text-gray-400"></i>
                                    <span class="text-gray-300">{{ $billboard->orientation }}</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-calendar mr-2 text-gray-400"></i>
                                    <span class="text-gray-300">{{ $billboard->bookings->count() }} bookings</span>
                                </div>
                            </div>

                            <!-- Price and Earnings -->
                            <div class="flex justify-between items-center mb-4">
                                <div>
                                    <span class="text-2xl font-bold text-gray-100">₦{{ number_format($billboard->price_per_day) }}</span>
                                    <span class="text-gray-400">/day</span>
                                </div>
                                <div class="text-right">
                                    <div class="text-sm text-gray-400">Total Earnings</div>
                                    <div class="text-orange font-semibold">
                                        ₦{{ number_format($billboard->bookings->where('payment_status', 'paid')->sum('total_amount') * 0.9) }}
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex space-x-2">
                                <a href="{{ route('loap.billboards.show', $billboard) }}" 
                                   class="flex-1 bg-dark-blue text-white text-center py-2 px-4 rounded-md hover:bg-jacarta-dark transition-colors">
                                    <i class="fas fa-eye mr-2"></i> View
                                </a>
                                <a href="{{ route('loap.billboards.edit', $billboard) }}" 
                                   class="flex-1 bg-orange text-white text-center py-2 px-4 rounded-md hover:bg-orange-600 transition-colors">
                                    <i class="fas fa-edit mr-2"></i> Edit
                                </a>
                            </div>

                            <!-- Status Toggle -->
                            <div class="mt-3">
                                <form method="POST" action="{{ route('loap.billboards.toggle-status', $billboard) }}" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" 
                                            class="w-full py-2 px-4 rounded-md text-sm font-medium transition-colors
                                            @if($billboard->is_active)
                                                bg-red-600 text-white hover:bg-red-700
                                            @else
                                                bg-green-600 text-white hover:bg-green-700
                                            @endif">
                                        @if($billboard->is_active)
                                            <i class="fas fa-pause mr-2"></i> Deactivate
                                        @else
                                            <i class="fas fa-play mr-2"></i> Activate
                                        @endif
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="flex justify-center">
                {{ $billboards->appends(request()->query())->links() }}
            </div>
        @else
            <!-- No Results -->
            <div class="text-center py-12">
                <i class="fas fa-bullhorn text-gray-500 text-6xl mb-4"></i>
                <h3 class="text-xl font-medium text-gray-100 mb-2">No billboards found</h3>
                <p class="text-gray-400 mb-6">
                    @if(request()->hasAny(['search', 'status', 'sort']))
                        Try adjusting your search criteria or filters
                    @else
                        Create your first billboard to start earning
                    @endif
                </p>
                <a href="{{ route('loap.billboards.create') }}" 
                   class="bg-orange text-white px-6 py-3 rounded-md hover:bg-orange-600 transition-colors">
                    <i class="fas fa-plus mr-2"></i> Create Billboard
                </a>
            </div>
        @endif
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
