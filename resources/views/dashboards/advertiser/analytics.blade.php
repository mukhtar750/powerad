<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advertiser Dashboard - Analytics</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('build/assets/app-BdhG_vQw.css') }}">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-orbitron { font-family: 'Orbitron', sans-serif; }
        .bg-orange { background-color: #FF6B00; }
        .text-orange { color: #FF6B00; }
        .logo-container { display: flex; align-items: center; }
        .footer-logo-container { display: flex; align-items: center; }
    </style>
</head>
<body class="antialiased bg-[#0E0D1C] text-gray-100 font-sans">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-[#15132B] p-6 space-y-6 flex flex-col justify-between shadow-lg">
            <!-- Logo Section -->
            <div class="logo-container mb-8">
                <img src="{{ asset('images/primarylogo.png') }}" 
                     alt="PowerAD International Logo" 
                     class="logo-image h-8 w-auto mb-2">
                <p class="text-gray-400 text-sm">Advertiser</p>
            </div>

            <!-- Navigation -->
            <nav class="space-y-2">
                <a href="/dashboard/advertiser" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
                    <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                    </svg>
                    <span class="text-gray-300">Dashboard</span>
                </a>
                <a href="{{ route('advertiser.discover') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
                    <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <span class="text-gray-300">Browse Billboards</span>
                </a>
                <a href="{{ route('dashboard.advertiser.my-campaigns') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
                    <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M12 15h.01"></path>
                    </svg>
                    <span class="text-gray-300">My Campaigns</span>
                </a>
                <a href="{{ route('dashboard.advertiser.payments') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
                    <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                    </svg>
                    <span class="text-gray-300">Payments</span>
                </a>
                <a href="{{ route('dashboard.advertiser.analytics') }}" class="flex items-center py-3 px-4 rounded-lg bg-gray-700 text-white">
                    <svg class="w-5 h-5 mr-3 text-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                    <span class="text-white font-medium">Analytics</span>
                </a>
                <a href="{{ route('dashboard.advertiser.messages') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
                    <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                    <span class="text-gray-300">Messages</span>
                </a>
                <a href="{{ route('dashboard.advertiser.settings') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
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
                        <p class="text-xs text-gray-400">Advertiser</p>
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
        <main class="flex-1 p-4 md:p-6 overflow-y-auto">
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
                <h1 class="text-3xl font-bold text-white mb-2">Analytics</h1>
                <p class="text-gray-400 text-lg">Track your campaign performance and insights.</p>
            </header>

            <!-- KPI Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Impressions -->
                <div class="bg-[#15132B] rounded-lg shadow-lg border border-gray-700 p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <p class="text-sm text-gray-400 font-medium">Total Impressions</p>
                            <h3 class="text-2xl md:text-3xl font-bold text-white">123,456</h3>
                        </div>
                        <div class="p-3 bg-blue-500/20 rounded-full text-blue-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </div>
                    </div>
                    <p class="text-sm text-green-400 font-medium">+12.5% from last month</p>
                </div>

                <!-- Click-through Rate -->
                <div class="bg-[#15132B] rounded-lg shadow-lg border border-gray-700 p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <p class="text-sm text-gray-400 font-medium">Click-through Rate</p>
                            <h3 class="text-2xl md:text-3xl font-bold text-white">2.3%</h3>
                        </div>
                        <div class="p-3 bg-green-500/20 rounded-full text-green-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                    </div>
                    <p class="text-sm text-green-400 font-medium">+0.8% from last month</p>
                </div>

                <!-- Active Campaigns -->
                <div class="bg-[#15132B] rounded-lg shadow-lg border border-gray-700 p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <p class="text-sm text-gray-400 font-medium">Active Campaigns</p>
                            <h3 class="text-2xl md:text-3xl font-bold text-white">8</h3>
                        </div>
                        <div class="p-3 bg-purple-500/20 rounded-full text-purple-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                    </div>
                    <p class="text-sm text-green-400 font-medium">+2 from last month</p>
                </div>

                <!-- Reach -->
                <div class="bg-[#15132B] rounded-lg shadow-lg border border-gray-700 p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <p class="text-sm text-gray-400 font-medium">Reach</p>
                            <h3 class="text-2xl md:text-3xl font-bold text-white">45,231</h3>
                        </div>
                        <div class="p-3 bg-orange/20 rounded-full text-orange">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <p class="text-sm text-green-400 font-medium">+5.2% from last month</p>
                </div>
            </div>

            <!-- Detailed Analytics Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Campaign Performance -->
                <div class="bg-[#15132B] rounded-lg shadow-lg border border-gray-700 p-6">
                    <div class="mb-6">
                        <h2 class="text-xl font-bold text-white mb-2">Campaign Performance</h2>
                        <p class="text-gray-400 text-sm">Top performing campaigns this month</p>
                    </div>
                    
                    <div class="space-y-4">
                        <!-- Campaign 1 -->
                        <div class="flex items-center justify-between p-4 bg-gray-800 rounded-lg border border-gray-700">
                            <div>
                                <h3 class="font-semibold text-white">Summer Fashion Campaign</h3>
                                <p class="text-sm text-gray-400">45,231 impressions</p>
                            </div>
                            <div class="text-right">
                                <p class="text-lg font-bold text-white">3.2% CTR</p>
                                <p class="text-sm text-green-400">+0.5%</p>
                            </div>
                        </div>

                        <!-- Campaign 2 -->
                        <div class="flex items-center justify-between p-4 bg-gray-800 rounded-lg border border-gray-700">
                            <div>
                                <h3 class="font-semibold text-white">Tech Product Launch</h3>
                                <p class="text-sm text-gray-400">38,567 impressions</p>
                            </div>
                            <div class="text-right">
                                <p class="text-lg font-bold text-white">2.8% CTR</p>
                                <p class="text-sm text-green-400">+0.3%</p>
                            </div>
                        </div>

                        <!-- Campaign 3 -->
                        <div class="flex items-center justify-between p-4 bg-gray-800 rounded-lg border border-gray-700">
                            <div>
                                <h3 class="font-semibold text-white">Holiday Special</h3>
                                <p class="text-sm text-gray-400">39,890 impressions</p>
                            </div>
                            <div class="text-right">
                                <p class="text-lg font-bold text-white">2.1% CTR</p>
                                <p class="text-sm text-green-400">+0.2%</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Audience Insights -->
                <div class="bg-[#15132B] rounded-lg shadow-lg border border-gray-700 p-6">
                    <div class="mb-6">
                        <h2 class="text-xl font-bold text-white mb-2">Audience Insights</h2>
                        <p class="text-gray-400 text-sm">Demographics and behavior patterns</p>
                    </div>
                    
                    <div class="space-y-4">
                        <!-- Age Group 1 -->
                        <div class="flex items-center justify-between p-4 bg-gray-800 rounded-lg border border-gray-700">
                            <div>
                                <h3 class="font-semibold text-white">18-24</h3>
                                <p class="text-sm text-gray-400">Young adults</p>
                            </div>
                            <div class="text-right">
                                <p class="text-lg font-bold text-white">28%</p>
                                <div class="w-20 bg-gray-700 rounded-full h-2 mt-1">
                                    <div class="bg-blue-500 h-2 rounded-full" style="width: 28%"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Age Group 2 -->
                        <div class="flex items-center justify-between p-4 bg-gray-800 rounded-lg border border-gray-700">
                            <div>
                                <h3 class="font-semibold text-white">25-34</h3>
                                <p class="text-sm text-gray-400">Millennials</p>
                            </div>
                            <div class="text-right">
                                <p class="text-lg font-bold text-white">35%</p>
                                <div class="w-20 bg-gray-700 rounded-full h-2 mt-1">
                                    <div class="bg-green-500 h-2 rounded-full" style="width: 35%"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Age Group 3 -->
                        <div class="flex items-center justify-between p-4 bg-gray-800 rounded-lg border border-gray-700">
                            <div>
                                <h3 class="font-semibold text-white">35-44</h3>
                                <p class="text-sm text-gray-400">Gen X</p>
                            </div>
                            <div class="text-right">
                                <p class="text-lg font-bold text-white">22%</p>
                                <div class="w-20 bg-gray-700 rounded-full h-2 mt-1">
                                    <div class="bg-purple-500 h-2 rounded-full" style="width: 22%"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Age Group 4 -->
                        <div class="flex items-center justify-between p-4 bg-gray-800 rounded-lg border border-gray-700">
                            <div>
                                <h3 class="font-semibold text-white">45+</h3>
                                <p class="text-sm text-gray-400">Boomers+</p>
                            </div>
                            <div class="text-right">
                                <p class="text-lg font-bold text-white">15%</p>
                                <div class="w-20 bg-gray-700 rounded-full h-2 mt-1">
                                    <div class="bg-orange h-2 rounded-full" style="width: 15%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
