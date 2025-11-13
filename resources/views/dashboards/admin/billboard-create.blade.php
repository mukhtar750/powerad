@extends('layouts.app')

@section('title', 'Create Billboard - Admin Dashboard')

@section('content')
<div class="min-h-screen bg-[#0E0D1C]">
    <!-- Header -->
    <div class="bg-[#15132B] border-b border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold text-gray-100">Create Billboard</h1>
                    <p class="text-gray-400 mt-1">Upload a new billboard and assign to LOAP</p>
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

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @if(session('success'))
            <div class="bg-green-900 border border-green-700 text-green-100 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-900 border border-red-700 text-red-100 px-4 py-3 rounded mb-6">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('dashboard.admin.billboards.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf

            <!-- Owner Selection -->
            <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                <h2 class="text-xl font-semibold text-gray-100 mb-4">Assign Owner (LOAP)</h2>
                <div>
                    <label for="owner_user_id" class="block text-sm font-medium text-gray-300 mb-2">LOAP Owner *</label>
                    <select id="owner_user_id" name="owner_user_id" required 
                            class="w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-lg text-white focus:outline-none focus:border-orange">
                        <option value="">Select LOAP</option>
                        @foreach($loaps as $loap)
                            <option value="{{ $loap->id }}" {{ old('owner_user_id') == $loap->id ? 'selected' : '' }}>
                                {{ $loap->name }} ({{ $loap->email }})
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Basic Information -->
            <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                <h2 class="text-xl font-semibold text-gray-100 mb-4">Basic Information</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Title *</label>
                        <input type="text" name="title" value="{{ old('title') }}" required 
                               class="w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-lg text-white">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Type *</label>
                        <select name="type" required class="w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-lg text-white">
                            <option value="">Select Type</option>
                            <option value="Digital" {{ old('type') == 'Digital' ? 'selected' : '' }}>Digital</option>
                            <option value="Static" {{ old('type') == 'Static' ? 'selected' : '' }}>Static</option>
                            <option value="LED" {{ old('type') == 'LED' ? 'selected' : '' }}>LED</option>
                            <option value="Traditional" {{ old('type') == 'Traditional' ? 'selected' : '' }}>Traditional</option>
                        </select>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-300 mb-2">Description *</label>
                        <textarea name="description" rows="4" required 
                                  class="w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-lg text-white">{{ old('description') }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Location Details -->
            <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                <h2 class="text-xl font-semibold text-gray-100 mb-4">Location Details</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Location *</label>
                        <input type="text" name="location" value="{{ old('location') }}" required 
                               class="w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-lg text-white">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Address *</label>
                        <input type="text" name="address" value="{{ old('address') }}" required 
                               class="w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-lg text-white">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">City *</label>
                        <input type="text" name="city" value="{{ old('city') }}" required 
                               class="w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-lg text-white">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">State *</label>
                        <input type="text" name="state" value="{{ old('state') }}" required 
                               class="w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-lg text-white">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Country *</label>
                        <input type="text" name="country" value="{{ old('country') }}" required 
                               class="w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-lg text-white">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Latitude</label>
                        <input type="text" name="latitude" value="{{ old('latitude') }}" 
                               class="w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-lg text-white">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Longitude</label>
                        <input type="text" name="longitude" value="{{ old('longitude') }}" 
                               class="w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-lg text-white">
                    </div>
                </div>
            </div>

            <!-- Specs and Pricing -->
            <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                <h2 class="text-xl font-semibold text-gray-100 mb-4">Specifications & Pricing</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Size *</label>
                        <input type="text" name="size" value="{{ old('size') }}" required 
                               class="w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-lg text-white" placeholder="e.g., 12m x 4m">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Orientation *</label>
                        <select name="orientation" required class="w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-lg text-white">
                            <option value="">Select Orientation</option>
                            <option value="Portrait" {{ old('orientation') == 'Portrait' ? 'selected' : '' }}>Portrait</option>
                            <option value="Landscape" {{ old('orientation') == 'Landscape' ? 'selected' : '' }}>Landscape</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Features (comma-separated)</label>
                        <input type="text" name="features" value="{{ old('features') }}" 
                               class="w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-lg text-white" placeholder="e.g., Backlit, High Traffic">
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Price per day *</label>
                        <input type="number" step="0.01" min="0" name="price_per_day" value="{{ old('price_per_day') }}" required 
                               class="w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-lg text-white">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Price per week *</label>
                        <input type="number" step="0.01" min="0" name="price_per_week" value="{{ old('price_per_week') }}" required 
                               class="w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-lg text-white">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Price per month *</label>
                        <input type="number" step="0.01" min="0" name="price_per_month" value="{{ old('price_per_month') }}" required 
                               class="w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-lg text-white">
                    </div>
                </div>
            </div>

            <!-- Images -->
            <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                <h2 class="text-xl font-semibold text-gray-100 mb-4">Upload Images</h2>
                <div>
                    <input type="file" name="images[]" multiple accept="image/*" 
                           class="w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-lg text-white">
                    <p class="text-gray-400 text-sm mt-2">You can upload multiple images. Max size 5MB each.</p>
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-orange text-white px-6 py-3 rounded-lg font-medium hover:bg-orange/90 transition-colors">
                    Create Billboard
                </button>
            </div>
        </form>
    </div>
</div>
@endsection