import { createRouter, createWebHistory } from 'vue-router';
import HomeView from '../views/HomeView.vue';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/about',
      name: 'about',
      component: () => import('../views/AboutView.vue')
    },
    {
      path: '/contato',
      name: 'contato',
      component: () => import('../views/ContactView.vue')
    }
  ]
});

router.beforeEach((to, from, next) => {
  if (to.path === '/about') {
    next('/');
  }
  if (to.path === '/rastreador') {
    window.open("https://play.google.com/store/apps/details?id=com.gigabens.monitoramento.app&pli=1");
    next(false); // Impede a navegação para '/rastreador'
  } else if (to.path === '/servicos') {
    setTimeout(() => {
      const element = document.getElementById('beneficios'); // Substitua 'beneficios' pelo ID do elemento para o qual você deseja rolar
      if (element) {
        element.scrollIntoView({
          behavior: 'smooth' // Rola suavemente para a posição
        });
      }
    }, 0); // Espera 0ms antes de executar, permitindo o próximo ciclo de renderização
    next(false); // Impede a navegação para '/servicos'
  } else {
    next(); // Permite a navegação para outras rotas
  }
});

export default router;
