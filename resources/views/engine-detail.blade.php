@extends('layouts.app')
@section('body_class', 'bg-slate-50/30 font-sans antialiased text-slate-800 selection:bg-red-500 selection:text-white min-h-screen footer-light')

@section('content')
<style>

        :root {
            --brand-red: #F60000;
            --brand-green: #27a844;
        }

        .active-feature-tab {
            background-color: rgba(246, 0, 0, 0.05) !important;
            color: #F60000 !important;
            border-left: 4px solid #F60000 !important;
            font-weight: 700 !important;
            box-shadow: 0 4px 12px rgba(246, 0, 0, 0.02) !important;
        }

        .active-detail-tab {
            border-bottom: 3px solid #F60000 !important;
            color: #F60000 !important;
            font-weight: 700 !important;
        }

        #benefitsList {
            list-style: none !important;
            padding-left: 0 !important;
        }

        #benefitsList li {
            position: relative !important;
            padding-left: 1.75rem !important;
            margin-bottom: 0.75rem !important;
            color: #475569 !important;
            font-size: 0.875rem !important;
            line-height: 1.5 !important;
        }

        #benefitsList li::before {
            content: "" !important;
            position: absolute !important;
            left: 0 !important;
            top: 0.25rem !important;
            width: 1.125rem !important;
            height: 1.125rem !important;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='%2327a844'%3E%3Cpath fill-rule='evenodd' d='M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z' clip-rule='evenodd'/%3E%3C/svg%3E") !important;
            background-size: contain !important;
            background-repeat: no-repeat !important;
        }

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
                transform: translateY(24px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .animate-fade-in-down {
            animation: fadeInDown 1s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        .animate-fade-in-up {
            animation: fadeInUp 1s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        .animate-fade-in-left {
            animation: fadeInLeft 1s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        .animate-fade-in-right {
            animation: fadeInRight 1s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        /* Scroll Reveal Styles */
        .scroll-reveal {
            opacity: 0;
            transform: translateY(35px);
            transition: opacity 0.9s cubic-bezier(0.16, 1, 0.3, 1), transform 0.9s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: transform, opacity;
        }

        .scroll-reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        /* Customize input focusing for search and quote modal */
        .premium-input:focus {
            border-color: #F60000 !important;
            box-shadow: 0 0 0 4px rgba(246, 0, 0, 0.1) !important;
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
    <main style="padding: 5rem 0 5rem; margin-top: 5rem;">
        <div style="max-width: 1280px; margin: 0 auto; padding: 0 2.25rem;">

            <!-- Engine Title Header -->
            <div class="mb-12 border-b border-slate-200/60 pb-8 relative animate-fade-in-up">
                <!-- Breadcrumb -->
                <nav style="display:flex; align-items:center; gap:8px; font-size:0.78rem; color:#94a3b8; margin-bottom:1rem;">
                    <a href="/" style="color:#94a3b8; text-decoration:none; transition:color 0.2s;" onmouseover="this.style.color='#1e293b'" onmouseout="this.style.color='#94a3b8'">Home</a>
                    <span>›</span>
                    <a href="{{ route('products.show', $thumble->id) }}" style="color:#94a3b8; text-decoration:none; transition:color 0.2s;" onmouseover="this.style.color='#1e293b'" onmouseout="this.style.color='#94a3b8'">{{ $thumble->title }}</a>
                    <span>›</span>
                    <span style="color:#1e293b; font-weight:600;">{{ $product->name }}</span>
                </nav>
                <div class="flex flex-wrap items-center gap-2 mb-3">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold tracking-widest text-[#F60000] bg-red-50 border border-red-100/80 uppercase">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#F60000] animate-pulse"></span>
                        {{ $thumble->tag }}
                    </span>
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold tracking-widest text-emerald-700 bg-emerald-50 border border-emerald-100/80 uppercase">
                        ACI Marine
                    </span>
                </div>
                <h1 id="engineTitle"
                    class="text-3xl md:text-5xl lg:text-6xl font-black text-slate-900 font-outfit uppercase tracking-tight leading-none bg-gradient-to-r from-slate-950 via-slate-900 to-slate-700 bg-clip-text text-transparent">
                    {{ $product->name }}
                </h1>
                <p class="text-slate-500 mt-4 text-sm md:text-base max-w-3xl font-light leading-relaxed">
                    Part of the <strong>{{ $thumble->title }}</strong> category.
                    {{ $thumble->subtitle ?? 'Explore specifications and request a quote.' }}
                </p>
            </div>

            <!-- Grid Layout -->
            <!-- Main Grid: Sidebar (3/12) + Content (9/12) -->
            <div id="engineDetailGrid" style="display:grid; grid-template-columns: 280px 1fr; gap:2.5rem; align-items:start;">
                <style>
                    @media (max-width: 1024px) {
                        #engineDetailGrid { grid-template-columns: 1fr !important; }
                    }
                </style>

                <!-- Left Sidebar: Features List -->
                <!-- LEFT SIDEBAR -->
                <div style="background:rgba(255,255,255,0.85); backdrop-filter:blur(12px); border:1px solid rgba(226,232,240,0.5); border-radius:1.5rem; padding:1.5rem; box-shadow:0 1px 3px rgba(0,0,0,0.04); position:sticky; top:7rem; transition:box-shadow 0.3s ease; animation:fadeInLeft 1s cubic-bezier(0.16,1,0.3,1) forwards;">
                    <h2
                        class="text-xs font-black uppercase tracking-widest text-slate-400 border-b border-slate-100 pb-3 mb-4 flex items-center gap-2">
                        <span class="w-1.5 h-3 bg-red-600 rounded-full"></span>
                        Features
                    </h2>
                    <div class="flex flex-col gap-1.5" id="featuresMenu">
                        @if(is_array($product->features) && count($product->features) > 0)
                            @foreach($product->features as $key => $feature)
                                <button onclick="switchFeature('{{ $key }}')" id="feat-{{ $key }}"
                                    class="w-full text-left px-4 py-3 rounded-xl text-sm font-semibold text-slate-600 hover:text-[#F60000] hover:bg-slate-50 transition-all duration-300 flex items-center justify-between group">
                                    <span>{{ $feature['title'] ?? $key }}</span>
                                    <svg class="w-4 h-4 opacity-0 -translate-x-2 group-hover:opacity-100 group-hover:translate-x-0 transition-all text-[#F60000] shrink-0"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </button>
                            @endforeach
                        @endif
                    </div>
                </div>

                <!-- Right Side: Content Area -->
                <!-- RIGHT CONTENT AREA -->
                <div style="display:flex; flex-direction:column; gap:2rem;">

                    <!-- Engine Image and Feature Details -->
                    <!-- Engine Image + Feature Detail Card -->
                    <div id="engineImgFeatureGrid" style="display:grid; grid-template-columns:1fr 1fr; gap:2rem; align-items:center; background:rgba(255,255,255,0.85); backdrop-filter:blur(12px); border:1px solid rgba(226,232,240,0.5); border-radius:1.5rem; padding:2rem; box-shadow:0 1px 3px rgba(0,0,0,0.04); position:relative; overflow:hidden; animation:fadeInRight 1s cubic-bezier(0.16,1,0.3,1) forwards;">
                        <style>
                            @media (max-width: 768px) { #engineImgFeatureGrid { grid-template-columns: 1fr !important; } }
                        </style>
                        <!-- Red glow behind top right corner -->
                        <div
                            class="absolute -right-12 -top-12 w-48 h-48 bg-red-100/20 rounded-full blur-[80px] pointer-events-none">
                        </div>

                        <div
                            class="flex justify-center p-6 bg-gradient-to-br from-slate-50/80 to-white border border-slate-100 rounded-2xl group shadow-inner relative overflow-hidden">
                            <img id="engineImg" src="{{ $product->imageUrl() }}"
                                class="max-h-[260px] object-contain transform group-hover:scale-102 transition-transform duration-500 drop-shadow-[0_10px_25px_rgba(0,0,0,0.06)]"
                                alt="{{ $product->name }}">
                        </div>
                        <div class="space-y-4" id="featureTextContainer">
                            <h3 class="text-xs font-bold text-[#F60000] uppercase tracking-widest flex items-center gap-1.5"
                                id="featureSub">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#F60000]"></span>
                                Feature Details
                            </h3>
                            <h2 class="text-2xl md:text-3xl font-black text-slate-900 font-outfit uppercase tracking-tight"
                                id="featureTitle">
                                Feature Title
                            </h2>
                            <p class="text-slate-500 text-sm md:text-base leading-relaxed font-light" id="featureDesc">
                                Feature Description
                            </p>
                        </div>
                    </div>

                    <!-- General Info Section -->
                    <div
                        class="bg-white/80 backdrop-blur-md border border-slate-200/50 rounded-3xl p-6 md:p-8 shadow-sm hover:shadow-md transition-all duration-500 space-y-6 scroll-reveal">
                        <div>
                            <h2
                                class="text-lg md:text-xl font-extrabold text-slate-900 uppercase tracking-tight font-outfit flex items-center gap-2 mb-3">
                                <span class="w-1 h-5 bg-[#F60000] rounded-full"></span>
                                General Information
                            </h2>
                            <p id="generalInfoText"
                                class="text-slate-500 text-sm md:text-base leading-relaxed font-light">
                                {{ $product->name }} is part of the {{ $thumble->title }} category offered by ACI Marine.
                                @if($thumble->subtitle) {{ $thumble->subtitle }} @endif
                                Contact our team for full technical specifications and availability.
                            </p>
                        </div>
                        <!-- Benefits + Applications Grid -->
                        <div id="benefitsAppsGrid" style="display:grid; grid-template-columns:1fr 1fr; gap:2rem; padding-top:1.5rem; border-top:1px solid rgba(226,232,240,0.6);">
                            <style>
                                @media (max-width: 768px) { #benefitsAppsGrid { grid-template-columns: 1fr !important; } }
                            </style>
                            <div>
                                <h3
                                    class="text-sm font-bold text-slate-900 uppercase tracking-wider flex items-center gap-2 mb-3">
                                    <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Key Benefits
                                </h3>
                                <ul id="benefitsList" class="space-y-2">
                                </ul>
                            </div>
                            <div>
                                <h3
                                    class="text-sm font-bold text-slate-900 uppercase tracking-wider flex items-center gap-2 mb-3">
                                    <svg class="w-5 h-5 text-rose-600 shrink-0" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                    Applications
                                </h3>
                                <p id="applicationsText" class="text-sm text-slate-500 leading-relaxed font-light">
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Tabs Section: Specifications, Ratings, Documentation -->
                    <div
                        class="bg-white/80 backdrop-blur-md border border-slate-200/50 rounded-3xl p-6 md:p-8 shadow-sm hover:shadow-md transition-all duration-500 scroll-reveal">
                        <div class="flex border-b border-slate-200/60 mb-8 overflow-x-auto scrollbar-none">
                            <button onclick="switchTab('specs')" id="tab-specs"
                                class="px-6 py-3.5 text-xs font-bold tracking-wider text-slate-400 border-b-2 border-transparent hover:text-slate-900 transition-all whitespace-nowrap uppercase font-outfit">
                                SPECIFICATIONS
                            </button>
                            <button onclick="switchTab('ratings')" id="tab-ratings"
                                class="px-6 py-3.5 text-xs font-bold tracking-wider text-slate-400 border-b-2 border-transparent hover:text-slate-900 transition-all whitespace-nowrap uppercase font-outfit">
                                RATINGS
                            </button>
                            <button onclick="switchTab('docs')" id="tab-docs"
                                class="px-6 py-3.5 text-xs font-bold tracking-wider text-slate-400 border-b-2 border-transparent hover:text-slate-900 transition-all whitespace-nowrap uppercase font-outfit">
                                DOCUMENTATION
                            </button>
                        </div>

                        <!-- Tab Content: Specifications -->
                        <div id="content-specs" class="tab-content hidden">
                            <h3
                                class="text-base font-extrabold text-slate-900 uppercase tracking-tight font-outfit flex items-center gap-2 mb-6">
                                <span class="w-1.5 h-4 bg-[#F60000] rounded-full"></span>
                                Technical Specifications
                            </h3>
                            <div class="border border-slate-200/60 rounded-2xl overflow-hidden shadow-sm bg-white/50">
                                <table class="w-full text-left border-collapse text-sm">
                                    <tbody id="specsTableBody" class="divide-y divide-slate-100">
                                        <!-- Spec rows loaded dynamically -->
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Tab Content: Ratings -->
                        <div id="content-ratings" class="tab-content hidden space-y-4">
                            <h3
                                class="text-base font-extrabold text-slate-900 uppercase tracking-tight font-outfit flex items-center gap-2 mb-4">
                                <span class="w-1.5 h-4 bg-[#F60000] rounded-full"></span>
                                Ratings Information
                            </h3>
                            <p id="ratingsText"
                                class="text-slate-600 text-sm md:text-base leading-relaxed font-light p-5 bg-slate-50/50 border border-slate-100 rounded-2xl shadow-inner">
                                Ratings content...
                            </p>
                        </div>

                        <!-- Tab Content: Documentation -->
                        <div id="content-docs" class="tab-content hidden space-y-4">
                            <h3
                                class="text-base font-extrabold text-slate-900 uppercase tracking-tight font-outfit flex items-center gap-2 mb-4">
                                <span class="w-1.5 h-4 bg-[#F60000] rounded-full"></span>
                                Documentation & Manuals
                            </h3>
                            <div
                                class="flex items-start gap-4 p-5 bg-slate-50/50 border border-slate-100 rounded-2xl shadow-inner">
                                <svg class="w-8 h-8 text-rose-500 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <div>
                                    <p id="docsText"
                                        class="text-slate-600 text-sm md:text-base leading-relaxed font-light">
                                        Documentation manuals content...
                                    </p>
                                    <span
                                        class="text-xs font-semibold text-[#F60000] mt-1.5 block hover:underline cursor-pointer">Request
                                        Printed Version →</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bottom CTA / Logo -->
                    <div class="flex flex-col items-center justify-center pt-8 space-y-6 scroll-reveal">
                        <button onclick="openQuoteRequest()"
                            class="px-8 py-4.5 bg-gradient-to-r from-[#F60000] to-[#e00000] hover:from-[#e00000] hover:to-[#c00000] text-white font-bold text-sm uppercase tracking-wider rounded-2xl shadow-xl shadow-red-500/10 hover:shadow-red-500/20 transition-all duration-300 transform hover:-translate-y-0.5">
                            Request a Quote
                        </button>

                        <div
                            class="flex flex-col items-center pt-8 border-t border-slate-200/50 mt-8 w-full max-w-md mx-auto">
                            <img src="/image/mitsubishi.png"
                                class="h-10 object-contain mb-3 filter grayscale hover:grayscale-0 transition-all duration-300"
                                alt="Mitsubishi Logo">
                            <span
                                class="text-xs font-mono font-bold tracking-widest text-slate-400 uppercase">Mitsubishi
                                Marine Engine</span>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </main>

    <!-- Quote Modal -->
    <div id="quoteModal"
        class="fixed inset-0 bg-slate-950/60 backdrop-blur-md hidden items-center justify-center p-4" style="z-index:100000">
        <div
            class="bg-white border border-slate-100 rounded-3xl max-w-lg w-full p-8 shadow-2xl relative animate-modal-enter">
            <button onclick="closeQuoteRequest()"
                class="absolute top-4 right-4 text-slate-400 hover:text-slate-900 text-2xl font-light">×</button>
            <h3 class="text-xl font-black font-outfit uppercase tracking-tight text-slate-900 mb-2">Request a Quote</h3>
            <p class="text-xs text-slate-500 mb-6">Fill in the form below and our team will get in touch with you
                shortly.</p>
            <form onsubmit="submitQuote(event)" class="space-y-4">
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">Engine
                        Model</label>
                    <input type="text" id="quoteEngineModel" readonly
                        class="w-full bg-slate-100/80 border border-slate-200 rounded-xl px-4 py-3 text-sm text-slate-900 focus:outline-none transition-all duration-300">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">Your
                        Name</label>
                    <input type="text" required placeholder="John Doe"
                        class="w-full bg-slate-50/50 border border-slate-200 rounded-xl px-4 py-3 text-sm text-slate-900 focus:outline-none transition-all duration-300 premium-input">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">Your
                        Email</label>
                    <input type="email" required placeholder="john@example.com"
                        class="w-full bg-slate-50/50 border border-slate-200 rounded-xl px-4 py-3 text-sm text-slate-900 focus:outline-none transition-all duration-300 premium-input">
                </div>
                <div>
                    <label
                        class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">Quantity</label>
                    <input type="number" min="1" value="1" required
                        class="w-full bg-slate-50/50 border border-slate-200 rounded-xl px-4 py-3 text-sm text-slate-900 focus:outline-none transition-all duration-300 premium-input">
                </div>
                <button type="submit"
                    class="w-full py-4 bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 text-white font-bold text-xs uppercase tracking-widest rounded-xl shadow-lg shadow-emerald-500/10 hover:shadow-emerald-500/20 hover:-translate-y-0.5 transition-all duration-300">
                    Submit Request
                </button>
            </form>
        </div>
    </div>

    <!-- Footer Section -->

<script>
// Dropdown menu toggle
        function toggleHeaderMenu(e) {
            e.preventDefault();
            const menu = document.getElementById('dropDownMenu');
            menu.classList.toggle('visible');
        }

        // Dynamic Engine Database from PHP
        const productData = @json($product);
        const fallbackEngine = {
            title: productData.name || "Marine Engine",
            generalInfo: productData.general_info || "The " + (productData.name || "engine") + " marine engine is part of our premium line of high-performance propulsion systems.",
            benefits: productData.benefits || [],
            applications: productData.applications || "Propulsion for commercial workboats, fishing vessels, and passenger ferries.",
            features: productData.features || {},
            specs: productData.specs || {},
            ratings: productData.ratings || "Custom rating config based on application.",
            docs: productData.docs || "Documentation and technical files are available upon request."
        };

        // Controller State
        let activeEngine = null;
        let activeFeatureKey = 'ucd';
        let activeTabKey = 'specs';

        // Initialize Page
        function initPage() {
            activeEngine = fallbackEngine;

            // Render details
            document.getElementById('engineTitle').innerText = activeEngine.title;
            document.getElementById('generalInfoText').innerText = activeEngine.generalInfo;
            document.getElementById('applicationsText').innerText = activeEngine.applications;

            // Render benefits
            const benefitsList = document.getElementById('benefitsList');
            benefitsList.innerHTML = '';
            if (Array.isArray(activeEngine.benefits)) {
                activeEngine.benefits.forEach(b => {
                    const li = document.createElement('li');
                    li.innerText = b;
                    benefitsList.appendChild(li);
                });
            }

            // Render specs table
            const specsBody = document.getElementById('specsTableBody');
            specsBody.innerHTML = '';
            let toggleBg = false;
            
            if (activeEngine.specs) {
                // Determine if specs is an array of objects [{key: '...', val: '...'}] or a flat object map {key: 'val'}
                let specsToRender = [];
                if (Array.isArray(activeEngine.specs)) {
                    specsToRender = activeEngine.specs;
                } else if (typeof activeEngine.specs === 'object') {
                    for (const [k, v] of Object.entries(activeEngine.specs)) {
                        specsToRender.push({key: k, val: v});
                    }
                }

                specsToRender.forEach(spec => {
                    const row = document.createElement('tr');
                    if (toggleBg) row.className = "bg-slate-50";
                    toggleBg = !toggleBg;

                    const specKey = spec.key || '';
                    const specVal = spec.val || '';

                    row.innerHTML = `
                        <td class="px-6 py-4 font-bold text-slate-900 w-1/3">${specKey}</td>
                        <td class="px-6 py-4 text-slate-500">${specVal}</td>
                    `;
                    specsBody.appendChild(row);
                });
            }

            // Render tabs text
            document.getElementById('ratingsText').innerText = activeEngine.ratings;
            document.getElementById('docsText').innerText = activeEngine.docs;

            // Set initial state
            // If features exist, pick the first key, else hide feature sections
            if (activeEngine.features && Object.keys(activeEngine.features).length > 0) {
                const firstFeatureKey = Object.keys(activeEngine.features)[0];
                switchFeature(firstFeatureKey);
            } else {
                // hide the features section if none exist
                const leftSidebar = document.querySelector('#featuresMenu')?.parentElement;
                if(leftSidebar) leftSidebar.style.display = 'none';
                const featureTextContainer = document.getElementById('featureTextContainer');
                if(featureTextContainer) featureTextContainer.style.display = 'none';
                const featureDetailCard = document.getElementById('engineImgFeatureGrid');
                if(featureDetailCard) featureDetailCard.style.gridTemplateColumns = '1fr';
                const engineGrid = document.getElementById('engineDetailGrid');
                if(engineGrid) engineGrid.style.gridTemplateColumns = '1fr';
            }
            switchTab('specs');
        }

        // Feature Switcher
        function switchFeature(key) {
            activeFeatureKey = key;
            const feature = activeEngine.features[key];

            const subtitleEl = document.getElementById('featureSub');
            const titleEl = document.getElementById('featureTitle');
            const descEl = document.getElementById('featureDesc');

            // Apply fade transition
            [subtitleEl, titleEl, descEl].forEach(el => {
                if (el) {
                    el.style.opacity = '0';
                    el.style.transform = 'translateY(8px)';
                    el.style.transition = 'opacity 0.2s cubic-bezier(0.16, 1, 0.3, 1), transform 0.2s cubic-bezier(0.16, 1, 0.3, 1)';
                }
            });

            setTimeout(() => {
                // Update DOM text
                if (titleEl) titleEl.innerText = feature.title;
                if (descEl) descEl.innerText = feature.desc;

                // Restore opacity and slide up
                [subtitleEl, titleEl, descEl].forEach(el => {
                    if (el) {
                        el.style.opacity = '1';
                        el.style.transform = 'translateY(0)';
                    }
                });
            }, 180);

            // Toggle active menu class
            const menuButtons = document.querySelectorAll('#featuresMenu button');
            menuButtons.forEach(btn => btn.classList.remove('active-feature-tab'));

            const activeBtn = document.getElementById(`feat-${key}`);
            if (activeBtn) activeBtn.classList.add('active-feature-tab');
        }

        // Tab Switcher
        function switchTab(key) {
            activeTabKey = key;

            // Toggle active tab style
            const tabButtons = document.querySelectorAll('button[id^="tab-"]');
            tabButtons.forEach(btn => btn.classList.remove('active-detail-tab'));
            document.getElementById(`tab-${key}`).classList.add('active-detail-tab');

            // Toggle content visibility with transition
            const contentDivs = document.querySelectorAll('.tab-content');
            contentDivs.forEach(div => {
                div.classList.add('hidden');
                div.style.opacity = '0';
                div.style.transform = 'translateY(10px)';
                div.style.transition = 'opacity 0.35s cubic-bezier(0.16, 1, 0.3, 1), transform 0.35s cubic-bezier(0.16, 1, 0.3, 1)';
            });

            const activeDiv = document.getElementById(`content-${key}`);
            if (activeDiv) {
                activeDiv.classList.remove('hidden');
                // Force layout reflow
                activeDiv.offsetHeight;
                setTimeout(() => {
                    activeDiv.style.opacity = '1';
                    activeDiv.style.transform = 'translateY(0)';
                }, 20);
            }
        }

        // Quote Request Modal
        function openQuoteRequest() {
            document.getElementById('quoteEngineModel').value = "{{ $product->name }}";
            document.getElementById('quoteModal').classList.remove('hidden');
            document.getElementById('quoteModal').classList.add('flex');
        }

        function closeQuoteRequest() {
            document.getElementById('quoteModal').classList.add('hidden');
            document.getElementById('quoteModal').classList.remove('flex');
        }

        function submitQuote(e) {
            e.preventDefault();
            alert('Quote Request submitted successfully! We will contact you soon.');
            closeQuoteRequest();
        }

        // Intersection Observer for scroll reveal animations
        document.addEventListener('DOMContentLoaded', () => {
            const observerOptions = {
                root: null,
                rootMargin: '0px 0px -60px 0px',
                threshold: 0.05
            };

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('active');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.scroll-reveal').forEach(el => observer.observe(el));
        });

        // Run
        window.addEventListener('DOMContentLoaded', initPage);
</script>
@endsection
