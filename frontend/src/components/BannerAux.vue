<template>
    <div id="Banner" class="d-flex-center">
        <div class="img">
            <img :src="url_img" alt="Imagem de uma casa bem avaliada">
            <Forms />
        </div>
    </div>
</template>

<script>

export default {
    name: 'BannerAux',
    props: {
        url_img: {
            type: String
        }
    }
}

</script>


<style scoped>

#Banner{
    top: 0;
    left: 0;
    width: 100%;
    /* height: 100vh; */
}

@media (min-width: 790px) {
    #Banner{
        margin-top: 10vh;
    }
}
  

#TopCasas{
    position: absolute;
    top: 50%;
    left: 0;
    transform: translate(0, -50%);
    color: var(--white);
    font-size: 50px;
    font-weight: bold;
    text-align: center;
    width: 30%;
    min-width: 400px;
    height: 200px;
    background-color: rgba(0, 0, 0, 0.756);
    border-radius: 0 1rem 1rem 0rem;

}
.img{
    width: 100%;
}
img{
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
}

@media screen and (max-width: 600px) {
    #TopCasas{
        width: 100% !important;
    }
}

</style>