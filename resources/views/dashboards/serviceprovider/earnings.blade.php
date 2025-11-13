<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Earnings - PowerAD Portal</title>
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
                <a href="{{ route('dashboard.serviceprovider.my-services') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
                    <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                    <span class="text-gray-300">My Services</span>
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
                <a href="{{ route('dashboard.serviceprovider.earnings') }}" class="flex items-center py-3 px-4 rounded-lg bg-gray-700 text-white">
                    <svg class="w-5 h-5 mr-3 text-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V3m0 9v3m0-3c-1.11 0-2.08-.402-2.599-1M12 12H9m3 0h3m-6 4h2m-2 4h2m4-4h2m-2 4h2m-6 0H6a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v2"></path>
                    </svg>
                    <span class="text-white font-medium">Earnings</span>
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
            <div class="flex justify-between items-center mb-6">
                <div class="flex items-center">
                    <button class="p-2 rounded-lg hover:bg-gray-700 transition-colors mr-4">
                        <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 01-3 3H9a3 3 0 01-3-3v-1m6-10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </button>
                    <div class="w-10 h-10 bg-gradient-to-r from-orange to-yellow rounded-full flex items-center justify-center">
                        <span class="text-white font-bold text-sm">JD</span>
                    </div>
                </div>
            </div>

            <!-- Header -->
            <header class="mb-8">
                <h1 class="text-3xl font-bold text-white mb-2">Earnings</h1>
                <p class="text-gray-400 text-lg">Track your income and payment history.</p>
            </header>

            <!-- Earnings Summary Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-[#15132B] p-6 rounded-lg shadow-lg border border-gray-700">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-green-500 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V3m0 9v3m0-3c-1.11 0-2.08-.402-2.599-1M12 12H9m3 0h3m-6 4h2m-2 4h2m4-4h2m-2 4h2m-6 0H6a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v2"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-1">$87,400</h3>
                    <p class="text-sm text-gray-300 mb-1">Total Earnings</p>
                    <p class="text-xs text-gray-400">Last 6 months</p>
                </div>

                <div class="bg-[#15132B] p-6 rounded-lg shadow-lg border border-gray-700">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-blue-500 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-1">$14,567</h3>
                    <p class="text-sm text-gray-300 mb-1">Monthly Average</p>
                    <p class="text-xs text-green-400 flex items-center">
                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 17l9.2-9.2M17 17V7H7"></path>
                        </svg>
                        +12% from last period
                    </p>
                </div>

                <div class="bg-[#15132B] p-6 rounded-lg shadow-lg border border-gray-700">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-orange-500 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-1">$3,500</h3>
                    <p class="text-sm text-gray-300 mb-1">Pending Payments</p>
                    <p class="text-xs text-gray-400">1 payments pending</p>
                </div>

                <div class="bg-[#15132B] p-6 rounded-lg shadow-lg border border-gray-700">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-purple-500 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-1">$22,400</h3>
                    <p class="text-sm text-gray-300 mb-1">This Month</p>
                    <p class="text-xs text-green-400 flex items-center">
                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 17l9.2-9.2M17 17V7H7"></path>
                        </svg>
                        +18% from last month
                    </p>
                </div>
            </div>

            <!-- Earnings Trend and Payment Breakdown -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <!-- Earnings Trend -->
                <div class="bg-[#15132B] p-6 rounded-lg shadow-lg border border-gray-700">
                    <div class="mb-4">
                        <h3 class="text-xl font-bold text-white mb-2">Earnings Trend</h3>
                        <p class="text-sm text-gray-400">Monthly earnings over the last 6 months</p>
                    </div>
                    <div class="space-y-3">
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-300">Jan</span>
                            <span class="text-sm font-semibold text-white">$8,500</span>
                            <span class="text-xs text-gray-400">(3 projects)</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-300">Feb</span>
                            <span class="text-sm font-semibold text-white">$12,200</span>
                            <span class="text-xs text-gray-400">(4 projects)</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-300">Mar</span>
                            <span class="text-sm font-semibold text-white">$15,800</span>
                            <span class="text-xs text-gray-400">(5 projects)</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-300">Apr</span>
                            <span class="text-sm font-semibold text-white">$9,600</span>
                            <span class="text-xs text-gray-400">(3 projects)</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-300">May</span>
                            <span class="text-sm font-semibold text-white">$18,900</span>
                            <span class="text-xs text-gray-400">(6 projects)</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-300">Jun</span>
                            <span class="text-sm font-semibold text-white">$22,400</span>
                            <span class="text-xs text-gray-400">(7 projects)</span>
                        </div>
                    </div>
                </div>

                <!-- Payment Breakdown -->
                <div class="bg-[#15132B] p-6 rounded-lg shadow-lg border border-gray-700">
                    <div class="mb-4">
                        <h3 class="text-xl font-bold text-white mb-2">Payment Breakdown</h3>
                        <p class="text-sm text-gray-400">Revenue by service type</p>
                    </div>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-300">Installation</span>
                            <span class="text-sm font-semibold text-white">$45,000</span>
                            <span class="text-xs text-gray-400">(52%)</span>
                        </div>
                        <div class="w-full bg-gray-700 rounded-full h-2">
                            <div class="bg-blue-500 h-2 rounded-full" style="width: 52%"></div>
                        </div>
                        
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-300">Maintenance</span>
                            <span class="text-sm font-semibold text-white">$28,500</span>
                            <span class="text-xs text-gray-400">(33%)</span>
                        </div>
                        <div class="w-full bg-gray-700 rounded-full h-2">
                            <div class="bg-green-500 h-2 rounded-full" style="width: 33%"></div>
                        </div>
                        
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-300">Repair</span>
                            <span class="text-sm font-semibold text-white">$13,000</span>
                            <span class="text-xs text-gray-400">(15%)</span>
                        </div>
                        <div class="w-full bg-gray-700 rounded-full h-2">
                            <div class="bg-orange-500 h-2 rounded-full" style="width: 15%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Payments -->
            <div class="bg-[#15132B] p-6 rounded-lg shadow-lg border border-gray-700">
                <div class="mb-6">
                    <h3 class="text-xl font-bold text-white mb-2">Recent Payments</h3>
                    <p class="text-sm text-gray-400">Latest payments received and pending</p>
                </div>
                
                <div class="space-y-4">
                    <!-- Payment 1 -->
                    <div class="flex items-center justify-between p-4 bg-gray-800 rounded-lg border border-gray-700">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center mr-4">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V3m0 9v3m0-3c-1.11 0-2.08-.402-2.599-1M12 12H9m3 0h3m-6 4h2m-2 4h2m4-4h2m-2 4h2m-6 0H6a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v2"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-semibold text-white">Downtown Media LLC</h4>
                                <p class="text-xs text-gray-400">Digital Billboard Installation</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-semibold text-green-400">$15,000</p>
                            <p class="text-xs text-gray-400">2024-01-30 • Paid</p>
                        </div>
                    </div>

                    <!-- Payment 2 -->
                    <div class="flex items-center justify-between p-4 bg-gray-800 rounded-lg border border-gray-700">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center mr-4">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V3m0 9v3m0-3c-1.11 0-2.08-.402-2.599-1M12 12H9m3 0h3m-6 4h2m-2 4h2m4-4h2m-2 4h2m-6 0H6a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v2"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-semibold text-white">Urban Display Solutions</h4>
                                <p class="text-xs text-gray-400">System Maintenance</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-semibold text-green-400">$6,200</p>
                            <p class="text-xs text-gray-400">2024-01-25 • Paid</p>
                        </div>
                    </div>

                    <!-- Payment 3 -->
                    <div class="flex items-center justify-between p-4 bg-gray-800 rounded-lg border border-gray-700">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-orange-500 rounded-full flex items-center justify-center mr-4">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-semibold text-white">Highway Advertising Co.</h4>
                                <p class="text-xs text-gray-400">Billboard Repair</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-semibold text-orange-400">$3,500</p>
                            <p class="text-xs text-gray-400">2024-01-20 • Pending</p>
                        </div>
                    </div>

                    <!-- Payment 4 -->
                    <div class="flex items-center justify-between p-4 bg-gray-800 rounded-lg border border-gray-700">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center mr-4">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V3m0 9v3m0-3c-1.11 0-2.08-.402-2.599-1M12 12H9m3 0h3m-6 4h2m-2 4h2m4-4h2m-2 4h2m-6 0H6a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v2"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-semibold text-white">Metro Billboards</h4>
                                <p class="text-xs text-gray-400">CMS Setup</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-semibold text-green-400">$8,200</p>
                            <p class="text-xs text-gray-400">2024-01-15 • Paid</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
