<?php

namespace App\Models;

use Database\Factories\PlanFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'amount',
        'frequency'
    ];

    public function subscription(): HasMany
    {
        return $this->hasMany(Subscription::class);
    }

    protected static function newFactory(): Factory
    {
        return PlanFactory::new();
    }

}
