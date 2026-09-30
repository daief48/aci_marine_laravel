@extends('admin.layouts.admin')
@section('title', 'Manage About Highlights')
@section('content')
<div class='flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6'>
    <div>
        <h2 class='text-2xl font-bold text-slate-800'>About Highlights</h2>
        <p class='text-sm text-slate-500 mt-1'>Manage your website's About Highlights.</p>
    </div>
    <div class='flex items-center gap-3 self-start sm:self-auto'>
        <form action="{{ route('admin.about-highlights.index') }}" method="GET" class="flex items-center gap-3">
            <div class="relative">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search highlights..." class="pl-9 pr-4 py-2.5 rounded-lg border border-slate-300 text-sm focus:ring focus:ring-brand-green/20 focus:border-brand-green outline-none bg-white min-w-[200px]">
                <svg class="w-4 h-4 text-slate-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>
            <button type="submit" class="hidden">Search</button>
        </form>
        <a href="{{ route('admin.about-highlights.create') }}" class='bg-brand-green text-white px-5 py-2.5 rounded-lg shadow-sm font-medium text-sm transition-colors hover:bg-green-600 flex items-center gap-2 whitespace-nowrap'>
            <svg class='w-4 h-4' fill='none' stroke='currentColor' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M12 4v16m8-8H4'></path></svg>
            Add New
        </a>
    </div>
</div>
<div class='bg-white rounded shadow overflow-x-auto'>
    <table class='w-full'>
        <thead class='bg-slate-100 border-b'>
            <tr>
                <th class='p-3 text-left text-sm font-semibold text-slate-700'>ID</th>
                <th class='p-3 text-left text-sm font-semibold text-slate-700'>Title</th>
                <th class='p-3 text-left text-sm font-semibold text-slate-700'>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
            <tr class='border-b hover:bg-slate-50'>
                <td class='p-3'>{{ $item->id }}</td>
                <td class='p-3'>{{ $item->title }}</td>
                <td class='p-3 flex gap-2'>
                    <a href="{{ route('admin.about-highlights.edit', $item) }}" class='text-blue-500'>Edit</a>
                    <form action="{{ route('admin.about-highlights.destroy', $item) }}" method='POST' class="delete-form inline-block">
                        @csrf @method('DELETE')
                        <button type='submit' class='text-red-500'>Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="mt-4">
    {{ $items->links() }}
</div>
@endsection
