import { createRouter, createWebHistory } from 'vue-router';
import HomeView from '../views/HomeView.vue';

const scrollToMiddle = (element) => {
  if (element) {
    const windowHeight = window.innerHeight;
    const elementHeight = element.offsetHeight;
    const offsetTop = element.offsetTop;

    const middleOfScreen = offsetTop - (windowHeight - elementHeight) / 2;

    window.scrollTo({
      top: middleOfScreen,
      behavior: 'smooth'
    });
  }
};

const openExternalLink = (url) => {
  window.open(url);
};

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
    setTimeout(() => {
      const element = document.getElementById('sobre');
      scrollToMiddle(element);
    }, 0);
    next(false);
  } else if (to.path === '/rastreador') {
    openExternalLink("https://play.google.com/store/apps/details?id=com.gigabens.monitoramento.app&pli=1");
    next(false);
  } else if (to.path === '/servicos') {
    setTimeout(() => {
      const element = document.getElementById('beneficios');
      scrollToMiddle(element);
    }, 0);
    next(false);
  } else {
    next();
  }
});

export default router;
