<template>
  <div class="relative">
    <!-- Background blur effects -->
    <div class="absolute -top-4 -left-4 w-44 h-44 blur-background-purple rounded-2xl blur-50 transform rotate-12 animate-float"></div>
    <div class="absolute -bottom-8 -left-8 w-44 h-44 blur-background-red rounded-2xl blur-50 transform rotate-90 animate-float animation-delay-200"></div>
    
    <div class="bg-white rounded-3xl p-8 relative z-10 shadow-2xl border border-gray-100">
      <form @submit.prevent="handleSubmit" class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <FormInput
            v-model="form.name"
            type="text"
            label="الاسم"
            placeholder="الاسم كامل"
            required
          />
          <FormInput
            v-model="form.email"
            type="email"
            label="الايميل"
            placeholder="you@mail.com"
            required
          />
        </div>
        
        <FormTextarea
          v-model="form.message"
          label="الرسالة"
          placeholder="اكتب رسالتك هنا..."
          rows="4"
          required
        />
        
        <div class="flex items-center gap-3">
          <input 
            v-model="form.agreeTerms"
            type="checkbox" 
            id="terms" 
            class="w-5 h-5 text-primary border-2 border-gray-300 rounded focus:ring-primary"
            required
          >
          <label for="terms" class="text-text-primary text-sm">أوافق على جميع الشروط والأحكام</label>
        </div>
        
        <PrimaryButton 
          type="submit"
          :loading="submitting"
          class="w-full"
          size="large"
        >
          {{ submitting ? 'جاري الإرسال...' : 'ارسال' }}
        </PrimaryButton>
      </form>
    </div>
  </div>
</template>

<script setup lang="ts">
import { reactive } from 'vue'
import FormInput from '@/components/UI/FormInput.vue'
import FormTextarea from '@/components/UI/FormTextarea.vue'
import PrimaryButton from '@/components/UI/PrimaryButton.vue'
import type { ContactFormData } from '@/types/contact'

interface Props {
  submitting?: boolean
}

defineProps<Props>()

defineEmits<{
  submit: [data: ContactFormData]
}>()

const form = reactive<ContactFormData>({
  name: '',
  email: '',
  message: '',
  agreeTerms: false
})

const handleSubmit = () => {
  const formData = { ...form }
  $emit('submit', formData)
  
  // Reset form
  Object.assign(form, {
    name: '',
    email: '',
    message: '',
    agreeTerms: false
  })
}
</script>

<style scoped>
.blur-background-purple {
  background: rgba(93, 76, 221, 0.50);
  filter: blur(50px);
}

.blur-background-red {
  background: rgba(221, 76, 76, 0.50);
  filter: blur(50px);
}

@keyframes float-gentle {
  0%, 100% {
    transform: translateY(0px) rotate(0deg);
  }
  50% {
    transform: translateY(-10px) rotate(2deg);
  }
}

.animate-float {
  animation: float-gentle 6s ease-in-out infinite;
}

.animation-delay-200 {
  animation-delay: 0.2s;
}
</style>
