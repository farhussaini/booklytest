# User Registration API Documentation

## Overview
This document provides detailed information about the user registration system API endpoints for the Bookly booking platform.

## Base URL
```
/api/auth
```

## Authentication
Most endpoints require Bearer token authentication except for registration and login.

## Endpoints

### 1. User Registration

**POST** `/api/auth/register`

Register a new user account.

#### Request Body
```json
{
  "first_name": "أحمد",
  "last_name": "السعدي",
  "email": "ahmed@example.com",
  "phone": "+966501234567",
  "password": "SecurePass123!",
  "password_confirmation": "SecurePass123!",
  "date_of_birth": "1990-01-01",
  "gender": "male",
  "address": "123 شارع الملك فهد",
  "city": "الرياض",
  "country": "السعودية",
  "timezone": "Asia/Riyadh",
  "language": "ar",
  "user_type": "customer"
}
```

#### Required Fields
- `first_name`: string (max: 255)
- `last_name`: string (max: 255)
- `email`: string, unique, valid email format
- `password`: string, min 8 chars, mixed case, numbers, symbols
- `password_confirmation`: must match password
- `user_type`: enum ('customer', 'provider')

#### Optional Fields
- `phone`: string (max: 20), valid phone format
- `date_of_birth`: date (before today)
- `gender`: enum ('male', 'female', 'other')
- `address`: string (max: 500)
- `city`: string (max: 100)
- `country`: string (max: 100)
- `timezone`: string (max: 50), default: 'Asia/Riyadh'
- `language`: enum ('ar', 'en'), default: 'ar'

#### Success Response (201)
```json
{
  "success": true,
  "message": "User registered successfully",
  "data": {
    "user": {
      "id": 1,
      "first_name": "أحمد",
      "last_name": "السعدي",
      "full_name": "أحمد السعدي",
      "email": "ahmed@example.com",
      "phone": "+966501234567",
      "user_type": "customer",
      "status": "active",
      "avatar_url": "https://ui-avatars.com/api/?name=أحمد+السعدي&background=7223D8&color=fff",
      "created_at": "2024-01-01T12:00:00.000000Z"
    },
    "token": "1|abcdef123456...",
    "token_type": "Bearer"
  }
}
```

#### Error Response (422)
```json
{
  "success": false,
  "message": "Validation failed",
  "errors": {
    "email": ["البريد الإلكتروني مستخدم بالفعل"],
    "password": ["كلمة المرور يجب أن تتكون من 8 أحرف على الأقل"]
  }
}
```

### 2. User Login

**POST** `/api/auth/login`

Authenticate user and get access token.

#### Request Body
```json
{
  "email": "ahmed@example.com",
  "password": "SecurePass123!"
}
```

#### Success Response (200)
```json
{
  "success": true,
  "message": "Login successful",
  "data": {
    "user": {
      "id": 1,
      "first_name": "أحمد",
      "last_name": "السعدي",
      "full_name": "أحمد السعدي",
      "email": "ahmed@example.com",
      "phone": "+966501234567",
      "user_type": "customer",
      "status": "active",
      "avatar_url": "https://ui-avatars.com/api/?name=أحمد+السعدي&background=7223D8&color=fff"
    },
    "token": "2|ghijkl789012...",
    "token_type": "Bearer"
  }
}
```

#### Error Response (401)
```json
{
  "success": false,
  "message": "Invalid credentials"
}
```

### 3. User Logout

**POST** `/api/auth/logout`

Logout user and invalidate current token.

#### Headers
```
Authorization: Bearer {token}
```

#### Success Response (200)
```json
{
  "success": true,
  "message": "Logged out successfully"
}
```

### 4. Get User Profile

**GET** `/api/auth/profile`

Get current user's profile information.

#### Headers
```
Authorization: Bearer {token}
```

#### Success Response (200)
```json
{
  "success": true,
  "data": {
    "user": {
      "id": 1,
      "first_name": "أحمد",
      "last_name": "السعدي",
      "full_name": "أحمد السعدي",
      "email": "ahmed@example.com",
      "phone": "+966501234567",
      "date_of_birth": "1990-01-01",
      "gender": "male",
      "address": "123 شارع الملك فهد",
      "city": "الرياض",
      "country": "السعودية",
      "timezone": "Asia/Riyadh",
      "language": "ar",
      "user_type": "customer",
      "status": "active",
      "avatar_url": "https://ui-avatars.com/api/?name=أحمد+السعدي&background=7223D8&color=fff",
      "email_verified_at": "2024-01-01T12:00:00.000000Z",
      "created_at": "2024-01-01T12:00:00.000000Z",
      "updated_at": "2024-01-01T12:00:00.000000Z"
    }
  }
}
```

### 5. Update User Profile

**PUT** `/api/auth/profile`

Update current user's profile information.

#### Headers
```
Authorization: Bearer {token}
```

#### Request Body
```json
{
  "first_name": "أحمد",
  "last_name": "السعدي المحدث",
  "phone": "+966501234568",
  "address": "456 شارع العليا الجديد",
  "city": "الرياض"
}
```

#### Success Response (200)
```json
{
  "success": true,
  "message": "Profile updated successfully",
  "data": {
    "user": {
      "id": 1,
      "first_name": "أحمد",
      "last_name": "السعدي المحدث",
      "full_name": "أحمد السعدي المحدث",
      "email": "ahmed@example.com",
      "phone": "+966501234568",
      "address": "456 شارع العليا الجديد",
      "city": "الرياض",
      "updated_at": "2024-01-01T13:00:00.000000Z"
    }
  }
}
```

### 6. Change Password

**POST** `/api/auth/change-password`

Change user's password.

#### Headers
```
Authorization: Bearer {token}
```

#### Request Body
```json
{
  "current_password": "OldPassword123!",
  "password": "NewPassword456!",
  "password_confirmation": "NewPassword456!"
}
```

#### Success Response (200)
```json
{
  "success": true,
  "message": "Password changed successfully"
}
```

#### Error Response (400)
```json
{
  "success": false,
  "message": "Current password is incorrect"
}
```

## Email Verification Endpoints

### 7. Send Verification Email

**POST** `/api/auth/email/verification-notification`

Send email verification link to user.

#### Headers
```
Authorization: Bearer {token}
```

#### Success Response (200)
```json
{
  "success": true,
  "message": "Verification email sent successfully"
}
```

### 8. Verify Email

**GET** `/api/auth/email/verify/{id}/{hash}`

Verify user's email address using verification link.

#### Success Response (200)
```json
{
  "success": true,
  "message": "Email verified successfully"
}
```

### 9. Check Verification Status

**GET** `/api/auth/email/verification-status`

Check current user's email verification status.

#### Headers
```
Authorization: Bearer {token}
```

#### Success Response (200)
```json
{
  "success": true,
  "data": {
    "is_verified": true,
    "email": "ahmed@example.com",
    "verified_at": "2024-01-01T12:00:00.000000Z"
  }
}
```

## User Types

### Customer
- Can book services
- Can leave reviews
- Can manage their bookings
- Cannot create businesses

### Provider
- Can create and manage businesses
- Can offer services
- Can accept/reject bookings
- Can manage staff
- Can view analytics

### Admin
- Full system access
- Can manage all users and businesses
- Can view all bookings and transactions
- Can configure system settings

## Status Values

### User Status
- `active`: User can use the platform normally
- `inactive`: User account is temporarily disabled
- `suspended`: User account is suspended due to violations

## Error Codes

- `400`: Bad Request - Invalid data or business logic error
- `401`: Unauthorized - Invalid credentials or token
- `403`: Forbidden - Account suspended or insufficient permissions
- `422`: Unprocessable Entity - Validation errors
- `500`: Internal Server Error - System error

## Rate Limiting

Registration and login endpoints are rate limited to prevent abuse:
- Registration: 5 attempts per hour per IP
- Login: 10 attempts per hour per IP
- Password reset: 3 attempts per hour per email

## Testing Users

The system includes pre-seeded test users for development:

### Admin
- Email: `admin@bookly.sa`
- Password: `password123`

### Providers
- Email: `ahmed.saadi@provider.com`
- Email: `fatima.mohammadi@provider.com`
- Email: `mohammed.otaibi@provider.com`
- Password: `password123`

### Customers
- Email: `sarah.ghamdi@customer.com`
- Email: `abdullah.qahtani@customer.com`
- Email: `nora.shahri@customer.com`
- Email: `khalid.baqami@customer.com`
- Password: `password123`

## Security Features

1. **Password Requirements**: Minimum 8 characters with mixed case, numbers, and symbols
2. **Email Verification**: Required for account activation
3. **Rate Limiting**: Prevents brute force attacks
4. **Token-based Authentication**: Secure API access using Laravel Sanctum
5. **Input Validation**: Comprehensive validation for all user inputs
6. **SQL Injection Protection**: Using Laravel's Eloquent ORM
7. **XSS Protection**: Input sanitization and output encoding

## Development Setup

1. Run migrations:
```bash
php artisan migrate
```

2. Seed the database:
```bash
php artisan db:seed --class=UserSeeder
```

3. Test API endpoints using tools like Postman or curl
