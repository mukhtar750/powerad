<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARCON Dashboard - National Regulator</title>
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
                        <div class="text-orange text-sm font-medium">ARCON</div>
                        <div class="text-gray-400 text-xs">National Regulator</div>
                    </div>
                </div>
                
                <!-- Navigation -->
                <nav class="space-y-2">
                    <a href="{{ route('dashboard.arcon.index') }}" class="flex items-center py-3 px-4 rounded-lg bg-gray-700 text-white">
                        <i class="fas fa-tachometer-alt w-5 h-5 mr-3 text-orange"></i>
                        <span class="text-white font-medium">Dashboard</span>
                    </a>
                    <a href="{{ route('dashboard.arcon.campaigns') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
                        <i class="fas fa-flag w-5 h-5 mr-3 text-gray-400"></i>
                        <span class="text-gray-300">Campaign Assessment</span>
                    </a>
                    <a href="{{ route('dashboard.arcon.multistate-campaigns') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
                        <i class="fas fa-map-marked-alt w-5 h-5 mr-3 text-gray-400"></i>
                        <span class="text-gray-300">Multi-state Campaigns</span>
                    </a>
                    <a href="{{ route('dashboard.arcon.sanctions') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
                        <i class="fas fa-gavel w-5 h-5 mr-3 text-gray-400"></i>
                        <span class="text-gray-300">Sanctions</span>
                    </a>
                    <a href="{{ route('dashboard.arcon.sanctions.tracking') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
                        <i class="fas fa-chart-line w-5 h-5 mr-3 text-gray-400"></i>
                        <span class="text-gray-300">Sanction Tracking</span>
                    </a>
                    <a href="{{ route('dashboard.arcon.notifications') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
                        <i class="fas fa-bell w-5 h-5 mr-3 text-gray-400"></i>
                        <span class="text-gray-300">Notifications</span>
                    </a>
                    <a href="{{ route('dashboard.arcon.reports') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
                        <i class="fas fa-chart-bar w-5 h-5 mr-3 text-gray-400"></i>
                        <span class="text-gray-300">Reports</span>
                    </a>
                    <a href="{{ route('dashboard.arcon.settings') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
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
                        <span class="text-white font-bold text-sm">AR</span>
                    </div>
                </div>
            </div>

            <!-- Header -->
            <header class="mb-8">
                <h1 class="text-3xl font-bold text-white mb-2">ARCON Dashboard</h1>
                <p class="text-gray-400 text-lg">National Regulator - Campaign Assessment, Flagging & Multi-state Monitoring</p>
            </header>

            <!-- Summary Statistics Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <div class="bg-[#1A1A2E] p-6 rounded-lg border border-gray-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm">Total Campaigns</p>
                            <p class="text-2xl font-bold text-white">{{ $stats['total_campaigns'] }}</p>
                        </div>
                        <div class="w-12 h-12 bg-blue-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-bullhorn text-white text-xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-[#1A1A2E] p-6 rounded-lg border border-gray-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm">Flagged Campaigns</p>
                            <p class="text-2xl font-bold text-red-400">{{ $stats['flagged_campaigns'] }}</p>
                        </div>
                        <div class="w-12 h-12 bg-red-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-flag text-white text-xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-[#1A1A2E] p-6 rounded-lg border border-gray-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm">Multi-state Campaigns</p>
                            <p class="text-2xl font-bold text-yellow-400">{{ $stats['multistate_campaigns'] }}</p>
                        </div>
                        <div class="w-12 h-12 bg-yellow-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-map-marked-alt text-white text-xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-[#1A1A2E] p-6 rounded-lg border border-gray-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm">Active Sanctions</p>
                            <p class="text-2xl font-bold text-orange-400">{{ $stats['active_sanctions'] }}</p>
                        </div>
                        <div class="w-12 h-12 bg-orange-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-gavel text-white text-xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-[#1A1A2E] p-6 rounded-lg border border-gray-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm">Pending Assessments</p>
                            <p class="text-2xl font-bold text-blue-400">{{ $stats['pending_assessments'] }}</p>
                        </div>
                        <div class="w-12 h-12 bg-blue-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-clipboard-check text-white text-xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-[#1A1A2E] p-6 rounded-lg border border-gray-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm">Resolved Issues</p>
                            <p class="text-2xl font-bold text-green-400">{{ $stats['resolved_issues'] }}</p>
                        </div>
                        <div class="w-12 h-12 bg-green-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-check-circle text-white text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Flagged Campaigns -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <div class="bg-[#1A1A2E] p-6 rounded-lg border border-gray-700">
                    <h3 class="text-lg font-semibold text-white mb-4">Recent Flagged Campaigns</h3>
                    <div class="space-y-3">
                        @forelse($recentFlagged as $campaign)
                        <div class="flex items-center justify-between p-3 bg-gray-800 rounded-lg">
                            <div class="flex items-center space-x-3">
                                <div class="w-2 h-2 bg-red-500 rounded-full"></div>
                                <div>
                                    <p class="text-white text-sm font-medium">{{ $campaign['name'] }}</p>
                                    <p class="text-gray-400 text-xs">{{ $campaign['violation'] }}</p>
                                </div>
                            </div>
                            <span class="text-red-400 text-xs font-medium">{{ $campaign['severity'] }}</span>
                        </div>
                        @empty
                        <p class="text-gray-400 text-sm">No recent flagged campaigns</p>
                        @endforelse
                    </div>
                </div>

                <div class="bg-[#1A1A2E] p-6 rounded-lg border border-gray-700">
                    <h3 class="text-lg font-semibold text-white mb-4">Multi-state Alerts</h3>
                    <div class="space-y-3">
                        @forelse($multistateAlerts as $alert)
                        <div class="flex items-center justify-between p-3 bg-gray-800 rounded-lg">
                            <div class="flex items-center space-x-3">
                                <div class="w-2 h-2 bg-yellow-500 rounded-full"></div>
                                <div>
                                    <p class="text-white text-sm font-medium">{{ $alert['campaign'] }}</p>
                                    <p class="text-gray-400 text-xs">{{ $alert['states'] }}</p>
                                </div>
                            </div>
                            <span class="text-yellow-400 text-xs font-medium">Multi-state</span>
                        </div>
                        @empty
                        <p class="text-gray-400 text-sm">No multi-state alerts</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-[#1A1A2E] p-6 rounded-lg border border-gray-700">
                <h3 class="text-lg font-semibold text-white mb-4">Quick Actions</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <a href="{{ route('dashboard.arcon.campaigns') }}" class="flex items-center p-4 bg-gray-800 rounded-lg hover:bg-gray-700 transition-colors">
                        <i class="fas fa-flag text-orange w-6 h-6 mr-3"></i>
                        <span class="text-white">Assess Campaigns</span>
                    </a>
                    <a href="{{ route('dashboard.arcon.multistate-campaigns') }}" class="flex items-center p-4 bg-gray-800 rounded-lg hover:bg-gray-700 transition-colors">
                        <i class="fas fa-map-marked-alt text-blue-500 w-6 h-6 mr-3"></i>
                        <span class="text-white">Multi-state Monitor</span>
                    </a>
                    <a href="{{ route('dashboard.arcon.sanctions') }}" class="flex items-center p-4 bg-gray-800 rounded-lg hover:bg-gray-700 transition-colors">
                        <i class="fas fa-gavel text-red-500 w-6 h-6 mr-3"></i>
                        <span class="text-white">Issue Sanctions</span>
                    </a>
                    <a href="{{ route('dashboard.arcon.reports') }}" class="flex items-center p-4 bg-gray-800 rounded-lg hover:bg-gray-700 transition-colors">
                        <i class="fas fa-chart-bar text-green-500 w-6 h-6 mr-3"></i>
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
