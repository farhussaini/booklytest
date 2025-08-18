<template>
  <section id="hero" class="relative overflow-hidden pt-20">
    <!-- Background Wave -->
    <BackgroundWave />

    <div class="container mx-auto px-4 py-20 text-center relative z-10">
      <div class="animate-fade-in-up">
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-text-primary mb-8 leading-tight">
          رتّـــب جدولـــك بســــهـــولـــــة،<br>
          وخــــلّ عــميــــلك مبـــســوط
        </h1>
        
        <p class="text-lg md:text-xl text-text-primary max-w-4xl mx-auto mb-12 leading-relaxed opacity-90">
          منصة احترافية تساعدك تدير مواعيدك وحجوزاتك بكل سهولة ومرونة، مهما كان نشاطك، من جدولة المواعيد و تأكيد الحجز و التنبيهات والدفع الإلكتروني، كل الخطوات من مكان واحد وأنت تتابع شغلك من لوحة تحكم واضحة وسهلة، رتّب وقتك واخدم عميلك بشكل أفضل.
        </p>

        <div class="flex flex-col sm:flex-row justify-center items-center gap-6 mb-20">
          <SecondaryButton @click="$emit('scrollToFeatures')" class="group">
            <span>مميزات البرنامج</span>
            <ChevronLeftIcon class="w-5 h-5 group-hover:translate-x-1 transition-transform" />
          </SecondaryButton>
          <PrimaryButton @click="$emit('openBooking')" class="group">
            <span>احجز موعد للتدريب</span>
            <CalendarIcon class="w-5 h-5 group-hover:scale-110 transition-transform" />
          </PrimaryButton>
        </div>
      </div>

      <!-- Video Preview Section -->
      <VideoPreview @play="$emit('playVideo')" />
    </div>
  </section>
</template>

<script setup lang="ts">
import BackgroundWave from '@/components/UI/BackgroundWave.vue'
import VideoPreview from '@/components/UI/VideoPreview.vue'
import PrimaryButton from '@/components/UI/PrimaryButton.vue'
import SecondaryButton from '@/components/UI/SecondaryButton.vue'
import CalendarIcon from '@/components/UI/Icons/CalendarIcon.vue'
import ChevronLeftIcon from '@/components/UI/Icons/ChevronLeftIcon.vue'

// Define emits
defineEmits<{
  scrollToFeatures: []
  openBooking: []
  playVideo: []
}>()
</script>

<style scoped>
.animate-fade-in-up {
  animation: fadeInUp 0.8s ease-out;
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
</style>
