<template>
    
   <div>
     <Banner />
    <BannerAux :url_img="link2"/>
    <BannerAux :url_img="link3"/>
    <BannerAux :url_img="link4"/>
    <BannerAux :url_img="link5"/>
    
   </div>
    
</template>

<script>
import Banner from '@/components/Banner.vue';
import BannerAux from '@/components/BannerAux.vue';

export default {
    name: 'ContentHome',
    data() {
        return {
            link2: "./../src/assets/img/banners/2.jpeg",
            link3: "./../src/assets/img/banners/3.jpeg",
            link4: "./../src/assets/img/banners/4.jpeg",
            link5: "./../src/assets/img/banners/5.jpeg"
        }
    },
    components: {
        Banner,
        BannerAux
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
</style>