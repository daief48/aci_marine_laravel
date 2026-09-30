@extends('admin.layouts.admin')
@section('title', 'Edit GalleryItem')
@section('content')
<div class='bg-white rounded shadow p-6 w-full'>
    <form action="{{ route('admin.gallery-items.update', $item) }}" method='POST' enctype='multipart/form-data'>
        @csrf @method('PUT')
        <div class='mb-4'>
            <label class='block text-sm font-medium mb-1'>Category</label>
            <select name='gallery_category_id' class='w-full border rounded p-2 bg-white' required>
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $item->gallery_category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class='mb-4'>
            <label class='block text-sm font-medium mb-1'>image_url</label>
            
        @if(isset($item->image_url) && $item->image_url)
            <div class='mb-2'>
                <img src='{{ asset($item->image_url) }}' class='h-20 object-contain rounded border border-slate-200'>
            </div>
        @endif
        <input type='file' name='image_url' accept='image/*' class='w-full border rounded p-2'>
        <p class='text-xs text-slate-500 mt-1'>Leave empty to keep the current image.</p>
        </div>
        <div class='mb-4'>
            <label class='block text-sm font-medium mb-1'>badge</label>
            <input type='text' name='badge' value="{{ $item->badge }}" class='w-full border rounded p-2'>
        </div>
        <div class='mb-4'>
            <label class='block text-sm font-medium mb-1'>title</label>
            <input type='text' name='title' value="{{ $item->title }}" class='w-full border rounded p-2'>
        </div>
        <div class='mb-4'>
            <label class='block text-sm font-medium mb-1'>description</label>
            <input type='text' name='description' value="{{ $item->description }}" class='w-full border rounded p-2'>
        </div>
        <div class='mb-4 flex items-center'>
            <input type='checkbox' name='is_featured' value='1' id='is_featured' class='mr-2' {{ $item->is_featured ? 'checked' : '' }}>
            <label for='is_featured'>is_featured</label>
        </div>
        <div class='mb-4'>
            <label class='block text-sm font-medium mb-1'>order</label>
            <input type='text' name='order' value="{{ $item->order }}" class='w-full border rounded p-2'>
        </div>
        <div class='mb-4 flex items-center'>
            <input type='checkbox' name='is_active' value='1' id='is_active' class='mr-2' {{ $item->is_active ? 'checked' : '' }}>
            <label for='is_active'>is_active</label>
        </div>
        <button type='submit' class='bg-blue-500 text-white px-4 py-2 rounded'>Update</button>
    </form>
</div>
@endsection
