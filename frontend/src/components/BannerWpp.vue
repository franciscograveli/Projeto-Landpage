<template>
    <div id="Banner" class="d-flex-center">
       <div class="container">
           <div class="img">
               <img v-for="img in img" :key="img" :src="img" alt="Imagem carro com a logo GigaBens">
           </div>
           <div class="btn">
            <button type="button" id="btnWpp"><img src="@/../public/assets/contentHome/wpp/ZAP2.png" alt="Logo Whatsapp"> Fale com um de nossos Consultores</button>
           </div>
       </div>

        <slot>
            
        </slot>
    </div>
</template>

<script>

export default {
    name: 'BannerAux',
    props: {
        wpp: String
    },
    data(){
        return {
            img : ["./assets/contentHome/wpp/ZAP1.png"],
        }
    },
    mounted(){
        var numWpp = this.wpp;
        var btnWpp = document.getElementById("btnWpp");
        btnWpp.addEventListener("click", function(){
            window.open(`https://wa.me/${numWpp}`);

        })
    }
}

</script>


<style lang="scss" scoped>

#Banner{
    top: 0;
    left: 0;
    width: 100%;
    /* height: 100vh; */
}

.container {
  position: relative;
  width: 100%;
  min-height: 100px !important;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap;
  background-color: var(--branco);
  z-index: 1; 

  @media (min-width: 980px) {
    justify-content: space-between;
  }
}

.container::before {
  z-index: 1;
  text-align: center;
  display: flex;
  justify-content: center;
  align-content: center;
  align-items: center;
  content: "Faça sua Cotação";
  position: absolute;
  width: 100%;
  height: 100px;
  background-color: var(--azul);
  color: var(--branco);
  font-size: calc(1.5rem + 1.1vw);
  font-weight: bold;
  /* Outras propriedades do seu pseudo-elemento, se necessário */

  @media (max-width: 1250px) {
    content: "" !important;
    font-size: 1.5rem;    
  }
}



img{
    position: relative;
    z-index: 10;
    max-width: 350px;
    margin: 0 0rem 0rem 5rem;
}



button{
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    z-index: 10;
    background-color: var(--verde-wpp);
    border: 1px solid var(--verde-wpp);
    color: var(--branco);
    padding: 1rem 2rem;
    font-size: 1rem;
    font-weight: bold;
    border-radius: 2rem;
    cursor: pointer;
    transition: .5s ease all;
    box-shadow: 1px 1px 5px #333333bc !important;
    margin: 0 5rem 0rem 0rem;
}


button img{
    max-width: 36px;
    margin: 0 1rem 0 0 !important;
    transition: .5s ease all;
}
button:hover{
    box-shadow: 2px 2px 7px #333 !important;
    color: var(--primary-color) !important;

    img{
        transition: .5s ease all;
        transform: rotate(5deg);
    }
}

// Medias Queries
@media (max-width: 600px) {
    .img img {
        display: none;
    }
    .container::before {
        display: none;
    }
  }
@media (max-width: 1024px) {
    img, button {
        margin: 0 0rem 0rem 0rem;
    }    
  }


</style>