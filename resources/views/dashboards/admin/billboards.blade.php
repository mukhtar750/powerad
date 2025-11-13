@extends('layouts.app')

@section('title', 'Billboard Management - Admin Dashboard')

@section('content')
<div class="min-h-screen bg-[#0E0D1C]">
    <!-- Header -->
    <div class="bg-[#15132B] border-b border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold text-gray-100">Billboard Management</h1>
                    <p class="text-gray-400 mt-1">Manage and approve billboard listings</p>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="text-right">
                        <div class="text-sm text-gray-400">Total Billboards</div>
                        <div class="text-2xl font-bold text-orange">{{ $billboards->total() }}</div>
                    </div>
                    <a href="{{ route('dashboard.admin.billboards.create') }}" 
                       class="bg-orange text-white px-4 py-2 rounded-lg font-medium hover:bg-orange/90 transition-colors">
                        <i class="fas fa-plus mr-2"></i> Create Billboard
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @if (session('status'))
            <div class="mb-6 rounded-md bg-green-900/40 border border-green-700 text-green-200 px-4 py-3">
                <div class="flex items-center">
                    <i class="fas fa-check-circle mr-2"></i>
                    <span>{{ session('status') }}</span>
                </div>
            </div>
        @endif
        @if ($errors->any())
            <div class="mb-6 rounded-md bg-red-900/40 border border-red-700 text-red-200 px-4 py-3">
                <div class="flex items-start">
                    <i class="fas fa-exclamation-triangle mr-2 mt-0.5"></i>
                    <div>
                        <div class="font-semibold">There were some issues with your submission:</div>
                        <ul class="list-disc ml-5 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif
        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Billboards -->
            <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm">Total Billboards</p>
                        <p class="text-2xl font-bold text-gray-100">{{ $billboards->total() }}</p>
                        <p class="text-blue-400 text-sm mt-1">
                            <i class="fas fa-bullhorn mr-1"></i>
                            All listings
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-bullhorn text-white text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Pending Verification -->
            <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm">Pending Verification</p>
                        <p class="text-2xl font-bold text-gray-100">{{ $billboards->where('is_verified', false)->count() }}</p>
                        <p class="text-yellow-400 text-sm mt-1">
                            <i class="fas fa-clock mr-1"></i>
                            Awaiting approval
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-yellow-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-hourglass-half text-white text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Verified Billboards -->
            <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm">Verified</p>
                        <p class="text-2xl font-bold text-gray-100">{{ $billboards->where('is_verified', true)->count() }}</p>
                        <p class="text-green-400 text-sm mt-1">
                            <i class="fas fa-check-circle mr-1"></i>
                            Approved listings
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-check-circle text-white text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Active Billboards -->
            <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm">Active</p>
                        <p class="text-2xl font-bold text-gray-100">{{ $billboards->where('is_active', true)->count() }}</p>
                        <p class="text-orange text-sm mt-1">
                            <i class="fas fa-play mr-1"></i>
                            Available for booking
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-orange rounded-lg flex items-center justify-center">
                        <i class="fas fa-play text-white text-xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters and Search -->
        <div class="bg-gray-800 rounded-lg p-6 mb-8 border border-gray-700">
            <form method="GET" action="{{ route('dashboard.admin.billboards') }}" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                    <!-- Search -->
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Search</label>
                        <input type="text" name="search" value="{{ request('search') }}" 
                               placeholder="Search billboards or LOAP..." 
                               class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-gray-100 focus:outline-none focus:ring-2 focus:ring-orange focus:border-orange">
                    </div>

                    <!-- Type Filter -->
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Type</label>
                        <select name="type" class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-gray-100 focus:outline-none focus:ring-2 focus:ring-orange focus:border-orange">
                            <option value="">All Types</option>
                            <option value="Digital" {{ request('type') == 'Digital' ? 'selected' : '' }}>Digital</option>
                            <option value="Static" {{ request('type') == 'Static' ? 'selected' : '' }}>Static</option>
                            <option value="LED" {{ request('type') == 'LED' ? 'selected' : '' }}>LED</option>
                        </select>
                    </div>

                    <!-- City Filter -->
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">City</label>
                        <select name="city" class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-gray-100 focus:outline-none focus:ring-2 focus:ring-orange focus:border-orange">
                            <option value="">All Cities</option>
                            <option value="Lagos" {{ request('city') == 'Lagos' ? 'selected' : '' }}>Lagos</option>
                            <option value="Abuja" {{ request('city') == 'Abuja' ? 'selected' : '' }}>Abuja</option>
                            <option value="Port Harcourt" {{ request('city') == 'Port Harcourt' ? 'selected' : '' }}>Port Harcourt</option>
                            <option value="Kano" {{ request('city') == 'Kano' ? 'selected' : '' }}>Kano</option>
                        </select>
                    </div>

                    <!-- Sort -->
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Sort By</label>
                        <select name="sort" class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-gray-100 focus:outline-none focus:ring-2 focus:ring-orange focus:border-orange">
                            <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest First</option>
                            <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest First</option>
                            <option value="owner" {{ request('sort') == 'owner' ? 'selected' : '' }}>Owner Name</option>
                            <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price: High to Low</option>
                            <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price: Low to High</option>
                        </select>
                    </div>

                    <!-- Actions -->
                    <div class="flex items-end space-x-2">
                        <button type="submit" class="bg-orange text-white px-6 py-2 rounded-md font-medium hover:bg-orange-600 transition-colors">
                            <i class="fas fa-search mr-2"></i> Filter
                        </button>
                        <a href="{{ route('dashboard.admin.billboards') }}" class="bg-gray-700 text-gray-300 px-6 py-2 rounded-md font-medium hover:bg-gray-600 transition-colors">
                            <i class="fas fa-times mr-2"></i> Clear
                        </a>
                    </div>
                </div>
            </form>
        </div>

        <!-- Bulk Actions -->
        <div class="bg-gray-800 rounded-lg p-4 mb-6 border border-gray-700">
            <form method="POST" action="{{ route('dashboard.admin.billboards.bulk-action') }}" id="bulk-action-form">
                @csrf
                <div class="flex items-center space-x-4">
                    <select name="action" class="px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-gray-100 focus:outline-none focus:ring-2 focus:ring-orange focus:border-orange">
                        <option value="">Bulk Actions</option>
                        <option value="verify">Verify Selected</option>
                        <option value="unverify">Unverify Selected</option>
                        <option value="activate">Activate Selected</option>
                        <option value="deactivate">Deactivate Selected</option>
                        <option value="delete">Delete Selected</option>
                    </select>
                    <button type="submit" class="bg-orange text-white px-6 py-2 rounded-md font-medium hover:bg-orange-600 transition-colors">
                        Apply
                    </button>
                    <span class="text-gray-400 text-sm" id="selected-count">0 selected</span>
                </div>
            </form>
        </div>

        <!-- Billboards Table -->
        <div class="bg-gray-800 rounded-lg border border-gray-700 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-700">
                <h3 class="text-lg font-semibold text-gray-100">Billboard Listings</h3>
            </div>
            
            <div class="px-6 py-4 border-b border-gray-700 flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <input type="checkbox" id="select-all" class="rounded border-gray-600 text-orange focus:ring-orange">
                    <span class="text-sm text-gray-400">Select All</span>
                </div>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse($billboards as $billboard)
                        <div class="bg-gray-800 border border-gray-700 rounded-lg overflow-hidden hover:border-gray-600 transition">
                            <div class="relative h-40 bg-gray-700">
                                @if($billboard->main_image)
                                    <img src="{{ $billboard->main_image_url }}" alt="{{ $billboard->title }}"
                                         class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-400">
                                        <i class="fas fa-image text-3xl"></i>
                                    </div>
                                @endif
                                <div class="absolute top-3 left-3">
                                    <input type="checkbox" name="billboard_ids[]" value="{{ $billboard->id }}" 
                                           class="billboard-checkbox rounded border-gray-600 text-orange focus:ring-orange">
                                </div>
                                <div class="absolute top-3 right-3 space-x-2">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                        @if($billboard->type === 'Digital') bg-blue-900 text-blue-200
                                        @elseif($billboard->type === 'LED') bg-purple-900 text-purple-200
                                        @else bg-gray-900 text-gray-200 @endif">
                                        {{ $billboard->type }}
                                    </span>
                                </div>
                            </div>
                            <div class="p-4 space-y-3">
                                <div class="flex items-start justify-between">
                                    <div>
                                        <h4 class="text-gray-100 font-semibold">{{ $billboard->title }}</h4>
                                        <p class="text-xs text-gray-400">{{ $billboard->size }} • {{ $billboard->orientation }}</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-gray-100 font-semibold">₦{{ number_format($billboard->price_per_day) }}</p>
                                        <p class="text-xs text-gray-400">per day</p>
                                    </div>
                                </div>
                                <div class="text-sm text-gray-300">
                                    <p class="font-medium">{{ $billboard->city }}, {{ $billboard->state }}</p>
                                    <p class="text-gray-400">{{ $billboard->location }}</p>
                                </div>
                                <div class="flex items-center flex-wrap gap-2">
                                    @if($billboard->is_verified)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-900 text-green-200">
                                            <i class="fas fa-check mr-1"></i> Verified
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-900 text-yellow-200">
                                            <i class="fas fa-clock mr-1"></i> Pending
                                        </span>
                                    @endif
                                    @if($billboard->is_active)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-900 text-green-200">
                                            <i class="fas fa-play mr-1"></i> Active
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-900 text-red-200">
                                            <i class="fas fa-pause mr-1"></i> Inactive
                                        </span>
                                    @endif
                                </div>
                                <div class="flex items-center justify-between pt-2">
                                    <div class="flex items-center space-x-3 text-sm">
                                        <span class="text-gray-400">Owner:</span>
                                        <span class="text-gray-200">{{ $billboard->user->name }}</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <a href="{{ route('dashboard.admin.billboards.show', $billboard) }}" 
                                           class="text-blue-400 hover:text-blue-300" title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        @if(!$billboard->is_verified)
                                            <button onclick="verifyBillboard({{ $billboard->id }})" 
                                                    class="text-green-400 hover:text-green-300" title="Verify">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        @else
                                            <button onclick="unverifyBillboard({{ $billboard->id }})" 
                                                    class="text-yellow-400 hover:text-yellow-300" title="Unverify">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        @endif
                                        <button onclick="toggleActive({{ $billboard->id }})" 
                                                class="text-orange hover:text-orange-300" title="{{ $billboard->is_active ? 'Deactivate' : 'Activate' }}">
                                            <i class="fas fa-{{ $billboard->is_active ? 'pause' : 'play' }}"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-1 sm:col-span-2 lg:col-span-3 text-center py-12">
                            <i class="fas fa-bullhorn text-gray-500 text-4xl mb-4"></i>
                            <h3 class="text-lg font-medium text-gray-100 mb-2">No billboards found</h3>
                            <p class="text-gray-400">No billboard listings match your current filters</p>
                        </div>
                    @endforelse
                </div>
            </div>
            
            @if($billboards->hasPages())
                <div class="px-6 py-4 border-t border-gray-700">
                    {{ $billboards->appends(request()->query())->links() }}
                </div>
            @endif
        </div>
    </div>
</div>

<!-- JavaScript for bulk actions and individual actions -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const selectAllCheckbox = document.getElementById('select-all');
    const billboardCheckboxes = document.querySelectorAll('.billboard-checkbox');
    const selectedCountSpan = document.getElementById('selected-count');
    const bulkActionForm = document.getElementById('bulk-action-form');

    // Select all functionality
    selectAllCheckbox.addEventListener('change', function() {
        billboardCheckboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
        updateSelectedCount();
    });

    // Individual checkbox change
    billboardCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            updateSelectedCount();
            updateSelectAllState();
        });
    });

    function updateSelectedCount() {
        const selectedCount = document.querySelectorAll('.billboard-checkbox:checked').length;
        selectedCountSpan.textContent = `${selectedCount} selected`;
    }

    function updateSelectAllState() {
        const totalCheckboxes = billboardCheckboxes.length;
        const checkedCheckboxes = document.querySelectorAll('.billboard-checkbox:checked').length;
        
        if (checkedCheckboxes === 0) {
            selectAllCheckbox.indeterminate = false;
            selectAllCheckbox.checked = false;
        } else if (checkedCheckboxes === totalCheckboxes) {
            selectAllCheckbox.indeterminate = false;
            selectAllCheckbox.checked = true;
        } else {
            selectAllCheckbox.indeterminate = true;
        }
    }

    // Bulk action form submission
    bulkActionForm.addEventListener('submit', function(e) {
        const selectedCheckboxes = document.querySelectorAll('.billboard-checkbox:checked');
        const action = this.querySelector('select[name="action"]').value;
        
        if (selectedCheckboxes.length === 0) {
            e.preventDefault();
            alert('Please select at least one billboard.');
            return;
        }
        
        if (!action) {
            e.preventDefault();
            alert('Please select an action.');
            return;
        }
        
        if (action === 'delete') {
            if (!confirm('Are you sure you want to delete the selected billboards? This action cannot be undone.')) {
                e.preventDefault();
                return;
            }
        }

        // Attach selected billboard IDs to the form before submit
        // Remove previously attached dynamic inputs (if any)
        this.querySelectorAll('input[name="billboard_ids[]"].dynamic').forEach(function(el) {
            el.remove();
        });

        selectedCheckboxes.forEach(function(checkbox) {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'billboard_ids[]';
            input.value = checkbox.value;
            input.classList.add('dynamic');
            bulkActionForm.appendChild(input);
        });
    });
});

// Individual action functions
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