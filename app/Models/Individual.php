<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Individual extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name_en',
        'last_name_en',
        'first_name_cn',
        'last_name_cn',
        'gender_id',
        'birth_date',
        'occupation',
        'address',
        'country_id',
        'phone',
        'fax',
        'documents',
        'qualification_id',
        'qualification_other',
        'newsletter_other',
        'is_volunteer',
        'survey_id',
        'survey_other',
        'comment',
        'paid_at',
    ];

    protected $casts = [
        'documents' => 'array',
        'is_volunteer' => 'boolean',
        'paid_at' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function participant(): MorphOne
    {
        return $this->morphOne(Participant::class, 'participantable');
    }

    public function gender(): BelongsTo
    {
        return $this->belongsTo(Gender::class);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function qualification(): BelongsTo
    {
        return $this->belongsTo(Qualification::class);
    }

    public function survey(): BelongsTo
    {
        return $this->belongsTo(Survey::class);
    }
}
