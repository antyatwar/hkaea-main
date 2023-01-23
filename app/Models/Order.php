<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'merchant_reference',
        'currency',
        'amount',
        'customer_ip',
        'customer_first_name',
        'customer_last_name',
        'customer_address',
        'customer_phone',
        'customer_email',
        'customer_postal_code',
        'customer_state',
        'customer_country',
        'network',
        'subject',
        'status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
