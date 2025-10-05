<template> 
   <div :class="$style.rectangleParent"> 
     <div :class="$style.groupChild">
       <!-- Logo and branding at the top -->
       <div :class="$style.booklyParent"> 
         <img :class="$style.booklyIcon" alt="" /> 
         <img :class="$style.groupItem" alt="" /> 
       </div>
       <img :class="$style.groupInner" alt="" />
       
       <!-- All links inside the existing gradient rectangle -->
       <div :class="$style.linksContainer">
         <div :class="$style.linkColumn">
           <p :class="$style.p"><a href="#" :class="$style.link">عنا</a></p> 
           <p :class="$style.p"><a href="#" :class="$style.link">الاسعار</a></p> 
           <p :class="$style.p"><a href="#" :class="$style.link">API الربط</a></p>
         </div>
         
         <div :class="$style.linkColumn">
           <p :class="$style.p"><a href="#" :class="$style.link">الرئيسية</a></p> 
           <p :class="$style.p"><a href="#" :class="$style.link">المميزات</a></p> 
           <p :class="$style.p"><a href="#" :class="$style.link">الباقات</a></p> 
           <p :class="$style.p"><a href="#" :class="$style.link">Blog</a></p> 
           <p :class="$style.p"><a href="#" :class="$style.link">تسجيل الدخول</a></p>
         </div>
         
         <div :class="$style.linkColumn">
           <p :class="$style.p"><a href="#" :class="$style.link">الشروط والأحكام</a></p> 
           <p :class="$style.p"><a href="#" :class="$style.link">السياسة</a></p> 
           <p :class="$style.p"><a href="#" :class="$style.link">جربها مجانا</a></p>
         </div>
       </div>
       
       <div :class="$style.copyright2025All"><a href="#" :class="$style.link">Copyright @2025. All right reserved by Bookly.</a></div>
     </div> 
   </div> 
</template>

<script setup lang="ts">
// No script needed for this component
</script>

<style module>
.rectangleParent { 
   width: 100%; 
   position: relative; 
   height: 369px; 
   text-align: right; 
   font-size: 16px; 
   color: #082f49; 
   font-family: Inter;
   display: flex;
   justify-content: center;
} 
.groupChild { 
   position: relative; 
   border-radius: 24px; 
   background: linear-gradient(100.19deg, rgba(244, 235, 255, 0.8), rgba(253, 238, 231, 0.8)); 
   border: 1px solid rgba(114, 35, 216, 0.3); 
   box-sizing: border-box; 
   width: 1160px; 
   height: 369px; 
   display: flex;
   flex-direction: column;
   align-items: flex-start;
   justify-content: space-between;
   padding: 30px 30px 20px;
   position: relative;
} 
.p { 
   margin: 0; 
} 
.link {
   text-decoration: none;
   color: inherit;
   cursor: pointer;
   transition: color 0.2s ease;
}
.link:hover {
   color: #7223D8;
}
.booklyParent { 
   position: relative; 
   width: 182.9px; 
   height: 51.6px; 
   align-self: flex-start;
   margin-left: 30px;
} 
.booklyIcon { 
   position: absolute; 
   top: 9.25px; 
   left: 63.64px; 
   width: 119.2px; 
   height: 38.9px; 
} 
.groupItem { 
   position: absolute; 
   top: 0px; 
   left: 0px; 
   width: 51.6px; 
   height: 51.6px; 
} 
.copyright2025All { 
   position: absolute; 
   bottom: 20px; 
   right: 30px; 
   font-size: 12px; 
   line-height: 24px; 
   color: rgba(8, 47, 73, 0.5); 
   text-align: left; 
} 
.groupInner { 
   position: relative; 
   width: 207px; 
   height: 40.5px; 
   align-self: flex-start;
   margin-left: 30px;
   margin-top: 20px;
} 
.linksContainer {
   display: flex;
   justify-content: flex-start;
   width: 70%;
   max-width: 800px;
   align-self: flex-start;
   margin-left: 30px;
}
.linkColumn {
   line-height: 40px;
   margin: 0 15px 0 0;
}
</style>
