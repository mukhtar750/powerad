<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PowerAD Portal - Advertiser Dashboard</title>
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
                        <div class="text-orange text-sm font-medium">Advertiser</div>
                    </div>
                </div>
                <nav>
                    <a href="/dashboard/advertiser" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2 bg-gray-700">
                        <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                        </svg>
                        Dashboard
                    </a>
                    <a href="{{ route('advertiser.discover') }}" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">
                        <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        Browse Billboards
                    </a>
                    <a href="{{ route('dashboard.advertiser.my-campaigns') }}" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">
                        <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M12 15h.01"></path>
                        </svg>
                        My Campaigns
                    </a>
                    <a href="{{ route('dashboard.advertiser.payments') }}" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">
                        <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                        </svg>
                        Payments
                    </a>
                    <a href="{{ route('dashboard.advertiser.analytics') }}" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">
                        <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        Analytics
                    </a>
                    <a href="{{ route('dashboard.advertiser.messages') }}" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">
                        <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                        Messages
                    </a>
                    <a href="{{ route('dashboard.advertiser.settings') }}" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">
                        <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        Settings
                    </a>
                </nav>
            </div>
            <div class="flex items-center">
                <div class="w-10 h-10 bg-gradient-to-r from-orange to-yellow rounded-full mr-3 flex items-center justify-center">
                    <span class="text-white font-bold text-sm">AD</span>
                </div>
                <div>
                    <div class="font-bold">Advertiser</div>
                    <div class="text-sm text-gray-400">Premium</div>
                </div>
            </div>
            <form action="/logout" method="POST" class="mt-6">
                @csrf
                <button type="submit" class="block py-2 px-4 rounded hover:bg-gray-700 w-full text-left">
                    <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
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
                    <h1 class="text-2xl md:text-3xl font-bold text-white font-orbitron">Campaign Performance</h1>
                    <p class="text-gray-400 text-sm md:text-base">Track and optimize your advertising campaigns</p>
                </div>
                <div class="flex items-center space-x-4">
                    <button class="p-2 rounded-full hover:bg-gray-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 01-3 3H9a3 3 0 01-3-3v-1m6-10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </button>
                    <div class="w-10 h-10 bg-gradient-to-r from-orange to-yellow rounded-full flex items-center justify-center">
                        <span class="text-white font-bold text-sm">AD</span>
                    </div>
                </div>
            </header>

            <!-- Summary Statistics Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 mb-6">
                <!-- Active Campaigns Card -->
                <div class="bg-[#15132B] p-4 md:p-5 rounded-lg shadow-lg border border-gray-700">
                    <div class="flex items-center justify-between mb-3">
                        <div>
                            <p class="text-sm text-gray-400 font-medium">Active Campaigns</p>
                            <h3 class="text-xl md:text-2xl font-bold text-orange">8</h3>
                            <p class="text-xs text-green-400">+2 this month</p>
                        </div>
                        <div class="w-12 h-12 bg-orange/20 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M12 15h.01"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Total Spent Card -->
                <div class="bg-[#15132B] p-4 md:p-5 rounded-lg shadow-lg border border-gray-700">
                    <div class="flex items-center justify-between mb-3">
                        <div>
                            <p class="text-sm text-gray-400 font-medium">Total Spent</p>
                            <h3 class="text-xl md:text-2xl font-bold text-white">₦2.4M</h3>
                            <p class="text-xs text-green-400">+15% from last month</p>
                        </div>
                        <div class="w-12 h-12 bg-green-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V3m0 9v3m0-3c-1.11 0-2.08-.402-2.599-1M12 12H9m3 0h3m-6 4h2m-2 4h2m4-4h2m-2 4h2m-6 0H6a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v2"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Impressions Card -->
                <div class="bg-[#15132B] p-4 md:p-5 rounded-lg shadow-lg border border-gray-700">
                    <div class="flex items-center justify-between mb-3">
                        <div>
                            <p class="text-sm text-gray-400 font-medium">Impressions</p>
                            <h3 class="text-xl md:text-2xl font-bold text-white">1.2M</h3>
                            <p class="text-xs text-green-400">+8% from last month</p>
                        </div>
                        <div class="w-12 h-12 bg-blue-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- ROAS Card -->
                <div class="bg-[#15132B] p-4 md:p-5 rounded-lg shadow-lg border border-gray-700">
                    <div class="flex items-center justify-between mb-3">
                        <div>
                            <p class="text-sm text-gray-400 font-medium">ROAS</p>
                            <h3 class="text-xl md:text-2xl font-bold text-white">4.2x</h3>
                            <p class="text-xs text-green-400">+0.3 from last month</p>
                        </div>
                        <div class="w-12 h-12 bg-purple-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 xl:grid-cols-3 gap-4 md:gap-6">
                <!-- Campaign Performance Section -->
                <div class="xl:col-span-2 bg-[#15132B] p-4 md:p-6 rounded-lg shadow-lg border border-gray-700">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4">
                        <div class="mb-3 sm:mb-0">
                            <h2 class="text-lg md:text-xl font-bold text-white font-orbitron">Campaign Performance</h2>
                            <p class="text-gray-400 text-sm">Monitor your active advertising campaigns</p>
                        </div>
                        <button class="bg-orange hover:bg-orange/90 text-white font-bold py-2 px-4 rounded-lg flex items-center text-sm md:text-base transition-colors">
                            <svg class="w-4 h-4 md:w-5 md:h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            New Campaign
                        </button>
                    </div>

                    <!-- Campaign Card 1 -->
                    <div class="bg-[#0E0D1C] p-4 rounded-lg mb-4 border border-gray-700">
                        <div class="flex justify-between items-center mb-3">
                            <div>
                                <h3 class="font-bold text-lg text-white">Summer Collection 2024</h3>
                                <p class="text-sm text-gray-400">Fashion & Lifestyle</p>
                            </div>
                            <span class="bg-green-500 text-white text-xs font-bold px-2 py-1 rounded-full">Active</span>
                        </div>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-sm mb-4">
                            <div>
                                <p class="text-gray-400">Budget</p>
                                <p class="font-bold text-white">₦500,000</p>
                            </div>
                            <div>
                                <p class="text-gray-400">Spent</p>
                                <p class="font-bold text-orange">₦320,000</p>
                            </div>
                            <div>
                                <p class="text-gray-400">Impressions</p>
                                <p class="font-bold text-white">450K</p>
                            </div>
                            <div>
                                <p class="text-gray-400">ROAS</p>
                                <p class="font-bold text-green-400">4.2x</p>
                            </div>
                        </div>
                        <div class="flex items-center mb-2">
                            <p class="text-gray-400 text-sm mr-2">Progress</p>
                            <div class="w-full bg-gray-700 rounded-full h-2.5">
                                <div class="bg-orange h-2.5 rounded-full" style="width: 64%"></div>
                            </div>
                            <p class="text-sm text-gray-300 ml-2">64%</p>
                        </div>
                        <div class="flex items-center justify-between">
                            <p class="text-gray-400 text-sm">Ends: Aug 30, 2024</p>
                            <button class="text-orange hover:text-orange/80 text-sm font-medium">View Details</button>
                        </div>
                    </div>

                    <!-- Campaign Card 2 -->
                    <div class="bg-[#0E0D1C] p-4 rounded-lg mb-4 border border-gray-700">
                        <div class="flex justify-between items-center mb-3">
                            <div>
                                <h3 class="font-bold text-lg text-white">Tech Innovation Launch</h3>
                                <p class="text-sm text-gray-400">Technology</p>
                            </div>
                            <span class="bg-blue-500 text-white text-xs font-bold px-2 py-1 rounded-full">Paused</span>
                        </div>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-sm mb-4">
                            <div>
                                <p class="text-gray-400">Budget</p>
                                <p class="font-bold text-white">₦800,000</p>
                            </div>
                            <div>
                                <p class="text-gray-400">Spent</p>
                                <p class="font-bold text-orange">₦180,000</p>
                            </div>
                            <div>
                                <p class="text-gray-400">Impressions</p>
                                <p class="font-bold text-white">280K</p>
                            </div>
                            <div>
                                <p class="text-gray-400">ROAS</p>
                                <p class="font-bold text-green-400">3.8x</p>
                            </div>
                        </div>
                        <div class="flex items-center mb-2">
                            <p class="text-gray-400 text-sm mr-2">Progress</p>
                            <div class="w-full bg-gray-700 rounded-full h-2.5">
                                <div class="bg-blue-500 h-2.5 rounded-full" style="width: 22%"></div>
                            </div>
                            <p class="text-sm text-gray-300 ml-2">22%</p>
                        </div>
                        <div class="flex items-center justify-between">
                            <p class="text-gray-400 text-sm">Ends: Sep 15, 2024</p>
                            <button class="text-orange hover:text-orange/80 text-sm font-medium">View Details</button>
                        </div>
                    </div>

                    <!-- Campaign Card 3 -->
                    <div class="bg-[#0E0D1C] p-4 rounded-lg border border-gray-700">
                        <div class="flex justify-between items-center mb-3">
                            <div>
                                <h3 class="font-bold text-lg text-white">Brand Awareness Drive</h3>
                                <p class="text-sm text-gray-400">General</p>
                            </div>
                            <span class="bg-yellow-500 text-white text-xs font-bold px-2 py-1 rounded-full">Draft</span>
                        </div>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-sm mb-4">
                            <div>
                                <p class="text-gray-400">Budget</p>
                                <p class="font-bold text-white">₦1.2M</p>
                            </div>
                            <div>
                                <p class="text-gray-400">Spent</p>
                                <p class="font-bold text-gray-500">₦0</p>
                            </div>
                            <div>
                                <p class="text-gray-400">Impressions</p>
                                <p class="font-bold text-gray-500">0</p>
                            </div>
                            <div>
                                <p class="text-gray-400">ROAS</p>
                                <p class="font-bold text-gray-500">-</p>
                            </div>
                        </div>
                        <div class="flex items-center mb-2">
                            <p class="text-gray-400 text-sm mr-2">Progress</p>
                            <div class="w-full bg-gray-700 rounded-full h-2.5">
                                <div class="bg-yellow-500 h-2.5 rounded-full" style="width: 0%"></div>
                            </div>
                            <p class="text-sm text-gray-300 ml-2">0%</p>
                        </div>
                        <div class="flex items-center justify-between">
                            <p class="text-gray-400 text-sm">Starts: Sep 1, 2024</p>
                            <button class="text-orange hover:text-orange/80 text-sm font-medium">Edit Campaign</button>
                        </div>
                    </div>
                </div>

                <!-- Right Sidebar Content -->
                <div>
                    <!-- Top Locations -->
                    <div class="bg-[#15132B] p-4 md:p-6 rounded-lg shadow-lg mb-6 border border-gray-700">
                        <h2 class="text-lg md:text-xl font-bold text-white font-orbitron mb-4">Top Locations</h2>
                        <p class="text-gray-400 text-sm mb-4">Best performing billboard locations</p>

                        <!-- Location Item 1 -->
                        <div class="flex items-center justify-between bg-[#0E0D1C] p-3 rounded-lg mb-3 border border-gray-700">
                            <div>
                                <p class="font-bold text-white">Victoria Island</p>
                                <p class="text-sm text-gray-400">Lagos, Nigeria</p>
                                <p class="text-xs text-green-400">450K impressions</p>
                            </div>
                            <div class="text-right">
                                <p class="text-orange font-bold">₦320K</p>
                                <p class="text-xs text-gray-400">Revenue</p>
                            </div>
                        </div>

                        <!-- Location Item 2 -->
                        <div class="flex items-center justify-between bg-[#0E0D1C] p-3 rounded-lg mb-3 border border-gray-700">
                            <div>
                                <p class="font-bold text-white">Lekki Expressway</p>
                                <p class="text-sm text-gray-400">Lagos, Nigeria</p>
                                <p class="text-xs text-green-400">380K impressions</p>
                            </div>
                            <div class="text-right">
                                <p class="text-orange font-bold">₦280K</p>
                                <p class="text-xs text-gray-400">Revenue</p>
                            </div>
                        </div>

                        <!-- Location Item 3 -->
                        <div class="flex items-center justify-between bg-[#0E0D1C] p-3 rounded-lg border border-gray-700">
                            <div>
                                <p class="font-bold text-white">Ikeja GRA</p>
                                <p class="text-sm text-gray-400">Lagos, Nigeria</p>
                                <p class="text-xs text-green-400">290K impressions</p>
                            </div>
                            <div class="text-right">
                                <p class="text-orange font-bold">₦210K</p>
                                <p class="text-xs text-gray-400">Revenue</p>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="bg-[#15132B] p-4 md:p-6 rounded-lg shadow-lg border border-gray-700">
                        <h2 class="text-lg md:text-xl font-bold text-white font-orbitron mb-4">Quick Actions</h2>
                        <p class="text-gray-400 text-sm mb-4">Perform common tasks quickly</p>
                        <ul class="space-y-3">
                            <li>
                                <a href="#" class="flex items-center text-orange hover:text-orange/80 transition-colors duration-200">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    Create New Campaign
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center text-orange hover:text-orange/80 transition-colors duration-200">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                    Find Billboards
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center text-orange hover:text-orange/80 transition-colors duration-200">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2m0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                    </svg>
                                    View Analytics
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center text-orange hover:text-orange/80 transition-colors duration-200">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                    Manage Budget
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Mobile Menu Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const sidebar = document.querySelector('aside');
            
            if (mobileMenuBtn && sidebar) {
                mobileMenuBtn.addEventListener('click', function() {
                    sidebar.classList.toggle('hidden');
                });
            }
        });
    </script>
</body>
</html>