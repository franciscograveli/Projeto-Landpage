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
    height: 110vh; 
}

@media (max-width: 790px) {
    img{
        margin-top: 0 !important;
    }
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
    margin-top: 25vh;
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
}

</style>