<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'role_subtitle',
        'badge_text',
        'estd_year',
        'logo',
        'description',
        'partner_url',
        'order',
        'is_active',
    ];

    public function logoUrl()
    {
        if (empty($this->logo)) {
            return asset('image/mitsubishi.png');
        }

        if (str_starts_with($this->logo, 'http://') || str_starts_with($this->logo, 'https://')) {
            return $this->logo;
        }

        return asset(ltrim($this->logo, '/'));
    }
}
