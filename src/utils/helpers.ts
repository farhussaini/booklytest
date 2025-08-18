/**
 * Generate a unique ID with optional prefix
 */
export function generateId(prefix = 'id'): string {
  const timestamp = Date.now().toString(36)
  const random = Math.random().toString(36).substr(2, 5)
  return `${prefix}-${timestamp}-${random}`
}

/**
 * Debounce function to limit execution frequency
 */
export function debounce<T extends (...args: any[]) => any>(
  func: T,
  wait: number
): (...args: Parameters<T>) => void {
  let timeout: NodeJS.Timeout | null = null
  
  return (...args: Parameters<T>) => {
    if (timeout) {
      clearTimeout(timeout)
    }
    
    timeout = setTimeout(() => {
      func(...args)
    }, wait)
  }
}

/**
 * Format date to Arabic locale
 */
export function formatDateArabic(date: Date | string): string {
  const dateObj = typeof date === 'string' ? new Date(date) : date
  
  return dateObj.toLocaleDateString('ar-SA', {
    year: 'numeric',
    month: 'long',
    day: 'numeric'
  })
}

/**
 * Validate email format
 */
export function isValidEmail(email: string): boolean {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
  return emailRegex.test(email)
}

/**
 * Validate phone number (Saudi format)
 */
export function isValidSaudiPhone(phone: string): boolean {
  const phoneRegex = /^(\+966|0)?5[0-9]{8}$/
  return phoneRegex.test(phone.replace(/\s+/g, ''))
}

/**
 * Truncate text with ellipsis
 */
export function truncateText(text: string, maxLength: number): string {
  if (text.length <= maxLength) return text
  return text.substr(0, maxLength) + '...'
}

/**
 * Convert Arabic numerals to English
 */
export function arabicToEnglishNumbers(str: string): string {
  const arabicNumbers = ['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩']
  const englishNumbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9']
  
  let result = str
  for (let i = 0; i < arabicNumbers.length; i++) {
    result = result.replace(new RegExp(arabicNumbers[i], 'g'), englishNumbers[i])
  }
  
  return result
}

/**
 * Sleep function for async operations
 */
export function sleep(ms: number): Promise<void> {
  return new Promise(resolve => setTimeout(resolve, ms))
}

/**
 * Check if element is in viewport
 */
export function isInViewport(element: Element): boolean {
  const rect = element.getBoundingClientRect()
  return (
    rect.top >= 0 &&
    rect.left >= 0 &&
    rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
    rect.right <= (window.innerWidth || document.documentElement.clientWidth)
  )
}
