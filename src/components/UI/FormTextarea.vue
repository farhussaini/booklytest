<template>
  <div class="form-group">
    <label v-if="label" :for="textareaId" class="form-label">
      {{ label }}
      <span v-if="required" class="text-red-500">*</span>
    </label>
    <textarea
      :id="textareaId"
      :placeholder="placeholder"
      :required="required"
      :disabled="disabled"
      :rows="rows"
      :value="modelValue"
      @input="$emit('update:modelValue', ($event.target as HTMLTextAreaElement).value)"
      :class="textareaClasses"
      v-bind="$attrs"
    ></textarea>
    <span v-if="error" class="form-error">{{ error }}</span>
  </div>
</template>

<script setup lang="ts">
import { computed } from 'vue'
import { generateId } from '@/utils/helpers'

interface Props {
  modelValue: string
  label?: string
  placeholder?: string
  rows?: number
  required?: boolean
  disabled?: boolean
  error?: string
}

const props = withDefaults(defineProps<Props>(), {
  rows: 4,
  required: false,
  disabled: false
})

defineEmits<{
  'update:modelValue': [value: string]
}>()

const textareaId = generateId('textarea')

const textareaClasses = computed(() => [
  'form-input resize-none',
  {
    'border-red-500 focus:border-red-500': props.error,
    'opacity-50 cursor-not-allowed': props.disabled
  }
])
</script>

<style scoped>
.form-group {
  @apply space-y-2;
}

.form-label {
  @apply block text-text-primary font-medium text-sm;
}

.form-input {
  @apply w-full border border-gray-300 rounded-xl px-4 py-3 text-black placeholder:text-gray-400 caret-black focus:text-black focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20 transition-all duration-300;
}

.form-error {
  @apply text-red-500 text-sm;
}
</style>
