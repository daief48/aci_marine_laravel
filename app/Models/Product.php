<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_thumble_id', 'name', 'link_url', 'image', 'order', 'is_active',
        'general_info', 'applications', 'ratings', 'docs', 'benefits', 'features', 'specs'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'benefits' => 'array',
        'features' => 'array',
        'specs' => 'array',
    ];

    public function imageUrl(): string
    {
        if ($this->image) {
            return asset($this->image);
        }
        return 'https://acimarine.com/images/featured/main.jpg';
    }

    public function productThumble()
    {
        return $this->belongsTo(ProductThumble::class);
    }
}
