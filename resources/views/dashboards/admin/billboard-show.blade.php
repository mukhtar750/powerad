@extends('layouts.app')

@section('title', 'Billboard Details - Admin Dashboard')

@section('content')
<div class="min-h-screen bg-[#0E0D1C]">
    <!-- Header -->
    <div class="bg-[#15132B] border-b border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold text-gray-100">Billboard Details</h1>
                    <p class="text-gray-400 mt-1">View and manage billboard information</p>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('dashboard.admin.billboards') }}" 
                       class="bg-gray-700 text-gray-300 px-6 py-3 rounded-lg font-medium hover:bg-gray-600 transition-colors">
                        <i class="fas fa-arrow-left mr-2"></i> Back to List
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <!-- Billboard Images -->
                <div class="bg-gray-800 rounded-lg p-6 mb-8 border border-gray-700">
                    <h3 class="text-xl font-semibold text-gray-100 mb-4">Billboard Images</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @if($billboard->main_image)
                            <div class="relative">
                                <img src="{{ $billboard->main_image_url }}" alt="{{ $billboard->title }}" 
                                     class="w-full h-64 object-cover rounded-lg">
                                <span class="absolute top-2 left-2 bg-orange text-white px-2 py-1 rounded text-xs font-medium">
                                    Main Image
                                </span>
                            </div>
                        @endif
                        
                        @if($billboard->images && count($billboard->images) > 1)
                            @foreach(array_slice($billboard->images, 1, 3) as $index => $image)
                                <div class="relative">
                                    <img src="{{ asset('storage/' . $image) }}" alt="{{ $billboard->title }}" 
                                         class="w-full h-64 object-cover rounded-lg">
                                    <span class="absolute top-2 left-2 bg-gray-600 text-white px-2 py-1 rounded text-xs font-medium">
                                        Image {{ $index + 2 }}
                                    </span>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <!-- Billboard Information -->
                <div class="bg-gray-800 rounded-lg p-6 mb-8 border border-gray-700">
                    <h3 class="text-xl font-semibold text-gray-100 mb-6">Billboard Information</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-400 mb-2">Title</label>
                            <p class="text-gray-100 text-lg font-medium">{{ $billboard->title }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-400 mb-2">Type</label>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                @if($billboard->type === 'Digital') bg-blue-900 text-blue-200
                                @elseif($billboard->type === 'LED') bg-purple-900 text-purple-200
                                @else bg-gray-900 text-gray-200 @endif">
                                {{ $billboard->type }}
                            </span>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-400 mb-2">Size</label>
                            <p class="text-gray-100">{{ $billboard->size }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-400 mb-2">Orientation</label>
                            <p class="text-gray-100">{{ $billboard->orientation }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-400 mb-2">Price per Day</label>
                            <p class="text-orange text-xl font-bold">₦{{ number_format($billboard->price_per_day) }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-400 mb-2">Location</label>
                            <p class="text-gray-100">{{ $billboard->location }}, {{ $billboard->city }}, {{ $billboard->state }}</p>
                        </div>
                    </div>
                    
                    <div class="mt-6">
                        <label class="block text-sm font-medium text-gray-400 mb-2">Description</label>
                        <p class="text-gray-100 leading-relaxed">{{ $billboard->description }}</p>
                    </div>
                    
                    @if($billboard->features && count($billboard->features) > 0)
                        <div class="mt-6">
                            <label class="block text-sm font-medium text-gray-400 mb-2">Features</label>
                            <div class="flex flex-wrap gap-2">
                                @foreach($billboard->features as $feature)
                                    <span class="bg-blue-900 text-blue-200 px-3 py-1 rounded-full text-sm border border-blue-700">
                                        <i class="fas fa-check mr-1"></i>{{ $feature }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Owner Information -->
                <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                    <h3 class="text-xl font-semibold text-gray-100 mb-6">Owner Information</h3>
                    
                    <div class="flex items-start space-x-4">
                        <div class="w-16 h-16 bg-gray-600 rounded-full flex items-center justify-center">
                            <i class="fas fa-user text-gray-300 text-2xl"></i>
                        </div>
                        <div class="flex-1">
                            <h4 class="text-lg font-medium text-gray-100">{{ $billboard->user->name }}</h4>
                            <p class="text-gray-400">{{ $billboard->user->email }}</p>
                            @if($billboard->user->phone)
                                <p class="text-gray-400">{{ $billboard->user->phone }}</p>
                            @endif
                            @if($billboard->user->company)
                                <p class="text-gray-400">{{ $billboard->user->company }}</p>
                            @endif
                            <p class="text-gray-500 text-sm mt-2">
                                Member since {{ $billboard->user->created_at->format('M Y') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Status Management -->
                <div class="bg-gray-800 rounded-lg p-6 mb-6 border border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-100 mb-4">Status Management</h3>
                    
                    <div class="space-y-4">
                        <!-- Verification Status -->
                        <div class="flex items-center justify-between p-4 bg-gray-700 rounded-lg">
                            <div>
                                <p class="text-gray-100 font-medium">Verification</p>
                                <p class="text-gray-400 text-sm">Billboard approval status</p>
                            </div>
                            <div>
                                @if($billboard->is_verified)
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-900 text-green-200">
                                        <i class="fas fa-check mr-1"></i> Verified
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-900 text-yellow-200">
                                        <i class="fas fa-clock mr-1"></i> Pending
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <!-- Active Status -->
                        <div class="flex items-center justify-between p-4 bg-gray-700 rounded-lg">
                            <div>
                                <p class="text-gray-100 font-medium">Active Status</p>
                                <p class="text-gray-400 text-sm">Available for booking</p>
                            </div>
                            <div>
                                @if($billboard->is_active)
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-900 text-green-200">
                                        <i class="fas fa-play mr-1"></i> Active
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-900 text-red-200">
                                        <i class="fas fa-pause mr-1"></i> Inactive
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-6 space-y-3">
                        @if(!$billboard->is_verified)
                            <button onclick="verifyBillboard({{ $billboard->id }})" 
                                    class="w-full bg-green-600 text-white py-2 px-4 rounded-md font-medium hover:bg-green-700 transition-colors">
                                <i class="fas fa-check mr-2"></i> Verify Billboard
                            </button>
                        @else
                            <button onclick="unverifyBillboard({{ $billboard->id }})" 
                                    class="w-full bg-yellow-600 text-white py-2 px-4 rounded-md font-medium hover:bg-yellow-700 transition-colors">
                                <i class="fas fa-times mr-2"></i> Unverify Billboard
                            </button>
                        @endif
                        
                        <button onclick="toggleActive({{ $billboard->id }})" 
                                class="w-full bg-orange text-white py-2 px-4 rounded-md font-medium hover:bg-orange-600 transition-colors">
                            <i class="fas fa-{{ $billboard->is_active ? 'pause' : 'play' }} mr-2"></i>
                            {{ $billboard->is_active ? 'Deactivate' : 'Activate' }} Billboard
                        </button>
                    </div>
                </div>

                <!-- Statistics -->
                <div class="bg-gray-800 rounded-lg p-6 mb-6 border border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-100 mb-4">Statistics</h3>
                    
                    <div class="space-y-4">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-400">Total Bookings</span>
                            <span class="text-gray-100 font-semibold">{{ $billboard->bookings->count() }}</span>
                        </div>
                        
                        <div class="flex justify-between items-center">
                            <span class="text-gray-400">Active Bookings</span>
                            <span class="text-gray-100 font-semibold">{{ $billboard->bookings->where('status', 'active')->count() }}</span>
                        </div>
                        
                        <div class="flex justify-between items-center">
                            <span class="text-gray-400">Completed Bookings</span>
                            <span class="text-gray-100 font-semibold">{{ $billboard->bookings->where('status', 'completed')->count() }}</span>
                        </div>
                        
                        <div class="flex justify-between items-center">
                            <span class="text-gray-400">Total Revenue</span>
                            <span class="text-orange font-semibold">₦{{ number_format($billboard->bookings->where('payment_status', 'paid')->sum('total_amount')) }}</span>
                        </div>
                        
                        <div class="flex justify-between items-center">
                            <span class="text-gray-400">Owner Earnings</span>
                            <span class="text-green-400 font-semibold">₦{{ number_format($billboard->bookings->where('payment_status', 'paid')->sum('total_amount') * 0.9) }}</span>
                        </div>
                        
                        <div class="flex justify-between items-center">
                            <span class="text-gray-400">Platform Commission</span>
                            <span class="text-blue-400 font-semibold">₦{{ number_format($billboard->bookings->where('payment_status', 'paid')->sum('total_amount') * 0.1) }}</span>
                        </div>
                    </div>
                </div>

                <!-- Recent Bookings -->
                <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-100 mb-4">Recent Bookings</h3>
                    
                    <div class="space-y-3">
                        @forelse($billboard->bookings->take(5) as $booking)
                            <div class="p-3 bg-gray-700 rounded-lg">
                                <div class="flex justify-between items-start mb-2">
                                    <div>
                                        <p class="text-gray-100 font-medium">{{ $booking->advertiser->name }}</p>
                                        <p class="text-gray-400 text-sm">{{ $booking->created_at->format('M d, Y') }}</p>
                                    </div>
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium
                                        @if($booking->status === 'active') bg-green-900 text-green-200
                                        @elseif($booking->status === 'pending') bg-yellow-900 text-yellow-200
                                        @elseif($booking->status === 'completed') bg-blue-900 text-blue-200
                                        @else bg-gray-900 text-gray-200 @endif">
                                        {{ ucfirst($booking->status) }}
                                    </span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-400 text-sm">
                                        {{ \Carbon\Carbon::parse($booking->start_date)->format('M d') }} - 
                                        {{ \Carbon\Carbon::parse($booking->end_date)->format('M d') }}
                                    </span>
                                    <span class="text-orange font-semibold">₦{{ number_format($booking->total_amount) }}</span>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-4">
                                <i class="fas fa-calendar-times text-gray-500 text-2xl mb-2"></i>
                                <p class="text-gray-400 text-sm">No bookings yet</p>
                            </div>
                        @endforelse
                    </div>
                    
                    @if($billboard->bookings->count() > 5)
                        <div class="mt-4 text-center">
                            <a href="{{ route('admin.bookings.index') }}?billboard={{ $billboard->id }}" 
                               class="text-orange hover:text-orange-300 text-sm">
                                View All Bookings <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for actions -->
<script>
function verifyBillboard(billboardId) {
    if (confirm('Are you sure you want to verify this billboard?')) {
        fetch(`/dashboard/admin/billboards/${billboardId}/verify`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({})
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Error: ' + (data.message || 'Failed to verify billboard'));
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while verifying the billboard.');
        });
    }
}

function unverifyBillboard(billboardId) {
    if (confirm('Are you sure you want to unverify this billboard?')) {
        fetch(`/dashboard/admin/billboards/${billboardId}/unverify`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({})
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Error: ' + (data.message || 'Failed to unverify billboard'));
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while unverifying the billboard.');
        });
    }
}

function toggleActive(billboardId) {
    fetch(`/dashboard/admin/billboards/${billboardId}/toggle-active`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({})
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        } else {
            alert('Error: ' + (data.message || 'Failed to toggle billboard status'));
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while toggling the billboard status.');
    });
}
</script>
@endsection