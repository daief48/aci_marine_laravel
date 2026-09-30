@extends('layouts.app')
@section('body_class', 'home header-negative footer-light')

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
                transform: translate(20px, -20px) scale(1.1);
            }
        }
    </style>

    <main class="main bg-[#f8fafc] text-[#1e293b] overflow-hidden">
        <!-- Floating Ambient Glow Orbs -->
        <div
            class="absolute top-1/4 left-1/4 w-[500px] h-[500px] rounded-full bg-[#F60000] floating-orb pointer-events-none">
        </div>
        <div class="absolute bottom-1/3 right-1/4 w-[600px] h-[600px] rounded-full bg-blue-600 floating-orb pointer-events-none"
            style="animation-delay: -5s;"></div>

        <!-- Hero Section -->
        <section id="project-detail-hero"
            class="relative h-[75vh] md:h-[90vh] w-full flex items-end justify-start overflow-hidden border-b border-white/5">
            <!-- Tech Grid Overlay -->
            <div class="absolute inset-0 tech-grid-pattern z-0 opacity-70"></div>
            <!-- Background Image with Ken Burns animation -->
            <div id="detail-hero-bg"
                class="absolute inset-0 bg-cover bg-center transition-transform duration-1000 transform scale-100 animate-ken-burns z-0"
                style="background-image: url('project/survey_vessel.png');"></div>

            <!-- Dark Overlay Gradients -->
            <div class="absolute inset-0 bg-gradient-to-t from-[#06090d] via-[#06090d]/60 to-transparent z-0"></div>
            <div class="absolute inset-0 bg-black/40 z-0"></div>

            <!-- HUD Border Overlay -->
            <div
                class="absolute bottom-8 left-8 right-8 top-8 border border-white/[0.03] pointer-events-none z-10 hidden lg:block">
                <div class="absolute top-0 left-0 w-6 h-6 border-t border-l border-[#F60000]/60"></div>
                <div class="absolute top-0 right-0 w-6 h-6 border-t border-r border-[#F60000]/60"></div>
                <div class="absolute bottom-0 left-0 w-6 h-6 border-b border-l border-[#F60000]/60"></div>
                <div class="absolute bottom-0 right-0 w-6 h-6 border-b border-r border-[#F60000]/60"></div>
            </div>

            <!-- Hero Content -->
            <div class="container relative z-10 px-6 md:px-16 pb-16 md:pb-28 max-w-7xl mx-auto w-full">
                <div class="flex items-center gap-3 mb-5">
                    <span class="pulse-dot w-2 h-2 rounded-full bg-[#F60000]"></span>
                    <span id="detail-hero-badge"
                        class="inline-block bg-white/[0.04] backdrop-blur-md text-[#ff4d4d] border border-white/10 font-bold text-xs uppercase tracking-widest px-4 py-1.5 rounded-full shadow-lg">
                        Vessel Type: Survey Vessel
                    </span>
                </div>

                <h1 id="detail-hero-title"
                    class="text-4xl md:text-6xl lg:text-8xl font-black text-white leading-tight font-['Outfit'] mb-8 max-w-6xl tracking-tight">
                    Supply of Mitsubishi Marine Engine and Gearbox for Survey Vessel of Payra Port
                </h1>

                <!-- Quick Info Cards -->
                <div class="flex flex-wrap gap-4 items-center">
                    <div
                        class="flex items-center gap-3 bg-[#0a0f14]/80 border border-white/10 rounded-2xl px-6 py-4 backdrop-blur-lg transition-all duration-300 hover:border-[#F60000]/40">
                        <svg class="w-5 h-5 text-[#ff4d4d]" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                        <div>
                            <p class="text-[9px] text-white/40 uppercase tracking-widest font-semibold">Client / Partner
                            </p>
                            <p id="detail-hero-client" class="text-sm font-bold text-white">Khulna Shipyard Ltd.</p>
                        </div>
                    </div>

                    <div
                        class="flex items-center gap-3 bg-[#0a0f14]/80 border border-white/10 rounded-2xl px-6 py-4 backdrop-blur-lg transition-all duration-300 hover:border-[#F60000]/40">
                        <svg class="w-5 h-5 text-[#ff4d4d]" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        <div>
                            <p class="text-[9px] text-white/40 uppercase tracking-widest font-semibold">End Owner</p>
                            <p id="detail-hero-owner" class="text-sm font-bold text-white">Payra Port Authority</p>
                        </div>
                    </div>

                    <div
                        class="flex items-center gap-3 bg-[#0a0f14]/80 border border-white/10 rounded-2xl px-6 py-4 backdrop-blur-lg transition-all duration-300 hover:border-[#F60000]/40">
                        <svg class="w-5 h-5 text-[#ff4d4d]" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                        <div>
                            <p class="text-[9px] text-white/40 uppercase tracking-widest font-semibold">Classification
                            </p>
                            <p id="detail-hero-class" class="text-sm font-bold text-white">Bureau Veritas (BV)</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Project Overview & Tech Specifications Section -->
        <section id="project-specs-section"
            class="py-20 md:py-32 relative z-10 bg-[#06090d]/60 backdrop-blur-sm border-b border-white/5 overflow-hidden">
            <div class="container max-w-7xl mx-auto px-6 md:px-16">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-start">

                    <!-- Overview Left Column -->
                    <div class="lg:col-span-6 flex flex-col justify-center">
                        <span class="text-[#F60000] font-black text-xs uppercase tracking-[0.25em] mb-4 inline-block">
                            Project Overview
                        </span>
                        <h2 id="detail-overview-heading"
                            class="text-3xl md:text-5xl font-black text-white mb-6 font-['Outfit'] leading-tight tracking-tight">
                            Supporting Payra Port's Strategic Survey Operations
                        </h2>

                        <p id="detail-overview-text" class="text-white/80 text-base md:text-lg leading-relaxed mb-10">
                            ACI Marine &amp; Riverine Technologies Ltd. has successfully supplied and commissioned the
                            premium propulsion system package for the Payra Port Authority's state-of-the-art Survey
                            Vessel, built by Khulna Shipyard Ltd.
                        </p>

                        <!-- Interactive Milestones Timeline -->
                        <h3
                            class="text-xs font-black text-[#F60000] uppercase tracking-widest mb-6 border-l-2 border-[#F60000] pl-3">
                            Project Execution Phases</h3>
                        <div id="detail-timeline" class="timeline-container space-y-6 pl-1">

                            <!-- Timeline card 1 -->
                            <div class="timeline-card flex items-start gap-4 group">
                                <div class="timeline-dot mt-2.5 z-10 flex-shrink-0"></div>
                                <div
                                    class="bg-white/[0.01] hover:bg-white/[0.03] border border-white/5 rounded-2xl p-6 transition-all duration-300 flex-1">
                                    <h4 class="text-sm font-bold text-white flex justify-between items-center">
                                        <span>Phase 1: Factory Acceptance (FAT)</span>
                                        <span
                                            class="text-[9px] bg-[#F60000]/10 text-[#ff4d4d] border border-[#F60000]/20 px-2 py-0.5 rounded uppercase font-bold tracking-wider">Verified</span>
                                    </h4>
                                    <p class="text-xs text-white/50 mt-2 leading-relaxed">
                                        Conducted stringent Factory Acceptance Trials at the manufacturing plant,
                                        satisfying all class rules and technical conditions.
                                    </p>
                                </div>
                            </div>

                            <!-- Timeline card 2 -->
                            <div class="timeline-card flex items-start gap-4 group">
                                <div class="timeline-dot mt-2.5 z-10 flex-shrink-0"></div>
                                <div
                                    class="bg-white/[0.01] hover:bg-white/[0.03] border border-white/5 rounded-2xl p-6 transition-all duration-300 flex-1">
                                    <h4 class="text-sm font-bold text-white flex justify-between items-center">
                                        <span>Phase 2: Installation & Alignment</span>
                                        <span
                                            class="text-[9px] bg-[#F60000]/10 text-[#ff4d4d] border border-[#F60000]/20 px-2 py-0.5 rounded uppercase font-bold tracking-wider">Completed</span>
                                    </h4>
                                    <p class="text-xs text-white/50 mt-2 leading-relaxed">
                                        Integrated the Mitsubishi S12R-T2MPTK engine and gearbox with precision coupling
                                        inside the survey vessel's hull.
                                    </p>
                                </div>
                            </div>

                            <!-- Timeline card 3 -->
                            <div class="timeline-card flex items-start gap-4 group">
                                <div class="timeline-dot mt-2.5 z-10 flex-shrink-0"></div>
                                <div
                                    class="bg-white/[0.01] hover:bg-white/[0.03] border border-white/5 rounded-2xl p-6 transition-all duration-300 flex-1">
                                    <h4 class="text-sm font-bold text-white flex justify-between items-center">
                                        <span>Phase 3: Sea Trials & Commissioning</span>
                                        <span
                                            class="text-[9px] bg-green-500/10 text-green-400 border border-green-500/20 px-2 py-0.5 rounded uppercase font-bold tracking-wider">Commissioned</span>
                                    </h4>
                                    <p class="text-xs text-white/50 mt-2 leading-relaxed">
                                        Executed high-speed maneuverability, endurance, and fuel economy tests at sea,
                                        achieving successful takeover.
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Tech Specs Card Right Column - Diagnostic Panel -->
                    <div class="lg:col-span-6 w-full">
                        <span class="text-[#F60000] font-black text-xs uppercase tracking-[0.25em] mb-4 inline-block">
                            Specification Dashboard
                        </span>
                        <h3 class="text-2xl md:text-3xl font-black text-white mb-6 font-['Outfit']">
                            Machinery Diagnostics
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                            <!-- Spec Block 1 -->
                            <div class="diag-card rounded-2xl p-5 flex flex-col justify-between">
                                <div>
                                    <span
                                        class="text-[10px] text-white/40 uppercase tracking-widest font-semibold">Propulsion
                                        Power</span>
                                    <h4 class="text-base font-extrabold text-white mt-1">Mitsubishi Engine</h4>
                                </div>
                                <div class="mt-6">
                                    <p id="detail-spec-engine-model" class="text-xs text-[#ff4d4d] font-mono font-bold">
                                        Model: S12R-T2MPTK</p>
                                    <p id="detail-spec-engine-desc" class="text-[11px] text-white/50 mt-1">1 Unit
                                        Supplied &amp; Coupled</p>
                                </div>
                            </div>

                            <!-- Spec Block 2 -->
                            <div class="diag-card rounded-2xl p-5 flex flex-col justify-between">
                                <div>
                                    <span
                                        class="text-[10px] text-white/40 uppercase tracking-widest font-semibold">Transmission
                                        Ratio</span>
                                    <h4 class="text-base font-extrabold text-white mt-1">Gearbox System</h4>
                                </div>
                                <div class="mt-6">
                                    <p id="detail-spec-gearbox-model"
                                        class="text-xs text-[#ff4d4d] font-mono font-bold">Model: WAF Series</p>
                                    <p id="detail-spec-gearbox-desc" class="text-[11px] text-white/50 mt-1">Premium
                                        Marine Gearbox</p>
                                </div>
                            </div>

                            <!-- Spec Block 3 -->
                            <div class="diag-card rounded-2xl p-5 flex flex-col justify-between">
                                <div>
                                    <span
                                        class="text-[10px] text-white/40 uppercase tracking-widest font-semibold">Quality
                                        Standard</span>
                                    <h4 class="text-base font-extrabold text-white mt-1">Classification Society</h4>
                                </div>
                                <div class="mt-6">
                                    <p id="detail-spec-class-model" class="text-xs text-[#ff4d4d] font-mono font-bold">
                                        Bureau Veritas (BV)</p>
                                    <p id="detail-spec-class-desc" class="text-[11px] text-white/50 mt-1">Full Class
                                        Certification</p>
                                </div>
                            </div>

                            <!-- Spec Block 4 -->
                            <div class="diag-card rounded-2xl p-5 flex flex-col justify-between">
                                <div>
                                    <span
                                        class="text-[10px] text-white/40 uppercase tracking-widest font-semibold">Operating
                                        Craft</span>
                                    <h4 class="text-base font-extrabold text-white mt-1">Vessel Details</h4>
                                </div>
                                <div class="mt-6">
                                    <p id="detail-spec-vessel-model" class="text-xs text-[#ff4d4d] font-mono font-bold">
                                        Survey Vessel</p>
                                    <p id="detail-spec-vessel-desc" class="text-[11px] text-white/50 mt-1">Built by
                                        Khulna Shipyard</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blueprint Section Moved Here -->
        <section class="bg-[#080b0f] pb-16 relative overflow-hidden">
            <div class="container relative z-10 px-6 md:px-16 max-w-7xl mx-auto w-full">
                <!-- Interactive Marine Blueprint Visualization -->
                <div class="blueprint-container relative border border-white/5 rounded-3xl p-6 mt-8 overflow-hidden bg-white/[0.01]"
                    style="margin-bottom: 62px;" id="sim-parent">
                    <!-- Grid overlay for technical blueprint feel -->
                    <div class="absolute inset-0 blueprint-grid pointer-events-none opacity-20"></div>

                    <div
                        class="absolute top-0 right-0 p-3 bg-white/5 text-[9px] font-mono text-white/40 border-b border-l border-white/5 z-10">
                        SYS DIAGRAM // V.03 (SIM)
                    </div>

                    <div
                        class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8 relative z-10">
                        <div>
                            <h4 class="text-xs font-bold text-white/60 uppercase tracking-wider">Propulsion
                                Shaft Line Configuration</h4>
                            <p class="text-[9px] text-white/40 mt-1 font-mono">Hover over components to view
                                diagnostics. Adjust simulation speed below.</p>
                        </div>
                        <div class="flex items-center gap-3 bg-black/40 border border-white/5 p-1.5 rounded-2xl">
                            <button
                                class="sim-speed-btn text-[9px] font-mono px-2 py-0.5 rounded transition-all bg-white/5 text-white/60 hover:text-white"
                                data-speed="slow">SLOW</button>
                            <button
                                class="sim-speed-btn text-[9px] font-mono px-2 py-0.5 rounded transition-all bg-[#F60000] text-white font-bold"
                                data-speed="normal">NORMAL</button>
                            <button
                                class="sim-speed-btn text-[9px] font-mono px-2 py-0.5 rounded transition-all bg-white/5 text-white/60 hover:text-white"
                                data-speed="max">MAX</button>
                            <button
                                class="sim-speed-btn text-[9px] font-mono px-2 py-0.5 rounded transition-all bg-white/5 text-white/60 hover:text-white"
                                data-speed="stop">STOP</button>
                        </div>
                    </div>

                    <!-- The Interactive Blueprint Layout -->
                    <div class="relative w-full overflow-x-auto pt-32 pb-8 z-10 scrollbar-thin">
                        <div class="min-w-[650px] flex items-center justify-between gap-4 relative">

                            <!-- 1. Engine Section -->
                            <div
                                class="flex flex-col items-center w-3/12 relative group pointer-events-auto cursor-help">
                                <!-- Interactive Hover Specs Card -->
                                <div
                                    class="absolute bottom-full mb-3 left-1/2 -translate-x-1/2 bg-[#0a0f14]/95 border border-[#ff4d4d]/30 text-[9px] font-mono p-3 rounded-xl shadow-2xl backdrop-blur-md opacity-0 group-hover:opacity-100 pointer-events-none transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 z-50 min-w-[170px] spec-tooltip">
                                    <div class="text-[#ff4d4d] font-bold mb-1 border-b border-white/10 pb-1">
                                        ENGINE DIAGNOSTICS</div>
                                    <div class="flex justify-between gap-4 mt-1"><span>Bore / Stroke</span><span
                                            class="text-white">170 x 180 mm</span></div>
                                    <div class="flex justify-between gap-4"><span>Lube Oil Temp</span><span
                                            class="text-white">82Â°C (OK)</span></div>
                                    <div class="flex justify-between gap-4"><span>Fuel consumption</span><span
                                            class="text-white font-mono" id="sim-hud-fuel">184 L/h</span></div>
                                    <div class="flex justify-between gap-4"><span>Core Vibration</span><span
                                            class="text-white" id="sim-hud-engine-vib">Normal</span></div>
                                </div>

                                <!-- Engine SVG Blueprint -->
                                <div class="w-full h-24 mb-2 flex items-center justify-center relative">
                                    <svg viewBox="0 0 120 70"
                                        class="w-full h-full text-white/30 group-hover:text-[#ff4d4d] transition-colors duration-500 overflow-visible">
                                        <!-- Crankcase & Sump Base Layout -->
                                        <path d="M 22,36 L 98,36 L 98,58 L 90,58 L 88,65 L 32,65 L 30,58 L 22,58 Z"
                                            fill="none" stroke="currentColor" stroke-width="1.5" stroke-dasharray="2 1">
                                        </path>

                                        <!-- 6 Cylinder Valve Covers on Top (V-type row) -->
                                        <g fill="none" stroke="currentColor" stroke-width="1">
                                            <rect x="38" y="20" width="6" height="8" rx="0.5"></rect>
                                            <rect x="46" y="20" width="6" height="8" rx="0.5"></rect>
                                            <rect x="54" y="20" width="6" height="8" rx="0.5"></rect>
                                            <rect x="62" y="20" width="6" height="8" rx="0.5"></rect>
                                            <rect x="70" y="20" width="6" height="8" rx="0.5"></rect>
                                            <rect x="78" y="20" width="6" height="8" rx="0.5"></rect>
                                        </g>

                                        <!-- Two Large Circular Air Intakes/Turbos (Left & Right) -->
                                        <circle cx="34" cy="14" r="6" fill="#080b0f" stroke="currentColor"
                                            stroke-width="1.2" class="gearbox-shaft-cover"></circle>
                                        <circle cx="34" cy="14" r="4.5" fill="none" stroke="currentColor"
                                            stroke-width="0.8" stroke-dasharray="2 1.5"></circle>
                                        <circle cx="86" cy="14" r="6" fill="#080b0f" stroke="currentColor"
                                            stroke-width="1.2" class="gearbox-shaft-cover"></circle>
                                        <circle cx="86" cy="14" r="4.5" fill="none" stroke="currentColor"
                                            stroke-width="0.8" stroke-dasharray="2 1.5"></circle>

                                        <!-- Intake Manifold Duct connecting Turbos -->
                                        <path d="M 34,14 C 44,14 44,18 60,18 C 76,18 76,14 86,14" fill="none"
                                            stroke="currentColor" stroke-width="1.5"></path>
                                        <path d="M 28,32 L 92,32" fill="none" stroke="currentColor" stroke-width="2"
                                            opacity="0.8"></path>

                                        <!-- Left Side Intercooler / Cooling Pipes -->
                                        <path d="M 12,22 L 18,22 C 22,22 24,25 24,30 L 24,40 C 24,45 20,48 12,48"
                                            fill="none" stroke="currentColor" stroke-width="1.5" opacity="0.7">
                                        </path>
                                        <path d="M 16,14 L 28,14 C 30,14 30,18 28,24" fill="none" stroke="currentColor"
                                            stroke-width="1.5" opacity="0.7"></path>

                                        <!-- Right Side Aux Housing -->
                                        <rect x="98" y="18" width="8" height="15" fill="none" stroke="currentColor"
                                            stroke-width="1.2"></rect>
                                        <path d="M 106,14 L 110,14 L 110,38 L 102,38" fill="none" stroke="currentColor"
                                            stroke-width="1.5" opacity="0.7"></path>

                                        <!-- Oil Filter Cylinders (Black) at bottom center -->
                                        <rect x="48" y="44" width="5" height="10" fill="#111518" stroke="currentColor"
                                            stroke-width="0.8" rx="0.5"></rect>
                                        <rect x="55" y="44" width="5" height="10" fill="#111518" stroke="currentColor"
                                            stroke-width="0.8" rx="0.5"></rect>

                                        <!-- Dynamic Piston Indicators inside Crankcase -->
                                        <g class="piston-group" stroke="currentColor" stroke-width="1.2">
                                            <!-- Piston 1 -->
                                            <line x1="41" y1="36" x2="41" y2="45" class="engine-piston-1">
                                            </line>
                                            <!-- Piston 2 -->
                                            <line x1="50" y1="36" x2="50" y2="45" class="engine-piston-2">
                                            </line>
                                            <!-- Piston 3 -->
                                            <line x1="59" y1="36" x2="59" y2="45" class="engine-piston-3">
                                            </line>
                                            <!-- Piston 4 -->
                                            <line x1="68" y1="36" x2="68" y2="45" class="engine-piston-2">
                                            </line>
                                            <!-- Piston 5 -->
                                            <line x1="77" y1="36" x2="77" y2="45" class="engine-piston-4">
                                            </line>
                                        </g>

                                        <!-- Crankshaft pulley rotation indicator -->
                                        <circle cx="20" cy="48" r="5" fill="none" stroke="currentColor"
                                            stroke-width="1.2" class="crank-pulley"></circle>
                                    </svg>
                                    <!-- Glow effect -->
                                    <div
                                        class="absolute inset-0 bg-[#ff4d4d]/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500 rounded-xl blur-md">
                                    </div>
                                </div>
                                <!-- Labels -->
                                <div class="text-center">
                                    <span id="detail-diag-engine-brand"
                                        class="text-[#ff4d4d] text-[11px] font-mono font-bold block tracking-wider transition-colors duration-300">MITSUBISHI</span>
                                    <span id="detail-diag-engine-model"
                                        class="text-[10px] text-white/70 block mt-0.5 transition-colors duration-300">S12R-T2MPTK</span>
                                    <span class="text-[8px] text-white/30 uppercase tracking-widest mt-1 block">Marine
                                        Engine Block</span>
                                </div>
                            </div>

                            <!-- 2. Coupling & Shaft Line -->
                            <div
                                class="flex-1 flex flex-col items-center justify-center relative px-2 group cursor-help">
                                <!-- Interactive Hover Specs Card -->
                                <div
                                    class="absolute bottom-full mb-3 left-1/2 -translate-x-1/2 bg-[#0a0f14]/95 border border-[#ff4d4d]/30 text-[9px] font-mono p-3 rounded-xl shadow-2xl backdrop-blur-md opacity-0 group-hover:opacity-100 pointer-events-none transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 z-50 min-w-[170px] spec-tooltip">
                                    <div class="text-[#ff4d4d] font-bold mb-1 border-b border-white/10 pb-1">
                                        SHAFT ALIGNMENT</div>
                                    <div class="flex justify-between gap-4 mt-1"><span>Shaft Length</span><span
                                            class="text-white">4.8 Meters</span></div>
                                    <div class="flex justify-between gap-4"><span>Diameter</span><span
                                            class="text-white">120 mm Solid</span></div>
                                    <div class="flex justify-between gap-4"><span>Torsional Stress</span><span
                                            class="text-white">Nominal</span></div>
                                    <div class="flex justify-between gap-4"><span>Radial Play</span><span
                                            class="text-white font-semibold text-green-400">&lt; 0.01 mm</span>
                                    </div>
                                </div>

                                <span class="text-[8px] text-white/40 font-mono uppercase mb-2 tracking-widest">Coupled
                                    Shaft</span>

                                <div class="w-full h-12 flex items-center justify-center relative">
                                    <!-- SVG Shaft with rotating visual details and arrow animations -->
                                    <svg viewBox="0 0 150 30" class="w-full h-full overflow-visible">
                                        <!-- Shaft center line -->
                                        <line x1="0" y1="15" x2="150" y2="15" stroke="rgba(255,255,255,0.08)"
                                            stroke-width="5" stroke-linecap="round"></line>
                                        <!-- Rotating animated dashed shaft lines -->
                                        <line x1="0" y1="15" x2="150" y2="15" stroke="#F60000" stroke-width="2.5"
                                            stroke-dasharray="8 5" class="shaft-rotation">
                                        </line>

                                        <!-- Coupling joint flange in center -->
                                        <rect x="70" y="5" width="10" height="20" rx="1" fill="#080b0f" stroke="#F60000"
                                            stroke-width="1.5" class="shaft-flange"></rect>
                                        <!-- Active sensor indicators -->
                                        <circle cx="75" cy="15" r="2.5" fill="#27a844"
                                            class="animate-ping sim-hud-ping"></circle>
                                        <circle cx="75" cy="15" r="2.5" fill="#27a844" class="sim-hud-status-dot">
                                        </circle>
                                    </svg>
                                </div>
                                <div class="text-[8px] font-mono text-[#27a844] mt-1 tracking-widest"
                                    id="sim-hud-rpm-indicator">850 RPM // ACTIVE</div>
                            </div>

                            <!-- 3. Gearbox Section -->
                            <div
                                class="flex flex-col items-center w-3/12 relative group pointer-events-auto cursor-help">
                                <!-- Interactive Hover Specs Card -->
                                <div
                                    class="absolute bottom-full mb-3 left-1/2 -translate-x-1/2 bg-[#0a0f14]/95 border border-[#ff4d4d]/30 text-[9px] font-mono p-3 rounded-xl shadow-2xl backdrop-blur-md opacity-0 group-hover:opacity-100 pointer-events-none transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 z-50 min-w-[170px] spec-tooltip">
                                    <div class="text-[#ff4d4d] font-bold mb-1 border-b border-white/10 pb-1">
                                        GEARBOX DIAGNOSTICS</div>
                                    <div class="flex justify-between gap-4 mt-1"><span>Reduction
                                            Ratio</span><span class="text-white">3.48 : 1</span></div>
                                    <div class="flex justify-between gap-4"><span>Lube Oil Temp</span><span
                                            class="text-white">65Â°C</span></div>
                                    <div class="flex justify-between gap-4"><span>Clutch Plate Wear</span><span
                                            class="text-white">0.02%</span></div>
                                    <div class="flex justify-between gap-4"><span>Oil Pressure</span><span
                                            class="text-white font-semibold text-green-400">22 Bar</span></div>
                                </div>

                                <!-- Gearbox SVG Blueprint -->
                                <div class="w-full h-24 mb-2 flex items-center justify-center relative">
                                    <svg viewBox="0 0 120 70"
                                        class="w-full h-full text-white/30 group-hover:text-[#ff4d4d] transition-colors duration-500 overflow-visible">
                                        <!-- Gearbox Main Housing Casting (Tapered shape) -->
                                        <path d="M 28,18 L 88,14 L 90,44 L 78,44 L 76,64 L 38,64 L 36,44 L 24,44 Z"
                                            fill="none" stroke="currentColor" stroke-width="1.5" stroke-dasharray="2 1">
                                        </path>

                                        <!-- Internal Gears (Light blueprint style) -->
                                        <circle cx="54" cy="28" r="12" fill="none" stroke="currentColor"
                                            stroke-width="0.8" stroke-dasharray="3 3" class="gearbox-gear-1"
                                            style="transform-origin: 54px 28px; opacity: 0.3;"></circle>
                                        <circle cx="76" cy="33" r="10" fill="none" stroke="currentColor"
                                            stroke-width="0.8" stroke-dasharray="2 2" class="gearbox-gear-2"
                                            style="transform-origin: 76px 33px; opacity: 0.3;"></circle>

                                        <!-- Bottom Center Output Shaft Cover -->
                                        <circle cx="57" cy="50" r="10" fill="#080b0f" stroke="currentColor"
                                            stroke-width="1.2" class="gearbox-shaft-cover"></circle>
                                        <circle cx="57" cy="50" r="8" fill="none" stroke="currentColor"
                                            stroke-width="0.8" stroke-dasharray="2 1.5"></circle>
                                        <circle cx="57" cy="50" r="2.5" fill="none" stroke="currentColor"
                                            stroke-width="1"></circle>

                                        <!-- Top Middle Input Shaft Cover -->
                                        <circle cx="54" cy="28" r="8" fill="#080b0f" stroke="currentColor"
                                            stroke-width="1.2" class="gearbox-shaft-cover"></circle>
                                        <circle cx="54" cy="28" r="6" fill="none" stroke="currentColor"
                                            stroke-width="0.8" stroke-dasharray="2 1.5"></circle>
                                        <circle cx="54" cy="28" r="2" fill="currentColor"></circle>

                                        <!-- Top Right Shaft / Valve Cover -->
                                        <circle cx="76" cy="33" r="8" fill="#080b0f" stroke="currentColor"
                                            stroke-width="1.2" class="gearbox-shaft-cover"></circle>
                                        <circle cx="76" cy="33" r="6" fill="none" stroke="currentColor"
                                            stroke-width="0.8" stroke-dasharray="2 1.5"></circle>

                                        <!-- External Piping / Tubes -->
                                        <path
                                            d="M 57,64 L 57,60 C 78,55 88,48 83,38 L 98,34 C 105,28 80,10 48,10 C 35,10 22,20 22,25"
                                            fill="none" stroke="currentColor" stroke-width="1.5" opacity="0.6">
                                        </path>
                                        <path d="M 45,11 L 47,8 L 54,8 L 52,11" fill="none" stroke="currentColor"
                                            stroke-width="1"></path>

                                        <!-- Auxiliary Pump Cylinders on Left (Yellowish) -->
                                        <g stroke="currentColor" stroke-width="0.8">
                                            <!-- Pump 1 -->
                                            <rect x="16" y="32" width="8" height="6" fill="#ffc107" fill-opacity="0.15"
                                                rx="0.5"></rect>
                                            <circle cx="16" cy="35" r="1.5" fill="#ffc107" fill-opacity="0.8">
                                            </circle>
                                            <!-- Pump 2 -->
                                            <rect x="16" y="40" width="8" height="6" fill="#ffc107" fill-opacity="0.15"
                                                rx="0.5"></rect>
                                            <circle cx="16" cy="43" r="1.5" fill="#ffc107" fill-opacity="0.8">
                                            </circle>
                                        </g>
                                    </svg>
                                    <!-- Glow effect -->
                                    <div
                                        class="absolute inset-0 bg-[#ff4d4d]/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500 rounded-xl blur-md">
                                    </div>
                                </div>
                                <!-- Labels -->
                                <div class="text-center">
                                    <span id="detail-diag-gearbox-brand"
                                        class="text-[#ff4d4d] text-[11px] font-mono font-bold block tracking-wider transition-colors duration-300">REINTJES
                                        / GEARBOX</span>
                                    <span id="detail-diag-gearbox-model"
                                        class="text-[10px] text-white/70 block mt-0.5 transition-colors duration-300">WAF
                                        Series</span>
                                    <span
                                        class="text-[8px] text-white/30 uppercase tracking-widest mt-1 block">Reduction
                                        Gearbox</span>
                                </div>
                            </div>

                            <!-- 4. Propeller Section -->
                            <div
                                class="flex flex-col items-center w-2/12 relative group pointer-events-auto cursor-help">
                                <!-- Interactive Hover Specs Card -->
                                <div
                                    class="absolute bottom-full mb-3 left-1/2 -translate-x-1/2 bg-[#0a0f14]/95 border border-[#ff4d4d]/30 text-[9px] font-mono p-3 rounded-xl shadow-2xl backdrop-blur-md opacity-0 group-hover:opacity-100 pointer-events-none transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 z-50 min-w-[170px] spec-tooltip">
                                    <div class="text-[#ff4d4d] font-bold mb-1 border-b border-white/10 pb-1">
                                        THRUST & SCREW</div>
                                    <div class="flex justify-between gap-4 mt-1"><span>Screw
                                            Diameter</span><span class="text-white">1600 mm</span></div>
                                    <div class="flex justify-between gap-4"><span>Blades Count</span><span
                                            class="text-white">4 Fixed Pitch</span></div>
                                    <div class="flex justify-between gap-4"><span>Cavitation Level</span><span
                                            class="text-white font-mono" id="sim-hud-cavitation">0.05%</span>
                                    </div>
                                    <div class="flex justify-between gap-4"><span>Est. Thrust</span><span
                                            class="text-white font-semibold text-green-400" id="sim-hud-thrust">82.5
                                            kN</span></div>
                                </div>

                                <!-- Propeller SVG Blueprint -->
                                <div class="w-full h-24 mb-2 flex items-center justify-center relative">
                                    <svg viewBox="0 0 100 80"
                                        class="w-full h-full text-white/30 group-hover:text-[#ff4d4d] transition-colors duration-500 overflow-visible">
                                        <!-- Hub -->
                                        <circle cx="30" cy="40" r="5" fill="currentColor"></circle>
                                        <!-- Blades rotating -->
                                        <g class="propeller-blade" style="transform-origin: 30px 40px;">
                                            <!-- Blade 1 (Top) -->
                                            <path d="M30,35 C48,32 55,18 48,8 C40,0 27,15 27,35 Z" fill="currentColor"
                                                fill-opacity="0.15" stroke="currentColor" stroke-width="1.2"></path>
                                            <!-- Blade 2 (Right) -->
                                            <path d="M30,35 C48,32 55,18 48,8 C40,0 27,15 27,35 Z"
                                                transform="rotate(90 30 40)" fill="currentColor" fill-opacity="0.15"
                                                stroke="currentColor" stroke-width="1.2">
                                            </path>
                                            <!-- Blade 3 (Bottom) -->
                                            <path d="M30,35 C48,32 55,18 48,8 C40,0 27,15 27,35 Z"
                                                transform="rotate(180 30 40)" fill="currentColor" fill-opacity="0.15"
                                                stroke="currentColor" stroke-width="1.2">
                                            </path>
                                            <!-- Blade 4 (Left) -->
                                            <path d="M30,35 C48,32 55,18 48,8 C40,0 27,15 27,35 Z"
                                                transform="rotate(270 30 40)" fill="currentColor" fill-opacity="0.15"
                                                stroke="currentColor" stroke-width="1.2">
                                            </path>
                                        </g>
                                        <!-- Floating bubble particles moving right from propeller to show thrust flow -->
                                        <g fill="rgba(39,168,68,0.5)" class="bubbles-stream">
                                            <circle cx="45" cy="35" r="1.5" class="bubble-p-1"></circle>
                                            <circle cx="55" cy="45" r="2" class="bubble-p-2"></circle>
                                            <circle cx="50" cy="38" r="1" class="bubble-p-3"></circle>
                                        </g>
                                    </svg>
                                    <!-- Glow effect -->
                                    <div
                                        class="absolute inset-0 bg-[#ff4d4d]/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500 rounded-xl blur-md">
                                    </div>
                                </div>
                                <!-- Labels -->
                                <div class="text-center">
                                    <span
                                        class="text-[#ff4d4d] text-[11px] font-mono font-bold block tracking-wider">PROPULSION</span>
                                    <span class="text-[10px] text-white/70 block mt-0.5">4-Blade Screw</span>
                                    <span class="text-[8px] text-white/30 uppercase tracking-widest mt-1 block">Screw
                                        Thrust</span>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- System specs HUD panel -->
                    <div
                        class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-6 pt-6 border-t border-white/5 font-mono text-[9px] text-white/40 relative z-10">
                        <div class="flex flex-col bg-white/[0.01] border border-white/5 p-3 rounded-xl">
                            <span class="uppercase">Transmission Efficiency</span>
                            <span class="text-xs text-[#27a844] font-bold mt-1" id="sim-hud-efficiency">98.4%</span>
                        </div>
                        <div class="flex flex-col bg-white/[0.01] border border-white/5 p-3 rounded-xl">
                            <span class="uppercase">Coupling Status</span>
                            <span class="text-xs text-green-400 font-bold mt-1" id="sim-hud-coupling-status">LOCKED /
                                ENGAGED</span>
                        </div>
                        <div class="flex flex-col bg-white/[0.01] border border-white/5 p-3 rounded-xl">
                            <span class="uppercase">Slip Ratio</span>
                            <span class="text-xs text-[#ff4d4d] font-bold mt-1" id="sim-hud-slip">0.12%
                                (NOMINAL)</span>
                        </div>
                        <div class="flex flex-col bg-white/[0.01] border border-white/5 p-3 rounded-xl">
                            <span class="uppercase">Vibration Index</span>
                            <span class="text-xs text-green-400 font-bold mt-1" id="sim-hud-vibration">0.45 mm/s
                                (EXCELLENT)</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Project Gallery Section -->
        <section class="py-20 md:py-32 bg-[#080b0f] border-t border-white/5">
            <div class="container-fluid max-w-7xl mx-auto px-6 md:px-16">

                <!-- Section Title -->
                <div class="text-center mb-16">
                    <span class="text-[#F60000] font-black text-xs uppercase tracking-[0.25em] mb-3 inline-block">
                        Project Showcase
                    </span>
                    <h2 class="text-3xl md:text-5xl font-black text-white font-['Archivo'] mb-4">
                        Commissioning &amp; Installation Gallery
                    </h2>
                    <p class="text-white/50 text-sm md:text-base max-w-2xl mx-auto">
                        Visual highlights of the machinery assembly, Factory Acceptance Trials (FAT), and final
                        commissioning of the floating crane vessel.
                    </p>
                </div>

                <!-- Gallery Filter Tabs -->
                <div id="aciGalleryFilters" class="flex justify-center mb-12">
                    <div class="aci-filter-container">
                        <button class="aci-filter-tab active" data-filter="all">All Photos <span
                                class="aci-filter-count">5</span></button>
                        <button class="aci-filter-tab" data-filter="Machinery">Machinery <span
                                class="aci-filter-count">2</span></button>
                        <button class="aci-filter-tab" data-filter="Installation">Installation <span
                                class="aci-filter-count">2</span></button>
                        <button class="aci-filter-tab" data-filter="Trials">Trials <span
                                class="aci-filter-count">1</span></button>
                    </div>
                </div>

                <!-- Gallery Grid -->
                <div id="aciGalleryGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                    <!-- Item 1: Installation -->
                    <div class="aci-gallery-item group relative overflow-hidden rounded-3xl border border-white/5 bg-[#11161d] cursor-pointer transition-all duration-500"
                        data-category="Installation">
                        <span class="aci-gallery-badge">Installation</span>
                        <div class="aci-gallery-img-wrap aspect-[4/3] w-full overflow-hidden relative">
                            <img class="aci-gallery-img" src="project/pic1.jpg" alt="Propulsion Engine Installation">
                            <div class="aci-gallery-overlay">
                                <span class="aci-gallery-category flex items-center">Installation</span>
                                <h3 class="aci-gallery-title">Propulsion Engine Installation</h3>
                                <p class="aci-gallery-desc">Precise alignment and positioning of the S6A3-T2MTK3M engine
                                    on-board the 70T Floating Crane.</p>
                                <div class="aci-gallery-action">
                                    <span>Expand View</span>
                                    <div class="aci-gallery-action-btn">
                                        <svg width="10" height="10" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="3.5">
                                            <path d="M5 12h14M12 5l7 7-7 7" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Item 2: Machinery -->
                    <div class="aci-gallery-item group relative overflow-hidden rounded-3xl border border-white/5 bg-[#11161d] cursor-pointer transition-all duration-500"
                        data-category="Machinery">
                        <span class="aci-gallery-badge">Machinery</span>
                        <div class="aci-gallery-img-wrap aspect-[4/3] w-full overflow-hidden relative">
                            <img class="aci-gallery-img" src="project/pic2.jpg" alt="Reintjes Gearbox Coupling">
                            <div class="aci-gallery-overlay">
                                <span class="aci-gallery-category flex items-center">Machinery</span>
                                <h3 class="aci-gallery-title">Reintjes Gearbox Coupling</h3>
                                <p class="aci-gallery-desc">Coupling of the premium Reintjes WAF 344L Gearbox (Ratio:
                                    2.96:1) with the main shaft.</p>
                                <div class="aci-gallery-action">
                                    <span>Expand View</span>
                                    <div class="aci-gallery-action-btn">
                                        <svg width="10" height="10" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="3.5">
                                            <path d="M5 12h14M12 5l7 7-7 7" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Item 3: Machinery -->
                    <div class="aci-gallery-item group relative overflow-hidden rounded-3xl border border-white/5 bg-[#11161d] cursor-pointer transition-all duration-500"
                        data-category="Machinery">
                        <span class="aci-gallery-badge">Machinery</span>
                        <div class="aci-gallery-img-wrap aspect-[4/3] w-full overflow-hidden relative">
                            <img class="aci-gallery-img" src="project/pic3.jpg" alt="Dual Marine Engine Setup">
                            <div class="aci-gallery-overlay">
                                <span class="aci-gallery-category flex items-center">Machinery</span>
                                <h3 class="aci-gallery-title">Dual Marine Engine Setup</h3>
                                <p class="aci-gallery-desc">Fully installed twin Mitsubishi marine propulsion package in
                                    the engine room layout.</p>
                                <div class="aci-gallery-action">
                                    <span>Expand View</span>
                                    <div class="aci-gallery-action-btn">
                                        <svg width="10" height="10" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="3.5">
                                            <path d="M5 12h14M12 5l7 7-7 7" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Item 4: Installation -->
                    <div class="aci-gallery-item group relative overflow-hidden rounded-3xl border border-white/5 bg-[#11161d] cursor-pointer transition-all duration-500"
                        data-category="Installation">
                        <span class="aci-gallery-badge">Installation</span>
                        <div class="aci-gallery-img-wrap aspect-[4/3] w-full overflow-hidden relative">
                            <img class="aci-gallery-img" src="project/pic4.jpg" alt="Factory Acceptance Trials (FAT)">
                            <div class="aci-gallery-overlay">
                                <span class="aci-gallery-category flex items-center">Installation</span>
                                <h3 class="aci-gallery-title">Factory Acceptance Trials (FAT)</h3>
                                <p class="aci-gallery-desc">Comprehensive pre-shipment tests and performance parameters
                                    inspection at the testing bay.</p>
                                <div class="aci-gallery-action">
                                    <span>Expand View</span>
                                    <div class="aci-gallery-action-btn">
                                        <svg width="10" height="10" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="3.5">
                                            <path d="M5 12h14M12 5l7 7-7 7" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Item 5: Trials -->
                    <div class="aci-gallery-item group relative overflow-hidden rounded-3xl border border-white/5 bg-[#11161d] cursor-pointer transition-all duration-500"
                        data-category="Trials">
                        <span class="aci-gallery-badge">Trials</span>
                        <div class="aci-gallery-img-wrap aspect-[4/3] w-full overflow-hidden relative">
                            <img class="aci-gallery-img" src="project/pic5.jpg" alt="Successful Sea Trials">
                            <div class="aci-gallery-overlay">
                                <span class="aci-gallery-category flex items-center">Trials</span>
                                <h3 class="aci-gallery-title">Successful Sea Trials</h3>
                                <p class="aci-gallery-desc">Full power sea and river trials executing performance and
                                    load tests prior to navy takeover.</p>
                                <div class="aci-gallery-action">
                                    <span>Expand View</span>
                                    <div class="aci-gallery-action-btn">
                                        <svg width="10" height="10" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="3.5">
                                            <path d="M5 12h14M12 5l7 7-7 7" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- Gallery Lightbox Markup -->
        <div id="aciGalleryLightbox" class="aci-lightbox">
            <div class="aci-lightbox-content">
                <button id="aciLightboxClose" class="aci-lightbox-close" aria-label="Close Lightbox">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                        stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>

                <button id="aciLightboxPrev" class="aci-lightbox-btn prev" aria-label="Previous Image">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                        stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                </button>

                <img id="aciLightboxImg" class="aci-lightbox-img" src="" alt="">

                <button id="aciLightboxNext" class="aci-lightbox-btn next" aria-label="Next Image">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                        stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </button>

                <div class="aci-lightbox-caption">
                    <h4 id="aciLightboxTitle"></h4>
                    <p id="aciLightboxDesc"></p>
                </div>
            </div>
        </div>
    
<script>
document.addEventListener('DOMContentLoaded', () => {
    switchProject('{{ $project->slug }}');
});
</script>
</main>

    <!-- Engine Data and Controller Scripts -->
    <script>
        const rawProjectsData = {!! json_encode($projects) !!};
        const projectsData = {};
        
        // Transform backend keys to match frontend expected camelCase keys
        rawProjectsData.forEach(p => {
            projectsData[p.slug] = {
                id: p.slug,
                heroBg: `{{ asset('') }}${p.hero_bg}`,
                vesselType: p.vessel_type,
                projectCategory: p.project_category,
                title: p.title,
                client: p.client,
                endOwner: p.end_owner,
                classification: p.classification,
                overviewHeading: p.overview_heading,
                overviewText: p.overview_text,
                phases: p.phases || [],
                engineModel: p.engine_model,
                engineDesc: p.engine_desc,
                gearboxModel: p.gearbox_model,
                gearboxDesc: p.gearbox_desc,
                classSociety: p.class_society,
                classDesc: p.class_desc,
                classSpecs: p.class_specs,
                vesselDetails: p.vessel_details,
                vesselDesc: p.vessel_desc,
                diagramEngine: p.diagram_engine,
                diagramEngineModel: p.diagram_engine_model,
                diagramGearbox: p.diagram_gearbox,
                diagramGearboxModel: p.diagram_gearbox_model,
                galleryTitle: p.gallery_title,
                galleryDesc: p.gallery_desc,
                simulationData: p.simulation_data,
                galleryItems: (p.gallery_items || []).map(item => ({
                    ...item,
                    img: `{{ asset('') }}${item.img}`
                }))
            };
        });

        function switchProject(projectId) {
            const data = projectsData[projectId];
            if (!data) return;

            // Update active state in carousel
            document.querySelectorAll('.project-carousel-card').forEach(card => {
                card.classList.remove('active');
                const badge = card.querySelector('.project-status-badge');
                if (badge) badge.classList.add('hidden');
            });
            const activeCard = document.getElementById(`carousel-card-${projectId}`);
            if (activeCard) {
                activeCard.classList.add('active');
                const badge = activeCard.querySelector('.project-status-badge');
                if (badge) badge.classList.remove('hidden');
            }

            // Animate dynamic elements fade out
            const targets = [
                document.getElementById('detail-hero-bg'),
                document.getElementById('detail-hero-badge'),
                document.getElementById('detail-hero-title'),
                document.getElementById('detail-hero-client'),
                document.getElementById('detail-hero-owner'),
                document.getElementById('detail-hero-class'),
                document.getElementById('detail-overview-heading'),
                document.getElementById('detail-overview-text'),
                document.getElementById('detail-timeline'),
                document.getElementById('detail-spec-engine-model'),
                document.getElementById('detail-spec-engine-desc'),
                document.getElementById('detail-spec-gearbox-model'),
                document.getElementById('detail-spec-gearbox-desc'),
                document.getElementById('detail-spec-class-model'),
                document.getElementById('detail-spec-class-desc'),
                document.getElementById('detail-spec-vessel-model'),
                document.getElementById('detail-spec-vessel-desc'),
                document.getElementById('detail-diag-engine-brand'),
                document.getElementById('detail-diag-engine-model'),
                document.getElementById('detail-diag-gearbox-brand'),
                document.getElementById('detail-diag-gearbox-model'),
                document.getElementById('detail-gallery-title'),
                document.getElementById('detail-gallery-desc')
            ];

            targets.forEach(el => {
                if (el) {
                    el.style.opacity = '0';
                    el.style.transition = 'opacity 0.3s ease';
                }
            });

            setTimeout(() => {
                // Swap Text & Attributes
                if (document.getElementById('detail-hero-bg')) {
                    document.getElementById('detail-hero-bg').style.backgroundImage = `url('${data.heroBg}')`;
                }
                if (document.getElementById('detail-hero-badge')) {
                    document.getElementById('detail-hero-badge').textContent = `Vessel Type: ${data.vesselType}`;
                }
                if (document.getElementById('detail-hero-title')) {
                    document.getElementById('detail-hero-title').textContent = data.title;
                }
                if (document.getElementById('detail-hero-client')) {
                    document.getElementById('detail-hero-client').textContent = data.client;
                }
                if (document.getElementById('detail-hero-owner')) {
                    document.getElementById('detail-hero-owner').textContent = data.endOwner;
                }
                if (document.getElementById('detail-hero-class')) {
                    document.getElementById('detail-hero-class').textContent = data.classification;
                }
                if (document.getElementById('detail-overview-heading')) {
                    document.getElementById('detail-overview-heading').textContent = data.overviewHeading;
                }
                if (document.getElementById('detail-overview-text')) {
                    document.getElementById('detail-overview-text').textContent = data.overviewText;
                }

                // Swap Timeline HTML
                const timeline = document.getElementById('detail-timeline');
                if (timeline) {
                    timeline.innerHTML = data.phases.map(p => `
                        <div class="timeline-card flex items-start gap-4 group">
                            <div class="timeline-dot mt-2.5 z-10 flex-shrink-0"></div>
                            <div class="bg-white/[0.01] hover:bg-white/[0.03] border border-white/5 rounded-2xl p-6 transition-all duration-300 flex-1">
                                <h4 class="text-sm font-bold text-white flex justify-between items-center">
                                    <span>${p.title}</span>
                                    <span class="text-[9px] ${p.statusClass} px-2 py-0.5 rounded uppercase font-bold tracking-wider">${p.status}</span>
                                </h4>
                                <p class="text-xs text-white/50 mt-2 leading-relaxed">${p.desc}</p>
                            </div>
                        </div>
                    `).join('');
                }

                // Swap Spec Dashboard Text
                if (document.getElementById('detail-spec-engine-model')) document.getElementById('detail-spec-engine-model').textContent = data.engineModel;
                if (document.getElementById('detail-spec-engine-desc')) document.getElementById('detail-spec-engine-desc').textContent = data.engineDesc;
                if (document.getElementById('detail-spec-gearbox-model')) document.getElementById('detail-spec-gearbox-model').textContent = data.gearboxModel;
                if (document.getElementById('detail-spec-gearbox-desc')) document.getElementById('detail-spec-gearbox-desc').textContent = data.gearboxDesc;
                if (document.getElementById('detail-spec-class-model')) document.getElementById('detail-spec-class-model').textContent = data.classSociety;
                if (document.getElementById('detail-spec-class-desc')) document.getElementById('detail-spec-class-desc').textContent = data.classSpecs || data.classDesc;
                if (document.getElementById('detail-spec-vessel-model')) document.getElementById('detail-spec-vessel-model').textContent = data.vesselDetails;
                if (document.getElementById('detail-spec-vessel-desc')) document.getElementById('detail-spec-vessel-desc').textContent = data.vesselDesc;

                // Swap Diagram Text
                if (document.getElementById('detail-diag-engine-brand')) document.getElementById('detail-diag-engine-brand').textContent = data.diagramEngine;
                if (document.getElementById('detail-diag-engine-model')) document.getElementById('detail-diag-engine-model').textContent = data.diagramEngineModel;
                if (document.getElementById('detail-diag-gearbox-brand')) document.getElementById('detail-diag-gearbox-brand').textContent = data.diagramGearbox;
                if (document.getElementById('detail-diag-gearbox-model')) document.getElementById('detail-diag-gearbox-model').textContent = data.diagramGearboxModel;

                // Swap Gallery Titles
                if (document.getElementById('detail-gallery-title')) document.getElementById('detail-gallery-title').textContent = data.galleryTitle;
                if (document.getElementById('detail-gallery-desc')) document.getElementById('detail-gallery-desc').textContent = data.galleryDesc;

                // Show/hide simulation parent based on project category
                const simParent = document.getElementById('sim-parent');
                if (simParent) {
                    if (data.projectCategory === "Marine Equipment") {
                        simParent.style.display = 'none';
                    } else {
                        simParent.style.display = 'block';
                        // Re-trigger active speed button to apply dynamic simulation data for this project
                        const activeSimBtn = simParent.querySelector('.sim-speed-btn.bg-\\[\\#F60000\\]');
                        if (activeSimBtn) activeSimBtn.click();
                    }
                }

                // Rebuild Gallery Filter Counts
                const categories = ['all', ...new Set(data.galleryItems.map(item => item.category))];
                const filterContainer = document.querySelector('#aciGalleryFilters .aci-filter-container');
                if (filterContainer) {
                    filterContainer.innerHTML = categories.map(cat => {
                        const count = cat === 'all' ? data.galleryItems.length : data.galleryItems.filter(item => item.category === cat).length;
                        const label = cat === 'all' ? 'All Photos' : cat;
                        const activeClass = cat === 'all' ? 'active' : '';
                        return `<button class="aci-filter-tab ${activeClass}" data-filter="${cat}">${label} <span class="aci-filter-count">${count}</span></button>`;
                    }).join('');

                    // Re-bind filter events
                    const filterBtns = filterContainer.querySelectorAll('.aci-filter-tab');
                    filterBtns.forEach(btn => {
                        btn.addEventListener('click', () => {
                            filterBtns.forEach(b => b.classList.remove('active'));
                            btn.classList.add('active');
                            const filter = btn.dataset.filter;
                            document.querySelectorAll('#aciGalleryGrid .aci-gallery-item').forEach(item => {
                                const match = filter === 'all' || item.dataset.category === filter;
                                if (match) {
                                    item.style.display = '';
                                    setTimeout(() => {
                                        item.style.opacity = '1';
                                        item.style.transform = 'translateY(0) scale(1)';
                                    }, 50);
                                } else {
                                    item.style.opacity = '0';
                                    item.style.transform = 'translateY(20px) scale(0.95)';
                                    setTimeout(() => { item.style.display = 'none'; }, 400);
                                }
                            });
                        });
                    });
                }

                // Rebuild Gallery Items Grid
                const grid = document.getElementById('aciGalleryGrid');
                if (grid) {
                    grid.innerHTML = data.galleryItems.map(item => `
                        <div class="aci-gallery-item group relative overflow-hidden rounded-3xl border border-white/5 bg-[#11161d] cursor-pointer transition-all duration-500"
                            data-category="${item.category}">
                            <span class="aci-gallery-badge">${item.category}</span>
                            <div class="aci-gallery-img-wrap aspect-[4/3] w-full overflow-hidden relative">
                                <img class="aci-gallery-img" src="${item.img}" alt="${item.title}">
                                <div class="aci-gallery-overlay">
                                    <span class="aci-gallery-category flex items-center">${item.category}</span>
                                    <h3 class="aci-gallery-title">${item.title}</h3>
                                    <p class="aci-gallery-desc">${item.desc}</p>
                                    <div class="aci-gallery-action">
                                        <span>Expand View</span>
                                        <div class="aci-gallery-action-btn">
                                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.5">
                                                <path d="M5 12h14M12 5l7 7-7 7" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `).join('');

                    // Re-bind lightbox launch events
                    const galleryItems = grid.querySelectorAll('.aci-gallery-item');
                    galleryItems.forEach(item => {
                        item.addEventListener('click', () => {
                            const vis = Array.from(galleryItems).filter(i => i.style.display !== 'none');
                            const idx = vis.indexOf(item);
                            if (idx !== -1) {
                                window.openLightbox(idx);
                            }
                        });
                    });
                }

                // Fade back in
                targets.forEach(el => {
                    if (el) {
                        el.style.opacity = '1';
                    }
                });

            }, 300);
        }

        // Export openLightbox to global scope for dynamic gallery compatibility
        window.openLightbox = null;
        document.addEventListener('DOMContentLoaded', () => {
            // Lazy load off-screen images
            document.querySelectorAll('img:not(.logo-holder img)').forEach(img => {
                img.setAttribute('loading', 'lazy');
            });

            // Find openLightbox function from IIFE and bind it
            const galleryItems = document.querySelectorAll('#aciGalleryGrid .aci-gallery-item');
            const lightbox = document.getElementById('aciGalleryLightbox');
            const lbImg = document.getElementById('aciLightboxImg');
            const lbTitle = document.getElementById('aciLightboxTitle');
            const lbDesc = document.getElementById('aciLightboxDesc');
            const lbCaption = document.querySelector('.aci-lightbox-caption');

            window.openLightbox = function (idx) {
                const vis = Array.from(document.querySelectorAll('#aciGalleryGrid .aci-gallery-item')).filter(i => i.style.display !== 'none');
                if (idx < 0 || idx >= vis.length) return;
                const item = vis[idx];
                const img = item.querySelector('.aci-gallery-img');
                const title = item.querySelector('.aci-gallery-title');
                const desc = item.querySelector('.aci-gallery-desc');

                const targetSrc = img ? img.src : '';
                const targetAlt = img ? img.alt : '';
                const targetTitle = title ? title.textContent : '';
                const targetDesc = desc ? desc.textContent : '';

                lbImg.src = targetSrc;
                lbImg.alt = targetAlt;
                lbTitle.textContent = targetTitle;
                lbDesc.textContent = targetDesc;
                lightbox.classList.add('active');
                document.body.style.overflow = 'hidden';
            };

            // --- PROPULSION SIMULATION INTERACTIVE CONTROLLER ---
            const simParent = document.getElementById('sim-parent');
            if (simParent) {
                const speedBtns = simParent.querySelectorAll('.sim-speed-btn');
                const rpmIndicator = document.getElementById('sim-hud-rpm-indicator');
                const fuelIndicator = document.getElementById('sim-hud-fuel');
                const cavitationIndicator = document.getElementById('sim-hud-cavitation');
                const thrustIndicator = document.getElementById('sim-hud-thrust');
                const efficiencyIndicator = document.getElementById('sim-hud-efficiency');
                const couplingIndicator = document.getElementById('sim-hud-coupling-status');
                const slipIndicator = document.getElementById('sim-hud-slip');
                const vibrationIndicator = document.getElementById('sim-hud-vibration');
                const engineVibration = document.getElementById('sim-hud-engine-vib');
                const statusDot = simParent.querySelector('.sim-hud-status-dot');
                const statusPing = simParent.querySelector('.sim-hud-ping');

                const defaultSpeeds = {
                    stop: {
                        rpm: "0 RPM // INACTIVE",
                        fuel: "0 L/h",
                        cavitation: "0.00%",
                        thrust: "0.0 kN",
                        efficiency: "0.0%",
                        coupling: "DISENGAGED",
                        slip: "0.00%",
                        vibration: "0.00 mm/s (STOPPED)",
                        engineVib: "Stopped",
                        statusColor: "#ef4444",
                        couplingClass: "text-red-500",
                        efficiencyClass: "text-red-500",
                        vibrationClass: "text-red-500",
                        pistonSpeed: "0s",
                        pulleySpeed: "0s",
                        shaftSpeed: "0s",
                        gearSpeed1: "0s",
                        gearSpeed2: "0s",
                        bubbleSpeed: "0s"
                    },
                    slow: {
                        rpm: "350 RPM // ACTIVE",
                        fuel: "68 L/h",
                        cavitation: "0.01%",
                        thrust: "24.2 kN",
                        efficiency: "96.2%",
                        coupling: "LOCKED / ENGAGED",
                        slip: "0.05% (LOW)",
                        vibration: "0.15 mm/s (EXCELLENT)",
                        engineVib: "Low",
                        statusColor: "#3b82f6",
                        couplingClass: "text-green-400",
                        efficiencyClass: "text-[#27a844]",
                        vibrationClass: "text-green-400",
                        pistonSpeed: "1.2s",
                        pulleySpeed: "4.5s",
                        shaftSpeed: "4.5s",
                        gearSpeed1: "15s",
                        gearSpeed2: "10s",
                        bubbleSpeed: "2.5s"
                    },
                    normal: {
                        rpm: "850 RPM // ACTIVE",
                        fuel: "184 L/h",
                        cavitation: "0.05%",
                        thrust: "82.5 kN",
                        efficiency: "98.4%",
                        coupling: "LOCKED / ENGAGED",
                        slip: "0.12% (NOMINAL)",
                        vibration: "0.45 mm/s (EXCELLENT)",
                        engineVib: "Normal",
                        statusColor: "#22c55e",
                        couplingClass: "text-green-400",
                        efficiencyClass: "text-[#27a844]",
                        vibrationClass: "text-green-400",
                        pistonSpeed: "0.5s",
                        pulleySpeed: "1.8s",
                        shaftSpeed: "1.8s",
                        gearSpeed1: "6s",
                        gearSpeed2: "4s",
                        bubbleSpeed: "1.2s"
                    },
                    max: {
                        rpm: "1650 RPM // MAX POWER",
                        fuel: "412 L/h",
                        cavitation: "0.28%",
                        thrust: "192.4 kN",
                        efficiency: "99.1%",
                        coupling: "LOCKED / ENGAGED",
                        slip: "0.28% (LOAD)",
                        vibration: "1.25 mm/s (OK)",
                        engineVib: "Elevated",
                        statusColor: "#f97316",
                        couplingClass: "text-green-400",
                        efficiencyClass: "text-[#27a844]",
                        vibrationClass: "text-orange-400",
                        pistonSpeed: "0.2s",
                        pulleySpeed: "0.7s",
                        shaftSpeed: "0.7s",
                        gearSpeed1: "2.5s",
                        gearSpeed2: "1.6s",
                        bubbleSpeed: "0.5s"
                    }
                };

                // Initialize default speed variables
                document.documentElement.style.setProperty('--sim-piston-speed', '0.5s');
                document.documentElement.style.setProperty('--sim-pulley-speed', '1.8s');
                document.documentElement.style.setProperty('--sim-shaft-speed', '1.8s');
                document.documentElement.style.setProperty('--sim-gear-speed-1', '6s');
                document.documentElement.style.setProperty('--sim-gear-speed-2', '4s');
                document.documentElement.style.setProperty('--sim-bubble-speed', '1.2s');

                speedBtns.forEach(btn => {
                    btn.addEventListener('click', () => {
                        speedBtns.forEach(b => {
                            b.classList.remove('bg-[#F60000]', 'text-white', 'font-bold');
                            b.classList.add('bg-white/5', 'text-white/60');
                        });
                        btn.classList.add('bg-[#F60000]', 'text-white', 'font-bold');
                        btn.classList.remove('bg-white/5', 'text-white/60');

                        const speedKey = btn.getAttribute('data-speed');
                        
                        // Merge default with dynamic data
                        const activeProject = Object.values(projectsData).find(p => document.getElementById(`carousel-card-${p.id}`)?.classList.contains('active'));
                        let data = { ...defaultSpeeds[speedKey] };
                        if (activeProject && activeProject.simulationData && activeProject.simulationData[speedKey]) {
                            const dynamicData = activeProject.simulationData[speedKey];
                            if (dynamicData.rpm) data.rpm = defaultSpeeds[speedKey].rpm.replace(/^\d+(\.\d+)?/, dynamicData.rpm);
                            if (dynamicData.fuel) data.fuel = defaultSpeeds[speedKey].fuel.replace(/^\d+(\.\d+)?/, dynamicData.fuel);
                            if (dynamicData.cavitation) data.cavitation = defaultSpeeds[speedKey].cavitation.replace(/^\d+(\.\d+)?/, dynamicData.cavitation);
                            if (dynamicData.thrust) data.thrust = defaultSpeeds[speedKey].thrust.replace(/^\d+(\.\d+)?/, dynamicData.thrust);
                            if (dynamicData.efficiency) data.efficiency = defaultSpeeds[speedKey].efficiency.replace(/^\d+(\.\d+)?/, dynamicData.efficiency);
                            if (dynamicData.slip) data.slip = defaultSpeeds[speedKey].slip.replace(/^\d+(\.\d+)?/, dynamicData.slip);
                            if (dynamicData.vibration) data.vibration = defaultSpeeds[speedKey].vibration.replace(/^\d+(\.\d+)?/, dynamicData.vibration);
                        }

                        if (!data) return;

                        // Update HUD UI
                        if (rpmIndicator) rpmIndicator.textContent = data.rpm;
                        if (fuelIndicator) fuelIndicator.textContent = data.fuel;
                        if (cavitationIndicator) cavitationIndicator.textContent = data.cavitation;
                        if (thrustIndicator) thrustIndicator.textContent = data.thrust;

                        if (efficiencyIndicator) {
                            efficiencyIndicator.textContent = data.efficiency;
                            efficiencyIndicator.className = `text-xs font-bold mt-1 ${data.efficiencyClass}`;
                        }
                        if (couplingIndicator) {
                            couplingIndicator.textContent = data.coupling;
                            couplingIndicator.className = `text-xs font-bold mt-1 ${data.couplingClass}`;
                        }
                        if (slipIndicator) slipIndicator.textContent = data.slip;
                        if (vibrationIndicator) {
                            vibrationIndicator.textContent = data.vibration;
                            vibrationIndicator.className = `text-xs font-bold mt-1 ${data.vibrationClass}`;
                        }
                        if (engineVibration) engineVibration.textContent = data.engineVib;

                        // Update Status Lights
                        if (statusDot) statusDot.setAttribute('fill', data.statusColor);
                        if (statusPing) {
                            statusPing.setAttribute('fill', data.statusColor);
                            if (speedKey === 'stop') {
                                statusPing.classList.add('hidden');
                            } else {
                                statusPing.classList.remove('hidden');
                            }
                        }

                        // Update CSS variables for animation speed
                        document.documentElement.style.setProperty('--sim-piston-speed', data.pistonSpeed);
                        document.documentElement.style.setProperty('--sim-pulley-speed', data.pulleySpeed);
                        document.documentElement.style.setProperty('--sim-shaft-speed', data.shaftSpeed);
                        document.documentElement.style.setProperty('--sim-gear-speed-1', data.gearSpeed1);
                        document.documentElement.style.setProperty('--sim-gear-speed-2', data.gearSpeed2);
                        document.documentElement.style.setProperty('--sim-bubble-speed', data.bubbleSpeed);
                    });
                });
            }

            // Filter project cards by category
            const projFilters = document.querySelectorAll('#aciProjectFilters .aci-filter-tab');
            projFilters.forEach(btn => {
                btn.addEventListener('click', () => {
                    projFilters.forEach(b => b.classList.remove('active'));
                    btn.classList.add('active');
                    const filter = btn.getAttribute('data-project-filter');

                    let firstVisibleCard = null;

                    document.querySelectorAll('.project-carousel-card').forEach(card => {
                        const cat = card.getAttribute('data-project-category');
                        if (filter === 'all' || cat === filter) {
                            card.style.display = 'flex';
                            if (!firstVisibleCard) firstVisibleCard = card;
                            setTimeout(() => {
                                card.style.opacity = '1';
                                card.style.transform = 'translateY(0) scale(1)';
                            }, 50);
                        } else {
                            card.style.opacity = '0';
                            card.style.transform = 'translateY(20px) scale(0.95)';
                            setTimeout(() => {
                                card.style.display = 'none';
                            }, 300);
                        }
                    });

                    // Automatically switch to the first project in the selected category
                    if (firstVisibleCard) {
                        firstVisibleCard.click();
                    }
                });
            });
        });
    </script>
@endsection
