<?php

namespace App\Models;

use App\Scopes\SiteScope;
use Database\Factories\SiteFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Site extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function subscribers(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function scopeCurrent(Builder $query, int $siteId): Builder
    {
        return $query->where('id', $siteId);
    }

    protected static function newFactory(): Factory
    {
        return SiteFactory::new();
    }
}
