<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSlide extends Model
{
    protected $fillable = [
        'subtitle', 'title', 'video_url', 'link_text', 'link_url', 'text_color', 'order', 'is_active'
    ];
}
