<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Organization extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'org_name_en',
        'org_name_cn',
        'address',
        'country_id',
        'org_pic_name_en',
        'org_pic_name_cn',
        'org_pic_title',
        'org_pic_email',
        'org_pic_phone',
        'org_pic_whatsapp',
        'is_org_cp_same_as_org_pic',
        'org_cp_name_en',
        'org_cp_name_cn',
        'org_cp_title',
        'org_cp_email',
        'org_cp_phone',
        'org_cp_whatsapp',
        'organization_category_id',
        'organization_category_other',
        'document_type',
        'documents',
        'bsrn',
        'fax',
        'newsletter_other',
        'is_volunteer',
        'survey_id',
        'survey_other',
        'comment',
        'paid_at',
    ];

    protected $casts = [
        'is_org_cp_same_as_org_pic' => 'boolean',
        'documents' => 'array',
        'is_volunteer' => 'boolean',
        'paid_at' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function organizationCategory(): BelongsTo
    {
        return $this->belongsTo(OrganizationCategory::class);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function survey(): BelongsTo
    {
        return $this->belongsTo(Survey::class);
    }

    public function participants(): MorphMany
    {
        return $this->morphMany(Participant::class, 'participantable');
    }
}
