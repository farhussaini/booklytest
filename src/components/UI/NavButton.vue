<template>
  <button
    :type="type"
    :disabled="disabled"
    class="text-text-primary hover:text-primary transition-colors font-medium py-2 px-4 rounded-lg hover:bg-purple-light/20"
    v-bind="$attrs"
  >
    <slot />
  </button>
</template>

<script setup lang="ts">
interface Props {
  type?: 'button' | 'submit' | 'reset'
  disabled?: boolean
}

withDefaults(defineProps<Props>(), {
  type: 'button',
  disabled: false
})
</script>
