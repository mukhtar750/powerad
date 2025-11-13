<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - User Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="antialiased bg-[#0E0D1C] text-gray-100 font-sans">
    <div class="max-w-7xl mx-auto p-4 md:p-6">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold">User Details</h1>
                <p class="text-gray-400 text-sm">Full profile and account information</p>
            </div>
            <div class="space-x-3">
                <a href="{{ route('dashboard.admin.users.index') }}" class="text-sm text-blue-400 hover:text-blue-300">Back to Users</a>
                <a href="{{ route('dashboard.admin.users.edit', $user) }}" class="text-sm text-blue-400 hover:text-blue-300">Edit</a>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 md:gap-6">
            <!-- General Info -->
            <div class="lg:col-span-2 bg-[#15132B] border border-gray-700 rounded-lg p-6">
                <div class="flex items-start gap-4">
                    <div>
                        @if($user->avatar_path)
                            <img src="{{ asset('storage/'.$user->avatar_path) }}" class="w-20 h-20 rounded-xl object-cover" alt="Avatar" />
                        @else
                            <div class="w-20 h-20 rounded-xl bg-gray-700"></div>
                        @endif
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center gap-3">
                            <h2 class="text-xl font-semibold">{{ $user->name }}</h2>
                            <span class="px-2 py-1 rounded-full text-xs bg-blue-500/20 text-blue-300">{{ ucfirst(str_replace('_',' ',$user->role)) }}</span>
                            <span class="px-2 py-1 rounded-full text-xs {{ $user->is_verified ? 'bg-green-500/20 text-green-300' : 'bg-yellow-500/20 text-yellow-300' }}">{{ $user->is_verified ? 'Verified' : 'Unverified' }}</span>
                        </div>
                        <p class="text-gray-400 text-sm">Member since {{ $user->created_at->format('M Y') }}</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                    <div>
                        <h3 class="text-lg font-semibold mb-3">Contact</h3>
                        <div class="space-y-2 text-sm">
                            <div>
                                <span class="text-gray-400">Email</span>
                                <p class="text-gray-100">{{ $user->email }}</p>
                            </div>
                            <div>
                                <span class="text-gray-400">Phone</span>
                                <p class="text-gray-100">{{ $user->phone ?? '—' }}</p>
                            </div>
                            <div>
                                <span class="text-gray-400">Company</span>
                                <p class="text-gray-100">{{ $user->company ?? '—' }}</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-3">Documents</h3>
                        <div class="space-y-2 text-sm">
                            <div>
                                <span class="text-gray-400">Avatar</span>
                                @if($user->avatar_path)
                                    <p><a href="{{ asset('storage/'.$user->avatar_path) }}" target="_blank" class="text-blue-400 hover:text-blue-300">View</a></p>
                                @else
                                    <p class="text-gray-500">—</p>
                                @endif
                            </div>
                            <div>
                                <span class="text-gray-400">ID Card</span>
                                @if($user->id_card_path)
                                    <p><a href="{{ asset('storage/'.$user->id_card_path) }}" target="_blank" class="text-blue-400 hover:text-blue-300">View</a></p>
                                @else
                                    <p class="text-gray-500">—</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                @if($stats)
                <div class="mt-6">
                    <h3 class="text-lg font-semibold mb-3">LOAP Stats</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="bg-gray-800 rounded-lg p-4 border border-gray-700">
                            <p class="text-gray-400 text-xs">Billboards</p>
                            <p class="text-gray-100 text-lg font-semibold">{{ $stats['billboards'] }}</p>
                        </div>
                        <div class="bg-gray-800 rounded-lg p-4 border border-gray-700">
                            <p class="text-gray-400 text-xs">Total Paid</p>
                            <p class="text-gray-100 text-lg font-semibold">₦{{ number_format($stats['total_paid'], 2) }}</p>
                        </div>
                    </div>
                </div>
                @endif
            </div>

            <!-- Account Info -->
            <div class="bg-[#15132B] border border-gray-700 rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-3">Account Details</h3>
                @if($accountInfo)
                    @if($accountInfo['type'] === 'loap')
                        <div class="space-y-3 text-sm">
                            <div>
                                <span class="text-gray-400">Subaccount Code</span>
                                <p class="font-mono">{{ $accountInfo['subaccount_code'] ?? '—' }}</p>
                            </div>
                            <div>
                                <span class="text-gray-400">Bank</span>
                                <p>{{ $accountInfo['bank_name'] ?? '—' }}</p>
                            </div>
                            <div>
                                <span class="text-gray-400">Account Number</span>
                                <p class="font-mono">{{ $accountInfo['account_number_masked'] ?? '—' }}</p>
                            </div>
                            <div>
                                <span class="text-gray-400">Account Name</span>
                                <p>{{ $accountInfo['account_name'] ?? '—' }}</p>
                            </div>
                        </div>
                    @elseif($accountInfo['type'] === 'service_provider')
                        <div class="space-y-3 text-sm">
                            <p class="text-gray-400">Service Provider payouts use the platform subaccount.</p>
                            <div>
                                <span class="text-gray-400">Provider Subaccount Code</span>
                                <p class="font-mono">{{ $accountInfo['provider_subaccount_code'] ?? '—' }}</p>
                            </div>
                        </div>
                    @endif
                @else
                    <p class="text-gray-400 text-sm">No account details required for this user role.</p>
                @endif
            </div>
        </div>
    </div>
</body>
</html>