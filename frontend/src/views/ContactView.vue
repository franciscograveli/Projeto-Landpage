<template>
    <div id="content">
    <ContentContact />
  </div>
</template>
<script setup>
import ContentContact from '@/components/ContentContact.vue';
</script>

<style scoped>
#content {
  min-width: 100vw;
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
}


@media (min-width: 1024px) {
  .about {
    min-height: 100vh;
    display: flex;
    align-items: center;
  }
}
</style>
