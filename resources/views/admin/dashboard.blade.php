@extends('admin.layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-8 pb-10">

    {{-- ===================== WELCOME BANNER ===================== --}}
    <div class="relative bg-gradient-to-r from-slate-900 via-slate-800 to-slate-950 border border-slate-700/30 rounded-2xl sm:rounded-[32px] p-6 sm:p-8 overflow-hidden shadow-2xl">
        <div class="absolute top-0 left-0 w-full h-full opacity-5 pointer-events-none" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 30px 30px;"></div>
        <div class="absolute -top-20 -right-20 w-[320px] h-[320px] rounded-full bg-brand-green/20 blur-[90px] pointer-events-none"></div>
        <div class="absolute -bottom-20 -left-20 w-[240px] h-[240px] rounded-full bg-brand-red/10 blur-[80px] pointer-events-none"></div>
        <div class="relative z-10 flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
            <div>
                <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-brand-green/10 border border-brand-green/30 text-brand-green text-[10px] font-bold tracking-widest uppercase mb-3">
                    <span class="inline-block w-2 h-2 rounded-full bg-brand-green mr-1 animate-pulse"></span>All Systems Operational
                </div>
                <h2 class="font-outfit font-black text-3xl md:text-4xl text-white tracking-tight">Welcome Back, {{ Auth::user()->name }}!</h2>
                <p class="text-slate-400 text-sm mt-2 font-medium">ACI Marine CMS &middot; Laravel v{{ App::version() }} &middot; {{ now()->format('l, d M Y') }}</p>
            </div>
            <div class="flex gap-3 flex-wrap shrink-0">
                <a href="/" target="_blank" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-white/10 border border-white/15 text-white text-xs font-bold hover:bg-white/20 transition-all shadow-sm">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
                    View Website
                </a>
                <a href="{{ route('admin.project-references.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-brand-green hover:bg-green-600 text-white text-xs font-bold transition-all shadow-lg shadow-green-950/40">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" /></svg>
                    New Project
                </a>
            </div>
        </div>
    </div>

    {{-- ===================== TOP SUMMARY STATS ===================== --}}
    <div class="grid grid-cols-1 min-[400px]:grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-5">
        @php
        $topStats = [
            ['label' => 'Projects',     'value' => $stats['total_projects'],    'color' => 'green',  'icon' => 'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10',  'link' => route('admin.project-references.index')],
            ['label' => 'Products',     'value' => $stats['total_products'],    'color' => 'blue',   'icon' => 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4', 'link' => route('admin.products.index')],
            ['label' => 'Clients',      'value' => $stats['total_clients'],     'color' => 'purple', 'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z', 'link' => route('admin.clients.index')],
            ['label' => 'News Feed',    'value' => $stats['total_news_events'], 'color' => 'amber',  'icon' => 'M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 12h6m0 0H7', 'link' => route('admin.news-events.index')],
            ['label' => 'Gallery Items','value' => $stats['total_gallery_items'],'color' => 'rose',  'icon' => 'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z', 'link' => route('admin.gallery-items.index')],
        ];

        $colorMap = [
            'green'  => ['bg' => 'bg-emerald-500/[0.04] hover:bg-emerald-500/[0.07]', 'border' => 'border-emerald-500/10 hover:border-emerald-500/30', 'icon_bg' => 'bg-emerald-500/10', 'icon_text' => 'text-emerald-600', 'val_text' => 'text-slate-800'],
            'blue'   => ['bg' => 'bg-blue-500/[0.04] hover:bg-blue-500/[0.07]',    'border' => 'border-blue-500/10 hover:border-blue-500/30',   'icon_bg' => 'bg-blue-500/10',   'icon_text' => 'text-blue-600',   'val_text' => 'text-slate-800'],
            'purple' => ['bg' => 'bg-indigo-500/[0.04] hover:bg-indigo-500/[0.07]', 'border' => 'border-indigo-500/10 hover:border-indigo-500/30', 'icon_bg' => 'bg-indigo-500/10', 'icon_text' => 'text-indigo-600', 'val_text' => 'text-slate-800'],
            'amber'  => ['bg' => 'bg-amber-500/[0.04] hover:bg-amber-500/[0.07]',   'border' => 'border-amber-500/10 hover:border-amber-500/30',  'icon_bg' => 'bg-amber-500/10',  'icon_text' => 'text-amber-600',  'val_text' => 'text-slate-800'],
            'rose'   => ['bg' => 'bg-rose-500/[0.04] hover:bg-rose-500/[0.07]',    'border' => 'border-rose-500/10 hover:border-rose-500/30',   'icon_bg' => 'bg-rose-500/10',   'icon_text' => 'text-rose-600',   'val_text' => 'text-slate-800'],
        ];
        @endphp

        @foreach($topStats as $s)
        @php $c = $colorMap[$s['color']]; @endphp
        <a href="{{ $s['link'] }}" class="group {{ $c['bg'] }} {{ $c['border'] }} border rounded-3xl p-6 flex flex-col gap-4 hover:shadow-xl hover:shadow-slate-200/50 transition-all duration-300 transform hover:-translate-y-1">
            <div class="{{ $c['icon_bg'] }} w-12 h-12 rounded-2xl flex items-center justify-center {{ $c['icon_text'] }} group-hover:scale-105 transition-transform duration-300">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $s['icon'] }}" /></svg>
            </div>
            <div>
                <span class="{{ $c['val_text'] }} text-3xl font-black font-outfit tracking-tight">{{ $s['value'] }}</span>
                <p class="text-slate-400 text-xs font-bold uppercase tracking-wider mt-1.5">{{ $s['label'] }}</p>
            </div>
        </a>
        @endforeach
    </div>

    {{-- ===================== MODULE MANAGEMENT GRID ===================== --}}
    <div>
        <div class="flex items-center justify-between mb-5">
            <h3 class="font-outfit font-black text-xl text-slate-800 tracking-tight">Quick Page Management</h3>
            <span class="h-[1px] flex-1 bg-slate-100 mx-4"></span>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

            {{-- PROJECTS --}}
            <div class="bg-white border border-slate-200/60 rounded-[24px] p-6 hover:shadow-xl hover:shadow-slate-200/40 hover:border-slate-300 transition-all duration-300 flex flex-col gap-5">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3.5">
                        <div class="w-12 h-12 rounded-2xl bg-emerald-500/10 text-emerald-600 flex items-center justify-center shadow-inner">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
                        </div>
                        <div>
                            <h4 class="font-extrabold text-slate-800 text-sm">Projects Reference</h4>
                            <p class="text-xs text-slate-400">Vessel references & highlights</p>
                        </div>
                    </div>
                    <span class="text-2xl font-black text-slate-800 font-outfit">{{ $stats['total_projects'] }}</span>
                </div>
                <div class="border-t border-slate-100/70 pt-4 grid grid-cols-2 gap-3">
                    <a href="{{ route('admin.project-references.index') }}" class="text-center text-xs font-bold text-slate-600 bg-slate-50 hover:bg-slate-100 rounded-xl py-3 transition-colors border border-slate-100">Manage</a>
                    <a href="{{ route('admin.settings.projects') }}" class="text-center text-xs font-bold text-white bg-brand-green hover:bg-green-600 rounded-xl py-3 transition-colors shadow-sm shadow-green-200">Page Settings</a>
                </div>
            </div>

            {{-- HOMEPAGE --}}
            <div class="bg-white border border-slate-200/60 rounded-[24px] p-6 hover:shadow-xl hover:shadow-slate-200/40 hover:border-slate-300 transition-all duration-300 flex flex-col gap-5">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3.5">
                        <div class="w-12 h-12 rounded-2xl bg-blue-500/10 text-blue-600 flex items-center justify-center shadow-inner">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
                        </div>
                        <div>
                            <h4 class="font-extrabold text-slate-800 text-sm">Homepage Panels</h4>
                            <p class="text-xs text-slate-400">Hero banner & general settings</p>
                        </div>
                    </div>
                    <span class="text-2xl font-black text-slate-800 font-outfit">{{ $stats['total_hero_slides'] }}</span>
                </div>
                <div class="border-t border-slate-100/70 pt-4 grid grid-cols-2 gap-3">
                    <a href="{{ route('admin.hero-slides.index') }}" class="text-center text-xs font-bold text-slate-600 bg-slate-50 hover:bg-slate-100 rounded-xl py-3 transition-colors border border-slate-100">Hero Slides</a>
                    <a href="{{ route('admin.settings.index') }}" class="text-center text-xs font-bold text-white bg-blue-600 hover:bg-blue-700 rounded-xl py-3 transition-colors shadow-sm shadow-blue-200">Page Settings</a>
                </div>
                <div class="grid grid-cols-3 gap-2">
                    <a href="{{ route('admin.clients.index') }}" class="text-center text-[10px] font-bold text-slate-500 bg-slate-50 hover:bg-blue-50/50 hover:text-blue-600 rounded-lg py-2 transition-colors">{{ $stats['total_clients'] }} Clients</a>
                    <a href="{{ route('admin.gallery-items.index') }}" class="text-center text-[10px] font-bold text-slate-500 bg-slate-50 hover:bg-blue-50/50 hover:text-blue-600 rounded-lg py-2 transition-colors">{{ $stats['total_gallery_items'] }} Gallery</a>
                    <a href="{{ route('admin.news-events.index') }}" class="text-center text-[10px] font-bold text-slate-500 bg-slate-50 hover:bg-blue-50/50 hover:text-blue-600 rounded-lg py-2 transition-colors">{{ $stats['total_news_events'] }} News</a>
                </div>
            </div>

            {{-- PRODUCTS --}}
            <div class="bg-white border border-slate-200/60 rounded-[24px] p-6 hover:shadow-xl hover:shadow-slate-200/40 hover:border-slate-300 transition-all duration-300 flex flex-col gap-5">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3.5">
                        <div class="w-12 h-12 rounded-2xl bg-indigo-500/10 text-indigo-600 flex items-center justify-center shadow-inner">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" /></svg>
                        </div>
                        <div>
                            <h4 class="font-extrabold text-slate-800 text-sm">Products Catalog</h4>
                            <p class="text-xs text-slate-400">Total catalog counts and lists</p>
                        </div>
                    </div>
                    <span class="text-2xl font-black text-slate-800 font-outfit">{{ $stats['total_products'] }}</span>
                </div>
                <div class="border-t border-slate-100/70 pt-4 grid grid-cols-2 gap-3 text-xs">
                    <a href="{{ route('admin.products.index') }}" class="text-center font-bold text-slate-600 bg-slate-50 hover:bg-slate-100 rounded-xl py-3 transition-colors border border-slate-100">Products</a>
                    <a href="{{ route('admin.product-thumbles.index') }}" class="text-center font-bold text-white bg-indigo-600 hover:bg-indigo-700 rounded-xl py-3 transition-colors shadow-sm shadow-indigo-200">Categories</a>
                </div>
            </div>

            {{-- ABOUT PAGE --}}
            <div class="bg-white border border-slate-200/60 rounded-[24px] p-6 hover:shadow-xl hover:shadow-slate-200/40 hover:border-slate-300 transition-all duration-300 flex flex-col gap-5">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3.5">
                        <div class="w-12 h-12 rounded-2xl bg-amber-500/10 text-amber-600 flex items-center justify-center shadow-inner">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        </div>
                        <div>
                            <h4 class="font-extrabold text-slate-800 text-sm">About Page</h4>
                            <p class="text-xs text-slate-400">Story, values & team highlights</p>
                        </div>
                    </div>
                    <span class="text-2xl font-black text-slate-800 font-outfit">{{ $stats['total_about_highlights'] }}</span>
                </div>
                <div class="border-t border-slate-100/70 pt-4 grid grid-cols-2 gap-3">
                    <a href="{{ route('admin.about-highlights.index') }}" class="text-center text-xs font-bold text-slate-600 bg-slate-50 hover:bg-slate-100 rounded-xl py-3 transition-colors border border-slate-100">Highlights</a>
                    <a href="{{ route('admin.settings.about') }}" class="text-center text-xs font-bold text-white bg-amber-500 hover:bg-amber-600 rounded-xl py-3 transition-colors shadow-sm shadow-amber-200">Page Settings</a>
                </div>
            </div>

            {{-- CONTACT PAGE --}}
            <div class="bg-white border border-slate-200/60 rounded-[24px] p-6 hover:shadow-xl hover:shadow-slate-200/40 hover:border-slate-300 transition-all duration-300 flex flex-col gap-5">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3.5">
                        <div class="w-12 h-12 rounded-2xl bg-rose-500/10 text-rose-600 flex items-center justify-center shadow-inner">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                        </div>
                        <div>
                            <h4 class="font-extrabold text-slate-800 text-sm">Contact Info</h4>
                            <p class="text-xs text-slate-400">Headlines, emails & hotlines</p>
                        </div>
                    </div>
                    <a href="/contact" target="_blank" class="text-[10px] font-bold text-rose-600 bg-rose-50 px-2.5 py-1 rounded-lg hover:bg-rose-100 transition-colors">View Page</a>
                </div>
                <div class="border-t border-slate-100/70 pt-4">
                    <a href="{{ route('admin.settings.contact') }}" class="block text-center text-xs font-bold text-white bg-rose-500 hover:bg-rose-600 rounded-xl py-3 transition-colors shadow-sm shadow-rose-200">Contact Settings</a>
                </div>
            </div>

            {{-- GLOBAL FOOTER --}}
            <div class="bg-white border border-slate-200/60 rounded-[24px] p-6 hover:shadow-xl hover:shadow-slate-200/40 hover:border-slate-300 transition-all duration-300 flex flex-col gap-5">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3.5">
                        <div class="w-12 h-12 rounded-2xl bg-slate-500/10 text-slate-600 flex items-center justify-center shadow-inner">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 14l-7 7m0 0l-7-7m7 7V3" /></svg>
                        </div>
                        <div>
                            <h4 class="font-extrabold text-slate-800 text-sm">Global Footer</h4>
                            <p class="text-xs text-slate-400">Social handles & copyright text</p>
                        </div>
                    </div>
                    <span class="text-[10px] font-bold text-slate-400 bg-slate-50 px-2 py-0.5 rounded-lg border border-slate-100">Global</span>
                </div>
                <div class="border-t border-slate-100/70 pt-4">
                    <a href="{{ route('admin.settings.footer') }}" class="block text-center text-xs font-bold text-white bg-slate-700 hover:bg-slate-800 rounded-xl py-3 transition-colors shadow-sm shadow-slate-900/10">Footer Settings</a>
                </div>
            </div>

        </div>
    </div>

    {{-- ===================== RECENT PROJECTS + QUICK SHORTCUTS ===================== --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 pt-2">
        
        {{-- RECENT PROJECTS TABLE --}}
        <div class="lg:col-span-2 bg-white border border-slate-200/60 rounded-[28px] shadow-[0_10px_30px_rgba(0,0,0,0.02)] overflow-hidden flex flex-col">
            <div class="flex items-center justify-between p-6 border-b border-slate-100">
                <h3 class="font-outfit font-black text-base text-slate-800 tracking-tight">Recent Projects References</h3>
                <a href="{{ route('admin.project-references.index') }}" class="text-xs font-semibold text-brand-green hover:underline">View All &rarr;</a>
            </div>
            <div class="divide-y divide-slate-100 flex-1">
                @forelse($latestProjects as $project)
                <div class="flex items-center gap-4 px-6 py-4 hover:bg-slate-50/50 transition-colors">
                    <div class="w-10 h-10 rounded-xl bg-emerald-500/10 border border-emerald-500/10 flex items-center justify-center text-emerald-600 shrink-0 text-xs font-black font-outfit shadow-sm">
                        #{{ $loop->iteration }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-semibold text-sm text-slate-800 truncate">{{ $project->name }}</p>
                        <p class="text-xs text-slate-400 mt-1 flex items-center gap-1.5">
                            <span class="inline-block w-1.5 h-1.5 rounded-full bg-slate-300"></span>{{ $project->vessel_type ?? 'Marine Project' }}
                            <span class="inline-block w-1.5 h-1.5 rounded-full bg-slate-300"></span>{{ $project->created_at->format('d M Y') }}
                        </p>
                    </div>
                    <a href="{{ route('admin.project-references.edit', $project) }}" class="shrink-0 text-xs font-bold text-slate-500 bg-slate-50 hover:bg-slate-100 border border-slate-200/50 px-3 py-1.5 rounded-lg transition-colors">Edit</a>
                </div>
                @empty
                <div class="px-6 py-12 text-center text-slate-400 text-sm">
                    No projects found. <a href="{{ route('admin.project-references.create') }}" class="text-brand-green font-semibold hover:underline">Add one now.</a>
                </div>
                @endforelse
            </div>
        </div>

        {{-- QUICK SETTINGS SHORTCUTS --}}
        <div class="bg-white border border-slate-200/60 rounded-[28px] shadow-[0_10px_30px_rgba(0,0,0,0.02)] overflow-hidden">
            <div class="p-6 border-b border-slate-100">
                <h3 class="font-outfit font-black text-base text-slate-800 tracking-tight">Page Settings Shortcuts</h3>
            </div>
            <div class="p-4 space-y-1.5">
                @php
                $shortcuts = [
                    ['label' => 'Homepage Story',   'sub' => 'Hero section content', 'route' => route('admin.settings.index'),    'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
                    ['label' => 'About Settings',   'sub' => 'Mission & Vision text',  'route' => route('admin.settings.about'),   'icon' => 'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
                    ['label' => 'Projects Settings','sub' => 'Page title & description','route'=> route('admin.settings.projects'), 'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2'],
                    ['label' => 'Contact Settings', 'sub' => 'Phone, address & map',   'route' => route('admin.settings.contact'), 'icon' => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
                    ['label' => 'Footer Settings',  'sub' => 'Social links & branding', 'route'=> route('admin.settings.footer'),  'icon' => 'M19 14l-7 7m0 0l-7-7m7 7V3'],
                    ['label' => 'Company Stats',    'sub' => 'Numbers & achievements',  'route'=> route('admin.company-stats.index'),'icon' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z'],
                    ['label' => 'Admin Credentials','sub' => 'CMS access password',    'route' => route('admin.settings'),        'icon' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z'],
                ];
                @endphp
                @foreach($shortcuts as $sc)
                <a href="{{ $sc['route'] }}" class="flex items-center gap-3 p-3 rounded-2xl hover:bg-slate-50 transition-colors group">
                    <div class="w-9 h-9 rounded-xl bg-slate-50 border border-slate-100 group-hover:bg-brand-green/10 text-slate-400 group-hover:text-brand-green flex items-center justify-center transition-colors shrink-0">
                        <svg class="w-4.5 h-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $sc['icon'] }}" /></svg>
                    </div>
                    <div class="min-w-0">
                        <p class="text-sm font-semibold text-slate-700 group-hover:text-slate-900 transition-colors">{{ $sc['label'] }}</p>
                        <p class="text-[10px] text-slate-400 truncate">{{ $sc['sub'] }}</p>
                    </div>
                    <svg class="w-4 h-4 text-slate-300 group-hover:text-brand-green transition-colors ml-auto shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
                </a>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ===================== PRODUCT DETAILS GRID ===================== --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 pt-2">
        
        {{-- LATEST PRODUCTS --}}
        <div class="lg:col-span-2 bg-white border border-slate-200/60 rounded-[30px] shadow-[0_15px_40px_rgba(0,0,0,0.015)] overflow-hidden flex flex-col">
            <div class="flex items-center justify-between p-6 border-b border-slate-100 bg-slate-50/20">
                <div>
                    <h3 class="font-outfit font-black text-base text-slate-800 tracking-tight">Latest Catalog Products</h3>
                    <p class="text-[11px] text-slate-400 mt-0.5">Quick status and configuration of recently added catalog items</p>
                </div>
                <a href="{{ route('admin.products.index') }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-slate-50 hover:bg-slate-100 border border-slate-200 text-xs font-bold text-slate-700 transition-all">
                    View Catalog &rarr;
                </a>
            </div>
            <div class="overflow-x-auto flex-1">
                <table class="w-full text-left border-collapse text-sm">
                    <thead>
                        <tr class="bg-slate-50/40 text-slate-500 font-bold text-[10px] uppercase tracking-wider border-b border-slate-100">
                            <th class="px-6 py-4">Preview</th>
                            <th class="px-6 py-4">Product Name</th>
                            <th class="px-6 py-4">Assigned Category</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50/80">
                        @forelse($latestProducts as $prod)
                        <tr class="hover:bg-slate-50/40 transition-colors group">
                            <td class="px-6 py-3.5">
                                <div class="relative overflow-hidden w-12 h-12 rounded-xl border border-slate-200 bg-slate-50 p-1 flex items-center justify-center shadow-sm group-hover:border-slate-300 transition-all">
                                    <img src="{{ $prod->imageUrl() }}" class="max-w-full max-h-full object-contain transform group-hover:scale-105 transition-all">
                                </div>
                            </td>
                            <td class="px-6 py-3.5">
                                <div class="font-bold text-slate-800 tracking-tight">{{ $prod->name }}</div>
                                <div class="text-[10px] text-slate-400 font-mono mt-0.5">ID: #{{ $prod->id }}</div>
                            </td>
                            <td class="px-6 py-3.5">
                                @if($prod->productThumble)
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-[10px] font-bold bg-indigo-500/10 text-indigo-700">
                                        <span class="w-1 h-1 rounded-full bg-indigo-600"></span>
                                        {{ $prod->productThumble->title }}
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-[10px] font-bold bg-slate-100 text-slate-500">
                                        Unassigned
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-3.5">
                                @if($prod->is_active)
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-500/10 text-emerald-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                        Active
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-slate-100 text-slate-400">
                                        <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span>
                                        Hidden
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-3.5 text-right">
                                <a href="{{ route('admin.products.edit', $prod) }}" class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg border border-slate-200 bg-white hover:bg-slate-50 hover:text-brand-green text-xs font-bold text-slate-600 shadow-sm transition-all">
                                    Configure &rarr;
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-slate-400">
                                <div class="flex flex-col items-center justify-center">
                                    <svg class="w-8 h-8 text-slate-300 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" /></svg>
                                    <p class="text-xs">No products configured in the catalog.</p>
                                    <a href="{{ route('admin.products.create') }}" class="text-brand-green font-bold text-xs hover:underline mt-1">Add product</a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- PRODUCT CATEGORIES BREAKDOWN --}}
        <div class="bg-white border border-slate-200/60 rounded-[30px] shadow-[0_15px_40px_rgba(0,0,0,0.015)] overflow-hidden">
            <div class="flex items-center justify-between p-6 border-b border-slate-100 bg-slate-50/20">
                <div>
                    <h3 class="font-outfit font-black text-base text-slate-800 tracking-tight">Categories Breakdown</h3>
                    <p class="text-[11px] text-slate-400 mt-0.5">Assigned products counts by Category (Level 1)</p>
                </div>
                <a href="{{ route('admin.product-thumbles.index') }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-slate-50 hover:bg-slate-100 border border-slate-200 text-xs font-bold text-slate-700 transition-all">
                    Manage &rarr;
                </a>
            </div>
            <div class="p-6 space-y-4">
                @forelse($categoriesWithCount as $cat)
                <div class="flex items-center justify-between p-4 rounded-2xl bg-gradient-to-br from-slate-50/50 to-white border border-slate-200/50 hover:border-slate-300 hover:shadow-md transition-all duration-300 group">
                    <div class="flex items-center gap-4">
                        <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-indigo-500 to-indigo-600 text-white flex items-center justify-center text-sm font-black shadow-md shadow-indigo-500/10 group-hover:scale-105 group-hover:rotate-3 transition-all duration-300 shrink-0">
                            {{ $cat->products_count }}
                        </div>
                        <div class="min-w-0">
                            <p class="text-sm font-extrabold text-slate-800 tracking-tight group-hover:text-brand-green transition-colors truncate">{{ $cat->title }}</p>
                            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wider mt-0.5">{{ $cat->tag }}</p>
                        </div>
                    </div>
                    <a href="{{ route('admin.product-thumbles.edit', $cat) }}" class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-white border border-slate-200 text-slate-400 hover:text-brand-green hover:border-slate-300 hover:shadow-sm transition-all">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                    </a>
                </div>
                @empty
                <div class="py-10 text-center text-slate-400 text-sm">
                    <div class="flex flex-col items-center justify-center">
                        <svg class="w-8 h-8 text-slate-300 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
                        <p class="text-xs">No categories found.</p>
                    </div>
                </div>
                @endforelse
            </div>
        </div>

    </div>

</div>
@endsection
