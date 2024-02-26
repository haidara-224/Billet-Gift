import {createApp} from 'vue/dist/vue.esm-bundler'
import Dashbord from './Layouth/Dashbord.vue'

import router from './Plugin/Router'
const app=createApp(Dashbord)
app.use(router)
app.mount('#app')
