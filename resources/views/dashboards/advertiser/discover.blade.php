<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discover Billboards - DHOA Portal</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .billboard-card {
            transition: all 0.3s ease;
            background: linear-gradient(135deg, #1E293B 0%, #334155 100%);
        }
        .billboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.3), 0 10px 10px -5px rgba(0, 0, 0, 0.1);
        }
        .filter-section {
            background: linear-gradient(135deg, #2E6EAC 0%, #1E4A7A 100%);
        }
        .price-badge {
            background: linear-gradient(135deg, #F58634 0%, #E0752A 100%);
        }
        .status-badge {
            position: absolute;
            top: 10px;
            right: 10px;
        }
    </style>
</head>
<body class="bg-[#0E0D1C] text-gray-100">
    <!-- Navigation -->
    <nav class="bg-[#15132B] shadow-lg border-b border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <img class="h-8 w-auto" src="/images/primarylogo.png" alt="DHOA Portal">
                    <span class="ml-2 text-xl font-bold text-gray-100">DHOA Portal</span>
            </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('dashboard.advertiser') }}" class="text-gray-300 hover:text-orange px-3 py-2 rounded-md text-sm font-medium">
                        <i class="fas fa-home mr-1"></i> Dashboard
                    </a>
                    <a href="{{ route('advertiser.my-bookings') }}" class="text-gray-300 hover:text-orange px-3 py-2 rounded-md text-sm font-medium">
                        <i class="fas fa-calendar mr-1"></i> My Bookings
                    </a>
                    <div class="relative">
                        <button class="flex items-center text-gray-300 hover:text-orange px-3 py-2 rounded-md text-sm font-medium">
                            <i class="fas fa-user mr-1"></i> {{ Auth::user()->name }}
                            <i class="fas fa-chevron-down ml-1"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-gray-100 mb-4">Discover Billboards</h1>
            <p class="text-xl text-gray-300">Find the perfect billboard for your advertising campaign</p>
        </div>

        <!-- Filters Section -->
        <div class="filter-section rounded-lg p-6 mb-8 text-white">
            <form method="GET" action="{{ route('advertiser.discover') }}" id="filter-form">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
                    <!-- Search -->
                    <div>
                        <label class="block text-sm font-medium mb-2">Search</label>
                        <input type="text" name="search" value="{{ request('search') }}" 
                               placeholder="Search billboards..." 
                               class="w-full px-3 py-2 rounded-md bg-gray-800 text-gray-100 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-orange focus:border-orange">
                    </div>

                    <!-- City -->
                    <div>
                        <label class="block text-sm font-medium mb-2">City</label>
                        <select name="city" class="w-full px-3 py-2 rounded-md bg-gray-800 text-gray-100 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-orange focus:border-orange">
                            <option value="">All Cities</option>
                            @foreach($cities as $city)
                                <option value="{{ $city }}" {{ request('city') == $city ? 'selected' : '' }}>{{ $city }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- State -->
                    <div>
                        <label class="block text-sm font-medium mb-2">State</label>
                        <select name="state" class="w-full px-3 py-2 rounded-md bg-gray-800 text-gray-100 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-orange focus:border-orange">
                            <option value="">All States</option>
                            @foreach($states as $state)
                                <option value="{{ $state }}" {{ request('state') == $state ? 'selected' : '' }}>{{ $state }}</option>
                            @endforeach
                        </select>
                        </div>

                    <!-- Type -->
                    <div>
                        <label class="block text-sm font-medium mb-2">Type</label>
                        <select name="type" class="w-full px-3 py-2 rounded-md bg-gray-800 text-gray-100 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-orange focus:border-orange">
                            <option value="">All Types</option>
                            @foreach($types as $type)
                                <option value="{{ $type }}" {{ request('type') == $type ? 'selected' : '' }}>{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                    <!-- Price Range -->
                    <div>
                        <label class="block text-sm font-medium mb-2">Min Price (₦)</label>
                        <input type="number" name="min_price" value="{{ request('min_price') }}" 
                               placeholder="0" min="0"
                               class="w-full px-3 py-2 rounded-md bg-gray-800 text-gray-100 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-orange focus:border-orange">
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-2">Max Price (₦)</label>
                        <input type="number" name="max_price" value="{{ request('max_price') }}" 
                               placeholder="{{ $priceRange->max_price ?? 100000 }}" min="0"
                               class="w-full px-3 py-2 rounded-md bg-gray-800 text-gray-100 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-orange focus:border-orange">
                    </div>

                    <!-- Sort -->
                    <div>
                        <label class="block text-sm font-medium mb-2">Sort By</label>
                        <select name="sort" class="w-full px-3 py-2 rounded-md bg-gray-800 text-gray-100 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-orange focus:border-orange">
                            <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest First</option>
                            <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                            <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                            <option value="location" {{ request('sort') == 'location' ? 'selected' : '' }}>Location</option>
                            <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>Most Popular</option>
                        </select>
                    </div>
                </div>

                <div class="flex justify-between items-center">
                    <button type="submit" class="bg-orange text-white px-6 py-2 rounded-md font-medium hover:bg-orange-600 transition-colors">
                        <i class="fas fa-search mr-2"></i> Apply Filters
                    </button>
                    <a href="{{ route('advertiser.discover') }}" class="text-gray-300 hover:text-orange">
                        <i class="fas fa-times mr-2"></i> Clear Filters
                    </a>
                </div>
            </form>
        </div>

        <!-- Results Count -->
        <div class="mb-6">
            <p class="text-gray-300">
                Showing {{ $billboards->count() }} of {{ $billboards->total() }} billboards
                @if(request()->hasAny(['search', 'city', 'state', 'type', 'min_price', 'max_price']))
                    <span class="text-orange">(filtered)</span>
                @endif
            </p>
            </div>

        <!-- Billboards Grid -->
                @if($billboards->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                    @foreach($billboards as $billboard)
                    <div class="billboard-card bg-gray-800 rounded-lg shadow-md overflow-hidden relative border border-gray-700">
                        <!-- Status Badge -->
                        <div class="status-badge">
                            @if($billboard->bookings->count() > 0)
                                <span class="bg-yellow-500 text-white px-2 py-1 rounded-full text-xs font-medium">
                                    <i class="fas fa-clock mr-1"></i> Booked
                                </span>
                            @else
                                <span class="bg-green-500 text-white px-2 py-1 rounded-full text-xs font-medium">
                                    <i class="fas fa-check mr-1"></i> Available
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
                                    <i class="fas fa-user mr-2 text-gray-400"></i>
                                    <span class="text-gray-300">{{ $billboard->user->name }}</span>
                    </div>
                </div>

                            <!-- Price -->
                            <div class="flex justify-between items-center mb-4">
                                <div>
                                    <span class="text-2xl font-bold text-gray-100">₦{{ number_format($billboard->price_per_day) }}</span>
                                    <span class="text-gray-400">/day</span>
                            </div>
                                <div class="price-badge text-white px-3 py-1 rounded-full text-sm font-medium">
                                    Verified
                        </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex space-x-2">
                                <a href="{{ route('advertiser.billboard.show', $billboard) }}" 
                                   class="flex-1 bg-dark-blue text-white text-center py-2 px-4 rounded-md hover:bg-jacarta-dark transition-colors">
                                    <i class="fas fa-eye mr-2"></i> View Details
                                </a>
                                <a href="{{ route('advertiser.billboard.book', $billboard) }}" 
                                   class="flex-1 bg-orange text-white text-center py-2 px-4 rounded-md hover:bg-orange-600 transition-colors">
                                    <i class="fas fa-calendar-plus mr-2"></i> Book Now
                                </a>
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
                <i class="fas fa-search text-6xl text-gray-500 mb-4"></i>
                <h3 class="text-xl font-medium text-gray-100 mb-2">No billboards found</h3>
                <p class="text-gray-400 mb-6">Try adjusting your search criteria or filters</p>
                <a href="{{ route('advertiser.discover') }}" 
                   class="bg-orange text-white px-6 py-3 rounded-md hover:bg-orange-600 transition-colors">
                    <i class="fas fa-refresh mr-2"></i> Clear Filters
                </a>
                </div>
            @endif
    </div>

    <!-- JavaScript for enhanced functionality -->
    <script>
        // Auto-submit form on filter change
        document.addEventListener('DOMContentLoaded', function() {
            const filterForm = document.getElementById('filter-form');
            const filterInputs = filterForm.querySelectorAll('select, input[type="number"]');
            
            filterInputs.forEach(input => {
                input.addEventListener('change', function() {
                    // Add a small delay to prevent too many requests
                    setTimeout(() => {
                        filterForm.submit();
                    }, 500);
                });
            });
        });

        // Smooth scrolling for better UX
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>