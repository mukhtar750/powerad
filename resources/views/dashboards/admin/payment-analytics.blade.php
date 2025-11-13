@extends('layouts.app')

@section('title', 'Payment Analytics - Admin')

@section('content')
<div class="min-h-screen bg-[#0E0D1C]">
    <!-- Header -->
    <div class="bg-[#15132B] border-b border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold text-gray-100">Payment Analytics</h1>
                    <p class="text-gray-400 mt-1">Advanced payment insights and performance metrics</p>
                </div>
                <div class="flex items-center space-x-4">
                    <select id="timeRange" class="px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-gray-100 focus:outline-none focus:ring-2 focus:ring-orange focus:border-orange">
                        <option value="7">Last 7 days</option>
                        <option value="30" selected>Last 30 days</option>
                        <option value="90">Last 90 days</option>
                        <option value="365">Last year</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Key Performance Indicators -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm">Conversion Rate</p>
                        <p class="text-2xl font-bold text-gray-100">{{ number_format($analytics['conversion_rate'], 1) }}%</p>
                        <p class="text-green-400 text-sm mt-1">
                            <i class="fas fa-arrow-up mr-1"></i>
                            {{ number_format($analytics['conversion_rate_change'], 1) }}% vs last period
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-percentage text-white text-xl"></i>
                    </div>
                </div>
            </div>

            <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm">Average Transaction</p>
                        <p class="text-2xl font-bold text-gray-100">₦{{ number_format($analytics['avg_transaction_value']) }}</p>
                        <p class="text-blue-400 text-sm mt-1">
                            <i class="fas fa-chart-line mr-1"></i>
                            {{ number_format($analytics['avg_transaction_change'], 1) }}% vs last period
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-coins text-white text-xl"></i>
                    </div>
                </div>
            </div>

            <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm">Revenue Growth</p>
                        <p class="text-2xl font-bold text-gray-100">{{ number_format($analytics['revenue_growth'], 1) }}%</p>
                        <p class="text-orange text-sm mt-1">
                            <i class="fas fa-trending-up mr-1"></i>
                            Month over month
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-orange rounded-lg flex items-center justify-center">
                        <i class="fas fa-chart-line text-white text-xl"></i>
                    </div>
                </div>
            </div>

            <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm">Payment Success Rate</p>
                        <p class="text-2xl font-bold text-gray-100">{{ number_format($analytics['payment_success_rate'], 1) }}%</p>
                        <p class="text-green-400 text-sm mt-1">
                            <i class="fas fa-check-circle mr-1"></i>
                            Successful payments
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-shield-check text-white text-xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Revenue Trends Chart -->
        <div class="bg-gray-800 rounded-lg p-6 mb-8 border border-gray-700">
            <h3 class="text-xl font-semibold text-gray-100 mb-6">Revenue Trends</h3>
            
            <div class="h-80 flex items-end space-x-1">
                @foreach($revenueTrends as $trend)
                    <div class="flex-1 flex flex-col items-center">
                        <div class="w-full bg-gradient-to-t from-orange to-orange-400 rounded-t" 
                             style="height: {{ $revenueTrends->max('total_revenue') > 0 ? ($trend->total_revenue / $revenueTrends->max('total_revenue')) * 280 : 0 }}px; min-height: 4px;">
                        </div>
                        <div class="text-xs text-gray-400 mt-2">
                            {{ \Carbon\Carbon::parse($trend->date)->format('M d') }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
            <!-- Payment Methods Distribution -->
            <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                <h3 class="text-xl font-semibold text-gray-100 mb-6">Payment Methods</h3>
                
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-4 h-4 bg-orange rounded-full"></div>
                            <span class="text-gray-300">Paystack</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="text-gray-100 font-semibold">{{ $analytics['payment_methods']['paystack'] }}%</span>
                            <div class="w-20 bg-gray-700 rounded-full h-2">
                                <div class="bg-orange h-2 rounded-full" style="width: {{ $analytics['payment_methods']['paystack'] }}%"></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-4 h-4 bg-blue-500 rounded-full"></div>
                            <span class="text-gray-300">Bank Transfer</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="text-gray-100 font-semibold">{{ $analytics['payment_methods']['bank_transfer'] }}%</span>
                            <div class="w-20 bg-gray-700 rounded-full h-2">
                                <div class="bg-blue-500 h-2 rounded-full" style="width: {{ $analytics['payment_methods']['bank_transfer'] }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Top Performing Cities -->
            <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                <h3 class="text-xl font-semibold text-gray-100 mb-6">Top Performing Cities</h3>
                
                <div class="space-y-4">
                    @foreach($analytics['top_cities'] as $city)
                        <div class="flex items-center justify-between p-3 bg-gray-700 rounded-lg">
                            <div class="flex-1">
                                <p class="text-gray-100 font-medium">{{ $city->city }}</p>
                                <p class="text-gray-400 text-sm">{{ $city->bookings_count }} bookings</p>
                            </div>
                            <div class="text-right">
                                <p class="text-orange font-semibold">₦{{ number_format($city->total_revenue) }}</p>
                                <p class="text-gray-400 text-sm">Revenue</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Performance Metrics -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Peak Hours -->
            <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                <h3 class="text-lg font-semibold text-gray-100 mb-4">Peak Booking Hours</h3>
                <div class="space-y-3">
                    @foreach($analytics['peak_hours'] as $hour)
                        <div class="flex justify-between items-center">
                            <span class="text-gray-300">{{ $hour->hour }}:00</span>
                            <div class="flex items-center space-x-2">
                                <span class="text-gray-100 font-semibold">{{ $hour->bookings_count }}</span>
                                <div class="w-16 bg-gray-700 rounded-full h-2">
                                    <div class="bg-orange h-2 rounded-full" 
                                         style="width: {{ $analytics['peak_hours']->max('bookings_count') > 0 ? ($hour->bookings_count / $analytics['peak_hours']->max('bookings_count')) * 100 : 0 }}%"></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Booking Duration Analysis -->
            <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                <h3 class="text-lg font-semibold text-gray-100 mb-4">Booking Duration</h3>
                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-300">1-7 days</span>
                        <div class="flex items-center space-x-2">
                            <span class="text-gray-100 font-semibold">{{ $analytics['duration_analysis']['short'] }}%</span>
                            <div class="w-16 bg-gray-700 rounded-full h-2">
                                <div class="bg-green-500 h-2 rounded-full" style="width: {{ $analytics['duration_analysis']['short'] }}%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-300">8-30 days</span>
                        <div class="flex items-center space-x-2">
                            <span class="text-gray-100 font-semibold">{{ $analytics['duration_analysis']['medium'] }}%</span>
                            <div class="w-16 bg-gray-700 rounded-full h-2">
                                <div class="bg-orange h-2 rounded-full" style="width: {{ $analytics['duration_analysis']['medium'] }}%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-300">30+ days</span>
                        <div class="flex items-center space-x-2">
                            <span class="text-gray-100 font-semibold">{{ $analytics['duration_analysis']['long'] }}%</span>
                            <div class="w-16 bg-gray-700 rounded-full h-2">
                                <div class="bg-blue-500 h-2 rounded-full" style="width: {{ $analytics['duration_analysis']['long'] }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Customer Retention -->
            <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                <h3 class="text-lg font-semibold text-gray-100 mb-4">Customer Retention</h3>
                <div class="space-y-4">
                    <div class="text-center">
                        <p class="text-3xl font-bold text-orange">{{ number_format($analytics['retention_rate'], 1) }}%</p>
                        <p class="text-gray-400 text-sm">Returning customers</p>
                    </div>
                    <div class="space-y-2">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-300">New customers</span>
                            <span class="text-gray-100">{{ $analytics['new_customers'] }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-300">Returning customers</span>
                            <span class="text-gray-100">{{ $analytics['returning_customers'] }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Revenue Forecast -->
        <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
            <h3 class="text-xl font-semibold text-gray-100 mb-6">Revenue Forecast (Next 30 Days)</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="text-center">
                    <p class="text-3xl font-bold text-orange">₦{{ number_format($analytics['forecast']['optimistic']) }}</p>
                    <p class="text-gray-400 text-sm">Optimistic</p>
                </div>
                <div class="text-center">
                    <p class="text-3xl font-bold text-gray-100">₦{{ number_format($analytics['forecast']['realistic']) }}</p>
                    <p class="text-gray-400 text-sm">Realistic</p>
                </div>
                <div class="text-center">
                    <p class="text-3xl font-bold text-gray-300">₦{{ number_format($analytics['forecast']['pessimistic']) }}</p>
                    <p class="text-gray-400 text-sm">Pessimistic</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('timeRange').addEventListener('change', function() {
    const timeRange = this.value;
    // Reload page with new time range
    const url = new URL(window.location);
    url.searchParams.set('time_range', timeRange);
    window.location.href = url.toString();
});
</script>
@endsection
