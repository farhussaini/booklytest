<template>
  <BaseModal 
    :show="show"
    @close="$emit('close')"
    title="احجز موعد للتدريب"
  >
    <form @submit.prevent="handleSubmit" class="space-y-4">
      <FormInput
        v-model="form.name"
        type="text"
        placeholder="الاسم كامل"
        required
      />
      
      <FormInput
        v-model="form.email"
        type="email"
        placeholder="البريد الإلكتروني"
        required
      />
      
      <FormInput
        v-model="form.phone"
        type="tel"
        placeholder="رقم الهاتف"
        required
      />
      
      <FormInput
        v-model="form.company"
        type="text"
        placeholder="اسم الشركة (اختياري)"
      />
      
      <FormSelect
        v-model="form.service"
        :options="serviceOptions"
        placeholder="اختر نوع الخدمة"
        required
      />
      
      <FormInput
        v-model="form.preferredDate"
        type="date"
        required
      />
      
      <FormTextarea
        v-model="form.notes"
        placeholder="ملاحظات إضافية"
        rows="3"
      />
      
      <PrimaryButton 
        type="submit"
        :loading="submitting"
        class="w-full"
      >
        {{ submitting ? 'جاري الحجز...' : 'احجز الآن' }}
      </PrimaryButton>
    </form>
  </BaseModal>
</template>

<script setup lang="ts">
import { reactive } from 'vue'
import BaseModal from '@/components/UI/BaseModal.vue'
import FormInput from '@/components/UI/FormInput.vue'
import FormSelect from '@/components/UI/FormSelect.vue'
import FormTextarea from '@/components/UI/FormTextarea.vue'
import PrimaryButton from '@/components/UI/PrimaryButton.vue'
import type { BookingData, ServiceOption } from '@/types/booking'

// Define props
defineProps<{
  show: boolean
  submitting?: boolean
}>()

// Define emits
defineEmits<{
  close: []
  submit: [data: BookingData]
}>()

// Service options
const serviceOptions: ServiceOption[] = [
  { value: '', label: 'اختر نوع الخدمة' },
  { value: 'demo', label: 'عرض تجريبي' },
  { value: 'training', label: 'تدريب شخصي' },
  { value: 'setup', label: 'إعداد النظام' },
  { value: 'consultation', label: 'استشارة' }
]

// Form state
const form = reactive<BookingData>({
  name: '',
  email: '',
  phone: '',
  company: '',
  service: '',
  preferredDate: '',
  notes: ''
})

// Methods
const handleSubmit = () => {
  const formData = { ...form }
  $emit('submit', formData)
  
  // Reset form
  Object.assign(form, {
    name: '',
    email: '',
    phone: '',
    company: '',
    service: '',
    preferredDate: '',
    notes: ''
  })
}
</script>
