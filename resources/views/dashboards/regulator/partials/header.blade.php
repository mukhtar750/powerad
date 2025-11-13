<div class="flex items-center space-x-3 mb-6">
    <div class="logo-container">
        <img src="{{ asset('images/primarylogo.png') }}" alt="PowerAD International Logo" class="logo-image h-8 w-auto">
    </div>
    <div>
        <div class="text-orange text-sm font-medium">PowerAD Regulator</div>
        <div class="text-gray-400 text-xs">{{ Auth::user()->regulator_type === 'arcon' ? 'ARCON (National)' : 'State/Local' }}</div>
    </div>
</div>