<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - LOAP Dashboard</title>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('build/assets/app-BdhG_vQw.css') }}">
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
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
                    <div class="text-orange text-sm font-medium">LOAP Dashboard</div>
                </div>
            </div>
            <nav>
                <a href="/dashboard/loap" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">
                    <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    Dashboard
                </a>
                <a href="/dashboard/loap/billboards" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">
                    <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"></path></svg>
                    Billboards
                </a>
                <a href="/dashboard/loap/earnings" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">
                    <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    Earnings
                </a>
                <a href="/dashboard/loap/analytics" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">
                    <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    Analytics
                </a>
                <a href="/dashboard/loap/profile" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2 bg-gray-700">
                    <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    Profile
                </a>
            </nav>
        </div>
        <div class="flex items-center">
            <div class="w-10 h-10 bg-gray-600 rounded-full mr-3"></div>
            <div>
                <div class="font-bold"><?php echo auth()->user()->name; ?></div>
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

<div class="min-h-screen bg-[#0E0D1C]">
    <!-- Header -->
    <div class="bg-[#15132B] border-b border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold text-gray-100">Profile & Settings</h1>
                    <p class="text-gray-400 mt-1">Manage your account information and payment details</p>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Profile Form -->
            <div class="lg:col-span-2">
                <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                    <h3 class="text-xl font-semibold text-gray-100 mb-6">Personal Information</h3>
                    
                    <form method="POST" action="{{ route('loap.profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Name -->
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-300 mb-2">Full Name</label>
                                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" 
                                       class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-gray-100 focus:outline-none focus:ring-2 focus:ring-orange focus:border-orange @error('name') border-red-500 @enderror" required>
                                @error('name')
                                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email Address</label>
                                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" 
                                       class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-gray-100 focus:outline-none focus:ring-2 focus:ring-orange focus:border-orange @error('email') border-red-500 @enderror" required>
                                @error('email')
                                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Phone -->
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-300 mb-2">Phone Number</label>
                                <input type="text" name="phone" id="phone" value="{{ old('phone', $user->phone) }}" 
                                       class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-gray-100 focus:outline-none focus:ring-2 focus:ring-orange focus:border-orange @error('phone') border-red-500 @enderror">
                                @error('phone')
                                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Company -->
                            <div>
                                <label for="company" class="block text-sm font-medium text-gray-300 mb-2">Company (Optional)</label>
                                <input type="text" name="company" id="company" value="{{ old('company', $user->company) }}" 
                                       class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-gray-100 focus:outline-none focus:ring-2 focus:ring-orange focus:border-orange @error('company') border-red-500 @enderror">
                                @error('company')
                                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Avatar Upload -->
                        <div class="mt-6">
                            <label for="avatar" class="block text-sm font-medium text-gray-300 mb-2">Profile Photo</label>
                            <div class="flex items-center gap-4">
                                @if($user->avatar_path)
                                    <img src="{{ asset('storage/'.$user->avatar_path) }}" alt="Avatar" class="w-16 h-16 rounded-full object-cover border border-gray-600">
                                @else
                                    <div class="w-16 h-16 rounded-full bg-gray-700"></div>
                                @endif
                                <input type="file" name="avatar" id="avatar" accept="image/*" class="text-sm text-gray-300" />
                            </div>
                            @error('avatar')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                            <p class="text-xs text-gray-500 mt-1">Accepted formats: JPG, PNG. Max size 4MB.</p>
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="bg-orange text-white px-6 py-3 rounded-md font-medium hover:bg-orange-600 transition-colors">
                                <i class="fas fa-save mr-2"></i> Update Profile
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Bank Account Information -->
                <div class="bg-gray-800 rounded-lg p-6 border border-gray-700 mt-8">
                    <h3 class="text-xl font-semibold text-gray-100 mb-6">Bank Account Information</h3>
                    <p class="text-gray-400 mb-6">This information is used for transferring your earnings to your bank account.</p>
                    
                    <form method="POST" action="{{ route('loap.profile.update') }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Bank Name -->
                            <div>
                                <label for="bank_name" class="block text-sm font-medium text-gray-300 mb-2">Bank Name</label>
                                <select name="bank_name" id="bank_name" 
                                        class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-gray-100 focus:outline-none focus:ring-2 focus:ring-orange focus:border-orange @error('bank_name') border-red-500 @enderror">
                                    <option value="">Select Bank</option>
                                    <option value="Access Bank" {{ old('bank_name', $user->bank_name) == 'Access Bank' ? 'selected' : '' }}>Access Bank</option>
                                    <option value="First Bank" {{ old('bank_name', $user->bank_name) == 'First Bank' ? 'selected' : '' }}>First Bank</option>
                                    <option value="GTBank" {{ old('bank_name', $user->bank_name) == 'GTBank' ? 'selected' : '' }}>GTBank</option>
                                    <option value="Zenith Bank" {{ old('bank_name', $user->bank_name) == 'Zenith Bank' ? 'selected' : '' }}>Zenith Bank</option>
                                    <option value="UBA" {{ old('bank_name', $user->bank_name) == 'UBA' ? 'selected' : '' }}>UBA</option>
                                    <option value="Fidelity Bank" {{ old('bank_name', $user->bank_name) == 'Fidelity Bank' ? 'selected' : '' }}>Fidelity Bank</option>
                                    <option value="Union Bank" {{ old('bank_name', $user->bank_name) == 'Union Bank' ? 'selected' : '' }}>Union Bank</option>
                                    <option value="Stanbic IBTC" {{ old('bank_name', $user->bank_name) == 'Stanbic IBTC' ? 'selected' : '' }}>Stanbic IBTC</option>
                                    <option value="Ecobank" {{ old('bank_name', $user->bank_name) == 'Ecobank' ? 'selected' : '' }}>Ecobank</option>
                                    <option value="Wema Bank" {{ old('bank_name', $user->bank_name) == 'Wema Bank' ? 'selected' : '' }}>Wema Bank</option>
                                </select>
                                @error('bank_name')
                                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Account Number -->
                            <div>
                                <label for="account_number" class="block text-sm font-medium text-gray-300 mb-2">Account Number</label>
                                <input type="text" name="account_number" id="account_number" value="{{ old('account_number', $user->account_number) }}" 
                                       class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-gray-100 focus:outline-none focus:ring-2 focus:ring-orange focus:border-orange @error('account_number') border-red-500 @enderror">
                                @error('account_number')
                                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Account Name -->
                            <div class="md:col-span-2">
                                <label for="account_name" class="block text-sm font-medium text-gray-300 mb-2">Account Name</label>
                                <input type="text" name="account_name" id="account_name" value="{{ old('account_name', $user->account_name) }}" 
                                       class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-gray-100 focus:outline-none focus:ring-2 focus:ring-orange focus:border-orange @error('account_name') border-red-500 @enderror">
                                @error('account_name')
                                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="bg-orange text-white px-6 py-3 rounded-md font-medium hover:bg-orange-600 transition-colors">
                                <i class="fas fa-save mr-2"></i> Update Bank Details
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Account Status -->
                <div class="bg-gray-800 rounded-lg p-6 border border-gray-700 mb-6">
                    <h3 class="text-lg font-semibold text-gray-100 mb-4">Account Status</h3>
                    
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="text-gray-300">Email Verified</span>
                            @if($user->email_verified_at)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-900 text-green-200">
                                    <i class="fas fa-check mr-1"></i> Verified
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-900 text-yellow-200">
                                    <i class="fas fa-clock mr-1"></i> Pending
                                </span>
                            @endif
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <span class="text-gray-300">Account Status</span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-900 text-green-200">
                                <i class="fas fa-check mr-1"></i> Active
                            </span>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <span class="text-gray-300">Member Since</span>
                            <span class="text-gray-400">{{ $user->created_at->format('M Y') }}</span>
                        </div>
                    </div>
                </div>

                <!-- Paystack Subaccount Info -->
                @if($subaccountInfo)
                    <div class="bg-gray-800 rounded-lg p-6 border border-gray-700 mb-6">
                        <h3 class="text-lg font-semibold text-gray-100 mb-4">Payment Account</h3>
                        
                        <div class="space-y-3">
                            <div>
                                <span class="text-gray-400 text-sm">Subaccount Code</span>
                                <p class="text-gray-100 font-mono text-sm">{{ $subaccountInfo['subaccount_code'] }}</p>
                            </div>
                            
                            @if($subaccountInfo['bank_name'])
                                <div>
                                    <span class="text-gray-400 text-sm">Bank</span>
                                    <p class="text-gray-100">{{ $subaccountInfo['bank_name'] }}</p>
                                </div>
                            @endif
                            
                            @if($subaccountInfo['account_number'])
                                <div>
                                    <span class="text-gray-400 text-sm">Account Number</span>
                                    <p class="text-gray-100 font-mono">{{ $subaccountInfo['account_number'] }}</p>
                                </div>
                            @endif
                            
                            @if($subaccountInfo['account_name'])
                                <div>
                                    <span class="text-gray-400 text-sm">Account Name</span>
                                    <p class="text-gray-100">{{ $subaccountInfo['account_name'] }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif

                <!-- Security -->
                <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-100 mb-4">Security</h3>
                    
                    <div class="space-y-3">
                        <a href="#" class="flex items-center justify-between p-3 bg-gray-700 rounded-lg hover:bg-gray-600 transition-colors">
                            <div class="flex items-center">
                                <i class="fas fa-key text-orange mr-3"></i>
                                <span class="text-gray-100">Change Password</span>
                            </div>
                            <i class="fas fa-chevron-right text-gray-400"></i>
                        </a>
                        
                        <a href="#" class="flex items-center justify-between p-3 bg-gray-700 rounded-lg hover:bg-gray-600 transition-colors">
                            <div class="flex items-center">
                                <i class="fas fa-shield-alt text-blue-400 mr-3"></i>
                                <span class="text-gray-100">Two-Factor Auth</span>
                            </div>
                            <i class="fas fa-chevron-right text-gray-400"></i>
                        </a>
                        
                        <a href="#" class="flex items-center justify-between p-3 bg-gray-700 rounded-lg hover:bg-gray-600 transition-colors">
                            <div class="flex items-center">
                                <i class="fas fa-sign-out-alt text-red-400 mr-3"></i>
                                <span class="text-gray-100">Logout</span>
                            </div>
                            <i class="fas fa-chevron-right text-gray-400"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </main>
</div>

<script>
// Mobile menu toggle
document.getElementById('mobile-menu-btn').addEventListener('click', function() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('hidden');
});
</script>
</body>
</html>
