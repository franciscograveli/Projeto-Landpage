<script setup>
import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
  <div id="main">
    <RouterView />
  </div>
</template>

<style>
:root{
  --font-color: #111;
  --primary-color: #111;
  --secondary-color: #fff;
  --dark-color: #333;
}

*{
  margin: 0 !important;
  padding: 0 !important;
  box-sizing: border-box;
  font-family: 'Roboto', sans-serif;
}
#app{
  min-width: 100vw;
  min-height: 100vh;
  overflow-x: hidden;
  overflow-y: auto;
  margin: 0 !important;
  padding: 0 !important;
}

#main{
  min-width: 100vw;
  min-height: 100vh;
}

a{
  text-decoration: none;
}
</style>
