@extends('dashboards.regulator.layouts.regulator')
@section('title', 'State Regulator – Create Permit')
@section('content')
    @include('dashboards.regulator.partials.nav-state')
    <div class="bg-gray-800 rounded-lg p-6">
        <h1 class="text-xl font-semibold text-white mb-4">Create Permit</h1>
        <form method="POST" action="{{ route('dashboard.state-regulator.permits.store') }}" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-300 mb-1">Billboard Name</label>
                    <input type="text" name="name" class="w-full bg-gray-900 text-white rounded p-2" required />
                </div>
                <div>
                    <label class="block text-gray-300 mb-1">Location (address)</label>
                    <input type="text" name="location" class="w-full bg-gray-900 text-white rounded p-2" required />
                </div>
                <div>
                    <label class="block text-gray-300 mb-1">Latitude</label>
                    <input type="text" name="lat" class="w-full bg-gray-900 text-white rounded p-2" required />
                </div>
                <div>
                    <label class="block text-gray-300 mb-1">Longitude</label>
                    <input type="text" name="lng" class="w-full bg-gray-900 text-white rounded p-2" required />
                </div>
                <div>
                    <label class="block text-gray-300 mb-1">Size</label>
                    <select name="size" class="w-full bg-gray-900 text-white rounded p-2" required>
                        <option value="small">Small</option>
                        <option value="medium">Medium</option>
                        <option value="large">Large</option>
                    </select>
                </div>
                <div>
                    <label class="block text-gray-300 mb-1">Type</label>
                    <select name="type" class="w-full bg-gray-900 text-white rounded p-2" required>
                        <option value="banner">Banner</option>
                        <option value="billboard">Billboard</option>
                        <option value="digital">Digital</option>
                    </select>
                </div>
            </div>
            <div>
                <label class="block text-gray-300 mb-1">Drawings (PDF)</label>
                <input type="file" name="drawings" accept="application/pdf" class="w-full bg-gray-900 text-white rounded p-2" />
            </div>
            <div>
                <label class="block text-gray-300 mb-1">Photos (JPG/PNG)</label>
                <input type="file" name="photos[]" multiple accept="image/*" class="w-full bg-gray-900 text-white rounded p-2" />
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-medium px-4 py-2 rounded">Submit Application</button>
            </div>
        </form>
    </div>
@endsection