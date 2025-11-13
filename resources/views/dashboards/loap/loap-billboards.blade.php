<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Billboards - LOAP Dashboard</title>
    <link rel="stylesheet" href="{{ asset('build/assets/app-BdhG_vQw.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&display=swap" rel="stylesheet">
    <style>
        .font-orbitron { font-family: 'Orbitron', monospace; }
        .logo-container { display: flex; align-items: center; }
        .footer-logo-container { display: flex; align-items: center; }
    </style>
</head>
<body class="antialiased bg-[#0E0D1C] text-gray-100 font-sans">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-[#15132B] p-6 space-y-6 flex flex-col justify-between shadow-lg">
            <div>
                <!-- Logo Section -->
                <div class="flex items-center space-x-3 mb-6">
                    <div class="flex">
                        <img src="{{ asset('images/primarylogo.png') }}" 
                             alt="PowerAD International Logo" 
                             class="h-8 w-auto">
                    </div>
                    <div>
                        <div class="text-orange text-sm font-medium">LOAP</div>
                    </div>
                </div>
                <nav>
                    <a href="/dashboard/loap" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">
                        <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        Dashboard
                    </a>
                    <a href="/dashboard/loap/billboards" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2 bg-gray-700">
                        <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        My Billboards
                    </a>
                           <a href="/dashboard/loap/bookings" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">
                               <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                               Bookings
                           </a>
                           
                       <a href="/dashboard/loap/revenue" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">
                           <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                           Revenue
                       </a>
                    <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">
                        <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.329 1.176l1.519 4.674c.3.921-.755 1.688-1.539 1.175l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.784.513-1.838-.254-1.539-1.175l1.519-4.674a1 1 0 00-.329-1.176l-3.976-2.888c-.784-.57-.382-1.81.588-1.81h4.915a1 1 0 00.95-.69l1.519-4.674z"></path></svg>
                        Reviews
                    </a>
                    <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">
                        <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                        Messages
                    </a>
                    <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">
                        <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        Settings
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
            
            <header class="flex flex-col md:flex-row justify-between items-start md:items-center pb-6 border-b border-gray-700 mb-6">
                <div class="mb-4 md:mb-0">
                    <h1 class="text-2xl md:text-3xl font-bold text-white font-orbitron">My Billboards</h1>
                    <p class="text-gray-400 text-sm md:text-base">Manage your billboard inventory and track performance.</p>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('loap.billboards.create') }}" class="bg-orange hover:bg-orange/90 text-white font-bold py-2 px-4 rounded-lg flex items-center text-sm md:text-base transition-colors">
                        <svg class="w-4 h-4 md:w-5 md:h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Add Billboard
                    </a>
                </div>
            </header>

            <!-- Summary Statistics Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 mb-6">
                <!-- Total Billboards Card -->
                <div class="bg-[#15132B] p-4 md:p-5 rounded-lg shadow-lg border border-gray-700">
                    <div class="flex items-center justify-between mb-3">
                        <div>
                            <p class="text-sm text-gray-400 font-medium">Total Billboards</p>
                            <h3 class="text-xl md:text-2xl font-bold text-orange">{{ $billboards->total() }}</h3>
                            <p class="text-xs text-green-400">{{ $billboards->where('created_at', '>=', now()->startOfMonth())->count() }} this month</p>
                        </div>
                        <div class="w-12 h-12 bg-orange/20 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Occupied Billboards Card -->
                <div class="bg-[#15132B] p-4 md:p-5 rounded-lg shadow-lg border border-gray-700">
                    <div class="flex items-center justify-between mb-3">
                        <div>
                            <p class="text-sm text-gray-400 font-medium">Occupied</p>
                            <h3 class="text-xl md:text-2xl font-bold text-green-400">18</h3>
                            <p class="text-xs text-green-400">75% occupancy</p>
                        </div>
                        <div class="w-12 h-12 bg-green-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Available Billboards Card -->
                <div class="bg-[#15132B] p-4 md:p-5 rounded-lg shadow-lg border border-gray-700">
                    <div class="flex items-center justify-between mb-3">
                        <div>
                            <p class="text-sm text-gray-400 font-medium">Available</p>
                            <h3 class="text-xl md:text-2xl font-bold text-blue-400">4</h3>
                            <p class="text-xs text-blue-400">Ready to book</p>
                        </div>
                        <div class="w-12 h-12 bg-blue-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Maintenance Card -->
                <div class="bg-[#15132B] p-4 md:p-5 rounded-lg shadow-lg border border-gray-700">
                    <div class="flex items-center justify-between mb-3">
                        <div>
                            <p class="text-sm text-gray-400 font-medium">Maintenance</p>
                            <h3 class="text-xl md:text-2xl font-bold text-yellow-400">2</h3>
                            <p class="text-xs text-yellow-400">Under repair</p>
                        </div>
                        <div class="w-12 h-12 bg-yellow-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Search and Filter Section -->
            <div class="flex flex-col sm:flex-row gap-4 mb-6">
                <div class="flex-1 relative">
                    <input type="text" 
                           placeholder="Search billboards by name, location, or status..." 
                           class="w-full pl-10 pr-4 py-3 bg-[#15132B] border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                    <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <div class="flex gap-2 flex-shrink-0">
                    <button class="px-4 py-3 bg-[#15132B] border border-gray-600 rounded-lg text-gray-300 hover:bg-gray-700 transition-colors flex items-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.707A1 1 0 013 7V4z"></path>
                        </svg>
                        <span class="ml-2 hidden sm:inline">Filter</span>
                    </button>
                    <select class="px-4 py-3 bg-[#15132B] border border-gray-600 rounded-lg text-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 min-w-[120px]">
                        <option>All Status</option>
                        <option>Available</option>
                        <option>Booked</option>
                        <option>Maintenance</option>
                    </select>
                </div>
            </div>

            <!-- Billboard Cards -->
            <div class="space-y-4 md:space-y-6">
                @if($billboards->count() > 0)
                    @foreach($billboards as $billboard)
                        <!-- Billboard Card -->
                <div class="bg-[#15132B] rounded-lg shadow-lg border border-gray-700 overflow-hidden">
                    <div class="p-6">
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                            <!-- Left Column - Image and Basic Info -->
                            <div class="lg:col-span-1">
                                <div class="w-full h-48 bg-gray-700 rounded-lg flex items-center justify-center mb-4">
                                    @if($billboard->main_image)
                                        <img src="{{ asset('storage/' . $billboard->main_image) }}" alt="{{ $billboard->title }}" class="w-full h-full object-cover rounded-lg">
                                    @else
                                        <svg class="w-16 h-16 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    @endif
                                </div>
                                <div class="text-center">
                                    <h3 class="text-xl font-bold text-white mb-2">{{ $billboard->title }}</h3>
                                    <div class="flex items-center justify-center mb-3">
                                        <svg class="w-4 h-4 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        <span class="text-gray-400 text-sm">{{ $billboard->city }}, {{ $billboard->state }}</span>
                                    </div>
                                    <span class="inline-block px-4 py-2 
                                        @if($billboard->status == 'available') bg-green-500/20 text-green-400
                                        @elseif($billboard->status == 'booked') bg-blue-500/20 text-blue-400
                                        @elseif($billboard->status == 'maintenance') bg-yellow-500/20 text-yellow-400
                                        @else bg-gray-500/20 text-gray-400
                                        @endif text-sm font-medium rounded-full">{{ $billboard->status }}</span>
                                </div>
                            </div>
                            
                            <!-- Middle Column - Detailed Specifications -->
                            <div class="lg:col-span-1 space-y-4">
                                <div>
                                    <p class="text-gray-400 text-sm mb-1">Size & Type</p>
                                    <p class="text-white font-medium">{{ $billboard->size }}</p>
                                    <p class="text-gray-300 text-sm">{{ $billboard->type }} Billboard</p>
                                </div>
                                
                                <div>
                                    <p class="text-gray-400 text-sm mb-1">Orientation</p>
                                    <p class="text-white font-medium">{{ $billboard->orientation }}</p>
                                </div>
                                
                                <div>
                                    <p class="text-gray-400 text-sm mb-1">Created</p>
                                    <p class="text-white font-medium">{{ $billboard->created_at->format('M d, Y') }}</p>
                                </div>
                                
                                <div>
                                    <p class="text-gray-400 text-sm mb-1">Location</p>
                                    <p class="text-white font-medium">{{ $billboard->location }}</p>
                                    <p class="text-gray-300 text-sm">{{ $billboard->address }}</p>
                                </div>
                                
                                <div>
                                    <div class="flex justify-between items-center mb-2">
                                        <span class="text-gray-400 text-sm">Occupancy Rate (12 months)</span>
                                        <span class="text-white font-medium">85%</span>
                                    </div>
                                    <div class="w-full bg-gray-700 rounded-full h-2">
                                        <div class="bg-orange h-2 rounded-full" style="width: 85%"></div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Right Column - Financial Info and Actions -->
                            <div class="lg:col-span-1">
                                <div class="space-y-4 mb-6">
                                    <div>
                                        <p class="text-gray-400 text-sm mb-1">Monthly Rate</p>
                                        <p class="text-white font-bold text-xl">₦{{ number_format($billboard->price_per_month) }}</p>
                                    </div>
                                    
                                    <div>
                                        <p class="text-gray-400 text-sm mb-1">Weekly Rate</p>
                                        <p class="text-white font-bold text-lg">₦{{ number_format($billboard->price_per_week) }}</p>
                                    </div>
                                    
                                    <div>
                                        <p class="text-gray-400 text-sm mb-1">Daily Rate</p>
                                        <p class="text-white font-medium">₦{{ number_format($billboard->price_per_day) }}</p>
                                    </div>
                                </div>
                                
                                <!-- Action Menu -->
                                <div class="space-y-2">
                                    <button class="w-full flex items-center px-4 py-2 text-left text-gray-300 hover:text-white hover:bg-gray-700 rounded-lg transition-colors">
                                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        View Details
                                    </button>
                                    
                                    <button class="w-full flex items-center px-4 py-2 text-left text-gray-300 hover:text-white hover:bg-gray-700 rounded-lg transition-colors">
                                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                        Edit Billboard
                                    </button>
                                    
                                    <button class="w-full flex items-center px-4 py-2 text-left text-gray-300 hover:text-white hover:bg-gray-700 rounded-lg transition-colors">
                                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        View Calendar
                                    </button>
                                    
                                    <button class="w-full flex items-center px-4 py-2 text-left text-gray-300 hover:text-white hover:bg-gray-700 rounded-lg transition-colors">
                                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                        </svg>
                                        Update Images
                                    </button>
                                    
                                    <button class="w-full flex items-center px-4 py-2 text-left text-gray-300 hover:text-white hover:bg-gray-700 rounded-lg transition-colors">
                                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                        </svg>
                                        Settings
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Billboard Card 2 -->
                <div class="bg-[#15132B] rounded-lg shadow-lg border border-gray-700 overflow-hidden">
                    <div class="p-6">
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                            <!-- Left Column - Image and Basic Info -->
                            <div class="lg:col-span-1">
                                <div class="w-full h-48 bg-gray-700 rounded-lg flex items-center justify-center mb-4">
                                    <svg class="w-16 h-16 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div class="text-center">
                                    <h3 class="text-xl font-bold text-white mb-2">Ikeja City Center</h3>
                                    <div class="flex items-center justify-center mb-3">
                                        <svg class="w-4 h-4 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        <span class="text-gray-400 text-sm">Ikeja, Lagos</span>
                                    </div>
                                    <span class="inline-block px-4 py-2 bg-blue-500/20 text-blue-400 text-sm font-medium rounded-full">available</span>
                                </div>
                            </div>
                            
                            <!-- Middle Column - Detailed Specifications -->
                            <div class="lg:col-span-1 space-y-4">
                                <div>
                                    <p class="text-gray-400 text-sm mb-1">Size & Type</p>
                                    <p class="text-white font-medium">32 Sheet (4m x 2.5m)</p>
                                    <p class="text-gray-300 text-sm">Digital Billboard</p>
                                </div>
                                
                                <div>
                                    <p class="text-gray-400 text-sm mb-1">Condition</p>
                                    <p class="text-green-400 font-medium">excellent</p>
                                </div>
                                
                                <div>
                                    <p class="text-gray-400 text-sm mb-1">Last maintenance</p>
                                    <p class="text-white font-medium">Jul 28, 2024</p>
                                </div>
                                
                                <div>
                                    <p class="text-gray-400 text-sm mb-1">Current</p>
                                    <p class="text-gray-500 font-medium">No active campaign</p>
                                </div>
                                
                                <div>
                                    <div class="flex justify-between items-center mb-2">
                                        <span class="text-gray-400 text-sm">Occupancy Rate (12 months)</span>
                                        <span class="text-white font-medium">68%</span>
                                    </div>
                                    <div class="w-full bg-gray-700 rounded-full h-2">
                                        <div class="bg-orange h-2 rounded-full" style="width: 68%"></div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Right Column - Financial Info and Actions -->
                            <div class="lg:col-span-1">
                                <div class="space-y-4 mb-6">
                                    <div>
                                        <p class="text-gray-400 text-sm mb-1">Monthly Rate</p>
                                        <p class="text-white font-bold text-xl">₦650,000</p>
                                    </div>
                                    
                                    <div>
                                        <p class="text-gray-400 text-sm mb-1">Total Revenue</p>
                                        <p class="text-white font-bold text-xl">₦5,200,000</p>
                                    </div>
                                    
                                    <div>
                                        <p class="text-gray-400 text-sm mb-1">Next Available</p>
                                        <p class="text-green-400 font-medium">Now</p>
                                    </div>
                                </div>
                                
                                <!-- Action Menu -->
                                <div class="space-y-2">
                                    <button class="w-full flex items-center px-4 py-2 text-left text-gray-300 hover:text-white hover:bg-gray-700 rounded-lg transition-colors">
                                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        View Details
                                    </button>
                                    
                                    <button class="w-full flex items-center px-4 py-2 text-left text-gray-300 hover:text-white hover:bg-gray-700 rounded-lg transition-colors">
                                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                        Edit Billboard
                                    </button>
                                    
                                    <button class="w-full flex items-center px-4 py-2 text-left text-gray-300 hover:text-white hover:bg-gray-700 rounded-lg transition-colors">
                                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        View Calendar
                                    </button>
                                    
                                    <button class="w-full flex items-center px-4 py-2 text-left text-gray-300 hover:text-white hover:bg-gray-700 rounded-lg transition-colors">
                                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                        </svg>
                                        Update Images
                                    </button>
                                    
                                    <button class="w-full flex items-center px-4 py-2 text-left text-gray-300 hover:text-white hover:bg-gray-700 rounded-lg transition-colors">
                                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                        </svg>
                                        Settings
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Billboard Card 3 -->
                <div class="bg-[#15132B] rounded-lg shadow-lg border border-gray-700 overflow-hidden">
                    <div class="p-6">
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                            <!-- Left Column - Image and Basic Info -->
                            <div class="lg:col-span-1">
                                <div class="w-full h-48 bg-gray-700 rounded-lg flex items-center justify-center mb-4">
                                    <svg class="w-16 h-16 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div class="text-center">
                                    <h3 class="text-xl font-bold text-white mb-2">Lekki Expressway</h3>
                                    <div class="flex items-center justify-center mb-3">
                                        <svg class="w-4 h-4 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        <span class="text-gray-400 text-sm">Lekki, Lagos</span>
                                    </div>
                                    <span class="inline-block px-4 py-2 bg-yellow-500/20 text-yellow-400 text-sm font-medium rounded-full">maintenance</span>
                                </div>
                            </div>
                            
                            <!-- Middle Column - Detailed Specifications -->
                            <div class="lg:col-span-1 space-y-4">
                                <div>
                                    <p class="text-gray-400 text-sm mb-1">Size & Type</p>
                                    <p class="text-white font-medium">64 Sheet (8m x 4m)</p>
                                    <p class="text-gray-300 text-sm">Static Billboard</p>
                                </div>
                                
                                <div>
                                    <p class="text-gray-400 text-sm mb-1">Condition</p>
                                    <p class="text-yellow-400 font-medium">needs repair</p>
                                </div>
                                
                                <div>
                                    <p class="text-gray-400 text-sm mb-1">Last maintenance</p>
                                    <p class="text-white font-medium">Jun 15, 2024</p>
                                </div>
                                
                                <div>
                                    <p class="text-gray-400 text-sm mb-1">Current</p>
                                    <p class="text-gray-500 font-medium">Under maintenance - LED panel replacement</p>
                                </div>
                                
                                <div>
                                    <div class="flex justify-between items-center mb-2">
                                        <span class="text-gray-400 text-sm">Occupancy Rate (12 months)</span>
                                        <span class="text-white font-medium">92%</span>
                                    </div>
                                    <div class="w-full bg-gray-700 rounded-full h-2">
                                        <div class="bg-orange h-2 rounded-full" style="width: 92%"></div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Right Column - Financial Info and Actions -->
                            <div class="lg:col-span-1">
                                <div class="space-y-4 mb-6">
                                    <div>
                                        <p class="text-gray-400 text-sm mb-1">Monthly Rate</p>
                                        <p class="text-white font-bold text-xl">₦1,200,000</p>
                                    </div>
                                    
                                    <div>
                                        <p class="text-gray-400 text-sm mb-1">Total Revenue</p>
                                        <p class="text-white font-bold text-xl">₦11,040,000</p>
                                    </div>
                                    
                                    <div>
                                        <p class="text-gray-400 text-sm mb-1">Next Available</p>
                                        <p class="text-yellow-400 font-medium">Sep 5, 2024</p>
                                    </div>
                                </div>
                                
                                <!-- Action Menu -->
                                <div class="space-y-2">
                                    <button class="w-full flex items-center px-4 py-2 text-left text-gray-300 hover:text-white hover:bg-gray-700 rounded-lg transition-colors">
                                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        View Details
                                    </button>
                                    
                                    <button class="w-full flex items-center px-4 py-2 text-left text-gray-300 hover:text-white hover:bg-gray-700 rounded-lg transition-colors">
                                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                        Edit Billboard
                                    </button>
                                    
                                    <button class="w-full flex items-center px-4 py-2 text-left text-gray-300 hover:text-white hover:bg-gray-700 rounded-lg transition-colors">
                                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        View Calendar
                                    </button>
                                    
                                    <button class="w-full flex items-center px-4 py-2 text-left text-gray-300 hover:text-white hover:bg-gray-700 rounded-lg transition-colors">
                                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                        </svg>
                                        Update Images
                                    </button>
                                    
                                    <button class="w-full flex items-center px-4 py-2 text-left text-gray-300 hover:text-white hover:bg-gray-700 rounded-lg transition-colors">
                                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                        </svg>
                                        Settings
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    @endforeach
                @else
                    <!-- No Billboards Message -->
                    <div class="bg-[#15132B] rounded-lg p-8 text-center">
                        <svg class="w-16 h-16 text-gray-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                        <h3 class="text-xl font-semibold text-white mb-2">No Billboards Yet</h3>
                        <p class="text-gray-400 mb-6">Start by adding your first billboard to begin earning revenue.</p>
                        <a href="{{ route('loap.billboards.create') }}" class="inline-flex items-center px-6 py-3 bg-orange-600 hover:bg-orange-700 text-white rounded-lg transition-colors">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Add Your First Billboard
                        </a>
                    </div>
                @endif
            </div>

            <!-- Pagination -->
            @if($billboards->hasPages())
                <div class="mt-8">
                    {{ $billboards->links() }}
                </div>
            @endif
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const mobileSidebar = document.getElementById('mobile-sidebar');
            const mobileSidebarOverlay = document.getElementById('mobile-sidebar-overlay');

            function toggleMobileSidebar() {
                mobileSidebar.classList.toggle('-translate-x-full');
                mobileSidebarOverlay.classList.toggle('hidden');
            }

            function closeMobileSidebar() {
                mobileSidebar.classList.add('-translate-x-full');
                mobileSidebarOverlay.classList.add('hidden');
            }

            if (mobileMenuBtn) {
                mobileMenuBtn.addEventListener('click', toggleMobileSidebar);
            }

            if (mobileSidebarOverlay) {
                mobileSidebarOverlay.addEventListener('click', closeMobileSidebar);
            }

            const mobileNavLinks = mobileSidebar.querySelectorAll('a');
            mobileNavLinks.forEach(link => {
                link.addEventListener('click', closeMobileSidebar);
            });

            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    closeMobileSidebar();
                }
            });
        });
    </script>
</body>
</html>