@extends('admin.layouts.admin')
@section('title', 'Create GalleryItem')
@section('content')
<div class='bg-white rounded shadow p-6 w-full'>
    <form action="{{ route('admin.gallery-items.store') }}" method='POST' enctype='multipart/form-data'>
        @csrf
        <div class='mb-4'>
            <label class='block text-sm font-medium mb-1'>Category</label>
            <select name='gallery_category_id' class='w-full border rounded p-2 bg-white' required>
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class='mb-4'>
            <label class='block text-sm font-medium mb-1'>image_url</label>
            <input type='file' name='image_url' accept='image/*' class='w-full border rounded p-2'>
        </div>
        <div class='mb-4'>
            <label class='block text-sm font-medium mb-1'>badge</label>
            <input type='text' name='badge' class='w-full border rounded p-2'>
        </div>
        <div class='mb-4'>
            <label class='block text-sm font-medium mb-1'>title</label>
            <input type='text' name='title' class='w-full border rounded p-2'>
        </div>
        <div class='mb-4'>
            <label class='block text-sm font-medium mb-1'>description</label>
            <input type='text' name='description' class='w-full border rounded p-2'>
        </div>
        <div class='mb-4 flex items-center'>
            <input type='checkbox' name='is_featured' value='1' id='is_featured' class='mr-2' checked>
            <label for='is_featured'>is_featured</label>
        </div>
        <div class='mb-4'>
            <label class='block text-sm font-medium mb-1'>order</label>
            <input type='text' name='order' class='w-full border rounded p-2'>
        </div>
        <div class='mb-4 flex items-center'>
            <input type='checkbox' name='is_active' value='1' id='is_active' class='mr-2' checked>
            <label for='is_active'>is_active</label>
        </div>
        <button type='submit' class='bg-brand-green text-white px-4 py-2 rounded'>Save</button>
    </form>
</div>
@endsection
