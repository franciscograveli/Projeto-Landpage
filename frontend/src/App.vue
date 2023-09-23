<script setup>
import { RouterLink, RouterView } from 'vue-router'
import Navbar from './components/Navbar.vue'
import Footer from './components/Footer.vue'


</script>

<template>
  <div id="main">
    <Navbar />
    <RouterView />
    <Footer />
  </div>
</template>

<style>
:root{
  --azul: #002289;
  --azul-footer: #000b2a;
  --laranja: #FF7F00;
  --branco: #fafafa;
  --font-color: #111;
  --primary-color: #111;
  --secondary-color: #fff;
  --dark-color: #333;
  --cinza-footer: #857f7f;
}

#app{
  min-width: 100vw;
  min-height: 100vh;
  overflow-x: hidden;
  overflow-y: auto;
  margin: 0 !important;
  padding: 0 !important;
  background-color: var(--branco);
}

#main{
  min-width: 100vw;
  min-height: 100vh;
  display: flex;
  flex-direction: column;
}

a, a:hover{
  text-decoration: none;
  background-color: transparent;
}

/* Navbar */
.link{
  font-size: 1rem;
  font-weight: 500;
}
.link:hover{
  color: #f7931d !important;
}
button{
  box-shadow: 1px 1px 5px #333333bc !important;
  transition: .5s ease all !important;
}
button:hover{
   box-shadow: 2px 2px 7px #333 !important;
  color: #FF7F00 !important;
  transition: .5s ease all !important;
  transform: translate(-3px, -3px) !important;
  /* border-width: 1px !important; */
}

@media (max-width: 790px) {
  .links{
    align-items: center !important;
    justify-content: center !important;
    width: 80vw !important;
    height: 80vh;
  }
}
@media (min-width: 1024px) {
  .home{
  background-color: var(--branco);
  min-width: 100vw !important;
  transition: .3s ease all !important;
}

}


/*  */
</style>
