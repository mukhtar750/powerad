<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - LOAP Earnings</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="antialiased bg-[#0E0D1C] text-gray-100 font-sans">
    <div class="max-w-7xl mx-auto p-4 md:p-6">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold">LOAP Earnings</h1>
                <p class="text-gray-400 text-sm">View earnings and performance per LOAP</p>
            </div>
            <a href="{{ route('dashboard.admin.payments') }}" class="text-sm text-blue-400 hover:text-blue-300">Back to Payments</a>
        </div>

        <!-- Search -->
        <form method="GET" action="{{ route('dashboard.admin.loap-earnings') }}" class="grid grid-cols-1 md:grid-cols-4 gap-3 mb-6">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search LOAP by name or email" class="bg-[#15132B] border border-gray-700 rounded-lg py-2 px-3 text-sm col-span-3" />
            <button class="bg-orange hover:bg-orange/90 text-white rounded-lg text-sm px-4">Search</button>
        </form>

        <!-- LOAP Earnings Table -->
        <div class="overflow-x-auto bg-[#15132B] border border-gray-700 rounded-lg">
            <table class="min-w-full text-left text-sm">
                <thead>
                    <tr class="text-gray-400">
                        <th class="py-2 px-4 font-medium">LOAP</th>
                        <th class="py-2 px-4 font-medium">Email</th>
                        <th class="py-2 px-4 font-medium">Billboards</th>
                        <th class="py-2 px-4 font-medium">Total Earnings (Paid)</th>
                        <th class="py-2 px-4 font-medium">Pending Earnings</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-800">
                    @forelse($loaps as $loap)
                    <tr>
                        <td class="py-3 px-4">{{ $loap->name }}</td>
                        <td class="py-3 px-4">{{ $loap->email }}</td>
                        <td class="py-3 px-4">{{ $loap->billboards_count }}</td>
                        <td class="py-3 px-4 text-blue-400">₦{{ number_format($loap->total_earnings, 2) }}</td>
                        <td class="py-3 px-4 text-yellow-400">₦{{ number_format($loap->pending_earnings, 2) }}</td>
                    </tr>
                    @empty
                    <tr><td class="py-3 px-4 text-gray-400" colspan="5">No LOAP users found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            <a href="{{ route('dashboard.admin.payments') }}" class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-2 rounded-lg text-sm">Back to Payments</a>
        </div>
    </div>
</body>
</html>