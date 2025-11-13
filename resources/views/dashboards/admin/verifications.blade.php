<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Verifications</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="antialiased bg-[#0E0D1C] text-gray-100 font-sans">
    <div class="max-w-7xl mx-auto p-4 md:p-6">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold">Verifications</h1>
                <p class="text-gray-400 text-sm">Queue of unverified billboards</p>
            </div>
            <a href="/dashboard/admin" class="text-sm text-blue-400 hover:text-blue-300">Back to Dashboard</a>
        </div>
        @if(session('status'))
            <div class="mb-4 text-green-400 text-sm">{{ session('status') }}</div>
        @endif
        <div class="overflow-x-auto bg-[#15132B] border border-gray-700 rounded-lg">
            <table class="min-w-full text-left text-sm">
                <thead>
                    <tr class="text-gray-400">
                        <th class="py-2 px-4 font-medium">Title</th>
                        <th class="py-2 px-4 font-medium">Location</th>
                        <th class="py-2 px-4 font-medium">Owner</th>
                        <th class="py-2 px-4 font-medium text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-800">
                    @forelse(($billboards ?? []) as $b)
                    <tr>
                        <td class="py-3 px-4">{{ $b->title }}</td>
                        <td class="py-3 px-4">{{ $b->city }}, {{ $b->state }}</td>
                        <td class="py-3 px-4">{{ optional($b->user)->name ?? '—' }}</td>
                        <td class="py-3 px-4 text-right">
                            <form action="{{ route('dashboard.admin.billboards.verify', $b) }}" method="POST" class="inline-block">
                                @csrf
                                <button class="bg-green-600 hover:bg-green-500 text-white text-xs px-3 py-1 rounded">Approve</button>
                            </form>
                            <form action="{{ route('dashboard.admin.billboards.unverify', $b) }}" method="POST" class="inline-block ml-2">
                                @csrf
                                <button class="bg-yellow-600 hover:bg-yellow-500 text-white text-xs px-3 py-1 rounded">Reject</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td class="py-3 px-4 text-gray-400" colspan="4">No items in the verification queue.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">{{ ($billboards ?? null)?->links() }}</div>
    </div>
</body>
</html>

