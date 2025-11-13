@extends('dashboards.regulator.layouts.regulator')
@section('title', 'State Regulator – GIS Map')
@section('content')
    @include('dashboards.regulator.partials.nav-state')
    <div class="bg-gray-800 rounded-lg p-6">
        <h1 class="text-xl font-semibold text-white mb-4">GIS Site Mapping</h1>
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 mb-6">
            <div class="lg:col-span-3">
                <div id="map" class="w-full h-[500px] rounded-lg overflow-hidden"></div>
            </div>
            <div class="bg-gray-900 rounded-lg p-4">
                <h2 class="text-white font-medium mb-3">Filters</h2>
                <div class="space-y-2 text-gray-300">
                    <label class="flex items-center space-x-2"><input type="checkbox" class="filter-status" data-status="approved" checked><span>Approved</span></label>
                    <label class="flex items-center space-x-2"><input type="checkbox" class="filter-status" data-status="pending" checked><span>Pending</span></label>
                    <label class="flex items-center space-x-2"><input type="checkbox" class="filter-status" data-status="illegal" checked><span>Illegal</span></label>
                </div>
                <h2 class="text-white font-medium mt-4 mb-3">Type</h2>
                <div class="space-y-2 text-gray-300">
                    <label class="flex items-center space-x-2"><input type="checkbox" class="filter-type" data-type="large" checked><span>Large</span></label>
                    <label class="flex items-center space-x-2"><input type="checkbox" class="filter-type" data-type="medium" checked><span>Medium</span></label>
                    <label class="flex items-center space-x-2"><input type="checkbox" class="filter-type" data-type="small" checked><span>Small</span></label>
                </div>
            </div>
        </div>
        <p class="text-gray-400 text-sm">Tip: Click markers for site details. Data is sample; model hookup next.</p>
    </div>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxJH8G4v3N5C3G8w6X9sCkGgOcT1C1bE9gWv+Z8n8=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kP5YsfJr3Qq6rGo=" crossorigin=""></script>
    <script>
        const sites = @json($sites ?? []);
        const statusColors = { approved: '#10B981', pending: '#F59E0B', illegal: '#EF4444' };

        const map = L.map('map').setView([6.5244, 3.3792], 11); // default center
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        const markers = [];
        function renderMarkers() {
            markers.forEach(m => map.removeLayer(m));
            markers.length = 0;

            const activeStatuses = Array.from(document.querySelectorAll('.filter-status:checked')).map(i => i.dataset.status);
            const activeTypes = Array.from(document.querySelectorAll('.filter-type:checked')).map(i => i.dataset.type);

            sites.filter(s => activeStatuses.includes(s.status) && activeTypes.includes(s.type)).forEach(site => {
                const marker = L.circleMarker([site.lat, site.lng], {
                    radius: 8,
                    color: statusColors[site.status] || '#3B82F6',
                    fillColor: statusColors[site.status] || '#3B82F6',
                    fillOpacity: 0.7
                }).addTo(map);
                marker.bindPopup(`<strong>${site.name}</strong><br>Status: ${site.status}<br>Type: ${site.type}`);
                markers.push(marker);
            });
        }

        document.querySelectorAll('.filter-status, .filter-type').forEach(i => i.addEventListener('change', renderMarkers));
        renderMarkers();
    </script>
@endsection