<template>
  <section id="pricing" :class="$style.maskGroup">
    <!-- Mobile/Tablet responsive layout -->
    <div class="block lg:hidden w-full">
      <div class="container mx-auto px-4 py-16">
        <SectionHeader
          title="الأسعار والباقات"
          subtitle="اختر الباقة المناسب�� لاحتياجاتك وابدأ رحلتك معنا اليوم"
        />
        <div class="grid gap-8 sm:grid-cols-2">
          <PricingCard
            v-for="plan in pricingPlans"
            :key="plan.id"
            :plan="plan"
            @select="$emit('selectPlan', plan.id)"
          />
        </div>
      </div>
    </div>

    <!-- Desktop layout (absolute design) -->
    <div class="hidden lg:block">
      <div :class="$style.maskGroupChild" />
      <div :class="$style.maskGroupItem" />

      <div :class="$style.rectangleParent">
        <div :class="$style.groupChild" />
        <div :class="$style.groupItem" />

        <!-- Left card (الباقة المخصصة) -->
        <div :class="$style.rectangleGroup">
          <div :class="$style.groupInner" />
          <div :class="$style.rectangleDiv" />
          <div :class="$style.rectangleContainer">
            <div :class="$style.maskGroupGroupChild" />
            <div :class="$style.div">اشترك الآن</div>
          </div>
          <div :class="$style.maskGroupDiv">
            <p :class="$style.p">شامل لجميع الخدمات للباقات </p>
            <p :class="$style.p">الأخرى بالإضافة إلى طلبات </p>
            <p :class="$style.p">العميل الخاصة</p>
          </div>
          <div :class="$style.div2">خدمات مميزة</div>
          <div :class="$style.div3">الباقة المخصصة</div>
        </div>

        <!-- Middle card (الباقة المميزة) -->
        <div :class="$style.groupDiv">
          <div :class="$style.groupChild2" />
          <div :class="$style.groupChild3" />
          <div :class="$style.maskGroupRectangleParent">
            <div :class="$style.maskGroupGroupChild" />
            <div :class="$style.div">اشترك الآن</div>
          </div>
          <div :class="$style.rectangleParent2">
            <div :class="$style.groupChild5" />
            <div :class="$style.div5">جدولة مواعيد الحجوزات أونلاين</div>
            <div :class="$style.groupChild6" />
            <div :class="$style.div6">الرسائل والشعارات</div>
            <div :class="$style.groupChild7" />
            <div :class="$style.groupChild8" />
            <div :class="$style.div7">فواتير أونلاين</div>
            <div :class="$style.groupChild9" />
            <div :class="$style.groupChild10" />
            <div :class="$style.div8">عدد 3 فروع</div>
            <div :class="$style.div9">اسم موقع مخصص للشركة</div>
            <div :class="$style.groupChild11" />
            <div :class="$style.api">API الربط</div>
          </div>
          <div :class="$style.div10">مناسب للشركات الناشئة والمتوسطة</div>
          <div :class="$style.div11">1999ريال/ سنويا</div>
          <div :class="$style.div12">الباقة المميزة</div>
        </div>

        <!-- Right card (الباقة الأولى) -->
        <div :class="$style.rectangleParent3">
          <div :class="$style.groupInner" />
          <div :class="$style.groupChild13" />
          <div :class="$style.rectangleParent4">
            <div :class="$style.groupChild14" />
            <div :class="$style.div">اشترك الآن</div>
          </div>
          <div :class="$style.rectangleParent5">
            <div :class="$style.groupChild5" />
            <div :class="$style.div5">عدد لا محدود من المستخدمين</div>
            <div :class="$style.groupChild16" />
            <div :class="$style.div15">حجوزات غير محدودة</div>
            <div :class="$style.groupChild17" />
            <div :class="$style.groupChild18" />
            <div :class="$style.div16">عدد لا محدد من مزودي الخدمة</div>
            <div :class="$style.groupChild19" />
            <div :class="$style.div17">فواتير أونلاين</div>
            <div :class="$style.groupChild20" />
            <div :class="$style.div18">استقبال المدفوعات</div>
          </div>
          <div :class="$style.div19">مناسب للأفراد</div>
          <div :class="$style.div20">999 ريال/ سنويا</div>
          <div :class="$style.div21">الباقة الأولى</div>
        </div>
      </div>

      <!-- Desktop heading centered -->
      <div :class="$style.maskGroupInner">
        <div :class="$style.wrapper">
          <b :class="$style.b">الأسعار والباقات </b>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
import SectionHeader from '@/components/UI/SectionHeader.vue'
import PricingCard from '@/components/UI/PricingCard.vue'
import type { PricingPlan } from '@/types/pricing'

defineEmits<{ selectPlan: [planId: string] }>()

const pricingPlans: PricingPlan[] = [
  {
    id: 'custom',
    name: 'الباقة المخصصة',
    price: 'خدمات مميزة',
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
}
.groupChild {
  position: absolute;
  top: 0px;
  left: calc(50% - 580px);
  border-radius: 32px;
  background-color: rgba(255, 247, 250, 0.5);
  width: 1160px;
  height: 671px;
  mix-blend-mode: multiply;
}
.groupItem {
  position: absolute;
  top: 0px;
  left: calc(50% - 580px);
  border-radius: 32px;
  background-color: rgba(255, 247, 250, 0.63);
  border: 1px solid rgba(255, 187, 209, 0.5);
  box-sizing: border-box;
  width: 1160px;
  height: 671px;
  mix-blend-mode: multiply;
}
.rectangleGroup {
  position: absolute;
  top: 112px;
  left: 138px;
  width: 273px;
  height: 445px;
  font-size: 15px;
}
.groupInner {
  position: absolute;
  top: 65px;
  left: 0px;
  filter: blur(80px);
  border-radius: 14px;
  background-color: #ffc6c6;
  width: 273px;
  height: 380px;
}
.rectangleDiv {
  position: absolute;
  top: 0px;
  left: 0px;
  border-radius: 20px;
  background-color: #fff;
  width: 273px;
  height: 419px;
}
.rectangleContainer {
  position: absolute;
  top: 329px;
  left: 36px;
  width: 201.9px;
  height: 58px;
  font-size: 14px;
}
.maskGroupGroupChild {
  position: absolute;
  top: 0px;
  left: 0px;
  border-radius: 10px;
  background-color: #fff;
  border: 1px solid #dd4c7b;
  box-sizing: border-box;
  width: 201.9px;
  height: 58px;
}
.div {
  position: absolute;
  top: 20px;
  left: 66px;
  font-weight: 600;
}
.maskGroupDiv {
  position: absolute;
  top: 146px;
  left: 29px;
  letter-spacing: 0.05em;
  line-height: 121.29%;
  color: #000;
  display: inline-block;
  width: 216px;
  height: 73px;
}
.p { margin: 0; }
.div2 { position: absolute; top: 71px; left: 92px; font-weight: 600; text-align: left; }
.div3 { position: absolute; top: 24px; left: 53px; font-size: 24px; font-weight: 600; color: #082f49; text-align: right; }

.groupDiv { position: absolute; top: 112px; left: 443px; width: 274px; height: 445px; }
.groupChild2 { position: absolute; top: 65px; left: 0px; filter: blur(80px); border-radius: 14px; background-color: #ffc6c6; width: 274px; height: 380px; }
.groupChild3 { position: absolute; top: 0px; left: 0px; border-radius: 20px; background-color: #fff; width: 274px; height: 419px; }
.maskGroupRectangleParent { position: absolute; top: 329px; left: 36px; width: 201.9px; height: 58px; }

.rectangleParent2 { position: absolute; top: 131px; left: 51px; width: 203px; height: 171px; text-align: right; font-size: 12px; color: #082f49; }
.groupChild5 { position: absolute; top: 8px; left: 197px; border-radius: 500px; background-color: rgba(8,47,73,0.43); width: 6px; height: 6px; }
.div5 { position: absolute; top: 0px; left: 0px; line-height: 17px; display: flex; align-items: center; width: 191px; }
.groupChild6 { position: absolute; top: 33px; left: 197px; border-radius: 500px; background-color: rgba(8,47,73,0.43); width: 6px; height: 6px; }
.div6 { position: absolute; top: 26px; left: 0px; line-height: 17px; display: flex; align-items: center; width: 191px; }
.groupChild7 { position: absolute; top: 58px; left: 197px; border-radius: 500px; background-color: rgba(8,47,73,0.43); width: 6px; height: 6px; }
.groupChild8 { position: absolute; top: 83px; left: 197px; border-radius: 500px; background-color: rgba(8,47,73,0.43); width: 6px; height: 6px; }
.div7 { position: absolute; top: 52px; left: 0px; line-height: 17px; display: flex; align-items: center; width: 191px; }
.groupChild9 { position: absolute; top: 108px; left: 197px; border-radius: 500px; background-color: rgba(8,47,73,0.43); width: 6px; height: 6px; }
.groupChild10 { position: absolute; top: 135px; left: 197px; border-radius: 500px; background-color: rgba(8,47,73,0.43); width: 6px; height: 6px; }
.div8 { position: absolute; top: 102px; left: 0px; line-height: 17px; display: flex; align-items: center; width: 191px; }
.div9 { position: absolute; top: 128px; left: 0px; line-height: 17px; display: flex; align-items: center; width: 191px; }
.groupChild11 { position: absolute; top: 161px; left: 197px; border-radius: 500px; background-color: rgba(8,47,73,0.43); width: 6px; height: 6px; }
.api { position: absolute; top: 154px; left: 0px; line-height: 17px; display: flex; align-items: center; width: 191px; }
.div10 { position: absolute; top: 96px; left: 74px; font-size: 10px; line-height: 17px; color: #000; text-align: right; }
.div11 { position: absolute; top: 71px; left: 91px; font-size: 15px; font-weight: 600; }
.div12 { position: absolute; top: 24px; left: 78px; font-size: 24px; font-weight: 600; color: #082f49; }

.rectangleParent3 { position: absolute; top: 112px; left: 749px; width: 273px; height: 445px; text-align: right; color: #fff; }
.groupChild13 { position: absolute; top: 0px; left: 0px; border-radius: 20px; background-color: #fff; border: 1.5px solid #7223d8; box-sizing: border-box; width: 273px; height: 419px; }
.rectangleParent4 { position: absolute; top: 329px; left: 36px; width: 201.9px; height: 58px; text-align: center; }
.groupChild14 { position: absolute; top: 0px; left: 0px; border-radius: 10px; background: linear-gradient(94.2deg, #7223d8, #dd4c7b); width: 201.9px; height: 58px; }

.rectangleParent5 { position: absolute; top: 136px; left: 32px; width: 203px; height: 179px; font-size: 12px; color: #0d0d0d; }
.groupChild16 { position: absolute; top: 37px; left: 197px; border-radius: 500px; background-color: rgba(8,47,73,0.43); width: 6px; height: 6px; }
.div15 { position: absolute; top: 30px; left: 0px; line-height: 17px; display: flex; align-items: center; width: 191px; }
.groupChild17 { position: absolute; top: 72px; left: 197px; border-radius: 500px; background-color: rgba(8,47,73,0.43); width: 6px; height: 6px; }
.groupChild18 { position: absolute; top: 106px; left: 197px; border-radius: 500px; background-color: rgba(8,47,73,0.43); width: 6px; height: 6px; }
.div16 { position: absolute; top: 66px; left: 0px; line-height: 17px; display: flex; align-items: center; width: 191px; }
.groupChild19 { position: absolute; top: 168px; left: 197px; border-radius: 500px; background-color: rgba(8,47,73,0.43); width: 6px; height: 6px; }
.div17 { position: absolute; top: 162px; left: 0px; line-height: 17px; display: flex; align-items: center; width: 191px; }
.groupChild20 { position: absolute; top: 139px; left: 197px; border-radius: 500px; background-color: rgba(8,47,73,0.43); width: 6px; height: 6px; }
.div18 { position: absolute; top: 99px; left: 95px; line-height: 17px; color: #000; }

.div19 { position: absolute; top: 96px; left: 108px; font-size: 10px; line-height: 17px; color: #000; }
.div20 { position: absolute; top: 70px; left: 83px; font-size: 15px; font-weight: 600; color: #dd4c7b; text-align: left; }
.div21 { position: absolute; top: 30px; left: 75px; font-size: 24px; font-weight: 600; background: linear-gradient(92.54deg, #7223d8, #dd4c7b); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }

.maskGroupInner { width: 505px; position: absolute; margin: 0 !important; top: 92px; left: 50%; transform: translateX(-50%); height: 48px; z-index: 3; font-size: 40px; text-align: center; }
.wrapper { position: absolute; top: 0px; left: 0px; width: 505px; display: flex; flex-direction: column; align-items: center; }
.b { align-self: stretch; position: relative; background: linear-gradient(90.25deg, #7223d8, #dd4c7b); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
</style>
