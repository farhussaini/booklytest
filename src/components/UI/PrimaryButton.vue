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
  variant?: 'primary' | 'gradient' | 'secondary' | 'default'
}

const props = withDefaults(defineProps<Props>(), {
  type: 'button',
  size: 'medium',
  disabled: false,
  loading: false,
  variant: 'gradient'
})

// Computed classes
const buttonClasses = computed(() => [
  'btn-primary',
  `btn-${props.size}`,
  {
    'opacity-50 cursor-not-allowed': props.disabled || props.loading,
    // Solid primary
    'bg-primary': props.variant === 'primary',
    // Gradient/default primary
    'bg-gradient-primary': props.variant === 'gradient' || props.variant === 'default',
    // Text colors by variant
    'text-white': props.variant === 'primary' || props.variant === 'gradient' || props.variant === 'default',
    'text-primary': props.variant === 'secondary',
    // Secondary outlined style
    'border-2': props.variant === 'secondary',
    'border-primary': props.variant === 'secondary',
    'hover:bg-primary': props.variant === 'secondary',
    'hover:text-white': props.variant === 'secondary'
  }
])
</script>

<style scoped>
.btn-primary {
  @apply font-semibold rounded-xl transition-all duration-300 hover:shadow-lg hover:scale-105 flex items-center gap-3 justify-center;
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

.bg-gradient-primary {
  background: linear-gradient(275deg, #DD4C7B -0.05%, #7223D8 100%);
}
</style>
