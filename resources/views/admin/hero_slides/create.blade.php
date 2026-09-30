@extends('admin.layouts.admin')

@section('title', 'Create Hero Slide')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Create New Slide</h1>
            <p class="text-sm text-slate-500 mt-1">Add a new dynamic hero slide to the homepage.</p>
        </div>
        <a href="{{ route('admin.hero-slides.index') }}" class="text-slate-500 hover:text-slate-700 font-medium text-sm flex items-center gap-2 transition-colors">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to List
        </a>
    </div>

    <form action="{{ route('admin.hero-slides.store') }}" method="POST" class="bg-white border border-slate-200/60 rounded-2xl shadow-sm overflow-hidden p-8">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div class="md:col-span-2">
                <label for="title" class="block text-sm font-semibold text-slate-700 mb-2">Main Title <span class="text-red-500">*</span></label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:bg-white focus:border-brand-green focus:ring-1 focus:ring-brand-green transition-all" required placeholder="e.g. Robust vessels for national security">
                @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="md:col-span-2">
                <label for="subtitle" class="block text-sm font-semibold text-slate-700 mb-2">Subtitle</label>
                <input type="text" name="subtitle" id="subtitle" value="{{ old('subtitle') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:bg-white focus:border-brand-green focus:ring-1 focus:ring-brand-green transition-all" placeholder="e.g. ACI Marine - The trusted choice">
                @error('subtitle') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="md:col-span-2">
                <div class="bg-blue-50 border border-blue-200 rounded-xl p-4 text-sm text-blue-700">
                    <strong>ℹ️ Hero Background Video</strong> is now a global setting shared by all slides.<br>
                    To change the video, go to <a href="{{ route('admin.settings.index') }}" class="underline font-semibold">Homepage Settings</a>.
                </div>
            </div>

            <div>
                <label for="link_text" class="block text-sm font-semibold text-slate-700 mb-2">Button Link Text</label>
                <input type="text" name="link_text" id="link_text" value="{{ old('link_text') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:bg-white focus:border-brand-green focus:ring-1 focus:ring-brand-green transition-all" placeholder="e.g. Read more">
                @error('link_text') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="link_url" class="block text-sm font-semibold text-slate-700 mb-2">Button Link URL</label>
                <input type="text" name="link_url" id="link_url" value="{{ old('link_url') }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:bg-white focus:border-brand-green focus:ring-1 focus:ring-brand-green transition-all" placeholder="e.g. #/articles/news">
                @error('link_url') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="text_color" class="block text-sm font-semibold text-slate-700 mb-2">Text Color Theme</label>
                <select name="text_color" id="text_color" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:bg-white focus:border-brand-green focus:ring-1 focus:ring-brand-green transition-all">
                    <option value="light" {{ old('text_color') == 'light' ? 'selected' : '' }}>Light (White text for dark videos)</option>
                    <option value="dark" {{ old('text_color') == 'dark' ? 'selected' : '' }}>Dark (Dark text for light videos)</option>
                </select>
                @error('text_color') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="order" class="block text-sm font-semibold text-slate-700 mb-2">Display Order</label>
                <input type="number" name="order" id="order" value="{{ old('order', 0) }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:bg-white focus:border-brand-green focus:ring-1 focus:ring-brand-green transition-all" required min="0">
                @error('order') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="md:col-span-2 mt-2">
                <label class="flex items-center gap-3 cursor-pointer">
                    <div class="relative flex items-center">
                        <input type="checkbox" name="is_active" value="1" class="peer sr-only" checked>
                        <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-brand-green"></div>
                    </div>
                    <span class="text-sm font-semibold text-slate-700">Slide is Active</span>
                </label>
            </div>
        </div>

        <div class="pt-6 border-t border-slate-100 flex justify-end gap-3">
            <a href="{{ route('admin.hero-slides.index') }}" class="px-5 py-2.5 rounded-xl text-sm font-medium text-slate-600 hover:bg-slate-100 transition-colors">Cancel</a>
            <button type="submit" class="bg-brand-green hover:bg-[#1b7430] text-white px-6 py-2.5 rounded-xl font-semibold text-sm transition-colors shadow-sm">Save Slide</button>
        </div>
    </form>
</div>
@endsection
