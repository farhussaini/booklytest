<template>
  <!-- Demo Video Section -->
  <section class="py-20">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="relative">
        <!-- Main Device Frame -->
        <div class="bg-gray-800 rounded-3xl p-6 shadow-2xl">
          <div class="bg-white rounded-3xl p-6 relative">
            <!-- Play Button Overlay -->
            <div class="absolute inset-0 flex items-center justify-center z-10">
              <div class="w-32 h-32 bg-primary/10 rounded-full flex items-center justify-center">
                <div class="w-24 h-24 bg-primary/20 rounded-full flex items-center justify-center">
                  <button @click="$emit('play')" class="w-16 h-16 bg-primary rounded-full flex items-center justify-center cursor-pointer hover:scale-110 transition-transform">
                    <svg class="w-8 h-8 text-white ml-1" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M8 5v14l11-7z" />
                    </svg>
                  </button>
                </div>
              </div>
            </div>

            <!-- Mock Dashboard Grid -->
            <div class="grid grid-cols-3 gap-4">
              <div class="space-y-4">
                <img src="https://images.pexels.com/photos/5417838/pexels-photo-5417838.jpeg" alt="Calendar app icon on smartphone" class="w-full h-32 rounded-2xl object-cover" />
                <img src="https://images.pexels.com/photos/5077049/pexels-photo-5077049.jpeg" alt="Hotel booking website on laptop" class="w-full h-40 rounded-2xl object-cover" />
                <img src="https://images.pexels.com/photos/8372666/pexels-photo-8372666.jpeg" alt="Smartphone with travel calendar" class="w-full h-32 rounded-2xl object-cover" />
              </div>
              <div class="border-2 border-primary rounded-2xl p-6 bg-white relative">
                <div class="text-center py-8">
                  <div class="text-text-primary font-medium">Effortless Booking,<br>Every Time.</div>
                </div>
                <div class="absolute bottom-4 left-1/2 -translate-x-1/2">
                  <div class="flex items-center gap-3">
                    <span class="text-xl font-semibold text-text-primary">Bookly</span>
                    <div class="w-10 h-10 rounded-xl bg-gradient-primary flex items-center justify-center">
                      <AppLogo class="w-5 h-5 text-white" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="space-y-4">
                <img src="https://images.pexels.com/photos/34239/pexels-photo.jpg" alt="Mobile booking app in hand" class="w-full h-40 rounded-2xl object-cover" />
                <img src="https://images.pexels.com/photos/257904/pexels-photo-257904.jpeg" alt="Software interface screen" class="w-full h-32 rounded-2xl object-cover" />
                <img src="https://images.pexels.com/photos/5408684/pexels-photo-5408684.jpeg" alt="Desktop calendar planning" class="w-full h-32 rounded-2xl object-cover" />
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
import AppLogo from '@/components/UI/AppLogo.vue'

defineEmits<{
  play: []
}>()
</script>
