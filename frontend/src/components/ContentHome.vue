<template>
    
   <div>
     <Banner />
    <div id="beneficios">
    <BannerAux :url_img="links[0]" />
    </div>
    <BannerImgTextVue id="rastreador" :url_img="DadosImgTexto1" bg_color="azul " color="branco"/>
    <BannerWpp :wpp="wpp"/>
    <BannerImgTextVue id="sobre" :url_img="DadosImgTexto2" bg_color="branco" color="primary-color"/>
    
        <!--         <BannerAux :url_img="links[1]" /> -->
        <!-- <BannerAux :url_img="links[2]" />
        <BannerAux :url_img="links[3]" />
     -->
   </div>
    
</template>

<script>
import Banner from '@/components/Banner.vue';
import BannerAux from '@/components/BannerAux.vue';
import BannerImgTextVue from '@/components/BannerImgText.vue';
import BannerWpp from '@/components/BannerWpp.vue';

export default {
    name: 'ContentHome',
    data() {
  const contentHomePath = "./assets/contentHome/";

  return {
    links: [
      [`${contentHomePath}beneficios/1.png`, `${contentHomePath}beneficios/2.png`, `${contentHomePath}beneficios/3.png`, `${contentHomePath}beneficios/4.png`],
    ],
    DadosImgTexto1: {
      img: [`${contentHomePath}rastrear/restre.png`],
      icons_Text: [
        [`${contentHomePath}rastrear/s1.svg`, "Você protege seu veículo por preços acessíveis."],
        [`${contentHomePath}rastrear/s2.svg`, "98% dos veículos furtados com rastreador são recuperados."],
        [`${contentHomePath}rastrear/s3.svg`, "Rastrear é muito mais barato do que comprar um carro novo."],
      ]
    },
    DadosImgTexto2: {
      img: [`${contentHomePath}laranja/LARANJA1.png`],
      icons_Text: [
        [`${contentHomePath}laranja/wifi.svg`, "Localização dos veículos no mapa em tempo real."],
        [`${contentHomePath}laranja/hand.svg`, "Status de Ignição."],
        [`${contentHomePath}laranja/pic.svg`, "Foto da localização dos veículos em tempo real."],
      ],
      icons_Text_bg: `${contentHomePath}laranja/LAR3.png`
    },
    wpp: '32988834442',
  };
},
    components: {
        Banner,
        BannerAux,
        BannerImgTextVue,
        BannerWpp
    }
}
</script>

<style scoped>
div {
    margin: 0 !important;
    padding: 0 !important;
    box-sizing: border-box;
    min-width: 100vw;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

.textContent h1{
    color: black;
}
</style>