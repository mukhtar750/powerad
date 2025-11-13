<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $billboard->title }} - DHOA Portal</title>
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
        .image-gallery {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            grid-template-rows: 1fr 1fr;
            gap: 8px;
            height: 400px;
            background: linear-gradient(135deg, #1E293B 0%, #334155 100%);
        }
        .main-image {
            grid-row: 1 / 3;
        }
        .availability-calendar {
            max-height: 300px;
            overflow-y: auto;
        }
        .booked-date {
            background-color: #fef3c7;
            color: #92400e;
        }
        .available-date {
            background-color: #d1fae5;
            color: #065f46;
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
                    <a href="{{ route('advertiser.discover') }}" class="text-gray-300 hover:text-orange px-3 py-2 rounded-md text-sm font-medium">
                        <i class="fas fa-arrow-left mr-1"></i> Back to Search
                    </a>
                    <a href="{{ route('dashboard.advertiser') }}" class="text-gray-300 hover:text-orange px-3 py-2 rounded-md text-sm font-medium">
                        <i class="fas fa-home mr-1"></i> Dashboard
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Breadcrumb -->
        <nav class="flex mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('advertiser.discover') }}" class="text-gray-300 hover:text-orange">
                        <i class="fas fa-home mr-2"></i>Billboards
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-500 mx-2"></i>
                        <span class="text-gray-400">{{ $billboard->title }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <!-- Image Gallery -->
                <div class="image-gallery mb-8 rounded-lg overflow-hidden">
                    @if($billboard->main_image)
                        <div class="main-image">
                            <img src="{{ $billboard->main_image_url }}" alt="{{ $billboard->title }}" 
                                 class="w-full h-full object-cover">
                        </div>
                    @endif
                    
                    @if($billboard->images && count($billboard->images) > 1)
                        @foreach(array_slice($billboard->images, 1, 4) as $index => $image)
                            <div class="overflow-hidden">
                                <img src="{{ asset('storage/' . $image) }}" alt="{{ $billboard->title }}" 
                                     class="w-full h-full object-cover hover:scale-105 transition-transform cursor-pointer">
                            </div>
                        @endforeach
                    @endif
                </div>

                <!-- Billboard Details -->
                <div class="bg-gray-800 rounded-lg shadow-md p-6 mb-8 border border-gray-700">
                    <h1 class="text-3xl font-bold text-gray-100 mb-4">{{ $billboard->title }}</h1>
                    
                    <!-- Location -->
                    <div class="flex items-center text-gray-300 mb-4">
                        <i class="fas fa-map-marker-alt mr-2 text-red-500"></i>
                        <span class="text-lg">{{ $billboard->location }}, {{ $billboard->city }}, {{ $billboard->state }}</span>
                    </div>

                    <!-- Description -->
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-100 mb-2">Description</h3>
                        <p class="text-gray-300 leading-relaxed">{{ $billboard->description }}</p>
                    </div>

                    <!-- Specifications -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                        <div class="text-center p-4 bg-gray-700 rounded-lg border border-gray-600">
                            <i class="fas fa-tag text-blue-400 text-2xl mb-2"></i>
                            <div class="font-semibold text-gray-100">{{ $billboard->type }}</div>
                            <div class="text-sm text-gray-400">Type</div>
                        </div>
                        <div class="text-center p-4 bg-gray-700 rounded-lg border border-gray-600">
                            <i class="fas fa-expand-arrows-alt text-green-400 text-2xl mb-2"></i>
                            <div class="font-semibold text-gray-100">{{ $billboard->size }}</div>
                            <div class="text-sm text-gray-400">Size</div>
                        </div>
                        <div class="text-center p-4 bg-gray-700 rounded-lg border border-gray-600">
                            <i class="fas fa-mobile-alt text-purple-400 text-2xl mb-2"></i>
                            <div class="font-semibold text-gray-100">{{ $billboard->orientation }}</div>
                            <div class="text-sm text-gray-400">Orientation</div>
                        </div>
                        <div class="text-center p-4 bg-gray-700 rounded-lg border border-gray-600">
                            <i class="fas fa-check-circle text-green-400 text-2xl mb-2"></i>
                            <div class="font-semibold text-gray-100">Verified</div>
                            <div class="text-sm text-gray-400">Status</div>
                        </div>
                    </div>

                    <!-- Features -->
                    @if($billboard->features && count($billboard->features) > 0)
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-100 mb-3">Features</h3>
                            <div class="flex flex-wrap gap-2">
                                @foreach($billboard->features as $feature)
                                    <span class="bg-blue-900 text-blue-200 px-3 py-1 rounded-full text-sm border border-blue-700">
                                        <i class="fas fa-check mr-1"></i>{{ $feature }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Owner Information -->
                    <div class="border-t border-gray-600 pt-6">
                        <h3 class="text-lg font-semibold text-gray-100 mb-3">Billboard Owner</h3>
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gray-600 rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-user text-gray-300"></i>
                            </div>
                            <div>
                                <div class="font-semibold text-gray-100">{{ $billboard->user->name }}</div>
                                <div class="text-sm text-gray-400">{{ $billboard->user->email }}</div>
                                @if($billboard->user->company)
                                    <div class="text-sm text-gray-400">{{ $billboard->user->company }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Similar Billboards -->
                @if($similarBillboards->count() > 0)
                    <div class="bg-gray-800 rounded-lg shadow-md p-6 border border-gray-700">
                        <h3 class="text-xl font-semibold text-gray-100 mb-4">Similar Billboards</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach($similarBillboards as $similar)
                                <div class="border border-gray-600 rounded-lg p-4 hover:shadow-md transition-shadow bg-gray-700">
                                    <div class="flex">
                                        <div class="w-20 h-20 bg-gray-600 rounded-lg mr-4 flex-shrink-0">
                                            @if($similar->main_image)
                                                <img src="{{ $similar->main_image_url }}" alt="{{ $similar->title }}" 
                                                     class="w-full h-full object-cover rounded-lg">
                                            @else
                                                <div class="flex items-center justify-center h-full text-gray-400">
                                                    <i class="fas fa-image"></i>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="flex-1">
                                            <h4 class="font-semibold text-gray-100 mb-1">{{ $similar->title }}</h4>
                                            <p class="text-sm text-gray-300 mb-2">{{ $similar->location }}, {{ $similar->city }}</p>
                                            <div class="flex justify-between items-center">
                                                <span class="font-bold text-green-400">₦{{ number_format($similar->price_per_day) }}/day</span>
                                                <a href="{{ route('advertiser.billboard.show', $similar) }}" 
                                                   class="text-orange hover:text-orange-300 text-sm">
                                                    View <i class="fas fa-arrow-right ml-1"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            <!-- Booking Sidebar -->
            <div class="lg:col-span-1">
                <!-- Pricing Card -->
                <div class="bg-gray-800 rounded-lg shadow-md p-6 mb-6 sticky top-8 border border-gray-700">
                    <div class="text-center mb-6">
                        <div class="text-3xl font-bold text-gray-100 mb-2">₦{{ number_format($billboard->price_per_day) }}</div>
                        <div class="text-gray-400">per day</div>
                    </div>

                    <!-- Date Selection -->
                    <form id="booking-form">
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-300 mb-2">Campaign Start Date</label>
                            <input type="date" name="start_date" id="start_date" 
                                   class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-gray-100 focus:outline-none focus:ring-2 focus:ring-orange focus:border-orange" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-300 mb-2">Campaign End Date</label>
                            <input type="date" name="end_date" id="end_date" 
                                   class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-gray-100 focus:outline-none focus:ring-2 focus:ring-orange focus:border-orange" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-300 mb-2">Email Address</label>
                            <input type="email" name="email" id="email" 
                                   class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-gray-100 focus:outline-none focus:ring-2 focus:ring-orange focus:border-orange" 
                                   placeholder="your@email.com" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-300 mb-2">Campaign Details (Optional)</label>
                            <textarea name="campaign_details" id="campaign_details" rows="3" 
                                      class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-gray-100 focus:outline-none focus:ring-2 focus:ring-orange focus:border-orange" 
                                      placeholder="Describe your campaign..."></textarea>
                        </div>

                        <!-- Pricing Breakdown -->
                        <div id="pricing-breakdown" class="mb-6 p-4 bg-gray-700 rounded-lg border border-gray-600" style="display: none;">
                            <h4 class="font-semibold text-gray-100 mb-3">Pricing Breakdown</h4>
                            <div class="space-y-2 text-sm">
                                <div class="flex justify-between">
                                    <span class="text-gray-300">Duration:</span>
                                    <span id="duration-days" class="text-gray-100">0 days</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-300">Daily Rate:</span>
                                    <span class="text-gray-100">₦{{ number_format($billboard->price_per_day) }}</span>
                                </div>
                                <div class="flex justify-between font-semibold">
                                    <span class="text-gray-300">Total Amount:</span>
                                    <span id="total-amount" class="text-gray-100">₦0</span>
                                </div>
                                <div class="border-t border-gray-600 pt-2">
                                    <div class="flex justify-between text-orange-400">
                                        <span>Platform Commission (10%):</span>
                                        <span id="company-commission">₦0</span>
                                    </div>
                                    <div class="flex justify-between text-blue-400">
                                        <span>Owner Earnings (90%):</span>
                                        <span id="loap-amount">₦0</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Availability Status -->
                        <div id="availability-status" class="mb-4 p-3 rounded-lg text-center" style="display: none;">
                            <div id="availability-message" class="font-medium"></div>
                        </div>

                        <button type="submit" id="book-button" 
                                class="w-full bg-orange text-white py-3 px-4 rounded-md font-medium hover:bg-orange-600 transition-colors disabled:bg-gray-600 disabled:cursor-not-allowed">
                            <i class="fas fa-calendar-plus mr-2"></i> Book This Billboard
                        </button>
                    </form>
                </div>

                <!-- Availability Calendar -->
                <div class="bg-gray-800 rounded-lg shadow-md p-6 border border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-100 mb-4">Availability Calendar</h3>
                    <div class="availability-calendar">
                        <div class="grid grid-cols-7 gap-1 text-xs">
                            <div class="text-center font-medium text-gray-400 py-2">S</div>
                            <div class="text-center font-medium text-gray-400 py-2">M</div>
                            <div class="text-center font-medium text-gray-400 py-2">T</div>
                            <div class="text-center font-medium text-gray-400 py-2">W</div>
                            <div class="text-center font-medium text-gray-400 py-2">T</div>
                            <div class="text-center font-medium text-gray-400 py-2">F</div>
                            <div class="text-center font-medium text-gray-400 py-2">S</div>
                            
                            @php
                                $today = now();
                                $startOfMonth = $today->copy()->startOfMonth();
                                $endOfMonth = $today->copy()->endOfMonth();
                                $bookedDates = $billboard->bookings->pluck('start_date')->map(function($date) {
                                    return \Carbon\Carbon::parse($date)->format('Y-m-d');
                                })->toArray();
                            @endphp
                            
                            @for($i = 0; $i < $startOfMonth->dayOfWeek; $i++)
                                <div class="py-2"></div>
                            @endfor
                            
                            @for($date = $startOfMonth->copy(); $date->lte($endOfMonth); $date->addDay())
                                @php
                                    $isBooked = in_array($date->format('Y-m-d'), $bookedDates);
                                    $isPast = $date->lt($today);
                                @endphp
                                <div class="py-2 text-center {{ $isBooked ? 'booked-date' : ($isPast ? 'text-gray-300' : 'available-date') }}">
                                    {{ $date->day }}
                                </div>
                            @endfor
                        </div>
                    </div>
                    <div class="mt-4 flex items-center justify-center space-x-4 text-xs">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-green-200 rounded mr-2"></div>
                            <span>Available</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-yellow-200 rounded mr-2"></div>
                            <span>Booked</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Paystack Script -->
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script src="/js/paystack-integration.js"></script>
    
    <script>
        // Set minimum date to tomorrow
        const tomorrow = new Date();
        tomorrow.setDate(tomorrow.getDate() + 1);
        document.getElementById('start_date').min = tomorrow.toISOString().split('T')[0];

        // Update end date minimum when start date changes
        document.getElementById('start_date').addEventListener('change', function() {
            const startDate = new Date(this.value);
            startDate.setDate(startDate.getDate() + 1);
            document.getElementById('end_date').min = startDate.toISOString().split('T')[0];
            checkAvailability();
        });

        document.getElementById('end_date').addEventListener('change', function() {
            checkAvailability();
        });

        // Check availability and calculate pricing
        async function checkAvailability() {
            const startDate = document.getElementById('start_date').value;
            const endDate = document.getElementById('end_date').value;
            
            if (!startDate || !endDate) {
                document.getElementById('pricing-breakdown').style.display = 'none';
                document.getElementById('availability-status').style.display = 'none';
                return;
            }

            try {
                const response = await fetch(`/dashboard/advertiser/billboards/{{ $billboard->id }}/check-availability`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ start_date: startDate, end_date: endDate })
                });

                const data = await response.json();
                
                // Update pricing breakdown
                document.getElementById('duration-days').textContent = data.duration_days + ' days';
                document.getElementById('total-amount').textContent = '₦' + data.total_amount.toLocaleString();
                document.getElementById('company-commission').textContent = '₦' + data.company_commission.toLocaleString();
                document.getElementById('loap-amount').textContent = '₦' + data.loap_amount.toLocaleString();
                document.getElementById('pricing-breakdown').style.display = 'block';

                // Update availability status
                const statusDiv = document.getElementById('availability-status');
                const messageDiv = document.getElementById('availability-message');
                const bookButton = document.getElementById('book-button');
                
                if (data.available) {
                    statusDiv.className = 'mb-4 p-3 rounded-lg text-center bg-green-100 border border-green-200';
                    messageDiv.innerHTML = '<i class="fas fa-check-circle text-green-600 mr-2"></i>Available for selected dates';
                    bookButton.disabled = false;
                } else {
                    statusDiv.className = 'mb-4 p-3 rounded-lg text-center bg-red-100 border border-red-200';
                    messageDiv.innerHTML = '<i class="fas fa-times-circle text-red-600 mr-2"></i>Not available for selected dates';
                    bookButton.disabled = true;
                }
                statusDiv.style.display = 'block';

            } catch (error) {
                console.error('Error checking availability:', error);
            }
        }

        // Initialize Paystack when page loads
        let paystack;
        document.addEventListener('DOMContentLoaded', function() {
            const initPaystack = () => {
                if (window.PaystackPop) {
                    paystack = new PaystackIntegration('{{ config('services.paystack.public_key') }}');
                    console.log('Paystack initialized successfully');
                } else {
                    setTimeout(initPaystack, 100);
                }
            };
            initPaystack();
        });

        // Handle form submission
        document.getElementById('booking-form').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const paymentData = {
                billboard_id: {{ $billboard->id }},
                email: formData.get('email'),
                start_date: formData.get('start_date'),
                end_date: formData.get('end_date'),
                campaign_details: formData.get('campaign_details')
            };

            try {
                const result = await paystack.initializePayment(paymentData);
                console.log('Payment initialized:', result);
            } catch (error) {
                console.error('Payment failed:', error);
            }
        });
    </script>
</body>
</html>
