<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'lastname',
        'birthday',
        'phone',
        'instagram',
        'facebook',
        'youtube',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function country(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Country::class, 'country_profile');
    }

    public function state(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(State::class, 'state_profile');
    }

    public function city(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(City::class, 'city_profile');
    }

    public function ads(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Ad::class);
    }

    public function phone(): \Illuminate\Database\Eloquent\Relations\MorphOne
    {
        return $this->morphOne(Phone::class, 'phoneable');
    }

    public function group(): \Illuminate\Database\Eloquent\Relations\MorphToMany
    {
        return $this->morphToMany(Group::class, 'groupable');
    }

    public function image(): \Illuminate\Database\Eloquent\Relations\MorphOne
    {
        return $this->morphOne(Media::class, 'mediable');
    }
}
