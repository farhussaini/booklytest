<template>
  <div class="min-h-screen bg-white" dir="rtl">
    <!-- Header -->
    <header class="relative z-10 bg-white">
      <nav class="container mx-auto px-4 py-8 flex items-center justify-between">
        <!-- Logo -->
        <div class="flex items-center">
          <div class="w-12 h-12 rounded-xl bg-gradient-primary flex items-center justify-center mr-3">
            <svg width="31" height="34" viewBox="0 0 31 34" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M26.4444 17.9654H23.9867L27.8425 27.3398C28.0397 27.8611 28.2205 28.3654 28.3849 28.8528C28.5657 29.3402 28.7301 29.8112 28.8781 30.2659C29.0425 30.7042 29.1741 31.1343 29.2729 31.5562H29.4045C29.5525 31.0033 29.7825 30.2741 30.0945 29.3686C30.4065 28.4467 30.7267 27.5248 31.0551 26.6029L34.6503 16.5765H38L30.0945 36.6952C29.6845 37.7946 29.1905 38.7509 28.6125 39.564C28.0509 40.3935 27.3563 41.0311 26.5287 41.4767C25.7175 41.9387 24.7367 42.1696 23.5863 42.1696C23.0575 42.1696 22.5943 42.1366 22.1967 42.0706C21.7991 42.0211 21.4603 41.9633 21.1803 41.8973V39.5887C21.4191 39.6217 21.7003 39.6547 22.0239 39.6877C22.3639 39.7207 22.7121 39.7372 23.0685 39.7372C23.7385 39.7372 24.3163 39.6052 24.8019 39.3412C25.3039 39.0937 25.7257 38.7344 26.0673 38.2635C26.4089 37.8089 26.7011 37.2807 26.9439 36.6787L27.8507 34.3371L21.0051 16.5765H24.3983L27.6821 25.7179C27.8795 26.2392 28.0685 26.7852 28.2491 27.3559C28.4461 27.9101 28.6267 28.473 28.7909 29.0444H28.9225C29.0705 28.6226 29.2811 28.0766 29.5543 27.4064C29.8439 26.7362 30.1335 26.0824 30.4231 25.445L33.2849 16.5765H26.4444V17.9654Z" fill="white"/>
            </svg>
          </div>
          <span class="text-2xl font-bold text-text-primary">Bookly</span>
        </div>

        <!-- Navigation -->
        <div class="hidden md:flex items-center space-x-8 space-x-reverse">
          <a href="#" class="text-text-primary hover:text-primary transition-colors font-medium">الرئيسية</a>
          <a href="#" class="text-text-primary hover:text-primary transition-colors font-medium">المميزات</a>
          <a href="#" class="text-text-primary hover:text-primary transition-colors font-medium">الباقات</a>
          <a href="#" class="text-text-primary hover:text-primary transition-colors font-medium">للتواصل</a>
        </div>

        <!-- CTA Button -->
        <button class="bg-gradient-primary text-white px-8 py-3 rounded-lg font-semibold hover:shadow-lg transition-all hover-scale">
          التسجيل
        </button>
      </nav>
    </header>

    <!-- Hero Section -->
    <section class="relative overflow-hidden">
      <!-- Background Wave -->
      <div class="absolute inset-0 top-96">
        <svg class="w-full h-96" viewBox="0 0 1440 377" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M1441 143.63C817.184 -116.498 219.743 35.2435 -1 143.63V377H1441V143.63Z" fill="url(#paint0_linear_wave)"/>
          <defs>
            <linearGradient id="paint0_linear_wave" x1="720" y1="0" x2="720" y2="305.5" gradientUnits="userSpaceOnUse">
              <stop offset="0.168297" stop-color="#EEE0FF"/>
              <stop offset="0.432738" stop-color="#FFE7EF" stop-opacity="0.971135"/>
              <stop offset="1" stop-color="#F4F4F4" stop-opacity="0"/>
            </linearGradient>
          </defs>
        </svg>
      </div>

      <div class="container mx-auto px-4 py-16 text-center relative z-10">
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-text-primary mb-6 leading-tight">
          رتّـــب جدولـــك بســــهـــولـــــة،<br>
          وخــــلّ عــميــــلك مبـــســوط
        </h1>
        
        <p class="text-lg text-text-primary max-w-4xl mx-auto mb-12 leading-relaxed">
          منصة احترافية تساعدك تدير مواعيدك وحجوزاتك بكل سهولة ومرونة، مهما كان نشاطك، من جدولة المواعيد و تأكيد الحجز و التنبيهات والدفع الإلكتروني، كل الخطوات من مكان واحد وأنت تتابع شغلك من لوحة تحكم واضحة وسهلة، رتّب وقتك واخدم عميلك بشكل أفضل.
        </p>

        <div class="flex flex-col sm:flex-row justify-center items-center gap-4 mb-16">
          <button class="border-2 border-primary text-primary px-8 py-4 rounded-xl font-semibold hover:bg-primary hover:text-white transition-all hover-scale">
            مميزات البرنامج
          </button>
          <button class="bg-gradient-primary text-white px-8 py-4 rounded-xl font-semibold hover:shadow-lg transition-all hover-scale">
            احجز موعد للتدريب
          </button>
        </div>

        <!-- Video Preview Section -->
        <div class="relative max-w-4xl mx-auto">
          <div class="bg-gray-800 rounded-3xl p-6 shadow-2xl">
            <div class="bg-white rounded-2xl p-8 relative">
              <div class="aspect-video bg-gray-50 rounded-xl flex items-center justify-center relative">
                <!-- Play Button -->
                <div class="relative">
                  <div class="w-32 h-32 bg-primary rounded-full flex items-center justify-center play-button-shadow">
                    <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M18 12L34 24L18 36V12Z" fill="white"/>
                    </svg>
                  </div>
                </div>
                
                <!-- Logo overlay -->
                <div class="absolute bottom-4 right-4 flex items-center">
                  <div class="w-8 h-8 rounded-lg bg-gradient-primary flex items-center justify-center mr-2">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M15 8L10 12L15 16V8Z" fill="white"/>
                    </svg>
                  </div>
                  <span class="text-sm font-semibold text-text-primary">Bookly</span>
                </div>
                
                <p class="absolute top-1/4 text-text-primary text-lg">
                  Effortless Booking,<br>Every Time.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 bg-white">
      <div class="container mx-auto px-4">
        <h2 class="text-5xl font-bold text-center gradient-text mb-16">
          مميزات البرنامج
        </h2>

        <!-- Feature Tags -->
        <div class="flex flex-wrap justify-center items-center gap-4 mb-12">
          <div class="bg-purple-lighter border border-purple-light rounded-full px-6 py-4">
            <span class="text-primary font-medium">حسابات المستخدمين</span>
          </div>
          <div class="bg-purple-lighter border border-purple-light rounded-full px-6 py-4">
            <span class="text-primary font-medium">الدفع الإلكتروني</span>
          </div>
          <div class="bg-purple-lighter border border-purple-light rounded-full px-6 py-4">
            <span class="text-primary font-medium">التأكيد بالاشعارات</span>
          </div>
          <div class="bg-purple-lighter border border-purple-light rounded-full px-6 py-4">
            <span class="text-primary font-medium">إدارة المواعيد والخدمات</span>
          </div>
        </div>

        <div class="flex flex-wrap justify-center items-center gap-4 mb-12">
          <div class="bg-purple-lighter border border-purple-light rounded-full px-6 py-4">
            <span class="text-primary font-medium">تطبيق الجوال</span>
          </div>
          <div class="bg-purple-lighter border border-purple-light rounded-full px-6 py-4">
            <span class="text-primary font-medium">ادارة جداول الموظفين</span>
          </div>
        </div>

        <div class="text-center mb-16">
          <button class="bg-primary text-white px-12 py-4 rounded-full font-semibold hover:shadow-lg transition-all hover-scale">
            صفحة حجز المواعيد أونلاين
          </button>
        </div>

        <!-- Feature Details -->
        <div class="grid lg:grid-cols-2 gap-16 items-center">
          <div class="text-arabic space-y-8">
            <h3 class="text-3xl font-bold text-primary mb-8">
              صفحة حجز المواعيد أونلاين
            </h3>
            
            <div class="space-y-6">
              <div class="flex items-start gap-4">
                <div class="w-12 h-12 bg-secondary rounded-xl flex-shrink-0 flex items-center justify-center">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 6H16V4C16 2.89 15.11 2 14 2H10C8.89 2 8 2.89 8 4V6H4C2.89 6 2.01 6.89 2.01 8L2 19C2 20.11 2.89 21 4 21H20C21.11 21 22 20.11 22 19V8C22 6.89 21.11 6 20 6ZM10 4H14V6H10V4Z" fill="white"/>
                  </svg>
                </div>
                <div>
                  <h4 class="text-xl font-bold text-text-primary mb-2">
                    صفحة خاصة لحجز المواعيد ومشاهدة جميع المواعيد المتاحة
                  </h4>
                </div>
              </div>

              <div class="flex items-start gap-4">
                <div class="w-12 h-12 bg-yellow-500 rounded-xl flex-shrink-0 flex items-center justify-center">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2C6.48 2 2 6.48 2 12S6.48 22 12 22 22 17.52 22 12 17.52 2 12 2ZM13 17H11V15H13V17ZM13 13H11V7H13V13Z" fill="white"/>
                  </svg>
                </div>
                <div>
                  <h4 class="text-xl font-bold text-text-primary mb-2">
                    إمكانية إضافة أكثر من مقدم خدمة بمواعيده الخاصة
                  </h4>
                </div>
              </div>

              <div class="flex items-start gap-4">
                <div class="w-12 h-12 bg-blue-600 rounded-xl flex-shrink-0 flex items-center justify-center">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 11H7V9H9V11ZM13 11H11V9H13V11ZM17 11H15V9H17V11ZM19 4H18V2H16V4H8V2H6V4H5C3.89 4 3.01 4.9 3.01 6L3 20C3 21.1 3.89 22 5 22H19C20.1 22 21 21.1 21 20V6C21 4.9 20.1 4 19 4ZM19 20H5V9H19V20Z" fill="white"/>
                  </svg>
                </div>
                <div>
                  <h4 class="text-xl font-bold text-text-primary mb-2">
                    القدرة على التعديل وإعادة الجدولة
                  </h4>
                </div>
              </div>
            </div>
          </div>

          <div class="relative">
            <!-- Placeholder for app mockup -->
            <div class="bg-gray-100 rounded-3xl p-8 aspect-[3/4] flex items-center justify-center">
              <div class="text-center text-gray-500">
                <div class="w-32 h-32 bg-gray-200 rounded-2xl mx-auto mb-4"></div>
                <p>App Mockup Preview</p>
              </div>
            </div>
          </div>
        </div>

        <div class="text-center mt-16">
          <button class="bg-gradient-primary text-white px-16 py-4 rounded-xl text-xl font-semibold hover:shadow-lg transition-all hover-scale">
            احجز موعد للتد��يب
          </button>
        </div>
      </div>
    </section>

    <!-- Pricing Section -->
    <section class="py-20 relative overflow-hidden">
      <!-- Background blur effects -->
      <div class="absolute -left-56 top-48 w-80 h-80 blur-background-yellow rounded-3xl transform -rotate-45 blur-50"></div>
      <div class="absolute -right-40 bottom-0 w-80 h-80 blur-background-purple rounded-3xl transform rotate-45 blur-50"></div>
      
      <div class="container mx-auto px-4 relative z-10">
        <h2 class="text-5xl font-bold text-center gradient-text mb-16">
          الأسعار والباقات
        </h2>

        <!-- Pricing backdrop -->
        <div class="pricing-card rounded-3xl p-8 backdrop-blur-sm">
          <div class="grid lg:grid-cols-3 gap-8">
            <!-- Basic Plan -->
            <div class="bg-white rounded-2xl p-8 relative">
              <div class="absolute inset-0 bg-red-200 rounded-2xl blur-40 opacity-50 -z-10"></div>
              <h3 class="text-2xl font-bold text-text-primary mb-2 text-center">الباقة المخصصة</h3>
              <p class="text-secondary font-semibold text-center mb-6">خدمات مميزة</p>
              <p class="text-sm text-black text-center mb-8 leading-relaxed">
                شام�� لجميع الخدمات للباقات الأخرى بالإضافة إلى طلبات العميل الخاصة
              </p>
              <button class="w-full border-2 border-secondary text-secondary py-4 rounded-xl font-semibold hover:bg-secondary hover:text-white transition-all">
                اشترك الآن
              </button>
            </div>

            <!-- Premium Plan -->
            <div class="bg-white rounded-2xl p-8 relative">
              <div class="absolute inset-0 bg-red-200 rounded-2xl blur-40 opacity-50 -z-10"></div>
              <h3 class="text-2xl font-bold text-text-primary mb-2 text-center">الباقة المميزة</h3>
              <p class="text-secondary font-semibold text-center mb-6">1999ريال/ سنويا</p>
              
              <div class="space-y-3 mb-8 text-sm">
                <div class="flex items-center gap-3 text-text-primary">
                  <div class="w-2 h-2 bg-text-primary rounded-full opacity-50"></div>
                  <span>جدولة مواعيد الحجوزات أونلاين</span>
                </div>
                <div class="flex items-center gap-3 text-text-primary">
                  <div class="w-2 h-2 bg-text-primary rounded-full opacity-50"></div>
                  <span>الرسائل والشعارات</span>
                </div>
                <div class="flex items-center gap-3 text-text-primary">
                  <div class="w-2 h-2 bg-text-primary rounded-full opacity-50"></div>
                  <span>فواتير أونلاين</span>
                </div>
                <div class="flex items-center gap-3 text-text-primary">
                  <div class="w-2 h-2 bg-text-primary rounded-full opacity-50"></div>
                  <span>عدد 3 فروع</span>
                </div>
                <div class="flex items-center gap-3 text-text-primary">
                  <div class="w-2 h-2 bg-text-primary rounded-full opacity-50"></div>
                  <span>اسم موقع مخصص للشركة</span>
                </div>
                <div class="flex items-center gap-3 text-text-primary">
                  <div class="w-2 h-2 bg-text-primary rounded-full opacity-50"></div>
                  <span>API الربط</span>
                </div>
              </div>
              
              <button class="w-full border-2 border-secondary text-secondary py-4 rounded-xl font-semibold hover:bg-secondary hover:text-white transition-all">
                اشترك الآن
              </button>
            </div>

            <!-- Pro Plan -->
            <div class="bg-white rounded-2xl p-8 relative border-2 border-primary">
              <div class="absolute inset-0 bg-red-200 rounded-2xl blur-40 opacity-50 -z-10"></div>
              <h3 class="text-2xl font-bold gradient-text mb-2 text-center">الباقة الأولى</h3>
              <p class="text-secondary font-semibold text-center mb-6">999 ريال/ سنويا</p>
              <p class="text-xs text-black text-center mb-6">مناسب للأفراد</p>
              
              <div class="space-y-3 mb-8 text-sm">
                <div class="flex items-center gap-3 text-black">
                  <div class="w-2 h-2 bg-text-primary rounded-full opacity-50"></div>
                  <span>عدد لا محدود من المستخدمين</span>
                </div>
                <div class="flex items-center gap-3 text-black">
                  <div class="w-2 h-2 bg-text-primary rounded-full opacity-50"></div>
                  <span>حجوزات غير محدودة</span>
                </div>
                <div class="flex items-center gap-3 text-black">
                  <div class="w-2 h-2 bg-text-primary rounded-full opacity-50"></div>
                  <span>عدد لا محدد من مزودي الخدمة</span>
                </div>
                <div class="flex items-center gap-3 text-black">
                  <div class="w-2 h-2 bg-text-primary rounded-full opacity-50"></div>
                  <span>فرع واحد</span>
                </div>
                <div class="flex items-center gap-3 text-black">
                  <div class="w-2 h-2 bg-text-primary rounded-full opacity-50"></div>
                  <span>استقبال المدفوعات</span>
                </div>
                <div class="flex items-center gap-3 text-black">
                  <div class="w-2 h-2 bg-text-primary rounded-full opacity-50"></div>
                  <span>فواتير أونلاين</span>
                </div>
              </div>
              
              <button class="w-full bg-gradient-button text-white py-4 rounded-xl font-semibold hover:shadow-lg transition-all">
                اشترك الآن
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact Section -->
    <section class="py-20 bg-white">
      <div class="container mx-auto px-4">
        <h2 class="text-5xl font-bold text-center gradient-text mb-16">
          تواصل معنا
        </h2>

        <div class="grid lg:grid-cols-2 gap-16 items-start">
          <!-- Contact Form -->
          <div class="relative">
            <!-- Background blur effects -->
            <div class="absolute -top-4 -left-4 w-44 h-44 blur-background-purple rounded-2xl blur-50 transform rotate-12"></div>
            <div class="absolute -bottom-8 -left-8 w-44 h-44 blur-background-red rounded-2xl blur-50 transform rotate-90"></div>
            
            <div class="bg-white rounded-3xl p-8 relative z-10 shadow-lg">
              <form class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                  <div>
                    <label class="block text-text-primary font-medium mb-2">الاسم</label>
                    <input 
                      type="text" 
                      placeholder="الاسم كامل"
                      class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:border-primary focus:outline-none"
                    >
                  </div>
                  <div>
                    <label class="block text-text-primary font-medium mb-2">الايميل</label>
                    <input 
                      type="email" 
                      placeholder="you@mail.com"
                      class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:border-primary focus:outline-none"
                    >
                  </div>
                </div>
                
                <div>
                  <label class="block text-text-primary font-medium mb-2">الرسالة</label>
                  <textarea 
                    rows="4"
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:border-primary focus:outline-none resize-none"
                  ></textarea>
                </div>
                
                <div class="flex items-center gap-3">
                  <input type="checkbox" id="terms" class="w-6 h-6 border-2 border-gray-400 rounded">
                  <label for="terms" class="text-text-primary">أوافق على جميع الشروط والأحكام</label>
                </div>
                
                <button type="submit" class="w-full bg-gradient-primary text-white py-4 rounded-xl font-semibold hover:shadow-lg transition-all">
                  ارسال
                </button>
              </form>
            </div>
          </div>

          <!-- Contact Info -->
          <div class="text-arabic">
            <h3 class="text-3xl font-bold text-text-primary mb-8">تواصل معنا</h3>
            
            <p class="text-text-primary text-lg leading-relaxed mb-12">
              نحن هنا لضمان حصولكم على كل الدعم الذي تحتاجونه لأي استفسارات أو عقبات قد تواجهونها، فريقنا مستعد دائمًا لتقديم المساعدة الفعّالة.
            </p>
            
            <div class="space-y-6">
              <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-yellow-500 rounded-xl flex items-center justify-center">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 4H4C2.9 4 2.01 4.9 2.01 6L2 18C2 19.1 2.9 20 4 20H20C21.1 20 22 19.1 22 18V6C22 4.9 21.1 4 20 4ZM20 8L12 13L4 8V6L12 11L20 6V8Z" fill="white"/>
                  </svg>
                </div>
                <span class="text-text-primary font-medium">sales@bbookedapp.com</span>
              </div>
              
              <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-secondary rounded-xl flex items-center justify-center">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.62 10.79C8.06 13.62 10.38 15.94 13.21 17.38L15.41 15.18C15.69 14.9 16.08 14.82 16.43 14.93C17.55 15.3 18.75 15.5 20 15.5C20.55 15.5 21 15.95 21 16.5V20C21 20.55 20.55 21 20 21C10.61 21 3 13.39 3 4C3 3.45 3.45 3 4 3H7.5C8.05 3 8.5 3.45 8.5 4C8.5 5.25 8.7 6.45 9.07 7.57C9.18 7.92 9.1 8.31 8.82 8.59L6.62 10.79Z" fill="white"/>
                  </svg>
                </div>
                <span class="text-text-primary font-medium">+996-554832612</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-50 py-16">
      <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-4 gap-8">
          <div>
            <div class="flex items-center mb-4">
              <div class="w-8 h-8 rounded-lg bg-gradient-primary flex items-center justify-center mr-2">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10 5L6 8L10 11V5Z" fill="white"/>
                </svg>
              </div>
              <span class="text-xl font-bold text-text-primary">Bookly</span>
            </div>
            <div class="flex gap-3">
              <div class="w-8 h-8 bg-red-500 rounded-full"></div>
              <div class="w-8 h-8 bg-blue-500 rounded-full"></div>
              <div class="w-8 h-8 bg-green-500 rounded-full"></div>
              <div class="w-8 h-8 bg-yellow-500 rounded-full"></div>
            </div>
          </div>
          
          <div class="text-arabic">
            <h4 class="font-bold text-text-primary mb-4">شركة بوكلي</h4>
            <p class="text-gray-600 text-sm">معلومات الشركة</p>
          </div>
          
          <div class="text-arabic">
            <h4 class="font-bold text-text-primary mb-4">خدمة العملاء</h4>
            <p class="text-gray-600 text-sm">مركز المساعدة</p>
          </div>
          
          <div class="text-arabic">
            <h4 class="font-bold text-text-primary mb-4">الشروط</h4>
            <p class="text-gray-600 text-sm">شروط الاستخدام</p>
          </div>
        </div>
      </div>
    </footer>
  </div>
</template>

<script setup lang="ts">
// Component logic can be added here as needed
</script>

<style scoped>
/* Additional component-specific styles if needed */
</style>
