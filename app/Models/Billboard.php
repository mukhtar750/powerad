<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Billboard extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'location',
        'address',
        'city',
        'state',
        'country',
        'latitude',
        'longitude',
        'size',
        'type',
        'orientation',
        'price_per_day',
        'price_per_week',
        'price_per_month',
        'status',
        'images',
        'main_image',
        'features',
        'is_verified',
        'is_active'
    ];

    protected $casts = [
        'images' => 'array',
        'features' => 'array',
        'price_per_day' => 'decimal:2',
        'price_per_week' => 'decimal:2',
        'price_per_month' => 'decimal:2',
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
        'is_verified' => 'boolean',
        'is_active' => 'boolean',
    ];

    /**
     * Get the user (LOAP) that owns the billboard.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the bookings for this billboard.
     */
    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * Scope a query to only include available billboards.
     */
    public function scopeAvailable($query)
    {
        return $query->where('status', 'available')->where('is_active', true);
    }

    /**
     * Scope a query to only include verified billboards.
     */
    public function scopeVerified($query)
    {
        return $query->where('is_verified', true);
    }

    /**
     * Get the main image URL.
     */
    public function getMainImageUrlAttribute()
    {
        return $this->main_image ? asset('storage/' . $this->main_image) : null;
    }

    /**
     * Get all image URLs.
     */
    public function getImageUrlsAttribute()
    {
        if (!$this->images) {
            return [];
        }
        
        return collect($this->images)->map(function ($image) {
            return asset('storage/' . $image);
        })->toArray();
    }
}
