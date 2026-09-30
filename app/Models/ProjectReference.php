<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectReference extends Model
{
    use HasFactory;

    protected $guarded = ['id'];



    protected $casts = [
        'phases' => 'array',
        'gallery_items' => 'array',
        'simulation_data' => 'array',
    ];
}
