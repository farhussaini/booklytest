<template>
  <div class="space-y-8">
    <h3 class="text-4xl font-bold text-primary mb-8">
      {{ title }}
    </h3>

    <div class="space-y-8">
      <div
        v-for="detail in details"
        :key="detail.id"
        :id="`section-${detail.id}`"
        class="feature-detail-card group"
      >
        <div class="flex items-start gap-6">
          <div class="feature-icon" :class="detail.iconColor">
            <CalendarIcon v-if="detail.icon === 'CalendarIcon'" class="w-6 h-6 text-white" />
            <UserGroupIcon v-else-if="detail.icon === 'UserGroupIcon'" class="w-6 h-6 text-white" />
            <ClockIcon v-else-if="detail.icon === 'ClockIcon'" class="w-6 h-6 text-white" />
          </div>
          <div class="flex-1">
            <h4 class="text-xl font-bold text-text-primary group-hover:text-primary transition-colors">
              {{ detail.title }}
            </h4>
            <p v-if="detail.description" class="text-gray-600 mt-3 leading-relaxed">
              {{ detail.description }}
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import type { FeatureDetail } from '@/types/features'
import CalendarIcon from '@/components/UI/Icons/CalendarIcon.vue'
import UserGroupIcon from '@/components/UI/Icons/UserGroupIcon.vue'
import ClockIcon from '@/components/UI/Icons/ClockIcon.vue'

interface Props {
  details: FeatureDetail[]
  title: string
}

const props = defineProps<Props>()
</script>

<style scoped>
.feature-detail-card {
  @apply bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-purple-light;
}

.feature-icon {
  @apply w-14 h-14 rounded-2xl flex-shrink-0 flex items-center justify-center shadow-lg transition-transform duration-300 group-hover:scale-110;
}
</style>
