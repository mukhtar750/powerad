<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Regulator Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .text-orange { color: #ff6b35; }
        .bg-orange { background-color: #ff6b35; }
        .border-orange { border-color: #ff6b35; }
        .logo-container { position: relative; overflow: hidden; }
        .logo-image { transition: transform 0.3s ease; }
        .logo-container:hover .logo-image { transform: scale(1.05); }
    </style>
    @stack('head')
    @stack('styles')
</head>
<body class="antialiased bg-[#0E0D1C] text-gray-100 font-sans">
    <div class="flex h-screen">
        @include('partials.sidebar')

        

        <!-- Main Content -->
        <main class="flex-1 p-4 md:p-6 overflow-y-auto">
            <!-- Top Bar -->
            <div class="flex flex-col sm:flex-row sm:justify-between items-center gap-3 mb-6">
                <div class="flex items-center">
                    
                    <button class="hidden sm:inline-flex p-2 rounded-lg hover:bg-gray-700 transition-colors mr-4 focus:outline-none focus:ring-2 focus:ring-orange" title="Notifications" aria-label="Notifications">
                        <i class="fas fa-bell w-6 h-6 text-gray-400"></i>
                    </button>
                    <div class="w-10 h-10 bg-gradient-to-r from-orange to-yellow rounded-full flex items-center justify-center" title="Regulator">
                        <span class="text-white font-bold text-sm">RG</span>
                    </div>
                </div>

                <div class="flex items-center gap-2 sm:gap-3 w-full sm:w-auto justify-end">
                    <div class="hidden sm:block text-sm text-gray-300 truncate max-w-[70vw] sm:max-w-none">
                        {{ Auth::user()->name ?? Auth::user()->email }}
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center px-2 sm:px-3 py-2 text-sm font-medium rounded-md bg-gray-700 hover:bg-gray-600 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-orange" title="Logout" aria-label="Logout">
                            <i class="fas fa-sign-out-alt"></i>
                            <span class="ml-2 hidden sm:inline">Logout</span>
                        </button>
                    </form>
                </div>
            </div>

            @yield('content')
        </main>
    </div>

    

    @stack('scripts')
</body>
</html>