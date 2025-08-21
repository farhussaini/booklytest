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
      <PricingSection @select-plan="selectPlan" />

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
import type { BookingData } from '@/types/booking'
import type { ContactFormData } from '@/types/contact'

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
  showSuccess(`مرحباً ${user.full_name}! تم تسجيل حسابك بنجاح!`)
  console.log('New user registered:', user)

  // You can add additional logic here like:
  // - Redirect to dashboard
  // - Set user in global state
  // - Track analytics event
}

const submitBooking = async (data: BookingData) => {
  bookingSubmitting.value = true

  try {
    // Simulate API call
    await new Promise((resolve) => setTimeout(resolve, 2000))

    // Here you would typically make an API call to create the booking
    console.log('Booking data:', data)

    showSuccess('تم حجز موعدك بنجاح! سنتواصل معك لتأكيد التفاصيل.')
    showBookingModal.value = false
  } catch (error) {
    console.error('Booking error:', error)
    showError('حدث خطأ أثناء الحجز. يرجى المحاولة مرة أخرى.')
  } finally {
    bookingSubmitting.value = false
  }
}

const submitContactForm = async (data: ContactFormData) => {
  formSubmitting.value = true

  try {
    // Simulate API call
    await new Promise((resolve) => setTimeout(resolve, 2000))

    // Here you would typically make an API call to send the contact message
    console.log('Contact form data:', data)

    showSuccess('تم إرسال رسالتك بن��اح! سنتواصل معك قريباً.')
  } catch (error) {
    console.error('Contact form error:', error)
    showError('حدث خطأ أثناء إرسال الرسالة. يرجى المحاولة مرة أخرى.')
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
