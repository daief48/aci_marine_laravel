@extends('admin.layouts.admin')
@section('title', 'General Settings')
@section('content')

<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="text-2xl font-bold text-slate-800">General Settings</h2>
        <p class="text-sm text-slate-500 mt-1">Manage global text, narratives, and statistics for your website.</p>
    </div>
</div>

<form action="{{ route('admin.settings.update-all') }}" method='POST' enctype="multipart/form-data">
    @csrf
    
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden max-w-5xl">
        <div class="p-6 md:p-8 space-y-6">
            <h3 class="text-lg font-bold text-slate-800 mb-4 border-b border-slate-100 pb-2">Homepage Story Section</h3>
            
            <div>
                <label class='block text-sm font-semibold text-slate-700 mb-2'>Story Narrative Paragraph 1</label>
                <textarea name='story_narrative_1' class='w-full border border-slate-300 rounded-lg p-3 text-sm focus:ring-brand-green focus:border-brand-green' rows='4'>{{ $settings['story_narrative_1'] ?? '' }}</textarea>
            </div>

            <div>
                <label class='block text-sm font-semibold text-slate-700 mb-2'>Story Narrative Paragraph 2</label>
                <textarea name='story_narrative_2' class='w-full border border-slate-300 rounded-lg p-3 text-sm focus:ring-brand-green focus:border-brand-green' rows='4'>{{ $settings['story_narrative_2'] ?? '' }}</textarea>
            </div>

            <div>
                <label class='block text-sm font-semibold text-slate-700 mb-2'>Featured Image (Survey Vessel)</label>
                @if(isset($settings['story_featured_image']) && $settings['story_featured_image'])
                    <div class="mb-3">
                        <img src="{{ Str::startsWith($settings['story_featured_image'], 'http') ? $settings['story_featured_image'] : asset($settings['story_featured_image']) }}" class="h-32 object-contain rounded border border-slate-200 bg-slate-50 p-2">
                    </div>
                @endif
                <input type="file" name="story_featured_image" accept="image/*" class='w-full border border-slate-300 rounded-lg p-2 text-sm focus:ring-brand-green focus:border-brand-green'>
                <p class="text-xs text-slate-500 mt-1">Leave empty to keep the current image.</p>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="p-6 bg-slate-50 border-t border-slate-200 flex justify-end">
            <button type='submit' class='bg-brand-green text-white px-8 py-2.5 rounded-lg shadow-sm font-medium hover:bg-green-600 transition-colors'>
                Save All Settings
            </button>
        </div>
    </div>
</form>

@endsection