@extends('admin.layouts.admin')
@section('title', 'Footer Settings')
@section('content')

<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="text-2xl font-bold text-slate-800">Footer Settings</h2>
        <p class="text-sm text-slate-500 mt-1">Manage global footer text, social links, and contact information.</p>
    </div>
</div>

<form action="{{ route('admin.settings.update-all') }}" method='POST'>
    @csrf
    
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden max-w-5xl">
        <div class="p-6 md:p-8 space-y-8">
            <!-- Footer Content -->
            <div class="space-y-6">
                <h3 class="text-lg font-bold text-slate-800 border-b border-slate-100 pb-2">Footer Branding & Text</h3>
                
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label class='block text-sm font-semibold text-slate-700 mb-2'>About Text</label>
                        <textarea name='footer_about_text' class='w-full border border-slate-300 rounded-lg p-3 text-sm focus:ring-brand-green focus:border-brand-green' rows='3'>{{ $settings['footer_about_text'] ?? '' }}</textarea>
                    </div>
                </div>

                <h3 class="text-lg font-bold text-slate-800 border-b border-slate-100 pb-2 mt-8">Social Media Links</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class='block text-sm font-semibold text-slate-700 mb-2'>Facebook Link 1</label>
                        <input type="url" name='footer_facebook_1' value="{{ $settings['footer_facebook_1'] ?? '' }}" class='w-full border border-slate-300 rounded-lg p-2 text-sm focus:ring-brand-green focus:border-brand-green'>
                    </div>
                    <div>
                        <label class='block text-sm font-semibold text-slate-700 mb-2'>Facebook Link 2</label>
                        <input type="url" name='footer_facebook_2' value="{{ $settings['footer_facebook_2'] ?? '' }}" class='w-full border border-slate-300 rounded-lg p-2 text-sm focus:ring-brand-green focus:border-brand-green'>
                    </div>
                    <div>
                        <label class='block text-sm font-semibold text-slate-700 mb-2'>LinkedIn Link</label>
                        <input type="url" name='footer_linkedin' value="{{ $settings['footer_linkedin'] ?? '' }}" class='w-full border border-slate-300 rounded-lg p-2 text-sm focus:ring-brand-green focus:border-brand-green'>
                    </div>
                </div>

                <h3 class="text-lg font-bold text-slate-800 border-b border-slate-100 pb-2 mt-8">Footer Contact Info</h3>
                <p class="text-xs text-slate-500 mb-4">Note: Updating these fields will also update the main Contact Page.</p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class='block text-sm font-semibold text-slate-700 mb-2'>Office Address</label>
                        <textarea name='contact_address' class='w-full border border-slate-300 rounded-lg p-3 text-sm focus:ring-brand-green focus:border-brand-green' rows='2'>{{ $settings['contact_address'] ?? '' }}</textarea>
                    </div>
                    <div>
                        <label class='block text-sm font-semibold text-slate-700 mb-2'>Working Hours</label>
                        <textarea name='contact_hours' class='w-full border border-slate-300 rounded-lg p-3 text-sm focus:ring-brand-green focus:border-brand-green' rows='2'>{{ $settings['contact_hours'] ?? '' }}</textarea>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class='block text-sm font-semibold text-slate-700 mb-2'>General Email</label>
                        <input type="email" name='contact_email' value="{{ $settings['contact_email'] ?? '' }}" class='w-full border border-slate-300 rounded-lg p-2 text-sm focus:ring-brand-green focus:border-brand-green'>
                    </div>
                    <div>
                        <label class='block text-sm font-semibold text-slate-700 mb-2'>Main Office Phone</label>
                        <input type="text" name='contact_office_phone' value="{{ $settings['contact_office_phone'] ?? '' }}" class='w-full border border-slate-300 rounded-lg p-2 text-sm focus:ring-brand-green focus:border-brand-green'>
                    </div>
                    <div>
                        <label class='block text-sm font-semibold text-slate-700 mb-2'>Hotline Number</label>
                        <input type="text" name='contact_hotline' value="{{ $settings['contact_hotline'] ?? '' }}" class='w-full border border-slate-300 rounded-lg p-2 text-sm focus:ring-brand-green focus:border-brand-green'>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="p-6 bg-slate-50 border-t border-slate-200 flex justify-end">
            <button type='submit' class='bg-brand-green text-white px-8 py-2.5 rounded-lg shadow-sm font-medium hover:bg-green-600 transition-colors'>
                Save Footer Settings
            </button>
        </div>
    </div>
</form>

@endsection
