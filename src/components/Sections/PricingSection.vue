<template>
  <section id="pricing" class="py-24 relative overflow-hidden bg-gradient-to-b from-gray-50 to-white">
    <!-- Background Effects -->
    <PricingBackgroundEffects />
    
    <div class="container mx-auto px-4 relative z-10">
      <SectionHeader 
        title="الأسعار والباقات"
        subtitle="اختر الباقة المناسبة لاحتياجاتك وابدأ رحلتك معنا اليوم"
      />

      <!-- Pricing Cards -->
      <div class="pricing-card rounded-3xl p-8 backdrop-blur-sm">
        <div class="grid lg:grid-cols-3 gap-8">
          <PricingCard
            v-for="plan in pricingPlans"
            :key="plan.id"
            :plan="plan"
            @select="$emit('selectPlan', plan.id)"
          />
        </div>
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
import SectionHeader from '@/components/UI/SectionHeader.vue'
import PricingCard from '@/components/UI/PricingCard.vue'
import PricingBackgroundEffects from '@/components/UI/PricingBackgroundEffects.vue'
import type { PricingPlan } from '@/types/pricing'

// Define emits
defineEmits<{
  selectPlan: [planId: string]
}>()

// Pricing plans data
const pricingPlans: PricingPlan[] = [
  {
    id: 'custom',
    name: 'الباقة المخصصة',
    price: 'خدمات مميز��',
    description: 'شامل لجميع الخدمات للباقات الأخرى بالإضافة إلى طلبات العميل الخاصة',
    features: [],
    isPopular: false,
    buttonVariant: 'secondary'
  },
  {
    id: 'premium',
    name: 'الباقة المميزة',
    price: '1999ريال/ سنويا',
    description: 'مناسب للشركات الناشئة والمتوسطة',
    features: [
      'جدولة مواعيد الحجوزات أونلاين',
      'الرسائل والشعارات',
      'فواتير أونلاين',
      'عدد 3 فروع',
      'اسم موقع مخصص للشركة',
      'API الربط'
    ],
    isPopular: false,
    buttonVariant: 'secondary'
  },
  {
    id: 'pro',
    name: 'الباقة الأولى',
    price: '999 ريال/ سنويا',
    description: 'مناسب للأفراد',
    features: [
      'عدد لا محدود من المستخدمين',
      'حجوزات غير محدودة',
      'عدد لا محدد من مزودي الخدمة',
      'فرع واحد',
      'استقبال المدفوعات',
      'فواتير أونلاين'
    ],
    isPopular: true,
    buttonVariant: 'primary'
  }
]
</script>

<style scoped>
.pricing-card {
  backdrop-filter: blur(10px);
  background: rgba(255, 247, 250, 0.8);
  border: 1px solid rgba(255, 187, 209, 0.3);
  box-shadow: 0 25px 50px rgba(0, 0, 0, 0.1);
}
</style>
