@extends('layouts.app')
@section('body_class', 'bg-[#f8fafc] font-sans antialiased text-[#1e293b] footer-light')

@section('content')
<style>

        :root {
            --brand-red: #F60000;
            --brand-green: #27a844;
            --dark-bg: #0a0f14;
        }

        .product-hero {
            background: linear-gradient(180deg, rgba(15, 23, 42, 0.9) 0%, rgba(10, 15, 20, 0.98) 100%),
                url('https://acimarine.com/images/featured/main.jpg') no-repeat center center;
            background-size: cover;
            min-height: 40vh;
        }

        .range-slider-container {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .engine-card {
            background: #ffffff;
            border: 1px solid rgba(0, 0, 0, 0.06);
            border-radius: 20px;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .engine-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.08);
            border-color: rgba(246, 0, 0, 0.2);
        }

        .engine-img-wrap {
            position: relative;
            height: 240px;
            background: #f8fafc;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            border-bottom: 1px solid rgba(0, 0, 0, 0.04);
        }

        .engine-img {
            max-height: 80%;
            max-width: 80%;
            object-fit: contain;
            transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .engine-card:hover .engine-img {
            transform: scale(1.08);
        }

        /* Custom Double Handle Range Slider Styles */
        .slider-tracks {
            position: relative;
            width: 100%;
            height: 6px;
            background: #e2e8f0;
            border-radius: 999px;
        }

        .slider-highlight {
            position: absolute;
            height: 100%;
            background: linear-gradient(90deg, var(--brand-green) 0%, var(--brand-red) 100%);
            border-radius: 999px;
            left: 0%;
            right: 0%;
            box-shadow: 0 0 8px rgba(39, 168, 68, 0.2);
        }

        .slider-input-range {
            position: absolute;
            width: 100%;
            height: 6px;
            top: 0;
            left: 0;
            background: none;
            pointer-events: none;
            -webkit-appearance: none;
            appearance: none;
            margin: 0;
            padding: 0;
        }

        .slider-input-range::-webkit-slider-thumb {
            height: 22px;
            width: 22px;
            border-radius: 50%;
            background: #ffffff;
            cursor: pointer;
            pointer-events: auto;
            -webkit-appearance: none;
            transition: transform 0.2s cubic-bezier(0.16, 1, 0.3, 1), background-color 0.2s;
            position: relative;
            z-index: 10;
        }

        .slider-input-range::-webkit-slider-thumb:hover {
            transform: scale(1.15);
            background-color: #f8fafc;
        }

        .slider-input-range::-moz-range-thumb {
            height: 22px;
            width: 22px;
            border-radius: 50%;
            background: #ffffff;
            cursor: pointer;
            pointer-events: auto;
            transition: transform 0.2s cubic-bezier(0.16, 1, 0.3, 1), background-color 0.2s;
            position: relative;
            z-index: 10;
        }

        .slider-input-range::-moz-range-thumb:hover {
            transform: scale(1.15);
            background-color: #f8fafc;
        }

        #minRangeInput::-webkit-slider-thumb {
            border: 3px solid var(--brand-green);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4), 0 0 8px rgba(39, 168, 68, 0.4);
        }

        #maxRangeInput::-webkit-slider-thumb {
            border: 3px solid var(--brand-red);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4), 0 0 8px rgba(246, 0, 0, 0.4);
        }

        #minRangeInput::-moz-range-thumb {
            border: 3px solid var(--brand-green);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4), 0 0 8px rgba(39, 168, 68, 0.4);
        }

        #maxRangeInput::-moz-range-thumb {
            border: 3px solid var(--brand-red);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4), 0 0 8px rgba(246, 0, 0, 0.4);
        }

        /* Modal styling */
        .custom-modal {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(10, 15, 20, 0.85);
            backdrop-filter: blur(15px);
            z-index: 2000;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .custom-modal.visible {
            display: flex;
            opacity: 1;
        }

        .modal-card {
            background: #0f172a;
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            border-radius: 28px;
            max-width: 700px;
            width: 90%;
            color: #ffffff;
            overflow: hidden;
            transform: scale(0.95);
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .custom-modal.visible .modal-card {
            transform: scale(1);
        }

        /* Page Load & Scroll Animations */
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes zoomIn {
            from {
                opacity: 0;
                transform: scale(0.96);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .animate-fade-in-down {
            animation: fadeInDown 1s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        .animate-fade-in-up {
            animation: fadeInUp 1.2s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        .animate-zoom-in {
            animation: zoomIn 1.2s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        .scroll-reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s cubic-bezier(0.16, 1, 0.3, 1), transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: transform, opacity;
        }

        .scroll-reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        /* Staggered Animation for Cards */
        .stagger-card {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s cubic-bezier(0.16, 1, 0.3, 1), transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), border-color 0.4s ease, box-shadow 0.4s ease;
            will-change: transform, opacity;
        }

        .stagger-card.active {
            opacity: 1;
            transform: translateY(0);
        }

        .stagger-feature {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.8s cubic-bezier(0.16, 1, 0.3, 1), transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: transform, opacity;
        }

        .stagger-feature.active {
            opacity: 1;
            transform: translateY(0);
        }

        /* Specialists Redesign Custom Styles */
        .spec-grid-container {
            position: relative;
        }
        
        .spec-card {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.85) 0%, rgba(248, 250, 252, 0.6) 100%);
            border: 1px solid rgba(226, 232, 240, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 24px;
            padding: 2rem;
            transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 20px -2px rgba(15, 23, 42, 0.02), 0 2px 6px -1px rgba(15, 23, 42, 0.02);
            cursor: default;
        }
        
        .spec-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at var(--mouse-x, 50%) var(--mouse-y, 50%), var(--card-glow, rgba(39, 168, 68, 0.06)) 0%, transparent 60%);
            opacity: 0;
            transition: opacity 0.5s ease;
            pointer-events: none;
            z-index: 1;
        }

        .spec-card:hover {
            transform: translateY(-6px);
            border-color: var(--card-border-hover, rgba(39, 168, 68, 0.3));
            box-shadow: 0 20px 40px -15px var(--card-shadow-hover, rgba(39, 168, 68, 0.12));
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(248, 250, 252, 0.8) 100%);
        }

        .spec-card:hover::before {
            opacity: 1;
        }

        .spec-card-content {
            position: relative;
            z-index: 2;
        }

        .spec-icon-wrap {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 3.5rem;
            height: 3.5rem;
            border-radius: 18px;
            background: var(--icon-bg, rgba(245, 158, 11, 0.05));
            border: 1px solid var(--icon-border, rgba(245, 158, 11, 0.15));
            color: var(--icon-color, #f59e0b);
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
        }

        .spec-card:hover .spec-icon-wrap {
            transform: scale(1.1) rotate(5deg);
            background: var(--icon-color);
            color: #ffffff;
            box-shadow: 0 10px 20px -5px var(--icon-shadow, rgba(245, 158, 11, 0.4));
            border-color: var(--icon-color);
        }

        /* Central Rotating Logo Core */
        .center-logo-container {
            position: relative;
            width: 100%;
            min-height: 300px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .logo-tech-orbit-1 {
            position: absolute;
            width: 260px;
            height: 260px;
            border-radius: 50%;
            border: 1px dashed rgba(226, 232, 240, 0.8);
            animation: spin-clockwise 25s linear infinite;
            pointer-events: none;
            top: 50%;
            left: 50%;
            transform-origin: center center;
            margin-top: -130px;
            margin-left: -130px;
        }
        
        .logo-tech-orbit-2 {
            position: absolute;
            width: 220px;
            height: 220px;
            border-radius: 50%;
            border: 1px solid rgba(226, 232, 240, 0.4);
            border-top-color: #27a844;
            border-bottom-color: #F60000;
            animation: spin-counterclockwise 15s linear infinite;
            pointer-events: none;
            opacity: 0.7;
            top: 50%;
            left: 50%;
            margin-top: -110px;
            margin-left: -110px;
        }

        .logo-tech-orbit-3 {
            position: absolute;
            width: 180px;
            height: 180px;
            border-radius: 50%;
            border: 2px dotted rgba(226, 232, 240, 0.6);
            animation: spin-clockwise 40s linear infinite;
            pointer-events: none;
            top: 50%;
            left: 50%;
            margin-top: -90px;
            margin-left: -90px;
        }

        .center-logo-wrap {
            position: relative;
            width: 140px;
            height: 140px;
            background: #ffffff;
            border: 1px solid rgba(226, 232, 240, 0.8);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            z-index: 10;
            transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05), inset 0 2px 4px rgba(255,255,255,0.8);
        }

        .center-logo-wrap:hover {
            transform: scale(1.05);
            box-shadow: 0 20px 40px rgba(246, 0, 0, 0.1), inset 0 2px 4px rgba(255,255,255,0.9);
            border-color: rgba(246, 0, 0, 0.3);
        }

        .logo-glow-ring {
            position: absolute;
            inset: -4px;
            border-radius: 50%;
            background: linear-gradient(135deg, #27a844, #F60000);
            z-index: -1;
            opacity: 0.15;
            filter: blur(8px);
            transition: all 0.5s ease;
        }

        .center-logo-wrap:hover .logo-glow-ring {
            opacity: 0.3;
            filter: blur(12px);
            inset: -8px;
        }

        @keyframes spin-clockwise {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes spin-counterclockwise {
            0% { transform: rotate(360deg); }
            100% { transform: rotate(0deg); }
        }

        /* Ensure stagger-feature cards always visible as fallback */
        .stagger-feature {
            transition-delay: 0s !important;
        }
    
</style>

<!-- Search Modal -->
    <div id="searchModal" class="search-modal-overlay"
        onclick="if(event.target === this) this.classList.remove('visible');">
        <div class="search-modal-card">
            <button type="button" class="search-modal-close-btn" aria-label="Close search"
                onclick="document.getElementById('searchModal').classList.remove('visible');">×</button>
            <form action="#" method="GET" class="search-form w-full relative"
                onsubmit="event.preventDefault(); alert('Search capability integration demo.');">
                <div class="search-input-wrapper">
                    <svg class="search-input-icon" width="32" height="32" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                    <input type="text" name="q" placeholder="Search engines, models..." class="search-input"
                        autocomplete="off">
                </div>
                <div class="search-glow-bar"></div>
            </form>
        </div>
    </div>

    <!-- Main Content Area -->
    <main class="main relative overflow-hidden">

        <!-- Hero Section -->
        <section class="product-hero relative flex items-center justify-center pt-32 pb-20"
            style="background: linear-gradient(180deg, rgba(15, 23, 42, 0.92) 0%, rgba(10, 15, 20, 0.98) 100%), url('{{ $thumble->imageUrl() }}') no-repeat center center; background-size:cover;">
            <div class="container-fluid text-center px-4 max-w-4xl z-10 animate-fade-in-up">
                <!-- Breadcrumb -->
                <nav style="margin-bottom:1rem; display:flex; justify-content:center; align-items:center; gap:8px; font-size:0.78rem; color:rgba(255,255,255,0.5);">
                    <a href="/" style="color:rgba(255,255,255,0.5); text-decoration:none; transition:color 0.2s;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='rgba(255,255,255,0.5)'">Home</a>
                    <span>›</span>
                    <span style="color:rgba(255,255,255,0.8);">{{ $thumble->title }}</span>
                </nav>
                <span class="text-xs md:text-sm font-bold tracking-[0.3em] text-[#ff3366] uppercase mb-3 block">{{ $thumble->tag }}</span>
                <h1 class="text-4xl md:text-6xl font-black text-white tracking-tight font-outfit uppercase drop-shadow-md">
                    {{ $thumble->title }}
                </h1>
                @if($thumble->subtitle)
                <p style="color:rgba(255,255,255,0.7); margin-top:1rem; font-size:1rem; font-weight:400; max-width:600px; margin-left:auto; margin-right:auto;">{{ $thumble->subtitle }}</p>
                @endif
                <div class="flex justify-center items-center gap-2 mt-4">
                    <span class="w-16 h-[3px] bg-red-600/50"></span>
                    <span class="w-2 h-2 rounded-full bg-red-600"></span>
                    <span class="w-16 h-[3px] bg-red-600/50"></span>
                </div>
            </div>
        </section>

        <!-- Product Filter & Cards Section -->
        <section class="py-16 md:py-24 bg-slate-50 relative">
            <div class="container mx-auto px-4 max-w-7xl">

                @if($thumble->id == 1)
                <!-- Double Range Slider -->
                <div class="max-w-xl mx-auto mb-16 text-center scroll-reveal">
                    <h3 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-4">Filter Products by
                        Output</h3>
                    <div
                        class="p-6 bg-white border border-slate-200/60 shadow-[0_20px_50px_rgba(0,0,0,0.05)] rounded-3xl relative">
                        <div class="flex justify-between items-center mb-6">
                            <div
                                class="flex items-center gap-2.5 px-4 py-2 bg-emerald-50 border border-emerald-100 rounded-full text-xs font-semibold text-emerald-600 shadow-[0_2px_10px_rgba(16,185,129,0.02)]">
                                <span class="uppercase tracking-wider text-[9px] text-slate-500 font-bold">Min
                                     Output</span>
                                <span id="minValLabel" class="font-mono text-sm text-emerald-600 font-bold">278
                                    kW</span>
                            </div>
                            <div class="w-8 h-[1px] bg-slate-200"></div>
                            <div
                                class="flex items-center gap-2.5 px-4 py-2 bg-red-50 border border-red-100 rounded-full text-xs font-semibold text-red-600 shadow-[0_2px_10px_rgba(239,68,68,0.02)]">
                                <span class="uppercase tracking-wider text-[9px] text-slate-500 font-bold">Max
                                     Output</span>
                                <span id="maxValLabel" class="font-mono text-sm text-red-600 font-bold">2000 kW</span>
                            </div>
                        </div>
                        <div class="relative pt-1 px-2 mb-2">
                            <div class="slider-tracks">
                                <div class="slider-highlight" id="sliderHighlight"></div>
                            </div>
                            <input type="range" min="200" max="2200" value="278" class="slider-input-range"
                                id="minRangeInput" oninput="updateRangeSlider(true)">
                            <input type="range" min="200" max="2200" value="2000" class="slider-input-range"
                                id="maxRangeInput" oninput="updateRangeSlider(false)">
                        </div>
                    </div>
                </div>
                @endif

                <!-- Products Grid (Dynamic) -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8" id="enginesGrid">
                    @forelse($products as $product)
                    @php $productLink = $product->link_url ?: route('products.detail', [$thumble->id, $product->id]); @endphp
                    <div class="engine-card group cursor-pointer"
                        @if($thumble->id == 1)
                            data-kw="{{ ($product->id % 3 == 0) ? 650 : (($product->id % 3 == 1) ? 1030 : 1420) }}"
                        @endif
                        onclick="window.location.href='{{ $productLink }}'">
                        <div class="engine-img-wrap">
                            <img src="{{ $product->imageUrl() }}" class="engine-img" alt="{{ $product->name }}">
                        </div>
                        <div class="p-6 flex flex-col flex-1">
                            <h2 class="text-xl md:text-2xl font-extrabold text-[#1a1e20] mb-4 font-outfit uppercase tracking-tight text-center">
                                {{ $product->name }}
                            </h2>
                            <p class="text-sm text-slate-500 text-center mb-6 flex-1">Part of {{ $thumble->title }} category. Click below to view full specifications and details.</p>
                            <a href="{{ $productLink }}" onclick="event.stopPropagation()"
                                class="w-full mt-auto py-3 bg-[#F60000] hover:bg-[#d01c1c] text-white font-bold text-xs uppercase tracking-wider rounded-xl transition-all duration-300 transform hover:-translate-y-0.5 text-center">
                                View Details
                            </a>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-3 text-center py-20 text-slate-400">
                        <p class="text-lg font-semibold">No products found in this category.</p>
                        <a href="/" class="text-[#F60000] text-sm mt-2 inline-block hover:underline">← Back to Home</a>
                    </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Specialists Feature Section -->
        <section style="padding: 5rem 0; background: #ffffff; position: relative; overflow: hidden; border-top: 1px solid #f1f5f9;">

            <!-- Subtle radial glow background -->
            <div style="position:absolute; inset:0; background:radial-gradient(circle at 50% 50%, rgba(39,168,68,0.03), transparent 70%); pointer-events:none;"></div>

            <div style="max-width:1280px; margin:0 auto; padding:0 2rem; position:relative; z-index:10;">

                <!-- Section Header -->
                <div style="text-align:center; margin-bottom:4rem;">
                    <span style="color:#27a844; font-size:0.75rem; font-weight:700; letter-spacing:0.3em; text-transform:uppercase; display:block; margin-bottom:0.75rem;">We Are Specialists In</span>
                    <h2 style="font-size:2.75rem; font-weight:900; color:#1a1e20; letter-spacing:-0.02em; text-transform:uppercase; font-family:'Outfit',sans-serif; margin:0 0 1rem 0;">What We Do</h2>
                    <div style="display:flex; justify-content:center; align-items:center; gap:0.5rem;">
                        <span style="width:3rem; height:2px; background:rgba(39,168,68,0.25); display:inline-block;"></span>
                        <span style="width:0.5rem; height:0.5rem; border-radius:50%; background:#27a844; display:inline-block;"></span>
                        <span style="width:3rem; height:2px; background:rgba(39,168,68,0.25); display:inline-block;"></span>
                    </div>
                </div>

                <!-- 3-Column Grid — pure inline CSS -->
                <div id="featuresGrid" style="display:grid; grid-template-columns:1fr 220px 1fr; gap:2.5rem; align-items:center;">

                    <!-- LEFT COLUMN -->
                    <div style="display:flex; flex-direction:column; gap:1.5rem;">

                        <!-- Feature 1: Powerful Performance -->
                        <div class="spec-card" style="--card-glow:rgba(245,158,11,0.08);--card-border-hover:rgba(245,158,11,0.3);--card-shadow-hover:rgba(245,158,11,0.12);--icon-bg:rgba(245,158,11,0.06);--icon-border:rgba(245,158,11,0.18);--icon-color:#f59e0b;--icon-shadow:rgba(245,158,11,0.4);">
                            <div class="spec-card-content" style="display:flex; gap:1.25rem; align-items:flex-start;">
                                <div class="spec-icon-wrap" style="flex-shrink:0;">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"/><circle cx="12" cy="12" r="6"/><path d="M12 12l3-3"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 style="font-size:0.9rem; font-weight:700; text-transform:uppercase; letter-spacing:0.08em; color:#1a1e20; margin:0 0 0.35rem; font-family:'Outfit',sans-serif;">Powerful Performance</h3>
                                    <p style="font-size:0.85rem; color:#64748b; line-height:1.65; margin:0;">High torque and quickness are compatible with all applications.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Feature 2: High Reliability -->
                        <div class="spec-card" style="--card-glow:rgba(16,185,129,0.08);--card-border-hover:rgba(16,185,129,0.3);--card-shadow-hover:rgba(16,185,129,0.12);--icon-bg:rgba(16,185,129,0.06);--icon-border:rgba(16,185,129,0.18);--icon-color:#10b981;--icon-shadow:rgba(16,185,129,0.4);">
                            <div class="spec-card-content" style="display:flex; gap:1.25rem; align-items:flex-start;">
                                <div class="spec-icon-wrap" style="flex-shrink:0;">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 11 2 2 4-4"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 style="font-size:0.9rem; font-weight:700; text-transform:uppercase; letter-spacing:0.08em; color:#1a1e20; margin:0 0 0.35rem; font-family:'Outfit',sans-serif;">High Reliability</h3>
                                    <p style="font-size:0.85rem; color:#64748b; line-height:1.65; margin:0;">We have supplied over 120 thousand of marine engines since 1916.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Feature 3: Low Fuel Consumption -->
                        <div class="spec-card" style="--card-glow:rgba(14,165,233,0.08);--card-border-hover:rgba(14,165,233,0.3);--card-shadow-hover:rgba(14,165,233,0.12);--icon-bg:rgba(14,165,233,0.06);--icon-border:rgba(14,165,233,0.18);--icon-color:#0ea5e9;--icon-shadow:rgba(14,165,233,0.4);">
                            <div class="spec-card-content" style="display:flex; gap:1.25rem; align-items:flex-start;">
                                <div class="spec-icon-wrap" style="flex-shrink:0;">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M3 2v10c0 4.42 3.58 8 8 8s8-3.58 8-8V2c-4 0-8 2-8 5-2 1-5 2-8 5"/><path d="M11 7c4 0 8 2 8 5"/><path d="M12 20v2"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 style="font-size:0.9rem; font-weight:700; text-transform:uppercase; letter-spacing:0.08em; color:#1a1e20; margin:0 0 0.35rem; font-family:'Outfit',sans-serif;">Low Fuel Consumption</h3>
                                    <p style="font-size:0.85rem; color:#64748b; line-height:1.65; margin:0;">Mitsubishi original fuel injection pump and turbo charger bring best combustion matching.</p>
                                </div>
                            </div>
                        </div>

                    </div><!-- /LEFT -->

                    <!-- CENTER COLUMN: Logo -->
                    <div style="display:flex; align-items:center; justify-content:center;">
                        <div class="center-logo-container">
                            <div class="logo-tech-orbit-1"></div>
                            <div class="logo-tech-orbit-2"></div>
                            <div class="logo-tech-orbit-3"></div>
                            <div class="center-logo-wrap">
                                <div class="logo-glow-ring"></div>
                                <img src="/image/mitsubishi.png" alt="Mitsubishi Logo" style="width:100%; height:100%; object-fit:contain; position:relative; z-index:10;">
                            </div>
                        </div>
                    </div><!-- /CENTER -->

                    <!-- RIGHT COLUMN -->
                    <div style="display:flex; flex-direction:column; gap:1.5rem;">

                        <!-- Feature 4: Space Saving -->
                        <div class="spec-card" style="--card-glow:rgba(99,102,241,0.08);--card-border-hover:rgba(99,102,241,0.3);--card-shadow-hover:rgba(99,102,241,0.12);--icon-bg:rgba(99,102,241,0.06);--icon-border:rgba(99,102,241,0.18);--icon-color:#6366f1;--icon-shadow:rgba(99,102,241,0.4);">
                            <div class="spec-card-content" style="display:flex; gap:1.25rem; align-items:flex-start;">
                                <div class="spec-icon-wrap" style="flex-shrink:0;">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M4 14h6v6H4zm10-10h6v6h-6zm0 10h6v6h-6zM4 4h6v6H4z"/><path d="m3 3 6 6m12-6-6 6m0 6 6 6m-12 0 6-6"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 style="font-size:0.9rem; font-weight:700; text-transform:uppercase; letter-spacing:0.08em; color:#1a1e20; margin:0 0 0.35rem; font-family:'Outfit',sans-serif;">Space Saving</h3>
                                    <p style="font-size:0.85rem; color:#64748b; line-height:1.65; margin:0;">Compactness gives advantages for installation and running cost.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Feature 5: Easy Maintenance -->
                        <div class="spec-card" style="--card-glow:rgba(249,115,22,0.08);--card-border-hover:rgba(249,115,22,0.3);--card-shadow-hover:rgba(249,115,22,0.12);--icon-bg:rgba(249,115,22,0.06);--icon-border:rgba(249,115,22,0.18);--icon-color:#f97316;--icon-shadow:rgba(249,115,22,0.4);">
                            <div class="spec-card-content" style="display:flex; gap:1.25rem; align-items:flex-start;">
                                <div class="spec-icon-wrap" style="flex-shrink:0;">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/><circle cx="18" cy="6" r="1.5"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 style="font-size:0.9rem; font-weight:700; text-transform:uppercase; letter-spacing:0.08em; color:#1a1e20; margin:0 0 0.35rem; font-family:'Outfit',sans-serif;">Easy Maintenance</h3>
                                    <p style="font-size:0.85rem; color:#64748b; line-height:1.65; margin:0;">Cylinder heads are individually divided by cylinder.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Feature 6: Safety Management -->
                        <div class="spec-card" style="--card-glow:rgba(239,68,68,0.08);--card-border-hover:rgba(239,68,68,0.3);--card-shadow-hover:rgba(239,68,68,0.12);--icon-bg:rgba(239,68,68,0.06);--icon-border:rgba(239,68,68,0.18);--icon-color:#ef4444;--icon-shadow:rgba(239,68,68,0.4);">
                            <div class="spec-card-content" style="display:flex; gap:1.25rem; align-items:flex-start;">
                                <div class="spec-icon-wrap" style="flex-shrink:0;">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M12 8v4"/><path d="M12 16h.01"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 style="font-size:0.9rem; font-weight:700; text-transform:uppercase; letter-spacing:0.08em; color:#1a1e20; margin:0 0 0.35rem; font-family:'Outfit',sans-serif;">Safety Management</h3>
                                    <p style="font-size:0.85rem; color:#64748b; line-height:1.65; margin:0;">Large inspection covers are available in crankcase and oilpan.</p>
                                </div>
                            </div>
                        </div>

                    </div><!-- /RIGHT -->

                </div><!-- /3-col grid -->

                <!-- Mobile fallback note (grid collapses to single col on small screens) -->
                <style>
                    @media (max-width: 900px) {
                        #featuresGrid {
                            grid-template-columns: 1fr !important;
                        }
                        #featuresGrid > div:nth-child(2) {
                            order: -1;
                        }
                    }
                </style>

            </div>
        </section>

    </main>

    <!-- Specs Modal -->
    <div id="specModal" class="custom-modal" onclick="if(event.target === this) closeSpecModal();">
        <div class="modal-card">
            <div class="p-6 md:p-8 relative">
                <button onclick="closeSpecModal()"
                    class="absolute top-4 right-4 text-slate-400 hover:text-white text-2xl font-light">×</button>
                <div class="mb-6">
                    <span class="text-xs font-bold uppercase tracking-widest text-[#ff3366]" id="modalTag">Mitsubishi
                        Engine</span>
                    <h2 class="text-2xl md:text-3xl font-black mt-2 font-outfit uppercase tracking-tight"
                        id="modalEngineTitle">S6M3H-MPTK</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-6">
                    <div>
                        <h4 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-4">Technical
                            Specifications</h4>
                        <div class="space-y-3 font-mono text-xs text-slate-300">
                            <div class="flex justify-between border-b border-white/5 pb-2"><span>Engine
                                    Rating:</span><span id="specRating" class="text-white"></span></div>
                            <div class="flex justify-between border-b border-white/5 pb-2"><span>Output
                                    (kW/bhp):</span><span id="specOutput" class="text-white"></span></div>
                            <div class="flex justify-between border-b border-white/5 pb-2"><span>Speed
                                    (rpm):</span><span id="specSpeed" class="text-white"></span></div>
                            <div class="flex justify-between border-b border-white/5 pb-2"><span>Emission
                                    Class:</span><span id="specEmission" class="text-white"></span></div>
                        </div>
                    </div>
                    <div>
                        <h4 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-4">Quick Quote Request
                        </h4>
                        <form
                            onsubmit="event.preventDefault(); alert('Quote Request Submitted! We will contact you soon.'); closeSpecModal();"
                            class="space-y-4">
                            <input type="text" placeholder="Your Name" required
                                class="w-full bg-slate-900 border border-white/10 rounded-xl px-4 py-2.5 text-xs text-white focus:outline-none focus:border-[#F60000]">
                            <input type="email" placeholder="Your Email" required
                                class="w-full bg-slate-900 border border-white/10 rounded-xl px-4 py-2.5 text-xs text-white focus:outline-none focus:border-[#F60000]">
                            <button type="submit"
                                class="w-full py-3 bg-[#27a844] hover:bg-[#1f8736] text-white font-bold text-xs uppercase tracking-wider rounded-xl transition-all duration-300">
                                Send Quote Request
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Section -->

<script>
function toggleHeaderMenu(e) {
            e.preventDefault();
            const menu = document.getElementById('dropDownMenu');
            menu.classList.toggle('visible');
        }

        // Double Handle Range Slider Script
        const minValInput = document.getElementById('minRangeInput');
        const maxValInput = document.getElementById('maxRangeInput');
        const minValLabel = document.getElementById('minValLabel');
        const maxValLabel = document.getElementById('maxValLabel');
        const sliderHighlight = document.getElementById('sliderHighlight');

        function updateRangeSlider(isMin) {
            if (!minValInput || !maxValInput) {
                // If there's no slider, make sure all engine cards are visible
                const cards = document.querySelectorAll('.engine-card');
                cards.forEach(card => {
                    card.style.display = 'flex';
                    card.classList.add('active');
                });
                return;
            }
            let minVal = parseInt(minValInput.value);
            let maxVal = parseInt(maxValInput.value);

            if (isMin !== undefined) {
                if (isMin && minVal > maxVal) {
                    minValInput.value = maxVal;
                    minVal = maxVal;
                } else if (!isMin && maxVal < minVal) {
                    maxValInput.value = minVal;
                    maxVal = minVal;
                }
            } else {
                if (minVal > maxVal) {
                    minValInput.value = maxVal;
                    minVal = maxVal;
                }
            }

            if (minValLabel) minValLabel.textContent = minVal + ' kW';
            if (maxValLabel) maxValLabel.textContent = maxVal + ' kW';

            // Calculate percentage positions
            const totalRange = parseInt(minValInput.max) - parseInt(minValInput.min);
            const leftPercent = ((minVal - parseInt(minValInput.min)) / totalRange) * 100;
            const rightPercent = 100 - (((maxVal - parseInt(minValInput.min)) / totalRange) * 100);

            if (sliderHighlight) {
                sliderHighlight.style.left = leftPercent + '%';
                sliderHighlight.style.right = rightPercent + '%';
            }

            // Filter engine cards
            const cards = document.querySelectorAll('.engine-card');
            let visibleCount = 0;
            cards.forEach(card => {
                const kwAttr = card.getAttribute('data-kw');
                if (!kwAttr) {
                    card.style.display = 'flex';
                    card.classList.add('active');
                    return;
                }
                const kw = parseInt(kwAttr);
                if (kw >= minVal && kw <= maxVal) {
                    card.style.display = 'flex';
                    // Re-trigger reveal animation
                    card.classList.remove('active');
                    setTimeout(() => {
                        card.classList.add('active');
                    }, visibleCount * 60);
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                    card.classList.remove('active');
                }
            });
        }

        // Dynamically adjust z-index to allow dragging both handles when they overlap
        if (minValInput && maxValInput) {
            minValInput.addEventListener('input', () => {
                minValInput.style.zIndex = "20";
                maxValInput.style.zIndex = "10";
            });

            maxValInput.addEventListener('input', () => {
                maxValInput.style.zIndex = "20";
                minValInput.style.zIndex = "10";
            });
        }

        // Initialize slider positions
        updateRangeSlider();

        // Details Modal Functions
        const specModal = document.getElementById('specModal');
        const modalEngineTitle = document.getElementById('modalEngineTitle');
        const specRating = document.getElementById('specRating');
        const specOutput = document.getElementById('specOutput');
        const specSpeed = document.getElementById('specSpeed');
        const specEmission = document.getElementById('specEmission');

        function openSpecModal(model, rating, output, speed, emission) {
            modalEngineTitle.textContent = model;
            specRating.textContent = rating;
            specOutput.textContent = output;
            specSpeed.textContent = speed;
            specEmission.textContent = emission;
            specModal.classList.add('visible');
        }

        function closeSpecModal() {
            specModal.classList.remove('visible');
        }

        // Intersection Observer for scroll reveal animations
        document.addEventListener('DOMContentLoaded', () => {
            const observerOptions = {
                root: null,
                rootMargin: '0px 0px -50px 0px',
                threshold: 0.05
            };

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const target = entry.target;
                        
                        // Handle stagger for engine cards grid
                        if (target.id === 'enginesGrid') {
                            const cards = target.querySelectorAll('.stagger-card');
                            cards.forEach((card, idx) => {
                                setTimeout(() => {
                                    card.classList.add('active');
                                }, idx * 80);
                            });
                        } else if (target.id === 'featuresGrid') {
                            const features = target.querySelectorAll('.stagger-feature');
                            features.forEach((feat, idx) => {
                                setTimeout(() => {
                                    feat.classList.add('active');
                                }, idx * 100);
                            });
                        } else {
                            target.classList.add('active');
                        }
                        
                        observer.unobserve(target);
                    }
                });
            }, observerOptions);

            // Add stagger-card class dynamically to all engine cards
            document.querySelectorAll('.engine-card').forEach(card => {
                card.classList.add('stagger-card');
            });

            // Observe reveal sections
            document.querySelectorAll('.scroll-reveal').forEach(el => observer.observe(el));
            
            // Observe the engine grid to trigger card staggering
            const grid = document.getElementById('enginesGrid');
            if (grid) {
                observer.observe(grid);
            }

            // Observe the features grid to trigger stagger
            const featuresGrid = document.getElementById('featuresGrid');
            if (featuresGrid) {
                observer.observe(featuresGrid);
            }

            // Mouse tracking glow effect for spec-cards
            document.querySelectorAll('.spec-card').forEach(card => {
                card.addEventListener('mousemove', e => {
                    const rect = card.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;
                    card.style.setProperty('--mouse-x', `${x}px`);
                    card.style.setProperty('--mouse-y', `${y}px`);
                });
            });
        });
</script>
@endsection
