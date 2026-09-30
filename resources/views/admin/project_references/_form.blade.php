<div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden max-w-6xl">
    <div class="p-6 md:p-8 space-y-8">

        <!-- Basic Project Details -->
        <div class="space-y-6">
            <h3 class="text-lg font-bold text-slate-800 border-b border-slate-100 pb-2">Basic Project Details</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class='block text-sm font-semibold text-slate-700 mb-2'>Project Title</label>
                    <input type="text" name='title' value="{{ old('title', $project?->title) }}" required class='w-full border border-slate-300 rounded-lg p-2.5 text-sm focus:ring-brand-green focus:border-brand-green'>
                </div>
                <div>
                    <label class='block text-sm font-semibold text-slate-700 mb-2'>Slug (Unique ID e.g., 'tugboat')</label>
                    <input type="text" name='slug' value="{{ old('slug', $project?->slug) }}" required class='w-full border border-slate-300 rounded-lg p-2.5 text-sm focus:ring-brand-green focus:border-brand-green'>
                </div>
                <div>
                    <label class='block text-sm font-semibold text-slate-700 mb-2'>Vessel Type</label>
                    <input type="text" name='vessel_type' value="{{ old('vessel_type', $project?->vessel_type) }}" required class='w-full border border-slate-300 rounded-lg p-2.5 text-sm focus:ring-brand-green focus:border-brand-green'>
                </div>
                <div>
                    <label class='block text-sm font-semibold text-slate-700 mb-2'>Project Category</label>
                    <input type="text" name='project_category' value="{{ old('project_category', $project?->project_category) }}" required class='w-full border border-slate-300 rounded-lg p-2.5 text-sm focus:ring-brand-green focus:border-brand-green'>
                </div>
                <div>
                    <label class='block text-sm font-semibold text-slate-700 mb-2'>Client</label>
                    <input type="text" name='client' value="{{ old('client', $project?->client) }}" required class='w-full border border-slate-300 rounded-lg p-2.5 text-sm focus:ring-brand-green focus:border-brand-green'>
                </div>
                <div>
                    <label class='block text-sm font-semibold text-slate-700 mb-2'>End Owner</label>
                    <input type="text" name='end_owner' value="{{ old('end_owner', $project?->end_owner) }}" required class='w-full border border-slate-300 rounded-lg p-2.5 text-sm focus:ring-brand-green focus:border-brand-green'>
                </div>
                <div>
                    <label class='block text-sm font-semibold text-slate-700 mb-2'>Classification Society</label>
                    <input type="text" name='classification' value="{{ old('classification', $project?->classification) }}" required class='w-full border border-slate-300 rounded-lg p-2.5 text-sm focus:ring-brand-green focus:border-brand-green'>
                </div>
                <div>
                    <label class='block text-sm font-semibold text-slate-700 mb-2'>Hero Background Image</label>
                    <input type="file" name='hero_bg' accept="image/*" class='w-full border border-slate-300 rounded-lg p-2 text-sm focus:ring-brand-green focus:border-brand-green'>
                    @if($project?->hero_bg)
                        <div class="mt-2 text-xs text-slate-500">Current: <a href="{{ asset($project->hero_bg) }}" target="_blank" class="text-blue-600 underline">View Image</a></div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Overview Section -->
        <div class="space-y-6 pt-4 border-t border-slate-100">
            <h3 class="text-lg font-bold text-slate-800 border-b border-slate-100 pb-2">Overview Section</h3>
            
            <div>
                <label class='block text-sm font-semibold text-slate-700 mb-2'>Overview Heading</label>
                <input type="text" name='overview_heading' value="{{ old('overview_heading', $project?->overview_heading) }}" required class='w-full border border-slate-300 rounded-lg p-2.5 text-sm focus:ring-brand-green focus:border-brand-green'>
            </div>
            <div>
                <label class='block text-sm font-semibold text-slate-700 mb-2'>Overview Paragraph</label>
                <textarea name='overview_text' rows="4" required class='w-full border border-slate-300 rounded-lg p-3 text-sm focus:ring-brand-green focus:border-brand-green'>{{ old('overview_text', $project?->overview_text) }}</textarea>
            </div>
        </div>

        <!-- Technical Specs & Diagram -->
        <div class="space-y-6 pt-4 border-t border-slate-100">
            <h3 class="text-lg font-bold text-slate-800 border-b border-slate-100 pb-2">Technical Specs & Diagram Labels</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Engine -->
                <div class="bg-slate-50 p-4 rounded-lg border border-slate-200">
                    <h4 class="font-bold text-slate-700 mb-4">Engine Details</h4>
                    <div class="space-y-3">
                        <div>
                            <label class='block text-xs font-semibold text-slate-600 mb-1'>Engine Model Text</label>
                            <input type="text" name='engine_model' value="{{ old('engine_model', $project?->engine_model) }}" class='w-full border border-slate-300 rounded-lg p-2 text-sm'>
                        </div>
                        <div>
                            <label class='block text-xs font-semibold text-slate-600 mb-1'>Engine Description</label>
                            <input type="text" name='engine_desc' value="{{ old('engine_desc', $project?->engine_desc) }}" class='w-full border border-slate-300 rounded-lg p-2 text-sm'>
                        </div>
                        <div>
                            <label class='block text-xs font-semibold text-slate-600 mb-1'>Diagram Label: Engine Brand</label>
                            <input type="text" name='diagram_engine' value="{{ old('diagram_engine', $project?->diagram_engine) }}" class='w-full border border-slate-300 rounded-lg p-2 text-sm'>
                        </div>
                        <div>
                            <label class='block text-xs font-semibold text-slate-600 mb-1'>Diagram Label: Engine Model</label>
                            <input type="text" name='diagram_engine_model' value="{{ old('diagram_engine_model', $project?->diagram_engine_model) }}" class='w-full border border-slate-300 rounded-lg p-2 text-sm'>
                        </div>
                    </div>
                </div>

                <!-- Gearbox -->
                <div class="bg-slate-50 p-4 rounded-lg border border-slate-200">
                    <h4 class="font-bold text-slate-700 mb-4">Gearbox Details</h4>
                    <div class="space-y-3">
                        <div>
                            <label class='block text-xs font-semibold text-slate-600 mb-1'>Gearbox Model Text</label>
                            <input type="text" name='gearbox_model' value="{{ old('gearbox_model', $project?->gearbox_model) }}" class='w-full border border-slate-300 rounded-lg p-2 text-sm'>
                        </div>
                        <div>
                            <label class='block text-xs font-semibold text-slate-600 mb-1'>Gearbox Description</label>
                            <input type="text" name='gearbox_desc' value="{{ old('gearbox_desc', $project?->gearbox_desc) }}" class='w-full border border-slate-300 rounded-lg p-2 text-sm'>
                        </div>
                        <div>
                            <label class='block text-xs font-semibold text-slate-600 mb-1'>Diagram Label: Gearbox Brand</label>
                            <input type="text" name='diagram_gearbox' value="{{ old('diagram_gearbox', $project?->diagram_gearbox) }}" class='w-full border border-slate-300 rounded-lg p-2 text-sm'>
                        </div>
                        <div>
                            <label class='block text-xs font-semibold text-slate-600 mb-1'>Diagram Label: Gearbox Model</label>
                            <input type="text" name='diagram_gearbox_model' value="{{ old('diagram_gearbox_model', $project?->diagram_gearbox_model) }}" class='w-full border border-slate-300 rounded-lg p-2 text-sm'>
                        </div>
                    </div>
                </div>

                <!-- Class -->
                <div class="bg-slate-50 p-4 rounded-lg border border-slate-200">
                    <h4 class="font-bold text-slate-700 mb-4">Class Details</h4>
                    <div class="space-y-3">
                        <div>
                            <label class='block text-xs font-semibold text-slate-600 mb-1'>Class Society Text</label>
                            <input type="text" name='class_society' value="{{ old('class_society', $project?->class_society) }}" class='w-full border border-slate-300 rounded-lg p-2 text-sm'>
                        </div>
                        <div>
                            <label class='block text-xs font-semibold text-slate-600 mb-1'>Class Description</label>
                            <input type="text" name='class_desc' value="{{ old('class_desc', $project?->class_desc) }}" class='w-full border border-slate-300 rounded-lg p-2 text-sm'>
                        </div>
                        <div>
                            <label class='block text-xs font-semibold text-slate-600 mb-1'>Class Specs</label>
                            <input type="text" name='class_specs' value="{{ old('class_specs', $project?->class_specs) }}" class='w-full border border-slate-300 rounded-lg p-2 text-sm'>
                        </div>
                    </div>
                </div>

                <!-- Vessel Details -->
                <div class="bg-slate-50 p-4 rounded-lg border border-slate-200">
                    <h4 class="font-bold text-slate-700 mb-4">Vessel Description</h4>
                    <div class="space-y-3">
                        <div>
                            <label class='block text-xs font-semibold text-slate-600 mb-1'>Vessel Name/Type</label>
                            <input type="text" name='vessel_details' value="{{ old('vessel_details', $project?->vessel_details) }}" class='w-full border border-slate-300 rounded-lg p-2 text-sm'>
                        </div>
                        <div>
                            <label class='block text-xs font-semibold text-slate-600 mb-1'>Vessel Description (e.g. Built by...)</label>
                            <input type="text" name='vessel_desc' value="{{ old('vessel_desc', $project?->vessel_desc) }}" class='w-full border border-slate-300 rounded-lg p-2 text-sm'>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Project Phases (Alpine.js array) -->
        <div class="space-y-6 pt-4 border-t border-slate-100" x-data="{ phases: {{ json_encode(old('phases', $project?->phases ?? [['title' => '', 'status' => '', 'statusClass' => 'bg-green-500/10 text-green-400 border-green-500/20', 'desc' => '']])) }} }">
            <div class="flex items-center justify-between border-b border-slate-100 pb-2">
                <h3 class="text-lg font-bold text-slate-800">Project Execution Phases</h3>
                <button type="button" @click="phases.push({title: '', status: '', statusClass: 'bg-green-500/10 text-green-400 border-green-500/20', desc: ''})" class="text-xs bg-brand-green text-white px-3 py-1.5 rounded-md hover:bg-green-600 transition">Add Phase</button>
            </div>
            
            <div class="space-y-4">
                <template x-for="(phase, index) in phases" :key="index">
                    <div class="p-4 border border-slate-200 rounded-lg bg-slate-50 relative group">
                        <button type="button" @click="phases.splice(index, 1)" class="absolute top-2 right-2 text-slate-400 hover:text-red-500">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        </button>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2">
                            <div>
                                <label class='block text-xs font-semibold text-slate-600 mb-1'>Phase Title</label>
                                <input type="text" x-model="phase.title" :name="`phases[${index}][title]`" required class='w-full border border-slate-300 rounded-lg p-2 text-sm'>
                            </div>
                            <div>
                                <label class='block text-xs font-semibold text-slate-600 mb-1'>Status Tag Text (e.g. Verified)</label>
                                <input type="text" x-model="phase.status" :name="`phases[${index}][status]`" required class='w-full border border-slate-300 rounded-lg p-2 text-sm'>
                            </div>
                            <div class="md:col-span-2">
                                <label class='block text-xs font-semibold text-slate-600 mb-1'>Status Color Class</label>
                                <select x-model="phase.statusClass" :name="`phases[${index}][statusClass]`" class='w-full border border-slate-300 rounded-lg p-2 text-sm'>
                                    <option value="bg-[#F60000]/10 text-[#ff4d4d] border-[#F60000]/20">Red Theme</option>
                                    <option value="bg-green-500/10 text-green-400 border-green-500/20">Green Theme</option>
                                    <option value="bg-blue-500/10 text-blue-400 border-blue-500/20">Blue Theme</option>
                                </select>
                            </div>
                            <div class="md:col-span-2">
                                <label class='block text-xs font-semibold text-slate-600 mb-1'>Description</label>
                                <textarea x-model="phase.desc" :name="`phases[${index}][desc]`" rows="2" required class='w-full border border-slate-300 rounded-lg p-2 text-sm'></textarea>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>

        <!-- Gallery Section (Alpine.js array) -->
        <div class="space-y-6 pt-4 border-t border-slate-100">
            <h3 class="text-lg font-bold text-slate-800 border-b border-slate-100 pb-2">Gallery Section Overview</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class='block text-sm font-semibold text-slate-700 mb-2'>Gallery Title</label>
                    <input type="text" name='gallery_title' value="{{ old('gallery_title', $project?->gallery_title) }}" class='w-full border border-slate-300 rounded-lg p-2.5 text-sm focus:ring-brand-green focus:border-brand-green'>
                </div>
                <div>
                    <label class='block text-sm font-semibold text-slate-700 mb-2'>Gallery Description</label>
                    <textarea name='gallery_desc' rows="2" class='w-full border border-slate-300 rounded-lg p-2 text-sm focus:ring-brand-green focus:border-brand-green'>{{ old('gallery_desc', $project?->gallery_desc) }}</textarea>
                </div>
            </div>
        </div>

        <div class="space-y-6 pt-4 border-t border-slate-100" x-data="{ galleryItems: {{ json_encode(old('gallery_items', $project?->gallery_items ?? [])) }} }">
            <div class="flex items-center justify-between border-b border-slate-100 pb-2">
                <h3 class="text-lg font-bold text-slate-800">Gallery Items (Images)</h3>
                <button type="button" @click="galleryItems.push({category: '', title: '', desc: '', img: ''})" class="text-xs bg-brand-green text-white px-3 py-1.5 rounded-md hover:bg-green-600 transition">Add Image Item</button>
            </div>
            
            <div class="space-y-4">
                <template x-for="(item, index) in galleryItems" :key="index">
                    <div class="p-4 border border-slate-200 rounded-lg bg-slate-50 relative group">
                        <button type="button" @click="galleryItems.splice(index, 1)" class="absolute top-2 right-2 text-slate-400 hover:text-red-500">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        </button>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2">
                            <div>
                                <div class="flex items-center justify-between mb-1">
                                    <label class='block text-xs font-semibold text-slate-600'>Category</label>
                                    <a href="{{ route('admin.project-gallery-categories.index') }}" target="_blank" class="text-[10px] text-brand-green hover:underline flex items-center gap-0.5">
                                        + Create Category
                                    </a>
                                </div>
                                <select x-model="item.category" :name="`gallery_items[${index}][category]`" required class='w-full border border-slate-300 rounded-lg p-2 text-sm bg-white'>
                                    <option value="">Select Category</option>
                                    @foreach($galleryCategories as $cat)
                                        <option value="{{ $cat->name }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class='block text-xs font-semibold text-slate-600 mb-1'>Title</label>
                                <input type="text" x-model="item.title" :name="`gallery_items[${index}][title]`" required class='w-full border border-slate-300 rounded-lg p-2 text-sm'>
                            </div>
                            <div class="md:col-span-2">
                                <label class='block text-xs font-semibold text-slate-600 mb-1'>Description</label>
                                <input type="text" x-model="item.desc" :name="`gallery_items[${index}][desc]`" required class='w-full border border-slate-300 rounded-lg p-2 text-sm'>
                            </div>
                            <div class="md:col-span-2 border border-slate-200 bg-white p-3 rounded-lg">
                                <label class='block text-xs font-semibold text-slate-600 mb-2'>Upload Image</label>
                                <input type="file" :name="`gallery_items[${index}][image]`" accept="image/*" class='w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-slate-50 file:text-slate-700 hover:file:bg-slate-100'>
                                
                                <template x-if="item.img">
                                    <div class="mt-3 flex items-center gap-3">
                                        <img :src="`{{ asset('') }}${item.img}`" class="w-16 h-10 object-cover rounded shadow-sm border border-slate-200">
                                        <span class="text-xs text-slate-500">Current Image</span>
                                        <input type="hidden" :name="`gallery_items[${index}][existing_img]`" :value="item.img">
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                </template>
                <div x-show="galleryItems.length === 0" class="text-center py-6 text-sm text-slate-500 border-2 border-dashed border-slate-200 rounded-lg">
                    No images added yet. Click "Add Image Item" to begin.
                </div>
            </div>
        </div>

        <!-- Simulation Data Section (Alpine.js) -->
        <div class="space-y-6 pt-4 border-t border-slate-100" x-data="{ 
            modes: ['stop', 'slow', 'normal', 'max'],
            simData: {{ json_encode(old('simulation_data', $project?->simulation_data ?? [
                'stop' => ['rpm' => '', 'fuel' => '', 'cavitation' => '', 'thrust' => '', 'efficiency' => '', 'slip' => '', 'vibration' => ''],
                'slow' => ['rpm' => '', 'fuel' => '', 'cavitation' => '', 'thrust' => '', 'efficiency' => '', 'slip' => '', 'vibration' => ''],
                'normal' => ['rpm' => '', 'fuel' => '', 'cavitation' => '', 'thrust' => '', 'efficiency' => '', 'slip' => '', 'vibration' => ''],
                'max' => ['rpm' => '', 'fuel' => '', 'cavitation' => '', 'thrust' => '', 'efficiency' => '', 'slip' => '', 'vibration' => '']
            ])) }}
        }">
            <div class="flex items-center justify-between border-b border-slate-100 pb-2">
                <h3 class="text-lg font-bold text-slate-800">Propulsion Simulation Data</h3>
                <p class="text-xs text-slate-500">Enter numbers/text shown in the simulation for each speed mode.</p>
            </div>
            
            <div class="space-y-6">
                <template x-for="mode in modes" :key="mode">
                    <div class="p-4 border border-slate-200 rounded-lg bg-slate-50">
                        <h4 class="font-bold text-slate-700 mb-4 capitalize" x-text="mode + ' Mode'"></h4>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <div>
                                <label class='block text-xs font-semibold text-slate-600 mb-1'>RPM (e.g. 850)</label>
                                <input type="number" step="any" x-model="simData[mode].rpm" :name="`simulation_data[${mode}][rpm]`" class='w-full border border-slate-300 rounded-lg p-2 text-sm'>
                            </div>
                            <div>
                                <label class='block text-xs font-semibold text-slate-600 mb-1'>Fuel (e.g. 135)</label>
                                <input type="number" step="any" x-model="simData[mode].fuel" :name="`simulation_data[${mode}][fuel]`" class='w-full border border-slate-300 rounded-lg p-2 text-sm'>
                            </div>
                            <div>
                                <label class='block text-xs font-semibold text-slate-600 mb-1'>Cavitation (e.g. 0.05)</label>
                                <input type="number" step="any" x-model="simData[mode].cavitation" :name="`simulation_data[${mode}][cavitation]`" class='w-full border border-slate-300 rounded-lg p-2 text-sm'>
                            </div>
                            <div>
                                <label class='block text-xs font-semibold text-slate-600 mb-1'>Thrust (e.g. 82.5)</label>
                                <input type="number" step="any" x-model="simData[mode].thrust" :name="`simulation_data[${mode}][thrust]`" class='w-full border border-slate-300 rounded-lg p-2 text-sm'>
                            </div>
                            <div>
                                <label class='block text-xs font-semibold text-slate-600 mb-1'>Efficiency (e.g. 98.4)</label>
                                <input type="number" step="any" x-model="simData[mode].efficiency" :name="`simulation_data[${mode}][efficiency]`" class='w-full border border-slate-300 rounded-lg p-2 text-sm'>
                            </div>
                            <div>
                                <label class='block text-xs font-semibold text-slate-600 mb-1'>Slip (e.g. 0.85)</label>
                                <input type="number" step="any" x-model="simData[mode].slip" :name="`simulation_data[${mode}][slip]`" class='w-full border border-slate-300 rounded-lg p-2 text-sm'>
                            </div>
                            <div class="col-span-2">
                                <label class='block text-xs font-semibold text-slate-600 mb-1'>Vibration (e.g. 0.45)</label>
                                <input type="number" step="any" x-model="simData[mode].vibration" :name="`simulation_data[${mode}][vibration]`" class='w-full border border-slate-300 rounded-lg p-2 text-sm'>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>

    </div>

    <!-- Form Actions -->
    <div class="p-6 bg-slate-50 border-t border-slate-200 flex justify-end gap-3">
        <a href="{{ route('admin.project-references.index') }}" class="px-6 py-2.5 rounded-lg border border-slate-300 text-slate-700 font-medium hover:bg-white transition-colors">Cancel</a>
        <button type='submit' class='bg-brand-green text-white px-8 py-2.5 rounded-lg shadow-sm font-medium hover:bg-green-600 transition-colors'>
            Save Project
        </button>
    </div>
</div>
