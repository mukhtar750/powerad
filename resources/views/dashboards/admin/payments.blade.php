<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Payments</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="antialiased bg-[#0E0D1C] text-gray-100 font-sans">
    <div class="max-w-7xl mx-auto p-4 md:p-6">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold">Payments & Earnings</h1>
                <p class="text-gray-400 text-sm">Track all payments and commissions</p>
            </div>
            <a href="/dashboard/admin" class="text-sm text-blue-400 hover:text-blue-300">Back to Dashboard</a>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
            <div class="bg-[#15132B] p-4 rounded-lg border border-gray-700">
                <h3 class="text-lg font-bold text-orange">₦{{ number_format($stats['total_revenue'], 2) }}</h3>
                <p class="text-sm text-gray-400">Total Revenue</p>
            </div>
            <div class="bg-[#15132B] p-4 rounded-lg border border-gray-700">
                <h3 class="text-lg font-bold text-green-400">₦{{ number_format($stats['total_commission'], 2) }}</h3>
                <p class="text-sm text-gray-400">Company Commission (10%)</p>
            </div>
            <div class="bg-[#15132B] p-4 rounded-lg border border-gray-700">
                <h3 class="text-lg font-bold text-blue-400">₦{{ number_format($stats['total_loap_earnings'], 2) }}</h3>
                <p class="text-sm text-gray-400">LOAP Earnings (90%)</p>
            </div>
            <div class="bg-[#15132B] p-4 rounded-lg border border-gray-700">
                <h3 class="text-lg font-bold text-yellow-400">{{ $stats['pending_payments'] }}</h3>
                <p class="text-sm text-gray-400">Pending Payments</p>
            </div>
        </div>

        @if(session('status'))
            <div class="mb-4 text-green-400 text-sm">{{ session('status') }}</div>
        @endif

        <!-- Filters -->
        <form method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-3 mb-4">
            <select name="status" class="bg-[#15132B] border border-gray-700 rounded-lg py-2 px-3 text-sm">
                <option value="">All Statuses</option>
                <option value="pending" @selected(request('status')==='pending')>Pending</option>
                <option value="active" @selected(request('status')==='active')>Active</option>
                <option value="completed" @selected(request('status')==='completed')>Completed</option>
                <option value="cancelled" @selected(request('status')==='cancelled')>Cancelled</option>
            </select>
            <select name="payment_status" class="bg-[#15132B] border border-gray-700 rounded-lg py-2 px-3 text-sm">
                <option value="">All Payment Statuses</option>
                <option value="pending" @selected(request('payment_status')==='pending')>Payment Pending</option>
                <option value="paid" @selected(request('payment_status')==='paid')>Paid</option>
                <option value="failed" @selected(request('payment_status')==='failed')>Failed</option>
            </select>
            <button class="bg-orange hover:bg-orange/90 text-white rounded-lg text-sm px-4">Filter</button>
        </form>

        <!-- Bookings Table -->
        <div class="overflow-x-auto bg-[#15132B] border border-gray-700 rounded-lg">
            <table class="min-w-full text-left text-sm">
                <thead>
                    <tr class="text-gray-400">
                        <th class="py-2 px-4 font-medium">Billboard</th>
                        <th class="py-2 px-4 font-medium">Advertiser</th>
                        <th class="py-2 px-4 font-medium">LOAP</th>
                        <th class="py-2 px-4 font-medium">Amount</th>
                        <th class="py-2 px-4 font-medium">Commission</th>
                        <th class="py-2 px-4 font-medium">LOAP Gets</th>
                        <th class="py-2 px-4 font-medium">Status</th>
                        <th class="py-2 px-4 font-medium">Payment</th>
                        <th class="py-2 px-4 font-medium text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-800">
                    @forelse($bookings as $booking)
                    <tr>
                        <td class="py-3 px-4">{{ $booking->billboard->title }}</td>
                        <td class="py-3 px-4">{{ $booking->advertiser->name }}</td>
                        <td class="py-3 px-4">{{ $booking->loap->name }}</td>
                        <td class="py-3 px-4">₦{{ number_format($booking->total_amount, 2) }}</td>
                        <td class="py-3 px-4 text-green-400">₦{{ number_format($booking->company_commission, 2) }}</td>
                        <td class="py-3 px-4 text-blue-400">₦{{ number_format($booking->loap_amount, 2) }}</td>
                        <td class="py-3 px-4">
                            <span class="px-2 py-1 rounded-full text-xs 
                                {{ $booking->status === 'active' ? 'bg-green-500/20 text-green-300' : '' }}
                                {{ $booking->status === 'pending' ? 'bg-yellow-500/20 text-yellow-300' : '' }}
                                {{ $booking->status === 'completed' ? 'bg-blue-500/20 text-blue-300' : '' }}
                                {{ $booking->status === 'cancelled' ? 'bg-red-500/20 text-red-300' : '' }}
                            ">{{ ucfirst($booking->status) }}</span>
                        </td>
                        <td class="py-3 px-4">
                            <span class="px-2 py-1 rounded-full text-xs 
                                {{ $booking->payment_status === 'paid' ? 'bg-green-500/20 text-green-300' : '' }}
                                {{ $booking->payment_status === 'pending' ? 'bg-yellow-500/20 text-yellow-300' : '' }}
                                {{ $booking->payment_status === 'failed' ? 'bg-red-500/20 text-red-300' : '' }}
                            ">{{ ucfirst($booking->payment_status) }}</span>
                        </td>
                        <td class="py-3 px-4 text-right space-x-2">
                            @if($booking->payment_status === 'pending')
                            <form action="{{ route('dashboard.admin.bookings.mark-paid', $booking) }}" method="POST" class="inline-block">
                                @csrf
                                <button class="text-green-400 hover:text-green-300 text-sm">Mark Paid</button>
                            </form>
                            @endif
                            @if($booking->status === 'active')
                            <form action="{{ route('dashboard.admin.bookings.mark-completed', $booking) }}" method="POST" class="inline-block">
                                @csrf
                                <button class="text-blue-400 hover:text-blue-300 text-sm">Mark Completed</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr><td class="py-3 px-4 text-gray-400" colspan="9">No bookings found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">{{ $bookings->links() }}</div>
        
        <div class="mt-6">
            <a href="{{ route('dashboard.admin.loap-earnings') }}" class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-2 rounded-lg text-sm">View LOAP Earnings</a>
        </div>
    </div>
</body>
</html>
