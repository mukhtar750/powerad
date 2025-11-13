@extends('dashboards.regulator.layouts.regulator')
@section('title', 'ARCON - Reports')
@include('dashboards.regulator.partials.nav-arcon')
@section('content')
    <header class="mb-8">
        <h1 class="text-3xl font-bold text-white mb-2">National Reports</h1>
        <p class="text-gray-400 text-lg">Generate compliance and analysis reports.</p>
    </header>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <a href="{{ route('dashboard.arcon.reports.national-compliance') }}" class="bg-[#1A1A2E] p-6 rounded-lg border border-gray-700 hover:bg-gray-800 transition-colors">
            <h3 class="text-white font-semibold mb-2">National Compliance Report</h3>
            <p class="text-gray-300">Compliance metrics across regions and categories.</p>
        </a>
        <a href="{{ route('dashboard.arcon.reports.campaign-analysis') }}" class="bg-[#1A1A2E] p-6 rounded-lg border border-gray-700 hover:bg-gray-800 transition-colors">
            <h3 class="text-white font-semibold mb-2">Campaign Analysis Report</h3>
            <p class="text-gray-300">Performance insights by campaign and region.</p>
        </a>
    </div>
@endsection