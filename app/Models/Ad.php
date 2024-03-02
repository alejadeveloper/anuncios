<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'title',
        'content',
        'cover',
        'level_id',
    ];

    public function profile(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function package(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(AdPackage::class , 'ad_packages_ad')->withPivot('expires_at')->withTimestamps();
    }

    public function comments(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function media(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(Media::class, 'mediable');
    }

    public function tags(): \Illuminate\Database\Eloquent\Relations\MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable')->withTimestamps();
    }

    public function country(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Country::class, 'country_ad');
    }

    public function state(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(State::class, 'state_ad');
    }

    public function city(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(City::class, 'city_ad');
    }

    public function groups(): \Illuminate\Database\Eloquent\Relations\MorphToMany
    {
        return $this->morphToMany(Group::class, 'groupable');
    }

    public function phone(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo(Phone::class, 'phoneable');
    }

    public function getCreatedAtAttribute(): string
    {
        return Carbon::parse($this->attributes['created_at'])->diffForHumans();
    }

    public function getUpdatedAtAttribute(): string
    {
        return Carbon::parse($this->attributes['updated_at'])->diffForHumans();
    }

    public function scopeActiveAndNotExpiredPackages()
    {
        return $this->package()->activeAndNotExpired();
    }

    public function scopeSearch($query, $searchTerm)
    {
        if ($searchTerm) {
            return $query->where('title', 'like', '%' . $searchTerm . '%');
        }

        return $query;
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeCategory($query, $category)
    {
        if ($category) {
            return $query->whereHas('category', function ($query) use ($category) {
                $query->where('name', $category);
            });
        }

        return $query;
    }

    public function scopeSortBy($query, $sort)
    {
        switch ($sort) {
            case 'recent':
                $query->orderByDesc('updated_at');
                break;
            case 'weekly':
                $query->where('updated_at', '>=', Carbon::now()->subWeek());
                break;
            case 'monthly':
                $query->where('updated_at', '>=', Carbon::now()->subMonth());
                break;
        }

        return $query;
    }
}
