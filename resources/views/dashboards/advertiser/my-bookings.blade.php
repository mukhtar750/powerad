<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookings - DHOA Portal</title>
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
        .booking-card {
            transition: all 0.3s ease;
            background: linear-gradient(135deg, #1E293B 0%, #334155 100%);
            border: 1px solid #374151;
        }
        .booking-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.3);
        }
        .status-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        .status-pending { background-color: #fef3c7; color: #92400e; }
        .status-active { background-color: #d1fae5; color: #065f46; }
        .status-completed { background-color: #e0e7ff; color: #3730a3; }
        .status-cancelled { background-color: #fee2e2; color: #991b1b; }
        .payment-paid { background-color: #d1fae5; color: #065f46; }
        .payment-pending { background-color: #fef3c7; color: #92400e; }
        .payment-failed { background-color: #fee2e2; color: #991b1b; }
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
                    <a href="{{ route('advertiser.discover') }}" class="text-gray-300 hover:text-orange px-3 py-2 rounded-md text-sm font-medium">
                        <i class="fas fa-search mr-1"></i> Discover Billboards
                    </a>
                    <a href="{{ route('dashboard.advertiser') }}" class="text-gray-300 hover:text-orange px-3 py-2 rounded-md text-sm font-medium">
                        <i class="fas fa-home mr-1"></i> Dashboard
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">My Bookings</h1>
                <p class="text-gray-600 mt-2">Track and manage your billboard advertising campaigns</p>
            </div>
            <a href="{{ route('advertiser.discover') }}" 
               class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors">
                <i class="fas fa-plus mr-2"></i> New Booking
            </a>
        </div>

        <!-- Filters -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <form method="GET" action="{{ route('advertiser.my-bookings') }}" class="flex flex-wrap gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <select name="status" class="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">All Statuses</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Payment Status</label>
                    <select name="payment_status" class="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">All Payment Statuses</option>
                        <option value="pending" {{ request('payment_status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="paid" {{ request('payment_status') == 'paid' ? 'selected' : '' }}>Paid</option>
                        <option value="failed" {{ request('payment_status') == 'failed' ? 'selected' : '' }}>Failed</option>
                    </select>
                </div>
                <div class="flex items-end">
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition-colors">
                        <i class="fas fa-filter mr-2"></i> Apply Filters
                    </button>
                </div>
                @if(request()->hasAny(['status', 'payment_status']))
                    <div class="flex items-end">
                        <a href="{{ route('advertiser.my-bookings') }}" class="text-gray-600 hover:text-gray-800">
                            <i class="fas fa-times mr-2"></i> Clear Filters
                        </a>
                    </div>
                @endif
            </form>
        </div>

        <!-- Bookings List -->
        @if($bookings->count() > 0)
            <div class="space-y-6">
                @foreach($bookings as $booking)
                    <div class="booking-card bg-white rounded-lg shadow-md p-6">
                        <div class="flex justify-between items-start mb-4">
                            <div class="flex-1">
                                <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $booking->billboard->title }}</h3>
                                <div class="flex items-center text-gray-600 mb-2">
                                    <i class="fas fa-map-marker-alt mr-2"></i>
                                    <span>{{ $booking->billboard->location }}, {{ $booking->billboard->city }}</span>
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <i class="fas fa-user mr-2"></i>
                                    <span>Owner: {{ $booking->loap->name }}</span>
                                </div>
                            </div>
                            <div class="flex space-x-2">
                                <span class="status-badge status-{{ $booking->status }}">
                                    {{ ucfirst($booking->status) }}
                                </span>
                                <span class="status-badge payment-{{ $booking->payment_status }}">
                                    {{ ucfirst($booking->payment_status) }}
                                </span>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                            <!-- Campaign Period -->
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h4 class="font-semibold text-gray-900 mb-2">Campaign Period</h4>
                                <div class="text-sm text-gray-600">
                                    <div class="flex items-center mb-1">
                                        <i class="fas fa-calendar-start mr-2"></i>
                                        <span>{{ $booking->start_date->format('M d, Y') }}</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-calendar-end mr-2"></i>
                                        <span>{{ $booking->end_date->format('M d, Y') }}</span>
                                    </div>
                                    <div class="mt-2 text-blue-600 font-medium">
                                        {{ $booking->duration_days }} days
                                    </div>
                                </div>
                            </div>

                            <!-- Payment Details -->
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h4 class="font-semibold text-gray-900 mb-2">Payment Details</h4>
                                <div class="text-sm text-gray-600 space-y-1">
                                    <div class="flex justify-between">
                                        <span>Total Amount:</span>
                                        <span class="font-semibold">₦{{ number_format($booking->total_amount) }}</span>
                                    </div>
                                    <div class="flex justify-between text-green-600">
                                        <span>Commission (10%):</span>
                                        <span>₦{{ number_format($booking->company_commission) }}</span>
                                    </div>
                                    <div class="flex justify-between text-blue-600">
                                        <span>Owner (90%):</span>
                                        <span>₦{{ number_format($booking->loap_amount) }}</span>
                                    </div>
                                    @if($booking->payment_reference)
                                        <div class="mt-2 text-xs">
                                            <span class="text-gray-500">Ref:</span> {{ $booking->payment_reference }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Actions -->
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h4 class="font-semibold text-gray-900 mb-2">Actions</h4>
                                <div class="space-y-2">
                                    <a href="{{ route('advertiser.billboard.show', $booking->billboard) }}" 
                                       class="block w-full text-center bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors text-sm">
                                        <i class="fas fa-eye mr-1"></i> View Billboard
                                    </a>
                                    
                                    @if($booking->status === 'pending')
                                        <button onclick="cancelBooking({{ $booking->id }})" 
                                                class="block w-full text-center bg-red-600 text-white py-2 px-4 rounded-md hover:bg-red-700 transition-colors text-sm">
                                            <i class="fas fa-times mr-1"></i> Cancel Booking
                                        </button>
                                    @endif

                                    @if($booking->status === 'active')
                                        <div class="text-center text-sm text-green-600 font-medium">
                                            <i class="fas fa-check-circle mr-1"></i> Campaign Active
                                        </div>
                                    @endif

                                    @if($booking->status === 'completed')
                                        <div class="text-center text-sm text-blue-600 font-medium">
                                            <i class="fas fa-flag-checkered mr-1"></i> Campaign Completed
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Campaign Details -->
                        @if($booking->campaign_details)
                            <div class="border-t pt-4">
                                <h4 class="font-semibold text-gray-900 mb-2">Campaign Details</h4>
                                <p class="text-gray-600 text-sm">{{ $booking->campaign_details }}</p>
                            </div>
                        @endif

                        <!-- Transfer Status -->
                        @if($booking->transfer_status && $booking->transfer_status !== 'pending')
                            <div class="border-t pt-4 mt-4">
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-gray-600">Transfer Status:</span>
                                    <span class="status-badge status-{{ $booking->transfer_status }}">
                                        {{ ucfirst($booking->transfer_status) }}
                                    </span>
                                </div>
                                @if($booking->transferred_at)
                                    <div class="text-xs text-gray-500 mt-1">
                                        Transferred on {{ $booking->transferred_at->format('M d, Y H:i') }}
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-8 flex justify-center">
                {{ $bookings->appends(request()->query())->links() }}
            </div>
        @else
            <!-- No Bookings -->
            <div class="text-center py-12">
                <i class="fas fa-calendar-times text-6xl text-gray-300 mb-4"></i>
                <h3 class="text-xl font-medium text-gray-900 mb-2">No bookings found</h3>
                <p class="text-gray-500 mb-6">
                    @if(request()->hasAny(['status', 'payment_status']))
                        No bookings match your current filters.
                    @else
                        You haven't made any bookings yet.
                    @endif
                </p>
                <a href="{{ route('advertiser.discover') }}" 
                   class="bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 transition-colors">
                    <i class="fas fa-search mr-2"></i> Discover Billboards
                </a>
            </div>
        @endif
    </div>

    <!-- JavaScript -->
    <script>
        async function cancelBooking(bookingId) {
            if (!confirm('Are you sure you want to cancel this booking?')) {
                return;
            }

            try {
                const response = await fetch(`/dashboard/advertiser/bookings/${bookingId}/cancel`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                });

                const result = await response.json();

                if (result.success) {
                    // Show success message
                    showNotification('Booking cancelled successfully', 'success');
                    // Reload page after a short delay
                    setTimeout(() => {
                        window.location.reload();
                    }, 1500);
                } else {
                    showNotification(result.message || 'Failed to cancel booking', 'error');
                }
            } catch (error) {
                console.error('Error cancelling booking:', error);
                showNotification('An error occurred while cancelling the booking', 'error');
            }
        }

        function showNotification(message, type) {
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 z-50 p-4 rounded-lg text-white font-medium ${
                type === 'success' ? 'bg-green-500' : 'bg-red-500'
            }`;
            notification.textContent = message;

            document.body.appendChild(notification);

            setTimeout(() => {
                notification.remove();
            }, 3000);
        }
    </script>
</body>
</html>
