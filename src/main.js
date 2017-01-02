import style from './style.scss';
import Vue from 'vue'
import VueRouter from 'vue-router';
import VueResource from 'vue-resource';
// Pages
import FlightCenter from './Components/flight/flight-center';
import About from './pages/about';
import Contact from './pages/contact/contact';
// import CarCenter from './pages/car-center/car-center';
// import chat from "./Components/Chat.vue";

// Components
import MainNav from './components/main-nav';
// import AppFooter from './components/app-footer';

Vue.use(VueResource);
Vue.use(VueRouter);

const routes = [
      {
        path: '/',
        component: FlightCenter
      },
      {
        path: '/contact',
        component: Contact
      },
      {
        path: '/about',
        component: About
      }
    ]

const router = new VueRouter({
  mode: 'history',
  routes
})

const app = new Vue({
  router,
  components: {
    'main-nav': MainNav
  }
}).$mount('#app')