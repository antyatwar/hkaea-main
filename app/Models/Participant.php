<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'chinese_name',
        'english_name',
        'birth_date',
        'gender_id',
        'parent_phone',
        'parent_email',
        'participantable_type',
        'participantable_id',
        // 'participant_category_id',
        // 'country_id',
        // 'address',
        // 'instructor_name',
        // 'cheque_no',
        // 'paid_at',
        // 'is_paid',
        // 'receipt_no',
        // 'is_receipt_sent',
        // 'receipt_sent_by',
        // 'artwork_count',
        // 'artwork_title',
        // 'artwork_description',
        // 'artwork_received_at',
        // 'mark',
        // 'prize_details',
        // 'prize_shown',
        // 'artwork_selected',
        // 'is_cert_sent',
        // 'is_in_advance_award',
        // 'is_attend_ceremony',
        // 'attendant_count',
        // 'attendant_name',
        // 'attendant_relation',
        // 'attendant_phone',
        // 'remark',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function participantCategory(): BelongsTo
    {
        return $this->belongsTo(ParticipantCategory::class);
    }

    public function participantable(): MorphTo
    {
        return $this->morphTo();
    }

    public function gender(): BelongsTo
    {
        return $this->belongsTo(Gender::class);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function competitions(): BelongsToMany
    {
        return $this->belongsToMany(Competition::class)->withTimestamps();
    }

    public function artworks(): HasMany
    {
        return $this->hasMany(Artwork::class);
    }
}
