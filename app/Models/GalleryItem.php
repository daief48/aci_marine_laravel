<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GalleryItem extends Model
{
    use HasFactory;

    protected $fillable = ['gallery_category_id', 'image_url', 'badge', 'title', 'description', 'is_featured', 'order', 'is_active'];

    public function galleryCategory()
    {
        return $this->belongsTo(GalleryCategory::class);
    }
}
