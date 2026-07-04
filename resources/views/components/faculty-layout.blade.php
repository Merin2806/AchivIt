@php
    $user = Auth::user();
    $role = $user->faculty_role ?? 'Academic Coordinator';
    $dept = $user->department->name ?? 'Information Technology';
    $shortDept = match($dept) {
        'Information Technology' => 'IT',
        'Computer Engineering' => 'CE',
        'EXTC' => 'EXTC',
        'Electronics' => 'Electronics',
        'Mechanical' => 'Mech',
        default => $dept
    };
    $initials = strtoupper(substr($user->name, 0, 2));
    $name = $user->name;
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Achivit - Faculty') }}</title>

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

        <!-- Scripts & Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-[#F8FAFC] text-[#1E293B] antialiased">
        <div class="app-layout">
            <!-- Sidebar -->
            <aside class="sidebar sidebar-faculty">
                <!-- Logo Header -->
                <div class="sidebar-logo">
                    <a href="{{ route('faculty.dashboard', ['department' => $dept, 'role' => $role]) }}">
                        <x-logo theme="dark" />
                    </a>
                    <!-- Faculty Portal eyebrow -->
                    <span class="text-[10px] font-semibold text-[#64748B] uppercase tracking-[0.05em] block mt-1">FACULTY PORTAL</span>
                </div>

                <!-- Scrollable Nav List -->
                <nav class="sidebar-nav">
                    <a href="{{ route('faculty.dashboard', ['department' => $dept, 'role' => $role]) }}" class="nav-item {{ request()->routeIs('faculty.dashboard') ? 'active' : '' }}">
                        <svg class="w-[18px] h-[18px] text-[#93C5FD]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                        </svg>
                        <span>Dashboard</span>
                    </a>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}" id="logout-form-sidebar" style="display: none;">
                        @csrf
                    </form>
                    <a href="{{ route('logout') }}" class="nav-item text-[#EF4444] hover:text-[#DC2626]"
                       onclick="event.preventDefault(); document.getElementById('logout-form-sidebar').submit();">
                        <svg class="w-[18px] h-[18px]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013 3v1"/>
                        </svg>
                        <span>Logout</span>
                    </a>
                </nav>

                <!-- Footer Faculty Card -->
                <div class="sidebar-footer">
                    <div class="flex items-center gap-3">
                        <x-avatar initials="{{ $initials }}" color="blue-purple" />
                        <div class="flex flex-col overflow-hidden text-left">
                            <span class="text-[13px] font-bold text-white truncate">{{ $name }}</span>
                            <span class="text-[11px] text-[#94A3B8] font-medium truncate">{{ $role === 'Student Activity Coordinator' ? 'SAC' : 'AC' }} — {{ $shortDept }} Dept.</span>
                        </div>
                    </div>
                </div>
            </aside>

            <!-- Main Content Area -->
            <div class="main-content">
                <!-- Flash Messages -->
                <x-flash-message />

                <!-- Top Bar -->
                <header class="top-bar">
                    <!-- Left: Page Title or Back buttons -->
                    <div class="flex items-center gap-3">
                        @yield('top-bar-left')
                    </div>

                    <!-- Right: Date and Bell -->
                    <div class="flex items-center gap-4">
                        <span class="text-[13px] text-[#64748B] font-medium hidden md:inline">{{ date('d M Y') }}</span>
                        <!-- Bell icon -->
                        <button class="w-[36px] h-[36px] rounded-lg border border-[#E2E8F0] flex items-center justify-center hover:border-[#2563EB] hover:text-[#2563EB] transition-colors relative shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                            </svg>
                            <!-- Red alert dot -->
                            <span class="absolute top-[2px] right-[2px] w-2.5 h-2.5 rounded-full bg-[#EF4444]"></span>
                        </button>
                        <x-avatar initials="{{ $initials }}" color="blue-purple" size="sm" />
                    </div>
                </header>

                <!-- Page Body Content -->
                <main class="page-body">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
