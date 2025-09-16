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
          :error="fieldErrors.firstName"
          @blur="validateField('firstName')"
        />
        <FormInput
          v-model="form.lastName"
          type="text"
          placeholder="الاسم الأخير"
          required
          :disabled="submitting"
          :error="fieldErrors.lastName"
          @blur="validateField('lastName')"
        />
      </div>

      <FormInput
        v-model="form.email"
        type="email"
        placeholder="البريد الإلكتروني"
        required
        :disabled="submitting"
        :error="fieldErrors.email"
        @blur="validateField('email')"
      />

      <FormInput
        v-model="form.phone"
        type="tel"
        placeholder="رقم الهاتف (مثل: +966501234567)"
        :disabled="submitting"
        :error="fieldErrors.phone"
        @blur="validateField('phone')"
        pattern="^(?:\+966\d{9}|\d{9}|0\d{9})$"
        inputmode="tel"
        autocomplete="tel"
        dir="ltr"
      />

      <FormInput
        v-model="form.password"
        type="password"
        placeholder="كلمة المرور (8 أحرف، أحرف كبيرة وصغيرة، أرقام، ورموز)"
        required
        :disabled="submitting"
        :error="fieldErrors.password"
        @blur="validateField('password')"
      />
      <div class="mt-1">
        <div class="h-2 rounded-full bg-gray-200">
          <div
            class="h-2 rounded-full transition-all duration-300"
            :class="passwordStrengthColor"
            :style="{ width: passwordStrengthPercent + '%' }"
          ></div>
        </div>
        <div class="mt-1 flex justify-between text-xs">
          <span class="text-gray-600">قوة كلمة المرور: {{ passwordStrengthLabel }}</span>
          <span class="text-gray-500">{{ passwordScore }}/5</span>
        </div>
      </div>

      <FormInput
        v-model="form.passwordConfirmation"
        type="password"
        placeholder="تأكيد كلمة المرور"
        required
        :disabled="submitting"
        :error="fieldErrors.passwordConfirmation"
        @blur="validateField('passwordConfirmation')"
      />

      <FormSelect
        v-model="form.userType"
        :options="userTypeOptions"
        placeholder="نوع المستخدم"
        :disabled="submitting"
        :error="fieldErrors.userType"
        @blur="validateField('userType')"
      />

      <PrimaryButton type="submit" :loading="submitting" :disabled="submitting || !isFormValid" class="w-full">
        {{ submitting ? 'جاري التسجيل...' : 'تسجيل' }}
      </PrimaryButton>
    </form>
  </BaseModal>
</template>

<script setup lang="ts">
import { reactive, ref, computed, watch } from 'vue'
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

// Inline field errors
const fieldErrors = reactive<Record<string, string>>({
  firstName: '',
  lastName: '',
  email: '',
  phone: '',
  password: '',
  passwordConfirmation: '',
  userType: '',
})

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

const setFieldError = (field: keyof typeof fieldErrors, message: string) => {
  fieldErrors[field] = message
}

const clearFieldErrors = () => {
  Object.keys(fieldErrors).forEach((k) => (fieldErrors[k] = ''))
}

const validateEmail = (value: string) => {
  const re = /^(?:[a-zA-Z0-9_'^&+\-])+(?:\.(?:[a-zA-Z0-9_'^&+\-])+)*@(?:(?:[a-zA-Z0-9-]+\.)+[a-zA-Z]{2,})$/
  return re.test(value)
}

const getNormalizedPhone = (value: string) => {
  const digitsOnly = (value || '').replace(/\D/g, '')
  if (!digitsOnly) return { valid: false as const }
  let local: string
  if (digitsOnly.startsWith('966')) {
    local = digitsOnly.slice(3)
  } else if (digitsOnly.startsWith('0')) {
    local = digitsOnly.slice(1)
  } else {
    local = digitsOnly
  }
  if (local.length === 10 && local.startsWith('0')) {
    local = local.slice(1)
  }
  if (local.length !== 9) return { valid: false as const }
  return { valid: true as const, value: `+966${local}` }
}

const validatePhone = (value: string) => {
  const res = getNormalizedPhone(value)
  return res.valid
}

const validatePassword = (value: string) => {
  const errors: string[] = []
  if (value.length < 8) errors.push('يجب أن تتكون كلمة المرور من 8 أحرف على الأقل')
  if (!/[a-z]/.test(value)) errors.push('يجب أ�� تحتوي كلمة المرور على حرف صغير واحد على الأقل')
  if (!/[A-Z]/.test(value)) errors.push('يجب أن تحتوي كلمة المرور على حرف كبير واحد على الأقل')
  if (!/\d/.test(value)) errors.push('يجب أن تحتوي كلمة المرور على رقم واحد على الأقل')
  if (!/[^A-Za-z0-9]/.test(value)) errors.push('يجب أن تحتوي كلمة المرور على رمز واحد على الأقل')
  return errors
}

const validateField = (field: keyof typeof fieldErrors) => {
  switch (field) {
    case 'firstName':
      setFieldError('firstName', form.firstName ? '' : 'الاسم الأول مطلوب')
      break
    case 'lastName':
      setFieldError('lastName', form.lastName ? '' : 'اسم العائلة مطلوب')
      break
    case 'email':
      if (!form.email) setFieldError('email', 'البريد الإلكتروني مطلوب')
      else if (!validateEmail(form.email)) setFieldError('email', 'يجب أن يكون البريد الإلكتروني صحيحاً')
      else setFieldError('email', '')
      break
    case 'phone':
      const normalized = getNormalizedPhone(form.phone || '')
      if (!normalized.valid) {
        setFieldError('phone', 'أدخل رقمًا بصيغة +966 متبوعًا بـ 9 أرقا��، أو 9 أرقام فقط، أو صيغة محلية تبدأ بـ 0 ثم 9 أرقام')
      } else {
        setFieldError('phone', '')
        if (form.phone !== normalized.value) form.phone = normalized.value!
      }
      break
    case 'password':
      const pwErrors = validatePassword(form.password || '')
      setFieldError('password', pwErrors[0] || '')
      break
    case 'passwordConfirmation':
      setFieldError(
        'passwordConfirmation',
        form.password === form.passwordConfirmation ? '' : 'تأكيد كلمة المرور غير متطابق'
      )
      break
    case 'userType':
      setFieldError(
        'userType',
        form.userType === 'customer' || form.userType === 'provider' ? '' : 'نوع المستخدم يجب أن يكون عميل أو مقدم خدمة'
      )
      break
  }
}

const validateAll = () => {
  ;(['firstName', 'lastName', 'email', 'phone', 'password', 'passwordConfirmation', 'userType'] as const).forEach(
    (f) => validateField(f)
  )
  return !Object.values(fieldErrors).some((msg) => msg)
}

const passwordScore = computed(() => {
  const pw = form.password || ''
  let s = 0
  if (pw.length >= 8) s++
  if (/[a-z]/.test(pw)) s++
  if (/[A-Z]/.test(pw)) s++
  if (/\d/.test(pw)) s++
  if (/[^A-Za-z0-9]/.test(pw)) s++
  return s
})

const passwordStrengthPercent = computed(() => (passwordScore.value / 5) * 100)

const passwordStrengthLabel = computed(() => {
  const s = passwordScore.value
  if (s <= 1) return 'ضعيفة'
  if (s === 2) return 'متوسطة'
  if (s === 3) return 'جيدة'
  return 'قوية'
})

const passwordStrengthColor = computed(() => {
  const s = passwordScore.value
  if (s <= 1) return 'bg-red-500'
  if (s === 2) return 'bg-orange-500'
  if (s === 3) return 'bg-yellow-500'
  return 'bg-green-500'
})

const isFormValid = computed(() => {
  const requiredPresent =
    !!form.firstName &&
    !!form.lastName &&
    !!form.email &&
    !!form.password &&
    !!form.passwordConfirmation &&
    (form.userType === 'customer' || form.userType === 'provider')

  const emailOk = validateEmail(form.email || '')
  const phoneOk = validatePhone(form.phone || '')
  const confirmOk = form.password === form.passwordConfirmation
  const pwOk = validatePassword(form.password || '').length === 0
  const noFieldErrors = !Object.values(fieldErrors).some((msg) => msg)

  return Boolean(requiredPresent && emailOk && phoneOk && confirmOk && pwOk && noFieldErrors)
})

;(['firstName', 'lastName', 'email', 'phone', 'password', 'passwordConfirmation', 'userType'] as const).forEach(
  (f) => {
    watch(
      () => form[f],
      () => validateField(f)
    )
  }
)

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
  clearFieldErrors()
}

const clearMessages = () => {
  successMessage.value = ''
  errorMessage.value = ''
  validationErrors.value = {}
  clearFieldErrors()
}

const applyServerErrors = (errors: Record<string, string[]>) => {
  const map: Record<string, keyof typeof fieldErrors> = {
    first_name: 'firstName',
    last_name: 'lastName',
    email: 'email',
    phone: 'phone',
    password: 'password',
    password_confirmation: 'passwordConfirmation',
    user_type: 'userType',
  }
  Object.entries(errors).forEach(([k, v]) => {
    const key = map[k] || (k as keyof typeof fieldErrors)
    if (key) setFieldError(key, v[0] || '')
  })
}

const handleSubmit = async () => {
  clearMessages()

  const normalized = getNormalizedPhone(form.phone || '')
  if (normalized.valid) form.phone = normalized.value!

  const valid = validateAll()
  if (!valid) return

  submitting.value = true

  try {
    const response = (await apiService.register(form)) as AuthResponse

    if (response.success) {
      successMessage.value = 'تم تسجيل الحساب بنجاح!'

      if (response.data.token) {
        localStorage.setItem('auth_token', response.data.token)
      }

      emit('success', response.data.user)
      resetForm()

      setTimeout(() => {
        emit('close')
        clearMessages()
      }, 2000)
    }
  } catch (error: any) {
    if (error.message) {
      try {
        const errorResponse = JSON.parse(error.message) as ApiError
        if (errorResponse.errors) {
          validationErrors.value = errorResponse.errors
          applyServerErrors(errorResponse.errors)
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
