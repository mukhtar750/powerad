<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>State Regulator Dashboard</title>
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
                    <a href="{{ route('dashboard.state-regulator.index') }}" class="flex items-center py-3 px-4 rounded-lg bg-gray-700 text-white">
                        <i class="fas fa-tachometer-alt w-5 h-5 mr-3 text-orange"></i>
                        <span class="text-white font-medium">Dashboard</span>
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
                    <a href="{{ route('dashboard.state-regulator.citizen-reports') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
                        <i class="fas fa-exclamation-triangle w-5 h-5 mr-3 text-gray-400"></i>
                        <span class="text-gray-300">Citizen Reports</span>
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
                <h1 class="text-3xl font-bold text-white mb-2">State Regulator Dashboard</h1>
                <p class="text-gray-400 text-lg">Local Billboard Management, Permits & Enforcement</p>
            </header>

            <!-- Summary Statistics Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <div class="bg-[#1A1A2E] p-6 rounded-lg border border-gray-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm">Total Billboards</p>
                            <p class="text-2xl font-bold text-white">{{ $stats['total_billboards'] }}</p>
                        </div>
                        <div class="w-12 h-12 bg-blue-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-map-marker-alt text-white text-xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-[#1A1A2E] p-6 rounded-lg border border-gray-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm">Pending Permits</p>
                            <p class="text-2xl font-bold text-yellow-400">{{ $stats['pending_permits'] }}</p>
                        </div>
                        <div class="w-12 h-12 bg-yellow-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-file-alt text-white text-xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-[#1A1A2E] p-6 rounded-lg border border-gray-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm">Citizen Reports</p>
                            <p class="text-2xl font-bold text-red-400">{{ $stats['citizen_reports'] }}</p>
                        </div>
                        <div class="w-12 h-12 bg-red-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-exclamation-triangle text-white text-xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-[#1A1A2E] p-6 rounded-lg border border-gray-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm">Active Enforcement</p>
                            <p class="text-2xl font-bold text-orange-400">{{ $stats['active_enforcement'] }}</p>
                        </div>
                        <div class="w-12 h-12 bg-orange-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-shield-alt text-white text-xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-[#1A1A2E] p-6 rounded-lg border border-gray-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm">Verified Billboards</p>
                            <p class="text-2xl font-bold text-green-400">{{ $stats['verified_billboards'] }}</p>
                        </div>
                        <div class="w-12 h-12 bg-green-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-check-circle text-white text-xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-[#1A1A2E] p-6 rounded-lg border border-gray-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm">Compliance Rate</p>
                            <p class="text-2xl font-bold text-blue-400">{{ $stats['compliance_rate'] }}%</p>
                        </div>
                        <div class="w-12 h-12 bg-blue-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-chart-pie text-white text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Citizen Reports -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <div class="bg-[#1A1A2E] p-6 rounded-lg border border-gray-700">
                    <h3 class="text-lg font-semibold text-white mb-4">Recent Citizen Reports</h3>
                    <div class="space-y-3">
                        @forelse($recentReports as $report)
                        <div class="flex items-center justify-between p-3 bg-gray-800 rounded-lg">
                            <div class="flex items-center space-x-3">
                                <div class="w-2 h-2 bg-red-500 rounded-full"></div>
                                <div>
                                    <p class="text-white text-sm font-medium">{{ $report['title'] }}</p>
                                    <p class="text-gray-400 text-xs">{{ $report['location'] }}</p>
                                </div>
                            </div>
                            <span class="text-red-400 text-xs font-medium">{{ $report['status'] }}</span>
                        </div>
                        @empty
                        <p class="text-gray-400 text-sm">No recent citizen reports</p>
                        @endforelse
                    </div>
                </div>

                <div class="bg-[#1A1A2E] p-6 rounded-lg border border-gray-700">
                    <h3 class="text-lg font-semibold text-white mb-4">Pending Verifications</h3>
                    <div class="space-y-3">
                        @forelse($pendingVerifications as $verification)
                        <div class="flex items-center justify-between p-3 bg-gray-800 rounded-lg">
                            <div class="flex items-center space-x-3">
                                <div class="w-2 h-2 bg-yellow-500 rounded-full"></div>
                                <div>
                                    <p class="text-white text-sm font-medium">{{ $verification['billboard'] }}</p>
                                    <p class="text-gray-400 text-xs">{{ $verification['location'] }}</p>
                                </div>
                            </div>
                            <span class="text-yellow-400 text-xs font-medium">Pending</span>
                        </div>
                        @empty
                        <p class="text-gray-400 text-sm">No pending verifications</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-[#1A1A2E] p-6 rounded-lg border border-gray-700">
                <h3 class="text-lg font-semibold text-white mb-4">Quick Actions</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <a href="{{ route('dashboard.state-regulator.billboards.create') }}" class="flex items-center p-4 bg-gray-800 rounded-lg hover:bg-gray-700 transition-colors">
                        <i class="fas fa-plus text-green-500 w-6 h-6 mr-3"></i>
                        <span class="text-white">Add Billboard</span>
                    </a>
                    <a href="{{ route('dashboard.state-regulator.verification-queue') }}" class="flex items-center p-4 bg-gray-800 rounded-lg hover:bg-gray-700 transition-colors">
                        <i class="fas fa-camera text-blue-500 w-6 h-6 mr-3"></i>
                        <span class="text-white">GPS Verification</span>
                    </a>
                    <a href="{{ route('dashboard.state-regulator.citizen-reports') }}" class="flex items-center p-4 bg-gray-800 rounded-lg hover:bg-gray-700 transition-colors">
                        <i class="fas fa-exclamation-triangle text-red-500 w-6 h-6 mr-3"></i>
                        <span class="text-white">Citizen Reports</span>
                    </a>
                    <a href="{{ route('dashboard.state-regulator.reports') }}" class="flex items-center p-4 bg-gray-800 rounded-lg hover:bg-gray-700 transition-colors">
                        <i class="fas fa-chart-bar text-purple-500 w-6 h-6 mr-3"></i>
                        <span class="text-white">Generate Reports</span>
                    </a>
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
