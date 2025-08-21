<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubscriptionPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'billing_period',
        'max_businesses',
        'max_services',
        'max_bookings',
        'max_staff',
        'features',
        'limits_json',
        'is_popular',
        'is_active',
    ];

    protected $casts = [
        'features' => 'array',
        'limits_json' => 'array',
        'is_popular' => 'boolean',
        'is_active' => 'boolean',
        'price' => 'decimal:2',
    ];

    // Relationships
    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class, 'plan_id');
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopePopular($query)
    {
        return $query->where('is_popular', true);
    }

    // Accessors
    public function getFormattedPriceAttribute(): string
    {
        return number_format($this->price, 0) . ' ريال';
    }

    public function getBillingPeriodTextAttribute(): string
    {
        return match($this->billing_period) {
            'monthly' => 'شهريًا',
            'yearly' => 'سنويًا',
            'lifetime' => 'مدى الحياة',
            'custom' => 'مخصص',
            default => $this->billing_period,
        };
    }

    // Helper methods
    public function isPopular(): bool
    {
        return $this->is_popular;
    }

    public function isActive(): bool
    {
        return $this->is_active;
    }

    public function hasFeature(string $feature): bool
    {
        return in_array($feature, $this->features ?? []);
    }

    public function getLimit(string $limitType): ?int
    {
        return $this->limits_json[$limitType] ?? null;
    }

    public function canCreateBusinesses(int $currentCount): bool
    {
        $limit = $this->getLimit('businesses');
        return $limit === null || $currentCount < $limit;
    }

    public function canCreateServices(int $currentCount): bool
    {
        $limit = $this->getLimit('services');
        return $limit === null || $currentCount < $limit;
    }

    public function canCreateBookings(int $currentCount): bool
    {
        $limit = $this->getLimit('bookings_per_month');
        return $limit === null || $currentCount < $limit;
    }

    public function canAddStaff(int $currentCount): bool
    {
        $limit = $this->getLimit('staff_members');
        return $limit === null || $currentCount < $limit;
    }
}
