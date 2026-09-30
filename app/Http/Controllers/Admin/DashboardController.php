<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectReference;
use App\Models\Product;
use App\Models\ProductThumble;
use App\Models\Client;
use App\Models\NewsEvent;
use App\Models\GalleryItem;
use App\Models\CompanyStat;
use App\Models\AboutHighlight;
use App\Models\HeroSlide;
use App\Models\Setting;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_projects'        => ProjectReference::count(),
            'total_products'        => Product::count(),
            'total_product_thumbles'=> ProductThumble::count(),
            'total_clients'         => Client::count(),
            'total_news_events'     => NewsEvent::count(),
            'total_gallery_items'   => GalleryItem::count(),
            'total_company_stats'   => CompanyStat::count(),
            'total_about_highlights'=> AboutHighlight::count(),
            'total_hero_slides'     => HeroSlide::count(),
            'total_settings'        => Setting::count(),
        ];

        $latestProjects = ProjectReference::latest()->take(5)->get();

        // Product overall details
        $latestProducts = Product::with('productThumble')->latest()->take(5)->get();
        $categoriesWithCount = ProductThumble::withCount('products')->orderBy('products_count', 'desc')->get();

        return view('admin.dashboard', compact('stats', 'latestProjects', 'latestProducts', 'categoriesWithCount'));
    }

    public function projects()
    {
        return view('admin.projects');
    }

    public function settings()
    {
        return view('admin.settings');
    }
}

