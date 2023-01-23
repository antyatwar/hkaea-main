<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Competition extends Model
{
    use HasFactory;

    use HasTranslations;

    public $translatable = [
        'title',
        'description',
        'process_title_1',
        'process_title_2',
        'process_title_3',
        'process_title_4',
        'painting_format',
        'poster',
        'age_groups',
        'judging_criteria',
        'prizes',
        'payment_method',
        'individual_application',
        'group_application',
        'other_details',
        'terms',
        'ceremony_content',
    ];

    protected $fillable = [
        'title',
        'slug',
        'description',
        'process_title_1',
        'process_date_1',
        'process_image_1',
        'process_title_2',
        'process_date_2',
        'process_image_2',
        'process_title_3',
        'process_date_3',
        'process_image_3',
        'process_title_4',
        'process_date_4',
        'process_image_4',
        'painting_format',
        'poster',
        'age_groups',
        'judging_criteria',
        'prizes',
        'payment_method',
        'individual_application',
        'group_application',
        'other_details',
        'terms',
        'ceremony_image',
        'ceremony_content',
        'highlights',
        'artworks',
    ];

    protected $casts = [
        'process_date_1' => 'date',
        'process_date_2' => 'date',
        'process_date_3' => 'date',
        'process_date_4' => 'date',
        'highlights' => 'array',
        'artworks' => 'array',
    ];

    public function artworks(): HasMany
    {
        return $this->hasMany(Artwork::class);
    }

    public function participants(): BelongsToMany
    {
        return $this->belongsToMany(Participant::class)->withTimestamps();
    }
}
