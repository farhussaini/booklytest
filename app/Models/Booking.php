<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Carbon\Carbon;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_id',
        'service_id',
        'provider_id',
        'customer_id',
        'booking_number',
        'appointment_date',
        'start_time',
        'end_time',
        'duration',
        'total_price',
        'currency',
        'participants',
        'notes',
        'customer_notes',
        'internal_notes',
        'cancellation_reason',
        'rescheduled_from',
        'google_event_id',
        'zoom_meeting_id',
        'status',
        'payment_status',
        'reminder_sent',
        'follow_up_sent',
    ];

    protected $casts = [
        'appointment_date' => 'date',
        'start_time' => 'datetime:H:i',
        'end_time' => 'datetime:H:i',
        'total_price' => 'decimal:2',
        'reminder_sent' => 'boolean',
        'follow_up_sent' => 'boolean',
    ];

    // Relationships
    public function business(): BelongsTo
    {
        return $this->belongsTo(Business::class);
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function provider(): BelongsTo
    {
        return $this->belongsTo(User::class, 'provider_id');
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function customFields(): HasMany
    {
        return $this->hasMany(BookingCustomField::class);
    }

    public function review(): HasOne
    {
        return $this->hasOne(Review::class);
    }

    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class);
    }

    public function rescheduledFrom(): BelongsTo
    {
        return $this->belongsTo(Booking::class, 'rescheduled_from');
    }

    public function rescheduledBookings(): HasMany
    {
        return $this->hasMany(Booking::class, 'rescheduled_from');
    }

    // Accessors
    public function getAppointmentDateTimeAttribute(): Carbon
    {
        return Carbon::parse($this->appointment_date->format('Y-m-d') . ' ' . $this->start_time);
    }

    public function getEndDateTimeAttribute(): Carbon
    {
        return Carbon::parse($this->appointment_date->format('Y-m-d') . ' ' . $this->end_time);
    }

    public function getFormattedDateAttribute(): string
    {
        return $this->appointment_date->format('d/m/Y');
    }

    public function getFormattedTimeAttribute(): string
    {
        return $this->start_time . ' - ' . $this->end_time;
    }

    public function getStatusColorAttribute(): string
    {
        return match($this->status) {
            'pending' => '#FFA500',
            'confirmed' => '#4ECDC4',
            'in_progress' => '#3498DB',
            'completed' => '#27AE60',
            'cancelled' => '#E74C3C',
            'no_show' => '#95A5A6',
            default => '#7223D8',
        };
    }

    public function getCanCancelAttribute(): bool
    {
        $cancelHours = $this->service->advance_cancel_time ?? 24;
        $cancelDeadline = $this->appointment_date_time->subHours($cancelHours);
        
        return now() < $cancelDeadline && 
               in_array($this->status, ['pending', 'confirmed']);
    }

    public function getCanRescheduleAttribute(): bool
    {
        return $this->can_cancel && in_array($this->status, ['pending', 'confirmed']);
    }

    public function getIsUpcomingAttribute(): bool
    {
        return $this->appointment_date_time > now() && 
               in_array($this->status, ['pending', 'confirmed']);
    }

    public function getIsPastAttribute(): bool
    {
        return $this->appointment_date_time < now();
    }

    // Scopes
    public function scopeToday($query)
    {
        return $query->whereDate('appointment_date', today());
    }

    public function scopeUpcoming($query)
    {
        return $query->where('appointment_date', '>=', today())
                    ->whereIn('status', ['pending', 'confirmed']);
    }

    public function scopePast($query)
    {
        return $query->where('appointment_date', '<', today());
    }

    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    public function scopeByProvider($query, $providerId)
    {
        return $query->where('provider_id', $providerId);
    }

    public function scopeByCustomer($query, $customerId)
    {
        return $query->where('customer_id', $customerId);
    }

    public function scopeByDateRange($query, $startDate, $endDate)
    {
        return $query->whereBetween('appointment_date', [$startDate, $endDate]);
    }

    public function scopeNeedingReminder($query)
    {
        return $query->where('reminder_sent', false)
                    ->where('appointment_date', '>=', today())
                    ->whereIn('status', ['confirmed']);
    }

    public function scopeNeedingFollowUp($query)
    {
        return $query->where('follow_up_sent', false)
                    ->where('status', 'completed')
                    ->where('appointment_date', '>=', today()->subDays(7));
    }

    // Helper methods
    public function isPending(): bool
    {
        return $this->status === 'pending';
    }

    public function isConfirmed(): bool
    {
        return $this->status === 'confirmed';
    }

    public function isCompleted(): bool
    {
        return $this->status === 'completed';
    }

    public function isCancelled(): bool
    {
        return $this->status === 'cancelled';
    }

    public function isPaid(): bool
    {
        return $this->payment_status === 'paid';
    }

    public function confirm(): bool
    {
        return $this->update(['status' => 'confirmed']);
    }

    public function cancel(string $reason = null): bool
    {
        return $this->update([
            'status' => 'cancelled',
            'cancellation_reason' => $reason,
        ]);
    }

    public function complete(): bool
    {
        return $this->update(['status' => 'completed']);
    }

    public function markAsPaid(): bool
    {
        return $this->update(['payment_status' => 'paid']);
    }

    public function sendReminder(): bool
    {
        // Logic to send reminder notification
        return $this->update(['reminder_sent' => true]);
    }

    public function sendFollowUp(): bool
    {
        // Logic to send follow-up notification
        return $this->update(['follow_up_sent' => true]);
    }

    public function getTotalDuration(): int
    {
        return $this->duration + 
               ($this->service->buffer_time_before ?? 0) + 
               ($this->service->buffer_time_after ?? 0);
    }

    public function getActualStartTime(): string
    {
        $bufferBefore = $this->service->buffer_time_before ?? 0;
        return Carbon::parse($this->start_time)->subMinutes($bufferBefore)->format('H:i');
    }

    public function getActualEndTime(): string
    {
        $bufferAfter = $this->service->buffer_time_after ?? 0;
        return Carbon::parse($this->end_time)->addMinutes($bufferAfter)->format('H:i');
    }

    public function generateBookingNumber(): string
    {
        $prefix = 'BK';
        $year = now()->format('y');
        $month = now()->format('m');
        
        $lastBooking = static::whereYear('created_at', now()->year)
                            ->whereMonth('created_at', now()->month)
                            ->orderBy('id', 'desc')
                            ->first();
        
        $sequence = $lastBooking ? intval(substr($lastBooking->booking_number, -4)) + 1 : 1;
        
        return $prefix . $year . $month . str_pad($sequence, 4, '0', STR_PAD_LEFT);
    }

    protected static function booted()
    {
        static::creating(function ($booking) {
            if (!$booking->booking_number) {
                $booking->booking_number = $booking->generateBookingNumber();
            }
        });
    }
}
