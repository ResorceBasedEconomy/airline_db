import style from './style.scss';
import Vue from 'vue'
import VueRouter from 'vue-router';
import VueResource from 'vue-resource';
// Pages
import FlightCenter from './components/flight/flight-center';
import About from './pages/about';
import Contact from './pages/contact/contact';


// Components
import MainNav from './components/main-nav';


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