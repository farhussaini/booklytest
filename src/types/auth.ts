export interface RegistrationData {
  firstName: string
  lastName: string
  email: string
  phone: string
  password: string
  passwordConfirmation?: string
  userType?: 'customer' | 'provider'
  gender?: 'male' | 'female' | 'other'
  dateOfBirth?: string
  address?: string
  city?: string
  country?: string
}

export interface LoginData {
  email: string
  password: string
}

export interface User {
  id: number
  first_name: string
  last_name: string
  full_name: string
  email: string
  phone: string
  user_type: 'customer' | 'provider' | 'admin'
  status: 'active' | 'inactive' | 'suspended'
  avatar_url: string
  created_at: string
  updated_at: string
  email_verified_at?: string
}

export interface AuthResponse {
  success: boolean
  message: string
  data: {
    user: User
    token: string
    token_type: string
  }
}

export interface ApiError {
  success: false
  message: string
  errors?: Record<string, string[]>
}
