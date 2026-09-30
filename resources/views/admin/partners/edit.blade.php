@extends('admin.layouts.admin')
@section('title', 'Edit Authorized Partner')

@section('content')
<div class="max-w-4xl mx-auto pb-16">
    <div class="flex items-center justify-between mb-8">
        <div>
            <a href="{{ route('admin.partners.index') }}" class="text-xs font-bold text-brand-green hover:underline flex items-center gap-1 mb-1">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                Back to Partners
            </a>
            <h1 class="text-2xl font-extrabold text-slate-800 tracking-tight">Edit Partner: {{ $partner->name }}</h1>
            <p class="text-xs text-slate-500 mt-0.5">Modify brand details, relationship role, and visual badges.</p>
        </div>
    </div>

    @if ($errors->any())
    <div class="mb-6 bg-red-50 text-red-700 p-4 rounded-xl border border-red-200 text-xs">
        <ul class="list-disc list-inside space-y-1">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.partners.update', $partner) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden p-6 md:p-8 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                        Partner Brand Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="name" value="{{ old('name', $partner->name) }}" required 
                           class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-brand-green focus:ring focus:ring-brand-green/20 text-sm" 
                           placeholder="e.g. MHIET Japan or DAMEN Shipyards">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                        Role / Specialty Subtitle
                    </label>
                    <input type="text" name="role_subtitle" value="{{ old('role_subtitle', $partner->role_subtitle) }}" 
                           class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-brand-green focus:ring focus:ring-brand-green/20 text-sm" 
                           placeholder="e.g. Global Engineering & Technology">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                        Badge Label <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="badge_text" value="{{ old('badge_text', $partner->badge_text) }}" required 
                           class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-brand-green focus:ring focus:ring-brand-green/20 text-sm font-semibold" 
                           placeholder="e.g. Authorized Distributor or Exclusive Partner">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                        Established Year / Label
                    </label>
                    <input type="text" name="estd_year" value="{{ old('estd_year', $partner->estd_year) }}" 
                           class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-brand-green focus:ring focus:ring-brand-green/20 text-sm" 
                           placeholder="e.g. ESTD. 2018">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                        Update Partner Logo File
                    </label>
                    <div class="flex items-center gap-3 mb-2">
                        <div class="h-12 w-20 bg-slate-50 border border-slate-200 rounded-lg p-1.5 flex items-center justify-center shrink-0">
                            <img src="{{ $partner->logoUrl() }}" class="max-h-full max-w-full object-contain" alt="Current Logo">
                        </div>
                        <input type="file" name="logo" accept="image/*" 
                               class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-green-50 file:text-brand-green hover:file:bg-green-100">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                        Or Existing Logo Image Path
                    </label>
                    <input type="text" name="logo_url" value="{{ old('logo_url', $partner->logo) }}" 
                           class="w-full px-4 py-2 rounded-xl border border-slate-300 focus:border-brand-green focus:ring focus:ring-brand-green/20 text-xs font-mono" 
                           placeholder="e.g. image/mitsubishi.png">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                        Partner Website URL (Optional)
                    </label>
                    <input type="url" name="partner_url" value="{{ old('partner_url', $partner->partner_url) }}" 
                           class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-brand-green focus:ring focus:ring-brand-green/20 text-sm" 
                           placeholder="https://www.mhiet.co.jp">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                        Sort Order
                    </label>
                    <input type="number" name="order" value="{{ old('order', $partner->order) }}" min="0" 
                           class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-brand-green focus:ring focus:ring-brand-green/20 text-sm">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                    Partnership Relationship Statement / Narrative
                </label>
                <textarea name="description" rows="3" 
                          class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-brand-green focus:ring focus:ring-brand-green/20 text-sm leading-relaxed" 
                          placeholder="Partnership description...">{{ old('description', $partner->description) }}</textarea>
            </div>

            <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $partner->is_active) ? 'checked' : '' }} 
                           class="rounded text-brand-green focus:ring-brand-green h-4 w-4">
                    <span class="text-xs font-bold text-slate-700">Display Active on Website</span>
                </label>

                <button type="submit" class="bg-brand-green hover:bg-[#1b7430] text-white px-6 py-2.5 rounded-xl font-bold text-xs transition-all shadow-md shadow-green-600/20 hover:shadow-lg">
                    Update Partner
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
