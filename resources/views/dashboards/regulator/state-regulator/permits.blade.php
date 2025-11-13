@extends('dashboards.regulator.layouts.regulator')
@section('title', 'State Regulator – Permits')
@section('content')
    @include('dashboards.regulator.partials.nav-state')
    <div class="bg-gray-800 rounded-lg p-6">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-xl font-semibold text-white">Permit Management</h1>
            <a href="{{ route('dashboard.state-regulator.permits.create') }}" class="bg-orange-500 hover:bg-orange-600 text-white font-medium px-4 py-2 rounded">New Application</a>
        </div>
        <div class="bg-gray-900 rounded-lg p-4">
            <p class="text-gray-300 mb-2">Recent applications (sample):</p>
            <div class="space-y-2">
                <div class="flex items-center justify-between text-gray-300">
                    <div>
                        <div class="font-medium">Central Mall Billboard</div>
                        <div class="text-sm text-gray-400">Status: Pending</div>
                    </div>
                    <div class="space-x-2">
                        <a href="{{ route('dashboard.state-regulator.permits.view', ['id' => 1]) }}" class="text-blue-400 hover:text-blue-300">View</a>
                        <form method="POST" action="{{ route('dashboard.state-regulator.permits.approve', ['id' => 1]) }}" class="inline">
                            @csrf
                            <button class="text-green-400 hover:text-green-300">Approve</button>
                        </form>
                        <form method="POST" action="{{ route('dashboard.state-regulator.permits.reject', ['id' => 1]) }}" class="inline">
                            @csrf
                            <button class="text-red-400 hover:text-red-300">Reject</button>
                        </form>
                    </div>
                </div>
                <div class="flex items-center justify-between text-gray-300">
                    <div>
                        <div class="font-medium">Airport Road Signage</div>
                        <div class="text-sm text-gray-400">Status: Under Review</div>
                    </div>
                    <div class="space-x-2">
                        <a href="{{ route('dashboard.state-regulator.permits.view', ['id' => 2]) }}" class="text-blue-400 hover:text-blue-300">View</a>
                        <form method="POST" action="{{ route('dashboard.state-regulator.permits.approve', ['id' => 2]) }}" class="inline">
                            @csrf
                            <button class="text-green-400 hover:text-green-300">Approve</button>
                        </form>
                        <form method="POST" action="{{ route('dashboard.state-regulator.permits.reject', ['id' => 2]) }}" class="inline">
                            @csrf
                            <button class="text-red-400 hover:text-red-300">Reject</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection