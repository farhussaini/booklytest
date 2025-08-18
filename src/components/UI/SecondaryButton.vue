<template>
  <button
    :type="type"
    :disabled="disabled || loading"
    :class="buttonClasses"
    v-bind="$attrs"
  >
    <LoadingSpinner v-if="loading" class="w-5 h-5" />
    <slot v-else />
  </button>
</template>

<script setup lang="ts">
import { computed } from 'vue'
import LoadingSpinner from '@/components/UI/LoadingSpinner.vue'

// Define props
interface Props {
  type?: 'button' | 'submit' | 'reset'
  size?: 'small' | 'medium' | 'large' | 'xl'
  disabled?: boolean
  loading?: boolean
}

const props = withDefaults(defineProps<Props>(), {
  type: 'button',
  size: 'medium',
  disabled: false,
  loading: false
})

// Computed classes
const buttonClasses = computed(() => [
  'btn-secondary',
  `btn-${props.size}`,
  {
    'opacity-50 cursor-not-allowed': props.disabled || props.loading
  }
])
</script>

<style scoped>
.btn-secondary {
  @apply border-2 border-primary text-primary font-semibold rounded-xl transition-all duration-300 hover:bg-primary hover:text-white hover:scale-105 flex items-center gap-3 justify-center;
}

.btn-small {
  @apply px-4 py-2 text-sm;
}

.btn-medium {
  @apply px-6 py-3 text-base;
}

.btn-large {
  @apply px-8 py-4 text-lg;
}

.btn-xl {
  @apply px-12 py-5 text-xl rounded-2xl;
}
</style>
