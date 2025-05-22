<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ProXmart') }}</title>
    <link rel="icon" href="{{ asset('asset/images/logo-1.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Scripts -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="font-sans antialiased bg-gray-50 text-gray-900" style="font-family: 'Inter', sans-serif;">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="hidden md:flex md:w-72 md:flex-col bg-gradient-to-b from-green-700 to-green-800 text-white">
            <div class="flex-1 flex flex-col overflow-y-auto">
                <!-- Logo & Brand -->
                <div class="flex items-center h-16 px-6 border-b border-green-600">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 flex items-center">
                            <div class="flex items-center flex-col space-y-1"> <!-- Fixed typo and added spacing -->
                                <a href="" class="flex-shrink-0 flex items-center">
                                    <img src="{{ asset('asset/images/logo-1.png') }}" alt="Logo 1" class="h-8 w-auto">
                                </a>

                                <a href="">
                                    <img src="{{ asset('asset/images/logo-2.png') }}" alt="Logo 2" class="h-4 w-auto">
                                </a>
                            </div>
                        </div>
                        <h1 class="ml-3 text-xl font-bold text-white">Admin Panel</h1>
                    </div>
                </div>

                <!-- Navigation -->
                <nav class="flex-1 px-4 py-4 space-y-1">
                    <a href="{{ route('admin_dashboard') }}"
                        class="group flex items-center px-3 py-3 text-base font-medium rounded-lg 
                            {{ request()->routeIs('admin_dashboard') ? 'text-white bg-green-600' : 'text-green-100 hover:bg-green-600 hover:text-white transition duration-150 ease-in-out' }}">
                        <svg class="mr-4 h-5 w-5 text-green-300" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Dashboard
                    </a>

                    <!-- Users Link -->
                    <a href="{{ route('admin_users') }}"
                        class="group flex items-center px-3 py-3 text-base font-medium rounded-lg 
                            {{ request()->routeIs('admin_users') ? 'text-white bg-green-600' : 'text-green-100 hover:bg-green-600 hover:text-white transition duration-150 ease-in-out' }}">
                        <svg class="mr-4 h-5 w-5 text-green-300" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        Users
                    </a>
                    <a href="{{ route('admin_farmLand') }}"
                        class="group flex items-center px-3 py-3 text-base font-medium rounded-lg 
                            {{ request()->routeIs('admin_farmLand') ? 'text-white bg-green-600' : 'text-green-100 hover:bg-green-600 hover:text-white transition duration-150 ease-in-out' }}">
                        <svg class="mr-4 h-5 w-5 text-green-300" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                        </svg>
                        Registerd Farms
                    </a>
                    <a href="{{ route('admin_business') }}"
                        class="group flex items-center px-3 py-3 text-base font-medium rounded-lg 
                            {{ request()->routeIs('admin_business') ? 'text-white bg-green-600' : 'text-green-100 hover:bg-green-600 hover:text-white transition duration-150 ease-in-out' }}">
                        <svg class="mr-4 h-5 w-5 text-green-300" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                        Registerd Business
                    </a>
                    <a href="{{ route('admin_varieties') }}"
                        class="group flex items-center px-3 py-3 text-base font-medium rounded-lg 
                            {{ request()->routeIs('admin_varieties') ? 'text-white bg-green-600' : 'text-green-100 hover:bg-green-600 hover:text-white transition duration-150 ease-in-out' }}">
                        <svg class="mr-4 h-5 w-5 text-green-300" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 2c-4 0-8 3-8 8 0 3 2 6 4 8l4 4 4-4c2-2 4-5 4-8 0-5-4-8-8-8z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v12" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 8c2-1 4-1 4 2" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 8c-2-1-4-1-4 2" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12c1.5-0.5 3-0.5 3 1" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12c-1.5-0.5-3-0.5-3 1" />
                        </svg>
                        Varieties
                    </a>

                </nav>

                <!-- User profile -->
                <div class="px-4 py-4 border-t border-green-600">
                    <div class="flex items-center px-3 py-3">
                        <div class="flex-shrink-0">
                            <div class="h-10 w-10 rounded-full bg-green-500 flex items-center justify-center">
                                <span class="text-lg font-medium text-white">A</span>
                            </div>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-white">Admin User</p>
                            @if (session('admin'))
                                <p class="text-xs text-green-200">{{ session('admin')->email }}</p>
                            @else
                                <p class="text-xs text-green-200">No admin email in session.</p>
                            @endif
                        </div>
                        <div class="ml-auto">
                            <a href="{{ route('logout') }}" class="text-green-300 hover:text-white">
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Top Header -->
            <header class="z-10 bg-white shadow-sm">
                <div class="px-6 py-4 flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <!-- Mobile menu button -->
                        <button type="button" class="md:hidden text-gray-600 hover:text-gray-900">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>

                        <div class="md:hidden">
                            <svg class="h-8 w-8 text-green-600" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M2 17L12 22L22 17" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M2 12L12 17L22 12" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>

                        <h2 class="text-2xl font-semibold text-gray-800">@yield('title', 'Dashboard')</h2>
                    </div>

                    <div class="flex items-center space-x-4">
                        <!-- Search -->
                        <div class="relative hidden md:block">
                            <input type="text"
                                class="w-64 pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"
                                placeholder="Search...">
                            <div class="absolute left-3 top-2.5">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                        </div>

                        <!-- Fullscreen Button -->
                        <button onclick="toggleFullScreen()" type="button"
                            class="text-gray-500 hover:text-gray-700">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8 3H5a2 2 0 00-2 2v3m0 8v3a2 2 0 002 2h3m8-16h3a2 2 0 012 2v3m0 8v3a2 2 0 01-2 2h-3" />
                            </svg>
                        </button>

                        <!-- User menu (hidden on mobile) -->
                        <div class="hidden md:block">
                            <button type="button"
                                class="flex items-center space-x-2 text-gray-700 hover:text-gray-900">
                                <div class="h-8 w-8 rounded-full bg-green-600 flex items-center justify-center">
                                    <span class="text-sm font-medium text-white">A</span>
                                </div>
                                @if (session('admin'))
                                    <span class="name">{{ session('admin')->fist_name }}
                                        {{ session('admin')->last_name }}</span>
                                @else
                                    <span class="name">No admin email in session.</span>
                                @endif
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Breadcrumbs -->
                <div class="px-6 py-2 bg-gray-50 border-t border-b border-gray-200">
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol class="flex items-center space-x-2">
                            <li>
                                <a href="{{ route('admin_dashboard') }}"
                                    class="text-gray-500 hover:text-gray-700">Home</a>
                            </li>
                            <li class="flex items-center">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                                <span class="ml-2 text-gray-600">@yield('breadcrumb', 'Dashboard')</span>
                            </li>
                        </ol>
                    </nav>
                </div>
            </header>

            <!-- Content -->
            <main class="flex-1 overflow-y-auto p-6 bg-gray-50">
                @yield('content')
            </main>
        </div>
    </div>


    <!-- Add this script at the end of your HTML -->
    <script>
        function toggleFullScreen() {
            if (!document.fullscreenElement) {
                document.documentElement.requestFullscreen().catch(err => {
                    alert(`Error attempting to enable full-screen mode: ${err.message}`);
                });
            } else {
                document.exitFullscreen();
            }
        }
    </script>
</body>

</html>
