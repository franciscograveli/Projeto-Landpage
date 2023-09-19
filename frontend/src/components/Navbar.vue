<template>
  <nav class="navbar">
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
  </nav>
</template>

<script>
export default {
  name: 'Navbar',
};
</script>

<style scoped>

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
