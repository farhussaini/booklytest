<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Business extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'logo',
        'owner_id',
        'email',
        'phone',
        'website',
        'address',
        'city',
        'country',
        'timezone',
        'currency',
        'language',
        'working_hours',
        'booking_settings',
        'payment_settings',
        'notification_settings',
        'subscription_plan',
        'subscription_expires_at',
        'status',
    ];

    protected $casts = [
        'working_hours' => 'array',
        'booking_settings' => 'array',
        'payment_settings' => 'array',
        'notification_settings' => 'array',
        'subscription_expires_at' => 'datetime',
    ];

    // Relationships
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'business_users')
                    ->withPivot(['role', 'permissions', 'working_hours', 'status', 'hired_at'])
                    ->withTimestamps();
    }

    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }

    public function serviceCategories(): HasMany
    {
        return $this->hasMany(ServiceCategory::class);
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function subscriptions(): HasMany
    {
        return $this->hasMany(BusinessSubscription::class);
    }

    public function coupons(): HasMany
    {
        return $this->hasMany(Coupon::class);
    }

    public function locations(): HasMany
    {
        return $this->hasMany(BusinessLocation::class);
    }

    public function settings(): HasMany
    {
        return $this->hasMany(SystemSetting::class);
    }

    public function timeOffs(): HasMany
    {
        return $this->hasMany(TimeOff::class);
    }

    // Accessors
    public function getLogoUrlAttribute(): string
    {
        return $this->logo 
            ? asset('storage/' . $this->logo)
            : 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&background=7223D8&color=fff';
    }

    public function getCurrentSubscriptionAttribute()
    {
        return $this->subscriptions()->where('status', 'active')
                                    ->where('end_date', '>=', now())
                                    ->first();
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeByOwner($query, $userId)
    {
        return $query->where('owner_id', $userId);
    }

    // Helper methods
    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    public function hasActiveSubscription(): bool
    {
        return $this->current_subscription !== null;
    }

    public function canAcceptBookings(): bool
    {
        return $this->isActive() && $this->hasActiveSubscription();
    }

    public function getWorkingHours($dayOfWeek = null)
    {
        if ($dayOfWeek !== null) {
            $days = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
            $day = $days[$dayOfWeek] ?? null;
            return $day ? ($this->working_hours[$day] ?? null) : null;
        }
        
        return $this->working_hours;
    }

    public function isWorkingDay($dayOfWeek): bool
    {
        $hours = $this->getWorkingHours($dayOfWeek);
        return $hours && ($hours['is_working'] ?? false);
    }

    public function getSetting(string $key, $default = null)
    {
        $setting = $this->settings()->where('setting_key', $key)->first();
        return $setting ? $setting->setting_value : $default;
    }

    public function setSetting(string $key, $value, string $type = 'string'): void
    {
        $this->settings()->updateOrCreate(
            ['setting_key' => $key],
            [
                'setting_value' => $value,
                'setting_type' => $type,
            ]
        );
    }

    public function getAverageRating(): float
    {
        return $this->reviews()->where('status', 'approved')->avg('rating') ?? 0;
    }

    public function getTotalReviews(): int
    {
        return $this->reviews()->where('status', 'approved')->count();
    }
}
