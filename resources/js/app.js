require('./bootstrap');

// Import modules...
import Vue from 'vue';
import { App as InertiaApp, plugin as InertiaPlugin } from '@inertiajs/inertia-vue';
import PortalVue from 'portal-vue';
import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css';

Vue.mixin({ methods: { route } });
Vue.use(InertiaPlugin);
Vue.use(PortalVue);
Vue.use(Vuetify);

const app = document.getElementById('app');

new Vue({
  vuetify: new Vuetify({
    theme: {
      dark: false, // here we need to set theme
      themes: {
        light: {
          color_list_item_group: '#7352C7',
          color_add: '#7352C7',
          color_header: '#F5F7FA',
          color_main_background: '#F5F7FA',
        },
      },
    },
  }),
  render: (h) =>
    h(InertiaApp, {
      props: {
        initialPage: JSON.parse(app.dataset.page),
        resolveComponent: (name) => require(`./Pages/${name}`).default,
      },
    }),
}).$mount(app);
