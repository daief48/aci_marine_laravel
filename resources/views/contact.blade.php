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

    <main class="main bg-[#f8fafc] text-[#1e293b] min-h-screen overflow-hidden relative pt-32 pb-24 tech-grid-pattern">
        <!-- Ambient Background Orbs -->
        <div
            class="absolute top-1/4 left-1/10 w-[500px] h-[500px] rounded-full blur-[150px] opacity-[0.07] bg-gradient-to-tr from-rose-500 to-red-500 pointer-events-none animate-float-slow">
        </div>
        <div
            class="absolute bottom-1/4 right-1/10 w-[500px] h-[500px] rounded-full blur-[150px] opacity-[0.07] bg-gradient-to-tr from-emerald-500 to-teal-500 pointer-events-none animate-float-slow delay-300">
        </div>
        <div
            class="absolute top-2/3 left-1/3 w-[400px] h-[400px] rounded-full blur-[130px] opacity-[0.05] bg-blue-500 pointer-events-none animate-float-slow delay-500">
        </div>

        <div style="margin-top: 135px;" class="max-w-7xl mx-auto px-6 relative z-10">
            <!-- Header Section -->
            <div class="text-center mb-20 reveal-on-scroll">
                <span
                    class="text-xs font-black tracking-[0.3em] text-red-600 uppercase bg-red-50 border border-red-200/60 px-5 py-2 rounded-full inline-block mb-4 shadow-sm">
                    Reaching Our Office
                </span>
                <h1
                    class="text-4xl md:text-6xl font-black text-slate-900 tracking-tight bg-gradient-to-r from-slate-950 via-slate-800 to-red-600 bg-clip-text text-transparent">
                    Find Our Location
                </h1>
                <div
                    class="w-20 h-1.5 bg-gradient-to-r from-red-600 to-rose-500 mx-auto mt-5 rounded-full shadow-lg shadow-red-500/30">
                </div>
            </div>

            <!-- Cards Container -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-24">
                <!-- VISIT OUR OFFICE CARD -->
                <div
                    class="reveal-on-scroll bg-white/80 backdrop-blur-xl border border-slate-100/90 p-8 rounded-[2rem] shadow-xl hover:shadow-2xl hover:shadow-red-500/5 transition-all duration-500 hover:-translate-y-2.5 group flex flex-col justify-between items-center text-center">
                    <div class="flex flex-col items-center w-full">
                        <div
                            class="w-20 h-20 rounded-2xl bg-gradient-to-tr from-red-600 to-rose-500 flex items-center justify-center text-white mb-8 shadow-xl shadow-red-500/20 group-hover:scale-110 group-hover:rotate-3 transition-all duration-300 relative overflow-hidden">
                            <div
                                class="absolute inset-0 bg-white/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            </div>
                            <!-- Pin Icon -->
                            <svg class="w-9 h-9" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-black text-slate-900 mb-4 tracking-wider uppercase">Visit Our Office
                        </h3>
                        <p class="text-slate-600 leading-relaxed max-w-[240px] font-semibold text-sm">
                            {{ $settings['contact_address'] ?? 'ACI Centre 245, Tejgaon Industrial Area, Dhaka-1208, Bangladesh.' }}
                        </p>
                    </div>
                    <div class="mt-8 w-full">
                        <a href="{{ $settings['contact_map_url'] ?? 'https://maps.google.com/?q=ACI+Centre+245+Tejgaon+Industrial+Area+Dhaka' }}"
                            target="_blank"
                            class="w-full inline-flex items-center justify-center px-6 py-3.5 border-2 border-red-600/20 text-red-600 font-bold rounded-2xl hover:bg-red-600 hover:text-white hover:border-red-600 hover:shadow-lg hover:shadow-red-500/20 transition-all duration-350 gap-2 text-sm uppercase tracking-wider">
                            <span>Get Directions</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- EMAIL US CARD -->
                <div
                    class="reveal-on-scroll bg-white/80 backdrop-blur-xl border border-slate-100/90 p-8 rounded-[2rem] shadow-xl hover:shadow-2xl hover:shadow-red-500/5 transition-all duration-500 hover:-translate-y-2.5 group flex flex-col justify-between items-center text-center delay-100">
                    <div class="flex flex-col items-center w-full">
                        <div
                            class="w-20 h-20 rounded-2xl bg-gradient-to-tr from-red-600 to-rose-500 flex items-center justify-center text-white mb-8 shadow-xl shadow-red-500/20 group-hover:scale-110 group-hover:-rotate-3 transition-all duration-300 relative overflow-hidden">
                            <div
                                class="absolute inset-0 bg-white/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            </div>
                            <!-- Mail Icon -->
                            <svg class="w-9 h-9" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-black text-slate-900 mb-4 tracking-wider uppercase">Email Us</h3>
                        <p class="text-slate-600 leading-relaxed max-w-[240px] font-semibold text-sm">
                            {{ $settings['contact_email'] ?? 'acimarine@aci-bd.com' }}
                        </p>
                    </div>
                    <div class="mt-8 w-full">
                        <a href="mailto:{{ $settings['contact_email'] ?? 'acimarine@aci-bd.com' }}"
                            class="w-full inline-flex items-center justify-center px-6 py-3.5 bg-gradient-to-r from-red-600 to-rose-600 text-white font-bold rounded-2xl hover:from-red-700 hover:to-rose-700 hover:shadow-lg hover:shadow-red-500/20 transition-all duration-350 gap-2 text-sm uppercase tracking-wider">
                            <span>Send Email</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- CALL US CARD -->
                <div
                    class="reveal-on-scroll bg-white/80 backdrop-blur-xl border border-slate-100/90 p-8 rounded-[2rem] shadow-xl hover:shadow-2xl hover:shadow-red-500/5 transition-all duration-500 hover:-translate-y-2.5 group flex flex-col justify-between items-center text-center delay-200">
                    <div class="flex flex-col items-center w-full">
                        <div
                            class="w-20 h-20 rounded-2xl bg-gradient-to-tr from-red-600 to-rose-500 flex items-center justify-center text-white mb-8 shadow-xl shadow-red-500/20 group-hover:scale-110 group-hover:rotate-3 transition-all duration-300 relative overflow-hidden">
                            <div
                                class="absolute inset-0 bg-white/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            </div>
                            <!-- Phone Icon -->
                            <svg class="w-9 h-9" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-black text-slate-900 mb-4 tracking-wider uppercase">Call Us</h3>
                        <p class="text-slate-600 leading-relaxed max-w-[240px] font-semibold text-sm">
                            {{ $settings['contact_office_phone'] ?? '(+88) 01700-701761' }}<br>or {{ $settings['contact_hotline'] ?? '16533' }}
                        </p>
                    </div>
                    <div class="mt-8 w-full flex flex-col gap-2">
                        <a href="tel:{{ preg_replace('/[^0-9+]/', '', $settings['contact_office_phone'] ?? '+8801700701761') }}"
                            class="w-full inline-flex items-center justify-center px-6 py-3.5 border-2 border-red-600/20 text-red-600 font-bold rounded-2xl hover:bg-red-600 hover:text-white hover:border-red-600 transition-all duration-350 text-xs uppercase tracking-widest font-black">
                            <span>Call Office</span>
                        </a>
                        <a href="tel:{{ preg_replace('/[^0-9+]/', '', $settings['contact_hotline'] ?? '16533') }}"
                            class="w-full inline-flex items-center justify-center px-6 py-3.5 bg-slate-950 text-white font-bold rounded-2xl hover:bg-slate-900 transition-all duration-350 text-xs uppercase tracking-widest font-black shadow-md shadow-slate-950/10">
                            <span>Call Hotline</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Specific Inquiry Contacts Section -->
            <div
                class="reveal-on-scroll bg-white/90 backdrop-blur-xl border border-slate-100 p-8 md:p-12 rounded-[2rem] shadow-xl mb-24 relative overflow-hidden group">
                <div
                    class="absolute top-0 left-0 w-48 h-48 bg-gradient-to-br from-red-500/5 to-rose-500/5 rounded-full blur-3xl pointer-events-none">
                </div>
                <div class="relative z-10">
                    <div class="text-center md:text-left mb-10">
                        <span
                            class="text-xs font-black tracking-[0.2em] text-red-600 uppercase bg-red-50 border border-red-200/50 px-4 py-1.5 rounded-full inline-block mb-3">
                            Direct Department Lines
                        </span>
                        <h2 class="text-2xl md:text-3xl font-black text-slate-900 tracking-tight">
                            Specific Inquiry Contacts
                        </h2>
                        <p class="text-slate-500 mt-2 text-sm font-medium">Reach out directly to our dedicated
                            department specialists for faster service.</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <!-- Card 1: Engine & Equipment -->
                        <div
                            class="bg-slate-50/60 hover:bg-white border border-slate-100 p-6 rounded-2xl transition-all duration-300 hover:shadow-lg group/item flex flex-col justify-between">
                            <div>
                                <span
                                    class="text-[10px] font-bold tracking-widest text-slate-400 uppercase block mb-1">Propulsion
                                    & Systems</span>
                                <h4
                                    class="text-base font-black text-slate-900 mb-4 group-hover/item:text-red-600 transition-colors">
                                    Engine & Equipment</h4>
                            </div>
                            <div class="space-y-2">
                                <a href="tel:{{ preg_replace('/[^0-9+]/', '', $settings['contact_dept_propulsion_1'] ?? '+8801787687256') }}"
                                    class="flex items-center gap-2 text-slate-600 hover:text-red-600 font-bold text-sm transition-colors">
                                    <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                    <span>{{ $settings['contact_dept_propulsion_1'] ?? '+8801787687256' }}</span>
                                </a>
                                <a href="tel:{{ preg_replace('/[^0-9+]/', '', $settings['contact_dept_propulsion_2'] ?? '+8801329739299') }}"
                                    class="flex items-center gap-2 text-slate-600 hover:text-red-600 font-bold text-sm transition-colors">
                                    <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                    <span>{{ $settings['contact_dept_propulsion_2'] ?? '+8801329-739299' }}</span>
                                </a>
                            </div>
                        </div>

                        <!-- Card 2: Service-Related -->
                        <div
                            class="bg-slate-50/60 hover:bg-white border border-slate-100 p-6 rounded-2xl transition-all duration-300 hover:shadow-lg group/item flex flex-col justify-between">
                            <div>
                                <span
                                    class="text-[10px] font-bold tracking-widest text-slate-400 uppercase block mb-1">Maintenance
                                    & Support</span>
                                <h4
                                    class="text-base font-black text-slate-900 mb-4 group-hover/item:text-red-600 transition-colors">
                                    Service-Related</h4>
                            </div>
                            <div class="space-y-2">
                                <a href="tel:{{ preg_replace('/[^0-9+]/', '', $settings['contact_dept_service_1'] ?? '+8801709644103') }}"
                                    class="flex items-center gap-2 text-slate-600 hover:text-red-600 font-bold text-sm transition-colors">
                                    <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                    <span>{{ $settings['contact_dept_service_1'] ?? '+8801709-644103' }}</span>
                                </a>
                                <a href="tel:{{ preg_replace('/[^0-9+]/', '', $settings['contact_dept_service_2'] ?? '+8801329680123') }}"
                                    class="flex items-center gap-2 text-slate-600 hover:text-red-600 font-bold text-sm transition-colors">
                                    <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                    <span>{{ $settings['contact_dept_service_2'] ?? '+8801329-680123' }}</span>
                                </a>
                            </div>
                        </div>

                        <!-- Card 3: Dredger/Damen -->
                        <div
                            class="bg-slate-50/60 hover:bg-white border border-slate-100 p-6 rounded-2xl transition-all duration-300 hover:shadow-lg group/item flex flex-col justify-between">
                            <div>
                                <span
                                    class="text-[10px] font-bold tracking-widest text-slate-400 uppercase block mb-1">Vessel
                                    Construction</span>
                                <h4
                                    class="text-base font-black text-slate-900 mb-4 group-hover/item:text-red-600 transition-colors">
                                    Dredger/Damen</h4>
                            </div>
                            <div class="space-y-2">
                                <a href="tel:{{ preg_replace('/[^0-9+]/', '', $settings['contact_dept_vessel'] ?? '+8801700701761') }}"
                                    class="flex items-center gap-2 text-slate-600 hover:text-red-600 font-bold text-sm transition-colors">
                                    <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                    <span>{{ $settings['contact_dept_vessel'] ?? '+8801700701761' }}</span>
                                </a>
                            </div>
                        </div>

                        <!-- Card 4: General Inquiry -->
                        <div
                            class="bg-slate-50/60 hover:bg-white border border-slate-100 p-6 rounded-2xl transition-all duration-300 hover:shadow-lg group/item flex flex-col justify-between">
                            <div>
                                <span
                                    class="text-[10px] font-bold tracking-widest text-slate-400 uppercase block mb-1">Corporate
                                    Hotline</span>
                                <h4
                                    class="text-base font-black text-slate-900 mb-4 group-hover/item:text-red-600 transition-colors">
                                    General Inquiry</h4>
                            </div>
                            <div class="space-y-2">
                                <a href="tel:{{ preg_replace('/[^0-9+]/', '', $settings['contact_hotline'] ?? '16533') }}"
                                    class="flex items-center gap-2 text-slate-600 hover:text-red-600 font-bold text-sm transition-colors">
                                    <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                    <span>{{ $settings['contact_hotline'] ?? '16533' }} (Hotline)</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modern Form and Map Split Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-stretch mb-24 reveal-on-scroll">
                <!-- Contact Form -->
                <div
                    class="bg-white/90 backdrop-blur-xl border border-slate-100 p-8 md:p-10 rounded-[2rem] shadow-xl flex flex-col justify-between relative overflow-hidden group">
                    <div
                        class="absolute top-0 right-0 w-32 h-32 bg-red-500/5 rounded-full blur-2xl group-hover:bg-red-500/10 transition-colors duration-500 pointer-events-none">
                    </div>
                    <div>
                        <h2 class="text-2xl font-black text-slate-900 mb-2 tracking-tight flex items-center gap-2">
                            <span>Send Us a Message</span>
                            <span class="w-2.5 h-2.5 rounded-full bg-red-600 animate-ping"></span>
                        </h2>
                        <p class="text-slate-500 mb-8 text-sm font-medium">We'll get back to you within 24 business
                            hours.</p>

                        <form id="contactForm" class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="relative">
                                    <label
                                        class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Your
                                        Name</label>
                                    <div class="relative">
                                        <span
                                            class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-400 pointer-events-none">
                                            <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </span>
                                        <input type="text" required
                                            class="w-full pl-10 pr-4 py-3.5 rounded-xl border border-slate-200 focus:border-red-500 focus:ring-4 focus:ring-red-500/10 outline-none transition-all duration-300 bg-slate-50/50 hover:bg-slate-50 text-sm font-semibold"
                                            placeholder="John Doe">
                                    </div>
                                </div>
                                <div class="relative">
                                    <label
                                        class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Email
                                        Address</label>
                                    <div class="relative">
                                        <span
                                            class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-400 pointer-events-none">
                                            <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                        </span>
                                        <input type="email" required
                                            class="w-full pl-10 pr-4 py-3.5 rounded-xl border border-slate-200 focus:border-red-500 focus:ring-4 focus:ring-red-500/10 outline-none transition-all duration-300 bg-slate-50/50 hover:bg-slate-50 text-sm font-semibold"
                                            placeholder="john@example.com">
                                    </div>
                                </div>
                            </div>
                            <div class="relative">
                                <label
                                    class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Subject</label>
                                <div class="relative">
                                    <span
                                        class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-400 pointer-events-none">
                                        <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </span>
                                    <input type="text" required
                                        class="w-full pl-10 pr-4 py-3.5 rounded-xl border border-slate-200 focus:border-red-500 focus:ring-4 focus:ring-red-500/10 outline-none transition-all duration-300 bg-slate-50/50 hover:bg-slate-50 text-sm font-semibold"
                                        placeholder="How can we help you?">
                                </div>
                            </div>
                            <div class="relative">
                                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Your
                                    Message</label>
                                <textarea required rows="4"
                                    class="w-full px-4 py-3.5 rounded-xl border border-slate-200 focus:border-red-500 focus:ring-4 focus:ring-red-500/10 outline-none transition-all duration-300 bg-slate-50/50 hover:bg-slate-50 resize-none text-sm font-semibold"
                                    placeholder="Type your message here..."></textarea>
                            </div>
                            <button type="submit"
                                class="w-full py-4 bg-gradient-to-r from-red-600 to-rose-600 text-white font-bold rounded-xl hover:from-red-700 hover:to-rose-700 transition-all duration-300 shadow-lg shadow-red-500/20 hover:shadow-xl hover:shadow-red-500/30 flex items-center justify-center gap-2 group-hover:scale-[1.01] uppercase tracking-widest text-xs">
                                <span>Submit Inquiry</span>
                                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Google Maps Embed Card -->
                <div
                    class="bg-white border border-slate-100 rounded-[2rem] shadow-xl overflow-hidden min-h-[400px] lg:min-h-full relative flex flex-col group">
                    <iframe class="w-full h-full flex-grow border-0 min-h-[380px]"
                        src="{{ $settings['contact_map_url'] ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.848037320092!2d90.40243457597519!3d23.75281488868615!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7650f0c05bd%3A0x889df8b75e921a97!2sACI%20Centre!5e0!3m2!1sen!2sbd!4v1718115682855!5m2!1sen!2sbd' }}"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

            <!-- Dynamic Authorized Partnerships Section (White Theme) -->
            @if(isset($partners) && $partners->count() > 0)
            <div class="mt-16 mb-12 pt-16 border-t border-slate-200/60 flex flex-col items-center justify-center gap-8 reveal-on-scroll">
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
            @endif
            </div>
        </div>
        </div>
    </main>

    <!--
      ==========================================================================
      FOOTER SECTION
      Includes ACI Marine company contact details, structured navigation links for desktop
      and expander/accordion-based links for mobile devices, and copyright details.
      ==========================================================================
    -->
@endsection
