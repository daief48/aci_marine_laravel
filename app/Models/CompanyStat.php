<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanyStat extends Model
{
    use HasFactory;

    protected $fillable = ['number', 'label', 'order', 'is_active'];
}
