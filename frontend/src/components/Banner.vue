<template>
    <div id="Banner" class="d-flex-center">
        <div class="img">
            <img :src="url_casa" alt="Banner Principal">
            <Forms />
        </div>
    </div>
</template>

<script>
import Forms from '@/components/Forms.vue';

export default {
  name: 'Banner',
  data() {
    return {
      url_casa: './assets/contentHome/principal/1.png',
      casaIndex: 1,
      totalCasas: 2, 
    };
  },
  methods: {
    carrossel() {
      this.casaIndex += 1;

      // Verifica se o próximo índice existe, senão, volta ao primeiro índice
      if (this.casaIndex > this.totalCasas) {
        this.casaIndex = 1;
      }

      this.url_casa = `./assets/contentHome/principal/${this.casaIndex}.png`;
    },
  },
  created() {
    // Define o intervalo de tempo (por exemplo, 5 segundos)
    setInterval(this.carrossel, 5000); // 5000 milissegundos = 5 segundos
  },
  components: {
    Forms
  }
};
</script>


<style scoped>

#Banner{
    top: 0;
    left: 0;
    width: 100%;
    height: 100vh; 
}

@media (max-width: 790px) {
    img{
        margin-top: 0 !important;
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
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    height: 100%;
    width: 100%;
}
img{
    margin-top: 10vh;
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