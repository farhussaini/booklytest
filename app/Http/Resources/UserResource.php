<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'full_name' => $this->full_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'date_of_birth' => $this->date_of_birth?->format('Y-m-d'),
            'gender' => $this->gender,
            'address' => $this->address,
            'city' => $this->city,
            'country' => $this->country,
            'timezone' => $this->timezone,
            'language' => $this->language,
            'user_type' => $this->user_type,
            'status' => $this->status,
            'avatar_url' => $this->avatar_url,
            'email_verified_at' => $this->email_verified_at?->format('Y-m-d H:i:s'),
            'created_at' => $this->created_at?->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at?->format('Y-m-d H:i:s'),
            
            // Conditional data
            'businesses_count' => $this->when(
                $this->relationLoaded('ownedBusinesses'),
                fn() => $this->ownedBusinesses->count()
            ),
            'owned_businesses' => BusinessResource::collection($this->whenLoaded('ownedBusinesses')),
            'bookings_count' => $this->when(
                $this->relationLoaded('customerBookings'),
                fn() => $this->customerBookings->count()
            ),
        ];
    }

    /**
     * Get additional data that should be returned with the resource array.
     *
     * @return array<string, mixed>
     */
    public function with(Request $request): array
    {
        return [
            'meta' => [
                'user_permissions' => [
                    'can_create_business' => $this->resource->user_type === 'provider',
                    'can_book_services' => $this->resource->user_type === 'customer',
                    'is_admin' => $this->resource->user_type === 'admin',
                ],
            ],
        ];
    }
}
