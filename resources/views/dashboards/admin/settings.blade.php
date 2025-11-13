<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Settings</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="antialiased bg-[#0E0D1C] text-gray-100 font-sans">
    <div class="max-w-5xl mx-auto p-4 md:p-6">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold">Settings</h1>
                <p class="text-gray-400 text-sm">System configuration</p>
            </div>
            <a href="/dashboard/admin" class="text-sm text-blue-400 hover:text-blue-300">Back to Dashboard</a>
        </div>
        <div class="text-gray-400">Coming soon: roles/permissions, feature flags.</div>
        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="bg-[#15132B] border border-gray-700 rounded-lg p-4">
                <h2 class="text-lg font-bold mb-2">Profile Photo</h2>
                <p class="text-gray-400 text-sm mb-3">Manage your admin avatar shown across the dashboard.</p>
                <a href="/profile/photo" class="inline-block bg-orange hover:bg-orange/90 text-white rounded-lg text-sm px-4 py-2">Update Profile Photo</a>
            </div>
        </div>
    </div>
</body>
</html>

