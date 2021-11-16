<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Database\Factories\SubscriptionFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use function Illuminate\Events\queueable;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'plan_id',
        'site_id',
        'starts_on',
        'expires_at',
        'next_due_date',
    ];

    protected $table='subscriptions';

    public function site(): BelongsTo
    {
        return $this->belongsTo(Site::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected static function newFactory(): Factory
    {
        return SubscriptionFactory::new();
    }

    public static function boot()
   {
       parent::boot();

       static::created(queueable(function ($subscription) {
            $subscription->user->sites()->syncWithoutDetaching(
                [$subscription->site_id => ['subscription_id' => $subscription->id]]
            );
        }));       
   }    
}
