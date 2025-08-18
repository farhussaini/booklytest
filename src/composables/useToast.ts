import { ref, reactive } from 'vue'

export interface Toast {
  id: string
  message: string
  type: 'success' | 'error' | 'warning' | 'info'
  duration?: number
}

const toasts = ref<Toast[]>([])

export function useToast() {
  const showToast = (
    message: string, 
    type: Toast['type'] = 'success', 
    duration: number = 4000
  ) => {
    const id = `toast-${Date.now()}-${Math.random().toString(36).substr(2, 9)}`
    
    const toast: Toast = {
      id,
      message,
      type,
      duration
    }
    
    toasts.value.push(toast)
    
    if (duration > 0) {
      setTimeout(() => {
        removeToast(id)
      }, duration)
    }
    
    return id
  }

  const removeToast = (id: string) => {
    const index = toasts.value.findIndex(toast => toast.id === id)
    if (index > -1) {
      toasts.value.splice(index, 1)
    }
  }

  const clearAllToasts = () => {
    toasts.value = []
  }

  // Convenience methods
  const showSuccess = (message: string, duration?: number) => 
    showToast(message, 'success', duration)
  
  const showError = (message: string, duration?: number) => 
    showToast(message, 'error', duration)
  
  const showWarning = (message: string, duration?: number) => 
    showToast(message, 'warning', duration)
  
  const showInfo = (message: string, duration?: number) => 
    showToast(message, 'info', duration)

  return {
    toasts: readonly(toasts),
    showToast,
    removeToast,
    clearAllToasts,
    showSuccess,
    showError,
    showWarning,
    showInfo
  }
}
