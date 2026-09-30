<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryCategory extends Model
{
    protected $fillable = ['name', 'order', 'is_active'];

    public function galleryItems()
    {
        return $this->hasMany(GalleryItem::class);
    }
}
