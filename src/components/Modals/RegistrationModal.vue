<template>
  <BaseModal 
    :show="show"
    @close="$emit('close')"
    title="تسجيل حساب جديد"
  >
    <form @submit.prevent="handleSubmit" class="space-y-4">
      <div class="grid grid-cols-2 gap-4">
        <FormInput
          v-model="form.firstName"
          type="text"
          placeholder="الاسم الأول"
          required
        />
        <FormInput
          v-model="form.lastName"
          type="text"
          placeholder="الاسم الأخير"
          required
        />
      </div>
      
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
        v-model="form.password"
        type="password"
        placeholder="كلمة المرور"
        required
      />
      
      <PrimaryButton 
        type="submit"
        :loading="submitting"
        class="w-full"
      >
        {{ submitting ? 'جاري التسجيل...' : 'تسجيل' }}
      </PrimaryButton>
    </form>
  </BaseModal>
</template>

<script setup lang="ts">
import { reactive } from 'vue'
import BaseModal from '@/components/UI/BaseModal.vue'
import FormInput from '@/components/UI/FormInput.vue'
import PrimaryButton from '@/components/UI/PrimaryButton.vue'
import type { RegistrationData } from '@/types/auth'

// Define props
defineProps<{
  show: boolean
  submitting?: boolean
}>()

// Define emits
defineEmits<{
  close: []
  submit: [data: RegistrationData]
}>()

// Form state
const form = reactive<RegistrationData>({
  firstName: '',
  lastName: '',
  email: '',
  phone: '',
  password: ''
})

// Methods
const handleSubmit = () => {
  const formData = { ...form }
  $emit('submit', formData)
  
  // Reset form
  Object.assign(form, {
    firstName: '',
    lastName: '',
    email: '',
    phone: '',
    password: ''
  })
}
</script>
