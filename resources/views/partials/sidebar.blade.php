<aside id="sidebar" class="hidden lg:block w-64 bg-[#15132B] border-r border-gray-700 h-full fixed lg:static inset-y-0 left-0 z-40">
    <div class="h-full flex flex-col">
        <div class="px-4 py-4 border-b border-gray-700">
            <a href="{{ route('dashboard.advertiser') }}" class="text-orange font-bold">{{ config('app.name') }}</a>
        </div>
        <nav class="flex-1 overflow-y-auto px-3 py-4 space-y-1">
            <a href="{{ route('loap.dashboard') }}" class="flex items-center px-3 py-2 rounded-md text-gray-300 hover:bg-gray-700 hover:text-white">
                <i class="fas fa-home mr-2"></i> Dashboard
            </a>
            <a href="{{ route('loap.billboards') }}" class="flex items-center px-3 py-2 rounded-md text-gray-300 hover:bg-gray-700 hover:text-white">
                <i class="fas fa-bullhorn mr-2"></i> Billboards
            </a>
            <a href="{{ route('loap.earnings') }}" class="flex items-center px-3 py-2 rounded-md text-gray-300 hover:bg-gray-700 hover:text-white">
                <i class="fas fa-money-bill-wave mr-2"></i> Earnings
            </a>
            <a href="{{ route('loap.analytics') }}" class="flex items-center px-3 py-2 rounded-md text-gray-300 hover:bg-gray-700 hover:text-white">
                <i class="fas fa-chart-line mr-2"></i> Analytics
            </a>
            <a href="{{ route('loap.profile') }}" class="flex items-center px-3 py-2 rounded-md text-gray-300 hover:bg-gray-700 hover:text-white">
                <i class="fas fa-user mr-2"></i> Profile
            </a>
        </nav>
        <div class="px-4 py-3 border-t border-gray-700">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full px-3 py-2 bg-gray-700 text-white rounded-md hover:bg-gray-600">Logout</button>
            </form>
        </div>
    </div>
</aside>
