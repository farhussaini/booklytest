export interface RegistrationData {
  firstName: string
  lastName: string
  email: string
  phone: string
  password: string
}

export interface LoginData {
  email: string
  password: string
}

export interface User {
  id: string
  firstName: string
  lastName: string
  email: string
  phone: string
  createdAt: string
  updatedAt: string
}
