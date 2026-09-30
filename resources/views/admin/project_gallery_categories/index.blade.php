@extends('admin.layouts.admin')
@section('title', 'Project Gallery Categories')
@section('content')
<div class='mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4'>
    <div>
        <h2 class='text-2xl font-bold text-slate-800'>Project Gallery Categories</h2>
        <p class='text-sm text-slate-500 mt-1'>Manage categories used inside project references gallery items.</p>
    </div>
    <div class='flex items-center gap-3 self-start sm:self-auto'>
        <form action="{{ route('admin.project-gallery-categories.index') }}" method="GET" class="flex items-center gap-3">
            <div class="relative">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search categories..." class="pl-9 pr-4 py-2.5 rounded-lg border border-slate-300 text-sm focus:ring focus:ring-brand-green/20 focus:border-brand-green outline-none bg-white min-w-[200px]">
                <svg class="w-4 h-4 text-slate-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>
            <button type="submit" class="hidden">Search</button>
        </form>
        <a href="{{ route('admin.project-gallery-categories.create') }}" class='bg-brand-green hover:bg-green-600 text-white px-5 py-2.5 rounded-lg shadow-sm font-medium text-sm transition-colors flex items-center gap-2 whitespace-nowrap'>
            <svg class='w-4 h-4' fill='none' stroke='currentColor' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M12 4v16m8-8H4'></path></svg>
            Add New
        </a>
    </div>
</div>

<div class='bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden'>
    <div class='overflow-x-auto'>
        <table class='w-full min-w-full divide-y divide-slate-200'>
            <thead class='bg-slate-50'>
                <tr>
                    <th class='p-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider'>Category Name</th>
                    <th class='p-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider'>Order</th>
                    <th class='p-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider'>Status</th>
                    <th class='p-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider'>Actions</th>
                </tr>
            </thead>
            <tbody class='bg-white divide-y divide-slate-200'>
                @forelse($items as $item)
                <tr class='hover:bg-slate-50/50 transition-colors'>
                    <td class='p-4'>
                        <div class='text-sm font-medium text-slate-600'>{{ $item->name }}</div>
                    </td>
                    <td class='p-4 whitespace-nowrap text-sm text-slate-500'>{{ $item->order }}</td>
                    <td class='p-4 whitespace-nowrap'>
                        <span class='px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $item->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}'>
                            {{ $item->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td class='p-4 whitespace-nowrap text-sm font-medium'>
                        <div class='flex items-center gap-3'>
                            <a href="{{ route('admin.project-gallery-categories.edit', $item) }}" class='text-slate-400 hover:text-blue-600 transition-colors' title='Edit'>
                                <svg class='w-5 h-5' fill='none' stroke='currentColor' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z'></path></svg>
                            </a>
                            <form action="{{ route('admin.project-gallery-categories.destroy', $item) }}" method='POST' class='inline-block m-0 delete-form'>
                                @csrf @method('DELETE')
                                <button type='submit' class='text-slate-400 hover:text-red-600 transition-colors' title='Delete'>
                                    <svg class='w-5 h-5' fill='none' stroke='currentColor' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16'></path></svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="p-8 text-center text-sm text-slate-400">
                        No project gallery categories found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($items->hasPages())
    <div class="p-4 border-t border-slate-200">
        {{ $items->links() }}
    </div>
    @endif
</div>
@endsection
