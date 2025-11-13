@section('sidebar')
    <a href="{{ route('dashboard.arcon.index') }}" class="flex items-center py-3 px-4 rounded-lg bg-gray-700 text-white">
        <i class="fas fa-tachometer-alt w-5 h-5 mr-3 text-orange"></i>
        <span class="text-white font-medium">Dashboard</span>
    </a>
    <a href="{{ route('dashboard.arcon.practitioners') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
        <i class="fas fa-id-badge w-5 h-5 mr-3 text-gray-400"></i>
        <span class="text-gray-300">Practitioners</span>
    </a>
    <a href="{{ route('dashboard.arcon.content-approvals') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
        <i class="fas fa-images w-5 h-5 mr-3 text-gray-400"></i>
        <span class="text-gray-300">Content Approvals</span>
    </a>
    <a href="{{ route('dashboard.arcon.campaigns') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
        <i class="fas fa-flag w-5 h-5 mr-3 text-gray-400"></i>
        <span class="text-gray-300">Campaign Assessment</span>
    </a>
    <a href="{{ route('dashboard.arcon.multistate-campaigns') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
        <i class="fas fa-map-marked-alt w-5 h-5 mr-3 text-gray-400"></i>
        <span class="text-gray-300">Multi-state Campaigns</span>
    </a>
    <a href="{{ route('dashboard.arcon.sanctions') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
        <i class="fas fa-gavel w-5 h-5 mr-3 text-gray-400"></i>
        <span class="text-gray-300">Sanctions</span>
    </a>
    <a href="{{ route('dashboard.arcon.sanctions.tracking') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
        <i class="fas fa-chart-line w-5 h-5 mr-3 text-gray-400"></i>
        <span class="text-gray-300">Sanction Tracking</span>
    </a>
    <a href="{{ route('dashboard.arcon.notifications') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
        <i class="fas fa-bell w-5 h-5 mr-3 text-gray-400"></i>
        <span class="text-gray-300">Notifications</span>
    </a>
    <a href="{{ route('dashboard.arcon.reports') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
        <i class="fas fa-chart-bar w-5 h-5 mr-3 text-gray-400"></i>
        <span class="text-gray-300">Reports</span>
    </a>
    <a href="{{ route('dashboard.arcon.analytics') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
        <i class="fas fa-chart-pie w-5 h-5 mr-3 text-gray-400"></i>
        <span class="text-gray-300">Analytics</span>
    </a>
    <a href="{{ route('dashboard.arcon.training') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
        <i class="fas fa-graduation-cap w-5 h-5 mr-3 text-gray-400"></i>
        <span class="text-gray-300">Training & CPD</span>
    </a>
    <a href="{{ route('dashboard.arcon.settings') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-700 transition-colors">
        <i class="fas fa-cog w-5 h-5 mr-3 text-gray-400"></i>
        <span class="text-gray-300">Settings</span>
    </a>
@endsection