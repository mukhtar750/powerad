<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PowerAD Portal - Admin Calendar</title>
    <link rel="stylesheet" href="{{ asset('build/assets/app-BdhG_vQw.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'dark-blue': '#2E6EAC',
                        'orange': '#F58634',
                        'dark-grey': '#373435',
                        'light-green': '#E0E7E0',
                        'dark-green': '#2B411C',
                        'yellow': '#FFCC29',
                        'jacarta': '#2E6EAC',
                        'jacarta-dark': '#1E4A7A',
                    },
                    fontFamily: {
                        'orbitron': ['Orbitron', 'sans-serif'],
                        'exo': ['Exo 2', 'sans-serif'],
                        'futura': ['Futura', 'sans-serif'],
                    },
                },
            },
        }
    </script>
    <style>
        .fc .fc-toolbar-title { color: #fff; }
        .fc-theme-standard td, .fc-theme-standard th { border-color: #374151; }
        .fc .fc-daygrid-day-number { color: #e5e7eb; }
    </style>
</head>
<body class="antialiased bg-[#0E0D1C] text-gray-100 font-sans">
    <div class="flex h-screen">
        <!-- Sidebar (simplified) -->
        <aside class="w-64 bg-[#15132B] p-6 space-y-6 hidden lg:block">
            <div class="flex items-center space-x-3 mb-6">
                <img src="{{ asset('images/primarylogo.png') }}" alt="PowerAD International Logo" class="h-8 w-auto">
            </div>
            <nav>
                <a href="{{ route('dashboard.admin') }}" class="block py-2 px-4 rounded hover:bg-gray-700 mb-2">Dashboard</a>
                <a href="{{ route('dashboard.admin.calendar') }}" class="block py-2 px-4 rounded bg-gray-700 mb-2">Calendar</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-4 md:p-6 overflow-y-auto">
            <header class="pb-6 border-b border-gray-700 mb-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl md:text-3xl font-bold text-white font-orbitron">Bookings Calendar</h1>
                        <p class="text-gray-400">Visualize bookings across billboards.</p>
                    </div>
                    <a href="{{ route('dashboard.admin') }}" class="text-blue-400 hover:text-blue-300">Back to Dashboard</a>
                </div>
            </header>

            <div class="bg-[#15132B] p-4 md:p-6 rounded-lg shadow-lg">
                <div id="calendar" class="bg-[#0E0D1C] rounded-lg p-2"></div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const calendarEl = document.getElementById('calendar');
            const events = @json($events ?? []);

            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                height: 'auto',
                displayEventTime: false,
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                },
                events: events,
                eventClick: function(info) {
                    const e = info.event;
                    const details = [
                        `Title: ${e.title}`,
                        `Start: ${e.startStr}`,
                        e.endStr ? `End: ${e.endStr}` : null,
                        e.extendedProps?.status ? `Status: ${e.extendedProps.status}` : null,
                    ].filter(Boolean).join('\n');
                    alert(details);
                },
            });
            calendar.render();
        });
    </script>
</body>
</html>