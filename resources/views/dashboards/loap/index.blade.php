<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOAP Dashboard - DHOA Portal</title>
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
    @include('partials.sidebar')

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
                    <h1 class="text-3xl font-bold text-gray-100">Welcome back, {{ Auth::user()->name }}!</h1>
                    <p class="text-gray-400 mt-1">Manage your billboards and track your earnings</p>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="text-right">
                        <div class="text-sm text-gray-400">Total Earnings</div>
                        <div class="text-2xl font-bold text-orange">₦{{ number_format($stats['total_earnings']) }}</div>
                    </div>
                    <div class="w-12 h-12 bg-orange rounded-full flex items-center justify-center">
                        <i class="fas fa-chart-line text-white text-xl"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Billboards -->
            <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm">Total Billboards</p>
                        <p class="text-2xl font-bold text-gray-100">{{ $stats['total_billboards'] }}</p>
                        <p class="text-green-400 text-sm mt-1">
                            <i class="fas fa-check-circle mr-1"></i>
                            {{ $stats['verified_billboards'] }} verified
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-bullhorn text-white text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Active Bookings -->
            <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm">Active Bookings</p>
                        <p class="text-2xl font-bold text-gray-100">{{ $stats['active_bookings'] }}</p>
                        <p class="text-blue-400 text-sm mt-1">
                            <i class="fas fa-calendar-check mr-1"></i>
                            {{ $stats['total_bookings'] }} total
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-calendar-alt text-white text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Pending Earnings -->
            <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm">Pending Earnings</p>
                        <p class="text-2xl font-bold text-gray-100">₦{{ number_format($stats['pending_earnings']) }}</p>
                        <p class="text-yellow-400 text-sm mt-1">
                            <i class="fas fa-clock mr-1"></i>
                            Awaiting transfer
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-yellow-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-hourglass-half text-white text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Transferred Earnings -->
            <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm">Transferred</p>
                        <p class="text-2xl font-bold text-gray-100">₦{{ number_format($stats['transferred_earnings']) }}</p>
                        <p class="text-green-400 text-sm mt-1">
                            <i class="fas fa-check-double mr-1"></i>
                            In your account
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-money-bill-wave text-white text-xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Monthly Earnings Chart -->
            <div class="lg:col-span-2">
                <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-semibold text-gray-100">Monthly Earnings</h3>
                        <div class="flex space-x-2">
                            <button class="px-3 py-1 bg-orange text-white rounded-md text-sm">12M</button>
                            <button class="px-3 py-1 bg-gray-700 text-gray-300 rounded-md text-sm">6M</button>
                            <button class="px-3 py-1 bg-gray-700 text-gray-300 rounded-md text-sm">3M</button>
                        </div>
                    </div>
                    
                    <div class="h-64 flex items-end space-x-2">
                        @foreach($monthlyEarnings as $earning)
                            <div class="flex-1 flex flex-col items-center">
                                <div class="w-full bg-orange rounded-t" 
                                     style="height: {{ $monthlyEarnings->max('earnings') > 0 ? ($earning->earnings / $monthlyEarnings->max('earnings')) * 200 : 0 }}px; min-height: 4px;">
                                </div>
                                <div class="text-xs text-gray-400 mt-2 transform -rotate-45 origin-left">
                                    {{ \Carbon\Carbon::parse($earning->month)->format('M Y') }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    <div class="mt-4 text-center">
                        <p class="text-gray-400 text-sm">Total: ₦{{ number_format($monthlyEarnings->sum('earnings')) }}</p>
                    </div>
                </div>
            </div>

            <!-- Recent Bookings -->
            <div class="lg:col-span-1">
                <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-semibold text-gray-100">Recent Bookings</h3>
                        <a href="{{ route('loap.earnings') }}" class="text-orange hover:text-orange-300 text-sm">
                            View All <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                    
                    <div class="space-y-4">
                        @forelse($recentBookings as $booking)
                            <div class="flex items-center justify-between p-3 bg-gray-700 rounded-lg">
                                <div class="flex-1">
                                    <p class="text-gray-100 font-medium">{{ $booking->billboard->title }}</p>
                                    <p class="text-gray-400 text-sm">{{ $booking->advertiser->name }}</p>
                                    <p class="text-gray-500 text-xs">{{ $booking->created_at->diffForHumans() }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-orange font-semibold">₦{{ number_format($booking->total_amount * 0.9) }}</p>
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium
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
                                <p class="text-gray-400">No recent bookings</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <!-- Top Performing Billboards -->
        <div class="mt-8">
            <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xl font-semibold text-gray-100">Top Performing Billboards</h3>
                    <a href="{{ route('loap.billboards') }}" class="text-orange hover:text-orange-300 text-sm">
                        Manage All <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @forelse($topBillboards as $billboard)
                        <div class="bg-gray-700 rounded-lg p-4 border border-gray-600">
                            <div class="flex items-center justify-between mb-3">
                                <h4 class="text-gray-100 font-medium">{{ $billboard->title }}</h4>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium
                                    @if($billboard->is_verified) bg-green-900 text-green-200
                                    @else bg-yellow-900 text-yellow-200 @endif">
                                    @if($billboard->is_verified) Verified @else Pending @endif
                                </span>
                            </div>
                            
                            <div class="space-y-2 text-sm">
                                <div class="flex justify-between">
                                    <span class="text-gray-400">Location:</span>
                                    <span class="text-gray-300">{{ $billboard->city }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-400">Bookings:</span>
                                    <span class="text-gray-300">{{ $billboard->bookings->count() }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-400">Earnings:</span>
                                    <span class="text-orange font-semibold">
                                        ₦{{ number_format($billboard->bookings->where('payment_status', 'paid')->sum('total_amount') * 0.9) }}
                                    </span>
                                </div>
                            </div>
                            
                            <div class="mt-4">
                                <a href="{{ route('loap.billboards') }}?search={{ $billboard->title }}" 
                                   class="w-full bg-orange text-white py-2 px-4 rounded-md text-sm font-medium hover:bg-orange-600 transition-colors text-center block">
                                    <i class="fas fa-edit mr-2"></i> Manage
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-8">
                            <i class="fas fa-bullhorn text-gray-500 text-3xl mb-3"></i>
                            <p class="text-gray-400">No billboards yet</p>
                            <a href="{{ route('loap.billboards.create') }}" class="text-orange hover:text-orange-300 text-sm">
                                Create your first billboard
                            </a>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="mt-8">
            <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                <h3 class="text-xl font-semibold text-gray-100 mb-6">Quick Actions</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <a href="{{ route('loap.billboards.create') }}" 
                       class="flex items-center p-4 bg-gray-700 rounded-lg hover:bg-gray-600 transition-colors border border-gray-600">
                        <div class="w-10 h-10 bg-orange rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-plus text-white"></i>
                        </div>
                        <div>
                            <p class="text-gray-100 font-medium">Add Billboard</p>
                            <p class="text-gray-400 text-sm">Create new listing</p>
                        </div>
                    </a>
                    
                    <a href="{{ route('loap.billboards') }}" 
                       class="flex items-center p-4 bg-gray-700 rounded-lg hover:bg-gray-600 transition-colors border border-gray-600">
                        <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-list text-white"></i>
                        </div>
                        <div>
                            <p class="text-gray-100 font-medium">Manage Billboards</p>
                            <p class="text-gray-400 text-sm">View all listings</p>
                        </div>
                    </a>
                    
                    <a href="{{ route('loap.earnings') }}" 
                       class="flex items-center p-4 bg-gray-700 rounded-lg hover:bg-gray-600 transition-colors border border-gray-600">
                        <div class="w-10 h-10 bg-green-600 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-chart-line text-white"></i>
                        </div>
                        <div>
                            <p class="text-gray-100 font-medium">View Earnings</p>
                            <p class="text-gray-400 text-sm">Track payments</p>
                        </div>
                    </a>
                    
                    <a href="{{ route('loap.analytics') }}" 
                       class="flex items-center p-4 bg-gray-700 rounded-lg hover:bg-gray-600 transition-colors border border-gray-600">
                        <div class="w-10 h-10 bg-purple-600 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-analytics text-white"></i>
                        </div>
                        <div>
                            <p class="text-gray-100 font-medium">Analytics</p>
                            <p class="text-gray-400 text-sm">Performance insights</p>
                        </div>
                    </a>
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
