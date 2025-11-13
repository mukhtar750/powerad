<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citizen Report Details - State Regulator</title>
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
                    <a href="{{ route('dashboard.state-regulator.citizen-reports') }}" class="text-gray-400 hover:text-white mr-4">
                        <i class="fas fa-arrow-left w-5 h-5"></i>
                    </a>
                    <div class="w-10 h-10 bg-gradient-to-r from-orange to-yellow rounded-full flex items-center justify-center">
                        <span class="text-white font-bold text-sm">SR</span>
                    </div>
                </div>
            </div>

            <!-- Header -->
            <header class="mb-8">
                <h1 class="text-3xl font-bold text-white mb-2">Citizen Report Details</h1>
                <p class="text-gray-400 text-lg">Report #CR-001 - Unsafe Billboard Structure</p>
            </header>

            <!-- Report Details -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                <!-- Main Report Information -->
                <div class="lg:col-span-2">
                    <div class="bg-[#1A1A2E] p-6 rounded-lg border border-gray-700 mb-6">
                        <h3 class="text-lg font-semibold text-white mb-4">Report Information</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-1">Report ID</label>
                                <p class="text-white">#CR-001</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-1">Status</label>
                                <span class="px-2 py-1 text-xs font-medium bg-yellow-100 text-yellow-800 rounded-full">Investigating</span>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-1">Priority</label>
                                <span class="px-2 py-1 text-xs font-medium bg-red-100 text-red-800 rounded-full">High</span>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-1">Date Reported</label>
                                <p class="text-white">January 15, 2024</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-1">Reporter</label>
                                <p class="text-white">John Doe</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-1">Contact</label>
                                <p class="text-white">john.doe@email.com</p>
                            </div>
                        </div>
                    </div>

                    <!-- Report Description -->
                    <div class="bg-[#1A1A2E] p-6 rounded-lg border border-gray-700 mb-6">
                        <h3 class="text-lg font-semibold text-white mb-4">Report Description</h3>
                        <p class="text-gray-300 leading-relaxed">
                            The billboard structure at Victoria Island appears to be in a dangerous condition. The metal framework shows signs of rust and corrosion, and there are visible cracks in the foundation. The structure seems unstable and poses a safety risk to pedestrians and vehicles passing by. The billboard is located near a busy intersection and could potentially collapse during heavy winds or storms.
                        </p>
                    </div>

                    <!-- Location Information -->
                    <div class="bg-[#1A1A2E] p-6 rounded-lg border border-gray-700">
                        <h3 class="text-lg font-semibold text-white mb-4">Location Information</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-1">Address</label>
                                <p class="text-white">Victoria Island, Lagos</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-1">GPS Coordinates</label>
                                <p class="text-white">6.4281° N, 3.4219° E</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-1">Nearest Landmark</label>
                                <p class="text-white">Lagos Business District</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-1">Traffic Impact</label>
                                <p class="text-white">High - Near busy intersection</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Panel -->
                <div class="lg:col-span-1">
                    <div class="bg-[#1A1A2E] p-6 rounded-lg border border-gray-700 mb-6">
                        <h3 class="text-lg font-semibold text-white mb-4">Actions</h3>
                        <div class="space-y-3">
                            <button class="w-full bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors">
                                <i class="fas fa-check mr-2"></i>Resolve Report
                            </button>
                            <button class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                                <i class="fas fa-search mr-2"></i>Investigate
                            </button>
                            <button class="w-full bg-orange-600 text-white px-4 py-2 rounded-lg hover:bg-orange-700 transition-colors">
                                <i class="fas fa-gavel mr-2"></i>Create Enforcement
                            </button>
                            <button class="w-full bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors">
                                <i class="fas fa-times mr-2"></i>Dismiss Report
                            </button>
                        </div>
                    </div>

                    <!-- Report Photos -->
                    <div class="bg-[#1A1A2E] p-6 rounded-lg border border-gray-700">
                        <h3 class="text-lg font-semibold text-white mb-4">Report Photos</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-gray-800 rounded-lg p-4 text-center">
                                <i class="fas fa-image text-gray-400 text-2xl mb-2"></i>
                                <p class="text-sm text-gray-400">Photo 1</p>
                                <button class="text-blue-400 hover:text-blue-300 text-sm mt-2">
                                    <i class="fas fa-download mr-1"></i>Download
                                </button>
                            </div>
                            <div class="bg-gray-800 rounded-lg p-4 text-center">
                                <i class="fas fa-image text-gray-400 text-2xl mb-2"></i>
                                <p class="text-sm text-gray-400">Photo 2</p>
                                <button class="text-blue-400 hover:text-blue-300 text-sm mt-2">
                                    <i class="fas fa-download mr-1"></i>Download
                                </button>
                            </div>
                            <div class="bg-gray-800 rounded-lg p-4 text-center">
                                <i class="fas fa-image text-gray-400 text-2xl mb-2"></i>
                                <p class="text-sm text-gray-400">Photo 3</p>
                                <button class="text-blue-400 hover:text-blue-300 text-sm mt-2">
                                    <i class="fas fa-download mr-1"></i>Download
                                </button>
                            </div>
                            <div class="bg-gray-800 rounded-lg p-4 text-center">
                                <i class="fas fa-image text-gray-400 text-2xl mb-2"></i>
                                <p class="text-sm text-gray-400">Photo 4</p>
                                <button class="text-blue-400 hover:text-blue-300 text-sm mt-2">
                                    <i class="fas fa-download mr-1"></i>Download
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Investigation Notes -->
            <div class="bg-[#1A1A2E] p-6 rounded-lg border border-gray-700 mb-6">
                <h3 class="text-lg font-semibold text-white mb-4">Investigation Notes</h3>
                <div class="space-y-4">
                    <div class="border-l-4 border-blue-500 pl-4">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm font-medium text-white">Initial Assessment</span>
                            <span class="text-xs text-gray-400">Jan 15, 2024 - 10:30 AM</span>
                        </div>
                        <p class="text-gray-300 text-sm">Report received and assigned to investigation team. Photos reviewed and structure appears to have significant rust damage.</p>
                    </div>
                    <div class="border-l-4 border-yellow-500 pl-4">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm font-medium text-white">Site Visit Scheduled</span>
                            <span class="text-xs text-gray-400">Jan 15, 2024 - 2:00 PM</span>
                        </div>
                        <p class="text-gray-300 text-sm">Site visit scheduled for tomorrow morning to assess the structural integrity of the billboard.</p>
                    </div>
                </div>
            </div>

            <!-- Add Investigation Note -->
            <div class="bg-[#1A1A2E] p-6 rounded-lg border border-gray-700">
                <h3 class="text-lg font-semibold text-white mb-4">Add Investigation Note</h3>
                <form>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-300 mb-2">Note</label>
                        <textarea class="w-full bg-gray-800 border border-gray-600 rounded-lg px-3 py-2 text-white" rows="4" placeholder="Add your investigation notes here..."></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-300 mb-2">Priority</label>
                        <select class="w-full bg-gray-800 border border-gray-600 rounded-lg px-3 py-2 text-white">
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="high">High</option>
                            <option value="urgent">Urgent</option>
                        </select>
                    </div>
                    <button type="submit" class="bg-orange text-white px-6 py-2 rounded-lg hover:bg-orange-600 transition-colors">
                        <i class="fas fa-plus mr-2"></i>Add Note
                    </button>
                </form>
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
