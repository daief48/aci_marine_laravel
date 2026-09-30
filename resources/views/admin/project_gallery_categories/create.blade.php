@extends('admin.layouts.admin')
@section('title', 'Create Project Gallery Category')
@section('content')
<div class="mb-6">
    <h2 class="text-2xl font-bold text-slate-800">Create Project Gallery Category</h2>
    <p class="text-sm text-slate-500 mt-1">Add a new category for grouping project detail gallery items.</p>
</div>

<div class='bg-white rounded-xl shadow-sm border border-slate-200 p-6 max-w-2xl'>
    <form action="{{ route('admin.project-gallery-categories.store') }}" method='POST'>
        @csrf
        <div class='mb-4'>
            <label class='block text-sm font-semibold text-slate-700 mb-1'>Category Name</label>
            <input type='text' name='name' value="{{ old('name') }}" required class='w-full border border-slate-300 rounded-lg p-2.5 text-sm focus:ring focus:ring-brand-green/20 focus:border-brand-green outline-none bg-white'>
        </div>
        <div class='mb-4'>
            <label class='block text-sm font-semibold text-slate-700 mb-1'>Sort Order</label>
            <input type='number' name='order' value="{{ old('order', 0) }}" class='w-full border border-slate-300 rounded-lg p-2.5 text-sm focus:ring focus:ring-brand-green/20 focus:border-brand-green outline-none bg-white'>
        </div>
        <div class='mb-6 flex items-center'>
            <input type='checkbox' name='is_active' value='1' id='is_active' class='mr-2 border-slate-300 rounded text-brand-green focus:ring-brand-green' checked>
            <label for='is_active' class="text-sm font-medium text-slate-700">Is Active</label>
        </div>
        <div class="flex items-center gap-3">
            <button type='submit' class='bg-brand-green hover:bg-green-600 text-white px-6 py-2.5 rounded-lg shadow-sm font-medium text-sm transition-colors'>Save Category</button>
            <a href="{{ route('admin.project-gallery-categories.index') }}" class="px-6 py-2.5 rounded-lg border border-slate-300 text-slate-700 font-medium text-sm hover:bg-slate-50 transition-colors">Cancel</a>
        </div>
    </form>
</div>
@endsection
