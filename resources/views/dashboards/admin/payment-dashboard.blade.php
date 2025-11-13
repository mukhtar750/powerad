@extends('layouts.app')

@section('title', 'Payment Dashboard - Admin')

@section('content')
<div class="min-h-screen bg-[#0E0D1C]">
    <!-- Header -->
    <div class="bg-[#15132B] border-b border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold text-gray-100">Payment Dashboard</h1>
                    <p class="text-gray-400 mt-1">Monitor payments, transfers, and financial performance</p>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="text-right">
                        <div class="text-sm text-gray-400">Total Revenue</div>
                        <div class="text-2xl font-bold text-orange">₦{{ number_format($stats['total_revenue']) }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Date Range Filter -->
        <div class="bg-gray-800 rounded-lg p-6 mb-8 border border-gray-700">
            <form method="GET" action="{{ route('dashboard.admin.payments.dashboard') }}" class="flex items-center space-x-4">
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">From Date</label>
                    <input type="date" name="date_from" value="{{ $dateFrom }}" 
                           class="px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-gray-100 focus:outline-none focus:ring-2 focus:ring-orange focus:border-orange">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">To Date</label>
                    <input type="date" name="date_to" value="{{ $dateTo }}" 
                           class="px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-gray-100 focus:outline-none focus:ring-2 focus:ring-orange focus:border-orange">
                </div>
                <div class="flex items-end">
                    <button type="submit" class="bg-orange text-white px-6 py-2 rounded-md font-medium hover:bg-orange-600 transition-colors">
                        <i class="fas fa-filter mr-2"></i> Apply Filter
                    </button>
                </div>
            </form>
        </div>

        <!-- Key Statistics -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Revenue -->
            <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm">Total Revenue</p>
                        <p class="text-2xl font-bold text-gray-100">₦{{ number_format($stats['total_revenue']) }}</p>
                        <p class="text-green-400 text-sm mt-1">
                            <i class="fas fa-chart-line mr-1"></i>
                            All payments
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-money-bill-wave text-white text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Platform Commission -->
            <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm">Platform Commission</p>
                        <p class="text-2xl font-bold text-gray-100">₦{{ number_format($stats['platform_commission']) }}</p>
                        <p class="text-orange text-sm mt-1">
                            <i class="fas fa-percentage mr-1"></i>
                            10% of revenue
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-orange rounded-lg flex items-center justify-center">
                        <i class="fas fa-coins text-white text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- LOAP Earnings -->
            <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm">LOAP Earnings</p>
                        <p class="text-2xl font-bold text-gray-100">₦{{ number_format($stats['loap_earnings']) }}</p>
                        <p class="text-blue-400 text-sm mt-1">
                            <i class="fas fa-users mr-1"></i>
                            90% of revenue
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-hand-holding-usd text-white text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Total Bookings -->
            <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm">Total Bookings</p>
                        <p class="text-2xl font-bold text-gray-100">{{ $stats['total_bookings'] }}</p>
                        <p class="text-purple-400 text-sm mt-1">
                            <i class="fas fa-calendar-check mr-1"></i>
                            All time
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-purple-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-calendar-alt text-white text-xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Payment Status Overview -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Payment Status -->
            <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                <h3 class="text-lg font-semibold text-gray-100 mb-4">Payment Status</h3>
                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-300">Paid</span>
                        <div class="flex items-center space-x-2">
                            <span class="text-green-400 font-semibold">{{ $stats['paid_bookings'] }}</span>
                            <div class="w-16 bg-gray-700 rounded-full h-2">
                                <div class="bg-green-500 h-2 rounded-full" 
                                     style="width: {{ $stats['total_bookings'] > 0 ? ($stats['paid_bookings'] / $stats['total_bookings']) * 100 : 0 }}%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-300">Pending</span>
                        <div class="flex items-center space-x-2">
                            <span class="text-yellow-400 font-semibold">{{ $stats['pending_payments'] }}</span>
                            <div class="w-16 bg-gray-700 rounded-full h-2">
                                <div class="bg-yellow-500 h-2 rounded-full" 
                                     style="width: {{ $stats['total_bookings'] > 0 ? ($stats['pending_payments'] / $stats['total_bookings']) * 100 : 0 }}%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-300">Failed</span>
                        <div class="flex items-center space-x-2">
                            <span class="text-red-400 font-semibold">{{ $stats['failed_payments'] }}</span>
                            <div class="w-16 bg-gray-700 rounded-full h-2">
                                <div class="bg-red-500 h-2 rounded-full" 
                                     style="width: {{ $stats['total_bookings'] > 0 ? ($stats['failed_payments'] / $stats['total_bookings']) * 100 : 0 }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Transfer Status -->
            <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                <h3 class="text-lg font-semibold text-gray-100 mb-4">Transfer Status</h3>
                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-300">Completed</span>
                        <div class="flex items-center space-x-2">
                            <span class="text-green-400 font-semibold">{{ $stats['completed_transfers'] }}</span>
                            <div class="w-16 bg-gray-700 rounded-full h-2">
                                <div class="bg-green-500 h-2 rounded-full" 
                                     style="width: {{ $stats['paid_bookings'] > 0 ? ($stats['completed_transfers'] / $stats['paid_bookings']) * 100 : 0 }}%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-300">Pending</span>
                        <div class="flex items-center space-x-2">
                            <span class="text-yellow-400 font-semibold">{{ $stats['pending_transfers'] }}</span>
                            <div class="w-16 bg-gray-700 rounded-full h-2">
                                <div class="bg-yellow-500 h-2 rounded-full" 
                                     style="width: {{ $stats['paid_bookings'] > 0 ? ($stats['pending_transfers'] / $stats['paid_bookings']) * 100 : 0 }}%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-300">Failed</span>
                        <div class="flex items-center space-x-2">
                            <span class="text-red-400 font-semibold">{{ $stats['failed_transfers'] }}</span>
                            <div class="w-16 bg-gray-700 rounded-full h-2">
                                <div class="bg-red-500 h-2 rounded-full" 
                                     style="width: {{ $stats['paid_bookings'] > 0 ? ($stats['failed_transfers'] / $stats['paid_bookings']) * 100 : 0 }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                <h3 class="text-lg font-semibold text-gray-100 mb-4">Quick Actions</h3>
                <div class="space-y-3">
                    <a href="{{ route('dashboard.admin.payments.reports') }}" 
                       class="block w-full bg-orange text-white py-2 px-4 rounded-md text-center hover:bg-orange-600 transition-colors">
                        <i class="fas fa-chart-bar mr-2"></i> View Reports
                    </a>
                    <a href="{{ route('dashboard.admin.payments.export') }}" 
                       class="block w-full bg-green-600 text-white py-2 px-4 rounded-md text-center hover:bg-green-700 transition-colors">
                        <i class="fas fa-download mr-2"></i> Export Data
                    </a>
                    <a href="{{ route('dashboard.admin.payments.analytics') }}" 
                       class="block w-full bg-blue-600 text-white py-2 px-4 rounded-md text-center hover:bg-blue-700 transition-colors">
                        <i class="fas fa-analytics mr-2"></i> Analytics
                    </a>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
            <!-- Monthly Revenue Trends -->
            <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                <h3 class="text-xl font-semibold text-gray-100 mb-6">Monthly Revenue Trends</h3>
                
                <div class="h-64 flex items-end space-x-2">
                    @foreach($monthlyTrends as $trend)
                        <div class="flex-1 flex flex-col items-center">
                            <div class="w-full bg-orange rounded-t" 
                                 style="height: {{ $monthlyTrends->max('total_revenue') > 0 ? ($trend->total_revenue / $monthlyTrends->max('total_revenue')) * 200 : 0 }}px; min-height: 4px;">
                            </div>
                            <div class="text-xs text-gray-400 mt-2 transform -rotate-45 origin-left">
                                {{ \Carbon\Carbon::parse($trend->month)->format('M Y') }}
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <div class="mt-4 grid grid-cols-3 gap-4 text-center">
                    <div>
                        <p class="text-gray-400 text-sm">Total Revenue</p>
                        <p class="text-orange font-semibold">₦{{ number_format($monthlyTrends->sum('total_revenue')) }}</p>
                    </div>
                    <div>
                        <p class="text-gray-400 text-sm">Platform</p>
                        <p class="text-orange font-semibold">₦{{ number_format($monthlyTrends->sum('platform_commission')) }}</p>
                    </div>
                    <div>
                        <p class="text-gray-400 text-sm">LOAPs</p>
                        <p class="text-blue-400 font-semibold">₦{{ number_format($monthlyTrends->sum('loap_earnings')) }}</p>
                    </div>
                </div>
            </div>

            <!-- Top Performing Billboards -->
            <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                <h3 class="text-xl font-semibold text-gray-100 mb-6">Top Performing Billboards</h3>
                
                <div class="space-y-4">
                    @forelse($topBillboards as $billboard)
                        <div class="flex items-center justify-between p-3 bg-gray-700 rounded-lg">
                            <div class="flex-1">
                                <p class="text-gray-100 font-medium">{{ $billboard->title }}</p>
                                <p class="text-gray-400 text-sm">{{ $billboard->user->name }} • {{ $billboard->city }}</p>
                                <p class="text-gray-500 text-xs">{{ $billboard->paid_bookings_count }} bookings</p>
                            </div>
                            <div class="text-right">
                                <p class="text-orange font-semibold">₦{{ number_format($billboard->total_earnings) }}</p>
                                <p class="text-gray-400 text-sm">Revenue</p>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-8">
                            <i class="fas fa-chart-line text-gray-500 text-3xl mb-3"></i>
                            <p class="text-gray-400">No data available</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Recent Transactions -->
        <div class="bg-gray-800 rounded-lg border border-gray-700 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-700">
                <div class="flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-gray-100">Recent Transactions</h3>
                    <a href="{{ route('dashboard.admin.payments.reports') }}" class="text-orange hover:text-orange-300 text-sm">
                        View All <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Booking</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Advertiser</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Billboard</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Amount</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Payment</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Transfer</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Date</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700">
                        @forelse($recentTransactions as $transaction)
                            <tr class="hover:bg-gray-700 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-100">#{{ $transaction->id }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-100">{{ $transaction->advertiser->name }}</div>
                                    <div class="text-sm text-gray-400">{{ $transaction->advertiser->email }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-100">{{ $transaction->billboard->title }}</div>
                                    <div class="text-sm text-gray-400">{{ $transaction->billboard->city }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-100">₦{{ number_format($transaction->total_amount) }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                        @if($transaction->payment_status === 'paid') bg-green-900 text-green-200
                                        @elseif($transaction->payment_status === 'pending') bg-yellow-900 text-yellow-200
                                        @else bg-red-900 text-red-200 @endif">
                                        {{ ucfirst($transaction->payment_status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($transaction->payment_status === 'paid')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                            @if($transaction->transfer_status === 'completed') bg-green-900 text-green-200
                                            @elseif($transaction->transfer_status === 'pending') bg-yellow-900 text-yellow-200
                                            @elseif($transaction->transfer_status === 'failed') bg-red-900 text-red-200
                                            @else bg-gray-900 text-gray-200 @endif">
                                            {{ ucfirst($transaction->transfer_status) }}
                                        </span>
                                    @else
                                        <span class="text-gray-500 text-sm">N/A</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                                    {{ $transaction->created_at->format('M d, Y') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-12 text-center">
                                    <i class="fas fa-receipt text-gray-500 text-4xl mb-4"></i>
                                    <h3 class="text-lg font-medium text-gray-100 mb-2">No transactions yet</h3>
                                    <p class="text-gray-400">Transaction data will appear here once bookings are made</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection