require('./bootstrap');

// Import modules...
import Vue from 'vue';
import { App as InertiaApp, plugin as InertiaPlugin } from '@inertiajs/inertia-vue';
import PortalVue from 'portal-vue';
import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css';
import { InertiaProgress } from '@inertiajs/progress';

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
          color_primary: '#1E88E5',
          color_secondary: '#0CB9C5',
          color_secondary_accent: '#09d2e0',
          color_error: '#FC5978',
          color_warning: '#FEC90F',
          color_success: '#05B187',
          color_disabled: '#85BFF1',
          color_main_background: '#F6F6F6',
        },
        dark: {
          color_primary: '#1E88E5',
          color_secondary: '#0CB9C5',
          color_secondary_accent: '#09d2e0',
          color_error: '#FC5978',
          color_warning: '#FEC90F',
          color_success: '#05B187',
          color_disabled: '#85BFF1',
          color_main_background: '#F6F6F6',
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
  // appear during navigation, in milliseconds.
  delay: 250,

  // The color of the progress bar.
  color: '#0CB9C5',

  // Whether to include the default NProgress styles.
  includeCSS: true,

  // Whether the NProgress spinner will be shown.
  // showSpinner: true,
});
