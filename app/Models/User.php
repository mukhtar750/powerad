<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'regulator_type',
        'regulator_agency',
        'state',
        'phone',
        'company',
        'bio',
        'avatar_path',
        'id_card_path',
        'is_verified',
        'paystack_subaccount_code',
        'paystack_subaccount_id',
        'bank_name',
        'bank_code',
        'account_number',
        'account_name',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_verified' => 'boolean',
        ];
    }

    /**
     * Get the billboards for the user (LOAP).
     */
    public function billboards(): HasMany
    {
        return $this->hasMany(Billboard::class);
    }

    /**
     * Check if user is LOAP (Land Owner/Advertising Provider).
     */
    public function isLoap(): bool
    {
        return $this->role === 'loap';
    }

    /**
     * Check if user is Advertiser.
     */
    public function isAdvertiser(): bool
    {
        return $this->role === 'advertiser';
    }

    /**
     * Check if user is Regulator.
     */
    public function isRegulator(): bool
    {
        return $this->role === 'regulator';
    }

    /**
     * Check if user is Service Provider.
     */
    public function isServiceProvider(): bool
    {
        return $this->role === 'service_provider';
    }

    /**
     * Check if user is Admin.
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }
}
