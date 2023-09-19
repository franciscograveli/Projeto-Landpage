import './assets/main.css'

import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import icons from '/src/assets/lib/fontawesome.js'

import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'


library.add({ ...icons })

const app = createApp(App).component('fa', FontAwesomeIcon)

app.use(router)

app.mount('#app')
