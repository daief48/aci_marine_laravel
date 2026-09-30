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
                <!-- Modern glowing bottom accent line that animates on focus -->
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

    <!--
      ==========================================================================
      MAIN CONTENT AREA
      Contains the core sections of the landing page, including hero slider,
      business areas, project references, news/articles feed, and promotional content.
      ==========================================================================
    -->
    <style>
        /* Ken Burns effect for Hero Banner */
        @keyframes kenBurns {
            0% {
                transform: scale(1) translate(0, 0);
            }

            50% {
                transform: scale(1.08) translate(-1%, -0.5%);
            }

            100% {
                transform: scale(1) translate(0, 0);
            }
        }

        .animate-ken-burns {
            animation: kenBurns 24s ease-in-out infinite;
        }

        /* Modern Gradient Text */
        .text-gradient-premium {
            background: linear-gradient(135deg, #ffffff 40%, #ff4d4d 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Spec diagnostic items */
        .diag-card {
            background: rgba(255, 255, 255, 0.01);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-left: 3px solid rgba(255, 255, 255, 0.1);
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .diag-card:hover {
            border-left-color: #F60000;
            border-color: rgba(246, 0, 0, 0.2);
            background: rgba(246, 0, 0, 0.02);
            transform: translateY(-4px);
            box-shadow: 0 10px 30px -10px rgba(246, 0, 0, 0.2);
        }

        /* High-End Timeline styling */
        .timeline-container {
            position: relative;
        }

        .timeline-container::before {
            content: '';
            position: absolute;
            left: 20px;
            top: 10px;
            bottom: 10px;
            width: 2px;
            background: linear-gradient(to bottom, #F60000, rgba(246, 0, 0, 0.1) 80%, transparent);
        }

        .timeline-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #F60000;
            border: 3px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 10px rgba(246, 0, 0, 0.6);
            transition: all 0.3s ease;
        }

        .timeline-card:hover .timeline-dot {
            background: #ffffff;
            box-shadow: 0 0 15px #F60000;
            transform: scale(1.2);
        }

        /* Pulse Dot for status */
        .pulse-dot {
            position: relative;
        }

        .pulse-dot::after {
            content: '';
            position: absolute;
            inset: -4px;
            border-radius: 50%;
            border: 2px solid #F60000;
            animation: pulse-ring 1.8s cubic-bezier(0.215, 0.610, 0.355, 1) infinite;
        }

        @keyframes pulse-ring {
            0% {
                transform: scale(0.35);
                opacity: 1;
            }

            100% {
                transform: scale(1.3);
                opacity: 0;
            }
        }

        /* Animated connection lines for machinery blueprint */
        .flow-line {
            stroke-dasharray: 8;
            animation: flowDash 4s linear infinite;
        }

        @keyframes flowDash {
            to {
                stroke-dashoffset: -80;
            }
        }

        /* Grid Pattern overlay for tech feel */
        .tech-grid-pattern {
            background-size: 40px 40px;
            background-image:
                linear-gradient(to right, rgba(255, 255, 255, 0.02) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(255, 255, 255, 0.02) 1px, transparent 1px);
        }

        /* Floating glass elements */
        .floating-orb {
            filter: blur(100px);
            opacity: 0.12;
            animation: floatOrb 15s ease-in-out infinite alternate;
        }

        @keyframes floatOrb {
            0% {
                transform: translate(0, 0) scale(1);
            }

            100% {
                transform: translate(40px, 30px) scale(1.15);
            }
        }

        /* â”€â”€ MODERN ANIMATION & STYLE ENHANCEMENTS â”€â”€ */
        .reveal-on-scroll {
            opacity: 0;
            transform: translateY(40px);
            transition: opacity 1.2s cubic-bezier(0.16, 1, 0.3, 1), transform 1.2s cubic-bezier(0.16, 1, 0.3, 1), filter 1.2s ease;
            filter: blur(4px);
            will-change: transform, opacity;
        }

        .reveal-on-scroll.active {
            opacity: 1;
            transform: translateY(0);
            filter: blur(0);
        }

        .reveal-left {
            transform: translateX(-40px);
        }

        .reveal-right {
            transform: translateX(40px);
        }

        .reveal-left.active,
        .reveal-right.active {
            transform: translateX(0);
        }

        .delay-100 {
            transition-delay: 0.1s !important;
        }

        .delay-200 {
            transition-delay: 0.2s !important;
        }

        .delay-300 {
            transition-delay: 0.3s !important;
        }

        .delay-400 {
            transition-delay: 0.4s !important;
        }

        .delay-500 {
            transition-delay: 0.5s !important;
        }

        /* Custom float animation for specific details */
        @keyframes floatSlow {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-12px) rotate(1deg);
            }
        }

        .animate-float-slow {
            animation: floatSlow 8s ease-in-out infinite;
        }

        /* Interactive technical metric gauge bar */
        .gauge-bar-fill {
            width: 0%;
            transition: width 1.8s cubic-bezier(0.16, 1, 0.3, 1) 0.3s;
        }

        .reveal-on-scroll.active .gauge-bar-fill {
            width: var(--target-width);
        }

        /* Vibrant backdrop glow spots */
        .glow-orb-emerald {
            background: radial-gradient(circle, rgba(16, 185, 129, 0.12) 0%, transparent 65%);
        }

        .glow-orb-rose {
            background: radial-gradient(circle, rgba(244, 63, 94, 0.12) 0%, transparent 65%);
        }

        .glow-orb-blue {
            background: radial-gradient(circle, rgba(59, 130, 246, 0.08) 0%, transparent 65%);
        }

        /* Mouse Scroll Animation */
        @keyframes scrollWheel {
            0% {
                transform: translateY(0);
                opacity: 1;
            }

            100% {
                transform: translateY(14px);
                opacity: 0;
            }
        }

        .animate-scroll-wheel {
            animation: scrollWheel 1.8s cubic-bezier(0.16, 1, 0.3, 1) infinite;
        }
    </style>

    <main class="main bg-[#f8fafc] text-[#1e293b] overflow-hidden relative">
        <!-- Ambient Background Glow Spots -->
        <div
            class="absolute top-1/4 left-1/4 w-[500px] h-[500px] rounded-full glow-orb-emerald filter blur-[120px] pointer-events-none z-0 animate-float-slow">
        </div>
        <div class="absolute top-2/3 right-1/4 w-[600px] h-[600px] rounded-full glow-orb-rose filter blur-[140px] pointer-events-none z-0 animate-float-slow"
            style="animation-delay: -3s;"></div>
        <div
            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] rounded-full glow-orb-blue filter blur-[160px] pointer-events-none z-0">
        </div>

        <!-- ── HERO SLIDER SECTION (100vh) ── -->
        <section class="relative w-full h-screen overflow-hidden border-b border-slate-100 z-10" id="heroSlider">
            <!-- Slides Container -->
            <div id="heroSlider-list" class="relative w-full h-full">
                <!-- Slide 1 (Static Hero Banner) -->
                <div class="absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-100 z-10">
                    <img src="general picture/pic6.jpg"
                        class="absolute inset-0 w-full h-full object-cover object-center animate-ken-burns z-0"
                        alt="ACI Marine Hero Banner">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-[#0f172a]/95 via-[#0f172a]/65 to-[#0f172a]/45 z-10">
                    </div>
                    <!-- Content -->
                    <div
                        class="container-fluid relative z-20 text-center px-4 max-w-5xl h-full flex flex-col justify-center pt-28 md:pt-36">
                        <span class="text-xs md:text-sm font-bold tracking-[0.4em] text-[#ff3366] uppercase mb-4 block">
                            {{ now()->year - 2018 }} Years of Excellence In
                        </span>
                        <h1
                            class="text-4xl md:text-7xl font-extrabold tracking-tight text-white mb-8 font-outfit uppercase leading-tight drop-shadow-lg">
                            Marine & Riverine <span
                                class="bg-gradient-to-r from-red-500 to-amber-500 text-transparent bg-clip-text">Industry</span>
                        </h1>
                        <div class="flex flex-wrap justify-center gap-5">
                            <a href="/projects"
                                class="px-8 py-4 rounded-full bg-[#F60000] hover:bg-[#d01c1c] text-white font-bold text-sm tracking-wider uppercase transition-all duration-300 transform hover:-translate-y-1 hover:shadow-[0_12px_30px_rgba(246,0,0,0.5)]">
                                Our Products
                            </a>
                            <a href="mailto:acimarine@aci-bd.com"
                                class="px-8 py-4 rounded-full border border-white/30 hover:border-white bg-white/5 hover:bg-white/15 text-white font-bold text-sm tracking-wider uppercase transition-all duration-300 backdrop-blur-md transform hover:-translate-y-1">
                                Contact Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Scroll Down Indicator (Clickable) -->
            <a href="javascript:void(0)"
                onclick="document.getElementById('who-we-are').scrollIntoView({ behavior: 'smooth' });"
                class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-20 flex flex-col items-center gap-3 group cursor-pointer text-decoration-none">
                <span
                    class="text-[10px] tracking-[0.25em] text-white/50 group-hover:text-[#ff3366] transition-all duration-300 uppercase font-black font-outfit">Scroll
                    Down</span>
                <!-- Custom Modern Mouse Scroll Icon -->
                <div
                    class="w-6 h-10 rounded-full border-2 border-white/30 group-hover:border-[#ff3366] group-hover:shadow-[0_0_15px_rgba(255,51,102,0.4)] transition-all duration-300 flex justify-center pt-2.5 backdrop-blur-sm bg-black/10">
                    <div class="w-1.5 h-3 rounded-full bg-[#ff3366] animate-scroll-wheel"></div>
                </div>
            </a>
        </section>

        <!-- ── WHO WE ARE SECTION ── -->
        <section id="who-we-are" class="py-24 md:py-32 relative z-10">
            <div class="container mx-auto px-6 max-w-6xl">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-center">
                    <!-- Left: Modern Badging & Interactive Highlights -->
                    <div class="lg:col-span-5 space-y-8 reveal-on-scroll reveal-left">
                        <div
                            class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-red-50/80 border border-red-100 text-[#F60000] text-xs font-bold uppercase tracking-wider backdrop-blur-sm">
                            <span class="w-2 h-2 rounded-full bg-[#F60000] animate-pulse"></span>
                            Established 2018
                        </div>
                        <h2
                            class="text-4xl md:text-5xl font-black tracking-tight text-[#1e293b] font-outfit leading-tight">
                            WHO WE ARE
                        </h2>
                        <div class="w-16 h-1.5 bg-[#F60000] rounded-full"></div>

                        <!-- Visual Spec highlights card -->
                        <div
                            class="p-8 rounded-3xl bg-white/70 border border-slate-100 shadow-[0_20px_50px_rgba(0,0,0,0.03)] backdrop-blur-md space-y-6 transform hover:scale-[1.02] transition-all duration-300">
                            
                            @foreach($aboutHighlights as $index => $highlight)
                            <div class="flex gap-5 items-start {{ $index > 0 ? 'border-t border-slate-100 pt-6' : '' }}">
                                <div
                                    class="w-12 h-12 rounded-2xl bg-red-50 flex items-center justify-center text-[#F60000] shrink-0 font-extrabold font-outfit text-lg">
                                    {{ sprintf('%02d', $index + 1) }}</div>
                                <div>
                                    <h4
                                        class="font-extrabold text-slate-800 text-sm font-outfit uppercase tracking-wider">
                                        {{ $highlight->title }}</h4>
                                    <p class="text-xs text-slate-500 mt-1 leading-relaxed">{{ $highlight->description }}</p>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>

                    <!-- Right: Content Narrative & Blockquote -->
                    <div class="lg:col-span-7 space-y-8 reveal-on-scroll reveal-right delay-200">
                        <p class="text-lg md:text-xl text-slate-600 leading-relaxed font-light">
                            {!! str_replace("'Improving Quality of Life through responsible application of technology and services in Marine & Riverine operation'", "<strong class=\"font-semibold text-slate-800\">'Improving Quality of Life through responsible application of technology and services in Marine & Riverine operation'</strong>", $settings['about_mission_paragraph'] ?? '') !!}
                        </p>
                        <p class="text-slate-600 leading-relaxed font-light text-base md:text-lg">
                            {!! $settings['about_vision_paragraph'] ?? '' !!}
                        </p>

                        <!-- High-End blockquote callout -->
                        <div
                            class="p-8 md:p-10 rounded-3xl bg-white/80 border-l-8 border-[#F60000] shadow-[0_25px_60px_-15px_rgba(246,0,0,0.07)] border border-slate-100/80 backdrop-blur-md relative overflow-hidden transform hover:-translate-y-1 transition-all duration-300">
                            <span
                                class="text-7xl text-[#F60000]/10 font-serif leading-none absolute -top-2 left-4 pointer-events-none">&ldquo;</span>
                            <blockquote
                                class="text-base md:text-lg text-slate-700 italic font-medium leading-relaxed relative z-10 pl-6">
                                {!! $settings['about_quote'] ?? '' !!}
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ── MITSUBISHI ENGINE TECHNOLOGY SECTION ── -->
        <section class="py-24 md:py-32 bg-slate-50/60 relative border-t border-b border-slate-100 z-10">
            <!-- Subtle Grid Background -->
            <div class="absolute inset-0 tech-grid-pattern opacity-[0.3] pointer-events-none"></div>

            <div class="container mx-auto px-6 max-w-6xl relative z-10">
                <div class="text-center max-w-3xl mx-auto mb-20 space-y-4 reveal-on-scroll">
                    <span class="text-xs font-bold tracking-[0.25em] text-[#F60000] uppercase">Authorized
                        Distributor</span>
                    <h2 class="text-3xl md:text-5xl font-black tracking-tight text-[#1e293b] font-outfit">
                        MITSUBISHI HEAVY INDUSTRIES PARTNERSHIP
                    </h2>
                    <p class="text-slate-500 font-light text-sm md:text-lg">
                        Bringing world-class durability, power, and efficiency to Bangladesh's maritime corridors.
                    </p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-center">
                    <!-- Left: Partnership Details -->
                    <div class="lg:col-span-7 space-y-6 reveal-on-scroll reveal-left">
                        <p class="text-slate-600 leading-relaxed font-light text-base md:text-lg">
                            {!! $settings['about_partnership_paragraph_1'] ?? '' !!}
                        </p>
                        <p class="text-slate-600 leading-relaxed font-light">
                            {!! $settings['about_partnership_paragraph_2'] ?? '' !!}
                        </p>
                        <p class="text-slate-600 leading-relaxed font-light">
                            {!! $settings['about_partnership_paragraph_3'] ?? '' !!}
                        </p>
                    </div>

                    <!-- Right: Technical Specification & Dynamic HUD Gauges -->
                    <div class="lg:col-span-5 space-y-8 reveal-on-scroll reveal-right delay-200">
                        <!-- Key spec cards grid -->
                        <div class="grid grid-cols-2 gap-5">
                            <div
                                class="p-6 rounded-3xl bg-white border border-slate-100 shadow-sm text-center transform hover:scale-[1.03] transition-all duration-300">
                                <span
                                    class="text-xs font-bold text-slate-400 block mb-1 uppercase tracking-wider">Output
                                    Range</span>
                                <span class="text-xl md:text-2xl font-black text-slate-800 font-outfit">{{ $settings['about_output_range'] ?? '106 - 3850 kW' }}</span>
                            </div>
                            <div
                                class="p-6 rounded-3xl bg-white border border-slate-100 shadow-sm text-center transform hover:scale-[1.03] transition-all duration-300">
                                <span class="text-xs font-bold text-slate-400 block mb-1 uppercase tracking-wider">Duty
                                    Rating</span>
                                <span
                                    class="text-xl md:text-2xl font-black text-[#F60000] font-outfit">{{ $settings['about_duty_rating'] ?? 'Unrestricted' }}</span>
                            </div>
                        </div>

                        <!-- Technical highlights panel with Animated Gauges -->
                        <div class="p-8 rounded-3xl bg-white border border-slate-100 shadow-sm space-y-6">
                            <h4
                                class="font-extrabold text-slate-800 text-sm uppercase tracking-wider font-outfit border-b border-slate-100 pb-3">
                                Performance Diagnostics</h4>

                            <!-- Gauge 1 -->
                            <div class="space-y-2">
                                <div class="flex justify-between text-xs font-bold text-slate-600">
                                    <span>Engine Durability</span>
                                    <span class="text-[#F60000]">{{ $settings['about_durability_value'] ?? 98 }}% (Premium)</span>
                                </div>
                                <div class="w-full h-2 rounded-full bg-slate-100 overflow-hidden">
                                    <div class="h-full bg-gradient-to-r from-red-500 to-rose-600 rounded-full gauge-bar-fill"
                                        style="--target-width: {{ $settings['about_durability_value'] ?? 98 }}%;"></div>
                                </div>
                            </div>

                            <!-- Gauge 2 -->
                            <div class="space-y-2">
                                <div class="flex justify-between text-xs font-bold text-slate-600">
                                    <span>Fuel Efficiency</span>
                                    <span class="text-[#F60000]">{{ $settings['about_efficiency_value'] ?? 94 }}% (High Efficiency)</span>
                                </div>
                                <div class="w-full h-2 rounded-full bg-slate-100 overflow-hidden">
                                    <div class="h-full bg-gradient-to-r from-red-500 to-rose-600 rounded-full gauge-bar-fill"
                                        style="--target-width: {{ $settings['about_efficiency_value'] ?? 94 }}%;"></div>
                                </div>
                            </div>

                            <!-- Gauge 3 -->
                            <div class="space-y-2">
                                <div class="flex justify-between text-xs font-bold text-slate-600">
                                    <span>Lubricant Economy</span>
                                    <span class="text-[#F60000]">{{ $settings['about_economy_value'] ?? 96 }}% (Low Consumption)</span>
                                </div>
                                <div class="w-full h-2 rounded-full bg-slate-100 overflow-hidden">
                                    <div class="h-full bg-gradient-to-r from-red-500 to-rose-600 rounded-full gauge-bar-fill"
                                        style="--target-width: {{ $settings['about_economy_value'] ?? 96 }}%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Extra narrative block -->
                <div
                    class="mt-16 p-8 md:p-10 rounded-3xl bg-white border border-slate-100 shadow-[0_15px_40px_rgba(0,0,0,0.02)] max-w-4xl mx-auto reveal-on-scroll">
                    <p class="text-slate-600 leading-relaxed font-light text-center text-sm md:text-base">
                        {!! $settings['about_conclusion_paragraph'] ?? '' !!}
                    </p>
                </div>

                <!-- Dynamic Authorized Partnerships Section (White Theme) -->
                @if(isset($partners) && $partners->count() > 0)
                <div class="mt-24 pt-16 border-t border-slate-200/60 flex flex-col items-center justify-center gap-8 reveal-on-scroll">
                    <span class="text-[11px] font-bold tracking-[0.3em] text-[#F60000] uppercase">Authorized Partnership</span>
                    
                    @foreach($partners as $partner)
                    <div class="relative w-full max-w-4xl overflow-hidden rounded-3xl bg-white/90 border border-slate-100 p-8 md:p-12 shadow-[0_25px_60px_-15px_rgba(0,0,0,0.05)] backdrop-blur-md hover:shadow-[0_30px_70px_rgba(246,0,0,0.06)] hover:border-red-100 transition-all duration-500 transform hover:scale-[1.01]">
                        <!-- Futuristic Background Grid & Ambient Soft Glows -->
                        <div class="absolute inset-0 tech-grid-pattern opacity-[0.05] pointer-events-none"></div>
                        <div class="absolute top-1/2 left-1/4 -translate-y-1/2 w-48 h-48 rounded-full bg-emerald-500/5 filter blur-3xl pointer-events-none"></div>
                        <div class="absolute top-1/2 right-1/4 -translate-y-1/2 w-48 h-48 rounded-full bg-red-500/5 filter blur-3xl pointer-events-none"></div>

                        <!-- Card Header details -->
                        <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-8">
                            
                            <!-- Left Partner: ACI Marine -->
                            <div class="flex flex-col items-center md:items-start text-center md:text-left space-y-3 w-full md:w-1/3">
                                <div class="p-4 bg-slate-50/50 rounded-2xl border border-slate-100 flex items-center justify-center h-20 w-44 hover:bg-white hover:shadow-[0_8px_20px_rgba(0,0,0,0.02)] transition-all duration-300">
                                    <img src="{{ asset('image/logo_white_bg.png') }}" class="h-10 w-auto object-contain" alt="ACI Marine">
                                </div>
                                <div>
                                    <h4 class="font-extrabold text-slate-800 text-sm font-outfit uppercase tracking-wider">ACI Marine</h4>
                                    <p class="text-[11px] text-slate-500 mt-0.5 uppercase tracking-wider font-light">Local Execution & Support</p>
                                </div>
                            </div>

                            <!-- Middle Connector (SVG Flow Line + Badge) -->
                            <div class="flex flex-col items-center justify-center w-full md:w-1/3 shrink-0">
                                <!-- Connection Line -->
                                <div class="hidden md:flex items-center justify-center w-full mb-2 relative">
                                    <div class="h-0.5 w-full bg-gradient-to-r from-emerald-200 via-slate-200 to-red-200"></div>
                                    <div class="absolute w-2 h-2 rounded-full bg-emerald-400 animate-ping left-1/4"></div>
                                    <div class="absolute w-2 h-2 rounded-full bg-red-400 animate-ping right-1/4"></div>
                                </div>
                                
                                <span class="py-2 px-5 text-[9px] md:text-[10px] font-black uppercase tracking-[0.18em] text-[#F60000] bg-red-50 rounded-full border border-red-100 shadow-[0_4px_15px_rgba(246,0,0,0.05)]">
                                    {{ $partner->badge_text }}
                                </span>
                                
                                @if($partner->estd_year)
                                <p class="text-[10px] text-slate-400 mt-2 text-center uppercase tracking-widest font-mono">{{ $partner->estd_year }}</p>
                                @endif
                            </div>

                            <!-- Right Partner: Dynamic Partner -->
                            <div class="flex flex-col items-center md:items-end text-center md:text-right space-y-3 w-full md:w-1/3">
                                <div class="p-4 bg-slate-50/50 rounded-2xl border border-slate-100 flex items-center justify-center h-20 w-44 hover:bg-white hover:shadow-[0_8px_20px_rgba(0,0,0,0.02)] transition-all duration-300">
                                    @if($partner->partner_url)
                                    <a href="{{ $partner->partner_url }}" target="_blank" class="flex items-center justify-center h-full w-full">
                                        <img src="{{ $partner->logoUrl() }}" class="h-10 w-auto object-contain" alt="{{ $partner->name }}">
                                    </a>
                                    @else
                                    <img src="{{ $partner->logoUrl() }}" class="h-10 w-auto object-contain" alt="{{ $partner->name }}">
                                    @endif
                                </div>
                                <div>
                                    <h4 class="font-extrabold text-slate-800 text-sm font-outfit uppercase tracking-wider">{{ $partner->name }}</h4>
                                    @if($partner->role_subtitle)
                                    <p class="text-[11px] text-slate-500 mt-0.5 uppercase tracking-wider font-light">{{ $partner->role_subtitle }}</p>
                                    @endif
                                </div>
                            </div>
                            
                        </div>

                        <!-- Card Footer relationship narrative -->
                        @if($partner->description)
                        <div class="relative z-10 mt-8 pt-6 border-t border-slate-100 text-center">
                            <p class="text-xs text-slate-500 font-light max-w-2xl mx-auto leading-relaxed">
                                {{ $partner->description }}
                            </p>
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </section>
    </main>

    <!--
      ==========================================================================
      FOOTER SECTION
      Includes ACI Marine company contact details, structured navigation links for desktop
      and expander/accordion-based links for mobile devices, and copyright details.
      ==========================================================================
    -->
@endsection
