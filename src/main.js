import './assets/main.css'

import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './stores'
import Vue3Toasity from 'vue3-toastify';

// Vuetify
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'

const vuetify = createVuetify({
    theme: {
        themes: {
          light: {
            dark: true
          },
        },
      },
  components,
  directives,
})

const app = createApp(App)
  app.use(Vue3Toasity);
  app.use(router)
  app.use(store)
  app.use(vuetify).mount('#app')