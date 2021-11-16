<?php

namespace App\Models;

use Database\Factories\PostFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Artisan;
use function Illuminate\Events\queueable;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'is_dispatched',
    ];

    protected $casts = [
        'is_dispatched' => 'boolean',
    ];

    public function site(): BelongsTo
    {
        return $this->belongsTo(Site::class);
    }

    protected static function newFactory(): Factory
    {
        return PostFactory::new();
    }

    public static function boot()
    {
       parent::boot();

       static::created(queueable(function ($post) {
            Artisan::call('send:notification', ['post' => $post->id]);
        }));       
    }   
}
