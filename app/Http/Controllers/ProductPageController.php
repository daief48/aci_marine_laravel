<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductThumble;
use App\Models\Setting;
use Illuminate\Http\Request;

class ProductPageController extends Controller
{
    /**
     * Show all products under a ProductThumble category.
     * URL: /products/{thumble}
     */
    public function show(ProductThumble $thumble)
    {
        $products = $thumble->products()->where('is_active', true)->orderBy('order')->get();
        $settings = Setting::all()->pluck('value', 'key');

        return view('product-single', compact('thumble', 'products', 'settings'));
    }

    /**
     * Show a single product detail.
     * URL: /products/{thumble}/{product}
     */
    public function detail(ProductThumble $thumble, Product $product)
    {
        $settings = Setting::all()->pluck('value', 'key');

        return view('engine-detail', compact('thumble', 'product', 'settings'));
    }
}
