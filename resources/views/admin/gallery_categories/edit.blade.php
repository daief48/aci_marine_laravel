@extends('admin.layouts.admin')
@section('title', 'Edit Gallery Category')
@section('content')
<div class='bg-white rounded shadow p-6 w-full'>
    <form action="{{ route('admin.gallery-categories.update', $item) }}" method='POST'>
        @csrf @method('PUT')
        <div class='mb-4'>
            <label class='block text-sm font-medium mb-1'>name</label>
            <input type='text' name='name' value="{{ $item->name }}" class='w-full border rounded p-2'>
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
