<template>
  <ul class="space-y-3">
    <li v-for="link in links" :key="link.id">
      <a 
        :href="link.href" 
        class="text-gray-300 hover:text-white transition-colors"
      >
        {{ link.label }}
      </a>
    </li>
  </ul>
</template>

<script setup lang="ts">
interface FooterLink {
  id: string
  label: string
  href: string
}

interface Props {
  links: FooterLink[]
}

defineProps<Props>()
</script>
