<template>
    <div id="Banner" class="d-flex-center" :style="{
    'background-image': `url('${icons_Text_bg}')`,
    'background-color': `var(--${bg_color})`
     }">  
  <div class="img">
            
            <img class="img-big" v-show="img" v-for="img in img" :key="img" :src="img" alt="Imagem rastreador">
        
            <div class="icons" v-show="icons_Text">
                <div class="kit-icon-img" v-for="icons_Text in icons_Text" :key="icons_Text">
                    <div class="iconIMG">
                        <img class="icons-img" :src="icons_Text[0]" alt="Imagem de uma casa bem avaliada">
                    </div>
                    <p v-show="icons_Text" :style="{'color': `var(--${color})` }">{{icons_Text[1]}}</p>
                    
                </div>
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
        url_img: {},
        bg_color: String,
        color: String,
        icons_Text_bg: String
    },
    data(){
        return {
            img : [],
            icons_Text : [],
            icons_Text_bg : null
        }

    },
    methods: {
        
    },
    mounted(){
        let data = this.url_img;
        this.img = data.img;
        this.icons_Text = data.icons_Text;
        this.icons_Text_bg = (data.icons_Text_bg)? data.icons_Text_bg : null;   
    },
 created() {
  
}

}

</script>


<style lang="scss" scoped>

#Banner{
    top: 0;
    left: 0;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    // background-image: url("./../src/assets/contentHome/laranja/LAR3.png");
    background-repeat: no-repeat;
    background-position: right;
    /* height: 100vh; */
}
#Banner::after{
    content: "";
    transform: translate(0, -60%);
    margin: 1rem 0;
    width: 100%;
    height: 2.5vh;
    background-color: var(--branco);
    background-image: none;
    
}

@media (max-width: 790px) {
        #Banner::after{
            display: none;
        }
    }
  
.img {
    padding: 1rem 2rem;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    flex: 1;
}


img{
    flex: 1;
    max-width: 90vw;
    height: auto;
    object-fit: cover;
    object-position: center;

}


.icons{
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
    margin: 0 2rem;
   
}

.icons-img{
     flex: 0;
     width: 100px;
     height: auto;
}
.iconIMG{
    height: 100%;
    border-radius: 50rem;
    background-color: var(--laranja);
    padding: 1rem;
    min-width: 100px;
    min-height: 100px;
    display: flex;
    justify-content: center;
    align-items: center;
    
}
.kit-icon-img{
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: wrap;
    flex-direction: row;
    justify-content: center;
    align-items: center;
}
.kit-icon-img img{ 
    max-width: 50px;
    color: var(--branco);
}

.kit-icon-img p{
    font-weight: 500;
    color: var(--branco);
    margin: 1rem;
    font-size: calc(1rem + 0.75vw);
    min-width: 150px;
    flex: 1;

    @media (max-width: 790px) {
        font-size:1.2rem;
    }
        
}
</style>