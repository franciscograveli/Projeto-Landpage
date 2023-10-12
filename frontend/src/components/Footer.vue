<template>
  <footer id="footer">
    <div id="info">
     <div class="cidades" v-for="(cidade, cidadeNome) in cidades" :key="cidadeNome">
      <h3>{{ cidadeNome }}</h3>
      <p>{{ cidade.local }}</p>
      <div class="telefones" v-for="(telefones, tipoTelefone) in cidade.telefones" :key="tipoTelefone">
        <div>
          <p>
            <template v-if="tipoTelefone == 'fixo'">
             <div class="icon">
                <lord-icon
                  src="https://cdn.lordicon.com/ssvybplt.json"
                  trigger="hover"
                  colors="primary:#ff7f00"
                  state="hover-phone-ring"
                  style="">
                </lord-icon>
             </div>
            </template>
            <template v-else-if="tipoTelefone == 'wpp'">
              <div class="icon">
                <lord-icon
                  src="https://cdn.lordicon.com/hpivxauj.json"
                  trigger="hover"
                  colors="primary:#ff7f00"
                  style="">
              </lord-icon>
              </div>
            </template>
            <template v-else>
              <div class="icon" @click="copiarTelefone(telefones)" :id="tipoTelefone">
                <lord-icon
                  src="https://cdn.lordicon.com/enzmygww.json"
                  trigger="hover"
                  colors="primary:#ff7f00"
                  state="hover-2"
                  style="">
              </lord-icon>
              </div>
            </template>
          </p>
        </div>
        <div>
          <ul>
            <li @click="copiarTelefone(telefone)" v-for="(telefone, index) in telefones" :key="index" :data-link="telefone" :id="tipoTelefone">{{ telefone }}</li>
          </ul>
        </div>
      </div>

      
    </div>


    </div>
    
    <div id="mapa">
        <div class="map">
          <Map :coordenadas="coordenadas"/>
        </div>
    </div>
   <div>
      
      <div id="footer-icons" v-show="link_git">
        <img
          @click="accessLink($event)"
          src="@/assets/img/icons/facebook.svg"
          :data-link="link_git"
          alt="GitHub"
          class="icons"
        />

        <img
          @click="accessLink($event)"
          src="@/assets/img/icons/instagram.svg"
          :data-link="link_linkedin"
          alt="LinkedIn"
          class="icons"
        />
      </div>
      <p>Copyright GigaBens &copy; {{ new Date().getFullYear() }}</p>
    </div>
  </footer>
  
</template>

<script>
import Swal from 'sweetalert2'
import Map from '@/components/Map.vue'

import "leaflet/dist/leaflet.css";


export default {
  name: 'Footer',
  data() {
    return{
        link_git: 'https://github.com/franciscograveli/franciscograveli',
        link_linkedin: 'https://www.linkedin.com/in/francisco-carlos-609192142/',
        coordenadas: [
          -21.1303,
          -42.3674
        ],
        cidades:{
          Muriaé: {
            local: 'Rua Serra da Lagoa, 1 - Centro - Muriaé - MG',
            telefones: {
              fixo: ['(32)3728-4442', '(32)3728-2442'],
              wpp: ['(32)98883-4442'],
              emergencia: ['0800-883-6262'],
              },
          },
          // Leopoldina: {
          //   local: 'Rua Serra da Lagoa, 1 - Centro - Muriaé - MG',
          //   telefones: {
          //     fixo: ['(32)3728-4442'],
          //     wpp: ['(32)98883-4442'],
          //     emergencia: ['0800-883-6262'],
          //     },
          // }
        },
       
    }
  },
  methods: {
    accessLink(event) {
      const link = event.target.getAttribute('data-link');
      if (link) {
        window.open(link, '_blank');
      }
    },
    copiarTelefone(telefone) {
      this.copiar(telefone);
    },
    copiar(telefone) {
      // Copie o telefone para a área de transferência usando a Clipboard API
      navigator.clipboard.writeText(telefone)
        .then(() => {
          // A cópia foi bem-sucedida
          Swal.fire({
            icon: 'success',
            title: 'Telefone copiado para a área de transferência!',
            text: `${ telefone }`,
            showConfirmButton: false,
            timer: 1500
          })
        })
        .catch((error) => {
          // Lidar com erros, se houver
          Swal.fire({
            icon: 'error',
            title: 'Erro ao copiar o número de telefone!',
            text: `Tente novamente mais tarde`,
            showConfirmButton: false,
            timer: 1500
          })
        });
    },
  },
  components: {
    Map
  }

};
</script>

<style lang="scss" scoped>
#footer {
  background-color: var(--azul-footer);
  text-align: center;
  height: auto;
  padding: 2rem .5rem;
  color: var(--cinza-footer);
  display: flex;
  justify-content: center;
  align-items: center;
  bottom: 0;
  width: 100%;
  flex-wrap: wrap; 
  gap: 10px; 
}

#info, #mapa{
  flex: 1;
  min-width: 300px;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  flex-wrap: wrap;

}
#footer-icons{
  flex: 0;
  min-width: 100vw;
}
#info{
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  align-items: stretch;
  justify-content: space-evenly;
  
}

#footer-icons{
  margin-top: .5rem !important;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: row;
  flex-wrap: wrap;
  
}


img {
  opacity: 0.8;
  margin: 0rem .5rem !important;
  width: 36px;
  height: 36px;
  filter: drop-shadow(0px 0px 1px #fcba0315);
  transition: .5s ease all !important;
}

img:hover {
  transition: .5s ease all;
  opacity: 1;
  transform: translate(1px, -5px);
  cursor: pointer;
}

.map{
  display: flex;
  background-color: white;
  min-width: 250px;
  min-height: 250px;
  width: 100%;
  height: 100%;
  max-width: 400px;
}

.cidades .telefones ul{
  list-style: none !important;
  padding: 0 !important;
  margin: 0 !important;
  display: flex;
  flex-direction: column;
  flex-wrap: wrap;
}

.cidades{
  height: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: stretch;
  flex-wrap: wrap;
  gap: 10px;
}
.cidades h3{
  font-size: calc(.75rem + .75vw);
  font-weight: bolder;
}
.cidades p{
  text-align: center;
  max-width: 80%;
}

.telefones{
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: row;
  flex-wrap: wrap;
  
}
.telefones div{
  padding: 0 .5rem !important;
  
}
.telefones ul{
  border-left: 2px solid var(--laranja);
  min-width: 100%;
}
.telefones ul li{
  padding: 0rem .5rem !important;
}

.telefones ul li:hover{
  color: var(--laranja) !important;
  cursor: pointer;
  transition: .3s ease all;
  text-decoration: underline;
}

.icon{
  width: 36px;
  height: 36px;
}

.icon:hover{
  filter: drop-shadow(-5px 5px 5px var(--laranja));

  .telefones ul li{
    color: var(--laranja) !important;
  }
}
#emergencia{
  color: var(--laranja) !important;
  font-weight: bolder;
}

@media (max-width: 1024px) {

  #info,
  #mapa,
  #footer-icons{
    flex: 0;
    width: 100% !important;
  }

  #info{
    min-width: 80% !important;
    .cidades{
      width: 100% !important;
    }
   
  }
  #info .cidades:not(:first-child){
    border-top: 2px solid var(--laranja) !important;
  }

  #info h3{
    font-size: 1.5rem !important;
  }
}
</style>
