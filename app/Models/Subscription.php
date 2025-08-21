<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_id',
        'plan_id',
        'status',
        'starts_at',
        'ends_at',
        'trial_ends_at',
        'payment_method',
        'payment_details',
        'auto_renew',
        'cancelled_at',
        'cancellation_reason',
    ];

    protected $casts = [
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
        'trial_ends_at' => 'datetime',
        'cancelled_at' => 'datetime',
        'payment_details' => 'array',
        'auto_renew' => 'boolean',
    ];

    // Relationships
    public function business(): BelongsTo
    {
        return $this->belongsTo(Business::class);
    }

    public function plan(): BelongsTo
    {
        return $this->belongsTo(SubscriptionPlan::class, 'plan_id');
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', 'active')
                    ->where('starts_at', '<=', now())
                    ->where(function($q) {
                        $q->whereNull('ends_at')
                          ->orWhere('ends_at', '>', now());
                    });
    }

    public function scopeExpired($query)
    {
        return $query->where('ends_at', '<', now());
    }

    public function scopeTrial($query)
    {
        return $query->where('status', 'trial')
                    ->where('trial_ends_at', '>', now());
    }

    // Accessors
    public function getIsActiveAttribute(): bool
    {
        return $this->status === 'active' && 
               $this->starts_at <= now() && 
               ($this->ends_at === null || $this->ends_at > now());
    }

    public function getIsExpiredAttribute(): bool
    {
        return $this->ends_at && $this->ends_at < now();
    }

    public function getIsTrialAttribute(): bool
    {
        return $this->status === 'trial' && 
               $this->trial_ends_at && 
               $this->trial_ends_at > now();
    }

    public function getDaysRemainingAttribute(): ?int
    {
        if (!$this->ends_at) {
            return null;
        }
        
        return max(0, now()->diffInDays($this->ends_at, false));
    }

    // Helper methods
    public function isActive(): bool
    {
        return $this->is_active;
    }

    public function isExpired(): bool
    {
        return $this->is_expired;
    }

    public function isTrial(): bool
    {
        return $this->is_trial;
    }

    public function cancel(string $reason = null): void
    {
        $this->update([
            'status' => 'cancelled',
            'cancelled_at' => now(),
            'cancellation_reason' => $reason,
            'auto_renew' => false,
        ]);
    }

    public function renew(Carbon $newEndDate = null): void
    {
        $this->update([
            'status' => 'active',
            'ends_at' => $newEndDate ?? $this->calculateNextBillingDate(),
            'cancelled_at' => null,
            'cancellation_reason' => null,
        ]);
    }

    private function calculateNextBillingDate(): Carbon
    {
        $currentEnd = $this->ends_at ?? now();
        
        return match($this->plan->billing_period) {
            'monthly' => $currentEnd->addMonth(),
            'yearly' => $currentEnd->addYear(),
            default => $currentEnd->addMonth(),
        };
    }
}
