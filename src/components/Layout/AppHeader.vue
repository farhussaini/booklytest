<template>
  <header class="fixed top-0 left-0 right-0 z-50 bg-white/90 backdrop-blur-md border-b border-gray-100 transition-all duration-300">
    <nav class="container mx-auto px-4 py-4 flex items-center justify-between">
      <!-- Logo -->
      <button @click="scrollToTop" class="flex flex-row-reverse items-center gap-1.5 hover:opacity-80 transition-opacity p-0 border-none bg-transparent cursor-pointer order-last" aria-label="Go to home">
        <!-- Bookly Logo with SVG -->
        <div class="relative w-10 h-10">
          <!-- Gradient Background -->
          <svg class="absolute inset-0" width="100%" height="100%" fill="none" preserveAspectRatio="none" viewBox="0 0 52 52">
            <path :d="booklyLogoPaths.background" fill="url(#bookly_gradient)" />
            <defs>
              <linearGradient gradientUnits="userSpaceOnUse" id="bookly_gradient" x1="25.822" x2="25.822" y1="0" y2="51.6441">
                <stop stop-color="#7223D8" />
                <stop offset="1" stop-color="#DD4C7B" />
              </linearGradient>
            </defs>
          </svg>

          <!-- B Letter -->
          <svg class="absolute inset-0" width="100%" height="100%" fill="none" preserveAspectRatio="xMidYMid meet" viewBox="0 0 31 42" style="transform: scale(0.65);">
            <path :d="booklyLogoPaths.letter" fill="white" />
          </svg>
        </div>

        <!-- Bookly Text -->
        <div class="flex flex-col">
          <span class="text-lg font-bold text-text-primary leading-none">Bookly</span>
        </div>
      </button>

      <!-- Navigation -->
      <div class="hidden md:flex items-center space-x-8 space-x-reverse">
        <NavButton 
          v-for="item in navigationItems" 
          :key="item.id"
          @click="scrollToSection(item.target)"
        >
          {{ item.label }}
        </NavButton>
      </div>

      <!-- Mobile menu button -->
      <button 
        @click="toggleMobileMenu" 
        class="md:hidden p-2"
        aria-label="Toggle mobile menu"
      >
        <HamburgerIcon class="w-6 h-6" />
      </button>

      <!-- CTA Button -->
      <PrimaryButton
        @click="$emit('openRegistration')"
        class="hidden md:block order-first"
        size="medium"
      >
        التسجيل
      </PrimaryButton>
    </nav>

    <!-- Mobile Menu -->
    <Transition name="mobile-menu">
      <div v-if="mobileMenuOpen" class="md:hidden bg-white border-t border-gray-100 px-4 py-4 space-y-4">
        <button 
          v-for="item in navigationItems"
          :key="item.id"
          @click="handleMobileNavClick(item.target)"
          class="block w-full text-right py-2 nav-link"
        >
          {{ item.label }}
        </button>
        <PrimaryButton 
          @click="$emit('openRegistration')"
          class="w-full"
          size="medium"
        >
          التسجيل
        </PrimaryButton>
      </div>
    </Transition>
  </header>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import { useScrollNavigation } from '@/composables/useScrollNavigation'
import NavButton from '@/components/UI/NavButton.vue'
import PrimaryButton from '@/components/UI/PrimaryButton.vue'
import HamburgerIcon from '@/components/UI/Icons/HamburgerIcon.vue'

// Define emits
defineEmits<{
  openRegistration: []
}>()

// Bookly logo SVG paths
const booklyLogoPaths = {
  background: "M0 12.5198C0 5.60529 5.60529 0 12.5198 0H39.1243C46.0388 0 51.6441 5.60529 51.6441 12.5198V39.1243C51.6441 46.0388 46.0388 51.6441 39.1243 51.6441H12.5198C5.60529 51.6441 0 46.0388 0 39.1243V12.5198Z",
  letter: "M30.398 22.8861L30.3479 24.8392L27.5936 24.9394C27.1929 27.2764 26.5419 29.1627 25.6405 30.5983C24.7725 32.0339 23.3035 33.5864 21.2335 35.2557C19.1636 36.925 16.6763 38.3105 13.7717 39.4122C10.9005 40.5474 8.49675 41.1149 6.56036 41.1149C4.62397 41.1149 3.15498 40.7143 2.1534 39.913C1.15182 39.1452 0.651028 38.1269 0.651028 36.8582C0.651028 34.9218 1.78615 32.9854 4.05641 31.049C6.36004 29.0793 9.13109 27.4433 12.3695 26.1413C15.6414 24.8058 18.8798 23.9044 22.0849 23.437C21.5841 22.6024 20.8162 21.9179 19.7812 21.3838C18.7797 20.8496 17.0603 20.2486 14.6231 19.5809C13.2877 19.2137 12.6199 18.6127 12.6199 17.7781C12.6199 17.2773 12.8202 16.8266 13.2209 16.4259C13.6549 15.9919 14.356 15.4911 15.3242 14.9236C16.3258 14.3226 17.2606 13.7217 18.1286 13.1207C19.0301 12.4864 20.0149 11.7352 21.0833 10.8672C22.185 9.99912 23.1032 9.0977 23.8376 8.16289C24.5721 7.22808 24.9394 6.41012 24.9394 5.70901C24.9394 4.5405 24.3551 3.95625 23.1866 3.95625C22.2852 3.95625 21.0499 4.39027 19.4808 5.2583C17.945 6.09295 16.4259 7.178 14.9236 8.51344L12.7702 15.3242C11.2678 20.0984 9.59849 23.8043 7.76226 26.4418C5.95941 29.0793 4.24003 30.398 2.60411 30.398C0.868037 30.398 0 29.3296 0 27.1929C0 25.0562 1.03497 22.3353 3.1049 19.0301C5.17484 15.6914 8.04604 12.2694 11.7185 8.76384C11.7185 8.73045 11.802 8.42998 11.9689 7.86241C12.1692 7.26147 12.3528 6.66052 12.5198 6.05957C13.0873 4.25672 13.5214 3.1049 13.8218 2.60411L16.2757 3.00475C16.2757 3.63908 16.1422 4.39027 15.8751 5.2583C17.7447 3.85609 19.7145 2.6375 21.7844 1.60253C23.8877 0.534177 25.4235 0 26.3917 0C27.3933 0 28.1945 0.317167 28.7955 0.951502C29.3964 1.55245 29.6969 2.45388 29.6969 3.65577C29.6969 4.82428 29.1293 6.17642 27.9942 7.71218C26.8925 9.24794 25.5069 10.6335 23.8376 11.8687C20.7995 14.139 18.2121 15.7749 16.0754 16.7765C19.5475 17.3107 22.0849 18.0285 23.6874 18.9299C25.2899 19.7979 26.4584 21.1167 27.1929 22.8861H30.398ZM6.05957 24.038C8.39659 20.2653 9.94905 16.3926 10.7169 12.4196C8.91408 14.3894 7.27816 16.6429 5.80917 19.1803C4.34019 21.7176 3.60569 23.5539 3.60569 24.689C3.60569 25.3901 3.8394 25.7406 4.3068 25.7406C4.80759 25.7406 5.39185 25.1731 6.05957 24.038ZM17.6779 34.7549C19.3138 33.6531 20.6159 32.4179 21.5841 31.049C22.5523 29.6802 23.0364 28.3948 23.0364 27.1929C23.0364 26.6254 22.9529 26.0578 22.786 25.4903C17.7781 26.0912 13.6549 27.41 10.4164 29.4465C7.178 31.4497 5.55878 33.3694 5.55878 35.2056C5.55878 36.0069 5.87595 36.6412 6.51028 37.1086C7.14462 37.6094 8.01265 37.8598 9.11439 37.8598C11.8187 37.8598 14.6732 36.8248 17.6779 34.7549Z"
}

// Navigation data
const navigationItems = [
  { id: 'home', label: 'الرئيسية', target: 'hero' },
  { id: 'features', label: 'المميزات', target: 'features' },
  { id: 'pricing', label: 'الباقات', target: 'pricing' },
  { id: 'contact', label: 'للتواصل', target: 'contact' }
]

// Mobile menu state
const mobileMenuOpen = ref(false)

// Composables
const { scrollToTop, scrollToSection } = useScrollNavigation()

// Methods
const toggleMobileMenu = () => {
  mobileMenuOpen.value = !mobileMenuOpen.value
}

const handleMobileNavClick = (target: string) => {
  scrollToSection(target)
  mobileMenuOpen.value = false
}
</script>

<style scoped>
.nav-link {
  @apply text-text-primary hover:text-primary transition-colors font-medium py-2 px-4 rounded-lg hover:bg-purple-light/20;
}

/* Mobile menu transitions */
.mobile-menu-enter-active,
.mobile-menu-leave-active {
  transition: all 0.3s ease;
}

.mobile-menu-enter-from,
.mobile-menu-leave-to {
  opacity: 0;
  transform: translateY(-10px);
}
</style>
