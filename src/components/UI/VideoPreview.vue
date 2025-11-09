<template>
  <!-- Demo Video Section -->
  <section class="py-20">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="relative">
        <!-- Main Device Frame -->
        <div class="bg-gray-800 rounded-3xl p-6 shadow-2xl">
          <div class="bg-white rounded-3xl p-6 relative">
            <!-- Play Button Overlay -->
            <div v-if="!isPlaying" class="absolute inset-0 flex items-center justify-center z-10 rounded-2xl" @click="playVideo">
              <div class="w-32 h-32 bg-primary/10 rounded-full flex items-center justify-center">
                <div class="w-24 h-24 bg-primary/20 rounded-full flex items-center justify-center">
                  <button class="w-16 h-16 bg-primary rounded-full flex items-center justify-center cursor-pointer hover:scale-110 transition-transform">
                    <svg class="w-8 h-8 text-white ml-1" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M8 5v14l11-7z" />
                    </svg>
                  </button>
                </div>
              </div>
            </div>

            <!-- Video Container -->
            <video
              ref="videoElement"
              class="w-full h-[500px] bg-gray-900 rounded-2xl object-cover"
              controls
              @play="isPlaying = true"
              @pause="isPlaying = false"
              @ended="isPlaying = false"
            >
              <source src="/bookly%20video.mp4" type="video/mp4" />
              Your browser does not support the video tag.
            </video>
          </div>
        </div>

      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
import { ref } from 'vue'

const videoElement = ref<HTMLVideoElement | null>(null)
const isPlaying = ref(false)

const playVideo = () => {
  if (videoElement.value) {
    videoElement.value.play()
  }
}
</script>
