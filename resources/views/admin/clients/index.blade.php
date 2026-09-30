@extends('admin.layouts.admin')
@section('title', 'Clients')
@section('content')

<!-- Page Header -->
<div class='mb-6'>
    <h2 class='text-2xl font-bold text-slate-800'>Clients Management</h2>
    <p class='text-sm text-slate-500 mt-1'>Manage your website's clients and configure the frontend display.</p>
</div>

<!-- Frontend Settings Accordion -->
<details class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden mb-8 group [&_summary::-webkit-details-marker]:hidden">
    <summary class="p-5 border-b border-slate-100 bg-slate-50/80 hover:bg-slate-50 cursor-pointer flex items-center justify-between transition-colors">
        <div class="flex items-start gap-4">
            <div class="bg-brand-green/10 p-2.5 rounded-lg text-brand-green mt-0.5">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
            </div>
            <div>
                <h3 class="text-base font-bold text-slate-800">Frontend Text Settings</h3>
                <p class="text-xs text-slate-500 mt-1">Configure the subtitle, title, and description text shown on the public clients section.</p>
            </div>
        </div>
        <div class="text-slate-400 group-open:rotate-180 transition-transform duration-200 bg-white shadow-sm border border-slate-200 rounded-full p-1">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
        </div>
    </summary>
    
    <div class="p-6 bg-white">
        <form action="{{ route('admin.settings.update-all') }}" method="POST" class="space-y-5">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">Subtitle</label>
                    <input type="text" name="clients_page_subtitle" value="{{ $settings['clients_page_subtitle'] ?? '' }}" placeholder="e.g. Valued Partners" class="w-full border border-slate-200 rounded-lg p-3 text-sm focus:ring-2 focus:ring-brand-green/20 focus:border-brand-green outline-none transition-all">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">Title</label>
                    <input type="text" name="clients_page_title" value="{{ $settings['clients_page_title'] ?? '' }}" placeholder="e.g. Major Clients" class="w-full border border-slate-200 rounded-lg p-3 text-sm focus:ring-2 focus:ring-brand-green/20 focus:border-brand-green outline-none transition-all">
                </div>
            </div>
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">Description Text</label>
                <textarea name="clients_page_description" rows="3" placeholder="Enter a short paragraph..." class="w-full border border-slate-200 rounded-lg p-3 text-sm focus:ring-2 focus:ring-brand-green/20 focus:border-brand-green outline-none transition-all">{{ $settings['clients_page_description'] ?? '' }}</textarea>
            </div>
            <div class="flex justify-end pt-2">
                <button type="submit" class="bg-slate-800 hover:bg-slate-900 text-white font-semibold text-sm px-6 py-2.5 rounded-lg shadow-sm transition-colors flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    Save Settings
                </button>
            </div>
        </form>
    </div>
</details>

<!-- Clients Data Table -->
<div class='bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden'>
    
    <!-- Table Header Toolbar -->
    <div class="p-5 border-b border-slate-100 bg-white flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <h3 class="text-base font-bold text-slate-800 flex items-center gap-2">
            <svg class="w-5 h-5 text-brand-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            Clients Directory
        </h3>
        
        <div class='flex flex-wrap items-center gap-3'>
            <form action="{{ route('admin.clients.index') }}" method="GET" class="flex items-center gap-3 w-full sm:w-auto">
                <div class="relative w-full sm:w-auto">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search clients..." class="w-full sm:min-w-[240px] pl-10 pr-4 py-2 rounded-lg border border-slate-200 text-sm focus:ring-2 focus:ring-brand-green/20 focus:border-brand-green outline-none bg-slate-50 transition-all">
                    <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <button type="submit" class="hidden">Search</button>
            </form>
            <a href="{{ route('admin.clients.create') }}" class='bg-brand-green hover:bg-green-600 text-white px-5 py-2 rounded-lg shadow-sm font-semibold text-sm transition-colors flex items-center gap-2 whitespace-nowrap'>
                <svg class='w-4 h-4' fill='none' stroke='currentColor' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M12 4v16m8-8H4'></path></svg>
                Add New Client
            </a>
        </div>
    </div>

    <div class='overflow-x-auto'>
        <table class='w-full min-w-full divide-y divide-slate-200'>
            <thead class='bg-slate-50/80'>
                <tr>
                    <th class='p-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider'>Logo</th>
                    <th class='p-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider'>Name</th>
                    <th class='p-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider'>Display Order</th>
                    <th class='p-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider'>Status</th>
                    <th class='p-4 text-right text-xs font-bold text-slate-500 uppercase tracking-wider'>Actions</th>
                </tr>
            </thead>
            <tbody class='bg-white divide-y divide-slate-100'>
                @forelse($items as $item)
                <tr class='hover:bg-slate-50/50 transition-colors group'>
                    <td class='p-4 whitespace-nowrap'>
                        <div class='h-12 w-auto max-w-[100px] flex-shrink-0 bg-white rounded-lg p-1.5 border border-slate-100 shadow-sm flex items-center justify-center'>
                            <img class='max-h-8 max-w-full object-contain' src='{{ asset($item->logo_url) }}' alt='{{ $item->name }}'>
                        </div>
                    </td>
                    <td class='p-4'>
                        <div class='text-sm font-bold text-slate-800'>{{ $item->name ?: 'Unnamed Client' }}</div>
                    </td>
                    <td class='p-4 whitespace-nowrap'>
                        <div class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-slate-100 text-slate-600 text-xs font-bold">
                            {{ $item->order }}
                        </div>
                    </td>
                    <td class='p-4 whitespace-nowrap'>
                        <span class='px-2.5 py-1 inline-flex text-[11px] leading-4 font-bold uppercase tracking-wider rounded-full {{ $item->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}'>
                            {{ $item->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td class='p-4 whitespace-nowrap text-right'>
                        <div class='flex items-center justify-end gap-2'>
                            <a href="{{ route('admin.clients.edit', $item) }}" class='p-2 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors' title='Edit'>
                                <svg class='w-5 h-5' fill='none' stroke='currentColor' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z'></path></svg>
                            </a>
                            <form action="{{ route('admin.clients.destroy', $item) }}" method='POST' class='inline-block m-0 delete-form'>
                                @csrf @method('DELETE')
                                <button type='submit' class='p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors' title='Delete'>
                                    <svg class='w-5 h-5' fill='none' stroke='currentColor' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16'></path></svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan='5' class='p-12 text-center'>
                        <div class='flex flex-col items-center justify-center'>
                            <div class="bg-slate-50 w-16 h-16 rounded-full flex items-center justify-center mb-4">
                                <svg class='w-8 h-8 text-slate-400' fill='none' stroke='currentColor' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z'></path></svg>
                            </div>
                            <h3 class='text-base font-bold text-slate-900'>No clients found</h3>
                            <p class='text-sm text-slate-500 mt-1 mb-4'>Get started by adding your first client to the directory.</p>
                            <a href="{{ route('admin.clients.create') }}" class='text-brand-green font-semibold text-sm hover:text-green-700 hover:underline flex items-center gap-1'>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                Add New Client
                            </a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($items->hasPages())
    <div class='p-4 border-t border-slate-100 bg-slate-50/50'>
        {{ $items->links() }}
    </div>
    @endif
</div>
@endsection