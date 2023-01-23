<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Post extends Model
{
    use HasFactory;

    use HasTranslations;

    public $translatable = ['title', 'content'];

    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'content',
        'image',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'date',
    ];

    protected static function booted()
    {
        static::deleted(function ($post) {
            file_exists(storage_path('app/public/' . $post->image)) ? unlink(storage_path('app/public/' . $post->image)) : null;
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeIsPublished($query)
    {
        return $query->where('published_at', '<=', now());
    }

    public function scopePublishedBetween($query, $from, $to)
    {
        return $query->whereBetween('published_at', [$from, $to]);
    }
}
