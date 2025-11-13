<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Earnings - LOAP Dashboard</title>
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
                <a href="/dashboard/loap/earnings" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2 bg-gray-700">
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
                    <h1 class="text-3xl font-bold text-gray-100">Earnings & Payments</h1>
                    <p class="text-gray-400 mt-1">Track your billboard earnings and payment transfers</p>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="text-right">
                        <div class="text-sm text-gray-400">Total Earnings</div>
                        <div class="text-2xl font-bold text-orange">₦{{ number_format($earningsSummary['total_earnings']) }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Earnings Summary Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Earnings -->
            <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm">Total Earnings</p>
                        <p class="text-2xl font-bold text-gray-100">₦{{ number_format($earningsSummary['total_earnings']) }}</p>
                        <p class="text-green-400 text-sm mt-1">
                            <i class="fas fa-chart-line mr-1"></i>
                            All time
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-money-bill-wave text-white text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Pending Transfers -->
            <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm">Pending Transfers</p>
                        <p class="text-2xl font-bold text-gray-100">₦{{ number_format($earningsSummary['pending_transfers']) }}</p>
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

            <!-- This Month -->
            <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm">This Month</p>
                        <p class="text-2xl font-bold text-gray-100">₦{{ number_format($earningsSummary['this_month']) }}</p>
                        <p class="text-blue-400 text-sm mt-1">
                            <i class="fas fa-calendar mr-1"></i>
                            {{ now()->format('M Y') }}
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-calendar-alt text-white text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Completed Transfers -->
            <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm">Transferred</p>
                        <p class="text-2xl font-bold text-gray-100">₦{{ number_format($earningsSummary['completed_transfers']) }}</p>
                        <p class="text-green-400 text-sm mt-1">
                            <i class="fas fa-check-double mr-1"></i>
                            In your account
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-check-circle text-white text-xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="bg-gray-800 rounded-lg p-6 mb-8 border border-gray-700">
            <form method="GET" action="{{ route('loap.earnings') }}" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                    <!-- Payment Status -->
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Payment Status</label>
                        <select name="payment_status" class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-gray-100 focus:outline-none focus:ring-2 focus:ring-orange focus:border-orange">
                            <option value="">All Payments</option>
                            <option value="paid" {{ request('payment_status') == 'paid' ? 'selected' : '' }}>Paid</option>
                            <option value="pending" {{ request('payment_status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="failed" {{ request('payment_status') == 'failed' ? 'selected' : '' }}>Failed</option>
                        </select>
                    </div>

                    <!-- Transfer Status -->
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Transfer Status</label>
                        <select name="transfer_status" class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-gray-100 focus:outline-none focus:ring-2 focus:ring-orange focus:border-orange">
                            <option value="">All Transfers</option>
                            <option value="pending" {{ request('transfer_status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="initiated" {{ request('transfer_status') == 'initiated' ? 'selected' : '' }}>Initiated</option>
                            <option value="completed" {{ request('transfer_status') == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="failed" {{ request('transfer_status') == 'failed' ? 'selected' : '' }}>Failed</option>
                        </select>
                    </div>

                    <!-- Date From -->
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">From Date</label>
                        <input type="date" name="date_from" value="{{ request('date_from') }}" 
                               class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-gray-100 focus:outline-none focus:ring-2 focus:ring-orange focus:border-orange">
                    </div>

                    <!-- Date To -->
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">To Date</label>
                        <input type="date" name="date_to" value="{{ request('date_to') }}" 
                               class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-gray-100 focus:outline-none focus:ring-2 focus:ring-orange focus:border-orange">
                    </div>

                    <!-- Actions -->
                    <div class="flex items-end space-x-2">
                        <button type="submit" class="bg-orange text-white px-6 py-2 rounded-md font-medium hover:bg-orange-600 transition-colors">
                            <i class="fas fa-search mr-2"></i> Filter
                        </button>
                        <a href="{{ route('loap.earnings') }}" class="bg-gray-700 text-gray-300 px-6 py-2 rounded-md font-medium hover:bg-gray-600 transition-colors">
                            <i class="fas fa-times mr-2"></i> Clear
                        </a>
                    </div>
                </div>
            </form>
        </div>

        <!-- Earnings Table -->
        <div class="bg-gray-800 rounded-lg border border-gray-700 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-700">
                <h3 class="text-lg font-semibold text-gray-100">Earnings History</h3>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Booking</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Billboard</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Advertiser</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Duration</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Your Earnings</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Payment</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Transfer</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Date</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700">
                        @forelse($bookings as $booking)
                            <tr class="hover:bg-gray-700 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-100">#{{ $booking->id }}</div>
                                    <div class="text-sm text-gray-400">{{ $booking->status }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-100">{{ $booking->billboard->title }}</div>
                                    <div class="text-sm text-gray-400">{{ $booking->billboard->city }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-100">{{ $booking->advertiser->name }}</div>
                                    <div class="text-sm text-gray-400">{{ $booking->advertiser->email }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-100">
                                        {{ \Carbon\Carbon::parse($booking->start_date)->format('M d') }} - 
                                        {{ \Carbon\Carbon::parse($booking->end_date)->format('M d, Y') }}
                                    </div>
                                    <div class="text-sm text-gray-400">
                                        {{ \Carbon\Carbon::parse($booking->start_date)->diffInDays($booking->end_date) + 1 }} days
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-orange">₦{{ number_format($booking->total_amount * 0.9) }}</div>
                                    <div class="text-sm text-gray-400">90% of ₦{{ number_format($booking->total_amount) }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                        @if($booking->payment_status === 'paid') bg-green-900 text-green-200
                                        @elseif($booking->payment_status === 'pending') bg-yellow-900 text-yellow-200
                                        @else bg-red-900 text-red-200 @endif">
                                        @if($booking->payment_status === 'paid')
                                            <i class="fas fa-check mr-1"></i> Paid
                                        @elseif($booking->payment_status === 'pending')
                                            <i class="fas fa-clock mr-1"></i> Pending
                                        @else
                                            <i class="fas fa-times mr-1"></i> Failed
                                        @endif
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($booking->payment_status === 'paid')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                            @if($booking->transfer_status === 'completed') bg-green-900 text-green-200
                                            @elseif($booking->transfer_status === 'initiated') bg-blue-900 text-blue-200
                                            @elseif($booking->transfer_status === 'failed') bg-red-900 text-red-200
                                            @else bg-yellow-900 text-yellow-200 @endif">
                                            @if($booking->transfer_status === 'completed')
                                                <i class="fas fa-check-double mr-1"></i> Completed
                                            @elseif($booking->transfer_status === 'initiated')
                                                <i class="fas fa-spinner mr-1"></i> Processing
                                            @elseif($booking->transfer_status === 'failed')
                                                <i class="fas fa-exclamation-triangle mr-1"></i> Failed
                                            @else
                                                <i class="fas fa-clock mr-1"></i> Pending
                                            @endif
                                        </span>
                                    @else
                                        <span class="text-gray-500 text-sm">N/A</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                                    {{ $booking->created_at->format('M d, Y') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-6 py-12 text-center">
                                    <i class="fas fa-chart-line text-gray-500 text-4xl mb-4"></i>
                                    <h3 class="text-lg font-medium text-gray-100 mb-2">No earnings yet</h3>
                                    <p class="text-gray-400">Your earnings will appear here once advertisers book your billboards</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            @if($bookings->hasPages())
                <div class="px-6 py-4 border-t border-gray-700">
                    {{ $bookings->appends(request()->query())->links() }}
                </div>
            @endif
        </div>

        <!-- Payment Information -->
        <div class="mt-8 bg-gray-800 rounded-lg p-6 border border-gray-700">
            <h3 class="text-lg font-semibold text-gray-100 mb-4">Payment Information</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h4 class="text-md font-medium text-gray-200 mb-3">How Payments Work</h4>
                    <ul class="space-y-2 text-sm text-gray-300">
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-400 mr-2 mt-1"></i>
                            <span>You receive 90% of each booking payment</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-400 mr-2 mt-1"></i>
                            <span>Platform commission is 10%</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-400 mr-2 mt-1"></i>
                            <span>Transfers are processed within 24-48 hours</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-400 mr-2 mt-1"></i>
                            <span>You'll receive email notifications for all transfers</span>
                        </li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-md font-medium text-gray-200 mb-3">Need Help?</h4>
                    <p class="text-sm text-gray-300 mb-4">
                        If you have questions about your earnings or transfers, please contact our support team.
                    </p>
                    <a href="mailto:support@dhoa.com" 
                       class="inline-flex items-center px-4 py-2 bg-orange text-white rounded-md hover:bg-orange-600 transition-colors">
                        <i class="fas fa-envelope mr-2"></i> Contact Support
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
