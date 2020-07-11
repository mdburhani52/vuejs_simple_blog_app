import Vue from 'vue'
import App from './App.vue'
import VueRouter from 'vue-router';
import {store} from './store/store';
import {routes } from './routes';
import BootstrapVue from 'bootstrap-vue';
import vSelect from "vue-select";

Vue.use(VueRouter)
Vue.use(BootstrapVue)
Vue.component("v-select", vSelect);

const router = new VueRouter({routes})

router.beforeEach((to, from, next) => {
  window.scrollTo(0, 0);
  // More code ...
  next();
});


new Vue({
  el: '#app',
  router,
  store,
  render: h => h(App)
})
