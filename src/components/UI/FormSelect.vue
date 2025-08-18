<template>
  <div class="form-group">
    <label v-if="label" :for="selectId" class="form-label">
      {{ label }}
      <span v-if="required" class="text-red-500">*</span>
    </label>
    <select
      :id="selectId"
      :required="required"
      :disabled="disabled"
      :value="modelValue"
      @change="$emit('update:modelValue', ($event.target as HTMLSelectElement).value)"
      :class="selectClasses"
      v-bind="$attrs"
    >
      <option value="" disabled>{{ placeholder || 'اختر خيار' }}</option>
      <option 
        v-for="option in options" 
        :key="option.value" 
        :value="option.value"
      >
        {{ option.label }}
      </option>
    </select>
    <span v-if="error" class="form-error">{{ error }}</span>
  </div>
</template>

<script setup lang="ts">
import { computed } from 'vue'
import { generateId } from '@/utils/helpers'

interface Option {
  value: string
  label: string
}

interface Props {
  modelValue: string
  options: Option[]
  label?: string
  placeholder?: string
  required?: boolean
  disabled?: boolean
  error?: string
}

const props = withDefaults(defineProps<Props>(), {
  required: false,
  disabled: false
})

defineEmits<{
  'update:modelValue': [value: string]
}>()

const selectId = generateId('select')

const selectClasses = computed(() => [
  'form-input',
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
  @apply w-full border border-gray-300 rounded-xl px-4 py-3 focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20 transition-all duration-300;
}

.form-error {
  @apply text-red-500 text-sm;
}
</style>
