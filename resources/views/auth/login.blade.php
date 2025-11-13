<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In · POWERAD INTERNATIONAL</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gradient-to-br from-[#363366] via-[#2E2A5F] to-[#1F1B4B] text-white">
    <div class="relative min-h-screen">
        <!-- Background decorations -->
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-[#F58634]/8 via-transparent to-transparent"></div>

        <div class="relative z-10 container mx-auto px-6 py-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                <!-- Left: marketing copy -->
                <div class="hidden lg:block">
                    <div class="inline-flex items-center bg-white/5 text-white/80 text-xs px-3 py-1 rounded-full mb-6 border border-white/10">
                        <span class="w-2 h-2 bg-orange-500 rounded-full mr-2"></span>
                        Trusted by 10,000+ users worldwide
                    </div>
                    <h1 class="text-4xl md:text-5xl font-extrabold mb-4 leading-tight">
                        Power your <span class="text-[#F58634]">digital future</span>
                    </h1>
                    <p class="text-white/70 max-w-xl mb-8">
                        Join thousands of teams building better products together. Start your journey with powerful tools designed for modern creators.
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-start space-x-3">
                            <div class="w-6 h-6 rounded bg-[#F58634]/20 border border-[#F58634]/40 flex items-center justify-center text-[#F58634] text-xs">✓</div>
                            <div>
                                <p class="text-sm font-semibold">Bank-level security</p>
                                <p class="text-xs text-white/60">Your data is encrypted end‑to‑end</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div class="w-6 h-6 rounded bg-[#F58634]/20 border border-[#F58634]/40 flex items-center justify-center text-[#F58634] text-xs">✓</div>
                            <div>
                                <p class="text-sm font-semibold">Lightning fast</p>
                                <p class="text-xs text-white/60">Optimized for peak performance</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div class="w-6 h-6 rounded bg-[#F58634]/20 border border-[#F58634]/40 flex items-center justify-center text-[#F58634] text-xs">✓</div>
                            <div>
                                <p class="text-sm font-semibold">Always in sync</p>
                                <p class="text-xs text-white/60">Access anywhere, anytime</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: sign in card -->
                <div class="w-full max-w-md mx-auto lg:max-w-lg">
                    <div class="flex flex-col items-center mb-6">
                        <img src="{{ asset('images/primarylogo.png') }}" alt="PowerAD Logo" class="h-12 w-auto">
                        <p class="text-xs text-white/50 mt-2">Powering Innovation</p>
                    </div>

                    <div class="bg-white/5 backdrop-blur rounded-2xl p-6 border border-white/10 shadow-xl">
                        <!-- Tabs -->
                        <div class="flex items-center bg-white/10 rounded-lg p-1 text-sm mb-6">
                            <a href="{{ route('login') }}" class="flex-1 text-center py-2 rounded-md bg-[#F58634] hover:bg-[#e9772a] text-white font-semibold transition-colors">Sign in</a>
                            <a href="{{ route('register') }}" class="flex-1 text-center py-2 rounded-md text-white/80 hover:bg-white/10">Sign up</a>
                        </div>

                        <!-- Form -->
                        <form action="{{ route('login') }}" method="POST" class="space-y-4">
                            @csrf
                            @if($errors->any())
                                <div class="text-sm text-red-400 bg-red-500/10 border border-red-500/30 rounded p-3">
                                    {{ $errors->first() }}
                                </div>
                            @endif
                            <div>
                                <label for="email" class="block text-white/80 text-sm mb-2">Email address</label>
                                <input id="email" name="email" type="email" class="w-full px-4 py-3 bg-[#111827] border border-white/10 rounded-lg text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-[#F58634]" placeholder="you@example.com" required>
                            </div>
                            <div>
                                <div class="flex items-center justify-between mb-2">
                                    <label for="password" class="block text-white/80 text-sm">Password</label>
                                    <a href="#" class="text-xs text-[#F58634] hover:text-[#ff9a50]">Forgot?</a>
                                </div>
                                <input id="password" name="password" type="password" class="w-full px-4 py-3 bg-[#111827] border border-white/10 rounded-lg text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-[#F58634]" placeholder="********" required>
                            </div>
                            <div class="flex items-center justify-between">
                                <label class="inline-flex items-center space-x-2 text-white/70 text-sm">
                                    <input type="checkbox" name="remember" class="rounded border-white/20 bg-[#111827]">
                                    <span>Remember me</span>
                                </label>
                            </div>
                            <button type="submit" class="w-full py-3 bg-[#F58634] hover:bg-[#e9772a] text-white font-semibold rounded-lg transition-colors">Sign in to your account</button>
                        </form>

                        <!-- OAuth buttons (placeholder) -->
                        <div class="my-6">
                            <div class="flex items-center">
                                <div class="flex-1 h-px bg-white/10"></div>
                                <span class="px-3 text-xs text-white/50">OR CONTINUE WITH</span>
                                <div class="flex-1 h-px bg-white/10"></div>
                            </div>
                            <div class="mt-4 grid grid-cols-2 gap-3">
                                <button class="py-3 bg-white/5 border border-white/10 rounded-lg text-white/80 hover:bg-white/10">Google</button>
                                <button class="py-3 bg-white/5 border border-white/10 rounded-lg text-white/80 hover:bg-white/10">GitHub</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>