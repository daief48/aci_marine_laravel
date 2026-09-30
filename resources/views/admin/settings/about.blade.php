@extends('admin.layouts.admin')
@section('title', 'About Page Settings')
@section('content')

<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="text-2xl font-bold text-slate-800">About Page Settings</h2>
        <p class="text-sm text-slate-500 mt-1">Manage texts, gauges, and narratives for the About Page.</p>
    </div>
</div>

<form action="{{ route('admin.settings.update-all') }}" method='POST'>
    @csrf
    
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden max-w-5xl">
        <div class="p-6 md:p-8 space-y-8">
            <!-- Mission & Vision -->
            <div class="space-y-6">
                <h3 class="text-lg font-bold text-slate-800 border-b border-slate-100 pb-2">Mission & Vision</h3>
                <div>
                    <label class='block text-sm font-semibold text-slate-700 mb-2'>Mission Paragraph</label>
                    <textarea name='about_mission_paragraph' class='w-full border border-slate-300 rounded-lg p-3 text-sm focus:ring-brand-green focus:border-brand-green' rows='4'>{{ $settings['about_mission_paragraph'] ?? '' }}</textarea>
                </div>
                <div>
                    <label class='block text-sm font-semibold text-slate-700 mb-2'>Vision Paragraph</label>
                    <textarea name='about_vision_paragraph' class='w-full border border-slate-300 rounded-lg p-3 text-sm focus:ring-brand-green focus:border-brand-green' rows='4'>{{ $settings['about_vision_paragraph'] ?? '' }}</textarea>
                </div>
                <div>
                    <label class='block text-sm font-semibold text-slate-700 mb-2'>Blockquote (Journey)</label>
                    <textarea name='about_quote' class='w-full border border-slate-300 rounded-lg p-3 text-sm focus:ring-brand-green focus:border-brand-green' rows='3'>{{ $settings['about_quote'] ?? '' }}</textarea>
                </div>
            </div>

            <!-- Partnership Details -->
            <div class="space-y-6 pt-4">
                <h3 class="text-lg font-bold text-slate-800 border-b border-slate-100 pb-2">Mitsubishi Partnership Narrative</h3>
                <div>
                    <label class='block text-sm font-semibold text-slate-700 mb-2'>Partnership Paragraph 1</label>
                    <textarea name='about_partnership_paragraph_1' class='w-full border border-slate-300 rounded-lg p-3 text-sm focus:ring-brand-green focus:border-brand-green' rows='3'>{{ $settings['about_partnership_paragraph_1'] ?? '' }}</textarea>
                </div>
                <div>
                    <label class='block text-sm font-semibold text-slate-700 mb-2'>Partnership Paragraph 2</label>
                    <textarea name='about_partnership_paragraph_2' class='w-full border border-slate-300 rounded-lg p-3 text-sm focus:ring-brand-green focus:border-brand-green' rows='3'>{{ $settings['about_partnership_paragraph_2'] ?? '' }}</textarea>
                </div>
                <div>
                    <label class='block text-sm font-semibold text-slate-700 mb-2'>Partnership Paragraph 3</label>
                    <textarea name='about_partnership_paragraph_3' class='w-full border border-slate-300 rounded-lg p-3 text-sm focus:ring-brand-green focus:border-brand-green' rows='3'>{{ $settings['about_partnership_paragraph_3'] ?? '' }}</textarea>
                </div>
            </div>

            <!-- Technical Gauges -->
            <div class="space-y-6 pt-4">
                <h3 class="text-lg font-bold text-slate-800 border-b border-slate-100 pb-2">Technical Specs & Performance Gauges</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class='block text-sm font-semibold text-slate-700 mb-2'>Output Range Text</label>
                        <input type="text" name='about_output_range' value="{{ $settings['about_output_range'] ?? '' }}" class='w-full border border-slate-300 rounded-lg p-2 text-sm focus:ring-brand-green focus:border-brand-green'>
                    </div>
                    <div>
                        <label class='block text-sm font-semibold text-slate-700 mb-2'>Duty Rating Text</label>
                        <input type="text" name='about_duty_rating' value="{{ $settings['about_duty_rating'] ?? '' }}" class='w-full border border-slate-300 rounded-lg p-2 text-sm focus:ring-brand-green focus:border-brand-green'>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-slate-50 p-4 rounded-lg border border-slate-200">
                        <label class='block text-xs font-semibold text-slate-700 mb-1 uppercase tracking-wider'>Engine Durability (%)</label>
                        <input type="number" name='about_durability_value' value="{{ $settings['about_durability_value'] ?? '' }}" min="0" max="100" class='w-full border border-slate-300 rounded-lg p-2 text-sm mb-2'>
                    </div>
                    <div class="bg-slate-50 p-4 rounded-lg border border-slate-200">
                        <label class='block text-xs font-semibold text-slate-700 mb-1 uppercase tracking-wider'>Fuel Efficiency (%)</label>
                        <input type="number" name='about_efficiency_value' value="{{ $settings['about_efficiency_value'] ?? '' }}" min="0" max="100" class='w-full border border-slate-300 rounded-lg p-2 text-sm mb-2'>
                    </div>
                    <div class="bg-slate-50 p-4 rounded-lg border border-slate-200">
                        <label class='block text-xs font-semibold text-slate-700 mb-1 uppercase tracking-wider'>Lubricant Economy (%)</label>
                        <input type="number" name='about_economy_value' value="{{ $settings['about_economy_value'] ?? '' }}" min="0" max="100" class='w-full border border-slate-300 rounded-lg p-2 text-sm mb-2'>
                    </div>
                </div>
            </div>

            <!-- Conclusion -->
            <div class="space-y-6 pt-4 border-t border-slate-100">
                <div>
                    <label class='block text-sm font-semibold text-slate-700 mb-2'>Concluding Paragraph</label>
                    <textarea name='about_conclusion_paragraph' class='w-full border border-slate-300 rounded-lg p-3 text-sm focus:ring-brand-green focus:border-brand-green' rows='4'>{{ $settings['about_conclusion_paragraph'] ?? '' }}</textarea>
                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="p-6 bg-slate-50 border-t border-slate-200 flex justify-end">
            <button type='submit' class='bg-brand-green text-white px-8 py-2.5 rounded-lg shadow-sm font-medium hover:bg-green-600 transition-colors'>
                Save Settings
            </button>
        </div>
    </div>
</form>

@endsection
