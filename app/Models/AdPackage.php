<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'duration',
        'max_ads',
        'max_photos',
        'max_videos',
        'expires_at',
        'status',
    ];

    public function package(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(AdPackage::class , 'ad_packages_ad')->withPivot('expires_at')->withTimestamps();
    }

    public function scopeActiveAndExpiring($query)
    {
        return $query->where('status', 'active')->where('expires_at', '>=', now());
    }

    public function getCreatedAtAttribute(): string
    {
        return Carbon::parse($this->attributes['created_at'])->diffForHumans();
    }

    public function getUpdatedAtAttribute(): string
    {
        return Carbon::parse($this->attributes['updated_at'])->diffForHumans();
    }
}
