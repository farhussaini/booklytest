<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'password',
        'avatar',
        'date_of_birth',
        'gender',
        'address',
        'city',
        'country',
        'timezone',
        'language',
        'status',
        'user_type',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'date_of_birth' => 'date',
        'password' => 'hashed',
    ];

    // Relationships
    public function ownedBusinesses(): HasMany
    {
        return $this->hasMany(Business::class, 'owner_id');
    }

    public function businesses(): BelongsToMany
    {
        return $this->belongsToMany(Business::class, 'business_users')
                    ->withPivot(['role', 'permissions', 'working_hours', 'status', 'hired_at'])
                    ->withTimestamps();
    }

    public function customerBookings(): HasMany
    {
        return $this->hasMany(Booking::class, 'customer_id');
    }

    public function providerBookings(): HasMany
    {
        return $this->hasMany(Booking::class, 'provider_id');
    }

    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'service_providers')
                    ->withPivot(['commission_rate', 'is_primary'])
                    ->withTimestamps();
    }

    public function availabilitySchedules(): HasMany
    {
        return $this->hasMany(AvailabilitySchedule::class);
    }

    public function timeOffs(): HasMany
    {
        return $this->hasMany(TimeOff::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class, 'customer_id');
    }

    public function receivedReviews(): HasMany
    {
        return $this->hasMany(Review::class, 'provider_id');
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class, 'customer_id');
    }

    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class);
    }

    // Accessors
    public function getFullNameAttribute(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getAvatarUrlAttribute(): string
    {
        return $this->avatar 
            ? asset('storage/' . $this->avatar)
            : 'https://ui-avatars.com/api/?name=' . urlencode($this->full_name) . '&background=7223D8&color=fff';
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeProviders($query)
    {
        return $query->where('user_type', 'provider');
    }

    public function scopeCustomers($query)
    {
        return $query->where('user_type', 'customer');
    }

    // Helper methods
    public function isAdmin(): bool
    {
        return $this->user_type === 'admin';
    }

    public function isProvider(): bool
    {
        return $this->user_type === 'provider';
    }

    public function isCustomer(): bool
    {
        return $this->user_type === 'customer';
    }

    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    public function canBookService(Service $service): bool
    {
        // Add business logic for booking permissions
        return $this->isActive() && $service->is_active;
    }

    public function hasBusinessRole(Business $business, string $role): bool
    {
        $businessUser = $this->businesses()->where('business_id', $business->id)->first();
        return $businessUser && $businessUser->pivot->role === $role;
    }
}
