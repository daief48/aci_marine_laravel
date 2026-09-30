@extends('layouts.app')
@section('body_class', 'home header-negative footer-light')

@section('content')
<!-- Search Modal Overlay -->
    <div id="searchModal" class="search-modal-overlay"
        onclick="if(event.target === this) this.classList.remove('visible');">
        <div class="search-modal-card">
            <button type="button" class="search-modal-close-btn" aria-label="Close search"
                onclick="document.getElementById('searchModal').classList.remove('visible');">×</button>
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
    <main class="main">

        <section data-controller="reveal-icon-v2" class="wave-pattern-bg">
            <div class="reveal-screen-container h-screen relative flex items-center justify-center overflow-hidden">
                <!-- Glowing Spotlights -->
                <div
                    class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,rgba(39,168,68,0.04),transparent_60%)] z-0 pointer-events-none">
                </div>

                <div class="flex flex-col items-center justify-center w-full h-full z-10 relative">
                    <div class="logo-reveal-container mb-8">
                        <span data-reveal-icon-v2-target="icon" class="block opacity-0"
                            style="opacity: 0; visibility: hidden; transform: translateY(10rem) scale(0.8);">
                            <img src="image/logo_white_bg.png" alt="ACI Logo" class="relative z-10"
                                style="max-height: 90px; width: auto;">
                        </span>
                    </div>

                    <h2 style="color: gray;" data-reveal-icon-v2-target="title"
                        class="text-heading-xl text-anthracite-alpha-10 text-center w-full max-w-4xl px-4 mt-6 leading-tight">
                        <span style="opacity: 0.1;">Thrusting</span>
                        <span style="opacity: 0.1;">Your</span>
                        <span
                            style="opacity: 0.1; font-weight: 900; background: linear-gradient(135deg, #1b7430, #27a844); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Marine</span>
                        <span
                            style="opacity: 0.1; font-weight: 900; background: linear-gradient(135deg, #1b7430, #27a844); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Aspiration</span>
                        <span
                            style="opacity: 0.1; font-weight: 900; background: linear-gradient(135deg, #F60000, #ff4d4d); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Forward.</span>
                    </h2>
                </div>

                <!-- Animated SVG Waves at the bottom -->
                <div
                    class="responsive-wave-container absolute bottom-0 left-0 w-full overflow-hidden leading-none z-0 pointer-events-none">
                    <!-- Sleek Cargo Container Ship 1 (Foreground - Large, Fast) -->
                    <div class="sailing-ship sailing-ship-1 absolute bottom-[12px] z-20 w-36 h-18 pointer-events-none">
                        <svg viewBox="0 0 160 80" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-full">
                            <!-- Main Hull -->
                            <path d="M10,50 L25,68 L135,68 L145,50 Z" fill="#1b7430" opacity="0.95" />
                            <path d="M12,50 L143,50 L141,47 L14,47 Z" fill="#27a844" opacity="0.85" />
                            <path d="M25,68 L135,68 L133,64 L27,64 Z" fill="#F60000" opacity="0.9" />
                            <!-- Red keel stripe -->

                            <!-- Superstructure / Cabin (Aft) -->
                            <rect x="116" y="30" width="22" height="20" fill="#ffffff" rx="1" />
                            <rect x="120" y="16" width="16" height="14" fill="#ffffff" rx="1" />
                            <!-- Bridge Windows -->
                            <rect x="122" y="7" width="12" height="9" fill="#111518" rx="0.5" />
                            <rect x="124" y="9" width="8" height="4" fill="#6ba4ff" opacity="0.8" />
                            <!-- Portholes on Cabin -->
                            <circle cx="121" cy="36" r="1.5" fill="#111518" opacity="0.7" />
                            <circle cx="127" cy="36" r="1.5" fill="#111518" opacity="0.7" />
                            <circle cx="133" cy="36" r="1.5" fill="#111518" opacity="0.7" />

                            <!-- Funnel / smokestack -->
                            <rect x="129" y="-2" width="5" height="9" fill="#e53e3e" />
                            <rect x="129" y="-5" width="5" height="3" fill="#111518" />

                            <!-- Cargo Containers -->
                            <rect x="24" y="40" width="20" height="10" fill="#d11919" rx="0.5" stroke="#ffffff"
                                stroke-width="0.5" />
                            <rect x="24" y="30" width="20" height="10" fill="#1b365d" rx="0.5" stroke="#ffffff"
                                stroke-width="0.5" />

                            <rect x="46" y="40" width="20" height="10" fill="#1b7430" rx="0.5" stroke="#ffffff"
                                stroke-width="0.5" />
                            <rect x="46" y="30" width="20" height="10" fill="#e28743" rx="0.5" stroke="#ffffff"
                                stroke-width="0.5" />
                            <rect x="46" y="20" width="20" height="10" fill="#ffc107" rx="0.5" stroke="#ffffff"
                                stroke-width="0.5" />

                            <rect x="68" y="40" width="20" height="10" fill="#17a2b8" rx="0.5" stroke="#ffffff"
                                stroke-width="0.5" />
                            <rect x="68" y="30" width="20" height="10" fill="#d11919" rx="0.5" stroke="#ffffff"
                                stroke-width="0.5" />

                            <rect x="90" y="40" width="20" height="10" fill="#1b365d" rx="0.5" stroke="#ffffff"
                                stroke-width="0.5" />
                            <rect x="90" y="30" width="20" height="10" fill="#1b7430" rx="0.5" stroke="#ffffff"
                                stroke-width="0.5" />
                        </svg>
                    </div>

                    <div class="sailing-ship sailing-ship-2 absolute bottom-[38px] z-10 w-28 h-14 pointer-events-none">
                        <svg viewBox="0 0 160 80" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-full"
                            style="transform: scaleX(-1);">
                            <!-- Main Hull -->
                            <path d="M10,50 L25,68 L135,68 L145,50 Z" fill="#155d26" opacity="0.95" />
                            <path d="M12,50 L143,50 L141,47 L14,47 Z" fill="#1b7430" opacity="0.85" />
                            <path d="M25,68 L135,68 L133,64 L27,64 Z" fill="#e53e3e" opacity="0.9" />

                            <!-- Superstructure -->
                            <rect x="116" y="30" width="22" height="20" fill="#f8f9fa" rx="1" />
                            <rect x="120" y="16" width="16" height="14" fill="#f8f9fa" rx="1" />
                            <rect x="122" y="7" width="12" height="9" fill="#111518" rx="0.5" />

                            <!-- Funnel -->
                            <rect x="129" y="-2" width="5" height="9" fill="#1b365d" />

                            <!-- Containers -->
                            <rect x="24" y="40" width="20" height="10" fill="#ffc107" rx="0.5" stroke="#ffffff"
                                stroke-width="0.5" />
                            <rect x="46" y="40" width="20" height="10" fill="#17a2b8" rx="0.5" stroke="#ffffff"
                                stroke-width="0.5" />
                            <rect x="46" y="30" width="20" height="10" fill="#d11919" rx="0.5" stroke="#ffffff"
                                stroke-width="0.5" />
                            <rect x="68" y="40" width="20" height="10" fill="#1b365d" rx="0.5" stroke="#ffffff"
                                stroke-width="0.5" />
                            <rect x="90" y="40" width="20" height="10" fill="#e28743" rx="0.5" stroke="#ffffff"
                                stroke-width="0.5" />
                            <rect x="90" y="30" width="20" height="10" fill="#1b7430" rx="0.5" stroke="#ffffff"
                                stroke-width="0.5" />
                        </svg>
                    </div>

                    <!-- Sleek Cargo Container Ship 3 (Background - Small, Slow) -->
                    <div
                        class="sailing-ship sailing-ship-3 absolute bottom-[58px] z-0 w-22 h-11 pointer-events-none opacity-85">
                        <svg viewBox="0 0 160 80" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-full">
                            <!-- Main Hull -->
                            <path d="M10,50 L25,68 L135,68 L145,50 Z" fill="#114a1e" opacity="0.95" />
                            <path d="M12,50 L143,50 L141,47 L14,47 Z" fill="#155d26" opacity="0.85" />

                            <!-- Superstructure -->
                            <rect x="116" y="30" width="22" height="20" fill="#e9ecef" rx="1" />
                            <rect x="120" y="16" width="16" height="14" fill="#e9ecef" rx="1" />

                            <!-- Containers -->
                            <rect x="24" y="40" width="20" height="10" fill="#e28743" rx="0.5" stroke="#ffffff"
                                stroke-width="0.5" />
                            <rect x="46" y="40" width="20" height="10" fill="#d11919" rx="0.5" stroke="#ffffff"
                                stroke-width="0.5" />
                            <rect x="68" y="40" width="20" height="10" fill="#ffc107" rx="0.5" stroke="#ffffff"
                                stroke-width="0.5" />
                            <rect x="68" y="30" width="20" height="10" fill="#1b7430" rx="0.5" stroke="#ffffff"
                                stroke-width="0.5" />
                            <rect x="90" y="40" width="20" height="10" fill="#1b365d" rx="0.5" stroke="#ffffff"
                                stroke-width="0.5" />
                        </svg>
                    </div>

                    <div
                        class="sailing-ship sailing-ship-4 absolute bottom-[72px] z-[-1] w-16 h-8 pointer-events-none opacity-70">
                        <svg viewBox="0 0 160 80" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-full"
                            style="transform: scaleX(-1);">
                            <!-- Main Hull -->
                            <path d="M10,50 L25,68 L135,68 L145,50 Z" fill="#0d3a17" opacity="0.9" />

                            <!-- Superstructure -->
                            <rect x="116" y="30" width="22" height="20" fill="#dee2e6" rx="1" />

                            <!-- Containers -->
                            <rect x="46" y="40" width="20" height="10" fill="#1b365d" rx="0.5" stroke="#ffffff"
                                stroke-width="0.5" />
                            <rect x="68" y="40" width="20" height="10" fill="#d11919" rx="0.5" stroke="#ffffff"
                                stroke-width="0.5" />
                            <rect x="90" y="40" width="20" height="10" fill="#ffc107" rx="0.5" stroke="#ffffff"
                                stroke-width="0.5" />
                        </svg>
                    </div>

                    <svg class="relative block w-[200%] h-full" viewBox="0 0 1200 200" preserveAspectRatio="none"
                        style="min-width: 200%; margin-left: 0;">
                        <!-- Wave 1 (Back wave, slow) -->
                        <path
                            d="M0,100 C150,150 350,50 500,100 C650,150 850,50 1000,100 C1150,150 1350,50 1500,100 C1650,150 850,50 2000,100 L2000,200 L0,200 Z"
                            fill="rgba(39, 168, 68, 0.04)" class="animate-wave-back"></path>
                        <!-- Wave 2 (Middle wave) -->
                        <path
                            d="M0,80 C100,120 250,40 400,80 C550,120 700,40 850,80 C1000,120 1150,40 1300,80 C1450,120 1600,40 1750,80 C1900,120 2050,40 2200,80 L2200,200 L0,200 Z"
                            fill="rgba(0, 191, 165, 0.06)" class="animate-wave-mid"></path>
                        <!-- Wave 3 (Front wave, fast) -->
                        <path
                            d="M0,110 C200,160 400,60 600,110 C800,160 1000,60 1200,110 C1400,160 1600,60 1800,110 C2000,160 2200,60 2400,110 L2400,200 L0,200 Z"
                            fill="rgba(39, 168, 68, 0.08)" class="animate-wave-front"></path>
                    </svg>
                </div>
            </div>
        </section>
        @php
            $heroBgVideo = $settings['hero_background_video'] ?? 'https://player.vimeo.com/video/1201121454?autoplay=1&mute=1&background=1&loop=1';
        @endphp

        {{-- ===== HERO SECTION: ONE VIDEO + TEXT SLIDES ===== --}}
        <section class="hero_v2 hero_v2-home" id="heroSection" style="position:relative; height:100vh; overflow:hidden; display:flex; flex-direction:column;">

            {{-- Single background video (Supports uploaded local video or Vimeo/YouTube embed) --}}
            <div id="heroBgVideo" style="position:absolute; inset:0; z-index:0; pointer-events:none; overflow:hidden;">
                @php
                    $isDirectVideo = preg_match('/\.(mp4|webm|ogg)(\?.*)?$/i', $heroBgVideo) || str_starts_with($heroBgVideo, '/uploads/') || str_starts_with($heroBgVideo, 'uploads/');
                @endphp

                @if($isDirectVideo)
                    <video autoplay muted loop playsinline 
                        style="position:absolute; top:50%; left:50%; width:100%; height:100%; object-fit:cover; transform:translate(-50%,-50%);"
                        id="heroVideoFrame">
                        <source src="{{ asset(ltrim($heroBgVideo, '/')) }}" type="video/mp4">
                    </video>
                @else
                    <iframe
                        src="{{ $heroBgVideo }}"
                        frameborder="0"
                        allow="autoplay; fullscreen; picture-in-picture"
                        style="position:absolute; top:50%; left:50%; width:177.78vh; min-width:100%; min-height:100%; height:56.25vw; transform:translate(-50%,-50%); border:none;"
                        referrerpolicy="strict-origin-when-cross-origin"
                        id="heroVideoFrame">
                    </iframe>
                @endif
                {{-- Gradient overlay: dark bottom for text legibility + subtle vignette --}}
                <div style="position:absolute; inset:0; background:linear-gradient(to top, rgba(0,0,0,0.75) 0%, rgba(0,0,0,0.35) 50%, rgba(0,0,0,0.15) 100%); z-index:1;"></div>
            </div>

            {{-- Text slides stacked on top --}}
            <div id="heroTextSlider" style="position:relative; z-index:5; flex:1; display:flex; flex-direction:column; justify-content:flex-end; padding-bottom:100px;">
                @foreach($heroSlides as $index => $slide)
                <div class="hero-text-slide" data-slide-index="{{ $index }}"
                    style="position:absolute; inset:0; display:flex; align-items:flex-end; padding-bottom:100px; opacity:{{ $index === 0 ? 1 : 0 }}; transition:opacity 800ms ease; pointer-events:{{ $index === 0 ? 'auto' : 'none' }};">
                    <div class="container-fluid">
                        <div style="max-width: 780px;">

                            {{-- Animated tag / label --}}
                            @if($slide->subtitle)
                            <div style="display:inline-flex; align-items:center; gap:10px; margin-bottom:18px;">
                                <span style="display:inline-block; width:28px; height:2px; background:#F60000; border-radius:2px;"></span>
                                <span style="color:rgba(255,255,255,0.85); font-size:0.72rem; font-weight:700; letter-spacing:0.22em; text-transform:uppercase; font-family:'Outfit',sans-serif;">
                                    {{ $slide->subtitle }}
                                </span>
                            </div>
                            @endif

                            {{-- Main headline --}}
                            <h1 style="color:#ffffff; font-size:clamp(2rem, 5vw, 3.75rem); font-weight:900; line-height:1.1; letter-spacing:-0.02em; font-family:'Outfit',sans-serif; margin:0 0 24px 0; text-shadow:0 2px 20px rgba(0,0,0,0.4);">
                                {{ $slide->title }}
                            </h1>

                            {{-- CTA button --}}
                            @if($slide->link_url && $slide->link_text)
                            <a href="{{ $slide->link_url }}"
                               style="display:inline-flex; align-items:center; gap:10px; background:rgba(246,0,0,0.9); color:#fff; padding:14px 28px; border-radius:50px; font-size:0.85rem; font-weight:700; font-family:'Outfit',sans-serif; letter-spacing:0.04em; text-decoration:none; border:1px solid rgba(255,255,255,0.2); backdrop-filter:blur(8px); transition:all 0.3s ease; box-shadow:0 8px 32px rgba(246,0,0,0.35);"
                               onmouseover="this.style.background='#ffffff'; this.style.color='#0a0a0a'; this.style.boxShadow='0 8px 32px rgba(255,255,255,0.2)';"
                               onmouseout="this.style.background='rgba(246,0,0,0.9)'; this.style.color='#fff'; this.style.boxShadow='0 8px 32px rgba(246,0,0,0.35)';">
                                {{ $slide->link_text }}
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                            </a>
                            @endif

                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Bottom navigation bar --}}
          

        </section>

        {{-- Dot active state CSS --}}
        <style>
            .hero-dot-btn.hero-dot-active {
                background: #F60000 !important;
                border-color: #F60000 !important;
                color: #fff !important;
                box-shadow: 0 0 12px rgba(246,0,0,0.5);
            }
            .hero-dot-btn:hover:not(.hero-dot-active) {
                background: rgba(255,255,255,0.15) !important;
                color: #fff !important;
            }
        </style>



        {{-- ===== HERO TEXT SLIDER CONTROLLER ===== --}}
        <script>
        (function () {
            const SLIDE_MS    = 8000;  // ms per text slide
            const TRANS_MS    = 700;   // fade transition

            // Build slide data from server
            const slideData = @json($heroSlides->map(fn($s) => [
                'linkText' => $s->link_text,
                'linkUrl'  => $s->link_url,
            ])->values());

            const textSlides  = Array.from(document.querySelectorAll('.hero-text-slide'));
            const dots        = Array.from(document.querySelectorAll('[data-hero-dot]'));
            const dotIcons    = Array.from(document.querySelectorAll('.hero-dot-btn'));
            const progressBar = document.getElementById('heroProgressBar');
            const linkEl      = document.getElementById('heroSlideLink');
            const linkTextEl  = document.getElementById('heroSlideLinkText');
            const TOTAL       = textSlides.length;

            if (!TOTAL) return;

            let current   = 0;
            let timer     = null;
            let animating = false;

            function resetProgress() {
                if (!progressBar) return;
                progressBar.style.transition = 'none';
                progressBar.style.width = '0%';
                void progressBar.offsetWidth;
                progressBar.style.transition = 'width ' + SLIDE_MS + 'ms linear';
                progressBar.style.width = '100%';
            }

            function updateDots(idx) {
                dotIcons.forEach((el, i) => {
                    el.classList.toggle('hero-dot-active', i === idx);
                });
            }

            function updateLink(idx) {
                if (!linkEl || !linkTextEl) return;
                const d = slideData[idx];
                if (d) {
                    linkEl.href = d.linkUrl || '#';
                    linkTextEl.textContent = d.linkText || 'Read more about ACI Marine';
                }
            }

            function showSlide(idx) {
                if (animating) return;
                animating = true;

                // Fade out current
                textSlides[current].style.opacity = '0';
                textSlides[current].style.pointerEvents = 'none';

                current = (idx + TOTAL) % TOTAL;

                // Fade in new
                textSlides[current].style.opacity = '1';
                textSlides[current].style.pointerEvents = 'auto';

                updateDots(current);
                updateLink(current);
                resetProgress();
                restartTimer();

                setTimeout(() => { animating = false; }, TRANS_MS);
            }

            function next() { showSlide(current + 1); }

            function restartTimer() {
                clearTimeout(timer);
                timer = setTimeout(next, SLIDE_MS);
            }

            // Dot clicks
            dots.forEach(dot => {
                dot.addEventListener('click', e => {
                    e.preventDefault();
                    const idx = parseInt(dot.dataset.heroDot, 10);
                    if (idx !== current) showSlide(idx);
                });
            });

            // Keyboard
            document.addEventListener('keydown', e => {
                if (e.key === 'ArrowRight') next();
                if (e.key === 'ArrowLeft')  showSlide(current - 1);
            });

            // Swipe
            let touchX = 0;
            const section = document.getElementById('heroSection');
            if (section) {
                section.addEventListener('touchstart', e => { touchX = e.changedTouches[0].screenX; }, {passive:true});
                section.addEventListener('touchend', e => {
                    const diff = e.changedTouches[0].screenX - touchX;
                    if (Math.abs(diff) > 60) { diff < 0 ? next() : showSlide(current - 1); }
                }, {passive:true});
            }

            // Initialise
            updateDots(0);
            updateLink(0);
            resetProgress();
            restartTimer();
        })();
        </script>




        <section id="products" class="my-default" style="scroll-margin-top: 100px;">
            <div class="container-fluid">

                <div class="text-center mb-16">
                    <span class="text-[#F60000] text-xs font-bold tracking-[0.25em] uppercase block mb-3">OUR
                        PRODUCTS</span>
                    <h2 class="text-4xl md:text-5xl font-black text-[#1a1e20] tracking-tight leading-tight font-sans">
                        ACI MARINE &amp; RIVERRINE</h2>
                    <div class="flex justify-center items-center gap-2 mt-4">
                        <span class="w-20 h-[4px] bg-red-600/20"></span>
                        <span class="loader"></span>
                        <span class="w-20 h-[4px] bg-red-600/20"></span>
                    </div>
                </div>
                <div class="w-full grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($productThumbles as $index => $thumble)
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
                                    @foreach($thumble->products as $product)
                                    <li><span class="aci-list-icon">→</span><a href="{{ route('products.detail', [$thumble->id, $product->id]) }}" class="hover:text-red-500 transition-colors">{{ $product->name }}</a></li>
                                    @endforeach
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
                    @endforeach
                </div>
            </div>
        </section>

        <!-- ============================================
             DYNAMIC AUTHORIZED PARTNERSHIPS SECTION
             ============================================ -->
        @if(isset($partners) && $partners->count() > 0)
        <section id="authorized-partnerships" class="py-20 bg-slate-50/70 border-t border-slate-100 relative overflow-hidden">
            <!-- Ambient Background Glows -->
            <div class="absolute top-1/2 left-0 -translate-y-1/2 w-96 h-96 bg-red-500/5 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute top-1/2 right-0 -translate-y-1/2 w-96 h-96 bg-emerald-500/5 rounded-full blur-3xl pointer-events-none"></div>

            <div class="container-fluid max-w-7xl mx-auto px-6 relative z-10">
                <!-- Section Headings -->
                <div class="text-center mb-16">
                    <span class="text-[#F60000] text-xs font-bold tracking-[0.25em] uppercase block mb-3">Global Alliances</span>
                    <h2 class="text-4xl md:text-5xl font-black text-[#1a1e20] tracking-tight leading-tight font-sans">
                        Authorized Partnerships
                    </h2>
                    <p class="mt-3 text-slate-500 text-sm max-w-2xl mx-auto font-light leading-relaxed">
                        Forging strategic global alliances with world-leading maritime engineering pioneers to deliver unmatched technology and local support across Bangladesh.
                    </p>
                    <div class="flex justify-center items-center gap-2 mt-5">
                        <span class="w-20 h-[4px] bg-red-600/20"></span>
                        <span class="loader"></span>
                        <span class="w-20 h-[4px] bg-red-600/20"></span>
                    </div>
                </div>

                <!-- Dynamic Partners Cards Grid -->
                <div class="space-y-8 flex flex-col items-center">
                    @foreach($partners as $partner)
                    <div class="relative w-full max-w-4xl overflow-hidden rounded-3xl bg-white/95 border border-slate-200/80 p-8 md:p-12 shadow-[0_20px_50px_-10px_rgba(0,0,0,0.05)] backdrop-blur-md hover:shadow-[0_30px_70px_rgba(246,0,0,0.08)] hover:border-red-100 transition-all duration-500 transform hover:scale-[1.01] reveal-on-scroll">
                        <!-- Subtle Pattern -->
                        <div class="absolute inset-0 tech-grid-pattern opacity-[0.04] pointer-events-none"></div>

                        <!-- Card Header details -->
                        <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-8">
                            
                            <!-- Left Partner: ACI Marine -->
                            <div class="flex flex-col items-center md:items-start text-center md:text-left space-y-3 w-full md:w-1/3">
                                <div class="p-4 bg-slate-50/70 rounded-2xl border border-slate-100 flex items-center justify-center h-20 w-44 hover:bg-white hover:shadow-sm transition-all duration-300">
                                    <img src="{{ asset('image/logo_white_bg.png') }}" class="h-10 w-auto object-contain" alt="ACI Marine">
                                </div>
                                <div>
                                    <h4 class="font-extrabold text-slate-800 text-sm font-outfit uppercase tracking-wider">ACI Marine</h4>
                                    <p class="text-[11px] text-slate-500 mt-0.5 uppercase tracking-wider font-light">Local Execution & Support</p>
                                </div>
                            </div>

                            <!-- Middle Connector (Flow Line + Badge) -->
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

                            <!-- Right Partner: Dynamic Partner Logo & Brand -->
                            <div class="flex flex-col items-center md:items-end text-center md:text-right space-y-3 w-full md:w-1/3">
                                <div class="p-4 bg-slate-50/70 rounded-2xl border border-slate-100 flex items-center justify-center h-20 w-44 hover:bg-white hover:shadow-sm transition-all duration-300">
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

                        <!-- Card Footer Narrative -->
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
            </div>
        </section>
        @endif

        <!-- ============================================
             ACI CLIENTS LOGO RIBBON SECTION
             ============================================ -->
        <section id="our-clients" class="py-20 bg-white relative overflow-hidden logo-marquee-section">
            <div class="">
                <!-- Section Headings -->
                <div class="text-center mb-10 max-w-4xl mx-auto px-4">
                    <span class="text-[#F60000] text-xs font-bold tracking-[0.25em] uppercase block mb-3">{{ $settings['clients_page_subtitle'] ?? 'Valued Partners' }}</span>
                    <h2 class="text-4xl md:text-5xl font-black text-[#1a1e20] tracking-tight leading-tight font-sans">
                        {{ $settings['clients_page_title'] ?? 'Major Clients' }}</h2>
                    <p class="mt-4 text-[#495057] text-body-md font-medium leading-relaxed">
                        {{ $settings['clients_page_description'] ?? 'MarTech Shipping & Engineering has earned the confidence and trust of its valued clients through consistent performance and reliability. Our team brings extensive experience and strong professional associations with various national and international organizations. A selection of our esteemed clients includes' }}
                    </p>
                    <div class="flex justify-center items-center gap-2 mt-6">
                        <span class="w-20 h-[4px] bg-red-600/20"></span>
                        <span class="loader"></span>
                        <span class="w-20 h-[4px] bg-red-600/20"></span>
                    </div>
                </div>

                <!-- Sliding logo marquee -->
                <div class="logo-marquee-wrapper">
                    <div class="logo-marquee-track">
                        <!-- Set 1 -->
                        @foreach($clients as $client)
                        <div class="logo-marquee-item"><img src="{{ asset($client->logo_url) }}" alt="{{ $client->name }}"></div>
                        @endforeach
                        
                        <!-- Duplicate the track elements for seamless scrolling -->
                        @foreach($clients as $client)
                        <div class="logo-marquee-item"><img src="{{ asset($client->logo_url) }}" alt="{{ $client->name }}"></div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- ============================================
             ACI PREMIUM BANNER CAROUSEL (Custom Build)
             ============================================ -->
        <div class="aci-banner-slider-section" id="aciBannerSlider">
            <div class="aci-slides-container">

                <!-- Slide 1: Dynamic Years of Excellence -->
                <div class="aci-slide active"
                    style="background-image: url('{{ asset('images/slider-main/b1.jpg') }}');">
                    <div class="aci-slide-overlay"></div>
                    <div class="aci-slide-content text-center">
                        <span class="aci-slide-tag">ACI Marine &amp; Riverine</span>
                        <h2 class="aci-slide-title">{{ now()->year - 2018 }} Years of Excellence in</h2>
                        <h3 class="aci-slide-subtitle">Marine &amp; Riverine Industry</h3>
                        <div class="aci-slide-actions justify-center">
                            <a href="{{ url('products/0') }}" class="aci-slide-btn primary">Our Products</a>
                            <a href="{{ url('contact') }}" class="aci-slide-btn outline">Contact Now</a>
                        </div>
                    </div>
                </div>

                <!-- Slide 2: One Stop Solution -->
                <div class="aci-slide" style="background-image: url('{{ asset('images/slider-main/2.jpg') }}');">
                    <div class="aci-slide-overlay"></div>
                    <div class="aci-slide-content text-left">
                        <span class="aci-slide-tag">Complete Solutions</span>
                        <h2 class="aci-slide-title">One Stop Solution</h2>
                        <h3 class="aci-slide-subtitle">For all type of marine equipment needs</h3>
                        <div class="aci-slide-actions justify-start">
                            <a href="{{ url('products/0') }}" class="aci-slide-btn primary">Our Products</a>
                        </div>
                    </div>
                </div>

                <!-- Slide 3: When Service Matters -->
                <div class="aci-slide"
                    style="background-image: url('{{ asset('images/slider-main/3_copy.jpg') }}');">
                    <div class="aci-slide-overlay"></div>
                    <div class="aci-slide-content text-right">
                        <span class="aci-slide-tag">After-Sales Support</span>
                        <h2 class="aci-slide-title">When Service Matters</h2>
                        <h3 class="aci-slide-subtitle">Best after sales service is ensured</h3>
                        <div class="aci-slide-actions justify-end">
                            <a href="{{ url('products/0') }}" class="aci-slide-btn primary">Learn More</a>
                        </div>
                    </div>
                </div>

                <!-- Arrow Controls -->
                <button class="aci-slider-arrow prev" aria-label="Previous slide" onclick="aciBannerPrev()">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M15 18l-6-6 6-6" />
                    </svg>
                </button>
                <button class="aci-slider-arrow next" aria-label="Next slide" onclick="aciBannerNext()">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 18l6-6-6-6" />
                    </svg>
                </button>

                <!-- Dot Navigation -->
                <div class="aci-slider-dots" id="aciSliderDots"></div>

                <!-- Progress Bar -->
                <div class="aci-slider-progress-bar" id="aciSliderProgress"></div>
            </div>
        </div>

        <!-- ACI Banner Carousel Controller Script -->
        <script>
            (function () {
                const SLIDE_DURATION = 7000;
                const slides = document.querySelectorAll('#aciBannerSlider .aci-slide');
                const dotsContainer = document.getElementById('aciSliderDots');
                const progressBar = document.getElementById('aciSliderProgress');
                let currentIndex = 0;
                let autoTimer = null;
                let isHovered = false;

                // Build dots
                slides.forEach((_, i) => {
                    const dot = document.createElement('span');
                    dot.className = 'aci-dot' + (i === 0 ? ' active' : '');
                    dot.addEventListener('click', () => goTo(i));
                    dotsContainer.appendChild(dot);
                });

                function goTo(index) {
                    // Remove active from current
                    slides[currentIndex].classList.remove('active');
                    dotsContainer.children[currentIndex].classList.remove('active');

                    currentIndex = (index + slides.length) % slides.length;

                    // Activate new
                    slides[currentIndex].classList.add('active');
                    dotsContainer.children[currentIndex].classList.add('active');

                    // Reset progress bar
                    if (progressBar) {
                        progressBar.style.transition = 'none';
                        progressBar.style.width = '0%';
                        void progressBar.offsetWidth; // Force reflow
                        progressBar.style.transition = 'width ' + SLIDE_DURATION + 'ms linear';
                        progressBar.style.width = '100%';
                    }

                    restartAuto();
                }

                function next() { goTo(currentIndex + 1); }
                function prev() { goTo(currentIndex - 1); }

                function restartAuto() {
                    if (autoTimer) clearTimeout(autoTimer);
                    autoTimer = setTimeout(() => {
                        if (!isHovered) {
                            next();
                        } else {
                            restartAuto();
                        }
                    }, SLIDE_DURATION);
                }

                // Expose for inline onclick
                window.aciBannerNext = next;
                window.aciBannerPrev = prev;

                // Pause on hover
                const container = document.querySelector('#aciBannerSlider .aci-slides-container');
                if (container) {
                    container.addEventListener('mouseenter', () => { isHovered = true; });
                    container.addEventListener('mouseleave', () => { isHovered = false; });
                    container.addEventListener('touchstart', () => { isHovered = true; }, { passive: true });
                    container.addEventListener('touchend', () => {
                        setTimeout(() => { isHovered = false; }, 2000);
                    }, { passive: true });
                }

                // Touch / Swipe Support
                let touchStartX = 0;
                if (container) {
                    container.addEventListener('touchstart', (e) => { touchStartX = e.changedTouches[0].screenX; }, { passive: true });
                    container.addEventListener('touchend', (e) => {
                        const diff = e.changedTouches[0].screenX - touchStartX;
                        if (Math.abs(diff) > 50) { diff < 0 ? next() : prev(); }
                    }, { passive: true });
                }

                // Initial progress bar kick
                if (progressBar) {
                    progressBar.style.transition = 'width ' + SLIDE_DURATION + 'ms linear';
                    progressBar.style.width = '100%';
                }
                restartAuto();
            })();
        </script>
        <section id="project-area" class="py-24 bg-[#fafafa] relative overflow-hidden">
            <!-- Decorative Blurred Glow Blobs for Premium Glassmorphism Look -->
            <div class="absolute top-1/4 -left-12 w-80 h-80 bg-red-500/5 rounded-full blur-3xl pointer-events-none">
            </div>
            <div class="absolute bottom-1/4 -right-12 w-96 h-96 bg-red-500/5 rounded-full blur-3xl pointer-events-none">
            </div>

            <div class="container-fluid max-w-7xl mx-auto px-6 relative z-10">

                <!-- Section Headings -->
                <div class="text-center mb-16">
                    <span class="text-[#F60000] text-xs font-bold tracking-[0.25em] uppercase block mb-3">Work of
                        Excellence</span>
                    <h2 class="text-4xl md:text-5xl font-black text-[#1a1e20] tracking-tight leading-tight font-sans">
                        Recent Events &amp; News</h2>
                    <div class="flex justify-center items-center gap-2 mt-4">
                        <span class="w-20 h-[4px] bg-red-600/20"></span>
                        <span class="loader"></span>
                        <span class="w-20 h-[4px] bg-red-600/20"></span>
                    </div>
                </div>

                <!-- Grid Layout (3 columns) -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($newsEvents as $event)
                    <div class="aci-news-card">
                        <div class="aci-news-iframe-wrap">
                            <iframe
                                src="{{ $event->iframe_url }}"
                                style="border:none; overflow:hidden; width:100%; height:100%;" scrolling="no"
                                frameborder="0" allowfullscreen="true"
                                allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                            <div class="aci-news-overlay">
                                <a href="{{ $event->post_url }}" target="_blank" class="aci-news-hover-btn">
                                    <span>{{ $event->is_video ? 'Watch Video' : 'View Post' }}</span>
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                        <path d="M5 12h14M12 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="aci-news-body">
                            <p class="aci-news-text">
                                {{ $event->text }}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- ============================================
             ACI OUR STORY & GALLERY SECTION
             ============================================ -->
        <section id="our-story" class="pt-24 relative overflow-hidden" style="background:#0c1219;">
            <!-- Decorative Glow Blobs -->
            <div
                style="position:absolute;top:10%;left:-8%;width:500px;height:500px;background:radial-gradient(circle,rgba(246,0,0,0.07),transparent 70%);border-radius:50%;pointer-events:none;">
            </div>
            <div
                style="position:absolute;bottom:5%;right:-5%;width:600px;height:600px;background:radial-gradient(circle,rgba(0,100,255,0.05),transparent 70%);border-radius:50%;pointer-events:none;">
            </div>
            <div
                style="position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);width:800px;height:800px;background:radial-gradient(circle,rgba(246,0,0,0.03),transparent 60%);border-radius:50%;pointer-events:none;">
            </div>

            <div class="container-fluid max-w-7xl mx-auto px-6 relative" style="z-index:2;">

                <!-- Section Heading -->
                <div class="text-center mb-16">
                    <span
                        style="color:#F60000;font-size:0.75rem;font-weight:700;letter-spacing:0.25em;text-transform:uppercase;display:block;margin-bottom:0.75rem;">Our
                        Journey</span>
                    <h2
                        style="font-size:clamp(2rem,5vw,3.25rem);font-weight:900;color:#ffffff;letter-spacing:-0.03em;line-height:1.15;font-family:'Archivo',sans-serif;margin:0;">
                        Our Story & Gallery</h2>
                    <div class="flex justify-center items-center gap-2 mt-4">
                        <span class="w-20 h-[4px] bg-red-600/20"></span>
                        <span class="loader" style="color: white !important;"></span>
                        <span class="w-20 h-[4px] bg-red-600/20"></span>
                    </div>
                </div>

                <!-- Narrative + Featured Image -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center" style="">
                    <!-- Text Side -->
                    <div>
                        <p style="color:rgba(255,255,255,0.85);font-size:1.1rem;line-height:1.85;margin:0 0 1.5rem 0;">
                            {!! $settings['story_narrative_1'] ?? '' !!}
                        </p>
                        <p style="color:rgba(255,255,255,0.65);font-size:1rem;line-height:1.8;margin:0 0 2.5rem 0;">
                            {!! $settings['story_narrative_2'] ?? '' !!}
                        </p>
                        <!-- Key Stats Grid -->
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                            @foreach($companyStats as $stat)
                            <div class="aci-stat-card">
                                <div class="aci-stat-num" id="stat-{{ Str::slug($stat->label) }}">{{ $stat->number }}</div>
                                <div class="aci-stat-label">{{ $stat->label }}</div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Featured Image Side -->
                    <div class="aci-featured-wrap">
                        <img src="{{ Str::startsWith($settings['story_featured_image'] ?? 'general%20picture/Survey%20vessel.jpg', 'http') ? ($settings['story_featured_image'] ?? 'general%20picture/Survey%20vessel.jpg') : asset($settings['story_featured_image'] ?? 'general%20picture/Survey%20vessel.jpg') }}" alt="{{ $settings['story_featured_title'] ?? 'Featured Project' }}"
                            style="width:100%;height:100%;object-fit:cover;min-height:380px;display:block;"
                            loading="lazy">
                        <div
                            style="position:absolute;inset:0;background:linear-gradient(to top,rgba(12,18,25,0.85) 0%,transparent 60%);display:flex;align-items:flex-end;padding:2.5rem;">
                            <div>
                                <span
                                    style="color:#F60000;font-size:0.75rem;font-weight:700;letter-spacing:0.15em;text-transform:uppercase;">Featured
                                    Project</span>
                                <h3
                                    style="color:#ffffff;font-size:1.75rem;font-weight:900;margin:0.25rem 0 0 0;font-family:'Archivo',sans-serif;">
                                    {{ $settings['story_featured_title'] ?? 'Hydrographic Survey Vessel' }}</h3>
                            </div>
                        </div>
                    </div>                </div>
            </div>
        </section>

        <!-- Gallery Section with White Background -->
        <style>
            .aci-gallery-section-light {
                background: #ffffff !important;
            }
            .aci-gallery-section-light .aci-filter-container {
                background: rgba(0, 0, 0, 0.03) !important;
                border: 1px solid rgba(0, 0, 0, 0.08) !important;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05) !important;
            }
            .aci-gallery-section-light .aci-filter-tab {
                color: rgba(0, 0, 0, 0.6) !important;
            }
            .aci-gallery-section-light .aci-filter-tab:hover {
                color: #000000 !important;
            }
            .aci-gallery-section-light .aci-filter-tab.active {
                color: #ffffff !important;
                background: linear-gradient(135deg, #FF1A1A, #B30000) !important;
                box-shadow: 0 8px 20px rgba(246, 0, 0, 0.3) !important;
            }
            .aci-gallery-section-light .aci-filter-count {
                background: rgba(0, 0, 0, 0.05) !important;
                color: rgba(0, 0, 0, 0.6) !important;
            }
            .aci-gallery-section-light .aci-filter-tab.active .aci-filter-count {
                background: #ffffff !important;
                color: #F60000 !important;
            }
            .aci-gallery-section-light .aci-filter-tab:hover:not(.active) .aci-filter-count {
                background: rgba(0, 0, 0, 0.1) !important;
                color: #000000 !important;
            }
        </style>
        <section id="gallery" class="py-24 relative overflow-hidden aci-gallery-section-light" style="background:#ffffff;">
            <div class="container-fluid max-w-7xl mx-auto px-6 relative" style="z-index:2;">
                <!-- Filter Tabs -->
                <div class="flex justify-center" style="margin-bottom:3.5rem;">
                    <div class="aci-filter-container" id="aciGalleryFilters">
                        <button class="aci-filter-tab active" data-filter="all">All Projects <span
                                class="aci-filter-count">{{ $galleryItems->count() }}</span></button>
                        @foreach($galleryCategories as $category)
                        <button class="aci-filter-tab" data-filter="{{ Str::slug($category->name) }}">{{ $category->name }} <span
                                class="aci-filter-count">{{ $galleryItems->where('gallery_category_id', $category->id)->count() }}</span></button>
                        @endforeach
                    </div>
                </div>

                <!-- Gallery Grid -->
                <div class="aci-gallery-grid" id="aciGalleryGrid">
                    @foreach($galleryItems as $item)
                    <div class="aci-gallery-item {{ $loop->first ? 'featured' : '' }}" data-category="{{ Str::slug($item->galleryCategory->name ?? '') }}" style="cursor:pointer;">
                        <div class="aci-gallery-img-wrap">
                            <img class="aci-gallery-img" src="{{ asset($item->image_url) }}"
                                alt="{{ $item->title }}" loading="lazy">
                        </div>
                        <div class="aci-gallery-badge">{{ $item->galleryCategory->name ?? '' }}</div>
                        <div class="aci-gallery-overlay">
                            <h4 class="aci-gallery-title">{{ $item->title }}</h4>
                            <p class="aci-gallery-desc">{{ $item->description }}</p>
                            <div class="aci-gallery-action">
                                <span>Explore</span>
                                <div class="aci-gallery-action-btn">
                                    <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.5">
                                        <path d="M5 12h14M12 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Gallery Lightbox Modal -->
        <div class="aci-lightbox" id="aciGalleryLightbox">
            <div class="aci-lightbox-content">
                <button class="aci-lightbox-close" id="aciLightboxClose" aria-label="Close lightbox">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2.5">
                        <path d="M18 6L6 18M6 6l12 12" />
                    </svg>
                </button>
                <button class="aci-lightbox-btn prev" id="aciLightboxPrev" aria-label="Previous image">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2.5">
                        <path d="M15 18l-6-6 6-6" />
                    </svg>
                </button>
                <img class="aci-lightbox-img" id="aciLightboxImg" src="" alt="">
                <button class="aci-lightbox-btn next" id="aciLightboxNext" aria-label="Next image">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2.5">
                        <path d="M9 18l6-6-6-6" />
                    </svg>
                </button>
                <div class="aci-lightbox-caption">
                    <h4 id="aciLightboxTitle"></h4>
                    <p id="aciLightboxDesc"></p>
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
