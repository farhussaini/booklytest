export interface BookingData {
  name: string
  email: string
  phone: string
  company?: string
  service: string
  preferredDate: string
  notes?: string
}

export interface ServiceOption {
  value: string
  label: string
}

export interface Booking {
  id: string
  name: string
  email: string
  phone: string
  company?: string
  service: string
  preferredDate: string
  notes?: string
  status: 'pending' | 'confirmed' | 'cancelled'
  createdAt: string
  updatedAt: string
}
