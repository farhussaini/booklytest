<template>
  <footer class="bg-gradient-to-br from-gray-900 to-gray-800 text-white py-16">
    <div class="container mx-auto px-4">
      <div class="grid md:grid-cols-4 gap-8">
        <!-- Company Info -->
        <div class="md:col-span-2">
          <div class="flex items-center mb-6">
            <div class="w-12 h-12 rounded-xl bg-gradient-primary flex items-center justify-center mr-3">
              <AppLogo class="w-6 h-6" />
            </div>
            <span class="text-2xl font-bold">Bookly</span>
          </div>
          <p class="text-gray-300 mb-6 leading-relaxed">
            منصة رائدة في إدارة المواعيد والحجوزات، نساعدك على تنظيم وقتك وخدمة عملائك بأفضل طريقة ممكنة.
          </p>
          <SocialMediaLinks />
        </div>
        
        <!-- Company Links -->
        <div class="text-arabic">
          <h4 class="font-bold text-white mb-6 text-lg">معلومات الشركة</h4>
          <FooterLinks :links="companyLinks" />
        </div>
        
        <!-- Support Links -->
        <div class="text-arabic">
          <h4 class="font-bold text-white mb-6 text-lg">المساعدة والدعم</h4>
          <FooterLinks :links="supportLinks" />
        </div>
      </div>
      
      <div class="border-t border-gray-700 mt-12 pt-8 text-center">
        <p class="text-gray-400">© 2024 Bookly. جميع الحقوق محفوظة.</p>
      </div>
    </div>
  </footer>
</template>

<script setup lang="ts">
import AppLogo from '@/components/UI/AppLogo.vue'
import SocialMediaLinks from '@/components/UI/SocialMediaLinks.vue'
import FooterLinks from '@/components/UI/FooterLinks.vue'

interface FooterLink {
  id: string
  label: string
  href: string
}

// Footer links data
const companyLinks: FooterLink[] = [
  { id: 'about', label: 'من نحن', href: '#' },
  { id: 'services', label: 'الخدمات', href: '#' },
  { id: 'news', label: 'الأخبار', href: '#' },
  { id: 'careers', label: 'الوظائف', href: '#' }
]

const supportLinks: FooterLink[] = [
  { id: 'help', label: 'مركز المساعدة', href: '#' },
  { id: 'terms', label: 'شروط الاستخدام', href: '#' },
  { id: 'privacy', label: 'سياسة الخصوصية', href: '#' },
  { id: 'contact', label: 'اتصل بنا', href: '#' }
]
</script>

<style scoped>
.text-arabic {
  direction: rtl;
  text-align: right;
}
</style>
