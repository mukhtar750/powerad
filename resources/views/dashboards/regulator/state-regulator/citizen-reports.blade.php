<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citizen Reports - State Regulator</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .logo-container {
            position: relative;
            overflow: hidden;
        }
        .logo-image {
            transition: transform 0.3s ease;
        }
        .logo-container:hover .logo-image {
            transform: scale(1.05);
        }
        .text-orange {
            color: #ff6b35;
        }
        .bg-orange {
            background-color: #ff6b35;
        }
        .border-orange {
            border-color: #ff6b35;
        }
    </style>
</head>
<body class="antialiased bg-[#0E0D1C] text-gray-100 font-sans">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-[#15132B] p-6 space-y-6 flex flex-col justify-between shadow-lg">
            <div>
                <!-- Logo Section -->
                <div class="flex items-center space-x-3 mb-6">
                    <div class="logo-container">
                        <img src="{{ asset('images/primarylogo.png') }}" 
                             alt="PowerAD International Logo" 
                             class="logo-image h-8 w-auto">
                    </div>
                    <div>
                        <div class="text-orange text-sm font-medium">State Regulator</div>
                        <div class="text-gray-400 text-xs">Local Management</div>
                    </div>
                </div>
                
                <!-- Navigation -->
                <nav class="space-y-2">
                    <a href="{{ route('dashboard.state-regulator.index') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
                        <i class="fas fa-tachometer-alt w-5 h-5 mr-3 text-gray-400"></i>
                        <span class="text-gray-300">Dashboard</span>
                    </a>
                    <a href="{{ route('dashboard.state-regulator.billboards') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
                        <i class="fas fa-map-marker-alt w-5 h-5 mr-3 text-gray-400"></i>
                        <span class="text-gray-300">Billboard Sites</span>
                    </a>
                    <a href="{{ route('dashboard.state-regulator.verification-queue') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
                        <i class="fas fa-camera w-5 h-5 mr-3 text-gray-400"></i>
                        <span class="text-gray-300">GPS Verification</span>
                    </a>
                    <a href="{{ route('dashboard.state-regulator.permits') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
                        <i class="fas fa-file-alt w-5 h-5 mr-3 text-gray-400"></i>
                        <span class="text-gray-300">Permits</span>
                    </a>
                    <a href="{{ route('dashboard.state-regulator.citizen-reports') }}" class="flex items-center py-3 px-4 rounded-lg bg-gray-700 text-white">
                        <i class="fas fa-exclamation-triangle w-5 h-5 mr-3 text-orange"></i>
                        <span class="text-white font-medium">Citizen Reports</span>
                    </a>
                    <a href="{{ route('dashboard.state-regulator.enforcement') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
                        <i class="fas fa-shield-alt w-5 h-5 mr-3 text-gray-400"></i>
                        <span class="text-gray-300">Enforcement</span>
                    </a>
                    <a href="{{ route('dashboard.state-regulator.reports') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
                        <i class="fas fa-chart-bar w-5 h-5 mr-3 text-gray-400"></i>
                        <span class="text-gray-300">Reports</span>
                    </a>
                    <a href="{{ route('dashboard.state-regulator.settings') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
                        <i class="fas fa-cog w-5 h-5 mr-3 text-gray-400"></i>
                        <span class="text-gray-300">Settings</span>
                    </a>
                </nav>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-4 md:p-6 overflow-y-auto">
            <!-- Mobile Menu Button -->
            <div class="lg:hidden mb-4">
                <button id="mobile-menu-btn" class="p-2 rounded-lg bg-gray-700 text-white">
                    <i class="fas fa-bars w-6 h-6"></i>
                </button>
            </div>
            
            <!-- Top Bar -->
            <div class="flex justify-between items-center mb-6">
                <div class="flex items-center">
                    <button class="p-2 rounded-lg hover:bg-gray-700 transition-colors mr-4">
                        <i class="fas fa-bell w-6 h-6 text-gray-400"></i>
                    </button>
                    <div class="w-10 h-10 bg-gradient-to-r from-orange to-yellow rounded-full flex items-center justify-center">
                        <span class="text-white font-bold text-sm">SR</span>
                    </div>
                </div>
            </div>

            <!-- Header -->
            <header class="mb-8">
                <h1 class="text-3xl font-bold text-white mb-2">Citizen Reports</h1>
                <p class="text-gray-400 text-lg">Manage reports from citizens about unsafe or illegal billboards</p>
            </header>

            <!-- Filter and Search -->
            <div class="bg-[#1A1A2E] p-6 rounded-lg border border-gray-700 mb-6">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Status</label>
                        <select class="w-full bg-gray-800 border border-gray-600 rounded-lg px-3 py-2 text-white">
                            <option value="">All Status</option>
                            <option value="pending">Pending</option>
                            <option value="investigating">Investigating</option>
                            <option value="resolved">Resolved</option>
                            <option value="dismissed">Dismissed</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Priority</label>
                        <select class="w-full bg-gray-800 border border-gray-600 rounded-lg px-3 py-2 text-white">
                            <option value="">All Priority</option>
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="high">High</option>
                            <option value="urgent">Urgent</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Date Range</label>
                        <input type="date" class="w-full bg-gray-800 border border-gray-600 rounded-lg px-3 py-2 text-white">
                    </div>
                    <div class="flex items-end">
                        <button class="w-full bg-orange text-white px-4 py-2 rounded-lg hover:bg-orange-600 transition-colors">
                            <i class="fas fa-search mr-2"></i>Filter
                        </button>
                    </div>
                </div>
            </div>

            <!-- Citizen Reports Table -->
            <div class="bg-[#1A1A2E] rounded-lg border border-gray-700 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-800">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Report ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Title</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Location</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Priority</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700">
                            <!-- Sample Data - Replace with actual data -->
                            <tr class="hover:bg-gray-800">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-white">#CR-001</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-white">Unsafe Billboard Structure</div>
                                    <div class="text-sm text-gray-400">Reported by John Doe</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">Victoria Island, Lagos</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs font-medium bg-red-100 text-red-800 rounded-full">High</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs font-medium bg-yellow-100 text-yellow-800 rounded-full">Investigating</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">2024-01-15</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('dashboard.state-regulator.citizen-reports.view', 1) }}" class="text-blue-400 hover:text-blue-300">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <button class="text-green-400 hover:text-green-300">
                                            <i class="fas fa-check"></i>
                                        </button>
                                        <button class="text-red-400 hover:text-red-300">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-800">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-white">#CR-002</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-white">Illegal Billboard Installation</div>
                                    <div class="text-sm text-gray-400">Reported by Jane Smith</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">Ikeja, Lagos</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs font-medium bg-orange-100 text-orange-800 rounded-full">Medium</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs font-medium bg-blue-100 text-blue-800 rounded-full">Pending</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">2024-01-14</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('dashboard.state-regulator.citizen-reports.view', 2) }}" class="text-blue-400 hover:text-blue-300">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <button class="text-green-400 hover:text-green-300">
                                            <i class="fas fa-check"></i>
                                        </button>
                                        <button class="text-red-400 hover:text-red-300">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-800">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-white">#CR-003</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-white">Obstructed Traffic Sign</div>
                                    <div class="text-sm text-gray-400">Reported by Mike Johnson</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">Surulere, Lagos</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">Low</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">Resolved</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">2024-01-13</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('dashboard.state-regulator.citizen-reports.view', 3) }}" class="text-blue-400 hover:text-blue-300">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <button class="text-green-400 hover:text-green-300">
                                            <i class="fas fa-check"></i>
                                        </button>
                                        <button class="text-red-400 hover:text-red-300">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination -->
            <div class="mt-6 flex items-center justify-between">
                <div class="text-sm text-gray-400">
                    Showing 1 to 3 of 3 results
                </div>
                <div class="flex space-x-2">
                    <button class="px-3 py-2 bg-gray-800 text-gray-300 rounded-lg hover:bg-gray-700 disabled:opacity-50" disabled>
                        Previous
                    </button>
                    <button class="px-3 py-2 bg-gray-800 text-gray-300 rounded-lg hover:bg-gray-700">
                        Next
                    </button>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-btn')?.addEventListener('click', function() {
            // Mobile menu functionality here
        });
    </script>
</body>
</html>
