<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class News extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'description',
        'date',
        'is_active',
        'user_id',
        'meta_title',
        'meta_description',
        'meta_tag',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($news) {
            if (empty($news->slug) || $news->isDirty('title')) {
                $slug = Str::slug($news->title);
                
                $originalSlug = $slug;
                $count = 1;
                
                while (static::where('slug', $slug)->where('id', '!=', $news->id)->exists()) {
                    $slug = "{$originalSlug}-" . $count++;
                }
                
                $news->slug = $slug;
            }
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getThumbnailUrlAttribute()
    {
        $media = $this->getFirstMediaUrl('thumbnail');
        
        if (!empty($media)) {
            return $media;
        }

        return asset('img/featured-projects/main-image.png');
    }
}