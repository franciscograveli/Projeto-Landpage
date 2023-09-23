<template>
  <div>
    <l-map
      v-model="zoom"
      v-model:zoom="zoom"
      :center="[ latitude, longitude ]"
      @move="log('move')"
    >
      <l-tile-layer
        url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
      ></l-tile-layer>
      <l-control-layers />
  
      <l-marker :lat-lng="[ latitude, longitude ]">
        
      </l-marker>
      
    </l-map>
  </div>
</template>
<script>
import {
  LMap,
  LIcon,
  LTileLayer,
  LMarker,
  LControlLayers,
  LTooltip,
  LPopup,
} from "@vue-leaflet/vue-leaflet";
import "leaflet/dist/leaflet.css";

export default {
    name: "Map",
  components: {
    LMap,
    LIcon,
    LTileLayer,
    LMarker,
    LControlLayers,
    LTooltip,
    LPopup,
  },
  data() {
    return {
      zoom: 17,
      iconWidth: 25,
      iconHeight: 40,
      latitude: 0,
      longitude: 0,
    };
  },
 props: {
    coordenadas: {
      type: Array, // Especifique o tipo da prop (neste caso, um array)
      required: true, // Indique se a prop é obrigatória ou não
    },
  },
  methods: {
    log(a) {
      console.log(a);
    },
    organizarCoordenadas() {
        this.latitude = this.coordenadas[0];
        this.longitude = this.coordenadas[1];
    }
  },
  watch: {
  coordenadas: {
    handler: 'organizarCoordenadas', // Chama a função organizarCoordenadas quando a prop coordenadas mudar
    immediate: true, // Garante que a função seja chamada imediatamente ao montar o componente
  },
},

};
</script>

<style scoped>

div{
  width: 100% !important;
}

</style>