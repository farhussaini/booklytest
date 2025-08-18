<template>
  <div>
    <!-- Background blur effects -->
    <div class="absolute -left-56 top-48 w-80 h-80 blur-background-yellow rounded-3xl transform -rotate-45 blur-50 animate-float"></div>
    <div class="absolute -right-40 bottom-0 w-80 h-80 blur-background-purple rounded-3xl transform rotate-45 blur-50 animate-float animation-delay-300"></div>
  </div>
</template>

<style scoped>
.blur-background-purple {
  background: rgba(93, 76, 221, 0.50);
  filter: blur(50px);
}

.blur-background-yellow {
  background: rgba(234, 194, 75, 0.50);
  filter: blur(50px);
}

@keyframes float-gentle {
  0%, 100% {
    transform: translateY(0px) rotate(0deg) scale(1);
  }
  33% {
    transform: translateY(-15px) rotate(1deg) scale(1.05);
  }
  66% {
    transform: translateY(-5px) rotate(-1deg) scale(0.95);
  }
}

.animate-float {
  animation: float-gentle 6s ease-in-out infinite;
}

.animation-delay-300 {
  animation-delay: 0.3s;
}
</style>
