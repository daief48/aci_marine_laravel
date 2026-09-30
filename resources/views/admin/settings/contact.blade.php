@extends('admin.layouts.admin')
@section('title', 'Contact Page Settings')
@section('content')

<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="text-2xl font-bold text-slate-800">Contact Page Settings</h2>
        <p class="text-sm text-slate-500 mt-1">Manage office addresses, emails, and hotline numbers for the Contact Page.</p>
    </div>
</div>

<form action="{{ route('admin.settings.update-all') }}" method='POST'>
    @csrf
    
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden max-w-5xl">
        <div class="p-6 md:p-8 space-y-8">
            <!-- General Information -->
            <div class="space-y-6">
                <h3 class="text-lg font-bold text-slate-800 border-b border-slate-100 pb-2">General Information</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class='block text-sm font-semibold text-slate-700 mb-2'>Office Address</label>
                        <textarea name='contact_address' class='w-full border border-slate-300 rounded-lg p-3 text-sm focus:ring-brand-green focus:border-brand-green' rows='3'>{{ $settings['contact_address'] ?? '' }}</textarea>
                    </div>
                    <div>
                        <label class='block text-sm font-semibold text-slate-700 mb-2'>Google Maps Embed URL</label>
                        <textarea name='contact_map_url' class='w-full border border-slate-300 rounded-lg p-3 text-sm focus:ring-brand-green focus:border-brand-green' rows='3'>{{ $settings['contact_map_url'] ?? '' }}</textarea>
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

            <!-- Department Direct Lines -->
            <div class="space-y-6 pt-4">
                <h3 class="text-lg font-bold text-slate-800 border-b border-slate-100 pb-2">Department Direct Lines</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Propulsion -->
                    <div class="bg-slate-50 p-4 rounded-lg border border-slate-200">
                        <label class='block text-sm font-semibold text-slate-800 mb-4'>Propulsion & Systems</label>
                        <div class="space-y-3">
                            <div>
                                <label class='block text-xs font-semibold text-slate-600 mb-1'>Phone 1</label>
                                <input type="text" name='contact_dept_propulsion_1' value="{{ $settings['contact_dept_propulsion_1'] ?? '' }}" class='w-full border border-slate-300 rounded-lg p-2 text-sm'>
                            </div>
                            <div>
                                <label class='block text-xs font-semibold text-slate-600 mb-1'>Phone 2</label>
                                <input type="text" name='contact_dept_propulsion_2' value="{{ $settings['contact_dept_propulsion_2'] ?? '' }}" class='w-full border border-slate-300 rounded-lg p-2 text-sm'>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Service -->
                    <div class="bg-slate-50 p-4 rounded-lg border border-slate-200">
                        <label class='block text-sm font-semibold text-slate-800 mb-4'>Maintenance & Support</label>
                        <div class="space-y-3">
                            <div>
                                <label class='block text-xs font-semibold text-slate-600 mb-1'>Phone 1</label>
                                <input type="text" name='contact_dept_service_1' value="{{ $settings['contact_dept_service_1'] ?? '' }}" class='w-full border border-slate-300 rounded-lg p-2 text-sm'>
                            </div>
                            <div>
                                <label class='block text-xs font-semibold text-slate-600 mb-1'>Phone 2</label>
                                <input type="text" name='contact_dept_service_2' value="{{ $settings['contact_dept_service_2'] ?? '' }}" class='w-full border border-slate-300 rounded-lg p-2 text-sm'>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Vessel -->
                    <div class="bg-slate-50 p-4 rounded-lg border border-slate-200">
                        <label class='block text-sm font-semibold text-slate-800 mb-4'>Vessel Construction</label>
                        <div class="space-y-3">
                            <div>
                                <label class='block text-xs font-semibold text-slate-600 mb-1'>Phone 1</label>
                                <input type="text" name='contact_dept_vessel' value="{{ $settings['contact_dept_vessel'] ?? '' }}" class='w-full border border-slate-300 rounded-lg p-2 text-sm'>
                            </div>
                        </div>
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
