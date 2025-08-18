<template>
  <section id="contact" class="py-24 bg-gradient-to-b from-white to-gray-50">
    <div class="container mx-auto px-4">
      <SectionHeader 
        title="تواصل معنا"
        subtitle="نحن هنا لمساعدتك في كل خطوة. تواصل معنا وسنكون سعداء للإجابة على استفساراتك"
      />

      <div class="grid lg:grid-cols-2 gap-16 items-start">
        <!-- Contact Form -->
        <ContactForm 
          @submit="$emit('submitContact', $event)"
          :submitting="formSubmitting"
        />

        <!-- Contact Info -->
        <ContactInfo />
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
import { defineProps } from 'vue'
import SectionHeader from '@/components/UI/SectionHeader.vue'
import ContactForm from '@/components/Forms/ContactForm.vue'
import ContactInfo from '@/components/UI/ContactInfo.vue'
import type { ContactFormData } from '@/types/contact'

// Define props
defineProps<{
  formSubmitting?: boolean
}>()

// Define emits
defineEmits<{
  submitContact: [data: ContactFormData]
}>()
</script>
