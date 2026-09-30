@extends('layouts.app')
@section('body_class', 'bg-[#f8fafc] font-sans antialiased text-[#1e293b] footer-light')

@section('content')
    <!-- Search Modal Overlay -->
    <div id="searchModal" class="search-modal-overlay"
        onclick="if(event.target === this) this.classList.remove('visible');">
        <div class="search-modal-card">
            <button type="button" class="search-modal-close-btn" aria-label="Close search"
                onclick="document.getElementById('searchModal').classList.remove('visible');">&times;</button>
            <form action="/search" method="GET" class="search-form w-full relative">
                <div class="search-input-wrapper">
                    <svg class="search-input-icon" width="32" height="32" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                    <input type="text" name="q" placeholder="Search..." class="search-input" autocomplete="off">
                </div>
                <div class="search-glow-bar"></div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                const searchModal = document.getElementById('searchModal');
                if (searchModal && searchModal.classList.contains('visible')) {
                    searchModal.classList.remove('visible');
                }
            }
        });
    </script>

    <main class="main bg-[#f8fafc] text-[#1e293b] overflow-hidden">
        <!-- Floating Ambient Background Accents -->
        <div class="absolute top-20 left-1/4 w-[450px] h-[450px] rounded-full bg-red-600/5 blur-[120px] pointer-events-none"></div>
        <div class="absolute top-96 right-1/4 w-[500px] h-[500px] rounded-full bg-emerald-600/5 blur-[140px] pointer-events-none"></div>

        <!-- Hero Header Section -->
        <section class="pt-36 md:pt-40 pb-12 relative z-10">
            <div class="container-fluid text-center px-4 max-w-4xl mx-auto">
                <!-- Breadcrumbs -->
                <nav class="mb-4 flex justify-center items-center gap-2 text-xs text-slate-400 font-medium">
                    <a href="/" class="hover:text-slate-700 transition-colors">Home</a>
                    <span>›</span>
                    <span class="text-slate-800 font-semibold">Products</span>
                </nav>

                <span class="text-[#F60000] text-xs font-bold tracking-[0.25em] uppercase block mb-3">
                    {{ $settings['products_page_subtitle'] ?? 'OUR PRODUCTS' }}
                </span>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-[#1a1e20] tracking-tight leading-tight font-sans">
                    {{ $settings['products_page_title'] ?? 'ACI MARINE & RIVERRINE' }}
                </h1>
                <p class="mt-4 text-[#495057] text-body-md font-medium max-w-2xl mx-auto leading-relaxed">
                    {{ $settings['products_page_description'] ?? 'Explore our complete lineup of certified marine propulsion systems, deck machinery, navigation suites, safety appliances, and custom shipbuilding solutions.' }}
                </p>
                <div class="flex justify-center items-center gap-2 mt-6">
                    <span class="w-20 h-[4px] bg-red-600/20"></span>
                    <span class="loader"></span>
                    <span class="w-20 h-[4px] bg-red-600/20"></span>
                </div>
            </div>
        </section>

        <!-- Product Categories Grid Section -->
        <section class="pb-28 relative z-10">
            <div class="container-fluid max-w-7xl mx-auto px-4 md:px-6">
                <div class="w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse($productThumbles as $index => $thumble)
                    @php
                        $delayClass = '';
                        if ($index % 3 == 1) $delayClass = 'delay-100';
                        if ($index % 3 == 2) $delayClass = 'delay-200';
                    @endphp
                    <div class="aci-prod-card group reveal-on-scroll {{ $delayClass }}" id="prod-card-{{ $thumble->id }}">
                        <div class="aci-prod-img-wrap">
                            <img src="{{ $thumble->imageUrl() }}" class="aci-prod-img" alt="{{ $thumble->title }}" loading="lazy">
                            <div class="aci-prod-img-overlay"></div>
                            <div class="aci-prod-img-tag">{{ $thumble->tag }}</div>
                        </div>
                        <div class="aci-prod-body">
                            <div class="aci-prod-default">
                                <h3 class="aci-prod-title">
                                    <span class="aci-prod-dot"></span>
                                    {{ $thumble->title }}
                                </h3>
                                <p class="aci-prod-sub">{{ $thumble->subtitle }}</p>
                            </div>
                            <div class="aci-prod-hover-panel">
                                <div class="aci-prod-hover-header">
                                    <span class="aci-prod-dot"></span>
                                    <h3>{{ $thumble->tag ?? $thumble->title }}</h3>
                                </div>
                                <ul class="aci-prod-list">
                                    @forelse($thumble->products as $product)
                                    <li>
                                        <span class="aci-list-icon">→</span>
                                        <a href="{{ route('products.detail', [$thumble->id, $product->id]) }}" class="hover:text-red-500 transition-colors">{{ $product->name }}</a>
                                    </li>
                                    @empty
                                    <li class="text-xs text-slate-400 py-1">View category specifications</li>
                                    @endforelse
                                </ul>
                                <a href="/products/{{ $thumble->id }}" class="aci-prod-btn">
                                    Explore
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14M12 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-3 text-center py-16 bg-white rounded-3xl border border-slate-200">
                        <p class="text-slate-500 font-semibold">No product categories currently available.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Bottom Consultation Banner -->
        <section class="py-16 bg-gradient-to-r from-slate-900 via-[#0d1520] to-slate-900 text-white relative overflow-hidden">
            <div class="container mx-auto px-4 max-w-5xl text-center relative z-10">
                <span class="text-[#F60000] text-xs font-bold tracking-[0.25em] uppercase block mb-3">Custom Marine Solutions</span>
                <h3 class="text-3xl md:text-4xl font-black mb-4 font-outfit">Need a Customized Vessel or Engine Setup?</h3>
                <p class="text-slate-400 max-w-2xl mx-auto mb-8 text-sm md:text-base leading-relaxed">
                    Our specialized marine engineering team provides end-to-end propulsion design, equipment integration, and lifecycle maintenance.
                </p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="/contact" class="inline-flex items-center px-8 py-3.5 rounded-xl bg-[#F60000] text-white font-bold text-sm tracking-wider uppercase hover:bg-red-700 transition-all duration-300 shadow-lg shadow-red-600/30 hover:scale-105">
                        Request Consultation
                    </a>
                    <a href="tel:+8801700701761" class="inline-flex items-center px-8 py-3.5 rounded-xl bg-white/10 text-white font-bold text-sm tracking-wider uppercase hover:bg-white/20 transition-all duration-300 backdrop-blur-md">
                        Call Us (+88) 01700-701761
                    </a>
                </div>
            </div>
        </section>
    </main>
@endsection
