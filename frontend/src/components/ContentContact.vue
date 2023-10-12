<template>
    <div id="content">
    <FormContact />
  </div>
</template>

<script>
import Banner from '@/components/Banner.vue';
import FormContact from '@/components/FormContact.vue';

export default {
    name: 'ContentContact',
    components: {
        Banner,
        FormContact
    }
}
</script>

<style scoped>
#content{
    min-width: 100vw;
    min-height: 100vh;
background: rgb(0,11,42);
background: -moz-linear-gradient(0deg, rgba(0,11,42,0.980357108663778) 0%, rgba(250,250,250,1) 19%, rgba(250,250,250,1) 53%, rgba(250,250,250,1) 100%);
background: -webkit-linear-gradient(0deg, rgba(0,11,42,0.980357108663778) 0%, rgba(250,250,250,1) 19%, rgba(250,250,250,1) 53%, rgba(250,250,250,1) 100%);
background: linear-gradient(0deg, rgba(0,11,42,0.980357108663778) 0%, rgba(250,250,250,1) 19%, rgba(250,250,250,1) 53%, rgba(250,250,250,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#000b2a",endColorstr="#fafafa",GradientType=1);}
</style>