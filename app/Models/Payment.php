<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'billboard_id',
        'booking_id',
        'amount',
        'currency',
        'reference',
        'split_data',
        'status',
        'gateway_response',
        'transaction_date',
    ];

    protected $casts = [
        'split_data' => 'array',
        'amount' => 'decimal:2',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function billboard()
    {
        return $this->belongsTo(Billboard::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    // Helpers
    public function isSuccessful(): bool
    {
        return $this->status === 'success';
    }

    public function isFailed(): bool
    {
        return $this->status === 'failed';
    }

    public function splitDetails(): array
    {
        return Arr::get($this->split_data, 'subaccounts', []);
    }

    public function formattedAmount(): string
    {
        return ($this->currency ?: 'NGN') . ' ' . number_format((float) $this->amount, 2);
    }
}