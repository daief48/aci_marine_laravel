@extends('admin.layouts.admin')
@section('title', 'Edit About Highlight')
@section('content')
<div class='bg-white rounded shadow p-6 w-full'>
    <form action="{{ route('admin.about-highlights.update', $item) }}" method='POST'>
        @csrf @method('PUT')
        <div class='mb-4'>
            <label class='block text-sm font-medium mb-1'>Title</label>
            <input type='text' name='title' value="{{ $item->title }}" class='w-full border rounded p-2' required>
        </div>
        <div class='mb-4'>
            <label class='block text-sm font-medium mb-1'>Description</label>
            <textarea name='description' class='w-full border rounded p-2' rows="4" required>{{ $item->description }}</textarea>
        </div>
        <button type='submit' class='bg-blue-500 text-white px-4 py-2 rounded'>Update</button>
    </form>
</div>
@endsection
