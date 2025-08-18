<template>
  <Teleport to="body">
    <div class="fixed bottom-6 right-6 z-50 space-y-4">
      <TransitionGroup name="toast" tag="div">
        <div
          v-for="toast in toasts"
          :key="toast.id"
          :class="toastClasses(toast.type)"
          class="toast-item"
        >
          <div class="flex items-center">
            <component :is="getToastIcon(toast.type)" class="w-6 h-6 mr-3 flex-shrink-0" />
            <span class="flex-1">{{ toast.message }}</span>
            <button 
              @click="removeToast(toast.id)"
              class="ml-3 text-current opacity-70 hover:opacity-100 transition-opacity"
            >
              <XMarkIcon class="w-5 h-5" />
            </button>
          </div>
        </div>
      </TransitionGroup>
    </div>
  </Teleport>
</template>

<script setup lang="ts">
import { useToast } from '@/composables/useToast'
import XMarkIcon from '@/components/UI/Icons/XMarkIcon.vue'
import CheckCircleIcon from '@/components/UI/Icons/CheckCircleIcon.vue'
import ExclamationTriangleIcon from '@/components/UI/Icons/ExclamationTriangleIcon.vue'
import ExclamationCircleIcon from '@/components/UI/Icons/ExclamationCircleIcon.vue'
import InformationCircleIcon from '@/components/UI/Icons/InformationCircleIcon.vue'
import type { Toast } from '@/composables/useToast'

const { toasts, removeToast } = useToast()

const toastClasses = (type: Toast['type']) => ({
  'bg-green-500 text-white': type === 'success',
  'bg-red-500 text-white': type === 'error',
  'bg-yellow-500 text-white': type === 'warning',
  'bg-blue-500 text-white': type === 'info'
})

const getToastIcon = (type: Toast['type']) => {
  const icons = {
    success: CheckCircleIcon,
    error: ExclamationCircleIcon,
    warning: ExclamationTriangleIcon,
    info: InformationCircleIcon
  }
  return icons[type]
}
</script>

<style scoped>
.toast-item {
  @apply px-6 py-4 rounded-xl shadow-lg min-w-[300px] max-w-[400px];
}

/* Toast transitions */
.toast-enter-active,
.toast-leave-active {
  transition: all 0.5s ease;
}

.toast-enter-from {
  opacity: 0;
  transform: translateX(100%) translateY(50px);
}

.toast-leave-to {
  opacity: 0;
  transform: translateX(100%);
}

.toast-move {
  transition: transform 0.5s ease;
}
</style>
