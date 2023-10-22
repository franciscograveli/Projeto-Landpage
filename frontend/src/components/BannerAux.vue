<template>
    <div id="Banner" class="d-flex-center">
          <div class="textContent">
         <h1>Benefícios</h1>
        <p>Conheça os nossos benefícios e saiba como podemos te ajudar.</p>
     </div>
        <div class="img">
            <img v-for="url_img in url_img" :key="url_img" :src="url_img" alt="Imagem de uma casa bem avaliada">
        </div>
       
    </div>
</template>

<script>

export default {
    name: 'BannerAux',
    props: {
        url_img: Array
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


.img {
    width: 100%;
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    align-items: center;
    flex-wrap: wrap;
    padding: 1rem 2rem;
}
img{
    max-width: 350px;
}

@media screen and (min-width: 790px) {
    .img img {
        height: auto;
        object-fit: cover;
        object-position: center;
    }
}

@media screen and (max-width: 790px) {
    .img img {
        height: auto;
        object-fit: cover;
        object-position: center;
    }
}


@media screen and (max-width: 600px) {
    #TopCasas{
        width: 100% !important;
    }
}

.textContent{
    margin-top: 1rem;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100%;
    text-align: center;
    color: var(--azul);
}
.textContent h1{
    font-size: calc(2rem + 1vw);
    font-weight: 700;
    line-height: 40px;
    letter-spacing: 3px;
}

.textContent p{
    font-size: calc(1rem + 1vw);
    font-weight: 400;
    margin-bottom: 1rem;
    text-align: center;
}
</style>