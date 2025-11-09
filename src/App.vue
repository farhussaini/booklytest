<template>
  <div class="min-h-screen bg-white" dir="rtl">
    <!-- Header -->
    <AppHeader @open-registration="showRegistrationModal = true" />

    <!-- Main Content -->
    <main>
      <!-- Hero Section -->
      <HeroSection
        @scroll-to-features="scrollToSection('features')"
        @open-booking="showBookingModal = true"
        @play-video="playVideo"
      />

      <!-- Features Section -->
      <FeaturesSection
        @scroll-to-contact="scrollToSection('contact')"
        @open-booking="showBookingModal = true"
      />

      <!-- Pricing Section -->
      <PricingSection @select-plan="selectPlan" @scroll-to-contact="scrollToSection('contact')" />

      <!-- Contact Section -->
      <ContactSection :form-submitting="formSubmitting" @submit-contact="submitContactForm" />
    </main>

    <!-- Footer -->
    <AppFooter />

    <!-- Modals -->
    <RegistrationModal
      :show="showRegistrationModal"
      @close="showRegistrationModal = false"
      @success="handleRegistrationSuccess"
    />

    <BookingModal
      :show="showBookingModal"
      :submitting="bookingSubmitting"
      @close="showBookingModal = false"
      @submit="submitBooking"
    />

    <!-- Toast Notifications -->
    <ToastContainer />
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import { useScrollNavigation } from '@/composables/useScrollNavigation'
import { useToast } from '@/composables/useToast'
import apiService from '@/services/api'
import type { BookingData } from '@/types/booking'
import type { ContactFormData } from '@/types/contact'

// Layout Components
import AppHeader from '@/components/Layout/AppHeader.vue'
import AppFooter from '@/components/Layout/AppFooter.vue'

// Section Components
import HeroSection from '@/components/Sections/HeroSection.vue'
import FeaturesSection from '@/components/Sections/FeaturesSection.vue'
import PricingSection from '@/components/Sections/PricingSection.vue'
import ContactSection from '@/components/Sections/ContactSection.vue'

// Modal Components
import RegistrationModal from '@/components/Modals/RegistrationModal.vue'
import BookingModal from '@/components/Modals/BookingModal.vue'

// UI Components
import ToastContainer from '@/components/UI/ToastContainer.vue'

// Types
import type { RegistrationData } from '@/types/auth'

// Composables
const { scrollToSection } = useScrollNavigation()
const { showSuccess, showInfo, showError } = useToast()

// Modal states
const showRegistrationModal = ref(false)
const showBookingModal = ref(false)

// Loading states
const bookingSubmitting = ref(false)
const formSubmitting = ref(false)

// Methods
const playVideo = () => {
  showInfo('سيتم إضافة الفيديو قريباً!')
}

const selectPlan = (planId: string) => {
  const planNames = {
    pro: 'الباقة الأولى',
    premium: 'الباقة المميزة',
    custom: 'الباقة المخصصة',
  }

  const planName = planNames[planId as keyof typeof planNames] || 'الباقة'
  showSuccess(`تم اختيار ${planName}! سنتواصل معك لإتمام العملية.`)
}

const handleRegistrationSuccess = (user: any) => {
  showSuccess(`مرحب��ً ${user.full_name}! تم تسجيل حسابك بنجاح!`)
  console.log('New user registered:', user)

  // You can add additional logic here like:
  // - Redirect to dashboard
  // - Set user in global state
  // - Track analytics event
}

const submitBooking = async (data: BookingData) => {
  bookingSubmitting.value = true

  try {
    const response = await apiService.submitTrainingRequest(data) as { success: boolean; message: string }

    if (response.success) {
      showSuccess(response.message || 'تم حجز موعدك بنجاح! سنتواصل معك لتأكيد التفاصيل.')
      showBookingModal.value = false
    } else {
      showError('حدث خطأ أثناء الحجز. يرجى المحاولة مرة أخرى.')
    }
  } catch (error: any) {
    console.error('Booking error:', error)
    let errorMessage = 'حدث خطأ أثناء الحجز. يرجى المحاولة مرة أخرى.'

    // Try to extract error message from response
    if (error.message) {
      try {
        const errorData = JSON.parse(error.message)
        errorMessage = errorData.message || errorMessage
      } catch {
        // If parsing fails, use default message
      }
    }

    showError(errorMessage)
  } finally {
    bookingSubmitting.value = false
  }
}

const submitContactForm = async (data: ContactFormData) => {
  formSubmitting.value = true

  try {
    const response = await apiService.submitContact(data) as { success: boolean; message: string }

    if (response.success) {
      showSuccess(response.message || 'تم إرسال رسالتك بنجاح! سنتواصل معك قريباً.')
    } else {
      showError('حدث خطأ أثناء إرسال الرسالة. يرجى المحاولة مرة أخرى.')
    }

    showSuccess('تم إرسال رسالتك بن��اح! سنتواصل معك قريباً.')
  } catch (error: any) {
    console.error('Contact form error:', error)
    let errorMessage = 'حدث خطأ أثناء إرسال الرسالة. يرجى المحاولة مرة أخرى.'

    // Try to extract error message from response
    if (error.message) {
      try {
        const errorData = JSON.parse(error.message)
        errorMessage = errorData.message || errorMessage
      } catch {
        // If parsing fails, use default message
      }
    }

    showError(errorMessage)
  } finally {
    formSubmitting.value = false
  }
}
</script>

<style>
/* Global styles for the app */
html {
  scroll-behavior: smooth;
}

body {
  font-family: 'Inter', 'Arabic UI Text', system-ui, sans-serif;
}

/* Section spacing */
section {
  scroll-margin-top: 80px;
}
</style>
