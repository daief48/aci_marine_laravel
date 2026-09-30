@extends('admin.layouts.admin')
@section('title', 'Create Gallery Category')
@section('content')
<div class='bg-white rounded shadow p-6 w-full'>
    <form action="{{ route('admin.gallery-categories.store') }}" method='POST'>
        @csrf
        <div class='mb-4'>
            <label class='block text-sm font-medium mb-1'>name</label>
            <input type='text' name='name' class='w-full border rounded p-2'>
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
