<template>
  <Teleport to="body">
    <Transition name="modal">
      <div v-if="show" class="modal-overlay" @click="$emit('close')">
        <div class="modal-content" @click.stop>
          <div class="modal-header">
            <h3 class="text-2xl font-bold text-text-primary">{{ title }}</h3>
            <button 
              @click="$emit('close')" 
              class="text-gray-400 hover:text-gray-600 transition-colors"
              aria-label="Close modal"
            >
              <XMarkIcon class="w-6 h-6" />
            </button>
          </div>
          <div class="modal-body">
            <slot />
          </div>
        </div>
      </div>
    </Transition>
  </Teleport>
</template>

<script setup lang="ts">
import XMarkIcon from '@/components/UI/Icons/XMarkIcon.vue'

// Define props
defineProps<{
  show: boolean
  title: string
}>()

// Define emits
defineEmits<{
  close: []
}>()
</script>

<style scoped>
.modal-overlay {
  @apply fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4 backdrop-blur-sm;
}

.modal-content {
  @apply bg-white rounded-2xl max-w-md w-full max-h-[90vh] overflow-y-auto shadow-2xl;
}

.modal-header {
  @apply flex items-center justify-between p-6 pb-4 border-b border-gray-200;
}

.modal-body {
  @apply p-6;
}

/* Transitions */
.modal-enter-active,
.modal-leave-active {
  transition: opacity 0.3s ease;
}

.modal-enter-from,
.modal-leave-to {
  opacity: 0;
}

.modal-enter-active .modal-content,
.modal-leave-active .modal-content {
  transition: transform 0.3s ease;
}

.modal-enter-from .modal-content,
.modal-leave-to .modal-content {
  transform: scale(0.9) translateY(-50px);
}
</style>
