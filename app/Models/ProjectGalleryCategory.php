<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectGalleryCategory extends Model
{
    protected $fillable = ['name', 'order', 'is_active'];
}
