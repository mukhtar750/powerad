<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Services - PowerAD Portal</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('build/assets/app-BdhG_vQw.css') }}">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .font-orbitron { font-family: 'Orbitron', sans-serif; }
        .text-orange { color: #FF8C00; }
    </style>
</head>
<body class="antialiased bg-[#0E0D1C] text-gray-100 font-sans">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-[#15132B] p-6 space-y-6 flex flex-col justify-between shadow-lg">
            <!-- Logo Section -->
            <div class="flex items-center mb-8">
                <img src="{{ asset('images/primarylogo.png') }}" alt="PowerAD Logo" class="h-8 w-auto mr-3">
                <div>
                    <div class="text-orange text-sm font-medium">Service Provider</div>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="space-y-2">
                <a href="/dashboard/serviceprovider" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
                    <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                    </svg>
                    <span class="text-gray-300">Dashboard</span>
                </a>
                <a href="{{ route('dashboard.serviceprovider.my-services') }}" class="flex items-center py-3 px-4 rounded-lg bg-gray-700 text-white">
                    <svg class="w-5 h-5 mr-3 text-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                    <span class="text-white font-medium">My Services</span>
                </a>
                <a href="{{ route('dashboard.serviceprovider.jobs') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
                    <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M12 15h.01"></path>
                    </svg>
                    <span class="text-gray-300">Jobs</span>
                </a>
                <a href="{{ route('dashboard.serviceprovider.clients') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
                    <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                    </svg>
                    <span class="text-gray-300">Clients</span>
                </a>
                <a href="{{ route('dashboard.serviceprovider.earnings') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
                    <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V3m0 9v3m0-3c-1.11 0-2.08-.402-2.599-1M12 12H9m3 0h3m-6 4h2m-2 4h2m4-4h2m-2 4h2m-6 0H6a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v2"></path>
                    </svg>
                    <span class="text-gray-300">Earnings</span>
                </a>
                <a href="{{ route('dashboard.serviceprovider.messages') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
                    <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                    <span class="text-gray-300">Messages</span>
                </a>
                <a href="{{ route('dashboard.serviceprovider.settings') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
                    <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <span class="text-gray-300">Settings</span>
                </a>
            </nav>

            <!-- User Profile & Logout -->
            <div class="border-t border-gray-700 pt-6">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-orange to-yellow rounded-full flex items-center justify-center">
                        <span class="text-white font-bold">JD</span>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-white">John Doe</p>
                        <p class="text-xs text-gray-400">Service Provider</p>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center w-full text-left py-2 px-4 rounded-lg hover:bg-gray-700 text-gray-300 text-sm transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3v-1m6-10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6 overflow-y-auto">
            <!-- Top Bar -->
            <div class="flex justify-end items-center mb-6">
                <button class="p-2 rounded-lg hover:bg-gray-700 transition-colors mr-4">
                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 01-3 3H9a3 3 0 01-3-3v-1m6-10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </button>
                <div class="w-10 h-10 bg-gradient-to-r from-orange to-yellow rounded-full flex items-center justify-center">
                    <span class="text-white font-bold text-sm">JD</span>
                </div>
            </div>

            <!-- Header -->
            <header class="mb-8">
                <h1 class="text-3xl font-bold text-white mb-2">My Services</h1>
                <p class="text-gray-400 text-lg">Manage your service offerings, pricing, and availability.</p>
            </header>

            <!-- KPI Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-[#15132B] p-6 rounded-lg shadow-lg border border-gray-700">
                    <h3 class="text-2xl font-bold text-white mb-1">3</h3>
                    <p class="text-sm text-gray-400 mb-1">Active Services</p>
                    <p class="text-xs text-green-400">+1 this month</p>
                </div>
                <div class="bg-[#15132B] p-6 rounded-lg shadow-lg border border-gray-700">
                    <h3 class="text-2xl font-bold text-white mb-1">173</h3>
                    <p class="text-sm text-gray-400 mb-1">Total Jobs</p>
                    <p class="text-xs text-green-400">+23 this month</p>
                </div>
                <div class="bg-[#15132B] p-6 rounded-lg shadow-lg border border-gray-700">
                    <h3 class="text-2xl font-bold text-white mb-1">₦4.95M</h3>
                    <p class="text-sm text-gray-400 mb-1">Monthly Revenue</p>
                    <p class="text-xs text-green-400">+15.1% growth</p>
                </div>
                <div class="bg-[#15132B] p-6 rounded-lg shadow-lg border border-gray-700">
                    <h3 class="text-2xl font-bold text-white mb-1">4.8</h3>
                    <p class="text-sm text-gray-400 mb-1">Avg Rating</p>
                    <p class="text-xs text-green-400">Excellent service</p>
                </div>
            </div>

            <!-- Search and Filters -->
            <div class="mb-8">
                <div class="relative mb-4">
                    <input type="text" placeholder="Search services by name, category, or description..." class="w-full p-3 pl-10 bg-[#15132B] border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 text-white placeholder-gray-500">
                    <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <div class="flex flex-wrap gap-3">
                    <button class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors text-sm font-medium">All Categories</button>
                    <button class="px-4 py-2 bg-gray-700 text-gray-300 rounded-lg hover:bg-gray-600 transition-colors text-sm">Installation</button>
                    <button class="px-4 py-2 bg-gray-700 text-gray-300 rounded-lg hover:bg-gray-600 transition-colors text-sm">Design</button>
                    <button class="px-4 py-2 bg-gray-700 text-gray-300 rounded-lg hover:bg-gray-600 transition-colors text-sm">Maintenance</button>
                    <button class="px-4 py-2 bg-gray-700 text-gray-300 rounded-lg hover:bg-gray-600 transition-colors text-sm">Technology</button>
                    <button class="px-4 py-2 bg-gray-700 text-gray-300 rounded-lg hover:bg-gray-600 transition-colors text-sm">Consulting</button>
                    <button class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors text-sm font-medium flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Add New Service
                    </button>
                </div>
            </div>

            <!-- Services Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <!-- Service Card 1 -->
                <div class="bg-[#15132B] p-6 rounded-lg shadow-lg border border-gray-700">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-xl font-bold text-white mb-2">Billboard Installation & Setup</h3>
                            <span class="bg-green-500 text-white text-xs font-bold px-3 py-1 rounded-full">active</span>
                        </div>
                    </div>
                    <p class="text-gray-400 text-sm mb-4">Complete billboard installation including foundation work, assembly, and electrical connections.</p>
                    
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <span class="text-blue-500 text-xs font-bold px-2 py-1 rounded bg-blue-500/20">Installation</span>
                            <p class="text-sm text-gray-400 mt-1">Pricing Range</p>
                            <p class="text-white font-semibold">₦45,000 - ₦150,000</p>
                            <p class="text-xs text-gray-400">Avg: ₦85,000</p>
                        </div>
                        <div class="text-right">
                            <p class="text-2xl font-bold text-green-400">45</p>
                            <p class="text-xs text-gray-400">Completed</p>
                            <p class="text-2xl font-bold text-blue-400 mt-2">8</p>
                            <p class="text-xs text-gray-400">Active</p>
                        </div>
                    </div>

                    <div class="flex justify-between items-center mb-3">
                        <span class="text-sm text-gray-400">Monthly Revenue</span>
                        <span class="text-white font-semibold">₦2,800,000</span>
                    </div>
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-sm text-gray-400">Duration</span>
                        <span class="text-white font-semibold">3-5 days</span>
                    </div>
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-sm text-gray-400">Available Slots</span>
                        <span class="text-white font-semibold">12 slots</span>
                    </div>

                    <div class="w-full bg-gray-700 rounded-full h-2 mb-4">
                        <div class="bg-orange h-2 rounded-full" style="width: 60%"></div>
                    </div>

                    <div class="flex justify-between">
                        <button class="flex items-center px-4 py-2 bg-gray-700 text-white rounded-lg hover:bg-gray-600 transition-colors text-sm">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            View Jobs
                        </button>
                        <button class="flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-sm">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Edit
                        </button>
                    </div>
                </div>

                <!-- Service Card 2 -->
                <div class="bg-[#15132B] p-6 rounded-lg shadow-lg border border-gray-700">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-xl font-bold text-white mb-2">Creative Design Services</h3>
                            <span class="bg-green-500 text-white text-xs font-bold px-3 py-1 rounded-full">active</span>
                        </div>
                    </div>
                    <p class="text-gray-400 text-sm mb-4">Professional billboard design, artwork creation, and visual content development.</p>
                    
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <span class="text-blue-500 text-xs font-bold px-2 py-1 rounded bg-blue-500/20">Design</span>
                            <p class="text-sm text-gray-400 mt-1">Pricing Range</p>
                            <p class="text-white font-semibold">₦25,000 - ₦80,000</p>
                            <p class="text-xs text-gray-400">Avg: ₦45,000</p>
                        </div>
                        <div class="text-right">
                            <p class="text-2xl font-bold text-green-400">32</p>
                            <p class="text-xs text-gray-400">Completed</p>
                            <p class="text-2xl font-bold text-blue-400 mt-2">12</p>
                            <p class="text-xs text-gray-400">Active</p>
                        </div>
                    </div>

                    <div class="flex justify-between items-center mb-3">
                        <span class="text-sm text-gray-400">Monthly Revenue</span>
                        <span class="text-white font-semibold">₦1,200,000</span>
                    </div>
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-sm text-gray-400">Duration</span>
                        <span class="text-white font-semibold">2-4 days</span>
                    </div>
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-sm text-gray-400">Available Slots</span>
                        <span class="text-white font-semibold">8 slots</span>
                    </div>

                    <div class="w-full bg-gray-700 rounded-full h-2 mb-4">
                        <div class="bg-orange h-2 rounded-full" style="width: 40%"></div>
                    </div>

                    <div class="flex justify-between">
                        <button class="flex items-center px-4 py-2 bg-gray-700 text-white rounded-lg hover:bg-gray-600 transition-colors text-sm">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            View Jobs
                        </button>
                        <button class="flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-sm">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Edit
                        </button>
                    </div>
                </div>
            </div>

            <!-- Service Performance Overview -->
            <div class="bg-[#15132B] p-6 rounded-lg shadow-lg border border-gray-700">
                <h2 class="text-xl font-bold text-white mb-2">Service Performance Overview</h2>
                <p class="text-gray-400 text-sm mb-6">Track the performance of your most popular services</p>
                
                <div class="space-y-4">
                    <div class="flex justify-between items-center p-4 bg-gray-800 rounded-lg border border-gray-700">
                        <div>
                            <h3 class="font-semibold text-white">Billboard Installation & Setup</h3>
                            <p class="text-xs text-gray-400">45 jobs completed</p>
                        </div>
                        <div class="text-right">
                            <p class="text-lg font-bold text-white">₦2,800,000</p>
                            <p class="text-xs text-green-400">4.8 (42)</p>
                        </div>
                    </div>
                    
                    <div class="flex justify-between items-center p-4 bg-gray-800 rounded-lg border border-gray-700">
                        <div>
                            <h3 class="font-semibold text-white">Creative Design Services</h3>
                            <p class="text-xs text-gray-400">32 jobs completed</p>
                        </div>
                        <div class="text-right">
                            <p class="text-lg font-bold text-white">₦1,200,000</p>
                            <p class="text-xs text-green-400">4.9 (28)</p>
                        </div>
                    </div>
                    
                    <div class="flex justify-between items-center p-4 bg-gray-800 rounded-lg border border-gray-700">
                        <div>
                            <h3 class="font-semibold text-white">Billboard Maintenance & Repair</h3>
                            <p class="text-xs text-gray-400">78 jobs completed</p>
                        </div>
                        <div class="text-right">
                            <p class="text-lg font-bold text-white">₦950,000</p>
                            <p class="text-xs text-green-400">4.7 (65)</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
