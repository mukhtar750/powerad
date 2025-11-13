<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - PowerAD Portal</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('build/assets/app-BdhG_vQw.css') }}">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .font-orbitron { font-family: 'Orbitron', sans-serif; }
        .text-orange { color: #FF8C00; }
        /* Custom toggle switch styles */
        .toggle-switch {
            position: relative;
            display: inline-block;
            width: 40px;
            height: 20px;
        }
        .toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #4B5563; /* bg-gray-600 */
            transition: .4s;
            border-radius: 20px;
        }
        .slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            left: 2px;
            bottom: 2px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }
        input:checked + .slider {
            background-color: #8B5CF6; /* bg-purple-600 */
        }
        input:checked + .slider:before {
            transform: translateX(20px);
        }
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
                <a href="{{ route('dashboard.serviceprovider.messages') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
                    <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                    <span class="text-gray-300">Messages</span>
                </a>
                <a href="{{ route('dashboard.serviceprovider.settings') }}" class="flex items-center py-3 px-4 rounded-lg bg-gray-700 text-white">
                    <svg class="w-5 h-5 mr-3 text-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <span class="text-white font-medium">Settings</span>
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
                <h1 class="text-3xl font-bold text-white mb-2">Settings</h1>
                <p class="text-gray-400 text-lg">Manage your account settings and preferences.</p>
            </header>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Profile Information -->
                <div class="bg-[#15132B] p-6 rounded-lg shadow-lg border border-gray-700">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-blue-500/20 rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </div>
                        <h2 class="text-xl font-bold text-white">Profile Information</h2>
                    </div>
                    <p class="text-gray-400 text-sm mb-4">Update your account's profile information and email address.</p>
                    <form class="space-y-4">
                        <div>
                            <label for="first_name" class="block text-sm font-medium text-gray-300 mb-1">First Name</label>
                            <input type="text" id="first_name" class="w-full p-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 text-white" value="John">
                        </div>
                        <div>
                            <label for="last_name" class="block text-sm font-medium text-gray-300 mb-1">Last Name</label>
                            <input type="text" id="last_name" class="w-full p-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 text-white" value="Doe">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-300 mb-1">Email Address</label>
                            <input type="email" id="email" class="w-full p-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 text-white" value="john.doe@example.com">
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-300 mb-1">Phone Number</label>
                            <input type="tel" id="phone" class="w-full p-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 text-white" value="+1 (555) 123-4567">
                        </div>
                        <div>
                            <label for="company" class="block text-sm font-medium text-gray-300 mb-1">Company</label>
                            <input type="text" id="company" class="w-full p-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 text-white" value="Tech Solutions Pro">
                        </div>
                        <button type="submit" class="px-5 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors font-medium">Save Changes</button>
                    </form>
                </div>

                <!-- Notifications -->
                <div class="bg-[#15132B] p-6 rounded-lg shadow-lg border border-gray-700">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-green-500/20 rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 01-3 3H9a3 3 0 01-3-3v-1m6-10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </div>
                        <h2 class="text-xl font-bold text-white">Notifications</h2>
                    </div>
                    <p class="text-gray-400 text-sm mb-4">Manage your notification preferences.</p>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="font-medium text-white">Email Notifications</p>
                                <p class="text-xs text-gray-400">Receive important updates via email.</p>
                            </div>
                            <label class="toggle-switch">
                                <input type="checkbox" checked>
                                <span class="slider"></span>
                            </label>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="font-medium text-white">Job Updates</p>
                                <p class="text-xs text-gray-400">Get alerts on job status changes.</p>
                            </div>
                            <label class="toggle-switch">
                                <input type="checkbox" checked>
                                <span class="slider"></span>
                            </label>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="font-medium text-white">Payment Alerts</p>
                                <p class="text-xs text-gray-400">Notify me about payment confirmations and issues.</p>
                            </div>
                            <label class="toggle-switch">
                                <input type="checkbox">
                                <span class="slider"></span>
                            </label>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="font-medium text-white">Client Messages</p>
                                <p class="text-xs text-gray-400">Get notified when clients send messages.</p>
                            </div>
                            <label class="toggle-switch">
                                <input type="checkbox" checked>
                                <span class="slider"></span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Security -->
                <div class="bg-[#15132B] p-6 rounded-lg shadow-lg border border-gray-700">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-red-500/20 rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-6 h-6 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.279A7.498 7.498 0 0112 3c2.347 0 4.513.98 6.065 2.572m-1.036 2.102a7.498 7.498 0 01-10.038 0M12 15v2m-2 0H9a2 2 0 00-2 2v1a2 2 0 002 2h6a2 2 0 002-2v-1a2 2 0 00-2-2h-1m-6-4h6"></path></svg>
                        </div>
                        <h2 class="text-xl font-bold text-white">Security</h2>
                    </div>
                    <p class="text-gray-400 text-sm mb-4">Ensure your account is secure by updating your password regularly.</p>
                    <form class="space-y-4">
                        <div>
                            <label for="current_password" class="block text-sm font-medium text-gray-300 mb-1">Current Password</label>
                            <input type="password" id="current_password" class="w-full p-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 text-white">
                        </div>
                        <div>
                            <label for="new_password" class="block text-sm font-medium text-gray-300 mb-1">New Password</label>
                            <input type="password" id="new_password" class="w-full p-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 text-white">
                        </div>
                        <div>
                            <label for="confirm_password" class="block text-sm font-medium text-gray-300 mb-1">Confirm New Password</label>
                            <input type="password" id="confirm_password" class="w-full p-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 text-white">
                        </div>
                        <button type="submit" class="px-5 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors font-medium">Update Password</button>
                    </form>
                </div>

                <!-- Service Preferences -->
                <div class="bg-[#15132B] p-6 rounded-lg shadow-lg border border-gray-700">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-orange-500/20 rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-6 h-6 text-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        </div>
                        <h2 class="text-xl font-bold text-white">Service Preferences</h2>
                    </div>
                    <p class="text-gray-400 text-sm mb-4">Configure your service availability and preferences.</p>
                    <div class="space-y-4">
                        <div>
                            <label for="availability" class="block text-sm font-medium text-gray-300 mb-1">Availability Status</label>
                            <select id="availability" class="w-full p-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 text-white">
                                <option value="available">Available</option>
                                <option value="busy">Busy</option>
                                <option value="unavailable">Unavailable</option>
                            </select>
                        </div>
                        <div>
                            <label for="hourly_rate" class="block text-sm font-medium text-gray-300 mb-1">Hourly Rate ($)</label>
                            <input type="number" id="hourly_rate" class="w-full p-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 text-white" value="75">
                        </div>
                        <div>
                            <label for="service_radius" class="block text-sm font-medium text-gray-300 mb-1">Service Radius (miles)</label>
                            <input type="number" id="service_radius" class="w-full p-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 text-white" value="50">
                        </div>
                        <button type="submit" class="px-5 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors font-medium">Update Preferences</button>
                    </div>
                </div>

                <!-- Account Management -->
                <div class="bg-[#15132B] p-6 rounded-lg shadow-lg border border-gray-700">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-yellow-500/20 rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path></svg>
                        </div>
                        <h2 class="text-xl font-bold text-white">Account Management</h2>
                    </div>
                    <p class="text-gray-400 text-sm mb-4">Manage your account data and privacy settings.</p>
                    <div class="space-y-4">
                        <button class="w-full px-4 py-2 bg-gray-700 border border-gray-600 text-white rounded-lg hover:bg-gray-600 transition-colors text-sm font-medium">
                            Download Account Data
                        </button>
                        <button class="w-full px-4 py-2 bg-gray-700 border border-gray-600 text-white rounded-lg hover:bg-gray-600 transition-colors text-sm font-medium">
                            Export Service History
                        </button>
                        <button class="w-full px-4 py-2 bg-red-600 border border-red-500 text-white rounded-lg hover:bg-red-700 transition-colors text-sm font-medium">
                            Delete Account
                        </button>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
