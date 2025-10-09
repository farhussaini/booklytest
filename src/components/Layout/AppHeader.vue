<template>
  <header class="fixed top-0 left-0 right-0 z-50 bg-white/90 backdrop-blur-md border-b border-gray-100 transition-all duration-300">
    <nav class="container mx-auto px-4 py-4 flex items-center justify-between">
      <!-- Logo -->
      <div class="flex items-center cursor-pointer order-last" @click="scrollToTop">
        <span class="text-2xl font-bold text-text-primary">Bookly</span>
        <div class="w-12 h-12 rounded-xl bg-gradient-primary flex items-center justify-center ml-4 hover:scale-105 transition-transform">
          <AppLogo class="w-6 h-6" />
        </div>
      </div>

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
import AppLogo from '@/components/UI/AppLogo.vue'
import NavButton from '@/components/UI/NavButton.vue'
import PrimaryButton from '@/components/UI/PrimaryButton.vue'
import HamburgerIcon from '@/components/UI/Icons/HamburgerIcon.vue'

// Define emits
defineEmits<{
  openRegistration: []
}>()

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
