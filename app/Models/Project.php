<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Support\Str;

class Project extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title',
        'slug',
        'location',
        'years',
        'working',
        'partner',
        'description',
    ];

    protected static function booted()
    {
        static::saving(function ($project) {
            if (empty($project->slug) || $project->isDirty('title')) {
                $project->slug = Str::slug($project->title);
            }
        });
    }
}
