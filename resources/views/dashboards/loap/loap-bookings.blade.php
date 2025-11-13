<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookings - LOAP Dashboard</title>
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
                    <a href="/dashboard/loap/billboards" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">
                        <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        My Billboards
                    </a>
                    <a href="/dashboard/loap/bookings" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2 bg-gray-700">
                        <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        Bookings
                    </a>
                    <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">
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
                    <div class="font-bold">John Doe</div>
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
                    <h1 class="text-2xl md:text-3xl font-bold text-white font-orbitron">Bookings</h1>
                    <p class="text-gray-400 text-sm md:text-base">Manage reservations and scheduling for your billboards.</p>
                </div>
                <div class="flex items-center space-x-4">
                    <button class="p-2 rounded-full hover:bg-gray-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 01-3 3H9a3 3 0 01-3-3v-1m6-10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </button>
                    <div class="w-10 h-10 bg-gradient-to-r from-orange to-yellow rounded-full flex items-center justify-center">
                        <span class="text-white font-bold text-sm">JD</span>
                    </div>
                </div>
            </header>

            <!-- Summary Statistics Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6 mb-8">
                <!-- Total Bookings Card -->
                <div class="bg-[#15132B] rounded-lg shadow-lg border border-gray-700 p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm font-medium mb-1">Total Bookings</p>
                            <h3 class="text-3xl font-bold text-white">23</h3>
                            <p class="text-green-400 text-sm font-medium">+3 from last month</p>
                        </div>
                        <div class="w-12 h-12 bg-blue-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Active Campaigns Card -->
                <div class="bg-[#15132B] rounded-lg shadow-lg border border-gray-700 p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm font-medium mb-1">Active Campaigns</p>
                            <h3 class="text-3xl font-bold text-white">8</h3>
                            <p class="text-blue-400 text-sm font-medium">Currently running</p>
                        </div>
                        <div class="w-12 h-12 bg-green-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Occupancy Rate Card -->
                <div class="bg-[#15132B] rounded-lg shadow-lg border border-gray-700 p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm font-medium mb-1">Occupancy Rate</p>
                            <h3 class="text-3xl font-bold text-white">87%</h3>
                            <p class="text-green-400 text-sm font-medium">+5% from last month</p>
                        </div>
                        <div class="w-12 h-12 bg-purple-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Bookings Section -->
            <div class="bg-[#15132B] rounded-lg shadow-lg border border-gray-700">
                <div class="p-6 border-b border-gray-700">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h2 class="text-xl font-bold text-white">Recent Bookings</h2>
                            <p class="text-gray-400 text-sm mt-1">Latest reservation requests and confirmations</p>
                        </div>
                        <div class="mt-4 sm:mt-0">
                            <button class="px-4 py-2 bg-orange text-white rounded-lg hover:bg-orange/90 transition-colors text-sm font-medium">
                                View All Bookings
                            </button>
                        </div>
                    </div>
                </div>

                <div class="p-6">
                    <!-- Booking Item 1 -->
                    <div class="flex items-center justify-between py-4 border-b border-gray-700 last:border-b-0">
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 bg-gray-700 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-white">Fashion Brand Co.</h3>
                                <div class="flex items-center space-x-4 mt-1">
                                    <span class="text-sm text-gray-400">Times Square Digital</span>
                                    <span class="text-sm text-gray-500">28 days</span>
                                    <span class="text-sm font-medium text-white">$15,000</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <span class="px-3 py-1 bg-green-500/20 text-green-400 text-xs font-medium rounded-full">Confirmed</span>
                            <span class="text-sm text-gray-400">2024-02-01 to 2024-02-28</span>
                        </div>
                    </div>

                    <!-- Booking Item 2 -->
                    <div class="flex items-center justify-between py-4 border-b border-gray-700 last:border-b-0">
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 bg-gray-700 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-white">Tech Startup Inc.</h3>
                                <div class="flex items-center space-x-4 mt-1">
                                    <span class="text-sm text-gray-400">Downtown LED Panel</span>
                                    <span class="text-sm text-gray-500">29 days</span>
                                    <span class="text-sm font-medium text-white">$8,500</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <span class="px-3 py-1 bg-yellow-500/20 text-yellow-400 text-xs font-medium rounded-full">Pending</span>
                            <span class="text-sm text-gray-400">2024-02-15 to 2024-03-15</span>
                        </div>
                    </div>

                    <!-- Booking Item 3 -->
                    <div class="flex items-center justify-between py-4 border-b border-gray-700 last:border-b-0">
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 bg-gray-700 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-white">Local Restaurant</h3>
                                <div class="flex items-center space-x-4 mt-1">
                                    <span class="text-sm text-gray-400">Highway Billboard A1</span>
                                    <span class="text-sm text-gray-500">31 days</span>
                                    <span class="text-sm font-medium text-white">$3,200</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <span class="px-3 py-1 bg-blue-500/20 text-blue-400 text-xs font-medium rounded-full">Completed</span>
                            <span class="text-sm text-gray-400">2024-01-01 to 2024-01-31</span>
                        </div>
                    </div>

                    <!-- Booking Item 4 -->
                    <div class="flex items-center justify-between py-4 border-b border-gray-700 last:border-b-0">
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 bg-gray-700 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-white">Sports Club</h3>
                                <div class="flex items-center space-x-4 mt-1">
                                    <span class="text-sm text-gray-400">Stadium Digital Board</span>
                                    <span class="text-sm text-gray-500">14 days</span>
                                    <span class="text-sm font-medium text-white">$12,000</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <span class="px-3 py-1 bg-green-500/20 text-green-400 text-xs font-medium rounded-full">Confirmed</span>
                            <span class="text-sm text-gray-400">2024-03-01 to 2024-03-14</span>
                        </div>
                    </div>

                    <!-- Booking Item 5 -->
                    <div class="flex items-center justify-between py-4 border-b border-gray-700 last:border-b-0">
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 bg-gray-700 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-white">Music Festival</h3>
                                <div class="flex items-center space-x-4 mt-1">
                                    <span class="text-sm text-gray-400">Concert Venue Billboard</span>
                                    <span class="text-sm text-gray-500">7 days</span>
                                    <span class="text-sm font-medium text-white">$5,500</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <span class="px-3 py-1 bg-yellow-500/20 text-yellow-400 text-xs font-medium rounded-full">Pending</span>
                            <span class="text-sm text-gray-400">2024-03-20 to 2024-03-26</span>
                        </div>
                    </div>
                </div>
            </div>
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

