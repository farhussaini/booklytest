<template>
  <div class="relative max-w-5xl mx-auto animate-fade-in-up animation-delay-200">
    <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-3xl p-6 shadow-2xl hover:shadow-3xl transition-shadow duration-500">
      <div class="bg-white rounded-2xl p-8 relative">
        <div class="aspect-video bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl flex items-center justify-center relative overflow-hidden">
          <!-- Play Button -->
          <button @click="$emit('play')" class="group relative">
            <div class="w-32 h-32 bg-primary rounded-full flex items-center justify-center play-button-shadow group-hover:scale-110 transition-all duration-300 cursor-pointer">
              <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" class="group-hover:scale-110 transition-transform">
                <path d="M18 12L34 24L18 36V12Z" fill="white"/>
              </svg>
            </div>
          </button>
          
          <!-- Logo overlay -->
          <div class="absolute bottom-6 right-6 flex items-center bg-white/90 backdrop-blur-sm rounded-lg px-3 py-2">
            <div class="w-8 h-8 rounded-lg bg-gradient-primary flex items-center justify-center mr-2">
              <AppLogo class="w-4 h-4" />
            </div>
            <span class="text-sm font-semibold text-text-primary">Bookly</span>
          </div>
          
          <div class="absolute top-1/4 left-1/2 transform -translate-x-1/2 text-center">
            <p class="text-text-primary text-lg font-medium">
              Effortless Booking,<br>Every Time.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import AppLogo from '@/components/UI/AppLogo.vue'

defineEmits<{
  play: []
}>()
</script>

<style scoped>
.play-button-shadow {
  position: relative;
  box-shadow: 
    0 0 0 0 rgba(114, 35, 216, 0.3),
    0 0 0 20px rgba(114, 35, 216, 0.08), 
    0 0 0 40px rgba(193, 145, 255, 0.08);
  animation: pulse-ring 2s cubic-bezier(0.25, 0.46, 0.45, 0.94) infinite;
}

@keyframes pulse-ring {
  0% {
    box-shadow: 
      0 0 0 0 rgba(114, 35, 216, 0.3),
      0 0 0 20px rgba(114, 35, 216, 0.08), 
      0 0 0 40px rgba(193, 145, 255, 0.08);
  }
  50% {
    box-shadow: 
      0 0 0 10px rgba(114, 35, 216, 0.1),
      0 0 0 25px rgba(114, 35, 216, 0.05), 
      0 0 0 45px rgba(193, 145, 255, 0.05);
  }
  100% {
    box-shadow: 
      0 0 0 0 rgba(114, 35, 216, 0.3),
      0 0 0 20px rgba(114, 35, 216, 0.08), 
      0 0 0 40px rgba(193, 145, 255, 0.08);
  }
}

.animate-fade-in-up {
  animation: fadeInUp 0.8s ease-out;
}

.animation-delay-200 {
  animation-delay: 0.2s;
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

.shadow-3xl {
  box-shadow: 0 35px 60px -12px rgba(0, 0, 0, 0.25);
}

.bg-gradient-primary {
  background: linear-gradient(275deg, #DD4C7B -0.05%, #7223D8 100%);
}
</style>
