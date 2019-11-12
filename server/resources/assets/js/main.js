import Vue from 'vue'
import App from './App.vue'
import router from './router/index'
import store from './store/store'

import BootstrapVue from 'bootstrap-vue'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import 'bootstrap/dist/css/bootstrap.css'

Vue.use(BootstrapVue)


import axios from 'axios'

import VueResource from "vue-resource"
import VueSession from 'vue-session'


/*import Googlefiles from './views/Googlefiles.vue'
import Dropfiles from './views/Dropfiles.vue'*/

Vue.use(BootstrapVue)
Vue.use(VueResource);
Vue.use(VueSession)
window.axios = require('axios');


import { library } from '@fortawesome/fontawesome-svg-core'
import { faEnvelopeOpen } from '@fortawesome/free-solid-svg-icons'
import { faLock } from '@fortawesome/free-solid-svg-icons'
import { faEye } from '@fortawesome/free-solid-svg-icons'
import { faEyeSlash } from '@fortawesome/free-solid-svg-icons'
import { faSignOutAlt } from '@fortawesome/free-solid-svg-icons'
import { faUser } from '@fortawesome/free-solid-svg-icons'
import { faCog } from '@fortawesome/free-solid-svg-icons'
import { faBell } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
library.add(faEnvelopeOpen)
library.add(faLock)
library.add(faEye)
library.add(faEyeSlash)
library.add(faSignOutAlt)
library.add(faUser)
library.add(faCog)
library.add(faBell)
import "../scss/main.scss";
import "../scss/custom.scss";

Vue.component('font-awesome-icon', FontAwesomeIcon)

new Vue({
  el: '#app',
  router,
  store,
  render: h => h(App)
})
