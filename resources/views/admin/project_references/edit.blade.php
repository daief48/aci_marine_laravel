@extends('admin.layouts.admin')
@section('title', 'Edit Project Reference')
@section('content')

<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="text-2xl font-bold text-slate-800">Edit Project: {{ $projectReference->title }}</h2>
        <p class="text-sm text-slate-500 mt-1">Update details for this dynamic project.</p>
    </div>
    <a href="{{ route('admin.project-references.index') }}" class="text-slate-500 hover:text-slate-800 font-medium text-sm transition-colors flex items-center gap-2">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Back to List
    </a>
</div>

<form action="{{ route('admin.project-references.update', $projectReference->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @include('admin.project_references._form', ['project' => $projectReference])
</form>

@endsection
