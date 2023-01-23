<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Photo extends Model
{
    use HasFactory;

    use HasTranslations;

    public $translatable = ['title', 'content'];

    protected $fillable = [
        'category_id',
        'title',
        'image',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'date',
    ];

    protected static function booted()
    {
        static::deleted(function ($photo) {
            file_exists(storage_path('app/public/' . $photo->image)) ? unlink(storage_path('app/public/' . $photo->image)) : null;
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
