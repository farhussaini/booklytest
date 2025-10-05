<template>
  <section
    id="pricing"
    class="relative w-full py-32 md:py-40 bg-gradient-to-b from-white via-pink-50/40 to-white text-center overflow-hidden"
  >
    <!-- Background blur effects -->
    <div
      class="absolute top-1/3 -left-32 w-80 h-80 bg-yellow-200/50 blur-3xl rounded-full transform -rotate-45"
    ></div>
    <div
      class="absolute bottom-1/4 -right-32 w-80 h-80 bg-purple-300/50 blur-3xl rounded-full transform rotate-45"
    ></div>

    <div class="relative container mx-auto px-4">
      <!-- Section Header -->
      <SectionHeader
        title="الأسعار والباقات"
        subtitle="اختر الباقة المناسبة لاحتياجاتك وابدأ رحلتك معنا اليوم"
      />

      <!-- Pricing Cards -->
      <div class="mt-14 mx-[80px] p-[15px] bg-[rgb(255,247,248)] border border-[rgb(246,228,231)] rounded-3xl">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 place-items-center">
        <div
          v-for="plan in plans"
          :key="plan.id"
          class="relative flex flex-col justify-between rounded-3xl border border-pink-100 bg-white shadow-lg w-full max-w-sm min-h-[26rem] md:min-h-[30rem] transition-transform duration-300 hover:scale-[1.02] hover:shadow-xl hover:border-primary"
        >
          <!-- Most Popular Badge -->
          <div
            v-if="plan.isPopular"
            class="absolute top-4 right-4 bg-pink-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow-md"
          >
            الأكثر شيوعًا
          </div>

          <!-- Card Content -->
          <div class="p-8">
            <h3 class="text-2xl font-bold text-[#082f49] mb-2 tracking-tight">
              {{ plan.name }}
            </h3>
            <p class="text-pink-600 text-lg font-semibold mb-1">
              {{ plan.price }}
            </p>
            <p class="text-gray-600 text-sm mb-6">
              {{ plan.description }}
            </p>

            <!-- Features List -->
            <ul
              v-if="plan.features && plan.features.length"
              dir="rtl"
              class="list-disc list-inside text-right text-gray-700 text-base space-y-2"
            >
              <li v-for="(feature, index) in plan.features" :key="index" class="font-medium">
                {{ feature }}
              </li>
            </ul>
          </div>

          <!-- Card Button -->
          <div class="p-8 pt-0">
            <PrimaryButton
              v-if="plan.id === 'custom'"
              @click="$emit('scrollToContact')"
              size="large"
              class="w-full"
            >
              صفحة حجز المواعيد أونلاين
            </PrimaryButton>

            <PrimaryButton
              v-else
              @click="$emit('selectPlan', plan.id)"
              :variant="plan.buttonVariant"
              size="large"
              class="w-full"
            >
              اشترك الآن
            </PrimaryButton>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>
</template>

<script setup lang="ts">
import SectionHeader from '@/components/UI/SectionHeader.vue'
import PrimaryButton from '@/components/UI/PrimaryButton.vue'

// Define emitted events
defineEmits<{
  selectPlan: [planId: string]
  scrollToContact: []
}>()

// Define PricingPlan interface
interface PricingPlan {
  id: string
  name: string
  price: string
  description: string
  features: string[]
  buttonVariant: 'default' | 'secondary'
  isPopular: boolean
}

// Arabic plans data
const plans: PricingPlan[] = [
  {
    id: 'basic',
    name: 'الباقة الأساسية',
    price: '19 ر.س / شهر',
    description: 'خطة مثالية للأفراد الذين يبدأون في استخدام النظام.',
    features: [
      'الوصول إلى الميزات الأساسية',
      'دعم فني عبر البريد الإلكتروني',
      'الوصول إلى المجتمع',
    ],
    buttonVariant: 'secondary', // white button
    isPopular: false,
  },
  {
    id: 'pro',
    name: 'الباقة الاحترافية',
    price: '49 ر.س / شهر',
    description: 'مناسبة للفرق والمؤ��سا�� التي تحتاج أداءً أكبر.',
    features: [
      'جميع ميزات الباقة الأساسية',
      'دعم أولوية عبر البريد الإلكتروني',
      'تحليلات متقدمة وتقارير مخصصة',
    ],
    buttonVariant: 'default', // main pink button
    isPopular: true,
  },
  {
    id: 'enterprise',
    name: 'الباقة المميزة',
    price: '99 ر.س / شهر',
    description: 'للشركات الكبيرة التي تحتاج حلولًا خاصة ومخصصة.',
    features: [
      'جميع ميزات الباقة الاحترافية',
      'دعم فني مخصص على مدار الساعة',
      'تكاملات مخصصة مع الأنظمة الداخلية',
    ],
    buttonVariant: 'secondary',
    isPopular: false,
  },
]
</script>

<style scoped>
section {
  direction: rtl;
}
</style>

<style module>
.maskGroup {
  width: 100%;
  position: relative;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  gap: 10px;
  text-align: center;
  font-size: 14px;
  color: #dd4c7b;
  font-family: Inter, sans-serif;
  min-height: 861px;
  overflow: hidden;
}

/* Keep your design blur background and responsiveness */
.maskGroupChild {
  width: 317.6px;
  position: absolute;
  margin: 0 !important;
  top: 420.9px;
  left: -225px;
  filter: blur(100px);
  background-color: rgba(234, 194, 75, 0.5);
  height: 317.6px;
  transform: rotate(-45deg);
  transform-origin: 0 0;
  z-index: 0;
}
.maskGroupItem {
  width: 313.4px;
  position: absolute;
  margin: 0 !important;
  top: 612.4px;
  right: -230px;
  left: auto;
  filter: blur(100px);
  border-radius: 20px;
  background-color: rgba(93, 76, 221, 0.5);
  height: 313.4px;
  transform: rotate(135deg);
  transform-origin: 0 0;
  z-index: 1;
}
.rectangleParent {
  width: 1160px;
  position: absolute;
  margin: 0 !important;
  top: 208px;
  left: calc(50% - 580px);
  backdrop-filter: blur(10px);
  height: 671px;
  z-index: 2;
  transform-origin: top left;
}

/* Responsive scaling for layout */
@media (min-width: 1024px) and (max-width: 1279px) {
  .rectangleParent {
    transform: scale(clamp(0.7, calc((100vw - 2rem) / 1160), 1));
  }
}
@media (min-width: 1280px) {
  .rectangleParent {
    transform: none;
  }
}
</style>
