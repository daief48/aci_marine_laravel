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

        <!-- Reference Projects Carousel Section -->
        <section style="margin-top: 118px;" class="py-16 bg-[#080b0f] border-b border-white/5 relative z-20">
            <div class="container max-w-7xl mx-auto px-6 md:px-16">
                <div class="text-center mb-12">
                    <div class="flex items-center justify-center gap-3 mb-3">
                        <span class="text-[#F60000] font-black text-xs uppercase tracking-[0.25em] inline-block">
                            {{ $settings['projects_page_subtitle'] ?? 'Reference Projects' }}
                        </span>
                        <span
                            class="bg-[#F60000]/10 text-[#ff4d4d] border border-[#F60000]/20 font-mono text-[9px] px-2 py-0.5 rounded font-black tracking-widest uppercase">[
                            ref_count: {{ count($projects) }} ]</span>
                    </div>
                    <h2 class="text-3xl md:text-5xl font-black text-white font-['Outfit'] mb-4 tracking-tight">
                        {{ $settings['projects_page_title'] ?? 'Successful Track Records' }}
                    </h2>
                    <p class="text-white/50 text-sm md:text-base max-w-2xl mx-auto">
                        {{ $settings['projects_page_description'] ?? 'Showcase of our high-performance marine projects. Click any project card below to explore its technical details.' }}
                    </p>
                </div>

                <!-- Project Category Filter Tabs -->
                <div id="aciProjectFilters" class="flex justify-center mb-10">
                    <div class="aci-filter-container">
                        <button class="aci-filter-tab active" data-project-filter="all">All Projects <span
                                class="aci-filter-count">{{ count($projects) }}</span></button>
                        @foreach($projectCategories as $cat)
                        <button class="aci-filter-tab" data-project-filter="{{ $cat }}">{{ $cat }} <span
                                class="aci-filter-count">{{ $projects->where('project_category', $cat)->count() }}</span></button>
                        @endforeach
                    </div>
                </div>

                <!-- Carousel Cards Wrapper (Grid layout for 4 cards) -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 items-stretch justify-center">
                    @foreach($projects as $index => $project)
                    <!-- Project Card: {{ $project->title }} -->
                    <div onclick="window.location.href='{{ route('projects.show', $project->slug) }}'" id="carousel-card-{{ $project->slug }}"
                        data-project-category="{{ $project->project_category }}"
                        class="project-carousel-card {{ $index === 0 ? 'active' : '' }} group relative overflow-hidden rounded-3xl border border-white/10 bg-[#0d1218] p-6 cursor-pointer transition-all duration-500 hover:border-[#F60000]/40 flex flex-col justify-between w-full">
                        <div class="absolute inset-0 bg-cover bg-center opacity-70 transition-transform duration-700 group-hover:scale-105"
                            style="background-image: url('{{ asset($project->hero_bg) }}');"></div>
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0d1218]/90 via-[#0d1218]/50 to-transparent">
                        </div>

                        <!-- HUD Floating Tech Tags -->
                        <div
                            class="absolute top-6 right-6 flex items-center gap-2 z-10 text-[9px] font-mono text-white/40 uppercase tracking-widest bg-white/5 border border-white/10 rounded px-2.5 py-1">
                            <span>[ {{ strtoupper(explode(' ', $project->classification ?? '')[0] ?? '') }} CLASS ]</span>
                        </div>

                        <div class="relative z-10 flex flex-col h-full justify-between">
                            <div>
                                <span
                                    class="project-status-badge {{ $index === 0 ? '' : 'hidden' }} bg-[#F60000] text-white text-[10px] font-black uppercase tracking-widest px-3 py-1 rounded-full inline-block mb-4 shadow-lg shadow-[#F60000]/25">Active</span>
                                <span
                                    class="text-[#27a844] text-[9px] font-black uppercase tracking-widest px-2.5 py-1 rounded-full border border-[#27a844]/30 bg-[#27a844]/10 inline-block mb-4 ml-2">{{ $project->project_category }}</span>
                                <h3
                                    class="text-xl md:text-2xl font-black text-white group-hover:text-[#ff4d4d] transition-colors leading-snug">
                                    {{ $project->title }}</h3>
                                <p class="text-white text-xs mt-2 font-medium">Client: {{ $project->client }}</p>
                            </div>
                            <div class="mt-8 pt-4 border-t border-white/5 flex justify-between items-center">
                                <div>
                                    <p class="text-[9px] text-white uppercase tracking-wider font-semibold">Supplied
                                        Items</p>
                                    <p class="text-xs font-bold text-white">{{ $project->engine_model }}</p>
                                </div>
                                <span
                                    class="w-10 h-10 rounded-full border border-white flex items-center justify-center text-white transition-all duration-300">
                                    <svg class="w-4 h-4 transform group-hover:translate-x-0.5 transition-transform"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

    </main>

    @section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Filter project cards by category
            const projFilters = document.querySelectorAll('#aciProjectFilters .aci-filter-tab');
            projFilters.forEach(btn => {
                btn.addEventListener('click', () => {
                    projFilters.forEach(b => b.classList.remove('active'));
                    btn.classList.add('active');
                    const filter = btn.getAttribute('data-project-filter');

                    document.querySelectorAll('.project-carousel-card').forEach(card => {
                        const cat = card.getAttribute('data-project-category');
                        if (filter === 'all' || cat === filter) {
                            card.style.display = 'flex';
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
                });
            });
        });
    </script>
    @endsection
@endsection
