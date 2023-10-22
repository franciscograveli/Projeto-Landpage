<template>
  <div class="home" >
    <VueNavUI  :navLinks="navLinks" :navConfig="navConfig" :btnConfig="btnConfig">
      <img class="img" src="./../../public/assets/img/logo/logo.png" alt="" srcset="" id="logo"/>
    </VueNavUI>
  </div>
</template>

<script lang="ts">
import { defineComponent, ref } from "vue";
import VueNavUI from "vue-nav-ui";
//import { Nav } from "../components";

export default defineComponent({
  name: "Navbar",
  data() {
    return {
      url_logo: "./../../public/assets/img/logo/logo.png",
    }
  },
  components: {
    VueNavUI,
    //Nav,
  },
  setup() {
    const navLinks = ref([
      {
        name: "INICIO",
        path: "/",
      },
      {
        name: "SOBRE",
        path: "/about",
      },
      {
        name: "SERVIÇOS",
        path: "/servicos",
      },
      {
        name: "RASTREAMENTO",
        path: "/rastreador",
      },
      {
        name: "CONTATO",
        path: "/contato",
      },
    ]);
    const navConfig = ref({
      whitespace: false,
      navBg: "#fafafa",
      navBorderRadius: "0",
      linkFont: "poppins, sans-serif",
      linkColor: "#143968",
      responsivePosition: "top",
    });

    const btnConfig = ref({
      btnLink: true,
      btnUrl: "https://www.linkedin.com/in/francisco-carlos-609192142/",
      btnText: "Area do Cliente",
      btnBg: "#002289",
      btnTextColor: "white",
      btnBorderWidth: "0px",
      btnBorderColor: "#FF7F00",
      btnBorderRadius: "10px",
    });

    return { navLinks, btnConfig, navConfig };
  },
  methods: {
   scrollNav() {
        const elements = document.getElementsByClassName('nav');
        const elements2 = document.getElementsByClassName('img');
        const elements3 = document.getElementsByClassName('link');
        
        window.addEventListener('scroll', function() {
            for (let i = 0; i < elements.length; i++) {
                if (window.scrollY > 100) {
                    elements3[i].style.color = "#fafafa !important";
                    elements2[i].style.height = "40px";
                    elements[i].style.padding = "10px";
                    elements[i].style.background = "#fafafa11";
                    elements[i].style.width = "100vw !important"; // Adicione a classe de animação
                    elements[i].classList.add('nav-scrolling'); // Adicione a classe de animação
                } else {
                    elements2[i].style.height = ""; // Volta ao estilo original
                    elements[i].style.padding = ""; // Volta ao estilo original
                    elements[i].style.background = ""; // Volta ao estilo original
                    elements[i].classList.remove('nav-scrolling'); // Remova a classe de animação
                }
            }
            
            console.log("A página foi rolada!");
        });
    }
  },
  created(){
    this.scrollNav();
  }
});
</script>
<style scoped>
*, .links{
  z-index: 2 !important;
}
.link:hover{
    color: #f7931d !important;
}
.home {
    position: fixed;
  top: 0;
  left: 0;
  right: 0;
}
.img {
    padding: 0rem 0;
    width: auto;
  height: 100px;
  align-self: flex-end;
  transition: .5s ease all;
}
@media (max-width: 790px) {
  .img{
    height: 60px;
  }
}


</style>