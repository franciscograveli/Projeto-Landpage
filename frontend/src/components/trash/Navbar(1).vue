<template>
  <header>
    <nav>
      <div class="branding">
        <img src="../assets/img/logo/logo.jpg" alt="Imagem Logo">
      </div>
      <ul v-show="!mobile" class="navigation">
        <li><router-link class="link" to="/">Home</router-link></li>
        <li><router-link class="link" to="/sobre">Quem Somos</router-link></li>
        <li><router-link class="link" to="/servicos">Servícios</router-link></li>
        <li><router-link class="link" to="/perguntas">Perguntas</router-link></li>
        <li><router-link class="link" to="/regulamento">Regulamento</router-link></li>
        <li><router-link class="link" to="/contato">Contato</router-link></li>
      </ul>
      <div class="icon">
        <i @click="toggleMobileNav" v-show ="mobile" class="far fa-bars" :class="{ 'icon-active': mobileNav }"></i>
      </div>
      <transition name="mobile-nav">
        <ul v-show="mobileNav" class="dropdown-nav">
        <li><router-link class="link" to="/">Home</router-link></li>
        <li><router-link class="link" to="/sobre">Quem Somos</router-link></li>
        <li><router-link class="link" to="/servicos">Servícios</router-link></li>
        <li><router-link class="link" to="/perguntas">Perguntas</router-link></li>
        <li><router-link class="link" to="/regulamento">Regulamento</router-link></li>
        <li><router-link class="link" to="/contato">Contato</router-link></li>
      </ul>
      </transition>

    </nav>
  </header>

  <!-- <nav class="navbar">
    <div id="logo">
      <router-link to="/">
        <img src="../assets/img/logo/logo.jpg" alt="Imagem Logo">
      </router-link>
    </div>
    <div id="botoes">
      <div><router-link to="/" class="nav-link"> <fa icon="house"/> Home</router-link></div>
      <div><router-link to="/sobre" class="nav-link"> <fa icon="face-smile" /> Quem Somos</router-link></div>
     <div> <router-link to="/servicos" class="nav-link"> <fa icon="gear" /> Serviços</router-link></div>
     <div> <router-link to="/perguntas" class="nav-link"><fa icon="question" /> Perguntas</router-link></div>
     <div> <router-link to="/regulamento" class="nav-link"><fa icon="file-pen" /> Regulamento</router-link></div>
     <div> <router-link to="/contato" class="nav-link"><fa icon="envelope" /> Contato</router-link></div>
    </div>
  </nav> -->
</template>

<script>
export default {
  name: 'Navbar',
};
</script>

<style lang="scss" scoped>

header {
  background-color: var(--primary-color);
  z-index: 99;
  width: 100%;
  position: fixed;
  transition: .5s ease all;
  color:  var(--secondary-color);

  nav {
    display: flex;
    flex-direction: row;
    padding: 12px 0;
    transition: .5s ease all;
    width: 90%;
    margin: 0 auto;
    @media(min-width: 1140px) {
      max-width: 1140px;
    }

    ul, 
    .link{
      font-weight: 500;
      color: var(--secondary-color);
      list-style: none;
      text-decoration: none;
    }

    li {
      text-transform: uppercase;
      padding: 16px;
      margin-left: 16px;
    }

    .link{
      font-size: 14px;
      transition: .5s ease all;
      padding-bottom: 4px;
      border-bottom: 1px solid transparent;

      &:hover {
        color: #ffc107;
        border-color: #ffc107;
      }
    }

    .branding{
      display: flex;
      align-items: center;
    }

    img {
      width: 50px;
      transition: .5s ease all;
    }
  }
}
/*  */

.nav-link{
    color: var(--font-color) !important;
    font-weight: bold;
    font-size: 1.2rem;
}

#botoes{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-evenly;
    align-items: center;
    flex-grow: 1;
    max-width: 70vw;
}

#logo{
    padding: 1rem !important;
    width: 10vw;
    min-width: 48px;
}

/* Estilos personalizados para o Navbar */
.navbar {
    
    display: flex;
    align-items: center;
    justify-content: space-around ;
  /* Cor do fundo */
  background-color: var(--secondary-color);
  width: 100%; /* Largura total da tela */
}

.navbar a.nav-link {
  /* Cor do texto dos links */
  color: #fff;
}

.navbar a.nav-link:hover {
  /* Cor do texto dos links ao passar o mouse */
  color: #ffc107;
}

/* Estilo para os botões no canto direito */
.navbar .navbar-nav.ml-auto .nav-item {
  margin-right: 10px; /* Espaçamento entre os itens de menu */
}

/* Estilo para o logo no canto esquerdo */
.navbar-brand {
  margin-right: 20px; /* Espaçamento à direita do logo */
}

@media (max-width: 991.98px) {
  /* Estilos para telas menores (modo colapsado) */
  .navbar .navbar-collapse {
    justify-content: flex-end; /* Alinha os itens à direita no modo colapsado */
  }
}
</style>
