<template>
    <div class="marquee-container" ref="marqueeContainer">
      <div class="marquee" ref="marquee">
        <span>{{ text }}</span>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref, onMounted } from 'vue';
  
  const text = ref("Your scrolling text goes here!");
  
  onMounted(() => {
    startMarquee();
  });
  
  const startMarquee = () => {
    const marqueeContainer = marqueeContainerRef.value;
    const marquee = marqueeRef.value;
    const containerWidth = marqueeContainer.clientWidth;
    const contentWidth = marquee.clientWidth;
    const animationDuration = (contentWidth / containerWidth) * 10;
  
    marquee.style.animationDuration = `${animationDuration}s`;
  };
  
  const marqueeContainerRef = ref(null);
  const marqueeRef = ref(null);
  </script>
  
  <style scoped>
  .marquee-container {
    overflow: hidden;
    white-space: nowrap;
  }
  
  .marquee {
    display: inline-block;
    animation: marqueeAnimation linear infinite;
  }
  
  @keyframes marqueeAnimation {
    0% {
      transform: translateX(100%);
    }
    100% {
      transform: translateX(-100%);
    }
  }
  </style>
  