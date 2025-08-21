<template>
  <BaseModal :show="show" @close="emit('close')" title="تسجيل حساب جديد">
    <form @submit.prevent="handleSubmit" class="space-y-4">
      <!-- Show success message -->
      <div v-if="successMessage" class="p-4 bg-green-50 border border-green-200 rounded-lg">
        <div class="flex items-center">
          <CheckCircleIcon class="w-5 h-5 text-green-600 ml-3" />
          <p class="text-sm text-green-800">{{ successMessage }}</p>
        </div>
      </div>

      <!-- Show error messages -->
      <div v-if="errorMessage" class="p-4 bg-red-50 border border-red-200 rounded-lg">
        <div class="flex items-center">
          <ExclamationCircleIcon class="w-5 h-5 text-red-600 ml-3" />
          <p class="text-sm text-red-800">{{ errorMessage }}</p>
        </div>
      </div>

      <!-- Show validation errors -->
      <div
        v-if="Object.keys(validationErrors).length > 0"
        class="p-4 bg-red-50 border border-red-200 rounded-lg"
      >
        <ul class="text-sm text-red-800 space-y-1">
          <li v-for="(errors, field) in validationErrors" :key="field">
            <span v-for="error in errors" :key="error">{{ error }}</span>
          </li>
        </ul>
      </div>

      <div class="grid grid-cols-2 gap-4">
        <FormInput
          v-model="form.firstName"
          type="text"
          placeholder="الاسم الأول"
          required
          :disabled="submitting"
        />
        <FormInput
          v-model="form.lastName"
          type="text"
          placeholder="الاسم الأخير"
          required
          :disabled="submitting"
        />
      </div>

      <FormInput
        v-model="form.email"
        type="email"
        placeholder="البريد الإلكتروني"
        required
        :disabled="submitting"
      />

      <FormInput
        v-model="form.phone"
        type="tel"
        placeholder="رقم الهاتف (مثل: +966501234567)"
        :disabled="submitting"
      />

      <FormInput
        v-model="form.password"
        type="password"
        placeholder="كلمة المرور (8 أحرف على الأقل)"
        required
        :disabled="submitting"
      />

      <FormInput
        v-model="form.passwordConfirmation"
        type="password"
        placeholder="تأكيد كلمة المرور"
        required
        :disabled="submitting"
      />

      <FormSelect
        v-model="form.userType"
        :options="userTypeOptions"
        placeholder="نوع المستخدم"
        :disabled="submitting"
      />

      <PrimaryButton type="submit" :loading="submitting" :disabled="submitting" class="w-full">
        {{ submitting ? 'جاري التسجيل...' : 'تسجيل' }}
      </PrimaryButton>
    </form>
  </BaseModal>
</template>

<script setup lang="ts">
import { reactive, ref } from 'vue'
import BaseModal from '@/components/UI/BaseModal.vue'
import FormInput from '@/components/UI/FormInput.vue'
import FormSelect from '@/components/UI/FormSelect.vue'
import PrimaryButton from '@/components/UI/PrimaryButton.vue'
import CheckCircleIcon from '@/components/UI/Icons/CheckCircleIcon.vue'
import ExclamationCircleIcon from '@/components/UI/Icons/ExclamationCircleIcon.vue'
import { apiService } from '@/services/api'
import type { RegistrationData, AuthResponse, ApiError } from '@/types/auth'

// Define props
defineProps<{
  show: boolean
}>()

// Define emits
const emit = defineEmits<{
  close: []
  success: [user: AuthResponse['data']['user']]
}>()

// State
const submitting = ref(false)
const successMessage = ref('')
const errorMessage = ref('')
const validationErrors = ref<Record<string, string[]>>({})

// User type options
const userTypeOptions = [
  { value: 'customer', label: 'عميل' },
  { value: 'provider', label: 'مقدم خدمة' },
]

// Form state
const form = reactive<RegistrationData>({
  firstName: '',
  lastName: '',
  email: '',
  phone: '',
  password: '',
  passwordConfirmation: '',
  userType: 'customer',
})

// Methods
const resetForm = () => {
  Object.assign(form, {
    firstName: '',
    lastName: '',
    email: '',
    phone: '',
    password: '',
    passwordConfirmation: '',
    userType: 'customer',
  })
}

const clearMessages = () => {
  successMessage.value = ''
  errorMessage.value = ''
  validationErrors.value = {}
}

const handleSubmit = async () => {
  clearMessages()

  // Basic validation
  if (form.password !== form.passwordConfirmation) {
    errorMessage.value = 'كلمة المرور وتأكيد كلمة المرور غير متطابقين'
    return
  }

  if (form.password.length < 8) {
    errorMessage.value = 'كلمة المرور يجب أن تتكون من 8 أحرف على الأقل'
    return
  }

  submitting.value = true

  try {
    const response = (await apiService.register(form)) as AuthResponse

    if (response.success) {
      successMessage.value = 'تم تسجيل الحساب بنجاح!'

      // Store auth token if needed
      if (response.data.token) {
        localStorage.setItem('auth_token', response.data.token)
      }

      // Emit success event with user data
      emit('success', response.data.user)

      // Reset form
      resetForm()

      // Close modal after short delay
      setTimeout(() => {
        emit('close')
        clearMessages()
      }, 2000)
    }
  } catch (error: any) {
    console.error('Registration failed:', error)

    // Handle API errors
    if (error.message) {
      try {
        const errorResponse = JSON.parse(error.message) as ApiError
        if (errorResponse.errors) {
          validationErrors.value = errorResponse.errors
        } else {
          errorMessage.value = errorResponse.message || 'حدث خطأ أثناء التسجيل'
        }
      } catch {
        errorMessage.value = error.message || 'حدث خطأ أثناء التسجيل'
      }
    } else {
      errorMessage.value = 'حدث خطأ في الاتصال. يرجى المحاولة مرة أخرى.'
    }
  } finally {
    submitting.value = false
  }
}
</script>
