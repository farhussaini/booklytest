import type { RegistrationData, LoginData } from '@/types/auth'

// API Configuration
const API_BASE_URL = window.location.origin + '/api'

class ApiService {
  private async request<T>(endpoint: string, options: RequestInit = {}): Promise<T> {
    const url = `${API_BASE_URL}${endpoint}`

    const config: RequestInit = {
      headers: {
        'Content-Type': 'application/json',
        Accept: 'application/json',
        'X-Requested-With': 'XMLHttpRequest',
        ...options.headers,
      },
      ...options,
    }

    // Add CSRF token if available
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
    if (csrfToken) {
      config.headers = {
        ...config.headers,
        'X-CSRF-TOKEN': csrfToken,
      }
    }

    try {
      const response = await fetch(url, config)

      if (!response.ok) {
        const errorData = await response.json()
        throw new Error(JSON.stringify(errorData))
      }

      return await response.json()
    } catch (error) {
      console.error('API Request failed:', error)
      throw error
    }
  }

  // Authentication endpoints
  async register(data: RegistrationData) {
    return this.request('/auth/register', {
      method: 'POST',
      body: JSON.stringify({
        first_name: data.firstName,
        last_name: data.lastName,
        email: data.email,
        phone: data.phone,
        password: data.password,
        password_confirmation: data.passwordConfirmation || data.password,
        user_type: data.userType || 'customer',
        language: 'ar',
        timezone: 'Asia/Riyadh',
      }),
    })
  }

  async login(data: LoginData) {
    return this.request('/auth/login', {
      method: 'POST',
      body: JSON.stringify(data),
    })
  }

  async logout() {
    return this.request('/auth/logout', {
      method: 'POST',
    })
  }

  async getProfile() {
    return this.request('/auth/profile', {
      method: 'GET',
    })
  }

  async updateProfile(data: Partial<RegistrationData>) {
    return this.request('/auth/profile', {
      method: 'PUT',
      body: JSON.stringify(data),
    })
  }
}

export const apiService = new ApiService()
export default apiService
