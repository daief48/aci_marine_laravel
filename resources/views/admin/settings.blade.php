@extends('admin.layouts.admin')

@section('title', 'Profile & Settings')

@section('content')
<div class="space-y-8 w-full">
    <!-- Settings Card -->
    <div class="bg-white border border-slate-100 rounded-[32px] p-8 shadow-[0_20px_50px_rgba(0,0,0,0.02)]">
        <h3 class="font-outfit font-black text-xl text-slate-800 mb-6">Security Settings</h3>
        
        <form onsubmit="event.preventDefault(); alert('Security credentials updated successfully.');" class="space-y-6">
            <div>
                <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-2">Display name</label>
                <input type="text" value="{{ Auth::user()->name }}" required 
                    class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3.5 text-sm text-slate-800 focus:outline-none focus:border-brand-green focus:bg-white transition-colors">
            </div>

            <div>
                <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-2">Email Address</label>
                <input type="email" value="{{ Auth::user()->email }}" disabled 
                    class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3.5 text-sm text-slate-500 cursor-not-allowed">
                <span class="text-[10px] text-slate-500 font-medium mt-1.5 block">Email address cannot be changed. Contact site developer for assistance.</span>
            </div>

            <div class="border-t border-slate-100/80 pt-6 space-y-6">
                <h4 class="font-outfit font-black text-base text-slate-800">Change Password</h4>
                
                <div>
                    <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-2">New Password</label>
                    <input type="password" placeholder="Enter new password" required
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3.5 text-sm text-slate-800 focus:outline-none focus:border-brand-green focus:bg-white transition-colors">
                </div>

                <div>
                    <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-2">Confirm Password</label>
                    <input type="password" placeholder="Confirm new password" required
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3.5 text-sm text-slate-800 focus:outline-none focus:border-brand-green focus:bg-white transition-colors">
                </div>
            </div>

            <button type="submit" 
                class="w-full py-4 bg-brand-green hover:bg-[#1f8736] text-white font-bold text-xs uppercase tracking-wider rounded-xl shadow-[0_10px_20px_rgba(39,168,68,0.15)] transition-all duration-300 transform hover:-translate-y-0.5">
                Update Profile Configuration
            </button>
        </form>
    </div>
</div>
@endsection
