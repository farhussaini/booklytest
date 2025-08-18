<template>
  <div class="pricing-plan" :class="{ 'popular': plan.isPopular }">
    <div v-if="plan.isPopular" class="popular-badge">الأكثر شعبية</div>
    
    <div class="pricing-plan-header">
      <h3 class="text-2xl font-bold mb-2" :class="plan.isPopular ? 'gradient-text' : 'text-text-primary'">
        {{ plan.name }}
      </h3>
      <p class="text-secondary font-semibold mb-4">{{ plan.price }}</p>
      <p class="text-sm text-gray-500 mb-6">{{ plan.description }}</p>
      
      <div v-if="plan.features.length > 0" class="space-y-4 mb-8">
        <div v-for="feature in plan.features" :key="feature" class="pricing-feature">
          <div class="w-2 h-2 bg-primary rounded-full"></div>
          <span class="text-sm" :class="plan.isPopular ? 'text-gray-700' : 'text-text-primary'">{{ feature }}</span>
        </div>
      </div>
    </div>
    
    <button 
      @click="$emit('select')"
      :class="plan.buttonVariant === 'primary' ? 'pricing-btn-primary' : 'pricing-btn-secondary'"
    >
      اشترك الآن
    </button>
  </div>
</template>

<script setup lang="ts">
import type { PricingPlan } from '@/types/pricing'

interface Props {
  plan: PricingPlan
}

defineProps<Props>()

defineEmits<{
  select: []
}>()
</script>

<style scoped>
.pricing-plan {
  @apply bg-white rounded-2xl p-8 relative shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-purple-light;
}

.pricing-plan.popular {
  @apply border-2 border-primary transform scale-105 shadow-xl;
}

.popular-badge {
  @apply absolute -top-4 left-1/2 transform -translate-x-1/2 bg-gradient-primary text-white px-6 py-2 rounded-full text-sm font-semibold shadow-lg;
}

.pricing-plan-header {
  @apply text-center mb-8;
}

.pricing-feature {
  @apply flex items-center gap-3 text-sm;
}

.pricing-btn-primary {
  @apply w-full bg-gradient-button text-white py-4 rounded-xl font-semibold hover:shadow-lg transition-all duration-300 hover:scale-105;
}

.pricing-btn-secondary {
  @apply w-full border-2 border-secondary text-secondary py-4 rounded-xl font-semibold hover:bg-secondary hover:text-white transition-all duration-300;
}

.gradient-text {
  background: linear-gradient(90deg, #7223D8 18.8%, #DD4C7B 80.34%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

.bg-gradient-primary {
  background: linear-gradient(275deg, #DD4C7B -0.05%, #7223D8 100%);
}

.bg-gradient-button {
  background: linear-gradient(94deg, #7223D8 0.35%, #DD4C7B 98.42%);
}
</style>
