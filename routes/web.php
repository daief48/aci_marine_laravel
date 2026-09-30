<?php

use Illuminate\Support\Facades\Route;

use App\Models\HeroSlide;
use App\Models\ProductThumble;
use App\Models\Client;
use App\Models\NewsEvent;
use App\Models\GalleryItem;
use App\Models\CompanyStat;
use App\Models\Setting;
use App\Http\Controllers\ProductPageController;

Route::get('/', function () {
    $heroSlides = HeroSlide::where('is_active', true)->orderBy('order')->get();
    $productThumbles = ProductThumble::with(['products' => function($q) {
        $q->where('is_active', true)->orderBy('order', 'asc')->orderBy('id', 'asc');
    }])->where('is_active', true)->orderBy('order', 'asc')->orderBy('id', 'asc')->get();
    
    $clients = Client::where('is_active', true)->orderBy('order')->get();
    $newsEvents = NewsEvent::where('is_active', true)->orderBy('order')->get();
    $galleryItems = GalleryItem::with('galleryCategory')->where('is_active', true)->orderBy('order')->get();
    $galleryCategories = \App\Models\GalleryCategory::where('is_active', true)->orderBy('order')->get();
    $companyStats = CompanyStat::where('is_active', true)->orderBy('order')->get();
    $partners = \App\Models\Partner::where('is_active', true)->orderBy('order', 'asc')->orderBy('id', 'asc')->get();
    $settings = Setting::all()->pluck('value', 'key');

    return view('index', compact(
        'heroSlides', 
        'productThumbles', 
        'clients', 
        'partners',
        'newsEvents', 
        'galleryItems', 
        'galleryCategories',
        'companyStats', 
        'settings'
    ));
});

Route::get('/about', function () {
    $settings = Setting::all()->pluck('value', 'key');
    $aboutHighlights = \App\Models\AboutHighlight::all();
    $partners = \App\Models\Partner::where('is_active', true)->orderBy('order', 'asc')->orderBy('id', 'asc')->get();
    return view('about', compact('settings', 'aboutHighlights', 'partners'));
});

Route::get('/contact', function () {
    $settings = Setting::all()->pluck('value', 'key');
    $partners = \App\Models\Partner::where('is_active', true)->orderBy('order', 'asc')->orderBy('id', 'asc')->get();
    return view('contact', compact('settings', 'partners'));
});

Route::get('/projects', function () {
    $projects = \App\Models\ProjectReference::all();
    $projectCategories = \App\Models\ProjectReference::select('project_category')
        ->whereNotNull('project_category')
        ->distinct()
        ->pluck('project_category');
    $settings = Setting::all()->pluck('value', 'key');
    return view('projects', compact('projects', 'projectCategories', 'settings'));
});

Route::get('/projects/{slug}', function ($slug) {
    $projects = \App\Models\ProjectReference::all();
    $project = \App\Models\ProjectReference::where('slug', $slug)->firstOrFail();
    $settings = \App\Models\Setting::all()->pluck('value', 'key');
    return view('project_detail', compact('projects', 'project', 'settings'));
})->name('projects.show');

// Main Products page (All product categories single page view)
Route::get('/products', function () {
    $productThumbles = ProductThumble::with(['products' => function($q) {
        $q->where('is_active', true)->orderBy('order', 'asc')->orderBy('id', 'asc');
    }])->where('is_active', true)->orderBy('order', 'asc')->orderBy('id', 'asc')->get();

    $settings = Setting::all()->pluck('value', 'key');

    return view('products', compact('productThumbles', 'settings'));
})->name('products.index');

// Product category page (ProductThumble → Products list)
Route::get('/products/{thumble}', [ProductPageController::class, 'show'])->name('products.show');

// Single product detail page
Route::get('/products/{thumble}/{product}', [ProductPageController::class, 'detail'])->name('products.detail');

// Admin Authentication & Panel Routes
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HeroSlideController;
use App\Http\Controllers\Admin\ProductThumbleController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\AboutHighlightController;
use App\Http\Controllers\Admin\NewsEventController;
use App\Http\Controllers\Admin\GalleryItemController;
use App\Http\Controllers\Admin\CompanyStatController;
use App\Http\Controllers\Admin\SettingController;
Route::prefix('admin')->group(function () {
    // Guest Admin Routes
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('admin.login');
        Route::post('/login', [AuthController::class, 'authenticate'])->name('admin.login.submit');
    });

    // Authenticated Admin Routes
    Route::middleware('auth')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');
        
        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/dashboard', [DashboardController::class, 'index']);
        Route::get('/projects', [DashboardController::class, 'projects'])->name('admin.projects');
        Route::get('/settings', [DashboardController::class, 'settings'])->name('admin.settings');
        
        // Hero Slider Settings
        Route::post('hero-slides/update-all', [HeroSlideController::class, 'updateAll'])->name('admin.hero-slides.update-all');
        Route::resource('hero-slides', HeroSlideController::class)->names('admin.hero-slides');

        // Dynamic Homepage Settings
        Route::post('product-thumbles/reorder', [ProductThumbleController::class, 'reorder'])->name('admin.product-thumbles.reorder');
        Route::resource('product-thumbles', ProductThumbleController::class)->names('admin.product-thumbles');
        Route::post('products/reorder', [ProductController::class, 'reorder'])->name('admin.products.reorder');
        Route::resource('products', ProductController::class)->names('admin.products');
        Route::resource('clients', ClientController::class)->names('admin.clients');
        Route::resource('news-events', NewsEventController::class)->names('admin.news-events');
        Route::resource('gallery-categories', \App\Http\Controllers\Admin\GalleryCategoryController::class)->names('admin.gallery-categories');
        Route::resource('gallery-items', GalleryItemController::class)->names('admin.gallery-items');
        Route::resource('company-stats', CompanyStatController::class)->names('admin.company-stats');
        // About Highlight CRUD
        Route::resource('about-highlights', AboutHighlightController::class)->names('admin.about-highlights');

        // Dynamic Authorized Partnerships CRUD
        Route::post('partners/reorder', [\App\Http\Controllers\Admin\PartnerController::class, 'reorder'])->name('admin.partners.reorder');
        Route::resource('partners', \App\Http\Controllers\Admin\PartnerController::class)->names('admin.partners');

        // Project References CRUD
        Route::resource('project-gallery-categories', \App\Http\Controllers\Admin\ProjectGalleryCategoryController::class)->names('admin.project-gallery-categories');
        Route::resource('project-references', \App\Http\Controllers\Admin\ProjectReferenceController::class)->names('admin.project-references');

        // Settings
        Route::get('/general-settings', [SettingController::class, 'index'])->name('admin.settings.index');
        Route::get('/general-settings/about', [SettingController::class, 'about'])->name('admin.settings.about');
        Route::get('/general-settings/projects', [SettingController::class, 'projects'])->name('admin.settings.projects');
        Route::get('/general-settings/contact', [SettingController::class, 'contact'])->name('admin.settings.contact');
        Route::get('/general-settings/footer', [SettingController::class, 'footer'])->name('admin.settings.footer');
        Route::post('/general-settings/update-all', [SettingController::class, 'updateAll'])->name('admin.settings.update-all');
    });
});
