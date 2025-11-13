<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Provider Dashboard - PowerAD Portal</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('build/assets/app-BdhG_vQw.css') }}">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .font-orbitron {
            font-family: 'Orbitron', sans-serif;
        }
        .text-orange {
            color: #FF8C00;
        }
        .bg-orange\/20 {
            background-color: rgba(255, 140, 0, 0.2);
        }
    </style>
</head>
<body class="antialiased bg-[#0E0D1C] text-gray-100 font-sans">
    <div class="flex h-screen">
        @include('partials.sidebar')

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
                <h1 class="text-3xl font-bold text-white mb-2">Dashboard</h1>
                <h2 class="text-xl text-white mb-2">Welcome back, Michael!</h2>
                <p class="text-gray-400 text-lg">Manage your services and track your business performance.</p>
            </header>

            <!-- KPI Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 mb-8">
                <!-- Monthly Revenue Card -->
                <div class="bg-[#15132B] p-6 rounded-lg shadow-lg border border-gray-700">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-green-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V3m0 9v3m0-3c-1.11 0-2.08-.402-2.599-1M12 12H9m3 0h3m-6 4h2m-2 4h2m4-4h2m-2 4h2m-6 0H6a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v2"></path>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-white mb-1">₦4.95M</h3>
                        <p class="text-sm text-gray-400 mb-1">Monthly Revenue</p>
                        <p class="text-xs text-green-400">+22% from last month</p>
                    </div>
                </div>

                <!-- Active Jobs Card -->
                <div class="bg-[#15132B] p-6 rounded-lg shadow-lg border border-gray-700">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-blue-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M12 15h.01"></path>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-white mb-1">25</h3>
                        <p class="text-sm text-gray-400 mb-1">Active Jobs</p>
                        <p class="text-xs text-green-400">+5 this week</p>
                    </div>
                </div>

                <!-- Total Clients Card -->
                <div class="bg-[#15132B] p-6 rounded-lg shadow-lg border border-gray-700">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-purple-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-white mb-1">127</h3>
                        <p class="text-sm text-gray-400 mb-1">Total Clients</p>
                        <p class="text-xs text-green-400">+8 this month</p>
                    </div>
                </div>

                <!-- Avg Rating Card -->
                <div class="bg-[#15132B] p-6 rounded-lg shadow-lg border border-gray-700">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-yellow-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-white mb-1">4.8</h3>
                        <p class="text-sm text-gray-400 mb-1">Avg Rating</p>
                        <p class="text-xs text-green-400">+0.1 from last month</p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
                <!-- Recent Jobs Section -->
                <div class="xl:col-span-2 bg-[#15132B] p-6 rounded-lg shadow-lg border border-gray-700">
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h2 class="text-xl font-bold text-white mb-2">Recent Jobs</h2>
                            <p class="text-gray-400 text-sm">Track your ongoing and completed projects</p>
                        </div>
                        <button class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors text-sm font-medium flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            New Service
                        </button>
                    </div>

                    <!-- Job Card 1 -->
                    <div class="bg-gray-800 p-4 rounded-lg mb-4 border border-gray-700">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="font-bold text-lg text-white mb-1">Billboard Installation - Lekki</h3>
                                <div class="flex items-center space-x-4 text-sm text-gray-400">
                                    <span>Client: <span class="text-white">MTN Nigeria</span></span>
                                    <span>Service: <span class="text-white">Installation</span></span>
                                </div>
                            </div>
                            <span class="bg-blue-500 text-white text-xs font-bold px-3 py-1 rounded-full">in progress</span>
                        </div>
                        <div class="flex justify-between items-center mb-3">
                            <div class="text-sm">
                                <span class="text-gray-400">Amount: </span>
                                <span class="text-white font-semibold">₦450,000</span>
                            </div>
                            <div class="text-sm">
                                <span class="text-gray-400">Deadline: </span>
                                <span class="text-white font-semibold">Aug 30, 2024</span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="flex justify-between items-center mb-1">
                                <span class="text-sm text-gray-400">Progress</span>
                                <span class="text-sm text-white font-semibold">75%</span>
                            </div>
                            <div class="w-full bg-gray-700 rounded-full h-2">
                                <div class="bg-blue-500 h-2 rounded-full" style="width: 75%"></div>
                            </div>
                        </div>
                        <div class="flex justify-end space-x-2">
                            <button class="p-2 text-gray-400 hover:text-white transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </button>
                            <button class="p-2 text-gray-400 hover:text-white transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Job Card 2 -->
                    <div class="bg-gray-800 p-4 rounded-lg mb-4 border border-gray-700">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="font-bold text-lg text-white mb-1">Creative Design - Summer Campaign</h3>
                                <div class="flex items-center space-x-4 text-sm text-gray-400">
                                    <span>Client: <span class="text-white">Coca-Cola</span></span>
                                    <span>Service: <span class="text-white">Design</span></span>
                                </div>
                            </div>
                            <span class="bg-yellow-500 text-white text-xs font-bold px-3 py-1 rounded-full">pending review</span>
                        </div>
                        <div class="flex justify-between items-center mb-3">
                            <div class="text-sm">
                                <span class="text-gray-400">Amount: </span>
                                <span class="text-white font-semibold">₦180,000</span>
                            </div>
                            <div class="text-sm">
                                <span class="text-gray-400">Deadline: </span>
                                <span class="text-white font-semibold">Sep 5, 2024</span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="flex justify-between items-center mb-1">
                                <span class="text-sm text-gray-400">Progress</span>
                                <span class="text-sm text-white font-semibold">90%</span>
                            </div>
                            <div class="w-full bg-gray-700 rounded-full h-2">
                                <div class="bg-yellow-500 h-2 rounded-full" style="width: 90%"></div>
                            </div>
                        </div>
                        <div class="flex justify-end space-x-2">
                            <button class="p-2 text-gray-400 hover:text-white transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </button>
                            <button class="p-2 text-gray-400 hover:text-white transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Job Card 3 -->
                    <div class="bg-gray-800 p-4 rounded-lg border border-gray-700">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="font-bold text-lg text-white mb-1">Maintenance - Victoria Island</h3>
                                <div class="flex items-center space-x-4 text-sm text-gray-400">
                                    <span>Client: <span class="text-white">Dangote Group</span></span>
                                    <span>Service: <span class="text-white">Maintenance</span></span>
                                </div>
                            </div>
                            <span class="bg-green-500 text-white text-xs font-bold px-3 py-1 rounded-full">completed</span>
                        </div>
                        <div class="flex justify-between items-center mb-3">
                            <div class="text-sm">
                                <span class="text-gray-400">Amount: </span>
                                <span class="text-white font-semibold">₦120,000</span>
                            </div>
                            <div class="text-sm">
                                <span class="text-gray-400">Deadline: </span>
                                <span class="text-white font-semibold">Aug 25, 2024</span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="flex justify-between items-center mb-1">
                                <span class="text-sm text-gray-400">Progress</span>
                                <span class="text-sm text-white font-semibold">100%</span>
                            </div>
                            <div class="w-full bg-gray-700 rounded-full h-2">
                                <div class="bg-green-500 h-2 rounded-full" style="width: 100%"></div>
                            </div>
                        </div>
                        <div class="flex justify-end space-x-2">
                            <button class="p-2 text-gray-400 hover:text-white transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </button>
                            <button class="p-2 text-gray-400 hover:text-white transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Right Sidebar Content -->
                <div class="space-y-6">
                    <!-- Top Clients Section -->
                    <div class="bg-[#15132B] p-6 rounded-lg shadow-lg border border-gray-700">
                        <h2 class="text-xl font-bold text-white mb-2">Top Clients</h2>
                        <p class="text-gray-400 text-sm mb-4">Your most valuable customers</p>
                        
                        <div class="space-y-4">
                            <!-- Client 1 -->
                            <div class="flex items-center justify-between p-3 bg-gray-800 rounded-lg border border-gray-700">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold mr-3">MT</div>
                                    <div>
                                        <p class="font-semibold text-white">MTN Nigeria</p>
                                        <p class="text-xs text-gray-400">12 jobs • ₦1.2M</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm text-yellow-400 font-semibold">4.9</p>
                                </div>
                            </div>

                            <!-- Client 2 -->
                            <div class="flex items-center justify-between p-3 bg-gray-800 rounded-lg border border-gray-700">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-red-500 rounded-full flex items-center justify-center text-white font-bold mr-3">CC</div>
                                    <div>
                                        <p class="font-semibold text-white">Coca-Cola</p>
                                        <p class="text-xs text-gray-400">8 jobs • ₦850K</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm text-yellow-400 font-semibold">4.8</p>
                                </div>
                            </div>

                            <!-- Client 3 -->
                            <div class="flex items-center justify-between p-3 bg-gray-800 rounded-lg border border-gray-700">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center text-white font-bold mr-3">DG</div>
                                    <div>
                                        <p class="font-semibold text-white">Dangote Group</p>
                                        <p class="text-xs text-gray-400">6 jobs • ₦720K</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm text-yellow-400 font-semibold">4.7</p>
                                </div>
                            </div>

                            <!-- Client 4 -->
                            <div class="flex items-center justify-between p-3 bg-gray-800 rounded-lg border border-gray-700">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-purple-500 rounded-full flex items-center justify-center text-white font-bold mr-3">FB</div>
                                    <div>
                                        <p class="font-semibold text-white">First Bank</p>
                                        <p class="text-xs text-gray-400">4 jobs • ₦580K</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm text-yellow-400 font-semibold">4.9</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- My Services Section -->
                    <div class="bg-[#15132B] p-6 rounded-lg shadow-lg border border-gray-700">
                        <h2 class="text-xl font-bold text-white mb-2">My Services</h2>
                        <p class="text-gray-400 text-sm mb-4">Services you offer</p>
                        
                        <div class="space-y-4">
                            <!-- Service 1 -->
                            <div class="p-3 bg-gray-800 rounded-lg border border-gray-700">
                                <div class="flex justify-between items-center mb-2">
                                    <h3 class="font-semibold text-white">Billboard Installation</h3>
                                    <span class="bg-green-500 text-white text-xs font-bold px-2 py-1 rounded-full">active</span>
                                </div>
                                <div class="flex justify-between text-sm text-gray-400">
                                    <span>Jobs: <span class="text-white font-semibold">45</span></span>
                                    <span>Rating: <span class="text-yellow-400 font-semibold">4.8</span></span>
                                </div>
                            </div>

                            <!-- Service 2 -->
                            <div class="p-3 bg-gray-800 rounded-lg border border-gray-700">
                                <div class="flex justify-between items-center mb-2">
                                    <h3 class="font-semibold text-white">Creative Design Services</h3>
                                    <span class="bg-green-500 text-white text-xs font-bold px-2 py-1 rounded-full">active</span>
                                </div>
                                <div class="flex justify-between text-sm text-gray-400">
                                    <span>Jobs: <span class="text-white font-semibold">32</span></span>
                                    <span>Rating: <span class="text-yellow-400 font-semibold">4.9</span></span>
                                </div>
                            </div>

                            <!-- Service 3 -->
                            <div class="p-3 bg-gray-800 rounded-lg border border-gray-700">
                                <div class="flex justify-between items-center mb-2">
                                    <h3 class="font-semibold text-white">Billboard Maintenance</h3>
                                    <span class="bg-green-500 text-white text-xs font-bold px-2 py-1 rounded-full">active</span>
                                </div>
                                <div class="flex justify-between text-sm text-gray-400">
                                    <span>Jobs: <span class="text-white font-semibold">78</span></span>
                                    <span>Rating: <span class="text-yellow-400 font-semibold">4.7</span></span>
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
