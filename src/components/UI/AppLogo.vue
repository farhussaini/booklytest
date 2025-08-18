<template>
  <svg 
    :width="size" 
    :height="size" 
    viewBox="0 0 24 24" 
    fill="none" 
    xmlns="http://www.w3.org/2000/svg"
    :class="classes"
  >
    <path 
      d="M15 8L10 12L15 16V8Z" 
      :fill="color"
    />
  </svg>
</template>

<script setup lang="ts">
import { computed } from 'vue'

// Define props
interface Props {
  size?: number | string
  color?: string
  class?: string
}

const props = withDefaults(defineProps<Props>(), {
  size: 24,
  color: 'currentColor',
  class: ''
})

// Computed classes
const classes = computed(() => props.class)
</script>
