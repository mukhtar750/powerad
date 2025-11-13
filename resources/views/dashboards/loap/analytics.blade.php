<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analytics - LOAP Dashboard</title>
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
                <a href="/dashboard/loap/billboards" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">
                    <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"></path></svg>
                    Billboards
                </a>
                <a href="/dashboard/loap/earnings" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">
                    <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    Earnings
                </a>
                <a href="/dashboard/loap/analytics" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2 bg-gray-700">
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
                    <h1 class="text-3xl font-bold text-gray-100">Analytics & Insights</h1>
                    <p class="text-gray-400 mt-1">Track your billboard performance and optimize your listings</p>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="text-right">
                        <div class="text-sm text-gray-400">Conversion Rate</div>
                        <div class="text-2xl font-bold text-orange">{{ $metrics['conversion_rate'] }}%</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Key Metrics -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Views -->
            <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm">Total Views</p>
                        <p class="text-2xl font-bold text-gray-100">{{ number_format($metrics['total_views']) }}</p>
                        <p class="text-blue-400 text-sm mt-1">
                            <i class="fas fa-eye mr-1"></i>
                            All time
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-eye text-white text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Conversion Rate -->
            <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm">Conversion Rate</p>
                        <p class="text-2xl font-bold text-gray-100">{{ $metrics['conversion_rate'] }}%</p>
                        <p class="text-green-400 text-sm mt-1">
                            <i class="fas fa-chart-line mr-1"></i>
                            Views to bookings
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-percentage text-white text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Average Booking Value -->
            <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm">Avg Booking Value</p>
                        <p class="text-2xl font-bold text-gray-100">₦{{ number_format($metrics['average_booking_value']) }}</p>
                        <p class="text-orange text-sm mt-1">
                            <i class="fas fa-money-bill-wave mr-1"></i>
                            Your 90% share
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-orange rounded-lg flex items-center justify-center">
                        <i class="fas fa-coins text-white text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Peak Hours -->
            <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm">Peak Booking Hour</p>
                        <p class="text-2xl font-bold text-gray-100">{{ $metrics['peak_booking_hours']->first()->hour ?? 'N/A' }}:00</p>
                        <p class="text-purple-400 text-sm mt-1">
                            <i class="fas fa-clock mr-1"></i>
                            Most active time
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-purple-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-clock text-white text-xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
            <!-- Revenue Trends Chart -->
            <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xl font-semibold text-gray-100">Revenue Trends</h3>
                    <div class="flex space-x-2">
                        <button class="px-3 py-1 bg-orange text-white rounded-md text-sm">12M</button>
                        <button class="px-3 py-1 bg-gray-700 text-gray-300 rounded-md text-sm">6M</button>
                        <button class="px-3 py-1 bg-gray-700 text-gray-300 rounded-md text-sm">3M</button>
                    </div>
                </div>
                
                <div class="h-64 flex items-end space-x-2">
                    @foreach($revenueTrends as $trend)
                        <div class="flex-1 flex flex-col items-center">
                            <div class="w-full bg-orange rounded-t" 
                                 style="height: {{ $revenueTrends->max('revenue') > 0 ? ($trend->revenue / $revenueTrends->max('revenue')) * 200 : 0 }}px; min-height: 4px;">
                            </div>
                            <div class="text-xs text-gray-400 mt-2 transform -rotate-45 origin-left">
                                {{ \Carbon\Carbon::parse($trend->month)->format('M Y') }}
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <div class="mt-4 grid grid-cols-2 gap-4 text-center">
                    <div>
                        <p class="text-gray-400 text-sm">Total Revenue</p>
                        <p class="text-orange font-semibold">₦{{ number_format($revenueTrends->sum('revenue')) }}</p>
                    </div>
                    <div>
                        <p class="text-gray-400 text-sm">Total Bookings</p>
                        <p class="text-blue-400 font-semibold">{{ $revenueTrends->sum('bookings_count') }}</p>
                    </div>
                </div>
            </div>

            <!-- Peak Booking Hours -->
            <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                <h3 class="text-xl font-semibold text-gray-100 mb-6">Peak Booking Hours</h3>
                
                <div class="space-y-3">
                    @forelse($metrics['peak_booking_hours'] as $hour)
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-orange rounded-full flex items-center justify-center mr-3">
                                    <span class="text-white text-sm font-medium">{{ $hour->hour }}</span>
                                </div>
                                <span class="text-gray-300">{{ $hour->hour }}:00 - {{ $hour->hour + 1 }}:00</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-20 bg-gray-700 rounded-full h-2 mr-3">
                                    <div class="bg-orange h-2 rounded-full" 
                                         style="width: {{ $metrics['peak_booking_hours']->max('count') > 0 ? ($hour->count / $metrics['peak_booking_hours']->max('count')) * 100 : 0 }}%"></div>
                                </div>
                                <span class="text-gray-400 text-sm">{{ $hour->count }} bookings</span>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-8">
                            <i class="fas fa-clock text-gray-500 text-3xl mb-3"></i>
                            <p class="text-gray-400">No booking data available</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Popular Locations -->
        <div class="bg-gray-800 rounded-lg p-6 border border-gray-700 mb-8">
            <h3 class="text-xl font-semibold text-gray-100 mb-6">Popular Locations</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @forelse($metrics['popular_locations'] as $location)
                    <div class="bg-gray-700 rounded-lg p-4 border border-gray-600">
                        <div class="flex items-center justify-between mb-3">
                            <h4 class="text-gray-100 font-medium">{{ $location->city }}</h4>
                            <span class="bg-orange text-white px-2 py-1 rounded-full text-xs font-medium">
                                {{ $location->bookings_count }} bookings
                            </span>
                        </div>
                        <p class="text-gray-400 text-sm">{{ $location->location }}</p>
                        <div class="mt-3">
                            <div class="w-full bg-gray-600 rounded-full h-2">
                                <div class="bg-orange h-2 rounded-full" 
                                     style="width: {{ $metrics['popular_locations']->max('bookings_count') > 0 ? ($location->bookings_count / $metrics['popular_locations']->max('bookings_count')) * 100 : 0 }}%"></div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-8">
                        <i class="fas fa-map-marker-alt text-gray-500 text-3xl mb-3"></i>
                        <p class="text-gray-400">No location data available</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Seasonal Trends -->
        <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
            <h3 class="text-xl font-semibold text-gray-100 mb-6">Seasonal Trends</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                @php
                    $months = [
                        1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April',
                        5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August',
                        9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December'
                    ];
                @endphp
                
                @for($i = 1; $i <= 12; $i++)
                    @php
                        $monthData = $metrics['seasonal_trends']->where('month', $i)->first();
                        $revenue = $monthData ? $monthData->revenue : 0;
                        $maxRevenue = $metrics['seasonal_trends']->max('revenue') ?: 1;
                    @endphp
                    <div class="bg-gray-700 rounded-lg p-4 border border-gray-600">
                        <div class="text-center">
                            <h4 class="text-gray-100 font-medium mb-2">{{ $months[$i] }}</h4>
                            <div class="w-full bg-gray-600 rounded-full h-3 mb-2">
                                <div class="bg-orange h-3 rounded-full" 
                                     style="width: {{ ($revenue / $maxRevenue) * 100 }}%"></div>
                            </div>
                            <p class="text-orange font-semibold">₦{{ number_format($revenue) }}</p>
                        </div>
                    </div>
                @endfor
            </div>
        </div>

        <!-- Performance Tips -->
        <div class="mt-8 bg-gray-800 rounded-lg p-6 border border-gray-700">
            <h3 class="text-xl font-semibold text-gray-100 mb-6">Performance Tips</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h4 class="text-md font-medium text-gray-200 mb-3">Optimize Your Listings</h4>
                    <ul class="space-y-2 text-sm text-gray-300">
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-400 mr-2 mt-1"></i>
                            <span>Use high-quality, clear images of your billboards</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-400 mr-2 mt-1"></i>
                            <span>Write detailed, compelling descriptions</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-400 mr-2 mt-1"></i>
                            <span>Set competitive pricing based on location and size</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-400 mr-2 mt-1"></i>
                            <span>Keep your billboards in good condition</span>
                        </li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-md font-medium text-gray-200 mb-3">Increase Bookings</h4>
                    <ul class="space-y-2 text-sm text-gray-300">
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-400 mr-2 mt-1"></i>
                            <span>Respond quickly to booking inquiries</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-400 mr-2 mt-1"></i>
                            <span>Offer flexible booking periods</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-400 mr-2 mt-1"></i>
                            <span>Provide excellent customer service</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-400 mr-2 mt-1"></i>
                            <span>Consider seasonal pricing adjustments</span>
                        </li>
                    </ul>
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
