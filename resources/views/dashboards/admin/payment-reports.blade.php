@extends('layouts.app')

@section('title', 'Payment Reports - Admin')

@section('content')
<div class="min-h-screen bg-[#0E0D1C]">
    <!-- Header -->
    <div class="bg-[#15132B] border-b border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold text-gray-100">Payment Reports</h1>
                    <p class="text-gray-400 mt-1">Detailed payment analytics and financial reports</p>
                </div>
                <div class="flex items-center space-x-4">
                    <button onclick="exportToCSV()" class="bg-green-600 text-white px-4 py-2 rounded-md font-medium hover:bg-green-700 transition-colors">
                        <i class="fas fa-download mr-2"></i> Export CSV
                    </button>
                    <button onclick="printReport()" class="bg-blue-600 text-white px-4 py-2 rounded-md font-medium hover:bg-blue-700 transition-colors">
                        <i class="fas fa-print mr-2"></i> Print
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Filters -->
        <div class="bg-gray-800 rounded-lg p-6 mb-8 border border-gray-700">
<form method="GET" action="{{ route('dashboard.admin.payments.reports') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Date From</label>
                    <input type="date" name="date_from" value="{{ $dateFrom ?? '' }}" 
                           class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-gray-100 focus:outline-none focus:ring-2 focus:ring-orange focus:border-orange">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Date To</label>
                    <input type="date" name="date_to" value="{{ $dateTo ?? '' }}" 
                           class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-gray-100 focus:outline-none focus:ring-2 focus:ring-orange focus:border-orange">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Payment Status</label>
                    <select name="payment_status" class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-gray-100 focus:outline-none focus:ring-2 focus:ring-orange focus:border-orange">
                        <option value="">All Statuses</option>
                        <option value="paid" {{ ($paymentStatus ?? '') === 'paid' ? 'selected' : '' }}>Paid</option>
                        <option value="pending" {{ ($paymentStatus ?? '') === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="failed" {{ ($paymentStatus ?? '') === 'failed' ? 'selected' : '' }}>Failed</option>
                    </select>
                </div>
                <div class="flex items-end">
                    <button type="submit" class="w-full bg-orange text-white px-4 py-2 rounded-md font-medium hover:bg-orange-600 transition-colors">
                        <i class="fas fa-filter mr-2"></i> Apply Filters
                    </button>
                </div>
            </form>
        </div>

        <!-- Summary Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm">Total Revenue</p>
                        <p class="text-2xl font-bold text-gray-100">₦{{ number_format($summary['total_revenue']) }}</p>
                    </div>
                    <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-money-bill-wave text-white text-xl"></i>
                    </div>
                </div>
            </div>

            <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm">Platform Commission</p>
                        <p class="text-2xl font-bold text-gray-100">₦{{ number_format($summary['platform_commission']) }}</p>
                    </div>
                    <div class="w-12 h-12 bg-orange rounded-lg flex items-center justify-center">
                        <i class="fas fa-coins text-white text-xl"></i>
                    </div>
                </div>
            </div>

            <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm">LOAP Earnings</p>
                        <p class="text-2xl font-bold text-gray-100">₦{{ number_format($summary['loap_earnings']) }}</p>
                    </div>
                    <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-hand-holding-usd text-white text-xl"></i>
                    </div>
                </div>
            </div>

            <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm">Total Transactions</p>
                        <p class="text-2xl font-bold text-gray-100">{{ $summary['total_transactions'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-purple-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-receipt text-white text-xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Revenue by Month Chart -->
        <div class="bg-gray-800 rounded-lg p-6 mb-8 border border-gray-700">
            <h3 class="text-xl font-semibold text-gray-100 mb-6">Revenue by Month</h3>
            
            <div class="h-80 flex items-end space-x-2">
                @foreach($monthlyData as $month)
                    <div class="flex-1 flex flex-col items-center">
                        <div class="w-full bg-gradient-to-t from-orange to-orange-400 rounded-t" 
                             style="height: {{ $monthlyData->max('total_revenue') > 0 ? ($month->total_revenue / $monthlyData->max('total_revenue')) * 280 : 0 }}px; min-height: 4px;">
                        </div>
                        <div class="text-xs text-gray-400 mt-2 transform -rotate-45 origin-left">
                            {{ \Carbon\Carbon::parse($month->month)->format('M Y') }}
                        </div>
                        <div class="text-xs text-gray-300 mt-1">
                            ₦{{ number_format($month->total_revenue / 1000) }}k
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Detailed Transactions Table -->
        <div class="bg-gray-800 rounded-lg border border-gray-700 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-700">
                <div class="flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-gray-100">Transaction Details</h3>
                    <div class="text-sm text-gray-400">
                        Showing {{ $transactions->count() }} of {{ $transactions->total() }} transactions
                    </div>
                </div>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full" id="transactionsTable">
                    <thead class="bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Advertiser</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Billboard</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">LOAP</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Amount</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Platform</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">LOAP Share</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Payment</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Transfer</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700">
                        @forelse($transactions as $transaction)
                            <tr class="hover:bg-gray-700 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-100">#{{ $transaction->id }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-100">{{ $transaction->created_at->format('M d, Y') }}</div>
                                    <div class="text-xs text-gray-400">{{ $transaction->created_at->format('h:i A') }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-100">{{ $transaction->advertiser->name }}</div>
                                    <div class="text-xs text-gray-400">{{ $transaction->advertiser->email }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-100">{{ $transaction->billboard->title }}</div>
                                    <div class="text-xs text-gray-400">{{ $transaction->billboard->city }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-100">{{ $transaction->billboard->user->name }}</div>
                                    <div class="text-xs text-gray-400">{{ $transaction->billboard->user->email }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-100">₦{{ number_format($transaction->total_amount) }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-orange">₦{{ number_format($transaction->total_amount * 0.1) }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-blue-400">₦{{ number_format($transaction->total_amount * 0.9) }}</div>
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
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="px-6 py-12 text-center">
                                    <i class="fas fa-receipt text-gray-500 text-4xl mb-4"></i>
                                    <h3 class="text-lg font-medium text-gray-100 mb-2">No transactions found</h3>
                                    <p class="text-gray-400">Try adjusting your filters or date range</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($transactions->hasPages())
                <div class="px-6 py-4 border-t border-gray-700">
                    {{ $transactions->appends(request()->query())->links() }}
                </div>
            @endif
        </div>
    </div>
</div>

<script>
function exportToCSV() {
    const table = document.getElementById('transactionsTable');
    const rows = Array.from(table.querySelectorAll('tr'));
    
    let csv = [];
    rows.forEach(row => {
        const cells = Array.from(row.querySelectorAll('th, td'));
        const rowData = cells.map(cell => {
            return '"' + cell.textContent.trim().replace(/"/g, '""') + '"';
        });
        csv.push(rowData.join(','));
    });
    
    const csvContent = csv.join('\n');
    const blob = new Blob([csvContent], { type: 'text/csv' });
    const url = window.URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = 'payment-reports-' + new Date().toISOString().split('T')[0] + '.csv';
    a.click();
    window.URL.revokeObjectURL(url);
}

function printReport() {
    window.print();
}
</script>
@endsection
