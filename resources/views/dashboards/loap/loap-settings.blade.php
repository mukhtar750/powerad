<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOAP Dashboard - Settings</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('build/assets/app-BdhG_vQw.css') }}">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .font-orbitron {
            font-family: 'Orbitron', sans-serif;
        }
        .bg-orange {
            background-color: #FF6B00;
        }
        .text-orange {
            color: #FF6B00;
        }
        .logo-container { display: flex; align-items: center; }
        .footer-logo-container { display: flex; align-items: center; }
        .toggle-switch {
            position: relative;
            display: inline-block;
            width: 48px;
            height: 24px;
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
            background-color: #ccc;
            transition: .4s;
            border-radius: 24px;
        }
        .slider:before {
            position: absolute;
            content: "";
            height: 18px;
            width: 18px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }
        input:checked + .slider {
            background-color: #8B5CF6;
        }
        input:checked + .slider:before {
            transform: translateX(24px);
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
                    <div class="flex">
                        <img src="{{ asset('images/primarylogo.png') }}" 
                             alt="PowerAD International Logo" 
                             class="h-8 w-auto">
                    </div>
                    <div>
                        <div class="text-orange text-sm font-medium">LOAP</div>
                    </div>
                </div>
                
                <!-- Navigation -->
                <nav>
                    <a href="/dashboard/loap" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">
                        <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        Dashboard
                    </a>
                    <a href="/dashboard/loap/billboards" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">
                        <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        My Billboards
                    </a>
                    <a href="/dashboard/loap/bookings" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">
                        <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        Bookings
                    </a>
                    <a href="/dashboard/loap/revenue" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">
                        <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        Revenue
                    </a>
                    <a href="/dashboard/loap/reviews" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">
                        <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.329 1.176l1.519 4.674c.3.921-.755 1.688-1.539 1.175l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.784.513-1.838-.254-1.539-1.175l1.519-4.674a1 1 0 00-.329-1.176l-3.976-2.888c-.784-.57-.382-1.81.588-1.81h4.915a1 1 0 00.95-.69l1.519-4.674z"></path></svg>
                        Reviews
                    </a>
                    <a href="/dashboard/loap/messages" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">
                        <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                        Messages
                    </a>
                    <a href="/dashboard/loap/settings" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2 bg-gray-700">
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

        <!-- Mobile Sidebar Overlay -->
        <div id="mobile-sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden hidden"></div>
        
        <!-- Mobile Sidebar -->
        <aside id="mobile-sidebar" class="fixed top-0 left-0 w-64 h-full bg-[#15132B] p-6 space-y-6 flex flex-col justify-between shadow-lg z-50 transform -translate-x-full transition-transform duration-300 ease-in-out lg:hidden">
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
                
                <!-- Navigation -->
                <nav>
                    <a href="/dashboard/loap" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">Dashboard</a>
                    <a href="/dashboard/loap/billboards" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">My Billboards</a>
                    <a href="/dashboard/loap/bookings" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">Bookings</a>
                    <a href="/dashboard/loap/revenue" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">Revenue</a>
                    <a href="/dashboard/loap/reviews" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">Reviews</a>
                    <a href="/dashboard/loap/messages" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">Messages</a>
                    <a href="/dashboard/loap/settings" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2 bg-gray-700">Settings</a>
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
                <button type="submit" class="block py-2 px-4 rounded hover:bg-gray-700 w-full text-left">Logout</button>
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
                    <h1 class="text-2xl md:text-3xl font-bold text-white font-orbitron">Settings</h1>
                    <p class="text-gray-400 text-sm md:text-base">Manage your account settings and preferences.</p>
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

            <!-- Settings Cards -->
            <div class="space-y-6">
                <!-- Profile Information Card -->
                <div class="bg-[#15132B] rounded-lg shadow-lg border border-gray-700 p-6">
                    <div class="flex items-center mb-4">
                        <svg class="w-6 h-6 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        <h2 class="text-xl font-bold text-white">Profile Information</h2>
                    </div>
                    <p class="text-gray-400 text-sm mb-6">Update your personal information and contact details.</p>
                    
                    <form class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">First Name</label>
                                <input type="text" value="John" class="w-full px-3 py-2 border border-gray-600 rounded-lg bg-[#0E0D1C] text-white focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Last Name</label>
                                <input type="text" value="Doe" class="w-full px-3 py-2 border border-gray-600 rounded-lg bg-[#0E0D1C] text-white focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Email</label>
                                <input type="email" value="john.doe@example.com" class="w-full px-3 py-2 border border-gray-600 rounded-lg bg-[#0E0D1C] text-white focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Phone Number</label>
                                <input type="tel" value="+1 (555) 123-4567" class="w-full px-3 py-2 border border-gray-600 rounded-lg bg-[#0E0D1C] text-white focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                            </div>
                        </div>
                        <div class="pt-4">
                            <button type="submit" class="px-6 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors font-medium">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Notifications Card -->
                <div class="bg-[#15132B] rounded-lg shadow-lg border border-gray-700 p-6">
                    <div class="flex items-center mb-4">
                        <svg class="w-6 h-6 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 01-3 3H9a3 3 0 01-3-3v-1m6-10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        <h2 class="text-xl font-bold text-white">Notifications</h2>
                    </div>
                    <p class="text-gray-400 text-sm mb-6">Configure how you want to receive notifications.</p>
                    
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="font-medium text-white">Email Notifications</h3>
                                <p class="text-gray-400 text-sm">Receive notifications via email.</p>
                            </div>
                            <label class="toggle-switch">
                                <input type="checkbox" checked>
                                <span class="slider"></span>
                            </label>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="font-medium text-white">Campaign Updates</h3>
                                <p class="text-gray-400 text-sm">Get notified about campaign status changes.</p>
                            </div>
                            <label class="toggle-switch">
                                <input type="checkbox" checked>
                                <span class="slider"></span>
                            </label>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="font-medium text-white">Marketing Communications</h3>
                                <p class="text-gray-400 text-sm">Receive marketing emails and promotions.</p>
                            </div>
                            <label class="toggle-switch">
                                <input type="checkbox">
                                <span class="slider"></span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Security Card -->
                <div class="bg-[#15132B] rounded-lg shadow-lg border border-gray-700 p-6">
                    <div class="flex items-center mb-4">
                        <svg class="w-6 h-6 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        <h2 class="text-xl font-bold text-white">Security</h2>
                    </div>
                    <p class="text-gray-400 text-sm mb-6">Manage your account security settings.</p>
                    
                    <form class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Current Password</label>
                            <input type="password" placeholder="Enter current password" class="w-full px-3 py-2 border border-gray-600 rounded-lg bg-[#0E0D1C] text-white focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">New Password</label>
                            <input type="password" placeholder="Enter new password" class="w-full px-3 py-2 border border-gray-600 rounded-lg bg-[#0E0D1C] text-white focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Confirm New Password</label>
                            <input type="password" placeholder="Confirm new password" class="w-full px-3 py-2 border border-gray-600 rounded-lg bg-[#0E0D1C] text-white focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        </div>
                        <div class="pt-4">
                            <button type="submit" class="px-6 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors font-medium">
                                Update Password
                            </button>
                        </div>
                    </form>
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
