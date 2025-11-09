<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_id',
        'category_id',
        'name',
        'description',
        'image',
        'duration',
        'price',
        'currency',
        'buffer_time_before',
        'buffer_time_after',
        'max_capacity',
        'advance_booking_time',
        'advance_cancel_time',
        'color',
        'is_online',
        'meeting_link',
        'requirements',
        'cancellation_policy',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_online' => 'boolean',
        'is_active' => 'boolean',
        'price' => 'decimal:2',
    ];

    // Relationships
    public function business(): BelongsTo
    {
        return $this->belongsTo(Business::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ServiceCategory::class);
    }

    public function providers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'service_providers')
                    ->withPivot(['commission_rate', 'is_primary'])
                    ->withTimestamps();
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOnline($query)
    {
        return $query->where('is_online', true);
    }

    public function scopeOfBusiness($query, $businessId)
    {
        return $query->where('business_id', $businessId);
    }
}
