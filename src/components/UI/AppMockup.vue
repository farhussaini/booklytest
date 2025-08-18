<template>
  <div class="relative">
    <div class="relative">
      <div class="bg-gradient-to-br from-gray-100 to-gray-200 rounded-3xl p-8 aspect-[3/4] flex items-center justify-center shadow-2xl hover:shadow-3xl transition-shadow duration-500">
        <div class="text-center text-gray-500 space-y-6">
          <div class="w-32 h-32 bg-gradient-primary rounded-2xl mx-auto mb-6 flex items-center justify-center animate-pulse">
            <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
            </svg>
          </div>
          <p class="text-lg font-medium">معاينة التطبيق</p>
          <p class="text-sm text-gray-400">تطبيق حجز المواعيد المتقدم</p>
        </div>
      </div>
      <!-- Floating elements -->
      <div class="absolute -top-4 -right-4 w-8 h-8 bg-primary rounded-full animate-bounce"></div>
      <div class="absolute -bottom-4 -left-4 w-6 h-6 bg-secondary rounded-full animate-bounce animation-delay-200"></div>
    </div>
  </div>
</template>

<style scoped>
.bg-gradient-primary {
  background: linear-gradient(275deg, #DD4C7B -0.05%, #7223D8 100%);
}

.animation-delay-200 {
  animation-delay: 0.2s;
}

.shadow-3xl {
  box-shadow: 0 35px 60px -12px rgba(0, 0, 0, 0.25);
}
</style>
