require('./bootstrap');

// Import modules...
import Vue from 'vue';
import { App as InertiaApp, plugin as InertiaPlugin } from '@inertiajs/inertia-vue';
import PortalVue from 'portal-vue';
import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css';
import { InertiaProgress } from '@inertiajs/progress';
import JsonExcel from 'vue-json-excel';

Vue.mixin({ methods: { route } });
Vue.use(InertiaPlugin);
Vue.use(PortalVue);
Vue.use(Vuetify);
Vue.use(JsonExcel);

const app = document.getElementById('app');

new Vue({
  vuetify: new Vuetify({
    theme: {
      dark: false, // here we need to set theme
      themes: {
        light: {
          color_primary: '#01C68D',
          color_secondary: '#fca311',
          color_warning: '#fca311',
          color_error: '#B51249',
          color_success: '#01C68D',
          color_disabled: '#85BFF1',
          color_light_app_container_bg: '#F6F6F6',
          sidebar: '#04070A',
        },
        dark: {
          color_primary: '#01C68D',
          color_secondary: '#fca311',
          color_warning: '#fca311',
          color_error: '#B51249',
          color_success: '#01C68D',
          color_disabled: '#85BFF1',
          color_dark_app_container_bg: '#0E161F',
          color_main_dark_background: '#04070A',
          sidebar: '#04070A',
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

InertiaProgress.init({
  // The delay after which the progress bar will
  // appear during navigation, in milliseconds.
  delay: 250,

  // The color of the progress bar.
  color: '#01C68D',

  // Whether to include the default NProgress styles.
  includeCSS: true, //this

  // Whether the NProgress spinner will be shown.
  showSpinner: false,
});
