<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PowerAD Portal - Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'dark-blue': '#2E6EAC',
                        'orange': '#F58634',
                        'dark-grey': '#373435',
                        'light-green': '#E0E7E0',
                        'dark-green': '#2B411C',
                        'yellow': '#FFCC29',
                        'jacarta': '#2E6EAC',
                        'jacarta-dark': '#1E4A7A',
                    },
                    fontFamily: {
                        'orbitron': ['Orbitron', 'sans-serif'],
                        'exo': ['Exo 2', 'sans-serif'],
                        'futura': ['Futura', 'sans-serif'],
                    },
                },
            },
        }
    </script>
</head>
<body class="antialiased bg-[#0E0D1C] text-gray-100 font-sans">
    <div class="flex h-screen relative">
          <!-- Sidebar -->
        <aside id="sidebar" class="w-64 bg-[#15132B] p-6 space-y-6 flex flex-col justify-between shadow-lg hidden lg:flex">
            <div>
                <!-- Logo Section -->
                <div class="flex items-center space-x-3 mb-6">
                    <img src="{{ asset('images/primarylogo.png') }}" 
                         alt="PowerAD International Logo" 
                         class="h-8 w-auto">
                    <div>
                        <div class="text-orange text-sm font-medium"></div>
                    </div>
                </div>
                <nav>
                    <a href="/dashboard/admin" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2 bg-gray-700">
                        <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        Dashboard
                    </a>
                    <a href="/dashboard/admin/users" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">
                        <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m0 0a4 4 0 100-8 4 4 0 000 8zm8-4a4 4 0 100-8 4 4 0 000 8z"></path></svg>
                        Users
                    </a>
                    <a href="/dashboard/admin/billboards" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">
                        <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"></path></svg>
                        Billboard Management
                    </a>
                    <a href="/dashboard/admin/verifications" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">
                        <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Verifications
                    </a>
                    <a href="/dashboard/admin/reports" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">
                        <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 11V3h2v8h8v2h-8v8h-2v-8H3v-2h8z"></path></svg>
                        Reports
                    </a>
                    <a href="/dashboard/admin/payments" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">
                        <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        Payments
                    </a>
                    <a href="/dashboard/admin/settings" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">
                        <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        Settings
                    </a>
                </nav>
            </div>
            <div class="flex items-center">
                <a href="/profile/photo" class="mr-3" title="Update profile photo">
                    @if(auth()->user()->avatar_path)
                        <img src="{{ asset('storage/'.auth()->user()->avatar_path) }}" class="w-10 h-10 rounded-full object-cover" alt="Profile photo">
                    @else
                        <div class="w-10 h-10 rounded-full bg-gray-600 flex items-center justify-center text-xs text-gray-300">
                            {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                        </div>
                    @endif
                </a>
                <div>
                    <div class="font-bold"><?php echo auth()->user()->name; ?></div>
                    <div class="text-sm text-gray-400"><?php echo auth()->user()->email; ?></div>
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
            
            <header class="pb-6 border-b border-gray-700 mb-6">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <div>
                        <nav class="text-sm text-gray-400 mb-1" aria-label="Breadcrumb">
                            <ol class="list-none p-0 inline-flex items-center">
                                <li><a href="/dashboard" class="hover:text-gray-200">Dashboard</a></li>
                                <li class="px-2">/</li>
                                <li class="text-gray-300">Admin</li>
                            </ol>
                        </nav>
                        <h1 class="text-2xl md:text-3xl font-bold text-white font-orbitron">Welcome back, <?php echo auth()->user()->name; ?></h1>
                        <p class="text-gray-400 text-sm md:text-base">Manage your billboard inventory and track your earnings.</p>
                    </div>
                    <div class="flex-1 md:max-w-md">
                        <div class="relative">
                            <input type="text" placeholder="Search billboards, users, bookings..." class="w-full bg-[#0E0D1C] border border-gray-700 rounded-lg py-2.5 pl-10 pr-4 text-sm placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-orange/40" />
                            <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M10.5 18a7.5 7.5 0 100-15 7.5 7.5 0 000 15z"/></svg>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <button class="p-2 rounded-full hover:bg-gray-700" aria-label="Notifications">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 01-3 3H9a3 3 0 01-3-3v-1m6-10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </button>
                        <a href="/profile/photo" title="Update profile photo" class="block">
                            @if(auth()->user()->avatar_path)
                                <img src="{{ asset('storage/'.auth()->user()->avatar_path) }}" class="w-10 h-10 rounded-full object-cover" alt="Profile photo">
                            @else
                                <?php
                                $name = auth()->user()->name ?? '';
                                $parts = preg_split('/\s+/', trim($name));
                                $initials = strtoupper((($parts[0] ?? '') !== '' ? substr($parts[0], 0, 1) : 'U') . (($parts[1] ?? '') !== '' ? substr($parts[1], 0, 1) : ''));
                                ?>
                                <div class="w-10 h-10 bg-gradient-to-r from-orange to-yellow rounded-full flex items-center justify-center">
                                    <span class="text-white font-bold text-sm">{{ $initials }}</span>
                                </div>
                            @endif
                        </a>
                    </div>
                </div>
            </header>

            <!-- Summary Statistics Cards (Admin real data) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 mb-6">
                <!-- Total Users -->
                <div class="bg-[#15132B] p-4 md:p-5 rounded-lg shadow-lg border border-gray-700">
                    <div class="flex items-center justify-between mb-1">
                        <div>
                            <p class="text-sm text-gray-400 font-medium">Total Users</p>
                            <h3 class="text-xl md:text-2xl font-bold text-orange">{{ number_format($totalUsers ?? 0) }}</h3>
                        </div>
                        <div class="w-12 h-12 bg-orange/20 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m0 0a4 4 0 100-8 4 4 0 000 8zm8-4a4 4 0 100-8 4 4 0 000 8z"/></svg>
                        </div>
                    </div>
                    <p class="text-xs text-gray-400">Admins: {{ $roleCounts['admins'] ?? 0 }}, LOAP: {{ $roleCounts['loaps'] ?? 0 }}</p>
                </div>

                <!-- Total Billboards -->
                <div class="bg-[#15132B] p-4 md:p-5 rounded-lg shadow-lg border border-gray-700">
                    <div class="flex items-center justify-between mb-1">
                        <div>
                            <p class="text-sm text-gray-400 font-medium">Total Billboards</p>
                            <h3 class="text-xl md:text-2xl font-bold text-white">{{ number_format($totalBillboards ?? 0) }}</h3>
                        </div>
                        <div class="w-12 h-12 bg-blue-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"/></svg>
                        </div>
                    </div>
                    <p class="text-xs text-gray-400">Booked: {{ $billboardCounts['booked'] ?? 0 }}, Maint: {{ $billboardCounts['maintenance'] ?? 0 }}</p>
                </div>

                <!-- Available -->
                <div class="bg-[#15132B] p-4 md:p-5 rounded-lg shadow-lg border border-gray-700">
                    <div class="flex items-center justify-between mb-1">
                        <div>
                            <p class="text-sm text-gray-400 font-medium">Available</p>
                            <h3 class="text-xl md:text-2xl font-bold text-white">{{ number_format($billboardCounts['available'] ?? 0) }}</h3>
                        </div>
                        <div class="w-12 h-12 bg-green-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </div>
                    </div>
                    <p class="text-xs text-gray-400">Inactive: {{ $billboardCounts['inactive'] ?? 0 }}</p>
                </div>

                <!-- Verified -->
                <div class="bg-[#15132B] p-4 md:p-5 rounded-lg shadow-lg border border-gray-700">
                    <div class="flex items-center justify-between mb-1">
                        <div>
                            <p class="text-sm text-gray-400 font-medium">Verified Billboards</p>
                            <h3 class="text-xl md:text-2xl font-bold text-white">{{ number_format($billboardCounts['verified'] ?? 0) }}</h3>
                        </div>
                        <div class="w-12 h-12 bg-purple-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                    </div>
                    <p class="text-xs text-gray-400">Unverified: {{ $billboardCounts['unverified'] ?? 0 }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 xl:grid-cols-3 gap-4 md:gap-6">
                <!-- Billboard Inventory -->
                <div class="xl:col-span-2 bg-[#15132B] p-4 md:p-6 rounded-lg shadow-lg border border-gray-700">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4">
                        <div class="mb-3 sm:mb-0">
                            <h2 class="text-lg md:text-xl font-bold text-white font-orbitron">Billboard Inventory</h2>
                            <p class="text-gray-400 text-sm">Manage your outdoor advertising spaces</p>
                        </div>
                        <a href="{{ route('dashboard.admin.billboards.create') }}" class="bg-orange hover:bg-orange/90 text-white font-bold py-2 px-4 rounded-lg flex items-center text-sm md:text-base transition-colors">
                            <svg class="w-4 h-4 md:w-5 md:h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Add Billboard
                        </a>
                    </div>

                    @forelse(($recentBillboards ?? collect())->take(3) as $b)
                    <div class="bg-[#0E0D1C] p-4 rounded-lg mb-4 border border-gray-700 overflow-hidden">
                        <!-- Image -->
                        <div class="h-40 bg-gray-700 rounded-lg mb-4 overflow-hidden flex items-center justify-center">
                            @if($b->main_image)
                                <img src="{{ $b->main_image_url }}" alt="{{ $b->title }}" class="w-full h-full object-cover">
                            @else
                                <div class="text-gray-400">
                                    <i class="fas fa-image text-3xl"></i>
                                </div>
                            @endif
                        </div>
                        <div class="flex justify-between items-center mb-2">
                            <h3 class="font-bold text-lg">{{ $b->title }}</h3>
                            @php $status = strtolower($b->status); @endphp
                            <span class="text-xs font-bold px-2 py-1 rounded-full
                                {{ $status==='available' ? 'bg-blue-500 text-white' : '' }}
                                {{ $status==='booked' ? 'bg-green-500 text-white' : '' }}
                                {{ $status==='maintenance' ? 'bg-yellow-500 text-white' : '' }}
                                {{ $status==='inactive' ? 'bg-gray-500 text-white' : '' }}
                            ">{{ ucfirst($b->status) }}</span>
                        </div>
                        <p class="text-sm text-gray-400 mb-2">{{ $b->location }}, {{ $b->city }}</p>
                        <div class="grid grid-cols-2 gap-4 text-sm mb-4">
                            <div>
                                <p class="text-gray-400">Monthly Revenue</p>
                                <p class="font-bold">N/O</p>
                            </div>
                            <div>
                                <p class="text-gray-400">Rating</p>
                                <p class="font-bold">N/O</p>
                            </div>
                            <div>
                                <p class="text-gray-400">Total Bookings</p>
                                <p class="font-bold">{{ $b->bookings_count ?? '0' }}</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <p class="text-gray-400 text-sm mr-2">Utilization Rate</p>
                            <div class="w-full bg-gray-700 rounded-full h-2.5">
                                @php
                                    $barClass = $status==='maintenance' ? 'bg-yellow-500' : ($status==='booked' ? 'bg-green-500' : 'bg-blue-500');
                                    $width = $status==='booked' ? '100%' : '0%';
                                @endphp
                                <div class="h-2.5 rounded-full {{ $barClass }}" style="width: {{ $width }}"></div>
                            </div>
                            <p class="text-sm text-gray-300 ml-2">{{ $status==='booked' ? '100%' : '0%' }}</p>
                        </div>
                    </div>
                    @empty
                        <div class="bg-[#0E0D1C] p-4 rounded-lg mb-4 border border-gray-700 text-center text-gray-400">
                            No recent billboards to display.
                        </div>
                    @endforelse
                </div>

                <!-- Right Sidebar Content -->
                <div>
                    <!-- Recent Bookings -->
                    <div class="bg-[#15132B] p-6 rounded-lg shadow-lg mb-6">
                        <h2 class="text-xl font-bold mb-4">Recent Bookings</h2>
                        <p class="text-gray-400 text-sm mb-4">Latest activities and reservations</p>
                        @forelse(($recentBookings ?? []) as $booking)
                            <div class="flex items-center justify-between bg-[#0E0D1C] p-3 rounded-lg mb-3 border border-gray-700">
                                <div>
                                    <p class="font-bold">{{ optional($booking->advertiser)->name ?? 'Unknown Advertiser' }}</p>
                                    <p class="text-sm text-gray-400">{{ optional($booking->billboard)->title ?? 'Unknown Billboard' }}</p>
                                </div>
                                <span class="text-xs font-bold px-2 py-1 rounded-full
                                    {{ ($booking->status === 'active') ? 'bg-green-500 text-white' : '' }}
                                    {{ ($booking->status === 'pending') ? 'bg-yellow-500 text-white' : '' }}
                                    {{ ($booking->status === 'completed') ? 'bg-blue-500 text-white' : '' }}
                                    {{ (!in_array($booking->status, ['active','pending','completed'])) ? 'bg-gray-500 text-white' : '' }}
                                ">{{ ucfirst($booking->status ?? 'unknown') }}</span>
                            </div>
                        @empty
                            <div class="text-center py-4">
                                <i class="fas fa-calendar-times text-gray-500 text-2xl mb-2"></i>
                                <p class="text-gray-400 text-sm">No bookings yet</p>
                            </div>
                        @endforelse
                    </div>

                    <!-- Quick Actions -->
                    <div class="bg-[#15132B] p-6 rounded-lg shadow-lg">
                        <h2 class="text-xl font-bold mb-4">Quick Actions</h2>
                        <p class="text-gray-400 text-sm mb-4">Perform common tasks quickly</p>
                        <ul class="space-y-3">
                            <li>
                                <a href="/dashboard/admin/users" class="flex items-center text-blue-400 hover:text-blue-300 transition-colors duration-200">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                                    Manage Users
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('dashboard.admin.calendar') }}" class="flex items-center text-blue-400 hover:text-blue-300 transition-colors duration-200" aria-label="View bookings calendar">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    View Calendar
                                </a>
                            </li>
                            <li>
                                <a href="/dashboard/admin/payments/dashboard" class="flex items-center text-blue-400 hover:text-blue-300 transition-colors duration-200">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                                    Payment Dashboard
                                </a>
                            </li>
                            <li>
                                <a href="/dashboard/admin/payments/reports" class="flex items-center text-blue-400 hover:text-blue-300 transition-colors duration-200">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                    Payment Reports
                                </a>
                            </li>
                            <li>
                                <a href="/dashboard/admin/payments/analytics" class="flex items-center text-blue-400 hover:text-blue-300 transition-colors duration-200">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    Payment Analytics
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center text-blue-400 hover:text-blue-300 transition-colors duration-200">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.329 1.176l1.519 4.674c.3.921-.755 1.688-1.539 1.175l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.784.513-1.838-.254-1.539-1.175l1.519-4.674a1 1 0 00-.329-1.176l-3.976-2.888c-.784-.57-.382-1.81.588-1.81h4.915a1 1 0 00.95-.69l1.519-4.674z"></path></svg>
                                    Customer Reviews
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Data Tables & Activity -->
            <div class="grid grid-cols-1 xl:grid-cols-3 gap-4 md:gap-6 mt-6">
                <!-- Recent Users -->
                <div class="bg-[#15132B] p-4 md:p-6 rounded-lg shadow-lg border border-gray-700 xl:col-span-2">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-lg md:text-xl font-bold text-white font-orbitron">Recent Users</h2>
                        <a href="/dashboard/admin/users" class="text-sm text-blue-400 hover:text-blue-300">View all</a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-left text-sm">
                            <thead>
                                <tr class="text-gray-400">
                                    <th class="py-2 pr-4 font-medium">Name</th>
                                    <th class="py-2 px-4 font-medium">Email</th>
                                    <th class="py-2 px-4 font-medium">Role</th>
                                    <th class="py-2 px-4 font-medium">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-800">
                                @forelse(($recentUsers ?? []) as $u)
                                <tr>
                                    <td class="py-3 pr-4">{{ $u->name }}</td>
                                    <td class="py-3 px-4">{{ $u->email }}</td>
                                    <td class="py-3 px-4">
                                        <span class="px-2 py-1 rounded-full text-xs bg-blue-500/20 text-blue-300">{{ ucfirst(str_replace('_',' ', $u->role)) }}</span>
                                    </td>
                                    <td class="py-3 px-4">
                                        @if($u->is_verified)
                                            <span class="px-2 py-1 rounded-full text-xs bg-green-500/20 text-green-300">Admin Verified</span>
                                        @endif
                                        @if($u->email_verified_at)
                                            <span class="px-2 py-1 rounded-full text-xs bg-green-500/20 text-green-300 ml-2">Email Verified</span>
                                        @endif
                                        @if(!$u->is_verified && !$u->email_verified_at)
                                            <span class="px-2 py-1 rounded-full text-xs bg-yellow-500/20 text-yellow-300">Unverified</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr><td class="py-3 pr-4 text-gray-400" colspan="4">No recent users.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Activity Log -->
                <div class="bg-[#15132B] p-4 md:p-6 rounded-lg shadow-lg border border-gray-700">
                    <h2 class="text-lg md:text-xl font-bold text-white font-orbitron mb-4">Activity Log</h2>
                    <ul class="space-y-3 text-sm">
                        @forelse(($activityLog ?? []) as $item)
                            <li class="flex items-start gap-3">
                                <span class="w-2 h-2 mt-2 rounded-full {{ $item['bg'] ?? 'bg-blue-500' }}"></span>
                                <div>
                                    <p class="text-gray-200">{{ $item['text'] }}</p>
                                    <p class="text-xs text-gray-400">{{ optional($item['time'])->diffForHumans() }}</p>
                                </div>
                            </li>
                        @empty
                            <li class="text-gray-400">No recent activity.</li>
                        @endforelse
                    </ul>
                </div>
            </div>

            <!-- Recent Billboards Table -->
            <div class="bg-[#15132B] p-4 md:p-6 rounded-lg shadow-lg border border-gray-700 mt-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg md:text-xl font-bold text-white font-orbitron">Recent Billboards</h2>
                    <a href="{{ route('dashboard.admin.billboards') }}" class="text-sm text-blue-400 hover:text-blue-300">Manage</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full text-left text-sm">
                        <thead>
                            <tr class="text-gray-400">
                                <th class="py-2 pr-4 font-medium">Title</th>
                                <th class="py-2 px-4 font-medium">Location</th>
                                <th class="py-2 px-4 font-medium">Owner</th>
                                <th class="py-2 px-4 font-medium">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-800">
                            @forelse(($recentBillboards ?? []) as $b)
                            <tr>
                                <td class="py-3 pr-4">{{ $b->title }}</td>
                                <td class="py-3 px-4">{{ $b->city }}, {{ $b->state }}</td>
                                <td class="py-3 px-4">{{ optional($b->user)->name ?? '—' }}</td>
                                <td class="py-3 px-4">
                                    @php $status = strtolower($b->status); @endphp
                                    <span class="px-2 py-1 rounded-full text-xs 
                                        {{ $status==='available' ? 'bg-blue-500/20 text-blue-300' : '' }}
                                        {{ $status==='booked' ? 'bg-green-500/20 text-green-300' : '' }}
                                        {{ $status==='maintenance' ? 'bg-yellow-500/20 text-yellow-300' : '' }}
                                        {{ $status==='inactive' ? 'bg-gray-500/20 text-gray-300' : '' }}
                                    ">{{ ucfirst($b->status) }}</span>
                                </td>
                            </tr>
                            @empty
                            <tr><td class="py-3 pr-4 text-gray-400" colspan="4">No recent billboards.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </main>
    </div>
    <script>
        (function() {
            var btn = document.getElementById('mobile-menu-btn');
            var sidebar = document.getElementById('sidebar');
            if (btn && sidebar) {
                btn.addEventListener('click', function() {
                    if (sidebar.classList.contains('hidden')) {
                        sidebar.classList.remove('hidden');
                        sidebar.classList.add('flex');
                    } else {
                        sidebar.classList.add('hidden');
                        sidebar.classList.remove('flex');
                    }
                });
            }
        })();
    </script>
</body>
</html>
