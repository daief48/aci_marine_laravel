@extends('admin.layouts.admin')

@section('title', 'Manage Projects')

@section('content')
<div class="space-y-8">
    <!-- Projects Section Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h2 class="font-outfit font-black text-2xl text-slate-800 leading-none">Projects Reference Library</h2>
            <p class="text-xs text-slate-400 font-bold uppercase tracking-wider mt-1.5">Create, Edit & Remove Project Entries</p>
        </div>
        <button onclick="document.getElementById('addProjectModal').classList.remove('hidden')" 
            class="px-5 py-3 bg-brand-green hover:bg-[#1f8736] text-white font-bold text-xs uppercase tracking-wider rounded-xl shadow-[0_10px_20px_rgba(39,168,68,0.15)] transition-all duration-300 flex items-center gap-2 self-start md:self-auto transform hover:-translate-y-0.5">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
            Add New Project
        </button>
    </div>

    <!-- Active Projects Table Card -->
    <div class="bg-white border border-slate-100 rounded-[32px] overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.02)]">
        <div class="p-6 border-b border-slate-50 flex items-center justify-between">
            <h3 class="font-outfit font-black text-slate-800">Existing Records</h3>
            <span class="px-2.5 py-1 bg-slate-50 border border-slate-100 rounded-lg text-[10px] font-bold text-slate-400 font-mono">4 items loaded</span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-100 text-[10px] font-bold uppercase tracking-wider text-slate-400 font-mono">
                        <th class="p-6">Project Title</th>
                        <th class="p-6">Client / Owner</th>
                        <th class="p-6">Vessel Classification</th>
                        <th class="p-6">Vessel Status</th>
                        <th class="p-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100/60 text-sm text-slate-650">
                    <tr class="hover:bg-slate-50/40 transition-colors">
                        <td class="p-6 font-semibold text-slate-800">Payra Dredging Support Vessel</td>
                        <td class="p-6 text-slate-500">Payra Port Authority</td>
                        <td class="p-6">
                            <span class="px-2.5 py-1 bg-brand-green/10 border border-brand-green/15 text-brand-green text-[10px] font-bold uppercase tracking-wider rounded-lg">BV CLASS</span>
                        </td>
                        <td class="p-6">
                            <span class="text-xs text-brand-green font-bold flex items-center">
                                <span class="w-1.5 h-1.5 rounded-full bg-brand-green mr-1.5 inline-block"></span> Delivered
                            </span>
                        </td>
                        <td class="p-6 text-right">
                            <button onclick="alert('Edit action mock trigger')" class="text-slate-400 hover:text-brand-green font-semibold text-xs transition-colors">Edit</button>
                        </td>
                    </tr>
                    <tr class="hover:bg-slate-50/40 transition-colors">
                        <td class="p-6 font-semibold text-slate-800">100T Crane Vessel</td>
                        <td class="p-6 text-slate-500">BIWTA</td>
                        <td class="p-6">
                            <span class="px-2.5 py-1 bg-blue-500/10 border border-blue-500/15 text-blue-500 text-[10px] font-bold uppercase tracking-wider rounded-lg">RINA CLASS</span>
                        </td>
                        <td class="p-6">
                            <span class="text-xs text-brand-green font-bold flex items-center">
                                <span class="w-1.5 h-1.5 rounded-full bg-brand-green mr-1.5 inline-block"></span> Delivered
                            </span>
                        </td>
                        <td class="p-6 text-right">
                            <button onclick="alert('Edit action mock trigger')" class="text-slate-400 hover:text-brand-green font-semibold text-xs transition-colors">Edit</button>
                        </td>
                    </tr>
                    <tr class="hover:bg-slate-50/40 transition-colors">
                        <td class="p-6 font-semibold text-slate-800">20T Bollard Pull Tugboat</td>
                        <td class="p-6 text-slate-500">Chittagong Port Authority</td>
                        <td class="p-6">
                            <span class="px-2.5 py-1 bg-slate-100 border border-slate-200 text-slate-500 text-[10px] font-bold uppercase tracking-wider rounded-lg">LR CLASS</span>
                        </td>
                        <td class="p-6">
                            <span class="text-xs text-brand-green font-bold flex items-center">
                                <span class="w-1.5 h-1.5 rounded-full bg-brand-green mr-1.5 inline-block"></span> Delivered
                            </span>
                        </td>
                        <td class="p-6 text-right">
                            <button onclick="alert('Edit action mock trigger')" class="text-slate-400 hover:text-brand-green font-semibold text-xs transition-colors">Edit</button>
                        </td>
                    </tr>
                    <tr class="hover:bg-slate-50/40 transition-colors">
                        <td class="p-6 font-semibold text-slate-800">Utility Ferry Vessel</td>
                        <td class="p-6 text-slate-500">Private Client</td>
                        <td class="p-6">
                            <span class="px-2.5 py-1 bg-slate-100 border border-slate-200 text-slate-500 text-[10px] font-bold uppercase tracking-wider rounded-lg">LOCAL CLASS</span>
                        </td>
                        <td class="p-6">
                            <span class="text-xs text-brand-red font-bold flex items-center">
                                <span class="w-1.5 h-1.5 rounded-full bg-brand-red mr-1.5 inline-block"></span> Maintenance
                            </span>
                        </td>
                        <td class="p-6 text-right">
                            <button onclick="alert('Edit action mock trigger')" class="text-slate-400 hover:text-brand-green font-semibold text-xs transition-colors">Edit</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Mock Add Project Modal Popup -->
<div id="addProjectModal" class="hidden fixed inset-0 z-50 bg-slate-900/40 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-white border border-slate-100 rounded-[32px] p-8 max-w-lg w-full shadow-2xl relative">
        <button onclick="document.getElementById('addProjectModal').classList.add('hidden')" 
            class="absolute top-6 right-6 text-slate-400 hover:text-slate-600 font-light text-2xl leading-none">&times;</button>
        
        <h3 class="font-outfit font-black text-xl text-slate-800 mb-6">Create New Reference Entry</h3>
        
        <form onsubmit="event.preventDefault(); alert('Success! Project record added to reference index.'); document.getElementById('addProjectModal').classList.add('hidden');" class="space-y-5">
            <div>
                <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-2">Project Name / Title</label>
                <input type="text" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-brand-green focus:bg-white transition-colors text-slate-800">
            </div>
            
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-2">Client Name</label>
                    <input type="text" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-brand-green focus:bg-white transition-colors text-slate-800">
                </div>
                <div>
                    <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-2">Vessel Classification</label>
                    <input type="text" placeholder="e.g. BV CLASS" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-brand-green focus:bg-white transition-colors text-slate-800">
                </div>
            </div>

            <div>
                <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-2">Deliver Status</label>
                <select class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-brand-green focus:bg-white transition-colors text-slate-800">
                    <option value="delivered">Delivered</option>
                    <option value="building">Under Construction</option>
                    <option value="maintenance">Maintenance</option>
                </select>
            </div>

            <button type="submit" 
                class="w-full py-3.5 bg-brand-green hover:bg-[#1f8736] text-white font-bold text-xs uppercase tracking-wider rounded-xl shadow-[0_10px_20px_rgba(39,168,68,0.15)] transition-all duration-300">
                Publish Project Record
            </button>
        </form>
    </div>
</div>
@endsection
