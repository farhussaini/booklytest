<template>
  <div class="text-center mb-20">
    <h2 class="text-5xl md:text-6xl font-bold gradient-text mb-6 leading-[1.2] md:leading-[1.15] tracking-tight pb-1 md:pb-2">
      <span>{{ title }}</span>
    </h2>
    <p v-if="subtitle" class="text-xl text-gray-600 max-w-3xl mx-auto">
      {{ subtitle }}
    </p>
  </div>
</template>

<script setup lang="ts">
interface Props {
  title: string
  subtitle?: string
}

defineProps<Props>()
</script>

<style scoped>
.gradient-text {
  background: linear-gradient(90deg, #7223D8 18.8%, #DD4C7B 80.34%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}
</style>
