<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductThumble extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'tag', 'subtitle', 'image_url', 'image', 'order', 'is_active'];

    public function imageUrl(): string
    {
        if ($this->image && file_exists(public_path($this->image))) {
            return asset($this->image);
        }
        if ($this->image_url && !str_contains($this->image_url, 'acimarine.com')) {
            return $this->image_url;
        }

        $fallbacks = [
            1 => 'uploads/product-thumbles/thumb_1_marine_engines.jpg',
            2 => 'uploads/product-thumbles/thumb_2_propulsion_deck.jpg',
            3 => 'uploads/product-thumbles/thumb_3_navigation_safety.jpg',
            4 => 'uploads/product-thumbles/thumb_4_navigation_comm.jpg',
            5 => 'uploads/product-thumbles/thumb_5_life_saving.jpg',
            6 => 'uploads/product-thumbles/thumb_6_damen.png',
        ];

        if (isset($fallbacks[$this->id]) && file_exists(public_path($fallbacks[$this->id]))) {
            return asset($fallbacks[$this->id]);
        }

        return asset('image/damen_tug_dredger.png');
    }

    public function products()
    {
        return $this->hasMany(Product::class)->orderBy('order', 'asc')->orderBy('id', 'asc');
    }
}
