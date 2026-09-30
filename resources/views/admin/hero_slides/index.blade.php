@extends('admin.layouts.admin')

@section('title', 'Hero Slider & Video Management')

@section('content')
<div class="w-full max-w-7xl mx-auto pb-16">
    {{-- Header with action and stats --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <div class="flex items-center gap-2 text-xs font-semibold text-brand-green tracking-wider uppercase mb-1">
                <span class="w-2 h-2 rounded-full bg-brand-green animate-pulse"></span>
                Homepage Customizer
            </div>
            <h1 class="text-2xl md:text-3xl font-extrabold text-slate-800 tracking-tight">Hero Slider & Video Settings</h1>
            <p class="text-sm text-slate-500 mt-1">Configure your full-bleed background video and dynamic headline overlay slides.</p>
        </div>

        <div class="flex items-center gap-3">
            <a href="{{ url('/') }}" target="_blank" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl border border-slate-200 bg-white text-slate-700 hover:bg-slate-50 hover:border-slate-300 transition-all font-semibold text-xs shadow-sm">
                <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                View Live Homepage
            </a>
            <button type="button" onclick="document.getElementById('mainHeroForm').requestSubmit()" class="inline-flex items-center gap-2 bg-brand-green hover:bg-[#1b7430] text-white px-5 py-2.5 rounded-xl font-bold text-xs transition-all shadow-md shadow-green-600/20 hover:shadow-lg">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                Save All Changes
            </button>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-green-50/90 backdrop-blur text-green-800 p-4 rounded-2xl border border-green-200 mb-8 font-medium text-sm flex items-center justify-between shadow-sm animate-fade-in">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center text-green-600 shrink-0">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                </div>
                <span>{{ session('success') }}</span>
            </div>
            <span class="text-xs text-green-600 bg-green-100/80 px-2.5 py-1 rounded-full font-semibold">Updated</span>
        </div>
    @endif

    <form id="mainHeroForm" action="{{ route('admin.hero-slides.update-all') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Top Section: Two-Column Responsive Split Screen --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 mb-8">
            {{-- Left column: Video Upload & Configuration (7 cols) --}}
            <div class="lg:col-span-7 space-y-6">
                <div class="bg-white border border-slate-200/80 rounded-2xl shadow-sm overflow-hidden">
                    <div class="px-6 py-5 border-b border-slate-100 bg-slate-50/70 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                        <div>
                            <h2 class="text-base font-bold text-slate-800 flex items-center gap-2">
                                <svg class="w-5 h-5 text-brand-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                1. Background Video Source
                            </h2>
                            <p class="text-xs text-slate-500 mt-0.5">Choose between streaming embed or uploading your own local video.</p>
                        </div>
                        
                        {{-- Switch Tabs --}}
                        <div class="inline-flex p-1 bg-slate-100 rounded-xl border border-slate-200 text-xs font-semibold" id="videoSourceTabs">
                            <button type="button" id="tabUrlBtn" class="px-3.5 py-1.5 rounded-lg bg-white shadow-sm text-slate-800 transition-all flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-brand-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                                Video URL
                            </button>
                            <button type="button" id="tabUploadBtn" class="px-3.5 py-1.5 rounded-lg text-slate-600 hover:text-slate-900 transition-all flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                                Upload MP4 File
                            </button>
                        </div>
                    </div>

                    <div class="p-6">
                        {{-- Tab 1: Video URL Input --}}
                        <div id="videoUrlSection" class="space-y-3">
                            <div class="flex items-center justify-between">
                                <label class="text-xs font-bold text-slate-700 uppercase tracking-wider">Video URL (Vimeo / YouTube Embed)</label>
                                <span class="text-[11px] text-slate-400">Autoplay & Loop Enabled</span>
                            </div>
                            <div class="relative">
                                <input type="text" id="heroVideoInput" name="hero_background_video" value="{{ $settings['hero_background_video'] ?? '' }}" 
                                       class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-300 focus:border-brand-green focus:ring focus:ring-brand-green/20 transition-all text-xs md:text-sm font-mono text-slate-800 shadow-sm"
                                       placeholder="https://player.vimeo.com/video/1201121454?autoplay=1&mute=1&background=1&loop=1">
                                <div class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                                </div>
                            </div>
                            <div class="flex items-center justify-between text-xs text-slate-500 pt-1">
                                <span>Example: <code>https://player.vimeo.com/video/1201121454...</code></span>
                                <button type="button" onclick="resetDefaultVimeo()" class="text-brand-green hover:underline font-medium">Use Default Vimeo</button>
                            </div>
                        </div>

                        {{-- Tab 2: Upload Video File --}}
                        <div id="videoUploadSection" class="space-y-3 hidden">
                            <div class="flex items-center justify-between">
                                <label class="text-xs font-bold text-slate-700 uppercase tracking-wider">Upload Local Video File</label>
                                <span class="text-[11px] text-slate-400">Max size: 100MB</span>
                            </div>
                            <div class="border-2 border-dashed border-slate-300 hover:border-brand-green/60 rounded-2xl p-6 text-center bg-slate-50/50 hover:bg-green-50/30 transition-all cursor-pointer relative group" onclick="document.getElementById('heroVideoFileInput').click()">
                                <input type="file" id="heroVideoFileInput" name="hero_video_file" accept="video/mp4,video/webm,video/ogg" class="hidden">
                                <div class="flex flex-col items-center justify-center">
                                    <div class="w-14 h-14 mb-3 rounded-2xl bg-white shadow-sm border border-slate-200 group-hover:border-brand-green/40 flex items-center justify-center text-brand-green transition-transform group-hover:scale-105">
                                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                    </div>
                                    <p class="text-sm font-bold text-slate-800"><span class="text-brand-green hover:underline">Click to browse</span> or drag video here</p>
                                    <p class="text-xs text-slate-500 mt-1">Recommended: 1080p MP4, 10-20 seconds loop, muted</p>
                                    <span id="selectedFileName" class="mt-3 inline-block px-3 py-1 bg-green-100 text-brand-green rounded-full text-xs font-semibold hidden"></span>
                                </div>
                            </div>
                        </div>

                        {{-- Current Active Source Badge --}}
                        <div class="mt-4 pt-4 border-t border-slate-100 flex flex-wrap items-center justify-between gap-2 text-xs">
                            <span class="text-slate-400">Current active path:</span>
                            <span class="font-mono text-slate-700 bg-slate-100 px-2.5 py-1 rounded-md max-w-[280px] truncate" title="{{ $settings['hero_background_video'] ?? 'Default' }}">
                                {{ $settings['hero_background_video'] ?? 'https://player.vimeo.com/video/1201121454?autoplay=1&mute=1&background=1&loop=1' }}
                            </span>
                        </div>
                    </div>
                </div>

                {{-- Recommended Specs Guide Card --}}
                <div class="bg-gradient-to-br from-slate-900 to-slate-800 text-white rounded-2xl p-5 shadow-sm">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-green-400 flex items-center gap-1.5 mb-3">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Recommended Video Settings for Best Performance
                    </h3>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 text-xs">
                        <div class="bg-white/10 rounded-xl p-2.5 backdrop-blur">
                            <span class="text-slate-400 block text-[10px]">FORMAT</span>
                            <span class="font-bold text-white">MP4 (H.264)</span>
                        </div>
                        <div class="bg-white/10 rounded-xl p-2.5 backdrop-blur">
                            <span class="text-slate-400 block text-[10px]">RESOLUTION</span>
                            <span class="font-bold text-white">1920 × 1080 (1080p)</span>
                        </div>
                        <div class="bg-white/10 rounded-xl p-2.5 backdrop-blur">
                            <span class="text-slate-400 block text-[10px]">DURATION</span>
                            <span class="font-bold text-white">10 - 20s Loop</span>
                        </div>
                        <div class="bg-white/10 rounded-xl p-2.5 backdrop-blur">
                            <span class="text-slate-400 block text-[10px]">AUDIO</span>
                            <span class="font-bold text-white">Muted / No sound</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right column: Live Interactive Screen Preview (5 cols) --}}
            <div class="lg:col-span-5">
                <div class="bg-white border border-slate-200/80 rounded-2xl shadow-sm overflow-hidden sticky top-6">
                    <div class="px-5 py-4 border-b border-slate-100 bg-slate-50/70 flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-ping"></span>
                            <h2 class="text-sm font-bold text-slate-800">Live Screen Mockup</h2>
                        </div>
                        <span id="previewStatus" class="text-[11px] font-semibold text-slate-500 bg-white px-2.5 py-1 rounded-full border border-slate-200">Interactive Preview</span>
                    </div>

                    <div class="p-5">
                        {{-- Mockup Device Frame --}}
                        <div class="relative w-full rounded-xl overflow-hidden shadow-2xl bg-slate-950 aspect-[16/10] border border-slate-800 flex flex-col group">
                            {{-- Browser Top Bar Mockup --}}
                            <div class="h-6 bg-slate-900/95 border-b border-slate-800 flex items-center px-3 gap-1.5 z-20 shrink-0">
                                <span class="w-2 h-2 rounded-full bg-red-500/80"></span>
                                <span class="w-2 h-2 rounded-full bg-yellow-500/80"></span>
                                <span class="w-2 h-2 rounded-full bg-green-500/80"></span>
                                <span class="ml-2 text-[9px] text-slate-400 font-mono">acimarine.com</span>
                            </div>

                            {{-- Mockup Video Container --}}
                            <div class="relative flex-1 w-full h-full overflow-hidden">
                                {{-- Iframe for Embeds --}}
                                <iframe id="heroVideoPreview" 
                                        src="{{ $settings['hero_background_video'] ?? 'https://player.vimeo.com/video/1201121454?autoplay=1&mute=1&background=1&loop=1' }}" 
                                        class="absolute inset-0 w-full h-full border-0 pointer-events-none" 
                                        allow="autoplay; fullscreen; picture-in-picture" 
                                        frameborder="0">
                                </iframe>

                                {{-- HTML5 Video Player for Local Video Upload --}}
                                <video id="heroLocalVideoPreview" 
                                       autoplay muted loop playsinline 
                                       class="absolute inset-0 w-full h-full object-cover hidden">
                                </video>

                                {{-- Dark Gradient Overlay (Same as frontend hero) --}}
                                <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/40 to-black/20 z-10 pointer-events-none"></div>

                                {{-- Live Overlay Slide Text Preview --}}
                                <div class="absolute inset-0 z-20 flex flex-col justify-end p-5 text-white pointer-events-none">
                                    <div class="flex items-center gap-1.5 mb-1.5">
                                        <span class="w-3 h-0.5 bg-[#F60000] rounded-full"></span>
                                        <span id="mockSubtitle" class="text-[9px] font-bold tracking-widest uppercase text-white/90 font-outfit">
                                            WE BUILD THE SHIPS OF TOMORROW
                                        </span>
                                    </div>
                                    <h4 id="mockTitle" class="text-sm font-extrabold leading-tight text-white mb-2 line-clamp-2">
                                        Thrusting Your Marine Aspiration Forward.
                                    </h4>
                                    <div class="inline-flex items-center gap-1 text-[9px] font-bold text-white uppercase tracking-wider">
                                        <span id="mockButtonText">Explore Solutions</span>
                                        <svg class="w-2.5 h-2.5 text-brand-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                    </div>
                                </div>

                                {{-- Empty Video Fallback Message --}}
                                <div id="noVideoMsg" class="hidden absolute inset-0 flex flex-col items-center justify-center text-slate-400 bg-slate-900/95 text-xs z-30 p-4 text-center">
                                    <svg class="w-8 h-8 mb-2 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                    <span>Provide a video URL or upload a file to preview.</span>
                                </div>
                            </div>
                        </div>

                        <p class="text-[11px] text-slate-400 text-center mt-3">
                            The text updates dynamically as you type into Slide #1 below.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Bottom Section: Dynamic Headline Overlay Slides Management --}}
        <div class="bg-white border border-slate-200/80 rounded-2xl shadow-sm overflow-hidden mb-8">
            <div class="px-6 py-5 border-b border-slate-100 bg-slate-50/70 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                <div>
                    <h2 class="text-base font-bold text-slate-800 flex items-center gap-2">
                        <svg class="w-5 h-5 text-brand-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/></svg>
                        2. Headline & Text Slides
                    </h2>
                    <p class="text-xs text-slate-500 mt-0.5">These text slides cycle over the background video on the homepage.</p>
                </div>
                <button type="button" id="addSlideBtn" class="bg-brand-green hover:bg-[#1b7430] text-white px-4 py-2 rounded-xl font-bold text-xs transition-colors shadow-sm flex items-center gap-2 self-start sm:self-auto">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    Add Another Slide
                </button>
            </div>

            <div class="p-6 bg-slate-50/40" id="slidesContainer">
                {{-- Dynamic Slides injected by JS --}}
            </div>
        </div>

        {{-- Sticky Floating Save Bar --}}
        <div class="sticky bottom-4 z-40 bg-white/95 backdrop-blur border border-slate-200 rounded-2xl p-4 shadow-xl flex items-center justify-between">
            <div class="flex items-center gap-3">
                <span class="w-2.5 h-2.5 rounded-full bg-brand-green"></span>
                <span class="text-xs text-slate-600 font-medium hidden sm:inline">Ready to save your homepage changes?</span>
            </div>
            <div class="flex items-center gap-3">
                <button type="button" onclick="window.location.reload()" class="px-4 py-2.5 rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-50 font-semibold text-xs transition-all">
                    Discard Changes
                </button>
                <button type="submit" class="bg-brand-green hover:bg-[#1b7430] text-white px-6 py-2.5 rounded-xl font-bold text-xs transition-all shadow-md shadow-green-600/20 hover:shadow-lg flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                    Save All Settings
                </button>
            </div>
        </div>
    </form>
</div>

{{-- Slide Template Card --}}
<template id="slideTemplate">
    <div class="slide-item bg-white border border-slate-200 rounded-2xl p-6 mb-4 shadow-sm hover:border-slate-300 transition-all relative group" data-slide-index="__INDEX__">
        <div class="flex items-center justify-between pb-4 mb-4 border-b border-slate-100">
            <div class="flex items-center gap-2">
                <span class="w-6 h-6 rounded-lg bg-green-50 text-brand-green font-bold text-xs flex items-center justify-center font-mono slide-number-badge">
                    #__NUMBER__
                </span>
                <span class="text-xs font-bold text-slate-700">Text Slide #__NUMBER__</span>
            </div>
            <button type="button" class="remove-slide-btn text-slate-400 hover:text-red-500 hover:bg-red-50 p-1.5 rounded-lg transition-colors" title="Delete Slide">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
            </button>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="md:col-span-2">
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                    Main Headline / Title <span class="text-red-500">*</span>
                </label>
                <input type="text" name="slides[__INDEX__][title]" required 
                       class="slide-title-input w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-brand-green focus:ring focus:ring-brand-green/20 text-sm font-semibold text-slate-800 transition-all"
                       placeholder="e.g. Thrusting Your Marine Aspiration Forward.">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Subtitle / Tagline</label>
                <input type="text" name="slides[__INDEX__][subtitle]" 
                       class="slide-subtitle-input w-full px-4 py-2 rounded-xl border border-slate-300 focus:border-brand-green focus:ring focus:ring-brand-green/20 text-xs text-slate-700 transition-all"
                       placeholder="e.g. WE BUILD THE SHIPS OF TOMORROW & TODAY">
            </div>

            <div class="grid grid-cols-2 gap-2">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Button Text</label>
                    <input type="text" name="slides[__INDEX__][link_text]" 
                           class="slide-linktext-input w-full px-4 py-2 rounded-xl border border-slate-300 focus:border-brand-green focus:ring focus:ring-brand-green/20 text-xs text-slate-700 transition-all"
                           placeholder="e.g. Explore Solutions">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Button Link URL</label>
                    <input type="text" name="slides[__INDEX__][link_url]" 
                           class="w-full px-4 py-2 rounded-xl border border-slate-300 focus:border-brand-green focus:ring focus:ring-brand-green/20 text-xs text-slate-700 transition-all"
                           placeholder="e.g. #products or /products">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const container = document.getElementById('slidesContainer');
        const template = document.getElementById('slideTemplate').innerHTML;
        const addBtn = document.getElementById('addSlideBtn');
        
        let slideIndex = 0;

        // Existing slides from backend
        const existingSlides = @json($slides);

        function updateSlideNumbers() {
            const items = container.querySelectorAll('.slide-item');
            items.forEach((item, idx) => {
                const badge = item.querySelector('.slide-number-badge');
                if (badge) badge.textContent = `#${idx + 1}`;
            });
        }

        function addSlide(data = null) {
            let html = template.replace(/__INDEX__/g, slideIndex);
            html = html.replace(/__NUMBER__/g, slideIndex + 1);
            
            const temp = document.createElement('div');
            temp.innerHTML = html;
            const slideEl = temp.firstElementChild;
            
            if (data) {
                slideEl.querySelector(`input[name="slides[${slideIndex}][title]"]`).value = data.title || '';
                slideEl.querySelector(`input[name="slides[${slideIndex}][subtitle]"]`).value = data.subtitle || '';
                slideEl.querySelector(`input[name="slides[${slideIndex}][link_text]"]`).value = data.link_text || '';
                slideEl.querySelector(`input[name="slides[${slideIndex}][link_url]"]`).value = data.link_url || '';
            }
            
            // Sync with live mockup when first slide is edited
            const titleInput = slideEl.querySelector('.slide-title-input');
            const subtitleInput = slideEl.querySelector('.slide-subtitle-input');
            const linkTextInput = slideEl.querySelector('.slide-linktext-input');

            function syncMockup() {
                const firstSlide = container.querySelector('.slide-item');
                if (firstSlide) {
                    const t = firstSlide.querySelector('.slide-title-input')?.value;
                    const s = firstSlide.querySelector('.slide-subtitle-input')?.value;
                    const b = firstSlide.querySelector('.slide-linktext-input')?.value;
                    if (t) document.getElementById('mockTitle').textContent = t;
                    if (s) document.getElementById('mockSubtitle').textContent = s;
                    if (b) document.getElementById('mockButtonText').textContent = b;
                }
            }

            [titleInput, subtitleInput, linkTextInput].forEach(input => {
                if (input) input.addEventListener('input', syncMockup);
            });

            // Remove slide event
            slideEl.querySelector('.remove-slide-btn').addEventListener('click', function() {
                if (container.querySelectorAll('.slide-item').length <= 1) {
                    alert('You should keep at least one slide for the homepage.');
                    return;
                }
                slideEl.remove();
                updateSlideNumbers();
                syncMockup();
            });

            container.appendChild(slideEl);
            slideIndex++;
            updateSlideNumbers();
            syncMockup();
        }

        // Initialize with existing slides or one empty slide
        if (existingSlides && existingSlides.length > 0) {
            existingSlides.forEach(slide => addSlide(slide));
        } else {
            addSlide({
                title: 'Thrusting Your Marine Aspiration Forward.',
                subtitle: 'WE BUILD THE SHIPS OF TOMORROW & TODAY',
                link_text: 'Explore Solutions',
                link_url: '/products'
            });
        }

        // Add new slide button
        addBtn.addEventListener('click', function() {
            addSlide();
        });

        // Tabs & Video Preview Handling
        const tabUrlBtn = document.getElementById('tabUrlBtn');
        const tabUploadBtn = document.getElementById('tabUploadBtn');
        const videoUrlSection = document.getElementById('videoUrlSection');
        const videoUploadSection = document.getElementById('videoUploadSection');
        const heroVideoFileInput = document.getElementById('heroVideoFileInput');
        const selectedFileName = document.getElementById('selectedFileName');

        const videoInput = document.getElementById('heroVideoInput');
        const videoPreview = document.getElementById('heroVideoPreview');
        const localVideoPreview = document.getElementById('heroLocalVideoPreview');
        const noVideoMsg = document.getElementById('noVideoMsg');
        const previewStatus = document.getElementById('previewStatus');

        if (tabUrlBtn && tabUploadBtn) {
            tabUrlBtn.addEventListener('click', function() {
                tabUrlBtn.className = "px-3.5 py-1.5 rounded-lg bg-white shadow-sm text-slate-800 transition-all flex items-center gap-1.5";
                tabUploadBtn.className = "px-3.5 py-1.5 rounded-lg text-slate-600 hover:text-slate-900 transition-all flex items-center gap-1.5";
                videoUrlSection.classList.remove('hidden');
                videoUploadSection.classList.add('hidden');
                updateVideoPreview();
            });

            tabUploadBtn.addEventListener('click', function() {
                tabUploadBtn.className = "px-3.5 py-1.5 rounded-lg bg-white shadow-sm text-slate-800 transition-all flex items-center gap-1.5";
                tabUrlBtn.className = "px-3.5 py-1.5 rounded-lg text-slate-600 hover:text-slate-900 transition-all flex items-center gap-1.5";
                videoUploadSection.classList.remove('hidden');
                videoUrlSection.classList.add('hidden');
                if (heroVideoFileInput.files.length > 0) {
                    handleFileSelect(heroVideoFileInput.files[0]);
                } else {
                    updateVideoPreview();
                }
            });
        }

        if (heroVideoFileInput) {
            heroVideoFileInput.addEventListener('change', function(e) {
                if (e.target.files && e.target.files[0]) {
                    const file = e.target.files[0];
                    selectedFileName.textContent = `Selected: ${file.name} (${(file.size / (1024*1024)).toFixed(1)} MB)`;
                    selectedFileName.classList.remove('hidden');
                    handleFileSelect(file);
                }
            });
        }

        function handleFileSelect(file) {
            const objectUrl = URL.createObjectURL(file);
            videoPreview.classList.add('hidden');
            noVideoMsg.classList.add('hidden');
            localVideoPreview.classList.remove('hidden');
            localVideoPreview.src = objectUrl;
            localVideoPreview.play().catch(() => {});
            if (previewStatus) previewStatus.textContent = 'Previewing uploaded file';
        }

        function formatVideoUrl(url) {
            if (!url) return '';
            url = url.trim();

            const vimeoMatch = url.match(/(?:vimeo\.com\/)(\d+)/);
            if (vimeoMatch && !url.includes('player.vimeo.com')) {
                return `https://player.vimeo.com/video/${vimeoMatch[1]}?autoplay=1&mute=1&background=1&loop=1`;
            }

            const ytMatch = url.match(/(?:youtube\.com\/(?:watch\?v=|embed\/)|youtu\.be\/)([a-zA-Z0-9_-]+)/);
            if (ytMatch && !url.includes('youtube.com/embed/')) {
                return `https://www.youtube.com/embed/${ytMatch[1]}?autoplay=1&mute=1&loop=1&playlist=${ytMatch[1]}&controls=0`;
            }

            return url;
        }

        function updateVideoPreview() {
            const rawUrl = videoInput ? videoInput.value.trim() : '';
            const isLocalOrDirect = rawUrl.match(/\.(mp4|webm|ogg)(\?.*)?$/i) || rawUrl.startsWith('/uploads/') || rawUrl.startsWith('uploads/');

            if (!rawUrl) {
                videoPreview.classList.add('hidden');
                localVideoPreview.classList.add('hidden');
                noVideoMsg.classList.remove('hidden');
                if (previewStatus) previewStatus.textContent = 'No video provided';
                return;
            }

            noVideoMsg.classList.add('hidden');
            
            if (isLocalOrDirect) {
                videoPreview.classList.add('hidden');
                localVideoPreview.classList.remove('hidden');
                if (localVideoPreview.src !== rawUrl) {
                    localVideoPreview.src = rawUrl;
                    localVideoPreview.play().catch(() => {});
                }
                if (previewStatus) previewStatus.textContent = 'Local Video File';
            } else {
                localVideoPreview.classList.add('hidden');
                videoPreview.classList.remove('hidden');
                const formatted = formatVideoUrl(rawUrl);
                if (videoPreview.src !== formatted) {
                    videoPreview.src = formatted;
                }
                if (previewStatus) previewStatus.textContent = 'Streaming Preview';
            }
        }

        window.resetDefaultVimeo = function() {
            if (videoInput) {
                videoInput.value = 'https://player.vimeo.com/video/1201121454?autoplay=1&mute=1&background=1&loop=1';
                updateVideoPreview();
            }
        };

        if (videoInput) {
            videoInput.addEventListener('input', updateVideoPreview);
            videoInput.addEventListener('change', updateVideoPreview);
            updateVideoPreview();
        }
    });
</script>
@endsection
