<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>POWERAD INTERNATIONAL - Outdoor Media Aggregator</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&family=Georgia:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Exo+2:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Laravel Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Direct CSS link for testing -->
    <link rel="stylesheet" href="{{ asset('build/assets/app-BdhG_vQw.css') }}">
    
    <!-- Tailwind CSS CDN (fallback) -->
    <script src="https://cdn.tailwindcss.com"></script>
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
                        'gallant': ['Gallant', 'sans-serif'],
                        'montserrat': ['Montserrat', 'sans-serif'],
                        'georgia': ['Georgia', 'serif'],
                        'futura-md-bt': ['Futura Md BT', 'sans-serif'],
                        'orbitron': ['Orbitron', 'sans-serif'],
                        'exo': ['Exo 2', 'sans-serif'],
                        'futura': ['Futura', 'sans-serif'],
                    },
                },
            },
        }
    </script>
    <!-- Custom Styles -->
    <style>
        .cyber-grid {
            background-image: 
                linear-gradient(rgba(245, 134, 52, 0.1) 1px, transparent 1px),
                linear-gradient(90deg, rgba(245, 134, 52, 0.1) 1px, transparent 1px);
            background-size: 20px 20px;
        }
        .cyber-grid-large {
            background-image: 
                linear-gradient(rgba(245, 134, 52, 0.05) 2px, transparent 2px),
                linear-gradient(90deg, rgba(245, 134, 52, 0.05) 2px, transparent 2px);
            background-size: 40px 40px;
        }
        .cyber-glow-text {
            text-shadow: 0 0 10px rgba(245, 134, 52, 0.5);
        }
    </style>
</head>

<body class="antialiased bg-black overflow-x-hidden">
    <!-- Cyberpunk Grid Background -->
    <div class="fixed inset-0 z-0 opacity-20">
        <div class="cyber-grid"></div>
    </div>

    <!-- Particle System -->
    <div id="three-container" class="fixed inset-0 z-0"></div>
    <div id="particles-bg" class="fixed inset-0 z-0"></div>

    <div id="app" class="min-h-screen bg-white text-gray-800 relative pt-20">
        <!-- Clean Header - UPDATED NAVBAR -->
        <header class="bg-gray-100 backdrop-blur-sm fixed top-0 left-0 right-0 z-50 shadow-lg">
            <nav class="container mx-auto flex justify-between items-center py-4 px-6">
                <div class="logo">
                    <a href="/" class="flex items-center space-x-3">
                        <!-- PowerAD Logo -->
                        <img src="{{ asset('images/primarydark.png') }}" 
                             alt="PowerAD International Logo" 
                             class="h-12 w-auto">
                    </a>
                </div>

                <ul class="hidden md:flex space-x-8 items-center">
                    <li>
                        <a href="#" class="text-gray-600 hover:text-gray-800 transition-colors duration-300 flex items-center space-x-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-600 hover:text-gray-800 transition-colors duration-300 flex items-center space-x-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>About</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-600 hover:text-gray-800 transition-colors duration-300 flex items-center space-x-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                            <span>Solutions</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-600 hover:text-gray-800 transition-colors duration-300 flex items-center space-x-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <span>Contact</span>
                        </a>
                    </li>
                </ul>

                <div class="auth-buttons flex items-center space-x-4">
                    <a href="login" class="text-gray-600 hover:text-gray-800 transition-colors duration-300 flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                        </svg>
                        Login
                    </a>
                    <a href="register" class="bg-dark-blue hover:bg-dark-blue/90 text-white font-bold py-2 px-4 rounded-lg transition-all duration-300 flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Register
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center space-x-3">
                    <button class="text-gray-600 hover:text-gray-800 transition-colors" aria-label="Open mobile menu">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </nav>
        </header>

        <!-- Hero Section -->
        <section class="hero-section relative flex items-center justify-center text-center overflow-hidden min-h-screen" 
                 style="background-image: url('{{ asset('images/hero-bg.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; background-attachment: fixed; min-height: 100vh;">
            <!-- Single semi-transparent overlay for text readability -->
            <div class="absolute inset-0 bg-gradient-to-br from-black/30 via-black/20 to-black/40 z-0"></div>
            
            <!-- Main Hero Content -->
            <div class="relative z-10 p-4 pt-32 pb-16 max-w-6xl mx-auto text-center text-white sm:p-6 md:p-8 lg:p-10">
                <div class="mb-8">
                    <h1 class="text-5xl font-extrabold leading-tight sm:text-6xl md:text-7xl lg:text-8xl mb-6 font-gallant drop-shadow-2xl">
                        <span class="text-white drop-shadow-lg">The Hub for</span><br>
                        <span class="text-orange drop-shadow-lg">Outdoor</span><br>
                        <span class="text-white drop-shadow-lg">Advertising</span><br>
                        <span class="text-orange drop-shadow-lg">in Africa</span>
                    </h1>
                    <p class="text-lg sm:text-xl md:text-2xl text-white max-w-4xl mx-auto mb-8 leading-relaxed drop-shadow-lg font-medium">
                        Nigeria's first digital marketplace and workflow hub for OOH media. Connecting billboard owners, advertisers, service providers, and regulators in one unified platform.
                    </p>
                </div>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-6 justify-center items-center mb-12">
                    <a href="register" class="bg-dark-blue hover:bg-dark-blue/90 text-white font-bold py-4 px-8 rounded-lg flex items-center justify-center transition-all duration-300 group text-lg shadow-lg">
                        <span>Get Started</span>
                        <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                    <a href="#" class="bg-gray-700 hover:bg-gray-600 text-white font-bold py-4 px-8 rounded-lg flex items-center space-x-2 transition-all duration-300 text-lg shadow-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>Learn More</span>
                    </a>
                </div>

                <!-- Trust Indicators -->
                <div class="flex flex-col md:flex-row justify-center items-center space-y-3 md:space-y-0 md:space-x-8 text-gray-300 text-sm sm:text-base">
                    <div class="flex items-center space-x-2">
                        <span class="text-orange text-lg">•</span>
                        <span>Trusted by 500+ LOAPs</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <span class="text-orange text-lg">•</span>
                        <span>APCON & LASAA Verified</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <span class="text-orange text-lg">•</span>
                        <span>N2B+ Ad Spend Facilitated</span>
                    </div>
                </div>
            </div>

            <!-- Page Indicator -->
            <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-10">
                <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center">
                    <div class="w-2 h-2 bg-orange rounded-full"></div>
                </div>
            </div>
        </section>

        <!-- About Us Section -->
        <section class="about-us-section py-20 relative z-10 bg-gradient-to-b from-black via-gray-900 to-black">
            <div class="container mx-auto px-6">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div class="about-us-content">
                        <h2 class="text-4xl md:text-5xl font-extrabold leading-tight mb-6 text-white font-orbitron">
                            ABOUT <span class="text-orange-500">US</span>
                        </h2>
                        <p class="text-lg md:text-xl text-gray-400 mb-6 font-futura">
                            DHOA is revolutionizing Nigeria's outdoor advertising landscape by providing a cutting-edge digital platform that connects advertisers with a vast network of billboard owners.
                        </p>
                        <p class="text-lg md:text-xl text-gray-400 mb-8 font-futura">
                            Our mission is to streamline the entire advertising process, from discovery and booking to campaign management and analytics, fostering transparency, efficiency, and growth for all stakeholders.
                        </p>
                        <a href="#contact" class="btn-primary-lg">
                            Learn More
                        </a>
                    </div>
                    <div class="about-us-image relative">
                        <div class="w-full h-96 bg-gradient-to-br from-dark-blue/20 to-orange/20 rounded-lg shadow-lg border border-orange/20 flex items-center justify-center">
                            <div class="text-center">
                                <div class="w-16 h-16 bg-orange rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                </div>
                                <p class="text-dark-blue font-semibold">About PowerAD</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About Us Section -->
        <section class="how-it-works-section py-20 relative z-10 bg-gradient-to-b from-black via-gray-900 to-black">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-extrabold leading-tight mb-4 text-white font-orbitron">
                        HOW IT <span class="text-orange-500">WORKS</span>
                    </h2>
                    <p class="text-lg md:text-xl text-gray-400 max-w-3xl mx-auto font-futura">
                        DHOA simplifies outdoor advertising into a few easy steps.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                    <!-- Step 1: Discover -->
                    <div class="how-it-works-card bg-gray-800/50 backdrop-blur-sm p-8 rounded-xl border border-orange-500/20 hover:border-orange-500/50 transition-all duration-300 shadow-lg flex flex-col items-center text-center">
                        <div class="step-icon mb-6">
                            <div class="w-20 h-20 bg-gradient-to-r from-orange-500 to-yellow-500 rounded-full flex items-center justify-center shadow-lg shadow-orange-500/50">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </div>
                        </div>
                        <h3 class="text-2xl font-orbitron font-bold text-white mb-4">1. DISCOVER</h3>
                        <p class="text-gray-300 text-lg leading-relaxed font-futura">
                            Browse a comprehensive inventory of billboards across Nigeria with detailed information and real-time availability.
                        </p>
                    </div>

                    <!-- Step 2: Book -->
                    <div class="how-it-works-card bg-gray-800/50 backdrop-blur-sm p-8 rounded-xl border border-orange-500/20 hover:border-orange-500/50 transition-all duration-300 shadow-lg flex flex-col items-center text-center">
                        <div class="step-icon mb-6">
                            <div class="w-20 h-20 bg-gradient-to-r from-orange-500 to-yellow-500 rounded-full flex items-center justify-center shadow-lg shadow-orange-500/50">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                        </div>
                        <h3 class="text-2xl font-orbitron font-bold text-white mb-4">2. BOOK</h3>
                        <p class="text-gray-300 text-lg leading-relaxed font-futura">
                            Secure your desired ad space instantly through our streamlined booking and secure payment system.
                        </p>
                    </div>

                    <!-- Step 3: Launch -->
                    <div class="how-it-works-card bg-gray-800/50 backdrop-blur-sm p-8 rounded-xl border border-orange-500/20 hover:border-orange-500/50 transition-all duration-300 shadow-lg flex flex-col items-center text-center">
                        <div class="step-icon mb-6">
                            <div class="w-20 h-20 bg-gradient-to-r from-orange-500 to-yellow-500 rounded-full flex items-center justify-center shadow-lg shadow-orange-500/50">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"></path></svg>
                            </div>
                        </div>
                        <h3 class="text-2xl font-orbitron font-bold text-white mb-4">3. LAUNCH</h3>
                        <p class="text-gray-300 text-lg leading-relaxed font-futura">
                            Upload your creative, and our team will ensure your campaign goes live smoothly and on schedule.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="features-section py-20 relative z-10 bg-gradient-to-b from-black via-gray-900 to-black">
            <div class="container mx-auto px-6">
                <!-- Section Header -->
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-extrabold leading-tight mb-4 text-white font-orbitron">
                        <span class="text-orange-500">Innovate.</span> Engage. <span class="text-orange-500">Dominate.</span>
                    </h2>
                    <p class="text-lg md:text-xl text-gray-400 max-w-3xl mx-auto font-futura">
                        Experience the future of outdoor advertising with our cutting-edge technology suite.
                    </p>
                </div>

                <!-- Features Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-16">
                    <!-- Feature 1 -->
                    <div class="feature-card-cyber group">
                        <div class="feature-icon mb-6">
                            <div class="w-16 h-16 bg-gradient-to-r from-orange-500 to-yellow-500 rounded-lg flex items-center justify-center shadow-lg shadow-orange-500/50">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                        </div>
                        <h3 class="text-2xl font-orbitron font-bold text-white mb-4 group-hover:text-orange-500 transition-colors duration-300">
                            DYNAMIC 3D CAMPAIGNS
                        </h3>
                        <p class="text-gray-300 text-lg leading-relaxed mb-6 font-futura">
                            Create immersive and interactive 3D advertisements that capture attention and drive engagement like never before.
                        </p>
                        <div class="feature-tech-stack">
                            <span class="tech-tag">WebGL</span>
                            <span class="tech-tag">Three.js</span>
                            <span class="tech-tag">AR/VR</span>
                        </div>
                    </div>

                    <!-- Feature 2 -->
                    <div class="feature-card-cyber group">
                        <div class="feature-icon mb-6">
                            <div class="w-16 h-16 bg-gradient-to-r from-orange-500 to-yellow-500 rounded-lg flex items-center justify-center shadow-lg shadow-orange-500/50">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684L10.5 9l2.592-5.25A1 1 0 0114.72 3H19a2 2 0 012 2v10a2 2 0 01-2 2h-3.28a1 1 0 01-.948-.684L13.5 15l-2.592 5.25A1 1 0 019.28 21H5a2 2 0 01-2-2V5z"></path></svg>
                            </div>
                        </div>
                        <h3 class="text-2xl font-orbitron font-bold text-white mb-4 group-hover:text-orange-500 transition-colors duration-300">
                            GLOBAL REACH, LOCAL IMPACT
                        </h3>
                        <p class="text-gray-300 text-lg leading-relaxed mb-6 font-futura">
                            Leverage our extensive network to place your campaigns strategically, ensuring maximum visibility and relevance.
                        </p>
                        <div class="feature-tech-stack">
                            <span class="tech-tag">AI Targeting</span>
                            <span class="tech-tag">Geolocation</span>
                            <span class="tech-tag">Analytics</span>
                        </div>
                    </div>

                    <!-- Feature 3 -->
                    <div class="feature-card-cyber group">
                        <div class="feature-icon mb-6">
                            <div class="w-16 h-16 bg-gradient-to-r from-orange-500 to-yellow-500 rounded-lg flex items-center justify-center shadow-lg shadow-orange-500/50">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                        </div>
                        <h3 class="text-2xl font-orbitron font-bold text-white mb-4 group-hover:text-orange-500 transition-colors duration-300">
                            SEAMLESS PLATFORM INTEGRATION
                        </h3>
                        <p class="text-gray-300 text-lg leading-relaxed mb-6 font-futura">
                            Manage your entire advertising workflow from a single, intuitive platform, designed for efficiency and ease of use.
                        </p>
                        <div class="feature-tech-stack">
                            <span class="tech-tag">API</span>
                            <span class="tech-tag">Cloud</span>
                            <span class="tech-tag">Real-time</span>
                        </div>
                    </div>
                </div>

                <!-- Interactive Tech Showcase -->
                <div class="bg-gradient-to-r from-gray-900/50 to-black/50 rounded-2xl p-8 border border-orange/20 backdrop-blur-sm">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                        <div>
                            <h3 class="text-3xl font-orbitron font-bold text-white mb-6">
                                <span class="text-orange">NEXT-GEN</span> TECHNOLOGY STACK
                            </h3>
                            <p class="text-gray-300 text-lg mb-8 font-exo">
                                Powered by cutting-edge technologies that deliver unmatched performance and scalability.
                            </p>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="tech-feature p-4 bg-black/30 rounded-lg border border-orange/10">
                                    <div class="text-orange font-bold mb-1 text-2xl font-orbitron">99.9%</div>
                                    <div class="text-sm text-gray-400">Uptime</div>
                                </div>
                                <div class="tech-feature p-4 bg-black/30 rounded-lg border border-orange/10">
                                    <div class="text-orange font-bold mb-1 text-2xl font-orbitron">
                                        < 50ms</div>
                                            <div class="text-sm text-gray-400">Latency</div>
                                    </div>
                                    <div class="tech-feature p-4 bg-black/30 rounded-lg border border-orange/10">
                                        <div class="text-orange font-bold mb-1 text-2xl font-orbitron">10M+</div>
                                        <div class="text-sm text-gray-400">Impressions/day</div>
                                    </div>
                                    <div class="tech-feature p-4 bg-black/30 rounded-lg border border-orange/10">
                                        <div class="text-orange font-bold mb-1 text-2xl font-orbitron">256-bit</div>
                                        <div class="text-sm text-gray-400">Encryption</div>
                                    </div>
                                </div>
                            </div>
                            <div class="relative flex justify-center">
                                <div class="w-64 h-64 relative">
                                    <div class="absolute inset-0 border-2 border-orange/30 rounded-full animate-spin" style="animation-duration: 10s;"></div>
                                    <div class="absolute inset-4 border-2 border-yellow/20 rounded-full animate-spin" style="animation-duration: 8s; animation-direction: reverse;"></div>
                                    <div class="absolute inset-8 border-2 border-orange/40 rounded-full animate-spin" style="animation-duration: 6s;"></div>
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <div class="w-20 h-20 bg-gradient-to-r from-orange to-yellow rounded-full flex items-center justify-center shadow-lg shadow-orange/50">
                                            <svg class="w-10 h-10 text-black" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>

        


        <!-- The Problem Section -->
        <section class="problem-section py-20 relative z-10 bg-gradient-to-t from-black via-gray-900 to-black">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-extrabold leading-tight mb-4 text-white font-orbitron">
                        The Problem
                    </h2>
                    <p class="text-lg md:text-xl text-gray-400 max-w-3xl mx-auto font-futura">
                        Nigeria's outdoor advertising industry faces critical challenges that hinder
                        growth and efficiency
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                    <!-- Problem Card 1: Fragmented Industry -->
                    <div class="problem-card bg-gray-800/50 backdrop-blur-sm p-6 rounded-lg border border-jacarta/20 hover:border-jacarta/50 transition-all duration-300 shadow-lg">
                        <div class="text-jacarta mb-4 flex justify-center">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                        </div>
                        <h3 class="text-xl font-orbitron font-bold text-white mb-2 text-center">Fragmented Industry</h3>
                        <p class="text-gray-300 text-center font-futura">
                            Billboard owners, advertisers, and service providers operate in
                            silos with no unified platform
                        </p>
                    </div>

                    <!-- Problem Card 2: Manual Processes -->
                    <div class="problem-card bg-gray-800/50 backdrop-blur-sm p-6 rounded-lg border border-jacarta/20 hover:border-jacarta/50 transition-all duration-300 shadow-lg">
                        <div class="text-jacarta mb-4 flex justify-center">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                        </div>
                        <h3 class="text-xl font-orbitron font-bold text-white mb-2 text-center">Manual Processes</h3>
                        <p class="text-gray-300 text-center font-futura">
                            Paper-based workflows, lengthy approvals, and lack of digital
                            transformation
                        </p>
                    </div>

                    <!-- Problem Card 3: Trust Issues -->
                    <div class="problem-card bg-gray-800/50 backdrop-blur-sm p-6 rounded-lg border border-jacarta/20 hover:border-jacarta/50 transition-all duration-300 shadow-lg">
                        <div class="text-jacarta mb-4 flex justify-center">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.653-.146-1.267-.438-1.813M7 20h4V10H7v10zm0 0a5 5 0 01-.147-.768M7 20a5 5 0 00-1.157-.245H4V10H4c0-.653.146-1.267.438-1.813M8 10c0-.653.146-1.267.438-1.813A5.972 5.972 0 0110 4.588h0M8 10c0-.653.146-1.267.438-1.813A5.972 5.972 0 0110 4.588h0"></path></svg>
                        </div>
                        <h3 class="text-xl font-orbitron font-bold text-white mb-2 text-center">Trust Issues</h3>
                        <p class="text-gray-300 text-center font-futura">
                            No reliable verification system for stakeholders and service
                            quality
                        </p>
                    </div>

                    <!-- Problem Card 4: Payment Challenges -->
                    <div class="problem-card bg-gray-800/50 backdrop-blur-sm p-6 rounded-lg border border-jacarta/20 hover:border-jacarta/50 transition-all duration-300 shadow-lg">
                        <div class="text-jacarta mb-4 flex justify-center">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 8h6m-5 0a3 3 0 110 6H9l3 3m-3-6h6m-6 0a3 3 0 100 6h6a3 3 0 003-3V9a3 3 0 00-3-3H9a3 3 0 00-3 3v6a3 3 0 003 3z"></path></svg>
                        </div>
                        <h3 class="text-xl font-orbitron font-bold text-white mb-2 text-center">Payment Challenges</h3>
                        <p class="text-gray-300 text-center font-futura">
                            Insecure transactions, delayed payments, and lack of escrow
                            protection
                        </p>
                    </div>
                </div>

                <div class="text-center text-gray-300 text-lg font-futura flex items-center justify-center">
                    <span class="text-jacarta text-2xl mr-2">•</span>
                    This fragmentation costs the industry millions annually
                </div>
            </div>
        </section>

        <!-- The Problem Section -->
        <section class="problem-section py-20 relative z-10 bg-gradient-to-b from-black via-gray-900 to-black">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-extrabold leading-tight mb-4 text-white font-orbitron">
                        The Problem
                    </h2>
                    <p class="text-lg md:text-xl text-gray-400 max-w-3xl mx-auto font-futura">
                        Nigeria's outdoor advertising industry faces critical challenges that hinder
                        growth and efficiency
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Problem Card 1: Fragmented Industry -->
                    <div class="problem-card bg-gray-800/50 backdrop-blur-sm p-6 rounded-lg border border-jacarta/20 hover:border-jacarta/50 transition-all duration-300 shadow-lg">
                        <div class="text-jacarta mb-4 flex justify-center">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                        </div>
                        <h3 class="text-xl font-orbitron font-bold text-white mb-2 text-center">Fragmented Industry</h3>
                        <p class="text-gray-300 text-center font-futura">
                            Billboard owners, advertisers,
                            and service providers operate in
                            silos with no unified platform
                        </p>
                    </div>

                    <!-- Problem Card 2: Manual Processes -->
                    <div class="problem-card bg-gray-800/50 backdrop-blur-sm p-6 rounded-lg border border-jacarta/20 hover:border-jacarta/50 transition-all duration-300 shadow-lg">
                        <div class="text-jacarta mb-4 flex justify-center">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M12 16h.01"></path></svg>
                        </div>
                        <h3 class="text-xl font-orbitron font-bold text-white mb-2 text-center">Manual Processes</h3>
                        <p class="text-gray-300 text-center font-futura">
                            Paper-based workflows, lengthy
                            approvals, and lack of digital
                            transformation
                        </p>
                    </div>

                    <!-- Problem Card 3: Trust Issues -->
                    <div class="problem-card bg-gray-800/50 backdrop-blur-sm p-6 rounded-lg border border-jacarta/20 hover:border-jacarta/50 transition-all duration-300 shadow-lg">
                        <div class="text-jacarta mb-4 flex justify-center">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.653-.146-1.267-.438-1.813M7 20h4V10H7v10zm0 0a5 5 0 01-.147-.768M7 20a5 5 0 00-1.157-.245H4V10H4c0-.653.146-1.267.438-1.813M8 10c0-.653.146-1.267.438-1.813A5.972 5.972 0 0110 4.588h0M8 10c0-.653.146-1.267.438-1.813A5.972 5.972 0 0110 4.588h0"></path></svg>
                        </div>
                        <h3 class="text-xl font-orbitron font-bold text-white mb-2 text-center">Trust Issues</h3>
                        <p class="text-gray-300 text-center font-futura">
                            No reliable verification system for stakeholders and service
                            quality
                        </p>
                    </div>

                    <!-- Problem Card 4: Payment Challenges -->
                    <div class="problem-card bg-gray-800/50 backdrop-blur-sm p-6 rounded-lg border border-jacarta/20 hover:border-jacarta/50 transition-all duration-300 shadow-lg">
                        <div class="text-jacarta mb-4 flex justify-center">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 8h6m-5 0a3 3 0 110 6H9l3 3m-3-6h6m-6 0a3 3 0 100 6h6a3 3 0 003-3V9a3 3 0 00-3-3H9a3 3 0 00-3 3v6a3 3 0 003 3z"></path></svg>
                        </div>
                        <h3 class="text-xl font-orbitron font-bold text-white mb-2 text-center">Payment Challenges</h3>
                        <p class="text-gray-300 text-center font-futura">
                            Insecure transactions, delayed payments, and lack of escrow
                            protection
                        </p>
                    </div>
                </div>

                <div class="text-center text-gray-300 text-lg font-futura flex items-center justify-center">
                    <span class="text-jacarta text-2xl mr-2">•</span>
                    This fragmentation costs the industry millions annually
                </div>
            </div>
        </section>



        <!-- The Solution Section -->
        <section class="solution-section py-20 relative z-10 bg-gradient-to-b from-black via-gray-900 to-black">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-extrabold leading-tight mb-4 text-white font-orbitron">
                        The Solution
                    </h2>
                    <p class="text-lg md:text-xl text-gray-400 max-w-3xl mx-auto font-futura">
                        POWERAD offers a comprehensive platform to revolutionize Nigeria's outdoor advertising industry.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Solution Card 1: Unified Platform -->
                    <div class="solution-card bg-gray-800/50 backdrop-blur-sm p-6 rounded-lg border border-orange/20 hover:border-orange/50 transition-all duration-300 shadow-lg">
                        <div class="text-orange mb-4 flex justify-center">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                        </div>
                        <h3 class="text-xl font-orbitron font-bold text-white mb-2 text-center">Unified Platform</h3>
                        <p class="text-gray-300 text-center font-futura">
                            A single, integrated platform connecting billboard owners, advertisers, and service providers.
                        </p>
                    </div>

                    <!-- Solution Card 2: Streamlined Operations -->
                    <div class="solution-card bg-gray-800/50 backdrop-blur-sm p-6 rounded-lg border border-orange/20 hover:border-orange/50 transition-all duration-300 shadow-lg">
                        <div class="text-orange mb-4 flex justify-center">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        </div>
                        <h3 class="text-xl font-orbitron font-bold text-white mb-2 text-center">Streamlined Operations</h3>
                        <p class="text-gray-300 text-center font-futura">
                            Automated workflows, digital approvals, and real-time campaign management.
                        </p>
                    </div>

                    <!-- Solution Card 3: Enhanced Transparency -->
                    <div class="solution-card bg-gray-800/50 backdrop-blur-sm p-6 rounded-lg border border-orange/20 hover:border-orange/50 transition-all duration-300 shadow-lg">
                        <div class="text-orange mb-4 flex justify-center">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h3 class="text-xl font-orbitron font-bold text-white mb-2 text-center">Enhanced Transparency</h3>
                        <p class="text-gray-300 text-center font-futura">
                            Verified data, performance tracking, and secure payment processing with escrow.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="solution-section py-20 relative z-10 bg-gradient-to-b from-black via-gray-900 to-black">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-extrabold leading-tight mb-4 text-white font-orbitron">
                        The Solution
                    </h2>
                    <p class="text-lg md:text-xl text-gray-400 max-w-3xl mx-auto font-futura">
                        POWERAD offers a comprehensive platform to revolutionize Nigeria's outdoor advertising industry.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Solution Card 1: Unified Platform -->
                    <div class="solution-card bg-gray-800/50 backdrop-blur-sm p-6 rounded-lg border border-orange/20 hover:border-orange/50 transition-all duration-300 shadow-lg">
                        <div class="text-orange mb-4 flex justify-center">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                        </div>
                        <h3 class="text-xl font-orbitron font-bold text-white mb-2 text-center">Unified Platform</h3>
                        <p class="text-gray-300 text-center font-futura">
                            A single, integrated platform connecting billboard owners, advertisers, and service providers.
                        </p>
                    </div>

                    <!-- Solution Card 2: Streamlined Operations -->
                    <div class="solution-card bg-gray-800/50 backdrop-blur-sm p-6 rounded-lg border border-orange/20 hover:border-orange/50 transition-all duration-300 shadow-lg">
                        <div class="text-orange mb-4 flex justify-center">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        </div>
                        <h3 class="text-xl font-orbitron font-bold text-white mb-2 text-center">Streamlined Operations</h3>
                        <p class="text-gray-300 text-center font-futura">
                            Automated workflows, digital approvals, and real-time campaign management.
                        </p>
                    </div>

                    <!-- Solution Card 3: Enhanced Transparency -->
                    <div class="solution-card bg-gray-800/50 backdrop-blur-sm p-6 rounded-lg border border-orange/20 hover:border-orange/50 transition-all duration-300 shadow-lg">
                        <div class="text-orange mb-4 flex justify-center">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h3 class="text-xl font-orbitron font-bold text-white mb-2 text-center">Enhanced Transparency</h3>
                        <p class="text-gray-300 text-center font-futura">
                            Verified data, performance tracking, and secure payment processing with escrow.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer Section -->
        <footer class="bg-gray-900 text-gray-300 py-12 relative z-10">
            <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- About Us -->
                <div>
                    <h3 class="text-xl font-bold text-white mb-4 font-orbitron">About POWERAD</h3>
                    <p class="text-sm font-futura leading-relaxed">
                        POWERAD INTERNATIONAL is a leading digital advertising agency dedicated to empowering businesses with innovative and effective marketing solutions. We drive growth, enhance brand visibility, and deliver measurable results.
                    </p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-xl font-bold text-white mb-4 font-orbitron">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-orange transition-colors duration-300 font-futura">Home</a></li>
                        <li><a href="#" class="hover:text-orange transition-colors duration-300 font-futura">Services</a></li>
                        <li><a href="#" class="hover:text-orange transition-colors duration-300 font-futura">About Us</a></li>
                        <li><a href="#" class="hover:text-orange transition-colors duration-300 font-futura">Contact</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h3 class="text-xl font-bold text-white mb-4 font-orbitron">Contact Us</h3>
                    <p class="text-sm font-futura"><i class="fas fa-map-marker-alt mr-2 text-orange"></i> 123 Ad Street, Digital City, World</p>
                    <p class="text-sm font-futura mt-2"><i class="fas fa-envelope mr-2 text-orange"></i> info@powerad.com</p>
                    <p class="text-sm font-futura mt-2"><i class="fas fa-phone-alt mr-2 text-orange"></i> +1 (234) 567-8900</p>
                    <div class="flex space-x-4 mt-4">
                        <a href="#" class="text-gray-400 hover:text-orange transition-colors duration-300"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-gray-400 hover:text-orange transition-colors duration-300"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-orange transition-colors duration-300"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="text-gray-400 hover:text-orange transition-colors duration-300"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="text-center text-gray-500 text-sm mt-8 border-t border-gray-800 pt-8">
                &copy; 2024 POWERAD INTERNATIONAL. All rights reserved.
            </div>
        </footer>
        <section class="cta-section py-20 relative z-10 bg-gradient-to-b from-black via-gray-900 to-black">
            <div class="container mx-auto px-6 text-center">
                <h2 class="text-4xl md:text-5xl font-extrabold leading-tight mb-6 text-white font-orbitron">
                    Ready to Transform Your Advertising?
                </h2>
                <p class="text-lg md:text-xl text-gray-400 max-w-3xl mx-auto mb-10 font-futura">
                    Join POWERAD today and experience a seamless, transparent, and efficient
                    outdoor advertising ecosystem.
                </p>
                <a href="#contact" class="btn-primary bg-orange-600 hover:bg-orange-700 text-white font-bold py-3 px-8 rounded-full text-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                    Get Started Now
                </a>
            </div>
        </section>
        <!-- Contact Section -->
        <section class="contact-section py-20 relative z-10 bg-gradient-to-b from-black via-gray-900 to-black">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-extrabold leading-tight mb-4 text-white font-orbitron">
                        Get in Touch
                    </h2>
                    <p class="text-lg md:text-xl text-gray-400 max-w-3xl mx-auto font-futura">
                        Have questions or ready to start your campaign? Contact us today!
                    </p>
                </div>

                <div class="max-w-3xl mx-auto bg-gray-800/50 backdrop-blur-sm p-8 rounded-lg border border-jacarta/20 shadow-lg">
                    <form action="#" method="POST" class="space-y-6">
                        <div>
                            <label for="name" class="block text-gray-300 text-sm font-bold mb-2 font-futura">Name</label>
                            <input type="text" id="name" name="name" class="w-full px-4 py-3 rounded-lg bg-gray-700 border border-jacarta/30 focus:border-orange-500 focus:ring focus:ring-orange-500 focus:ring-opacity-50 text-white font-futura" placeholder="Your Name" required>
                        </div>
                        <div>
                            <label for="email" class="block text-gray-300 text-sm font-bold mb-2 font-futura">Email</label>
                            <input type="email" id="email" name="email" class="w-full px-4 py-3 rounded-lg bg-gray-700 border border-jacarta/30 focus:border-orange-500 focus:ring focus:ring-orange-500 focus:ring-opacity-50 text-white font-futura" placeholder="Your Email" required>
                        </div>
                        <div>
                            <label for="subject" class="block text-gray-300 text-sm font-bold mb-2 font-futura">Subject</label>
                            <input type="text" id="subject" name="subject" class="w-full px-4 py-3 rounded-lg bg-gray-700 border border-jacarta/30 focus:border-orange-500 focus:ring focus:ring-orange-500 focus:ring-opacity-50 text-white font-futura" placeholder="Subject" required>
                        </div>
                        <div>
                            <label for="message" class="block text-gray-300 text-sm font-bold mb-2 font-futura">Message</label>
                            <textarea id="message" name="message" rows="5" class="w-full px-4 py-3 rounded-lg bg-gray-700 border border-jacarta/30 focus:border-orange-500 focus:ring focus:ring-orange-500 focus:ring-opacity-50 text-white font-futura" placeholder="Your Message" required></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn-primary bg-orange-600 hover:bg-orange-700 text-white font-bold py-3 px-8 rounded-full text-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
            <div class="absolute inset-0 bg-gradient-to-br from-gray-900 via-black to-orange/10"></div>
            <div class="absolute inset-0 opacity-10">
                <div class="cyber-grid-large"></div>
            </div>

            <div class="container mx-auto px-6 relative z-10">
                <div class="max-w-4xl mx-auto text-center">
                    <!-- Main CTA Header -->
                    <div class="mb-12">
                        <h2 class="text-5xl md:text-6xl font-orbitron font-black mb-6">
                            <span class="text-white">READY TO</span>
                            <br>
                            <span class="text-orange cyber-glow-text">TRANSFORM</span>
                            <span class="text-white">YOUR ADVERTISING?</span>
                        </h2>
                        <div class="w-32 h-1 bg-gradient-to-r from-orange to-yellow mx-auto mb-8"></div>
                        <p class="text-xl md:text-2xl text-gray-300 mb-8 font-exo leading-relaxed">
                            Join <span class="text-orange font-bold">POWERAD INTERNATIONAL</span> and step into the future of outdoor media.
                            <br class="hidden md:block">
                            Experience next-generation advertising technology today.
                        </p>
                    </div>

                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row gap-6 justify-center items-center mb-16">
                        <a href="#" class="btn btn-primary btn-lg cyber-btn-primary group">
                            <span class="relative z-10 flex items-center">
                                <svg class="w-5 h-5 mr-2 group-hover:animate-spin" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd"></path>
                                </svg>
                                START FREE CONSULTATION
                            </span>
                        </a>
                        <a href="#" class="btn btn-secondary btn-lg cyber-btn-secondary group">
                            <span class="relative z-10 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v6a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path>
                                </svg>
                                WATCH DEMO
                            </span>
                        </a>
                    </div>

                    <!-- Contact Info Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-4xl mx-auto">
                        <div class="contact-card backdrop-blur-sm bg-black/30 p-6 rounded-lg border border-orange/20 hover:border-orange/50 transition-all duration-300">
                            <div class="text-orange mb-2">
                                <svg class="w-8 h-8 mx-auto" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                </svg>
                            </div>
                            <h4 class="font-orbitron font-bold text-white mb-2">EMAIL US</h4>
                            <p class="text-gray-400 text-sm">Get in touch with our team</p>
                        </div>
                        <div class="contact-card backdrop-blur-sm bg-black/30 p-6 rounded-lg border border-orange/20 hover:border-orange/50 transition-all duration-300">
                            <div class="text-orange mb-2">
                                <svg class="w-8 h-8 mx-auto" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                                </svg>
                            </div>
                            <h4 class="font-orbitron font-bold text-white mb-2">CALL US</h4>
                            <p class="text-gray-400 text-sm">Speak with our experts</p>
                        </div>
                        <div class="contact-card backdrop-blur-sm bg-black/30 p-6 rounded-lg border border-orange/20 hover:border-orange/50 transition-all duration-300">
                            <div class="text-orange mb-2">
                                <svg class="w-8 h-8 mx-auto" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <h4 class="font-orbitron font-bold text-white mb-2">LIVE CHAT</h4>
                            <p class="text-gray-400 text-sm">Instant support available</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- The Team Section -->
        <section class="team-section py-20 relative z-10 bg-gradient-to-t from-black via-gray-900 to-black">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-extrabold leading-tight mb-4 text-white font-orbitron">
                        Our Visionary Team
                    </h2>
                    <p class="text-lg md:text-xl text-gray-400 max-w-3xl mx-auto font-futura">
                        Meet the brilliant minds driving POWERAD INTERNATIONAL forward.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Team Member 1 -->
                    <div class="team-card bg-gray-800/50 backdrop-blur-sm p-6 rounded-lg border border-jacarta/20 hover:border-jacarta/50 transition-all duration-300 shadow-lg text-center">
                        <div class="w-32 h-32 rounded-full mx-auto mb-4 border-2 border-orange p-1 bg-gradient-to-br from-dark-blue to-orange flex items-center justify-center">
                            <span class="text-white text-2xl font-bold">TM</span>
                        </div>
                        <h3 class="text-xl font-orbitron font-bold text-white mb-1">John Doe</h3>
                        <p class="text-orange text-sm mb-2">CEO & Founder</p>
                        <p class="text-gray-300 text-sm font-futura">Visionary leader with 15+ years in ad-tech.</p>
                    </div>

                    <!-- Team Member 2 -->
                    <div class="team-card bg-gray-800/50 backdrop-blur-sm p-6 rounded-lg border border-jacarta/20 hover:border-jacarta/50 transition-all duration-300 shadow-lg text-center">
                        <div class="w-32 h-32 rounded-full mx-auto mb-4 border-2 border-orange p-1 bg-gradient-to-br from-dark-blue to-orange flex items-center justify-center">
                            <span class="text-white text-2xl font-bold">TM</span>
                        </div>
                        <h3 class="text-xl font-orbitron font-bold text-white mb-1">Jane Smith</h3>
                        <p class="text-orange text-sm mb-2">CTO</p>
                        <p class="text-gray-300 text-sm font-futura">Master architect of scalable tech solutions.</p>
                    </div>

                    <!-- Team Member 3 -->
                    <div class="team-card bg-gray-800/50 backdrop-blur-sm p-6 rounded-lg border border-jacarta/20 hover:border-jacarta/50 transition-all duration-300 shadow-lg text-center">
                        <div class="w-32 h-32 rounded-full mx-auto mb-4 border-2 border-orange p-1 bg-gradient-to-br from-dark-blue to-orange flex items-center justify-center">
                            <span class="text-white text-2xl font-bold">TM</span>
                        </div>
                        <h3 class="text-xl font-orbitron font-bold text-white mb-1">David Lee</h3>
                        <p class="text-orange text-sm mb-2">Head of Operations</p>
                        <p class="text-gray-300 text-sm font-futura">Ensuring seamless execution and delivery.</p>
                    </div>

                    <!-- Team Member 4 -->
                    <div class="team-card bg-gray-800/50 backdrop-blur-sm p-6 rounded-lg border border-jacarta/20 hover:border-jacarta/50 transition-all duration-300 shadow-lg text-center">
                        <div class="w-32 h-32 rounded-full mx-auto mb-4 border-2 border-orange p-1 bg-gradient-to-br from-dark-blue to-orange flex items-center justify-center">
                            <span class="text-white text-2xl font-bold">TM</span>
                        </div>
                        <h3 class="text-xl font-orbitron font-bold text-white mb-1">Sarah Chen</h3>
                        <p class="text-orange text-sm mb-2">Marketing Director</p>
                        <p class="text-gray-300 text-sm font-futura">Crafting compelling narratives and growth strategies.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="team-section py-20 relative z-10 bg-gradient-to-t from-black via-gray-900 to-black">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-extrabold leading-tight mb-4 text-white font-orbitron">
                        Our Visionary Team
                    </h2>
                    <p class="text-lg md:text-xl text-gray-400 max-w-3xl mx-auto font-futura">
                        Meet the brilliant minds driving POWERAD INTERNATIONAL forward.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Team Member 1 -->
                    <div class="team-card bg-gray-800/50 backdrop-blur-sm p-6 rounded-lg border border-jacarta/20 hover:border-jacarta/50 transition-all duration-300 shadow-lg text-center">
                        <div class="w-32 h-32 rounded-full mx-auto mb-4 border-2 border-orange p-1 bg-gradient-to-br from-dark-blue to-orange flex items-center justify-center">
                            <span class="text-white text-2xl font-bold">TM</span>
                        </div>
                        <h3 class="text-xl font-orbitron font-bold text-white mb-1">John Doe</h3>
                        <p class="text-orange text-sm mb-2">CEO & Founder</p>
                        <p class="text-gray-300 text-sm font-futura">Visionary leader with 15+ years in ad-tech.</p>
                    </div>

                    <!-- Team Member 2 -->
                    <div class="team-card bg-gray-800/50 backdrop-blur-sm p-6 rounded-lg border border-jacarta/20 hover:border-jacarta/50 transition-all duration-300 shadow-lg text-center">
                        <div class="w-32 h-32 rounded-full mx-auto mb-4 border-2 border-orange p-1 bg-gradient-to-br from-dark-blue to-orange flex items-center justify-center">
                            <span class="text-white text-2xl font-bold">TM</span>
                        </div>
                        <h3 class="text-xl font-orbitron font-bold text-white mb-1">Jane Smith</h3>
                        <p class="text-orange text-sm mb-2">CTO</p>
                        <p class="text-gray-300 text-sm font-futura">Master architect of scalable tech solutions.</p>
                    </div>

                    <!-- Team Member 3 -->
                    <div class="team-card bg-gray-800/50 backdrop-blur-sm p-6 rounded-lg border border-jacarta/20 hover:border-jacarta/50 transition-all duration-300 shadow-lg text-center">
                        <div class="w-32 h-32 rounded-full mx-auto mb-4 border-2 border-orange p-1 bg-gradient-to-br from-dark-blue to-orange flex items-center justify-center">
                            <span class="text-white text-2xl font-bold">TM</span>
                        </div>
                        <h3 class="text-xl font-orbitron font-bold text-white mb-1">David Lee</h3>
                        <p class="text-orange text-sm mb-2">Head of Operations</p>
                        <p class="text-gray-300 text-sm font-futura">Ensuring seamless execution and delivery.</p>
                    </div>

                    <!-- Team Member 4 -->
                    <div class="team-card bg-gray-800/50 backdrop-blur-sm p-6 rounded-lg border border-jacarta/20 hover:border-jacarta/50 transition-all duration-300 shadow-lg text-center">
                        <div class="w-32 h-32 rounded-full mx-auto mb-4 border-2 border-orange p-1 bg-gradient-to-br from-dark-blue to-orange flex items-center justify-center">
                            <span class="text-white text-2xl font-bold">TM</span>
                        </div>
                        <h3 class="text-xl font-orbitron font-bold text-white mb-1">Sarah Chen</h3>
                        <p class="text-orange text-sm mb-2">Marketing Director</p>
                        <p class="text-gray-300 text-sm font-futura">Crafting compelling narratives and growth strategies.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section class="testimonials-section py-20 relative z-10 bg-gradient-to-b from-black via-gray-900 to-black">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-extrabold leading-tight mb-4 text-white font-orbitron">
                        What Our Clients Say
                    </h2>
                    <p class="text-lg md:text-xl text-gray-400 max-w-3xl mx-auto font-futura">
                        Hear from businesses that have transformed their advertising with POWERAD INTERNATIONAL.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Testimonial Card 1 -->
                    <div class="testimonial-card bg-gray-800/50 backdrop-blur-sm p-8 rounded-lg border border-jacarta/20 hover:border-jacarta/50 transition-all duration-300 shadow-lg">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 rounded-full mr-4 border-2 border-orange p-0.5 bg-gradient-to-br from-dark-blue to-orange flex items-center justify-center">
                                <span class="text-white text-xs font-bold">CA</span>
                            </div>
                            <div>
                                <p class="font-orbitron font-bold text-white">Aisha Bello</p>
                                <p class="text-orange text-sm">CEO, Grand Retail</p>
                            </div>
                        </div>
                        <p class="text-gray-300 text-base font-futura leading-relaxed">
                            "POWERAD INTERNATIONAL revolutionized our outdoor campaigns. The 3D billboards are a game-changer, attracting more attention and engagement than ever before. Highly recommend!"
                        </p>
                    </div>

                    <!-- Testimonial Card 2 -->
                    <div class="testimonial-card bg-gray-800/50 backdrop-blur-sm p-8 rounded-lg border border-jacarta/20 hover:border-jacarta/50 transition-all duration-300 shadow-lg">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 rounded-full mr-4 border-2 border-orange p-0.5 bg-gradient-to-br from-dark-blue to-orange flex items-center justify-center">
                                <span class="text-white text-xs font-bold">CA</span>
                            </div>
                            <div>
                                <p class="font-orbitron font-bold text-white">Kunle Adeyemi</p>
                                <p class="text-orange text-sm">Marketing Director, Tech Solutions</p>
                            </div>
                        </div>
                        <p class="text-gray-300 text-base font-futura leading-relaxed">
                            "The immersive digital experiences created by POWERAD INTERNATIONAL have significantly boosted our brand visibility. Their team is professional, innovative, and a pleasure to work with."
                        </p>
                    </div>

                    <!-- Testimonial Card 3 -->
                    <div class="testimonial-card bg-gray-800/50 backdrop-blur-sm p-8 rounded-lg border border-jacarta/20 hover:border-jacarta/50 transition-all duration-300 shadow-lg">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 rounded-full mr-4 border-2 border-orange p-0.5 bg-gradient-to-br from-dark-blue to-orange flex items-center justify-center">
                                <span class="text-white text-xs font-bold">CA</span>
                            </div>
                            <div>
                                <p class="font-orbitron font-bold text-white">Fatima Usman</p>
                                <p class="text-orange text-sm">Founder, Eco-Friendly Products</p>
                            </div>
                        </div>
                        <p class="text-gray-300 text-base font-futura leading-relaxed">
                            "We saw an immediate increase in customer engagement after launching our campaign with POWERAD INTERNATIONAL. Their unique approach to outdoor advertising truly stands out."
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Us Section -->
        <section class="contact-us-section py-20 relative z-10 bg-gradient-to-b from-black via-gray-900 to-black">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-extrabold leading-tight mb-4 text-white font-orbitron">
                        Get in Touch
                    </h2>
                    <p class="text-lg md:text-xl text-gray-400 max-w-3xl mx-auto font-futura">
                        Have questions or want to start a project? Contact us today!
                    </p>
                </div>

                <div class="max-w-4xl mx-auto bg-gray-800/50 backdrop-blur-sm p-8 rounded-lg border border-jacarta/20 shadow-lg">
                    <form action="#" method="POST" class="space-y-6">
                        <div>
                            <label for="name" class="block text-gray-300 text-sm font-bold mb-2">Name</label>
                            <input type="text" id="name" name="name" class="w-full px-4 py-3 bg-gray-700 border border-jacarta/30 rounded-md text-white placeholder-gray-500 focus:outline-none focus:border-orange transition-colors duration-300" placeholder="Your Name" required>
                        </div>
                        <div>
                            <label for="email" class="block text-gray-300 text-sm font-bold mb-2">Email</label>
                            <input type="email" id="email" name="email" class="w-full px-4 py-3 bg-gray-700 border border-jacarta/30 rounded-md text-white placeholder-gray-500 focus:outline-none focus:border-orange transition-colors duration-300" placeholder="Your Email" required>
                        </div>
                        <div>
                            <label for="subject" class="block text-gray-300 text-sm font-bold mb-2">Subject</label>
                            <input type="text" id="subject" name="subject" class="w-full px-4 py-3 bg-gray-700 border border-jacarta/30 rounded-md text-white placeholder-gray-500 focus:outline-none focus:border-orange transition-colors duration-300" placeholder="Subject of your message" required>
                        </div>
                        <div>
                            <label for="message" class="block text-gray-300 text-sm font-bold mb-2">Message</label>
                            <textarea id="message" name="message" rows="6" class="w-full px-4 py-3 bg-gray-700 border border-jacarta/30 rounded-md text-white placeholder-gray-500 focus:outline-none focus:border-orange transition-colors duration-300" placeholder="Your Message" required></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="bg-orange hover:bg-orange-dark text-white font-bold py-3 px-8 rounded-full transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-orange focus:ring-opacity-50">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <section class="faq-section py-20 relative z-10 bg-gradient-to-t from-black via-gray-900 to-black">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-extrabold leading-tight mb-4 text-white font-orbitron">
                        Frequently Asked Questions
                    </h2>
                    <p class="text-lg md:text-xl text-gray-400 max-w-3xl mx-auto font-futura">
                        Find answers to common questions about POWERAD INTERNATIONAL and our services.
                    </p>
                </div>

                <div class="max-w-4xl mx-auto">
                    <!-- FAQ Item 1 -->
                    <div class="faq-item bg-gray-800/50 backdrop-blur-sm p-6 rounded-lg border border-jacarta/20 hover:border-jacarta/50 transition-all duration-300 shadow-lg mb-4">
                        <h3 class="text-xl font-orbitron font-bold text-white mb-2 cursor-pointer flex justify-between items-center">
                            What is POWERAD INTERNATIONAL?
                            <svg class="w-6 h-6 text-orange transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </h3>
                        <p class="text-gray-300 text-base font-futura leading-relaxed hidden">
                            POWERAD INTERNATIONAL is a pioneering outdoor advertising company specializing in 3D billboards and immersive digital experiences. We leverage cutting-edge technology to create impactful and engaging advertising campaigns.
                        </p>
                    </div>

                    <!-- FAQ Item 2 -->
                    <div class="faq-item bg-gray-800/50 backdrop-blur-sm p-6 rounded-lg border border-jacarta/20 hover:border-jacarta/50 transition-all duration-300 shadow-lg mb-4">
                        <h3 class="text-xl font-orbitron font-bold text-white mb-2 cursor-pointer flex justify-between items-center">
                            How do 3D billboards work?
                            <svg class="w-6 h-6 text-orange transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </h3>
                        <p class="text-gray-300 text-base font-futura leading-relaxed hidden">
                            Our 3D billboards utilize advanced visual techniques and specialized display technology to create a stunning illusion of depth and realism, making advertisements appear to pop out of the screen without the need for special glasses.
                        </p>
                    </div>

                    <!-- FAQ Item 3 -->
                    <div class="faq-item bg-gray-800/50 backdrop-blur-sm p-6 rounded-lg border border-jacarta/20 hover:border-jacarta/50 transition-all duration-300 shadow-lg mb-4">
                        <h3 class="text-xl font-orbitron font-bold text-white mb-2 cursor-pointer flex justify-between items-center">
                            What kind of businesses can benefit from your services?
                            <svg class="w-6 h-6 text-orange transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </h3>
                        <p class="text-gray-300 text-base font-futura leading-relaxed hidden">
                            Any business looking to make a significant impact with their advertising can benefit. Our clients range from retail and technology to entertainment and real estate, all seeking innovative ways to capture audience attention.
                        </p>
                    </div>

                    <!-- FAQ Item 4 -->
                    <div class="faq-item bg-gray-800/50 backdrop-blur-sm p-6 rounded-lg border border-jacarta/20 hover:border-jacarta/50 transition-all duration-300 shadow-lg mb-4">
                        <h3 class="text-xl font-orbitron font-bold text-white mb-2 cursor-pointer flex justify-between items-center">
                            How can I get started with POWERAD INTERNATIONAL?
                            <svg class="w-6 h-6 text-orange transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </h3>
                        <p class="text-gray-300 text-base font-futura leading-relaxed hidden">
                            You can start by contacting us through our website, email, or phone to schedule a free consultation. Our team will discuss your needs and propose a tailored advertising solution.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Us Section -->
        <section class="contact-us-section py-20 relative z-10 bg-gradient-to-b from-black via-gray-900 to-black">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-extrabold leading-tight mb-4 text-white font-orbitron">
                        Get in Touch
                    </h2>
                    <p class="text-lg md:text-xl text-gray-400 max-w-3xl mx-auto font-futura">
                        Have questions or want to start a project? Contact us today!
                    </p>
                </div>

                <div class="max-w-4xl mx-auto bg-gray-800/50 backdrop-blur-sm p-8 rounded-lg border border-jacarta/20 shadow-lg">
                    <form action="#" method="POST" class="space-y-6">
                        <div>
                            <label for="name" class="block text-gray-300 text-sm font-bold mb-2">Name</label>
                            <input type="text" id="name" name="name" class="w-full px-4 py-3 bg-gray-700 border border-jacarta/30 rounded-md text-white placeholder-gray-500 focus:outline-none focus:border-orange transition-colors duration-300" placeholder="Your Name" required>
                        </div>
                        <div>
                            <label for="email" class="block text-gray-300 text-sm font-bold mb-2">Email</label>
                            <input type="email" id="email" name="email" class="w-full px-4 py-3 bg-gray-700 border border-jacarta/30 rounded-md text-white placeholder-gray-500 focus:outline-none focus:border-orange transition-colors duration-300" placeholder="Your Email" required>
                        </div>
                        <div>
                            <label for="subject" class="block text-gray-300 text-sm font-bold mb-2">Subject</label>
                            <input type="text" id="subject" name="subject" class="w-full px-4 py-3 bg-gray-700 border border-jacarta/30 rounded-md text-white placeholder-gray-500 focus:outline-none focus:border-orange transition-colors duration-300" placeholder="Subject of your message" required>
                        </div>
                        <div>
                            <label for="message" class="block text-gray-300 text-sm font-bold mb-2">Message</label>
                            <textarea id="message" name="message" rows="6" class="w-full px-4 py-3 bg-gray-700 border border-jacarta/30 rounded-md text-white placeholder-gray-500 focus:outline-none focus:border-orange transition-colors duration-300" placeholder="Your Message" required></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="bg-orange hover:bg-orange-dark text-white font-bold py-3 px-8 rounded-full transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-orange focus:ring-opacity-50">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="faq-section py-20 relative z-10 bg-gradient-to-t from-black via-gray-900 to-black">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-extrabold leading-tight mb-4 text-white font-orbitron">
                        Frequently Asked Questions
                    </h2>
                    <p class="text-lg md:text-xl text-gray-400 max-w-3xl mx-auto font-futura">
                        Find answers to common questions about POWERAD INTERNATIONAL and our services.
                    </p>
                </div>

                <div class="max-w-4xl mx-auto">
                    <!-- FAQ Item 1 -->
                    <div class="faq-item bg-gray-800/50 backdrop-blur-sm p-6 rounded-lg border border-jacarta/20 hover:border-jacarta/50 transition-all duration-300 shadow-lg mb-4">
                        <h3 class="text-xl font-orbitron font-bold text-white mb-2 cursor-pointer flex justify-between items-center">
                            What is POWERAD INTERNATIONAL?
                            <svg class="w-6 h-6 text-orange transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </h3>
                        <p class="text-gray-300 text-base font-futura leading-relaxed hidden">
                            POWERAD INTERNATIONAL is a pioneering outdoor advertising company specializing in 3D billboards and immersive digital experiences. We leverage cutting-edge technology to create impactful and engaging advertising campaigns.
                        </p>
                    </div>

                    <!-- FAQ Item 2 -->
                    <div class="faq-item bg-gray-800/50 backdrop-blur-sm p-6 rounded-lg border border-jacarta/20 hover:border-jacarta/50 transition-all duration-300 shadow-lg mb-4">
                        <h3 class="text-xl font-orbitron font-bold text-white mb-2 cursor-pointer flex justify-between items-center">
                            How do 3D billboards work?
                            <svg class="w-6 h-6 text-orange transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </h3>
                        <p class="text-gray-300 text-base font-futura leading-relaxed hidden">
                            Our 3D billboards utilize advanced visual techniques and specialized display technology to create a stunning illusion of depth and realism, making advertisements appear to pop out of the screen without the need for special glasses.
                        </p>
                    </div>

                    <!-- FAQ Item 3 -->
                    <div class="faq-item bg-gray-800/50 backdrop-blur-sm p-6 rounded-lg border border-jacarta/20 hover:border-jacarta/50 transition-all duration-300 shadow-lg mb-4">
                        <h3 class="text-xl font-orbitron font-bold text-white mb-2 cursor-pointer flex justify-between items-center">
                            What kind of businesses can benefit from your services?
                            <svg class="w-6 h-6 text-orange transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </h3>
                        <p class="text-gray-300 text-base font-futura leading-relaxed hidden">
                            Any business looking to make a significant impact with their advertising can benefit. Our clients range from retail and technology to entertainment and real estate, all seeking innovative ways to capture audience attention.
                        </p>
                    </div>

                    <!-- FAQ Item 4 -->
                    <div class="faq-item bg-gray-800/50 backdrop-blur-sm p-6 rounded-lg border border-jacarta/20 hover:border-jacarta/50 transition-all duration-300 shadow-lg mb-4">
                        <h3 class="text-xl font-orbitron font-bold text-white mb-2 cursor-pointer flex justify-between items-center">
                            How can I get started with POWERAD INTERNATIONAL?
                            <svg class="w-6 h-6 text-orange transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </h3>
                        <p class="text-gray-300 text-base font-futura leading-relaxed hidden">
                            You can start by contacting us through our website, email, or phone to schedule a free consultation. Our team will discuss your needs and propose a tailored advertising solution.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="cta-section py-20 relative z-10 bg-gradient-to-b from-gray-900 via-black to-gray-900">
            <div class="container mx-auto px-6 text-center">
                <h2 class="text-4xl md:text-5xl font-extrabold leading-tight mb-6 text-white font-orbitron">
                    Ready to Transform Your Advertising?
                </h2>
                <p class="text-lg md:text-xl text-gray-300 max-w-3xl mx-auto mb-10 font-futura">
                    Join the future of outdoor advertising with POWERAD INTERNATIONAL. Let's create unforgettable campaigns together.
                </p>
                <div class="flex flex-col sm:flex-row justify-center gap-6">
                    <a href="#" class="btn-primary bg-orange hover:bg-orange-dark text-white font-bold py-3 px-8 rounded-full transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-orange focus:ring-opacity-50 text-lg">
                        Get Started Today
                    </a>
                    <a href="#" class="btn-secondary bg-transparent border border-orange text-orange hover:bg-orange hover:text-white font-bold py-3 px-8 rounded-full transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-orange focus:ring-opacity-50 text-lg">
                        Learn More
                    </a>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="footer bg-gradient-to-t from-black to-gray-900 py-16 relative z-10 border-t border-orange/20">
            <div class="container mx-auto px-6">
                <!-- Main Footer Content -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                    <!-- Brand Section -->
                    <div class="md:col-span-2">
                        <div class="flex items-center space-x-4 mb-6 footer-logo-container">
                            <!-- Secondary Logo for Footer -->
                            <div class="relative">
                                <div class="absolute inset-0 bg-gradient-to-r from-orange/10 to-yellow/10 rounded-lg blur-sm"></div>
                                <div class="relative bg-gray-900/50 backdrop-blur-sm rounded-lg p-3 border border-orange/20">
                                    <img src="{{ asset('images/secondary logo.png') }}" alt="POWERAD INTERNATIONAL Secondary Logo" class="h-10 w-auto logo-image">
                                </div>
                            </div>
                            <!-- Footer Brand Text -->
                            <div class="text-lg font-orbitron font-bold brand-text">
                                <span class="text-orange tracking-wider">POWERAD</span>
                                <div class="text-xs text-gray-400 tracking-widest opacity-80">INTERNATIONAL</div>
                            </div>
                        </div>
                        <p class="text-gray-400 mb-6 font-exo leading-relaxed max-w-md">
                            Pioneering the future of outdoor advertising with cutting-edge 3D technology and immersive digital experiences.
                        </p>
                        <div class="flex space-x-4">
                            <a href="#" class="social-link w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center border border-orange/20 hover:border-orange hover:bg-orange/10 transition-all duration-300">
                                <svg class="w-5 h-5 text-orange" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                                </svg>
                            </a>
                            <a href="#" class="social-link w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center border border-orange/20 hover:border-orange hover:bg-orange/10 transition-all duration-300">
                                <svg class="w-5 h-5 text-orange" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                </svg>
                            </a>
                            <a href="#" class="social-link w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center border border-orange/20 hover:border-orange hover:bg-orange/10 transition-all duration-300">
                                <svg class="w-5 h-5 text-orange" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.26.301.402.498.402.793 0 .85-.653 2.748-.889 3.119-.315.502-.402.669-.889.502C3.465 18.746 2.18 15.97 2.18 11.94c0-4.299 3.129-8.251 9.013-8.251 4.729 0 8.413 3.370 8.413 7.876 0 4.699-2.965 8.485-7.077 8.485-1.383 0-2.686-.719-3.131-1.571 0 0-.686 2.607-.853 3.244-.309 1.186-1.146 2.669-1.707 3.577C9.52 23.751 10.747 24.004 12.017 24.004c6.624 0 11.99-5.367 11.99-11.99C24.007 5.367 18.641.001 12.017.001z" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div>
                        <h4 class="font-orbitron font-bold text-white mb-6 relative">
                            QUICK LINKS
                            <div class="absolute -bottom-2 left-0 w-8 h-0.5 bg-gradient-to-r from-orange to-transparent"></div>
                        </h4>
                        <ul class="space-y-3">
                            <li><a href="#" class="text-gray-400 hover:text-orange transition-colors duration-300 font-exo">How It Works</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-orange transition-colors duration-300 font-exo">Publishers</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-orange transition-colors duration-300 font-exo">Advertisers</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-orange transition-colors duration-300 font-exo">Case Studies</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-orange transition-colors duration-300 font-exo">Pricing</a></li>
                        </ul>
                    </div>

                    <!-- Contact Info -->
                    <div>
                        <h4 class="font-orbitron font-bold text-white mb-6 relative">
                            CONTACT
                            <div class="absolute -bottom-2 left-0 w-8 h-0.5 bg-gradient-to-r from-orange to-transparent"></div>
                        </h4>
                        <ul class="space-y-3">
                            <li class="flex items-center space-x-3">
                                <svg class="w-4 h-4 text-orange" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                </svg>
                                <span class="text-gray-400 font-exo">hello@powerad.com</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <svg class="w-4 h-4 text-orange" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                                </svg>
                                <span class="text-gray-400 font-exo">+1 (555) 123-4567</span>
                            </li>
                            <li class="flex items-start space-x-3">
                                <svg class="w-4 h-4 text-orange mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-400 font-exo">Global Headquarters<br>New York, USA</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Bottom Footer -->
                <div class="border-t border-gray-800 pt-8">
                    <div class="flex flex-col md:flex-row justify-between items-center">
                        <div class="text-gray-400 text-sm font-exo mb-4 md:mb-0">
                            &copy; {{ date('Y') }} POWERAD INTERNATIONAL. All rights reserved.
                        </div>
                        <div class="flex space-x-6">
                            <a href="#" class="text-gray-400 hover:text-orange transition-colors duration-300 text-sm font-exo">Privacy Policy</a>
                            <a href="#" class="text-gray-400 hover:text-orange transition-colors duration-300 text-sm font-exo">Terms of Service</a>
                            <a href="#" class="text-gray-400 hover:text-orange transition-colors duration-300 text-sm font-exo">Cookie Policy</a>
                            <a href="#" class="text-gray-400 hover:text-orange transition-colors duration-300 text-sm font-exo">Sitemap</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cyber border bottom -->
            <div class="absolute bottom-0 left-0 w-full h-0.5 bg-gradient-to-r from-transparent via-orange to-transparent"></div>
        </footer>
    </div>
    <!-- Simple background animation -->
    <script>
        // Simple CSS animation for background
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Page loaded successfully');
        });
    </script>
</body>

</html>