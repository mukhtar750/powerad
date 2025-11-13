@section('sidebar')
    <a href="{{ route('dashboard.state-regulator.index') }}" class="flex items-center py-3 px-4 rounded-lg bg-gray-700 text-white">
        <i class="fas fa-tachometer-alt w-5 h-5 mr-3 text-orange"></i>
        <span class="text-white font-medium">Dashboard</span>
    </a>
    <a href="{{ route('dashboard.state-regulator.gis') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
        <i class="fas fa-map w-5 h-5 mr-3 text-gray-400"></i>
        <span class="text-gray-300">GIS Map</span>
    </a>
    <a href="{{ route('dashboard.state-regulator.billboards') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
        <i class="fas fa-map-marker-alt w-5 h-5 mr-3 text-gray-400"></i>
        <span class="text-gray-300">Billboard Sites</span>
    </a>
    <a href="{{ route('dashboard.state-regulator.verification-queue') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
        <i class="fas fa-camera w-5 h-5 mr-3 text-gray-400"></i>
        <span class="text-gray-300">GPS Verification</span>
    </a>
    <a href="{{ route('dashboard.state-regulator.permits') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
        <i class="fas fa-file-alt w-5 h-5 mr-3 text-gray-400"></i>
        <span class="text-gray-300">Permits</span>
    </a>
    <a href="{{ route('dashboard.state-regulator.content-approvals') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
        <i class="fas fa-images w-5 h-5 mr-3 text-gray-400"></i>
        <span class="text-gray-300">Content Approvals</span>
    </a>
    <a href="{{ route('dashboard.state-regulator.enforcement') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
        <i class="fas fa-shield-alt w-5 h-5 mr-3 text-gray-400"></i>
        <span class="text-gray-300">Enforcement</span>
    </a>
    <a href="{{ route('dashboard.state-regulator.revenue') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
        <i class="fas fa-money-bill-wave w-5 h-5 mr-3 text-gray-400"></i>
        <span class="text-gray-300">Revenue</span>
    </a>
    <a href="{{ route('dashboard.state-regulator.citizen-reports') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
        <i class="fas fa-exclamation-triangle w-5 h-5 mr-3 text-gray-400"></i>
        <span class="text-gray-300">Citizen Reports</span>
    </a>
    <a href="{{ route('dashboard.state-regulator.reports') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
        <i class="fas fa-chart-bar w-5 h-5 mr-3 text-gray-400"></i>
        <span class="text-gray-300">Reports</span>
    </a>
    <a href="{{ route('dashboard.state-regulator.public-portal') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
        <i class="fas fa-users w-5 h-5 mr-3 text-gray-400"></i>
        <span class="text-gray-300">Public Portal</span>
    </a>
    <a href="{{ route('dashboard.state-regulator.data-api') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
        <i class="fas fa-database w-5 h-5 mr-3 text-gray-400"></i>
        <span class="text-gray-300">Data API</span>
    </a>
    <a href="{{ route('dashboard.state-regulator.settings') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
        <i class="fas fa-cog w-5 h-5 mr-3 text-gray-400"></i>
        <span class="text-gray-300">Settings</span>
    </a>
@endsection