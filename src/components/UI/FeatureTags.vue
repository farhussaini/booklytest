<template>
  <div class="flex flex-wrap justify-center items-center gap-4 mb-16">
    <div 
      v-for="(feature, index) in features" 
      :key="feature.id"
      class="feature-tag group"
      :class="{ 'active': selected === index }"
      @click="$emit('select', index)"
    >
      <span>{{ feature.name }}</span>
    </div>
  </div>
</template>

<script setup lang="ts">
import type { Feature } from '@/types/features'

interface Props {
  features: Feature[]
  selected: number
}

defineProps<Props>()

defineEmits<{
  select: [index: number]
}>()
</script>

<style scoped>
.feature-tag {
  @apply bg-purple-lighter border border-purple-light rounded-full px-6 py-4 cursor-pointer transition-all duration-300 hover:shadow-lg hover:scale-105;
}

.feature-tag.active {
  @apply bg-primary text-white border-primary shadow-lg;
}

.feature-tag:not(.active) span {
  @apply text-primary font-medium;
}
</style>
