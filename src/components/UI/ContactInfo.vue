<template>
  <div class="text-arabic">
    <h3 class="text-4xl font-bold text-text-primary mb-8">تواصل معنا</h3>
    
    <p class="text-lg text-gray-600 leading-relaxed mb-12">
      نحن هنا لضمان حصولكم على كل الدعم الذي تحتاجونه لأي استفسارات أو عقبات قد تواجهونها، فريقنا مستعد دائمًا لتقديم المساعدة الفعّالة.
    </p>
    
    <div class="space-y-8">
      <div class="contact-info-item group">
        <div class="contact-icon bg-yellow-500">
          <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
          </svg>
        </div>
        <div>
          <h4 class="font-semibold text-text-primary mb-1">البريد الإلكتروني</h4>
          <a href="mailto:sales@bbookedapp.com" class="text-gray-600 hover:text-primary transition-colors">sales@bbookedapp.com</a>
        </div>
      </div>
      
      <div class="contact-info-item group">
        <div class="contact-icon bg-secondary">
          <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
          </svg>
        </div>
        <div>
          <h4 class="font-semibold text-text-primary mb-1">رقم الهاتف</h4>
          <a href="tel:+996554832612" class="text-gray-600 hover:text-primary transition-colors">+996-554832612</a>
        </div>
      </div>

      <div class="contact-info-item group">
        <div class="contact-icon bg-blue-500">
          <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
          </svg>
        </div>
        <div>
          <h4 class="font-semibold text-text-primary mb-1">العنوان</h4>
          <p class="text-gray-600">المملكة العربية السعودية</p>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.text-arabic {
  direction: rtl;
  text-align: right;
}

.contact-info-item {
  @apply flex items-start gap-4 p-4 rounded-xl hover:bg-gray-50 transition-all duration-300 cursor-pointer;
}

.contact-icon {
  @apply w-12 h-12 rounded-xl flex-shrink-0 flex items-center justify-center shadow-lg transition-transform duration-300 group-hover:scale-110;
}
</style>
