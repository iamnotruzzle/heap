<template>
  <v-app>
    <!-- <Navbar /> -->

    <v-card class="mx-auto overflow-hidden">
      <v-app-bar
        elevate-on-scroll
        app
      >
        <!-- drawer toggler -->
        <!-- use mini as toggler when screen is mdAndUp/desktop -->
        <v-app-bar-nav-icon
          v-if="$vuetify.breakpoint.mdAndUp"
          @click.stop="mini = !mini"
          class="clickable"
        >
          <!-- use default slot if you want to change icon -->
          <!-- <v-icon>mdi-menu-open</v-icon> -->
        </v-app-bar-nav-icon>
        <!-- use drawer as toggler when screen is smAndDown/tablet/mobile -->
        <v-app-bar-nav-icon
          v-if="$vuetify.breakpoint.smAndDown"
          @click.stop="drawer = !drawer"
          class="clickable"
        >
        </v-app-bar-nav-icon>

        <!-- header nav title -->
        <v-toolbar-title class="text-uppercase">
          <span>TEMPLATE</span>
        </v-toolbar-title>

        <!-- add space BETWEEN title and signout -->
        <v-spacer></v-spacer>

        <v-btn
          icon
          v-if="!$vuetify.theme.dark"
          @click="toggleTheme()"
        >
          <v-icon
            class="mr-1"
            color="blue-grey darken-4"
            >mdi-lightbulb</v-icon
          >
        </v-btn>
        <v-btn
          icon
          v-if="$vuetify.theme.dark"
          @click="toggleTheme()"
        >
          <v-icon color="yellow darken-3">mdi-lightbulb-outline</v-icon>
        </v-btn>

        <!-- logout button -->
        <form
          method="POST"
          @submit.prevent="logout"
        >
          <v-btn
            text
            type="submit"
            >Logout
            <v-icon right>mdi-exit-to-app</v-icon>
          </v-btn>
        </form>
      </v-app-bar>

      <!-- drawer -->

      <v-navigation-drawer
        v-model="drawer"
        :mini-variant.sync="mini"
        :expand-on-hover="mini"
        :permanent="$vuetify.breakpoint.mdOnly"
        :temporary="$vuetify.breakpoint.smAndDown"
        app
      >
        <v-list>
          <v-list-item class="px-2 py-0 my-0">
            <v-avatar
              v-if="user.image != null"
              size="40"
              class="ava-border"
            >
              <img :src="`/storage/${user.image}`" />
            </v-avatar>
            <v-avatar
              v-else
              size="40"
              class="ava-border"
            >
              <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" />
            </v-avatar>
          </v-list-item>

          <v-list-item>
            <v-list-item-content>
              <v-list-item-title class="text-h6-edited"> {{ user.firstName }} </v-list-item-title>
              <v-list-item-subtitle>{{ user.email }}</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
        </v-list>

        <v-divider></v-divider>

        <v-list
          dense
          nav
        >
          <!-- Logs -->
          <v-list-group
            :value="false"
            active-class="color_secondary"
            color="white"
            no-action
          >
            <template v-slot:activator>
              <v-list-item-icon class="mr-3">
                <file-text-icon
                  :class="[isGroupOpen === true ? 'active' : 'not-active']"
                  size="24"
                  stroke-width="1"
                ></file-text-icon>
              </v-list-item-icon>

              <v-list-item-content>
                <v-list-item-title class="text-body-1-edited font-weight-regular">List</v-list-item-title>
              </v-list-item-content>
            </template>

            <Link
              href="users"
              :class="{
                color_secondary_accent: $page.component === 'Users/Index',
              }"
              as="v-list-item"
              class="pa-0 ma-0"
            >
              <!-- This icon is only added to add margin right. Take note that the size is set to 0 -->
              <v-list-item-icon class="mr-5">
                <circle-icon
                  size="0"
                  stroke-width="0"
                ></circle-icon>
              </v-list-item-icon>

              <v-list-item-content class="ma-0">
                <v-list-item-title
                  :class="[$page.component === 'Users/Index' ? 'active' : 'not-active']"
                  class="text-body-1-edited font-weight-regular"
                >
                  Users
                </v-list-item-title>
              </v-list-item-content>
            </Link>
          </v-list-group>

          <Link
            href="users"
            :class="{ color_secondary: $page.component === 'Users/Index' }"
            as="v-list-item"
            @click="isGroupOpen = false"
          >
            <v-list-item-icon class="mr-3">
              <user-icon
                :class="[$page.component === 'Users/Index' ? 'active' : 'not-active']"
                size="24"
                stroke-width="1"
              ></user-icon>
            </v-list-item-icon>

            <v-list-item-content>
              <v-list-item-title
                :class="[$page.component === 'Users/Index' ? 'active' : 'not-active']"
                class="text-body-1-edited font-weight-regular"
                >Users</v-list-item-title
              >
            </v-list-item-content>
          </Link>
        </v-list>
      </v-navigation-drawer>
    </v-card>

    <!-- <v-main class="color_main_background"> -->
    <v-main>
      <v-container>
        <slot></slot>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
import Navbar from '@/Components/Navbar';

import { Link } from '@inertiajs/inertia-vue';
import {
  UserIcon,
  PieChartIcon,
  PackageIcon,
  ActivityIcon,
  BarChart2Icon,
  CircleIcon,
  FileTextIcon,
} from 'vue-feather-icons';

export default {
  components: {
    Navbar,
    Link,
    UserIcon,
    PieChartIcon,
    PackageIcon,
    ActivityIcon,
    BarChart2Icon,
    CircleIcon,
    FileTextIcon,
  },

  data() {
    return {
      isGroupOpen: false,
      mini: false,
      drawer: null,
      selected: 1,
    };
  },
  mounted() {
    const theme = localStorage.getItem('darkTheme');
    // Check if the user has set the theme state before
    if (theme) {
      if (theme === 'true') {
        this.$vuetify.theme.dark = true;
      } else {
        this.$vuetify.theme.dark = false;
      }
    } else if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
      this.$vuetify.theme.dark = true;
      localStorage.setItem('darkTheme', this.$vuetify.theme.dark.toString());
    }
  },
  methods: {
    toggleTheme() {
      this.$vuetify.theme.dark = !this.$vuetify.theme.dark;
      localStorage.setItem('darkTheme', this.$vuetify.theme.dark.toString());
    },
    logout() {
      this.$inertia.post(route('logout'));
    },
  },
  computed: {
    user() {
      return this.$page.props.auth.user;
    },
  },
};
</script>

<style scoped>
.ava-border {
  border: 2px solid #1852f1;
}

.active {
  color: #fff;
  stroke-width: 2;
}

.clickable {
  -webkit-app-region: no-drag;
}
</style>
