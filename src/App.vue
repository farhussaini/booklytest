<template>
  <div class="min-h-screen bg-white" dir="rtl">
    <!-- Header -->
    <header
      class="fixed top-0 left-0 right-0 z-50 bg-white/90 backdrop-blur-md border-b border-gray-100 transition-all duration-300"
    >
      <nav class="container mx-auto px-4 py-4 flex items-center justify-between">
        <!-- Logo -->
        <div class="flex items-center cursor-pointer" @click="scrollToTop">
          <div
            class="w-12 h-12 rounded-xl bg-gradient-primary flex items-center justify-center mr-3 hover:scale-105 transition-transform"
          >
            <svg
              width="24"
              height="24"
              viewBox="0 0 24 24"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path d="M15 8L10 12L15 16V8Z" fill="white" />
            </svg>
          </div>
          <span class="text-2xl font-bold text-text-primary">Bookly</span>
        </div>

        <!-- Navigation -->
        <div class="hidden md:flex items-center space-x-8 space-x-reverse">
          <button @click="scrollToSection('hero')" class="nav-link">الرئيسية</button>
          <button @click="scrollToSection('features')" class="nav-link">المميزات</button>
          <button @click="scrollToSection('pricing')" class="nav-link">الباقات</button>
          <button @click="scrollToSection('contact')" class="nav-link">للتواصل</button>
        </div>

        <!-- Mobile menu button -->
        <button @click="toggleMobileMenu" class="md:hidden p-2">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M4 6h16M4 12h16M4 18h16"
            ></path>
          </svg>
        </button>

        <!-- CTA Button -->
        <button
          @click="showRegistrationModal = true"
          class="hidden md:block bg-gradient-primary text-white px-6 py-3 rounded-lg font-semibold hover:shadow-lg transition-all hover:scale-105"
        >
          التسجيل
        </button>
      </nav>

      <!-- Mobile Menu -->
      <div
        v-if="mobileMenuOpen"
        class="md:hidden bg-white border-t border-gray-100 px-4 py-4 space-y-4"
      >
        <button @click="scrollToSection('hero')" class="block w-full text-right py-2 nav-link">
          الرئيسية
        </button>
        <button @click="scrollToSection('features')" class="block w-full text-right py-2 nav-link">
          المميزات
        </button>
        <button @click="scrollToSection('pricing')" class="block w-full text-right py-2 nav-link">
          الباقات
        </button>
        <button @click="scrollToSection('contact')" class="block w-full text-right py-2 nav-link">
          للتواصل
        </button>
        <button
          @click="showRegistrationModal = true"
          class="w-full bg-gradient-primary text-white px-6 py-3 rounded-lg font-semibold"
        >
          التسجيل
        </button>
      </div>
    </header>

    <!-- Hero Section -->
    <section id="hero" class="relative overflow-hidden pt-20">
      <!-- Background Wave -->
      <div class="absolute inset-0 top-96">
        <svg
          class="w-full h-96"
          viewBox="0 0 1440 377"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M1441 143.63C817.184 -116.498 219.743 35.2435 -1 143.63V377H1441V143.63Z"
            fill="url(#paint0_linear_wave)"
          />
          <defs>
            <linearGradient
              id="paint0_linear_wave"
              x1="720"
              y1="0"
              x2="720"
              y2="305.5"
              gradientUnits="userSpaceOnUse"
            >
              <stop offset="0.168297" stop-color="#EEE0FF" />
              <stop offset="0.432738" stop-color="#FFE7EF" stop-opacity="0.971135" />
              <stop offset="1" stop-color="#F4F4F4" stop-opacity="0" />
            </linearGradient>
          </defs>
        </svg>
      </div>

      <div class="container mx-auto px-4 py-20 text-center relative z-10">
        <div class="animate-fade-in-up">
          <h1
            class="text-4xl md:text-5xl lg:text-6xl font-bold text-text-primary mb-8 leading-tight"
          >
            رتّـــب جدولـــك بســــهـــولـــــة،<br />
            وخــــلّ عــميــــلك مبـــســوط
          </h1>

          <p
            class="text-lg md:text-xl text-text-primary max-w-4xl mx-auto mb-12 leading-relaxed opacity-90"
          >
            منصة احترافية تساعدك تدير مواعيدك وحجوزاتك بكل سهولة ومرونة، مهما كان نشاطك، من جدولة
            المواعيد و تأكيد الحجز و التنبيهات والدفع الإلكتروني، كل الخطوات من مكان واحد وأنت تتابع
            شغلك من لوحة تحكم واضحة وسهلة، رتّب وقتك واخدم عميلك بشكل أفضل.
          </p>

          <div class="flex flex-col sm:flex-row justify-center items-center gap-6 mb-20">
            <button @click="scrollToSection('features')" class="btn-secondary group">
              <span>مميزات البرنامج</span>
              <svg
                class="w-5 h-5 group-hover:translate-x-1 transition-transform"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M15 19l-7-7 7-7"
                ></path>
              </svg>
            </button>
            <button @click="showBookingModal = true" class="btn-primary group">
              <span>احجز موعد للتدريب</span>
              <svg
                class="w-5 h-5 group-hover:scale-110 transition-transform"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                ></path>
              </svg>
            </button>
          </div>
        </div>

        <!-- Video Preview Section -->
        <div class="relative max-w-5xl mx-auto animate-fade-in-up animation-delay-200">
          <div
            class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-3xl p-6 shadow-2xl hover:shadow-3xl transition-shadow duration-500"
          >
            <div class="bg-white rounded-2xl p-8 relative">
              <div
                class="aspect-video bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl flex items-center justify-center relative overflow-hidden"
              >
                <!-- Play Button -->
                <button @click="playVideo" class="group relative">
                  <div
                    class="w-32 h-32 bg-primary rounded-full flex items-center justify-center play-button-shadow group-hover:scale-110 transition-all duration-300 cursor-pointer"
                  >
                    <svg
                      width="48"
                      height="48"
                      viewBox="0 0 48 48"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                      class="group-hover:scale-110 transition-transform"
                    >
                      <path d="M18 12L34 24L18 36V12Z" fill="white" />
                    </svg>
                  </div>
                </button>

                <!-- Logo overlay -->
                <div
                  class="absolute bottom-6 right-6 flex items-center bg-white/90 backdrop-blur-sm rounded-lg px-3 py-2"
                >
                  <div
                    class="w-8 h-8 rounded-lg bg-gradient-primary flex items-center justify-center mr-2"
                  >
                    <svg
                      width="16"
                      height="16"
                      viewBox="0 0 16 16"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path d="M10 5L6 8L10 11V5Z" fill="white" />
                    </svg>
                  </div>
                  <span class="text-sm font-semibold text-text-primary">Bookly</span>
                </div>

                <div class="absolute top-1/4 left-1/2 transform -translate-x-1/2 text-center">
                  <p class="text-text-primary text-lg font-medium">
                    Effortless Booking,<br />Every Time.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-24 bg-gradient-to-b from-white to-gray-50">
      <div class="container mx-auto px-4">
        <div class="text-center mb-20">
          <h2 class="text-5xl md:text-6xl font-bold gradient-text mb-6" style="margin: -1px 0 24px">
            <p>مميزات البرنامج</p>
          </h2>
          <p class="text-xl text-gray-600 max-w-3xl mx-auto">
            اكتشف الميزات المتقدمة التي تجعل إدارة مواعيدك أسهل وأكثر احترافية
          </p>
        </div>

        <!-- Feature Tags -->
        <div class="flex flex-wrap justify-center items-center gap-4 mb-16">
          <div
            v-for="(feature, index) in features"
            :key="index"
            class="feature-tag group"
            :class="{ active: selectedFeature === index }"
            @click="selectedFeature = index"
          >
            <span>{{ feature.name }}</span>
          </div>
        </div>

        <div class="text-center mb-20">
          <button @click="scrollToSection('contact')" class="btn-primary-large">
            صفحة حجز المواعيد أونلاين
          </button>
        </div>

        <!-- Feature Details -->
        <div class="grid lg:grid-cols-2 gap-16 items-center">
          <div class="text-arabic space-y-8 order-2 lg:order-1">
            <h3 class="text-4xl font-bold text-primary mb-8">صفحة حجز المواعيد أونلاين</h3>

            <div class="space-y-8">
              <div
                v-for="(detail, index) in featureDetails"
                :key="index"
                class="feature-detail-card group"
              >
                <div class="flex items-start gap-6">
                  <div class="feature-icon" :class="detail.iconColor">
                    <component :is="detail.icon" class="w-6 h-6 text-white" />
                  </div>
                  <div class="flex-1">
                    <h4
                      class="text-xl font-bold text-text-primary mb-3 group-hover:text-primary transition-colors"
                    >
                      {{ detail.title }}
                    </h4>
                    <p class="text-gray-600 leading-relaxed">{{ detail.description }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="relative order-1 lg:order-2">
            <!-- Enhanced App Mockup -->
            <div class="relative">
              <div
                class="bg-gradient-to-br from-gray-100 to-gray-200 rounded-3xl p-8 aspect-[3/4] flex items-center justify-center shadow-2xl hover:shadow-3xl transition-shadow duration-500"
              >
                <div class="text-center text-gray-500 space-y-6">
                  <div
                    class="w-32 h-32 bg-gradient-primary rounded-2xl mx-auto mb-6 flex items-center justify-center animate-pulse"
                  >
                    <svg
                      class="w-16 h-16 text-white"
                      fill="none"
                      stroke="currentColor"
                      viewBox="0 0 24 24"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"
                      ></path>
                    </svg>
                  </div>
                  <p class="text-lg font-medium">معاينة التطبيق</p>
                  <p class="text-sm text-gray-400">تطبيق حج�� المواعيد المتقدم</p>
                </div>
              </div>
              <!-- Floating elements -->
              <div
                class="absolute -top-4 -right-4 w-8 h-8 bg-primary rounded-full animate-bounce"
              ></div>
              <div
                class="absolute -bottom-4 -left-4 w-6 h-6 bg-secondary rounded-full animate-bounce animation-delay-200"
              ></div>
            </div>
          </div>
        </div>

        <div class="text-center mt-20">
          <button @click="showBookingModal = true" class="btn-primary-xl group">
            <span>احجز موعد للتدريب</span>
            <svg
              class="w-6 h-6 group-hover:translate-x-1 transition-transform"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M15 19l-7-7 7-7"
              ></path>
            </svg>
          </button>
        </div>
      </div>
    </section>

    <!-- Pricing Section -->
    <section
      id="pricing"
      class="py-24 relative overflow-hidden bg-gradient-to-b from-gray-50 to-white"
    >
      <!-- Background blur effects -->
      <div
        class="absolute -left-56 top-48 w-80 h-80 blur-background-yellow rounded-3xl transform -rotate-45 blur-50 animate-float"
      ></div>
      <div
        class="absolute -right-40 bottom-0 w-80 h-80 blur-background-purple rounded-3xl transform rotate-45 blur-50 animate-float animation-delay-300"
      ></div>

      <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-20">
          <h2 class="text-5xl md:text-6xl font-bold gradient-text mb-6">الأسعار والباقات</h2>
          <p class="text-xl text-gray-600 max-w-3xl mx-auto">
            اختر الباقة المناسبة لاحتياجاتك وابدأ رحلتك معنا اليوم
          </p>
        </div>

        <!-- Pricing Cards -->
        <div class="pricing-card rounded-3xl p-8 backdrop-blur-sm">
          <div class="grid lg:grid-cols-3 gap-8">
            <!-- Basic Plan -->
            <div class="pricing-plan" :class="{ popular: false }">
              <div class="pricing-plan-header">
                <h3 class="text-2xl font-bold text-text-primary mb-2">الباقة المخصصة</h3>
                <p class="text-secondary font-semibold mb-4">خدمات مميزة</p>
                <p class="text-sm text-gray-600 mb-8 leading-relaxed">
                  شامل لجميع الخدمات للباقات الأخرى بالإضافة إلى طلبات العميل الخاصة
                </p>
              </div>
              <button @click="selectPlan('custom')" class="pricing-btn-secondary">
                اشترك الآن
              </button>
            </div>

            <!-- Premium Plan -->
            <div class="pricing-plan" :class="{ popular: false }">
              <div class="pricing-plan-header">
                <h3 class="text-2xl font-bold text-text-primary mb-2">الباقة المميزة</h3>
                <p class="text-secondary font-semibold mb-4">1999ريال/ سنويا</p>
                <p class="text-xs text-gray-500 mb-6">مناسب للشركات الناشئة والمتوسطة</p>

                <div class="space-y-4 mb-8">
                  <div v-for="feature in premiumFeatures" :key="feature" class="pricing-feature">
                    <div class="w-2 h-2 bg-primary rounded-full"></div>
                    <span class="text-sm text-text-primary">{{ feature }}</span>
                  </div>
                </div>
              </div>

              <button @click="selectPlan('premium')" class="pricing-btn-secondary">
                اشترك الآن
              </button>
            </div>

            <!-- Pro Plan -->
            <div class="pricing-plan popular">
              <div class="popular-badge">الأكثر شعبية</div>
              <div class="pricing-plan-header">
                <h3 class="text-2xl font-bold gradient-text mb-2">الباقة الأولى</h3>
                <p class="text-secondary font-semibold mb-4">999 ريال/ سنويا</p>
                <p class="text-xs text-gray-500 mb-6">مناسب للأفراد</p>

                <div class="space-y-4 mb-8">
                  <div v-for="feature in proFeatures" :key="feature" class="pricing-feature">
                    <div class="w-2 h-2 bg-primary rounded-full"></div>
                    <span class="text-sm text-gray-700">{{ feature }}</span>
                  </div>
                </div>
              </div>

              <button @click="selectPlan('pro')" class="pricing-btn-primary">اشترك الآن</button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-24 bg-gradient-to-b from-white to-gray-50">
      <div class="container mx-auto px-4">
        <div class="text-center mb-20">
          <h2 class="text-5xl md:text-6xl font-bold gradient-text mb-6">تواصل معنا</h2>
          <p class="text-xl text-gray-600 max-w-3xl mx-auto">
            نحن هنا لمساعدتك في كل خطوة. تواصل معنا وسنكون سعداء للإجابة على استفساراتك
          </p>
        </div>

        <div class="grid lg:grid-cols-2 gap-16 items-start">
          <!-- Contact Form -->
          <div class="relative">
            <!-- Background blur effects -->
            <div
              class="absolute -top-4 -left-4 w-44 h-44 blur-background-purple rounded-2xl blur-50 transform rotate-12 animate-float"
            ></div>
            <div
              class="absolute -bottom-8 -left-8 w-44 h-44 blur-background-red rounded-2xl blur-50 transform rotate-90 animate-float animation-delay-200"
            ></div>

            <div class="bg-white rounded-3xl p-8 relative z-10 shadow-2xl border border-gray-100">
              <form @submit.prevent="submitForm" class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                  <div class="form-group">
                    <label class="form-label">الاسم</label>
                    <input
                      v-model="form.name"
                      type="text"
                      placeholder="الاسم كامل"
                      class="form-input"
                      required
                    />
                  </div>
                  <div class="form-group">
                    <label class="form-label">الايميل</label>
                    <input
                      v-model="form.email"
                      type="email"
                      placeholder="you@mail.com"
                      class="form-input"
                      required
                    />
                  </div>
                </div>

                <div class="form-group">
                  <label class="form-label">الرسالة</label>
                  <textarea
                    v-model="form.message"
                    rows="4"
                    placeholder="اكتب رسالتك هنا..."
                    class="form-input resize-none"
                    required
                  ></textarea>
                </div>

                <div class="flex items-center gap-3">
                  <input
                    v-model="form.agreeTerms"
                    type="checkbox"
                    id="terms"
                    class="w-5 h-5 text-primary border-2 border-gray-300 rounded focus:ring-primary"
                    required
                  />
                  <label for="terms" class="text-text-primary text-sm"
                    >أوافق على جميع الشروط والأحكام</label
                  >
                </div>

                <button type="submit" class="w-full btn-primary-large" :disabled="formSubmitting">
                  <span v-if="formSubmitting">جاري الإرسال...</span>
                  <span v-else>ارسال</span>
                </button>
              </form>
            </div>
          </div>

          <!-- Contact Info -->
          <div class="text-arabic">
            <h3 class="text-4xl font-bold text-text-primary mb-8">تواصل معنا</h3>

            <p class="text-lg text-gray-600 leading-relaxed mb-12">
              نحن هنا لضمان حصولكم على كل الدعم الذي تحتاجونه لأي استفسارات أو عقبات قد تواجهونها،
              فريقن�� مستعد دائمًا لتقديم المساعدة الفعّالة.
            </p>

            <div class="space-y-8">
              <div class="contact-info-item group">
                <div class="contact-icon bg-yellow-500">
                  <svg
                    class="w-6 h-6 text-white"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                    ></path>
                  </svg>
                </div>
                <div>
                  <h4 class="font-semibold text-text-primary mb-1">البريد الإلكتروني</h4>
                  <a
                    href="mailto:sales@bbookedapp.com"
                    class="text-gray-600 hover:text-primary transition-colors"
                    >sales@bbookedapp.com</a
                  >
                </div>
              </div>

              <div class="contact-info-item group">
                <div class="contact-icon bg-secondary">
                  <svg
                    class="w-6 h-6 text-white"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"
                    ></path>
                  </svg>
                </div>
                <div>
                  <h4 class="font-semibold text-text-primary mb-1">رقم الهاتف</h4>
                  <a
                    href="tel:+996554832612"
                    class="text-gray-600 hover:text-primary transition-colors"
                    >+996-554832612</a
                  >
                </div>
              </div>

              <div class="contact-info-item group">
                <div class="contact-icon bg-blue-500">
                  <svg
                    class="w-6 h-6 text-white"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                    ></path>
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                    ></path>
                  </svg>
                </div>
                <div>
                  <h4 class="font-semibold text-text-primary mb-1">العنوان</h4>
                  <p class="text-gray-600">المملكة العربية السعودي��</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Enhanced Footer -->
    <footer class="bg-gradient-to-br from-gray-900 to-gray-800 text-white py-16">
      <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-4 gap-8">
          <div class="md:col-span-2">
            <div class="flex items-center mb-6">
              <div
                class="w-12 h-12 rounded-xl bg-gradient-primary flex items-center justify-center mr-3"
              >
                <svg
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path d="M15 8L10 12L15 16V8Z" fill="white" />
                </svg>
              </div>
              <span class="text-2xl font-bold">Bookly</span>
            </div>
            <p class="text-gray-300 mb-6 leading-relaxed">
              منصة رائدة في إدارة المواعيد والحجوزات، نساعدك على تنظيم وقتك وخدمة عملائك بأفضل طريقة
              ممكنة.
            </p>
            <div class="flex gap-4">
              <div
                class="w-10 h-10 bg-red-500 rounded-full flex items-center justify-center hover:scale-110 transition-transform cursor-pointer"
              >
                <svg class="w-5 h-5" fill="white" viewBox="0 0 24 24">
                  <path
                    d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"
                  />
                </svg>
              </div>
              <div
                class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center hover:scale-110 transition-transform cursor-pointer"
              >
                <svg class="w-5 h-5" fill="white" viewBox="0 0 24 24">
                  <path
                    d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"
                  />
                </svg>
              </div>
              <div
                class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center hover:scale-110 transition-transform cursor-pointer"
              >
                <svg class="w-5 h-5" fill="white" viewBox="0 0 24 24">
                  <path
                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893A11.821 11.821 0 0020.525 3.488z"
                  />
                </svg>
              </div>
              <div
                class="w-10 h-10 bg-purple-600 rounded-full flex items-center justify-center hover:scale-110 transition-transform cursor-pointer"
              >
                <svg class="w-5 h-5" fill="white" viewBox="0 0 24 24">
                  <path
                    d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.219-.359-1.219c0-1.142.662-1.996 1.482-1.996.699 0 1.037.219 1.037 1.142 0 .699-.219 1.759-.359 2.738-.199.937.479 1.699 1.406 1.699 1.699 0 2.998-1.801 2.998-4.398 0-2.278-1.642-3.877-3.998-3.877-2.738 0-4.317 2.058-4.317 4.178 0 .839.318 1.699.718 2.178.079.099.099.179.078.279-.078.318-.238 1.037-.278 1.182-.059.179-.199.219-.459.139-1.279-.599-2.077-2.378-2.077-3.838 0-3.119 2.278-5.995 6.516-5.995 3.438 0 6.097 2.458 6.097 5.757 0 3.418-2.158 6.177-5.156 6.177-1.018 0-1.979-.538-2.298-1.182 0 0-.508 1.939-.618 2.417-.238.898-.878 2.038-1.317 2.717C9.438 23.782 10.708 24.013 12.017 24.013c6.624 0 11.99-5.367 11.99-11.987C24.007 5.367 18.641.013 12.017.013z"
                  />
                </svg>
              </div>
            </div>
          </div>

          <div class="text-arabic">
            <h4 class="font-bold text-white mb-6 text-lg">معلومات الشركة</h4>
            <ul class="space-y-3">
              <li>
                <a href="#" class="text-gray-300 hover:text-white transition-colors">من نحن</a>
              </li>
              <li>
                <a href="#" class="text-gray-300 hover:text-white transition-colors">الخدمات</a>
              </li>
              <li>
                <a href="#" class="text-gray-300 hover:text-white transition-colors">الأخبار</a>
              </li>
              <li>
                <a href="#" class="text-gray-300 hover:text-white transition-colors">الوظائف</a>
              </li>
            </ul>
          </div>

          <div class="text-arabic">
            <h4 class="font-bold text-white mb-6 text-lg">المساعدة والدعم</h4>
            <ul class="space-y-3">
              <li>
                <a href="#" class="text-gray-300 hover:text-white transition-colors"
                  >مركز المساعدة</a
                >
              </li>
              <li>
                <a href="#" class="text-gray-300 hover:text-white transition-colors"
                  >شروط الاستخدام</a
                >
              </li>
              <li>
                <a href="#" class="text-gray-300 hover:text-white transition-colors"
                  >سياسة الخصوصية</a
                >
              </li>
              <li>
                <a href="#" class="text-gray-300 hover:text-white transition-colors">اتصل بنا</a>
              </li>
            </ul>
          </div>
        </div>

        <div class="border-t border-gray-700 mt-12 pt-8 text-center">
          <p class="text-gray-400">© 2024 Bookly. جميع الحقوق محفوظة.</p>
        </div>
      </div>
    </footer>

    <!-- Modals -->
    <!-- Registration Modal -->
    <div v-if="showRegistrationModal" class="modal-overlay" @click="showRegistrationModal = false">
      <div class="modal-content" @click.stop>
        <div class="modal-header">
          <h3 class="text-2xl font-bold text-text-primary">تسجيل حساب جديد</h3>
          <button @click="showRegistrationModal = false" class="text-gray-400 hover:text-gray-600">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M6 18L18 6M6 6l12 12"
              ></path>
            </svg>
          </button>
        </div>
        <form @submit.prevent="submitRegistration" class="space-y-4">
          <div class="grid grid-cols-2 gap-4">
            <input
              v-model="registration.firstName"
              type="text"
              placeholder="الاسم الأول"
              class="form-input"
              required
            />
            <input
              v-model="registration.lastName"
              type="text"
              placeholder="الاسم الأخير"
              class="form-input"
              required
            />
          </div>
          <input
            v-model="registration.email"
            type="email"
            placeholder="البريد الإلكتروني"
            class="form-input"
            required
          />
          <input
            v-model="registration.phone"
            type="tel"
            placeholder="رقم الهاتف"
            class="form-input"
            required
          />
          <input
            v-model="registration.password"
            type="password"
            placeholder="كلمة المرور"
            class="form-input"
            required
          />
          <button type="submit" class="w-full btn-primary" :disabled="registrationSubmitting">
            {{ registrationSubmitting ? 'جاري التسجيل...' : 'تسجيل' }}
          </button>
        </form>
      </div>
    </div>

    <!-- Booking Modal -->
    <div v-if="showBookingModal" class="modal-overlay" @click="showBookingModal = false">
      <div class="modal-content" @click.stop>
        <div class="modal-header">
          <h3 class="text-2xl font-bold text-text-primary">احجز موعد للتدريب</h3>
          <button @click="showBookingModal = false" class="text-gray-400 hover:text-gray-600">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M6 18L18 6M6 6l12 12"
              ></path>
            </svg>
          </button>
        </div>
        <form @submit.prevent="submitBooking" class="space-y-4">
          <input
            v-model="booking.name"
            type="text"
            placeholder="الاسم كامل"
            class="form-input"
            required
          />
          <input
            v-model="booking.email"
            type="email"
            placeholder="البريد الإلكتروني"
            class="form-input"
            required
          />
          <input
            v-model="booking.phone"
            type="tel"
            placeholder="رقم الهاتف"
            class="form-input"
            required
          />
          <input
            v-model="booking.company"
            type="text"
            placeholder="اسم الشركة (اختياري)"
            class="form-input"
          />
          <select v-model="booking.service" class="form-input" required>
            <option value="">اختر نوع الخدمة</option>
            <option value="demo">عرض تجريبي</option>
            <option value="training">تدريب شخصي</option>
            <option value="setup">إعداد النظام</option>
            <option value="consultation">استشارة</option>
          </select>
          <input v-model="booking.preferredDate" type="date" class="form-input" required />
          <textarea
            v-model="booking.notes"
            placeholder="ملاحظات إضافية"
            class="form-input"
            rows="3"
          ></textarea>
          <button type="submit" class="w-full btn-primary" :disabled="bookingSubmitting">
            {{ bookingSubmitting ? 'جاري الحجز...' : 'احجز الآن' }}
          </button>
        </form>
      </div>
    </div>

    <!-- Success Toast -->
    <div v-if="showSuccessToast" class="success-toast">
      <div class="flex items-center">
        <svg
          class="w-6 h-6 text-green-400 mr-3"
          fill="none"
          stroke="currentColor"
          viewBox="0 0 24 24"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M5 13l4 4L19 7"
          ></path>
        </svg>
        <span>{{ successMessage }}</span>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, reactive, onMounted } from 'vue'

// Reactive state
const mobileMenuOpen = ref(false)
const selectedFeature = ref(0)
const showRegistrationModal = ref(false)
const showBookingModal = ref(false)
const showSuccessToast = ref(false)
const successMessage = ref('')
const formSubmitting = ref(false)
const registrationSubmitting = ref(false)
const bookingSubmitting = ref(false)

// Form data
const form = reactive({
  name: '',
  email: '',
  message: '',
  agreeTerms: false,
})

const registration = reactive({
  firstName: '',
  lastName: '',
  email: '',
  phone: '',
  password: '',
})

const booking = reactive({
  name: '',
  email: '',
  phone: '',
  company: '',
  service: '',
  preferredDate: '',
  notes: '',
})

// Data
const features = [
  { name: 'حسابات المستخدمين' },
  { name: 'الدفع الإلكتروني' },
  { name: 'التأكيد بالاشعارات' },
  { name: 'إدارة المواعيد والخدمات' },
  { name: 'تطبيق الجوال' },
  { name: 'ادارة جداول الموظفين' },
]

const featureDetails = [
  {
    title: 'صفحة خاصة لحجز المواعيد ومشاهدة جميع المواعيد المتاحة',
    description:
      'منصة سهلة الاستخدام تمكن العملاء من رؤية جميع المواعيد المتاحة وحجز ما يناسبهم بكل سهولة',
    icon: 'CalendarIcon',
    iconColor: 'bg-secondary',
  },
  {
    title: 'إمكانية إضافة أكثر من مقدم خدمة بمواعيده الخاصة',
    description: 'إدارة متعددة المستخدمين تسمح بإضافة عدة مقدمي خدمة مع جداولهم المستقلة',
    icon: 'UserGroupIcon',
    iconColor: 'bg-yellow-500',
  },
  {
    title: 'القدرة على التعديل وإعادة الجدولة',
    description: 'مرونة كاملة في تعديل وإعادة جدولة المواعيد حسب الحاجة مع إشعارات تلقائية',
    icon: 'ClockIcon',
    iconColor: 'bg-blue-600',
  },
]

const premiumFeatures = [
  'جدولة مواعيد الحجوزات أونلاين',
  'الرسائل والشعارات',
  'فواتير أونلاين',
  'عدد 3 فروع',
  'اسم موقع مخصص للشركة',
  'API الربط',
]

const proFeatures = [
  'عدد لا محدود من المستخدمين',
  'حجوزات غير محدودة',
  'عدد لا محدد من مزودي الخدمة',
  'فرع واحد',
  'استقبال المدفوعات',
  'فواتير أونلاين',
]

// Methods
const toggleMobileMenu = () => {
  mobileMenuOpen.value = !mobileMenuOpen.value
}

const scrollToTop = () => {
  window.scrollTo({ top: 0, behavior: 'smooth' })
}

const scrollToSection = (sectionId: string) => {
  const element = document.getElementById(sectionId)
  if (element) {
    const headerHeight = 80
    const targetPosition = element.offsetTop - headerHeight
    window.scrollTo({ top: targetPosition, behavior: 'smooth' })
  }
  mobileMenuOpen.value = false
}

const playVideo = () => {
  // Here you would typically open a video modal or redirect to video
  showToast('سيتم إضافة الفيديو قريباً!')
}

const selectPlan = (plan: string) => {
  showToast(
    `تم اختيار ${plan === 'pro' ? 'الباقة الأولى' : plan === 'premium' ? 'الباقة المميزة' : 'الباقة المخصصة'}!`,
  )
  // Here you would typically redirect to payment or registration
}

const submitForm = async () => {
  formSubmitting.value = true

  // Simulate API call
  await new Promise((resolve) => setTimeout(resolve, 2000))

  showToast('تم إرسال رسالتك بنجاح! سنتواصل معك قريباً.')

  // Reset form
  Object.assign(form, {
    name: '',
    email: '',
    message: '',
    agreeTerms: false,
  })

  formSubmitting.value = false
}

const submitRegistration = async () => {
  registrationSubmitting.value = true

  // Simulate API call
  await new Promise((resolve) => setTimeout(resolve, 2000))

  showToast('تم تسجيل حسابك بنجاح! سنرسل لك رسالة تأكيد على بريدك الإلكتروني.')
  showRegistrationModal.value = false

  // Reset form
  Object.assign(registration, {
    firstName: '',
    lastName: '',
    email: '',
    phone: '',
    password: '',
  })

  registrationSubmitting.value = false
}

const submitBooking = async () => {
  bookingSubmitting.value = true

  // Simulate API call
  await new Promise((resolve) => setTimeout(resolve, 2000))

  showToast('تم حجز موعدك بنجاح! سنتواصل معك لتأكيد التفاصيل.')
  showBookingModal.value = false

  // Reset form
  Object.assign(booking, {
    name: '',
    email: '',
    phone: '',
    company: '',
    service: '',
    preferredDate: '',
    notes: '',
  })

  bookingSubmitting.value = false
}

const showToast = (message: string) => {
  successMessage.value = message
  showSuccessToast.value = true
  setTimeout(() => {
    showSuccessToast.value = false
  }, 4000)
}

// Icon components (simplified)
const CalendarIcon = () => 'calendar'
const UserGroupIcon = () => 'user-group'
const ClockIcon = () => 'clock'

onMounted(() => {
  // Add smooth scrolling behavior
  document.documentElement.style.scrollBehavior = 'smooth'
})
</script>

<style scoped>
/* Navigation */
.nav-link {
  @apply text-text-primary hover:text-primary transition-colors font-medium py-2 px-4 rounded-lg hover:bg-purple-light/20;
}

/* Buttons */
.btn-primary {
  @apply bg-gradient-primary text-white px-8 py-3 rounded-xl font-semibold hover:shadow-lg transition-all duration-300 hover:scale-105 flex items-center gap-3 justify-center;
}

.btn-primary-large {
  @apply bg-gradient-primary text-white px-12 py-4 rounded-xl font-semibold hover:shadow-xl transition-all duration-300 hover:scale-105 flex items-center gap-3 justify-center text-lg;
}

.btn-primary-xl {
  @apply bg-gradient-primary text-white px-16 py-5 rounded-2xl font-bold hover:shadow-xl transition-all duration-300 hover:scale-105 flex items-center gap-4 justify-center text-xl;
}

.btn-secondary {
  @apply border-2 border-primary text-primary px-8 py-3 rounded-xl font-semibold hover:bg-primary hover:text-white transition-all duration-300 hover:scale-105 flex items-center gap-3;
}

/* Feature Tags */
.feature-tag {
  @apply bg-purple-lighter border border-purple-light rounded-full px-6 py-4 cursor-pointer transition-all duration-300 hover:shadow-lg hover:scale-105;
}

.feature-tag.active {
  @apply bg-primary text-white border-primary shadow-lg;
}

.feature-tag:not(.active) span {
  @apply text-primary font-medium;
}

/* Feature Details */
.feature-detail-card {
  @apply bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-purple-light;
}

.feature-icon {
  @apply w-14 h-14 rounded-2xl flex-shrink-0 flex items-center justify-center shadow-lg transition-transform duration-300 group-hover:scale-110;
}

/* Pricing */
.pricing-plan {
  @apply bg-white rounded-2xl p-8 relative shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-purple-light;
}

.pricing-plan.popular {
  @apply border-2 border-primary transform scale-105 shadow-xl;
}

.popular-badge {
  @apply absolute -top-4 left-1/2 transform -translate-x-1/2 bg-gradient-primary text-white px-6 py-2 rounded-full text-sm font-semibold shadow-lg;
}

.pricing-plan-header {
  @apply text-center mb-8;
}

.pricing-feature {
  @apply flex items-center gap-3 text-sm;
}

.pricing-btn-primary {
  @apply w-full bg-gradient-button text-white py-4 rounded-xl font-semibold hover:shadow-lg transition-all duration-300 hover:scale-105;
}

.pricing-btn-secondary {
  @apply w-full border-2 border-secondary text-secondary py-4 rounded-xl font-semibold hover:bg-secondary hover:text-white transition-all duration-300;
}

/* Forms */
.form-group {
  @apply space-y-2;
}

.form-label {
  @apply block text-text-primary font-medium;
}

.form-input {
  @apply w-full border border-gray-300 rounded-xl px-4 py-3 focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20 transition-all duration-300;
}

/* Contact */
.contact-info-item {
  @apply flex items-start gap-4 p-4 rounded-xl hover:bg-gray-50 transition-all duration-300 cursor-pointer;
}

.contact-icon {
  @apply w-12 h-12 rounded-xl flex-shrink-0 flex items-center justify-center shadow-lg transition-transform duration-300 group-hover:scale-110;
}

/* Modals */
.modal-overlay {
  @apply fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4 backdrop-blur-sm;
}

.modal-content {
  @apply bg-white rounded-2xl p-8 max-w-md w-full max-h-[90vh] overflow-y-auto shadow-2xl;
}

.modal-header {
  @apply flex items-center justify-between mb-6 pb-4 border-b border-gray-200;
}

/* Toasts */
.success-toast {
  @apply fixed bottom-6 right-6 bg-green-500 text-white px-6 py-4 rounded-xl shadow-lg z-50 animate-slide-in;
}

/* Animations */
@keyframes fade-in-up {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes float {
  0%,
  100% {
    transform: translateY(0px) rotate(0deg);
  }
  50% {
    transform: translateY(-10px) rotate(2deg);
  }
}

@keyframes slide-in {
  from {
    transform: translateX(100%);
  }
  to {
    transform: translateX(0);
  }
}

.animate-fade-in-up {
  animation: fade-in-up 0.8s ease-out;
}

.animation-delay-200 {
  animation-delay: 0.2s;
}

.animation-delay-300 {
  animation-delay: 0.3s;
}

.animate-float {
  animation: float 6s ease-in-out infinite;
}

.animate-slide-in {
  animation: slide-in 0.3s ease-out;
}

/* Enhanced shadows */
.shadow-3xl {
  box-shadow: 0 35px 60px -12px rgba(0, 0, 0, 0.25);
}

/* Hover effects */
.hover-scale:hover {
  transform: scale(1.05);
}

/* Better spacing and layout */
.container {
  @apply max-w-7xl;
}

section {
  @apply scroll-mt-20;
}
</style>
