<template>
  <div class="w-full bg-white py-12 flex justify-center">
    <div class="relative h-[369px] rounded-[24px] w-[1160px]">
      <!-- Background rectangle -->
      <div aria-hidden="true" class="absolute bg-[#FFE5F0] border border-[#7223d8] border-solid inset-0 pointer-events-none rounded-[24px]" />
      
      <!-- Copyright text -->
      <div class="absolute flex flex-col font-['Inter:Regular',sans-serif] font-normal justify-center leading-[0] left-[844px] not-italic text-[12px] text-[rgba(8,47,73,0.5)] text-nowrap top-[315px] translate-y-[-50%]">
        <p class="leading-[24px] whitespace-pre">Copyright @2025. All right reserved by Bookly.</p>
      </div>
      
      <!-- Social Media Icons -->
      <div class="absolute contents left-[31px] top-[208px]">
        <!-- YouTube Circle Button -->
        <button class="absolute left-[197.5px] size-[40.5px] top-[208px] p-0 border-none bg-transparent cursor-pointer hover:opacity-80 transition-opacity" aria-label="Follow us on YouTube" @click="openSocialMedia('youtube')">
          <svg class="block size-full" fill="none" preserveAspectRatio="none" viewBox="0 0 41 41">
            <foreignObject height="60.5" width="60.5" x="-10" y="-10">
              <div :style="{ backdropFilter: 'blur(5px)', clipPath: 'url(#bgblur_youtube)', height: '100%', width: '100%' }" xmlns="http://www.w3.org/1999/xhtml" />
            </foreignObject>
            <circle cx="20.25" cy="20.25" data-figma-bg-blur-radius="10" fill="#FF709F" r="20.25" />
            <defs>
              <clipPath id="bgblur_youtube" transform="translate(10 10)">
                <circle cx="20.25" cy="20.25" r="20.25" />
              </clipPath>
            </defs>
          </svg>
          <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-[19px] h-[14px]">
            <svg class="block size-full" fill="none" preserveAspectRatio="none" viewBox="0 0 19 14">
              <path :d="svgPaths.p5c01e80" fill="white" />
            </svg>
          </div>
        </button>

        <!-- Instagram Circle Button -->
        <button class="absolute left-[142px] size-[40.5px] top-[208px] p-0 border-none bg-transparent cursor-pointer hover:opacity-80 transition-opacity" aria-label="Follow us on Instagram" @click="openSocialMedia('instagram')">
          <svg class="block size-full" fill="none" preserveAspectRatio="none" viewBox="0 0 41 41">
            <foreignObject height="60.5" width="60.5" x="-10" y="-10">
              <div :style="{ backdropFilter: 'blur(5px)', clipPath: 'url(#bgblur_instagram)', height: '100%', width: '100%' }" xmlns="http://www.w3.org/1999/xhtml" />
            </foreignObject>
            <circle cx="20.25" cy="20.25" data-figma-bg-blur-radius="10" fill="#FF709F" r="20.25" />
            <defs>
              <clipPath id="bgblur_instagram" transform="translate(10 10)">
                <circle cx="20.25" cy="20.25" r="20.25" />
              </clipPath>
            </defs>
          </svg>
          <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-[18px] h-[17px]">
            <svg class="block size-full" fill="none" preserveAspectRatio="none" viewBox="0 0 18 17">
              <path :d="svgPaths.p3ed1c880" fill="white" />
            </svg>
            <svg class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-[9px] h-[9px]" fill="none" preserveAspectRatio="none" viewBox="0 0 9 9">
              <path :d="svgPaths.p11863380" fill="white" />
            </svg>
            <svg class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-[3px] h-[3px]" fill="none" preserveAspectRatio="none" viewBox="0 0 3 3">
              <path :d="svgPaths.p20259280" fill="white" />
            </svg>
          </div>
        </button>

        <!-- Twitter Circle Button -->
        <button class="absolute left-[86.5px] size-[40.5px] top-[208px] p-0 border-none bg-transparent cursor-pointer hover:opacity-80 transition-opacity" aria-label="Follow us on Twitter" @click="openSocialMedia('twitter')">
          <svg class="block size-full" fill="none" preserveAspectRatio="none" viewBox="0 0 41 41">
            <foreignObject height="60.5" width="60.5" x="-10" y="-10">
              <div :style="{ backdropFilter: 'blur(5px)', clipPath: 'url(#bgblur_twitter)', height: '100%', width: '100%' }" xmlns="http://www.w3.org/1999/xhtml" />
            </foreignObject>
            <circle cx="20.25" cy="20.25" data-figma-bg-blur-radius="10" fill="#FF709F" r="20.25" />
            <defs>
              <clipPath id="bgblur_twitter" transform="translate(10 10)">
                <circle cx="20.25" cy="20.25" r="20.25" />
              </clipPath>
            </defs>
          </svg>
          <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-[18px] h-[14px]">
            <svg class="block size-full" fill="none" preserveAspectRatio="none" viewBox="0 0 18 14">
              <path :d="svgPaths.p3f39a00" fill="white" />
            </svg>
          </div>
        </button>

        <!-- Facebook Circle Button -->
        <button class="absolute left-[31px] size-[40.5px] top-[208px] p-0 border-none bg-transparent cursor-pointer hover:opacity-80 transition-opacity" aria-label="Follow us on Facebook" @click="openSocialMedia('facebook')">
          <svg class="block size-full" fill="none" preserveAspectRatio="none" viewBox="0 0 41 41">
            <foreignObject height="60.5" width="60.5" x="-10" y="-10">
              <div :style="{ backdropFilter: 'blur(5px)', clipPath: 'url(#bgblur_facebook)', height: '100%', width: '100%' }" xmlns="http://www.w3.org/1999/xhtml" />
            </foreignObject>
            <circle cx="20.25" cy="20.25" data-figma-bg-blur-radius="10" fill="#FF709F" r="20.25" />
            <defs>
              <clipPath id="bgblur_facebook" transform="translate(10 10)">
                <circle cx="20.25" cy="20.25" r="20.25" />
              </clipPath>
            </defs>
          </svg>
          <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-[10px] h-[20px]">
            <svg class="block size-full" fill="none" preserveAspectRatio="none" viewBox="0 0 10 20">
              <path :d="svgPaths.p1fc16200" fill="white" />
            </svg>
          </div>
        </button>
      </div>
      
      <!-- Logo and Brand -->
      <div class="absolute contents left-[30px] top-[42px]">
        <!-- Logo Background -->
        <div class="absolute left-[30px] size-[51.644px] top-[42px]">
          <svg class="block size-full" fill="none" preserveAspectRatio="none" viewBox="0 0 52 52">
            <path :d="svgPaths.p2ac67b80" fill="url(#paint0_linear_1_145)" />
            <defs>
              <linearGradient gradientUnits="userSpaceOnUse" id="paint0_linear_1_145" x1="25.822" x2="25.822" y1="0" y2="51.6441">
                <stop stop-color="#7223D8" />
                <stop offset="1" stop-color="#DD4C7B" />
              </linearGradient>
            </defs>
          </svg>
        </div>
        
        <!-- B Letter -->
        <div class="absolute h-[41.115px] left-[40.96px] top-[47.48px] w-[30.398px]">
          <svg class="block size-full" fill="none" preserveAspectRatio="none" viewBox="0 0 31 42">
            <path :d="svgPaths.p328d3c00" fill="white" />
          </svg>
        </div>
      </div>
      
      <!-- Bookly Text -->
      <div class="absolute contents left-[93.64px] top-[51.25px]">
        <div class="absolute h-[30.178px] left-[193.1px] top-[59.97px] w-[19.794px]">
          <svg class="block size-full" fill="none" preserveAspectRatio="none" viewBox="0 0 20 31">
            <path :d="svgPaths.pd47ed00" fill="#082F49" />
          </svg>
        </div>
        <div class="absolute h-[29.555px] left-[186.34px] top-[51.25px] w-[3.422px]">
          <svg class="block size-full" fill="none" preserveAspectRatio="none" viewBox="0 0 4 30">
            <path :d="svgPaths.p3cdbbd00" fill="#082F49" />
          </svg>
        </div>
        <div class="absolute h-[29.555px] left-[165.56px] top-[51.25px] w-[17.111px]">
          <svg class="block size-full" fill="none" preserveAspectRatio="none" viewBox="0 0 18 30">
            <path :d="svgPaths.p3a909800" fill="#082F49" />
          </svg>
        </div>
        <div class="absolute h-[21.622px] left-[140.85px] top-[59.58px] w-[19.289px]">
          <svg class="block size-full" fill="none" preserveAspectRatio="none" viewBox="0 0 20 22">
            <path :d="svgPaths.p22a48a00" fill="#082F49" />
          </svg>
        </div>
        <div class="absolute h-[21.622px] left-[117.31px] top-[59.58px] w-[19.289px]">
          <svg class="block size-full" fill="none" preserveAspectRatio="none" viewBox="0 0 20 22">
            <path :d="svgPaths.p10c2a6b0" fill="#082F49" />
          </svg>
        </div>
        <div class="absolute h-[27.767px] left-[93.64px] top-[53.04px] w-[19.405px]">
          <svg class="block size-full" fill="none" preserveAspectRatio="none" viewBox="0 0 20 28">
            <path :d="svgPaths.p39ff5d80" fill="#082F49" />
          </svg>
        </div>
      </div>
      
      <!-- Navigation Links - Column 1 -->
      <nav class="absolute flex flex-col font-['Inter:Regular','Noto_Sans_Arabic:Regular',sans-serif] font-normal justify-center leading-[40px] not-italic right-[373px] text-[16px] text-nowrap text-right text-sky-950 top-[108px] translate-y-[-50%] whitespace-pre">
        <a href="#about" class="mb-0 hover:text-primary transition-colors" dir="auto">عنا</a>
        <a href="#pricing" class="mb-0 hover:text-primary transition-colors" dir="auto">الاسعار</a>
        <a href="#api" class="hover:text-primary transition-colors" dir="auto">API الربط</a>
      </nav>

      <!-- Navigation Links - Column 2 -->
      <nav class="absolute flex flex-col font-['Inter:Regular','Noto_Sans_Arabic:Regular',sans-serif] font-normal justify-center leading-[40px] not-italic right-[198px] text-[16px] text-nowrap text-right text-sky-950 top-[108px] translate-y-[-50%] whitespace-pre">
        <a href="#terms" class="mb-0 hover:text-primary transition-colors" dir="auto">الشروط والأحكام</a>
        <a href="#privacy" class="mb-0 hover:text-primary transition-colors" dir="auto">السياسة</a>
        <a href="#try-free" class="hover:text-primary transition-colors" dir="auto">جربها مجانا</a>
      </nav>

      <!-- Navigation Links - Column 3 -->
      <nav class="absolute flex flex-col font-['Inter:Regular','Noto_Sans_Arabic:Regular',sans-serif] font-normal justify-center leading-[40px] not-italic right-[120px] text-[16px] text-nowrap text-right text-sky-950 top-[148px] translate-y-[-50%] whitespace-pre">
        <a href="#home" class="mb-0 hover:text-primary transition-colors" dir="auto">الرئيسية</a>
        <a href="#features" class="mb-0 hover:text-primary transition-colors" dir="auto">المميزات</a>
        <a href="#pricing" class="mb-0 hover:text-primary transition-colors" dir="auto">الباقات</a>
        <a href="#blog" class="mb-0 hover:text-primary transition-colors" dir="auto">Blog</a>
        <a href="#login" class="hover:text-primary transition-colors" dir="auto">تسجيل الدخول</a>
      </nav>
    </div>
  </div>
</template>

<script setup lang="ts">
const openSocialMedia = (platform: string) => {
  const urls: Record<string, string> = {
    facebook: 'https://facebook.com',
    twitter: 'https://twitter.com',
    instagram: 'https://instagram.com',
    youtube: 'https://youtube.com',
  }

  const url = urls[platform]
  if (url) {
    window.open(url, '_blank')
  }
}

const svgPaths = {
  p10c2a6b0: "M19.2889 10.7722C19.2889 12.5092 19.0555 14.0518 18.5889 15.4C18.1481 16.7222 17.5 17.85 16.6444 18.7833C15.8148 19.7166 14.7907 20.4296 13.5722 20.9222C12.3796 21.3889 11.0444 21.6222 9.56665 21.6222C8.19258 21.6222 6.92221 21.3889 5.75555 20.9222C4.58888 20.4296 3.57777 19.7166 2.72222 18.7833C1.86666 17.85 1.19259 16.7222 0.700001 15.4C0.233335 14.0518 0 12.5092 0 10.7722C0 8.4648 0.38889 6.52036 1.16667 4.93888C1.94444 3.33147 3.05925 2.11296 4.5111 1.28333C5.96295 0.427777 7.68703 0 9.68332 0C11.5759 0 13.2352 0.427777 14.6611 1.28333C16.1129 2.11296 17.2407 3.33147 18.0444 4.93888C18.874 6.52036 19.2889 8.4648 19.2889 10.7722ZM3.53888 10.7722C3.53888 12.4055 3.74629 13.8315 4.1611 15.05C4.60184 16.2426 5.27592 17.1629 6.18332 17.8111C7.09073 18.4592 8.24443 18.7833 9.64443 18.7833C11.0444 18.7833 12.1981 18.4592 13.1055 17.8111C14.0129 17.1629 14.674 16.2426 15.0889 15.05C15.5296 13.8315 15.75 12.4055 15.75 10.7722C15.75 9.11294 15.5296 7.69999 15.0889 6.53332C14.6481 5.36666 13.9741 4.47221 13.0666 3.84999C12.1852 3.20184 11.0315 2.87777 9.60554 2.87777C7.47962 2.87777 5.93703 3.57777 4.97777 4.97777C4.01851 6.37777 3.53888 8.30924 3.53888 10.7722Z",
  p11863380: "M4.43832 0C1.98804 0 0 1.92989 0 4.30879C0 6.68769 1.98804 8.61758 4.43832 8.61758C6.88873 8.61758 8.87663 6.68769 8.87663 4.30879C8.87663 1.92989 6.88873 0 4.43832 0ZM4.43832 7.1038C2.8487 7.1038 1.55929 5.85214 1.55929 4.30879C1.55929 2.76544 2.8487 1.51379 4.43832 1.51379C6.02806 1.51379 7.31734 2.76544 7.31734 4.30879C7.31734 5.85214 6.02806 7.1038 4.43832 7.1038V7.1038Z",
  p1fc16200: "M8.13356 3.20758H9.95014V0.13603C9.63673 0.0941748 8.55889 0 7.30362 0C4.68447 0 2.89027 1.59936 2.89027 4.5389V7.24421H0V10.678H2.89027V19.3179H6.43389V10.6788H9.20725L9.64751 7.24502H6.43306V4.87938C6.43389 3.88692 6.70915 3.20758 8.13356 3.20758V3.20758Z",
  p20259280: "M2.07242 1.0059C2.07242 1.5614 1.60847 2.01181 1.03614 2.01181C0.463951 2.01181 0 1.5614 0 1.0059C0 0.450283 0.463951 0 1.03614 0C1.60847 0 2.07242 0.450283 2.07242 1.0059V1.0059Z",
  p22a48a00: "M19.2889 10.7722C19.2889 12.5092 19.0555 14.0518 18.5889 15.4C18.1481 16.7222 17.5 17.85 16.6444 18.7833C15.8148 19.7166 14.7907 20.4296 13.5722 20.9222C12.3796 21.3889 11.0444 21.6222 9.56665 21.6222C8.19258 21.6222 6.92221 21.3889 5.75555 20.9222C4.58888 20.4296 3.57777 19.7166 2.72222 18.7833C1.86666 17.85 1.19259 16.7222 0.700001 15.4C0.233335 14.0518 0 12.5092 0 10.7722C0 8.4648 0.38889 6.52036 1.16667 4.93888C1.94444 3.33147 3.05925 2.11296 4.5111 1.28333C5.96295 0.427777 7.68703 0 9.68332 0C11.5759 0 13.2352 0.427777 14.6611 1.28333C16.1129 2.11296 17.2407 3.33147 18.0444 4.93888C18.874 6.52036 19.2889 8.4648 19.2889 10.7722ZM3.53889 10.7722C3.53889 12.4055 3.74629 13.8315 4.1611 15.05C4.60184 16.2426 5.27592 17.1629 6.18333 17.8111C7.09073 18.4592 8.24443 18.7833 9.64443 18.7833C11.0444 18.7833 12.1981 18.4592 13.1055 17.8111C14.0129 17.1629 14.674 16.2426 15.0889 15.05C15.5296 13.8315 15.75 12.4055 15.75 10.7722C15.75 9.11294 15.5296 7.69999 15.0889 6.53332C14.6481 5.36666 13.9741 4.47221 13.0666 3.84999C12.1852 3.20184 11.0315 2.87777 9.60554 2.87777C7.47962 2.87777 5.93703 3.57777 4.97777 4.97777C4.01852 6.37777 3.53889 8.30924 3.53889 10.7722Z",
  p2ac67b80: "M0 12.5198C0 5.60529 5.60529 0 12.5198 0H39.1243C46.0388 0 51.6441 5.60529 51.6441 12.5198V39.1243C51.6441 46.0388 46.0388 51.6441 39.1243 51.6441H12.5198C5.60529 51.6441 0 46.0388 0 39.1243V12.5198Z",
  p328d3c00: "M30.398 22.8861L30.3479 24.8392L27.5936 24.9394C27.1929 27.2764 26.5419 29.1627 25.6405 30.5983C24.7725 32.0339 23.3035 33.5864 21.2335 35.2557C19.1636 36.925 16.6763 38.3105 13.7717 39.4122C10.9005 40.5474 8.49675 41.1149 6.56036 41.1149C4.62397 41.1149 3.15498 40.7143 2.1534 39.913C1.15182 39.1452 0.651028 38.1269 0.651028 36.8582C0.651028 34.9218 1.78615 32.9854 4.05641 31.049C6.36004 29.0793 9.13109 27.4433 12.3695 26.1413C15.6414 24.8058 18.8798 23.9044 22.0849 23.437C21.5841 22.6024 20.8162 21.9179 19.7812 21.3838C18.7797 20.8496 17.0603 20.2486 14.6231 19.5809C13.2877 19.2137 12.6199 18.6127 12.6199 17.7781C12.6199 17.2773 12.8202 16.8266 13.2209 16.4259C13.6549 15.9919 14.356 15.4911 15.3242 14.9236C16.3258 14.3226 17.2606 13.7217 18.1286 13.1207C19.0301 12.4864 20.0149 11.7352 21.0833 10.8672C22.185 9.99912 23.1032 9.0977 23.8376 8.16289C24.5721 7.22808 24.9394 6.41012 24.9394 5.70901C24.9394 4.5405 24.3551 3.95625 23.1866 3.95625C22.2852 3.95625 21.0499 4.39027 19.4808 5.2583C17.945 6.09295 16.4259 7.178 14.9236 8.51344L12.7702 15.3242C11.2678 20.0984 9.59849 23.8043 7.76226 26.4418C5.95941 29.0793 4.24003 30.398 2.60411 30.398C0.868037 30.398 0 29.3296 0 27.1929C0 25.0562 1.03497 22.3353 3.1049 19.0301C5.17484 15.6914 8.04604 12.2694 11.7185 8.76384C11.7185 8.73045 11.802 8.42998 11.9689 7.86241C12.1692 7.26147 12.3528 6.66052 12.5198 6.05957C13.0873 4.25672 13.5214 3.1049 13.8218 2.60411L16.2757 3.00475C16.2757 3.63908 16.1422 4.39027 15.8751 5.2583C17.7447 3.85609 19.7145 2.6375 21.7844 1.60253C23.8877 0.534177 25.4235 0 26.3917 0C27.3933 0 28.1945 0.317167 28.7955 0.951502C29.3964 1.55245 29.6969 2.45388 29.6969 3.65577C29.6969 4.82428 29.1293 6.17642 27.9942 7.71218C26.8925 9.24794 25.5069 10.6335 23.8376 11.8687C20.7995 14.139 18.2121 15.7749 16.0754 16.7765C19.5475 17.3107 22.0849 18.0285 23.6874 18.9299C25.2899 19.7979 26.4584 21.1167 27.1929 22.8861H30.398ZM6.05957 24.038C8.39659 20.2653 9.94905 16.3926 10.7169 12.4196C8.91408 14.3894 7.27816 16.6429 5.80917 19.1803C4.34019 21.7176 3.60569 23.5539 3.60569 24.689C3.60569 25.3901 3.8394 25.7406 4.3068 25.7406C4.80759 25.7406 5.39185 25.1731 6.05957 24.038ZM17.6779 34.7549C19.3138 33.6531 20.6159 32.4179 21.5841 31.049C22.5523 29.6802 23.0364 28.3948 23.0364 27.1929C23.0364 26.6254 22.9529 26.0578 22.786 25.4903C17.7781 26.0912 13.6549 27.41 10.4164 29.4465C7.178 31.4497 5.55878 33.3694 5.55878 35.2056C5.55878 36.0069 5.87595 36.6412 6.51028 37.1086C7.14462 37.6094 8.01265 37.8598 9.11439 37.8598C11.8187 37.8598 14.6732 36.8248 17.6779 34.7549Z",
  p39ff5d80: "M7.93332 0C10.2407 0 12.1722 0.22037 13.7278 0.661111C15.3092 1.10185 16.4889 1.82778 17.2666 2.83888C18.0703 3.84999 18.4722 5.19814 18.4722 6.88332C18.4722 7.97221 18.2648 8.94443 17.85 9.79998C17.4611 10.6296 16.8648 11.3296 16.0611 11.9C15.2833 12.4444 14.324 12.8203 13.1833 13.0278V13.2222C14.35 13.4037 15.4 13.7407 16.3333 14.2333C17.2926 14.7259 18.0444 15.4259 18.5889 16.3333C19.1333 17.2407 19.4055 18.4203 19.4055 19.8722C19.4055 21.5574 19.0166 22.9963 18.2389 24.1888C17.4611 25.3555 16.3463 26.25 14.8944 26.8722C13.4685 27.4685 11.7574 27.7666 9.76109 27.7666H0V0H7.93332ZM8.63332 11.8222C11.0185 11.8222 12.6518 11.4463 13.5333 10.6944C14.4148 9.91665 14.8555 8.77591 14.8555 7.27221C14.8555 5.74258 14.3111 4.6537 13.2222 4.00555C12.1592 3.33148 10.4481 2.99444 8.08887 2.99444H3.49999V11.8222H8.63332ZM3.49999 14.7389V24.8111H9.09998C11.5629 24.8111 13.274 24.3314 14.2333 23.3722C15.1926 22.4129 15.6722 21.1555 15.6722 19.6C15.6722 18.6148 15.4518 17.7592 15.0111 17.0333C14.5963 16.3074 13.8833 15.75 12.8722 15.3611C11.887 14.9463 10.5389 14.7389 8.82776 14.7389H3.49999Z",
  p3a909800: "M3.38332 15.4389C3.38332 15.8537 3.3574 16.3981 3.30555 17.0722C3.27963 17.7463 3.2537 18.3296 3.22777 18.8222H3.38332C3.53888 18.6148 3.77222 18.3166 4.08333 17.9277C4.39444 17.5389 4.70555 17.15 5.01666 16.7611C5.35369 16.3463 5.63888 16.0092 5.87221 15.75L12.5222 8.7111H16.5277L8.08888 17.6166L17.1111 29.5555H12.9889L5.75554 19.8333L3.38332 21.8944V29.5555H0V0H3.38332V15.4389Z",
  p3cdbbd00: "M3.42221 29.5555H0V0H3.42221V29.5555Z",
  p3ed1c880: "M17.2301 4.93135C17.1896 4.04013 17.0412 3.42742 16.8285 2.8965C16.6091 2.33295 16.2716 1.82839 15.8294 1.40896C15.3974 0.982994 14.8742 0.652002 14.3005 0.442347C13.7504 0.235893 13.1226 0.0917717 12.2046 0.0524775C11.2797 0.00985553 10.9861 0 8.64037 0C6.29465 0 6.00104 0.00985553 5.07959 0.0491497C4.16158 0.0884439 3.53046 0.232693 2.98371 0.43902C2.40308 0.652002 1.88336 0.979666 1.45131 1.40896C1.01254 1.82839 0.671733 2.33627 0.455645 2.8933C0.242984 3.42742 0.0945304 4.0368 0.0540551 4.92803C0.0101518 5.8259 0 6.11095 0 8.38822C0 10.6655 0.0101518 10.9505 0.0506272 11.8451C0.0911026 12.7363 0.239688 13.349 0.452349 13.8799C0.671733 14.4435 1.01254 14.948 1.45131 15.3675C1.88336 15.7934 2.40651 16.1244 2.98028 16.3341C3.53046 16.5405 4.15815 16.6847 5.0763 16.724C5.99761 16.7634 6.29135 16.7731 8.63708 16.7731C10.9828 16.7731 11.2764 16.7634 12.1979 16.724C13.1159 16.6847 13.747 16.5405 14.2937 16.3341C15.4549 15.8983 16.3729 15.007 16.8218 13.8799C17.0343 13.3458 17.1829 12.7363 17.2234 11.8451C17.2639 10.9505 17.274 10.6655 17.274 8.38822C17.274 6.11095 17.2706 5.8259 17.2301 4.93135ZM15.6743 11.7795C15.6371 12.5987 15.4953 13.0411 15.3772 13.336C15.0869 14.0667 14.4895 14.6466 13.7368 14.9285C13.4331 15.0431 12.9741 15.1807 12.1336 15.2167C11.2224 15.2561 10.9491 15.2658 8.6438 15.2658C6.33855 15.2658 6.06181 15.2561 5.15382 15.2167C4.31003 15.1807 3.85439 15.0431 3.55063 14.9285C3.17606 14.7941 2.83512 14.5811 2.55839 14.3026C2.2715 14.0306 2.05211 13.7029 1.91368 13.3393C1.79555 13.0444 1.65382 12.5987 1.61677 11.7829C1.57617 10.8982 1.56615 10.6327 1.56615 8.39474C1.56615 6.15677 1.57617 5.88811 1.61677 5.00674C1.65382 4.18758 1.79555 3.74523 1.91368 3.45033C2.05211 3.08658 2.2715 2.75571 2.56181 2.48692C2.84185 2.20841 3.17936 1.99543 3.55405 1.86116C3.85782 1.74648 4.31689 1.60888 5.15725 1.57279C6.06854 1.5335 6.34198 1.52364 8.6471 1.52364C10.9558 1.52364 11.2291 1.5335 12.1371 1.57279C12.9809 1.60888 13.4365 1.74648 13.7403 1.86116C14.1148 1.99543 14.4558 2.20841 14.7325 2.48692C15.0194 2.75891 15.2388 3.08658 15.3772 3.45033C15.4953 3.74523 15.6371 4.19078 15.6743 5.00674C15.7147 5.89144 15.7249 6.15677 15.7249 8.39474C15.7249 10.6327 15.7147 10.8949 15.6743 11.7795Z",
  p3f39a00: "M17.1932 1.60551C16.5538 1.87779 15.8725 2.05826 15.1622 2.14589C15.893 1.72235 16.4507 1.05678 16.7129 0.254544C16.0316 0.648879 15.2794 0.927417 14.4777 1.08286C13.8308 0.414156 12.9089 0 11.9031 0C9.95163 0 8.3806 1.5377 8.3806 3.42279C8.3806 3.69402 8.40424 3.95482 8.46227 4.20311C5.53191 4.06436 2.93896 2.70088 1.19708 0.623842C0.892971 1.13606 0.714592 1.72235 0.714592 2.35349C0.714592 3.53858 1.34322 4.5891 2.28025 5.19729C1.71395 5.18686 1.15839 5.02725 0.687727 4.77583C0.687727 4.78627 0.687727 4.79983 0.687727 4.81339C0.687727 6.47627 1.90952 7.85749 3.51171 8.17567C3.2248 8.25182 2.9121 8.28833 2.58757 8.28833C2.36191 8.28833 2.1341 8.27582 1.92026 8.22991C2.37696 9.58505 3.67289 10.5813 5.21383 10.6137C4.01461 11.5244 2.49194 12.0731 0.843541 12.0731C0.55448 12.0731 0.27724 12.0606 0 12.0262C1.56136 13.0037 3.41177 13.5618 5.40726 13.5618C11.8934 13.5618 15.4395 8.34571 15.4395 3.82442C15.4395 3.67316 15.4341 3.52711 15.4266 3.3821C16.1261 2.90013 16.7139 2.2982 17.1932 1.60551Z",
  p5c01e80: "M9.34298 13.1101C9.34141 13.1101 9.3397 13.1101 9.33799 13.1101C8.77412 13.1064 3.7892 13.0622 2.37687 12.6914C1.38984 12.4338 0.610675 11.6782 0.344634 10.7199C-0.0249147 9.37299 -0.00139018 6.77984 0.00117613 6.57278C-0.00124761 6.36668 -0.0250573 3.75208 0.343494 2.39411C0.343921 2.39287 0.344207 2.39148 0.344634 2.39024C0.607681 1.44281 1.40438 0.663825 2.37445 0.405548C2.37687 0.404855 2.37944 0.404302 2.38186 0.40361C3.77822 0.047337 8.77298 0.00373714 9.33799 0H9.34811C9.91342 0.00373714 14.9116 0.0478906 16.3109 0.41925C17.2954 0.676143 18.074 1.43077 18.3408 2.38789C18.7241 3.74682 18.6886 6.3671 18.6848 6.58828C18.6875 6.80614 18.7099 9.37604 18.3425 10.7297C18.3422 10.7311 18.3418 10.7323 18.3415 10.7336C18.0753 11.6919 17.2963 12.4475 16.3081 12.7054C16.3068 12.7058 16.3054 12.7061 16.3041 12.7065C14.9079 13.0626 9.91299 13.1062 9.34811 13.1101C9.3464 13.1101 9.34469 13.1101 9.34298 13.1101V13.1101ZM1.75468 2.75758C1.43018 3.95623 1.46084 6.53748 1.46112 6.5635V6.58219C1.45143 7.29806 1.4855 9.37119 1.75482 10.3531C1.88542 10.8233 2.26965 11.1957 2.75697 11.3229C3.79903 11.5966 7.85908 11.6827 9.34298 11.6928C10.8307 11.6827 14.8968 11.5989 15.9311 11.3362C16.4169 11.2086 16.7998 10.8374 16.9313 10.3667C17.2009 9.37036 17.2347 7.30733 17.2248 6.59603C17.2248 6.58856 17.2248 6.58108 17.225 6.57361C17.2384 5.84916 17.212 3.7518 16.9326 2.76201C16.9323 2.76105 16.932 2.76008 16.9319 2.75911C16.8007 2.28685 16.4163 1.91438 15.929 1.78718C14.8971 1.51326 10.8304 1.42744 9.34298 1.41734C7.85623 1.42744 3.79419 1.51105 2.75668 1.77347C2.27864 1.9022 1.88571 2.28795 1.75468 2.75758V2.75758ZM17.6366 10.5492H17.637H17.6366ZM7.48226 9.42504V3.68495L12.5921 6.55506L7.48226 9.42504Z",
  pd47ed00: "M0 0H3.65555L8.16666 11.8611C8.42592 12.5611 8.65925 13.2352 8.86666 13.8833C9.09999 14.5315 9.30739 15.1666 9.48887 15.7889C9.67035 16.3852 9.81294 16.9685 9.91665 17.5389H10.0722C10.2278 16.8907 10.4741 16.0481 10.8111 15.0111C11.1481 13.9481 11.4981 12.8852 11.8611 11.8222L16.1 0H19.7944L10.8111 23.7222C10.3185 25.0185 9.73517 26.1462 9.06109 27.1055C8.41295 28.0907 7.60925 28.8425 6.64999 29.3611C5.71666 29.9055 4.57592 30.1777 3.22777 30.1777C2.60555 30.1777 2.06112 30.1388 1.59445 30.0611C1.12778 30.0092 0.725927 29.9444 0.388891 29.8666V27.1444C0.674076 27.1962 1.01111 27.2481 1.4 27.3C1.81482 27.3518 2.24259 27.3777 2.68333 27.3777C3.48703 27.3777 4.17407 27.2222 4.74444 26.9111C5.34074 26.6259 5.84629 26.1981 6.2611 25.6277C6.67592 25.0833 7.02592 24.4351 7.31111 23.6833L8.39999 20.9222L0 0Z"
}
</script>

<style scoped>
a {
  text-decoration: none;
  color: inherit;
}

button {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  font-family: inherit;
}

button:focus-visible {
  outline: 2px solid #7223D8;
  outline-offset: 2px;
}
</style>
