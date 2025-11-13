<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    protected $fillable = [
        'billboard_id',
        'advertiser_id',
        'loap_id',
        'start_date',
        'end_date',
        'duration_days',
        'total_amount',
        'company_commission',
        'loap_amount',
        'status',
        'payment_reference',
        'payment_status',
        'payment_details',
        'campaign_details',
        'paid_at',
        'transfer_reference',
        'transfer_status',
        'transferred_at',
        'transfer_details',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'total_amount' => 'decimal:2',
        'company_commission' => 'decimal:2',
        'loap_amount' => 'decimal:2',
        'payment_details' => 'array',
        'transfer_details' => 'array',
        'paid_at' => 'datetime',
        'transferred_at' => 'datetime',
    ];

    public function billboard(): BelongsTo
    {
        return $this->belongsTo(Billboard::class);
    }

    public function advertiser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'advertiser_id');
    }

    public function loap(): BelongsTo
    {
        return $this->belongsTo(User::class, 'loap_id');
    }

    public function isPaid(): bool
    {
        return $this->payment_status === 'paid';
    }

    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    public function isCompleted(): bool
    {
        return $this->status === 'completed';
    }
}
