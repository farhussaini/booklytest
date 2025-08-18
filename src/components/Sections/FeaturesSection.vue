<template>
  <section id="features" class="py-24 bg-gradient-to-b from-white to-gray-50">
    <div class="container mx-auto px-4">
      <SectionHeader 
        title="مميزات البرنامج"
        subtitle="اكتشف الميزات المتقدمة التي تجعل إدارة مواعيدك أسهل وأكثر احترافية"
      />

      <!-- Feature Tags -->
      <FeatureTags 
        :features="features"
        :selected="selectedFeature"
        @select="selectedFeature = $event"
      />

      <div class="text-center mb-20">
        <PrimaryButton 
          @click="$emit('scrollToContact')"
          size="large"
        >
          صفحة حجز المواعيد أونلاين
        </PrimaryButton>
      </div>

      <!-- Feature Details -->
      <div class="grid lg:grid-cols-2 gap-16 items-center">
        <FeatureDetails 
          :details="featureDetails"
          class="order-2 lg:order-1"
        />

        <AppMockup class="order-1 lg:order-2" />
      </div>

      <div class="text-center mt-20">
        <PrimaryButton 
          @click="$emit('openBooking')"
          size="xl"
          class="group"
        >
          <span>احجز موعد للتدريب</span>
          <ChevronLeftIcon class="w-6 h-6 group-hover:translate-x-1 transition-transform" />
        </PrimaryButton>
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import SectionHeader from '@/components/UI/SectionHeader.vue'
import FeatureTags from '@/components/UI/FeatureTags.vue'
import FeatureDetails from '@/components/UI/FeatureDetails.vue'
import AppMockup from '@/components/UI/AppMockup.vue'
import PrimaryButton from '@/components/UI/PrimaryButton.vue'
import ChevronLeftIcon from '@/components/UI/Icons/ChevronLeftIcon.vue'
import type { Feature, FeatureDetail } from '@/types/features'

// Define emits
defineEmits<{
  scrollToContact: []
  openBooking: []
}>()

// Component state
const selectedFeature = ref(0)

// Features data
const features: Feature[] = [
  { id: 'users', name: 'حسابات المستخدمين' },
  { id: 'payment', name: 'الدفع الإلكتروني' },
  { id: 'notifications', name: 'التأكيد بالاشعارات' },
  { id: 'appointments', name: 'إدارة المواعيد والخدمات' },
  { id: 'mobile', name: 'تطبيق الجوال' },
  { id: 'schedules', name: 'ادارة جداول الموظفين' }
]

const featureDetails: FeatureDetail[] = [
  {
    id: 'booking-page',
    title: 'صفحة خاصة لحجز المواعيد ومشاهدة جميع المواعيد المتاحة',
    description: 'منصة سهلة الاستخدام تمكن العملاء من رؤية جميع المواعيد المتاحة وحجز ما يناسبهم بكل سهولة',
    icon: 'CalendarIcon',
    iconColor: 'bg-secondary'
  },
  {
    id: 'multiple-providers',
    title: 'إمكانية إضافة أكثر من مقدم خدمة بمواعيده الخاصة',
    description: 'إدارة متعددة المستخدمين تسمح بإضافة عدة مقدمي خدمة مع جداولهم المستقلة',
    icon: 'UserGroupIcon',
    iconColor: 'bg-yellow-500'
  },
  {
    id: 'rescheduling',
    title: 'القدرة على التعديل وإعادة الجدولة',
    description: 'مرونة كاملة في تعديل وإعادة جدولة المواعيد حسب الحاجة مع إشعارات تلقائية',
    icon: 'ClockIcon',
    iconColor: 'bg-blue-600'
  }
]
</script>
