@extends('admin.layouts.admin')
@section('title', 'Projects Page Settings')
@section('content')

<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="text-2xl font-bold text-slate-800">Projects Page Settings</h2>
        <p class="text-sm text-slate-500 mt-1">Manage the header title, subtitle, and description for the Projects page.</p>
    </div>
</div>

<form action="{{ route('admin.settings.update-all') }}" method='POST'>
    @csrf
    
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden max-w-5xl">
        <div class="p-6 md:p-8 space-y-8">
            <!-- General Information -->
            <div class="space-y-6">
                <h3 class="text-lg font-bold text-slate-800 border-b border-slate-100 pb-2">Header Section</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class='block text-sm font-semibold text-slate-700 mb-2'>Page Subtitle (e.g. Reference Projects)</label>
                        <input type="text" name='projects_page_subtitle' value="{{ $settings['projects_page_subtitle'] ?? '' }}" class='w-full border border-slate-300 rounded-lg p-2 text-sm focus:ring-brand-green focus:border-brand-green'>
                    </div>
                    <div>
                        <label class='block text-sm font-semibold text-slate-700 mb-2'>Page Title (e.g. Successful Track Records)</label>
                        <input type="text" name='projects_page_title' value="{{ $settings['projects_page_title'] ?? '' }}" class='w-full border border-slate-300 rounded-lg p-2 text-sm focus:ring-brand-green focus:border-brand-green'>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label class='block text-sm font-semibold text-slate-700 mb-2'>Page Description</label>
                        <textarea name='projects_page_description' class='w-full border border-slate-300 rounded-lg p-3 text-sm focus:ring-brand-green focus:border-brand-green' rows='3'>{{ $settings['projects_page_description'] ?? '' }}</textarea>
                    </div>
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
