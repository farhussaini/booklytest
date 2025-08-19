# Bookly Database API Documentation

## Overview
This document provides comprehensive information about the Bookly booking system database structure and available API endpoints.

## Database Schema Summary

### Core Tables
- **users** - Customer, provider, and admin accounts
- **businesses** - Business/company information
- **services** - Available services offered by businesses
- **bookings** - Appointment and booking records
- **payments** - Payment transactions and records
- **notifications** - System notifications and communications

### Supporting Tables
- **service_categories** - Service organization
- **service_providers** - Staff assignment to services
- **availability_schedules** - Provider availability
- **reviews** - Customer feedback and ratings
- **subscription_plans** - Available subscription tiers
- **business_subscriptions** - Active business subscriptions

## API Endpoints

### Authentication
```
POST /api/auth/register
POST /api/auth/login
POST /api/auth/logout
POST /api/auth/refresh
POST /api/auth/forgot-password
POST /api/auth/reset-password
```

### Users
```
GET    /api/users                # List users
POST   /api/users                # Create user
GET    /api/users/{id}           # Get user details
PUT    /api/users/{id}           # Update user
DELETE /api/users/{id}           # Delete user
GET    /api/users/profile        # Get current user profile
PUT    /api/users/profile        # Update current user profile
```

### Businesses
```
GET    /api/businesses           # List businesses
POST   /api/businesses           # Create business
GET    /api/businesses/{id}      # Get business details
PUT    /api/businesses/{id}      # Update business
DELETE /api/businesses/{id}      # Delete business
GET    /api/businesses/{id}/staff # Get business staff
POST   /api/businesses/{id}/staff # Add staff member
```

### Services
```
GET    /api/businesses/{business}/services           # List services
POST   /api/businesses/{business}/services           # Create service
GET    /api/businesses/{business}/services/{id}      # Get service details
PUT    /api/businesses/{business}/services/{id}      # Update service
DELETE /api/businesses/{business}/services/{id}      # Delete service
GET    /api/businesses/{business}/service-categories # List categories
POST   /api/businesses/{business}/service-categories # Create category
```

### Bookings
```
GET    /api/bookings                    # List bookings
POST   /api/bookings                    # Create booking
GET    /api/bookings/{id}               # Get booking details
PUT    /api/bookings/{id}               # Update booking
DELETE /api/bookings/{id}               # Cancel booking
POST   /api/bookings/{id}/confirm       # Confirm booking
POST   /api/bookings/{id}/complete      # Mark as completed
POST   /api/bookings/{id}/reschedule    # Reschedule booking
GET    /api/bookings/availability       # Check availability
```

### Payments
```
GET    /api/payments                    # List payments
POST   /api/payments                    # Process payment
GET    /api/payments/{id}               # Get payment details
POST   /api/payments/{id}/refund        # Process refund
GET    /api/bookings/{id}/payments      # Get booking payments
```

### Reviews
```
GET    /api/reviews                     # List reviews
POST   /api/reviews                     # Create review
GET    /api/reviews/{id}                # Get review details
PUT    /api/reviews/{id}                # Update review
DELETE /api/reviews/{id}                # Delete review
GET    /api/businesses/{id}/reviews     # Get business reviews
GET    /api/services/{id}/reviews       # Get service reviews
```

### Notifications
```
GET    /api/notifications               # List notifications
POST   /api/notifications               # Send notification
GET    /api/notifications/{id}          # Get notification details
PUT    /api/notifications/{id}/read     # Mark as read
DELETE /api/notifications/{id}          # Delete notification
```

## Database Relationships

### User Relationships
- User → Businesses (owner/staff)
- User → Bookings (as customer or provider)
- User → Reviews (given and received)
- User → Payments
- User → Notifications

### Business Relationships
- Business → Users (owner and staff)
- Business → Services
- Business → Bookings
- Business → Reviews
- Business → Subscriptions

### Booking Relationships
- Booking → Business
- Booking → Service
- Booking → Customer (User)
- Booking → Provider (User)
- Booking → Payment
- Booking → Review

## Key Features

### Booking System
- **Multi-provider support** - Multiple staff can provide the same service
- **Flexible scheduling** - Custom availability schedules per provider
- **Buffer times** - Before/after appointment buffers
- **Advance booking rules** - Minimum advance booking time
- **Cancellation policies** - Configurable cancellation windows

### Payment Integration
- **Multiple gateways** - Support for various payment methods
- **Saudi-specific** - Mada, STC Pay integration
- **Refund handling** - Automated refund processing
- **Commission tracking** - Provider commission calculation

### Notification System
- **Multi-channel** - Email, SMS, WhatsApp, Push notifications
- **Automated triggers** - Booking confirmations, reminders, follow-ups
- **Template system** - Customizable message templates
- **Delivery tracking** - Open and click tracking

### Review System
- **Rating system** - 1-5 star ratings
- **Moderation** - Review approval workflow
- **Response system** - Business can respond to reviews
- **Verification** - Only verified bookings can leave reviews

### Subscription Management
- **Tiered plans** - Multiple subscription levels
- **Usage limits** - Bookings, services, staff limits
- **Auto-renewal** - Automated subscription renewal
- **Feature gating** - Premium features based on plan

## Security Features

### Authentication
- **JWT tokens** - Secure API authentication
- **Role-based access** - Admin, business owner, staff, customer roles
- **Permission system** - Granular permissions per role

### Data Protection
- **Encryption** - Sensitive data encryption
- **Audit logging** - Activity tracking and logs
- **GDPR compliance** - Data export and deletion capabilities

### Payment Security
- **PCI compliance** - Secure payment processing
- **Tokenization** - Card data tokenization
- **Fraud prevention** - Transaction monitoring

## Performance Considerations

### Database Optimization
- **Proper indexing** - Optimized queries with indexes
- **Relationship optimization** - Efficient foreign keys
- **Query optimization** - Optimized for common use cases

### Caching Strategy
- **Redis integration** - Session and data caching
- **Query caching** - Database query caching
- **API response caching** - Cached API responses

### Scalability
- **Horizontal scaling** - Database sharding support
- **Load balancing** - Multi-server deployment
- **CDN integration** - Asset delivery optimization

## Usage Examples

### Create a Booking
```json
POST /api/bookings
{
    "business_id": 1,
    "service_id": 1,
    "provider_id": 2,
    "appointment_date": "2024-01-15",
    "start_time": "10:00",
    "customer_notes": "First time visit",
    "participants": 1
}
```

### Check Availability
```json
GET /api/bookings/availability?business_id=1&service_id=1&date=2024-01-15&provider_id=2
```

### Process Payment
```json
POST /api/payments
{
    "booking_id": 123,
    "payment_method": "card",
    "amount": 150.00,
    "currency": "SAR",
    "gateway_token": "token_from_payment_gateway"
}
```

### Send Notification
```json
POST /api/notifications
{
    "user_id": 456,
    "type": "sms",
    "channel": "booking_reminder",
    "title": "موعد غداً",
    "message": "تذكير: لديك موعد غداً في الساعة 10:00 صباحاً",
    "scheduled_at": "2024-01-14T20:00:00Z"
}
```

## Migration Commands

```bash
# Run all migrations
php artisan migrate

# Seed the database with sample data
php artisan db:seed

# Reset and reseed database
php artisan migrate:fresh --seed

# Create new migration
php artisan make:migration create_table_name

# Rollback last migration
php artisan migrate:rollback
```

## Model Commands

```bash
# Create new model with migration
php artisan make:model ModelName -m

# Create model with factory and seeder
php artisan make:model ModelName -mfs

# Create controller for model
php artisan make:controller ModelNameController --resource
```

This database structure provides a comprehensive foundation for a professional booking management system with support for multiple businesses, services, providers, and advanced features like subscriptions, reviews, and notifications.
