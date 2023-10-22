<template>
    <div class="container">
            <img @click="downloadRatreador()" src="./../../public/assets/img/mobileDownload/GooglePlay.svg" alt="" id="GooglePlay">
    </div>
</template>

<script>
export default {
    name: 'GooglePlay',
    methods: {
        downloadRatreador() {
            window.open('https://play.google.com/store/apps/details?id=com.gigabens.monitoramento.app&pli=1', '_blank');
        }
    }
}
</script>

<style scoped>

.container {
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

#GooglePlay {
    width: 70% !important;
    cursor: pointer;
}
@media (max-width: 1024px) {
    #GooglePlay {
    padding: 2rem 0;
    width: 150px !important;
}
}

</style>