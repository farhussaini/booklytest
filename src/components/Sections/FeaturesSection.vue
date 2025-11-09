<template>
  <section id="features" class="py-24 bg-gradient-to-b from-white to-gray-50 scroll-mt-24 md:scroll-mt-28">
    <div class="container mx-auto px-4">
      <SectionHeader
        title="مميزات البرنامج"
        subtitle="اكتشف الميزات المتقدمة التي تجعل إدارة مواعيدك أسهل وأكثر احترافية"
      />

      <!-- Feature Tags -->
      <FeatureTags
        :features="features"
        :selected="selectedFeature"
        @select="onSelect"
      />


      <!-- Feature Details -->
      <div class="mt-12">
        <div
          v-for="(section, index) in sections"
          :key="section.id"
          v-show="selectedFeature === index"
          class="transition-opacity duration-500"
        >
          <div class="flex flex-col lg:grid lg:grid-cols-2 gap-16 items-center">
            <div class="w-full">
              <FeatureDetails :details="section.details" :title="section.title" />
            </div>
            <div class="w-full">
              <AppMockup />
            </div>
          </div>
        </div>
      </div>

      <div class="flex justify-center mt-20">
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
import { ref, computed } from 'vue'
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

function onSelect(index: number) {
  selectedFeature.value = index
}

// Features data
const features: Feature[] = [
  { id: 'booking-online', name: 'صفحة حجز مواعيد الاونلاين' },
  { id: 'appointments', name: 'إدارة المواعيد والخدمات' },
  { id: 'notifications', name: 'التأكيد بالاشعارات' },
  { id: 'payment', name: 'الدفع الالكتروني' },
  { id: 'users', name: 'حسابات المستخدمين' },
  { id: 'mobile', name: 'تطبيق الجوال' },
  { id: 'schedules', name: 'ادارة جداول الموظفين' }
]

// Base details used across sections
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

// Section content per feature tab
const sections = computed(() => {
  const map: Record<string, FeatureDetail[]> = {
    'booking-online': [
      featureDetails[0],
      {
        id: 'multiple-providers',
        title: 'إمكانية إضافة أكثر من مقدم خدمة بمواعيده الخاصة',
        description: '',
        icon: 'UserGroupIcon',
        iconColor: 'bg-yellow-500'
      },
      {
        id: 'flexible-rescheduling',
        title: 'القدرة على التعديل وإعادة الجدولة',
        description: '',
        icon: 'ClockIcon',
        iconColor: 'bg-blue-600'
      }
    ],
    'appointments': [
      {
        id: 'appointment-management',
        title: 'إدارة شاملة للمواعيد والخدمات',
        description: 'لوحة تحكم متقدمة لإدارة جميع المواعيد والخدمات مع إمكانية التعديل والحذف والإضافة',
        icon: 'CalendarIcon',
        iconColor: 'bg-green-600'
      },
      {
        id: 'service-catalog',
        title: 'كتالوج الخدمات والمدة',
        description: 'إضافة وتعديل الخدمات مع تحديد المدة والسعر لكل خدمة بشكل منفصل',
        icon: 'ClockIcon',
        iconColor: 'bg-purple-600'
      },
      {
        id: 'availability-control',
        title: 'التحكم في التوفر والأوقات',
        description: 'تحديد أوقات العمل والعطل مع إمكانية إغلاق مواعيد محددة أو فتحها حسب الحاجة',
        icon: 'UserGroupIcon',
        iconColor: 'bg-indigo-600'
      }
    ],
    'notifications': [
      {
        id: 'auto-reminders',
        title: 'تنبيهات وتذكيرات تلقائية',
        description: 'إرسال رسائل تذكير تلقائية عبر البريد أو الرسائل لتنبيه العملاء قبل الموعد وتقليل حالات الغياب.',
        icon: 'ClockIcon',
        iconColor: 'bg-amber-500'
      },
      {
        id: 'confirmations',
        title: 'تأكيدات الحجز الفورية',
        description: 'تأكيد فوري للحجز مع رقم مرجعي وتحديثات حالة الحجز لحظيًا.',
        icon: 'CalendarIcon',
        iconColor: 'bg-green-600'
      }
    ],
    'payment': [
      {
        id: 'online-payments',
        title: 'دفوعات أونلاين آمنة',
        description: 'قبول المدفوعات عبر بوابات موثوقة وإصدار إيصالات بشكل تلقائي.',
        icon: 'CalendarIcon',
        iconColor: 'bg-rose-500'
      },
      {
        id: 'invoices',
        title: 'فواتير وتقارير مالية',
        description: 'توليد فواتير مفصلة وتقارير يومية لمتابعة الإيرادات.',
        icon: 'ClockIcon',
        iconColor: 'bg-indigo-600'
      }
    ],
    'users': [
      {
        id: 'roles-permissions',
        title: 'صلاحيات وأدوار المستخدمين',
        description: 'إدارة الأدوار ومنح الصلاحيات المناسبة لكل عضو في الفريق.',
        icon: 'UserGroupIcon',
        iconColor: 'bg-purple-600'
      },
      {
        id: 'customer-portal',
        title: 'حسابات العملاء',
        description: 'واجهة مخصصة للعملاء لمراجعة حجوزاتهم وتحديث بياناتهم.',
        icon: 'CalendarIcon',
        iconColor: 'bg-teal-600'
      }
    ],
    'mobile': [
      {
        id: 'pwa',
        title: 'تجربة جوال سريعة',
        description: 'واجهة متجاوبة تعمل بسلاسة على الهواتف والأجهزة اللوحية.',
        icon: 'CalendarIcon',
        iconColor: 'bg-cyan-600'
      },
      {
        id: 'push',
        title: 'إشعارات فورية على الجوال',
        description: 'تنبيهات فورية لتذكير العملاء وإبلاغهم بأي تغييرات.',
        icon: 'ClockIcon',
        iconColor: 'bg-orange-500'
      }
    ],
    'schedules': [
      {
        id: 'staff-schedules',
        title: 'جداول الموظفين بمرونة',
        description: 'إنشاء ورديات ومواعيد عمل مخصصة لكل موظف مع تجنب التعارضات.',
        icon: 'UserGroupIcon',
        iconColor: 'bg-sky-600'
      },
      {
        id: 'holidays',
        title: 'العطل والإجازات',
        description: 'تحديد أيام العطل والإجازات العامة لتنعكس مباشرة في التوفر.',
        icon: 'CalendarIcon',
        iconColor: 'bg-lime-600'
      }
    ]
  }
  const result = features.map(f => ({
    id: f.id,
    title: f.name,
    details: map[f.id] || featureDetails
  }))
  return result
})
</script>
