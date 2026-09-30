<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - ACI Marine</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- SVG favicon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('image/favicon.svg') }}">
    <!-- PNG fallback for browsers that don't support SVG favicons -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('image/logo_white_bg.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('image/logo_white_bg.png') }}">
    <link rel="shortcut icon" href="{{ asset('image/favicon.svg') }}">
    <!-- Apple home screen icon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('image/logo_white_bg.png') }}">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        outfit: ['Outfit', 'sans-serif'],
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            green: '#27a844',
                            red: '#F60000',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background-color: #f8fafc;
        }
        /* Custom scrollbar for light theme */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #f8fafc;
        }
        ::-webkit-scrollbar-thumb {
            background: rgba(0, 0, 0, 0.08);
            border-radius: 99px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #27a844;
        }
    </style>
</head>
<body class="font-sans antialiased text-slate-800 bg-[#f8fafc] relative overflow-hidden">
    <!-- Soft light background glowing spots -->
    <div class="absolute top-[-10%] left-[-10%] w-[500px] h-[500px] rounded-full bg-[#27a844]/3 blur-[100px] pointer-events-none"></div>
    <div class="absolute bottom-[-10%] right-[-10%] w-[500px] h-[500px] rounded-full bg-slate-200 blur-[100px] pointer-events-none"></div>

    <div class="flex h-screen overflow-hidden relative z-10">
        <!-- Sidebar Backdrop for mobile -->
        <div id="sidebarBackdrop" class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm z-20 lg:hidden hidden transition-opacity duration-300"></div>

        <!-- Sidebar -->
        <aside id="sidebar" class="w-[280px] transition-all duration-300 ease-in-out bg-white border-r border-slate-200/60 flex flex-col z-30 shadow-sm fixed lg:static inset-y-0 left-0 -translate-x-full lg:translate-x-0 overflow-hidden">
            <!-- Sidebar Header -->
            <div class="h-16 border-b border-slate-200/60 flex items-center justify-between px-4 bg-white shrink-0 w-full transition-all duration-300">
                <img id="sidebarLogo" src="{{ asset('image/logo_white_bg.png') }}" alt="ACI Marine Logo" class="h-9 w-auto object-contain transition-all duration-300">
                <img id="sidebarIcon" src="{{ asset('image/favicon.svg') }}" alt="ACI Marine Icon" class="h-7 w-auto object-contain hidden transition-all duration-300">
                
                <!-- Close button for mobile sidebar -->
                <button id="sidebarClose" class="lg:hidden text-slate-500 hover:text-slate-700 p-1 hover:bg-slate-100 rounded-lg transition-colors">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            
            <!-- Navigation Links -->
            <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto overflow-x-hidden scrollbar-hide">
                <p class="sidebar-text px-3 text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-3 transition-all duration-300">Overview</p>
                
                <a href="{{ route('admin.dashboard') }}" class="sidebar-link relative flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition-all duration-200 {{ Route::currentRouteName() == 'admin.dashboard' ? 'bg-slate-100 text-slate-900 font-semibold shadow-sm' : 'font-medium text-slate-500 hover:bg-slate-50 hover:text-slate-900' }}" title="Dashboard">
                    <div class="{{ Route::currentRouteName() == 'admin.dashboard' ? 'text-brand-green' : 'text-slate-400 group-hover:text-slate-600' }} transition-colors">
                        <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z" />
                        </svg>
                    </div>
                    <span class="sidebar-text whitespace-nowrap transition-all duration-300">Dashboard</span>
                </a>

                <div x-data="{ openProjects: localStorage.getItem('projectsDropdown') === 'true' }" x-init="$watch('openProjects', value => localStorage.setItem('projectsDropdown', value))" class="mt-2">
                    <div class="w-full relative flex items-center justify-between px-3 py-2.5 rounded-lg text-sm transition-all duration-200 font-medium text-slate-500 hover:bg-slate-50 hover:text-slate-900">
                        <div class="flex items-center gap-3">
                            <div class="text-slate-400 transition-colors">
                                <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                            </div>
                            <span class="sidebar-text whitespace-nowrap transition-all duration-300">Projects Page</span>
                        </div>
                        <button @click.prevent="openProjects = !openProjects" class="p-1 rounded-md hover:bg-slate-200 transition-colors cursor-pointer">
                            <svg :class="{'rotate-180': openProjects}" class="w-4 h-4 sidebar-text transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                    </div>
                    
                    <div x-show="openProjects" style="display: none;" class="mt-1 space-y-1 sidebar-text pl-9 pr-2">
                        <a href="{{ route('admin.settings.projects') }}" class="block px-3 py-2 rounded-lg text-sm transition-all duration-200 {{ str_starts_with(Route::currentRouteName(), 'admin.settings.projects') ? 'text-brand-green font-semibold bg-slate-50' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}">Projects Settings</a>
                        <a href="{{ route('admin.project-gallery-categories.index') }}" class="block px-3 py-2 rounded-lg text-sm transition-all duration-200 {{ str_starts_with(Route::currentRouteName(), 'admin.project-gallery-categories') ? 'text-brand-green font-semibold bg-slate-50' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}">Project Gallery Categories</a>
                        <a href="{{ route('admin.project-references.index') }}" class="block px-3 py-2 rounded-lg text-sm transition-all duration-200 {{ str_starts_with(Route::currentRouteName(), 'admin.project-references') ? 'text-brand-green font-semibold bg-slate-50' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}">Project References</a>
                    </div>
                </div>

                <div x-data="{ openProducts: localStorage.getItem('sidebar_products') === 'true' || '{{ Route::currentRouteName() }}'.startsWith('admin.products') || '{{ Route::currentRouteName() }}'.startsWith('admin.product-thumbles') }" x-init="$watch('openProducts', value => localStorage.setItem('sidebar_products', value))" class="mt-2">
                    <div class="w-full relative flex items-center justify-between px-3 py-2.5 rounded-lg text-sm transition-all duration-200 font-medium text-slate-500 hover:bg-slate-50 hover:text-slate-900">
                        <div class="flex items-center gap-3">
                            <div class="text-slate-400 transition-colors">
                                <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                </svg>
                            </div>
                            <span class="sidebar-text whitespace-nowrap transition-all duration-300">Products Catalog</span>
                        </div>
                        <button @click.prevent="openProducts = !openProducts" class="p-1 rounded-md hover:bg-slate-200 transition-colors cursor-pointer">
                            <svg :class="{'rotate-180': openProducts}" class="w-4 h-4 sidebar-text transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                    </div>
                    
                    <div x-show="openProducts" style="display: none;" class="mt-1 space-y-1 sidebar-text pl-9 pr-2">
                        <a href="{{ route('admin.product-thumbles.index') }}" class="block px-3 py-2 rounded-lg text-sm transition-all duration-200 {{ str_starts_with(Route::currentRouteName(), 'admin.product-thumbles') ? 'text-brand-green font-semibold bg-slate-50' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}">Product Categories</a>
                        <a href="{{ route('admin.products.index') }}" class="block px-3 py-2 rounded-lg text-sm transition-all duration-200 {{ str_starts_with(Route::currentRouteName(), 'admin.products') ? 'text-brand-green font-semibold bg-slate-50' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}">Products</a>
                    </div>
                </div>

                <div x-data="{ open: localStorage.getItem('homepageDropdown') === 'true' }" x-init="$watch('open', value => localStorage.setItem('homepageDropdown', value))" class="mt-2">
                    <div class="w-full relative flex items-center justify-between px-3 py-2.5 rounded-lg text-sm transition-all duration-200 font-medium text-slate-500 hover:bg-slate-50 hover:text-slate-900">
                        <div class="flex items-center gap-3">
                            <div class="text-slate-400 transition-colors">
                                <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                            </div>
                            <span class="sidebar-text whitespace-nowrap transition-all duration-300">Homepage</span>
                        </div>
                        <button @click.prevent="open = !open" class="p-1 rounded-md hover:bg-slate-200 transition-colors cursor-pointer">
                            <svg :class="{'rotate-180': open}" class="w-4 h-4 sidebar-text transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                    </div>
                    
                    <div x-show="open" style="display: none;" class="mt-1 space-y-1 sidebar-text pl-9 pr-2">
                        <!-- Main Components Dropdown -->
                        <div x-data="{ openInner: localStorage.getItem('sidebar_main_components') === 'true' }" x-init="$watch('openInner', value => localStorage.setItem('sidebar_main_components', value))">
                            <div class="w-full flex items-center justify-between px-3 py-2.5 rounded-lg text-sm transition-all duration-200 hover:bg-slate-50 text-slate-700 font-medium group">
                                <div class="flex items-center gap-3">
                                    <div class="w-1.5 h-1.5 rounded-full bg-slate-300 group-hover:bg-brand-green transition-colors"></div>
                                    Main Components
                                </div>
                                <button @click.prevent="openInner = !openInner" class="p-1 rounded-md hover:bg-slate-200 transition-colors cursor-pointer">
                                    <svg class="w-4 h-4 text-slate-400 transition-transform duration-200" :class="{'rotate-180': openInner}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                            </div>
                            <div x-show="openInner" style="display: none;" class="mt-1 space-y-1 pl-4 border-l border-slate-200 ml-3">
                                <a href="{{ route('admin.hero-slides.index') }}" class="block px-3 py-2 rounded-lg text-sm transition-all duration-200 {{ str_starts_with(Route::currentRouteName(), 'admin.hero-slides') ? 'text-brand-green font-semibold bg-slate-50' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}">Hero Slider</a>
                                <a href="{{ route('admin.clients.index') }}" class="block px-3 py-2 rounded-lg text-sm transition-all duration-200 {{ str_starts_with(Route::currentRouteName(), 'admin.clients') ? 'text-brand-green font-semibold bg-slate-50' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}">Clients</a>
                                <a href="{{ route('admin.news-events.index') }}" class="block px-3 py-2 rounded-lg text-sm transition-all duration-200 {{ str_starts_with(Route::currentRouteName(), 'admin.news-events') ? 'text-brand-green font-semibold bg-slate-50' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}">News & Events</a>

                            </div>
                        </div>
                        
                        <!-- Nested Gallery Dropdown -->
                        <div x-data="{ openGallery: localStorage.getItem('galleryDropdown') === 'true' }" x-init="$watch('openGallery', value => localStorage.setItem('galleryDropdown', value))" class="mt-1">
                            <div class="w-full flex items-center justify-between px-3 py-2 rounded-lg text-sm transition-all duration-200 {{ str_starts_with(Route::currentRouteName(), 'admin.gallery-items') || str_starts_with(Route::currentRouteName(), 'admin.gallery-categories') || str_starts_with(Route::currentRouteName(), 'admin.company-stats') || str_starts_with(Route::currentRouteName(), 'admin.settings.index') ? 'text-slate-900 font-medium' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}">
                                <div class="flex items-center gap-3">
                                    <div class="w-1.5 h-1.5 rounded-full bg-slate-300 group-hover:bg-brand-green transition-colors"></div>
                                    Gallery
                                </div>
                                <button @click.prevent="openGallery = !openGallery" class="p-1 rounded-md hover:bg-slate-200 transition-colors cursor-pointer">
                                    <svg :class="{'rotate-180': openGallery}" class="w-3 h-3 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                            </div>
                            <div x-show="openGallery" style="display: none;" class="mt-1 space-y-1 pl-4 border-l border-slate-200 ml-3">
                                <a href="{{ route('admin.settings.index') }}" class="block px-3 py-2 rounded-lg text-sm transition-all duration-200 {{ Route::currentRouteName() == 'admin.settings.index' ? 'text-brand-green font-semibold bg-slate-50' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}">Homepage Story</a>
                                <a href="{{ route('admin.company-stats.index') }}" class="block px-3 py-2 rounded-lg text-sm transition-all duration-200 {{ str_starts_with(Route::currentRouteName(), 'admin.company-stats') ? 'text-brand-green font-semibold bg-slate-50' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}">Company Stats</a>
                                <a href="{{ route('admin.gallery-categories.index') }}" class="block px-3 py-2 rounded-lg text-sm transition-all duration-200 {{ str_starts_with(Route::currentRouteName(), 'admin.gallery-categories') ? 'text-brand-green font-semibold bg-slate-50' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}">Gallery Categories</a>
                                <a href="{{ route('admin.gallery-items.index') }}" class="block px-3 py-2 rounded-lg text-sm transition-all duration-200 {{ str_starts_with(Route::currentRouteName(), 'admin.gallery-items') ? 'text-brand-green font-semibold bg-slate-50' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}">Gallery Items</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div x-data="{ openAbout: localStorage.getItem('aboutpageDropdown') === 'true' }" x-init="$watch('openAbout', value => localStorage.setItem('aboutpageDropdown', value))" class="mt-2">
                    <div class="w-full relative flex items-center justify-between px-3 py-2.5 rounded-lg text-sm transition-all duration-200 font-medium text-slate-500 hover:bg-slate-50 hover:text-slate-900">
                        <div class="flex items-center gap-3">
                            <div class="text-slate-400 transition-colors">
                                <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <span class="sidebar-text whitespace-nowrap transition-all duration-300">About Page</span>
                        </div>
                        <button @click.prevent="openAbout = !openAbout" class="p-1 rounded-md hover:bg-slate-200 transition-colors cursor-pointer">
                            <svg :class="{'rotate-180': openAbout}" class="w-4 h-4 sidebar-text transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                    </div>
                    
                    <div x-show="openAbout" style="display: none;" class="mt-1 space-y-1 sidebar-text pl-9 pr-2">
                        <a href="{{ route('admin.about-highlights.index') }}" class="block px-3 py-2 rounded-lg text-sm transition-all duration-200 {{ str_starts_with(Route::currentRouteName(), 'admin.about-highlights') ? 'text-brand-green font-semibold bg-slate-50' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}">About Highlights</a>
                        <a href="{{ route('admin.settings.about') }}" class="block px-3 py-2 rounded-lg text-sm transition-all duration-200 {{ str_starts_with(Route::currentRouteName(), 'admin.settings.about') ? 'text-brand-green font-semibold bg-slate-50' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}">About Settings</a>
                    </div>
                </div>

                {{-- Dedicated Separate Menu: Authorized Partners --}}
                <a href="{{ route('admin.partners.index') }}" class="sidebar-link relative flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition-all duration-200 {{ str_starts_with(Route::currentRouteName(), 'admin.partners') ? 'bg-slate-100 text-slate-900 font-semibold shadow-sm' : 'font-medium text-slate-500 hover:bg-slate-50 hover:text-slate-900' }}" title="Authorized Partners">
                    <div class="{{ str_starts_with(Route::currentRouteName(), 'admin.partners') ? 'text-brand-green' : 'text-slate-400 group-hover:text-slate-600' }} transition-colors">
                        <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <span class="sidebar-text whitespace-nowrap transition-all duration-300">Authorized Partners</span>
                </a>

                <div x-data="{ openContact: localStorage.getItem('contactpageDropdown') === 'true' }" x-init="$watch('openContact', value => localStorage.setItem('contactpageDropdown', value))" class="mt-2">
                    <div class="w-full relative flex items-center justify-between px-3 py-2.5 rounded-lg text-sm transition-all duration-200 font-medium text-slate-500 hover:bg-slate-50 hover:text-slate-900">
                        <div class="flex items-center gap-3">
                            <div class="text-slate-400 transition-colors">
                                <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <span class="sidebar-text whitespace-nowrap transition-all duration-300">Contact Page</span>
                        </div>
                        <button @click.prevent="openContact = !openContact" class="p-1 rounded-md hover:bg-slate-200 transition-colors cursor-pointer">
                            <svg :class="{'rotate-180': openContact}" class="w-4 h-4 sidebar-text transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                    </div>
                    
                    <div x-show="openContact" style="display: none;" class="mt-1 space-y-1 sidebar-text pl-9 pr-2">
                        <a href="{{ route('admin.settings.contact') }}" class="block px-3 py-2 rounded-lg text-sm transition-all duration-200 {{ Route::currentRouteName() == 'admin.settings.contact' ? 'text-brand-green font-semibold bg-slate-50' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}">Contact Settings</a>
                    </div>
                </div>

                <div x-data="{ openFooter: localStorage.getItem('footerpageDropdown') === 'true' }" x-init="$watch('openFooter', value => localStorage.setItem('footerpageDropdown', value))" class="mt-2">
                    <div class="w-full relative flex items-center justify-between px-3 py-2.5 rounded-lg text-sm transition-all duration-200 font-medium text-slate-500 hover:bg-slate-50 hover:text-slate-900">
                        <div class="flex items-center gap-3">
                            <div class="text-slate-400 transition-colors">
                                <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                                </svg>
                            </div>
                            <span class="sidebar-text whitespace-nowrap transition-all duration-300">Global Footer</span>
                        </div>
                        <button @click.prevent="openFooter = !openFooter" class="p-1 rounded-md hover:bg-slate-200 transition-colors cursor-pointer">
                            <svg :class="{'rotate-180': openFooter}" class="w-4 h-4 sidebar-text transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                    </div>
                    
                    <div x-show="openFooter" style="display: none;" class="mt-1 space-y-1 sidebar-text pl-9 pr-2">
                        <a href="{{ route('admin.settings.footer') }}" class="block px-3 py-2 rounded-lg text-sm transition-all duration-200 {{ Route::currentRouteName() == 'admin.settings.footer' ? 'text-brand-green font-semibold bg-slate-50' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}">Footer Settings</a>
                    </div>
                </div>

                <p class="sidebar-text px-3 text-[11px] font-bold text-slate-400 uppercase tracking-wider mt-6 mb-3 transition-all duration-300">System</p>

                <a href="{{ route('admin.settings') }}" class="sidebar-link relative flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition-all duration-200 {{ Route::currentRouteName() == 'admin.settings' ? 'bg-slate-100 text-slate-900 font-semibold shadow-sm' : 'font-medium text-slate-500 hover:bg-slate-50 hover:text-slate-900' }}" title="Settings">
                    <div class="{{ Route::currentRouteName() == 'admin.settings' ? 'text-brand-green' : 'text-slate-400 group-hover:text-slate-600' }} transition-colors">
                        <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <span class="sidebar-text whitespace-nowrap transition-all duration-300">Settings</span>
                </a>
            </nav>

            <!-- Bottom Profile & Logout -->
            <div class="p-4 border-t border-slate-200/60 bg-white flex flex-col items-center shrink-0">
                <div id="profileSection" class="flex items-center justify-between w-full transition-all duration-300">
                    <div class="flex items-center gap-3 sidebar-text whitespace-nowrap transition-all duration-300">
                        <div class="w-8 h-8 rounded-full bg-slate-100 border border-slate-200 flex items-center justify-center text-slate-600 font-bold text-xs shrink-0">
                            {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-slate-800 leading-tight">{{ Auth::user()->name ?? 'Admin' }}</p>
                            <p class="text-[10px] text-slate-500 font-medium">Administrator</p>
                        </div>
                    </div>
                    <form action="{{ route('admin.logout') }}" method="POST" class="shrink-0">
                        @csrf
                        <button type="submit" class="p-2 text-slate-400 hover:text-red-500 hover:bg-red-50 rounded-lg transition-colors" title="Logout">
                            <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                        </button>
                    </form>
                </div>
                <!-- Collapsed Logout Button -->
                <form action="{{ route('admin.logout') }}" method="POST" id="collapsedLogout" class="hidden shrink-0 w-full flex justify-center">
                    @csrf
                    <button type="submit" class="p-2.5 text-slate-400 hover:text-red-500 hover:bg-red-50 rounded-lg transition-colors" title="Logout">
                        <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Workspace -->
        <div class="flex-1 flex flex-col overflow-hidden bg-[#f8fafc]">
            <!-- Header bar -->
            <header class="h-16 bg-white border-b border-slate-200/60 flex items-center justify-between px-4 md:px-6 z-10 shrink-0">
                <div class="flex items-center gap-4">
                    <!-- Hamburger Toggle Button (Moved to Main Header) -->
                    <button id="sidebarToggle" class="text-slate-500 hover:text-slate-700 hover:bg-slate-100 p-2 rounded-lg transition-colors focus:outline-none" aria-label="Toggle Sidebar">
                        <svg class="w-5 h-5" id="toggleIcon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    
                    <div class="flex items-center gap-2">
                        <span class="text-[12px] font-medium text-slate-400 hidden sm:inline">Section <span class="mx-1">/</span></span>
                        <span class="text-[13px] font-semibold text-slate-800 truncate max-w-[120px] sm:max-w-none">@yield('title')</span>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <div class="text-right flex-col hidden sm:flex">
                        <span class="text-[10px] text-slate-500 font-medium leading-tight">{{ now()->format('l') }}</span>
                        <span class="text-[12px] text-slate-800 font-semibold">{{ now()->format('M d, Y') }}</span>
                    </div>
                </div>
            </header>

            <!-- Content Area -->
            <main class="flex-1 overflow-y-auto p-4 md:p-8">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Sidebar Toggle Script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Sidebar Toggle Script
            const sidebar = document.getElementById('sidebar');
            const toggleBtn = document.getElementById('sidebarToggle');
            const toggleIcon = document.getElementById('toggleIcon');
            const logo = document.getElementById('sidebarLogo');
            const icon = document.getElementById('sidebarIcon');
            const texts = document.querySelectorAll('.sidebar-text');
            const links = document.querySelectorAll('.sidebar-link');
            const profileSection = document.getElementById('profileSection');
            const collapsedLogout = document.getElementById('collapsedLogout');
            
            const backdrop = document.getElementById('sidebarBackdrop');
            const closeBtn = document.getElementById('sidebarClose');

            let isCollapsed = false;

            function openSidebarMobile() {
                sidebar.classList.remove('-translate-x-full');
                sidebar.classList.add('translate-x-0');
                backdrop.classList.remove('hidden');
                setTimeout(() => {
                    backdrop.classList.add('opacity-100');
                }, 50);
            }

            function closeSidebarMobile() {
                sidebar.classList.remove('translate-x-0');
                sidebar.classList.add('-translate-x-full');
                backdrop.classList.remove('opacity-100');
                setTimeout(() => {
                    backdrop.classList.add('hidden');
                }, 300);
            }

            toggleBtn.addEventListener('click', () => {
                if (window.innerWidth < 1024) {
                    openSidebarMobile();
                } else {
                    isCollapsed = !isCollapsed;
                    if (isCollapsed) {
                        sidebar.classList.remove('w-[280px]');
                        sidebar.classList.add('w-20');
                        logo.classList.add('hidden');
                        icon.classList.remove('hidden');
                        
                        texts.forEach(t => {
                            t.classList.remove('opacity-100');
                            t.classList.add('opacity-0', 'hidden');
                        });

                        links.forEach(l => {
                            l.classList.remove('px-3');
                            l.classList.add('px-0', 'justify-center');
                        });

                        profileSection.classList.add('hidden');
                        collapsedLogout.classList.remove('hidden');
                    } else {
                        sidebar.classList.remove('w-20');
                        sidebar.classList.add('w-[280px]');
                        icon.classList.add('hidden');
                        logo.classList.remove('hidden');
                        
                        texts.forEach(t => {
                            t.classList.remove('hidden');
                            setTimeout(() => t.classList.remove('opacity-0'), 50);
                            t.classList.add('opacity-100');
                        });

                        links.forEach(l => {
                            l.classList.remove('px-0', 'justify-center');
                            l.classList.add('px-3');
                        });

                        profileSection.classList.remove('hidden');
                        collapsedLogout.classList.add('hidden');
                    }
                }
            });

            if (closeBtn) {
                closeBtn.addEventListener('click', closeSidebarMobile);
            }
            if (backdrop) {
                backdrop.addEventListener('click', closeSidebarMobile);
            }

            // Reset classes on resize to prevent buggy state
            window.addEventListener('resize', () => {
                if (window.innerWidth >= 1024) {
                    sidebar.classList.remove('-translate-x-full', 'translate-x-0');
                    backdrop.classList.add('hidden');
                    backdrop.classList.remove('opacity-100');
                } else {
                    sidebar.classList.add('-translate-x-full');
                    sidebar.classList.remove('translate-x-0');
                }
            });

            // SweetAlert Delete Confirmation
            const deleteForms = document.querySelectorAll('.delete-form');
            deleteForms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#F60000',
                        cancelButtonColor: '#94a3b8',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>
