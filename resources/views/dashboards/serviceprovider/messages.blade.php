<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages - PowerAD Portal</title>
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
                <a href="{{ route('dashboard.serviceprovider.earnings') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
                    <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V3m0 9v3m0-3c-1.11 0-2.08-.402-2.599-1M12 12H9m3 0h3m-6 4h2m-2 4h2m4-4h2m-2 4h2m-6 0H6a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v2"></path>
                    </svg>
                    <span class="text-gray-300">Earnings</span>
                </a>
                <a href="{{ route('dashboard.serviceprovider.messages') }}" class="flex items-center py-3 px-4 rounded-lg bg-gray-700 text-white">
                    <svg class="w-5 h-5 mr-3 text-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                    <span class="text-white font-medium">Messages</span>
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
                <button class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors text-sm font-medium">
                    New Message
                </button>
            </div>

            <!-- Header -->
            <header class="mb-8">
                <h1 class="text-3xl font-bold text-white mb-2">Messages</h1>
                <p class="text-gray-400 text-lg">Communicate with clients and manage conversations.</p>
            </header>

            <!-- Search Bar -->
            <div class="mb-6">
                <div class="relative">
                    <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <input type="text" placeholder="Search conversations..." class="w-full pl-10 pr-4 py-3 bg-[#15132B] border border-gray-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-600">
                </div>
            </div>

            <!-- Messages List -->
            <div class="space-y-4">
                <!-- Message 1 - Unread -->
                <div class="bg-[#15132B] p-4 rounded-lg shadow-lg border border-gray-700 hover:bg-gray-800 transition-colors cursor-pointer">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center mr-4">
                                <span class="text-white font-bold text-sm">SM</span>
                            </div>
                            <div>
                                <div class="flex items-center">
                                    <h3 class="text-sm font-semibold text-white">Sarah Mitchell</h3>
                                    <div class="w-2 h-2 bg-orange-500 rounded-full ml-2"></div>
                                </div>
                                <p class="text-xs text-gray-400">Downtown Media LLC</p>
                                <p class="text-sm text-gray-300 mt-1">Hi John, I need an update on the digital billboard installation project...</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-xs text-gray-400">2 min ago</p>
                            <div class="w-5 h-5 bg-orange-500 rounded-full flex items-center justify-center mt-2">
                                <span class="text-white text-xs font-bold">2</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Message 2 - Read -->
                <div class="bg-[#15132B] p-4 rounded-lg shadow-lg border border-gray-700 hover:bg-gray-800 transition-colors cursor-pointer">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-teal-600 rounded-full flex items-center justify-center mr-4">
                                <span class="text-white font-bold text-sm">MC</span>
                            </div>
                            <div>
                                <h3 class="text-sm font-semibold text-white">Mike Chen</h3>
                                <p class="text-xs text-gray-400">Highway Advertising Co.</p>
                                <p class="text-sm text-gray-300 mt-1">Thanks for the quick response. The maintenance schedule looks good.</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-xs text-gray-400">1 hour ago</p>
                        </div>
                    </div>
                </div>

                <!-- Message 3 - Read -->
                <div class="bg-[#15132B] p-4 rounded-lg shadow-lg border border-gray-700 hover:bg-gray-800 transition-colors cursor-pointer">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-600 rounded-full flex items-center justify-center mr-4">
                                <span class="text-white font-bold text-sm">DK</span>
                            </div>
                            <div>
                                <h3 class="text-sm font-semibold text-white">David Kim</h3>
                                <p class="text-xs text-gray-400">Urban Display Solutions</p>
                                <p class="text-sm text-gray-300 mt-1">Can we schedule a call to discuss the new project requirements?</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-xs text-gray-400">3 hours ago</p>
                        </div>
                    </div>
                </div>

                <!-- Message 4 - Read -->
                <div class="bg-[#15132B] p-4 rounded-lg shadow-lg border border-gray-700 hover:bg-gray-800 transition-colors cursor-pointer">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gradient-to-r from-orange-500 to-red-600 rounded-full flex items-center justify-center mr-4">
                                <span class="text-white font-bold text-sm">LR</span>
                            </div>
                            <div>
                                <h3 class="text-sm font-semibold text-white">Lisa Rodriguez</h3>
                                <p class="text-xs text-gray-400">Metro Billboards</p>
                                <p class="text-sm text-gray-300 mt-1">The CMS setup is working perfectly. Great job!</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-xs text-gray-400">Yesterday</p>
                        </div>
                    </div>
                </div>

                <!-- Message 5 - Read -->
                <div class="bg-[#15132B] p-4 rounded-lg shadow-lg border border-gray-700 hover:bg-gray-800 transition-colors cursor-pointer">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gradient-to-r from-indigo-500 to-blue-600 rounded-full flex items-center justify-center mr-4">
                                <span class="text-white font-bold text-sm">AJ</span>
                            </div>
                            <div>
                                <h3 class="text-sm font-semibold text-white">Alex Johnson</h3>
                                <p class="text-xs text-gray-400">Tech Solutions Inc.</p>
                                <p class="text-sm text-gray-300 mt-1">Looking forward to our next collaboration on the digital signage project.</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-xs text-gray-400">2 days ago</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Message Stats -->
            <div class="mt-8 grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div class="bg-[#15132B] p-4 rounded-lg shadow-lg border border-gray-700">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-orange-500 rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-white">3</h3>
                            <p class="text-sm text-gray-400">Unread Messages</p>
                        </div>
                    </div>
                </div>

                <div class="bg-[#15132B] p-4 rounded-lg shadow-lg border border-gray-700">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-white">12</h3>
                            <p class="text-sm text-gray-400">Total Conversations</p>
                        </div>
                    </div>
                </div>

                <div class="bg-[#15132B] p-4 rounded-lg shadow-lg border border-gray-700">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-white">2.4h</h3>
                            <p class="text-sm text-gray-400">Avg Response Time</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
