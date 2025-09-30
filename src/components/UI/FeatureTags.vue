<template>
  <div class="mx-auto mb-16 w-full" dir="rtl">
    <!-- Mobile/Tablet: navbar container (no scrollbar/overflow) -->
    <div class="lg:hidden">
      <div class="relative bg-purple-lighter border border-purple-light rounded-full px-3 py-3">
        <div class="flex items-center justify-evenly">
          <button
            v-for="item in primaryChips"
            :key="item.feature.id"
            class="nav-chip group"
            :class="{ active: selected === item.index }"
            type="button"
            :aria-pressed="selected === item.index"
            @click="$emit('select', item.index)"
          >
            <span class="text-[15px] md:text-[16px]">{{ item.feature.name }}</span>
          </button>
        </div>
      </div>
    </div>

    <!-- Desktop: centered fixed-height navbar bar (no scrollbar/overflow) -->
    <div class="hidden lg:block">
      <div class="relative mx-auto max-w-[1140px] h-[90px] bg-purple-lighter border border-purple-light rounded-full px-4">
        <div class="h-full flex items-center justify-evenly">
          <button
            v-for="item in primaryChips"
            :key="item.feature.id"
            class="nav-chip group"
            :class="{ active: selected === item.index }"
            type="button"
            :aria-pressed="selected === item.index"
            @click="$emit('select', item.index)"
          >
            <span class="text-[16px]">{{ item.feature.name }}</span>
          </button>
        </div>
      </div>
    </div>

    <!-- Desktop: secondary row with two items -->
    <div class="hidden lg:block mt-4">
      <div class="relative mx-auto max-w-[484px] h-[90px] bg-purple-lighter border border-purple-light rounded-full px-4">
        <div class="h-full flex items-center justify-evenly">
          <button
            v-for="item in secondaryChips"
            :key="item.feature.id"
            class="nav-chip group"
            :class="{ active: selected === item.index }"
            type="button"
            :aria-pressed="selected === item.index"
            @click="$emit('select', item.index)"
          >
            <span class="text-[16px]">{{ item.feature.name }}</span>
          </button>
        </div>
      </div>
    </div>

  </div>
</template>

<script setup lang="ts">
import { computed } from 'vue'
import type { Feature } from '@/types/features'

interface Props {
  features: Feature[]
  selected: number
}

const props = defineProps<Props>()

defineEmits<{
  select: [index: number]
}>()

const order = ['booking-online','appointments','notifications','payment','users']
const primaryChips = computed(() =>
  props.features
    .map((f, i) => ({ feature: f, index: i }))
    .filter(x => order.includes(x.feature.id))
    .sort((a,b) => order.indexOf(a.feature.id) - order.indexOf(b.feature.id))
)

const secondaryChips = computed(() =>
  props.features
    .map((f, i) => ({ feature: f, index: i }))
    .filter(x => x.feature.id === 'mobile' || x.feature.id === 'schedules')
)
</script>

<style scoped>
.nav-chip {
  @apply inline-flex items-center justify-center gap-2 rounded-full px-5 py-2 text-primary bg-transparent cursor-pointer transition-all duration-300 select-none whitespace-nowrap outline-none focus-visible:ring-2 focus-visible:ring-primary/40 hover:bg-purple-light/30;
}

.nav-chip.active {
  @apply bg-[#7223D8] text-white shadow-lg hover:shadow-xl hover:scale-105 min-w-[221px] h-[66px] px-[23px] py-[24px] rounded-full;
}
</style>
