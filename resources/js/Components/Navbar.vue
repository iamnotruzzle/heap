<template>
  <nav>
    <v-card class="mx-auto overflow-hidden">
      <v-app-bar
        class="color_header rounded-0"
        flat
        app
      >
        <!-- drawer toggler -->
        <v-app-bar-nav-icon @click="drawer = !drawer">
          <!-- use default slot if you want to change icon -->
          <!-- <v-icon>mdi-menu-open</v-icon> -->
        </v-app-bar-nav-icon>

        <!-- header nav title -->
        <v-toolbar-title class="text-uppercase">
          <span>TEMPLATE</span>
        </v-toolbar-title>

        <!-- add space BETWEEN title and signout -->
        <v-spacer></v-spacer>

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
        app
      >
        <v-row>
          <v-col class="mt-5 text-center">
            <v-avatar
              v-if="user.image != null"
              size="100"
              class="ava-border"
            >
              <img
                :src="`/storage/${user.image}`"
                color="color_add"
              />
            </v-avatar>
            <v-avatar
              v-else
              size="100"
              class="ava-border"
            >
              <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" />
            </v-avatar>
            <p class="mt-2 mb-0 text-body-1-edited font-weight-medium text-uppercase">
              {{ user.firstName }}
            </p>
            <p class="text-caption-edited text-uppercase text--secondary">
              {{ user.email }}
            </p>
          </v-col>
        </v-row>

        <v-divider></v-divider>

        <v-list
          dense
          nav
        >
          <Link
            href="/dashboard"
            :class="{ 'active-list-item': $page.url.startsWith('/dashboard') }"
            as="v-list-item"
          >
            <v-list-item-icon>
              <pie-chart-icon
                :class="[$page.url.startsWith('/dashboard') ? 'active-icon' : 'not-active-icon']"
                size="24"
                as="v-icon"
              ></pie-chart-icon>
            </v-list-item-icon>

            <v-list-item-content>
              <v-list-item-title
                :class="[$page.url.startsWith('/dashboard') ? 'active-title' : 'not-active-title']"
                class="text-subtitle-1-edited"
                >Dashboard</v-list-item-title
              >
            </v-list-item-content>
          </Link>

          <Link
            href="/users"
            :class="{ 'active-list-item': $page.url.startsWith('/users') }"
            as="v-list-item"
          >
            <v-list-item-icon>
              <user-icon
                :class="[$page.url.startsWith('/users') ? 'active-icon' : 'not-active-icon']"
                size="24"
                as="v-icon"
              ></user-icon>
            </v-list-item-icon>

            <v-list-item-content>
              <v-list-item-title
                :class="[$page.url.startsWith('/users') ? 'active-title' : 'not-active-title']"
                class="text-subtitle-1-edited"
                >Users</v-list-item-title
              >
            </v-list-item-content>
          </Link>

          <!-- with sub-group -->
          <v-list-group
            :value="true"
            prepend-icon="mdi-clipboard-list-outline"
            class="list-title"
            no-action
            color="grey darken-1"
          >
            <template v-slot:activator>
              <v-list-item-content>
                <v-list-item-title class="text-subtitle-1-edited">List group</v-list-item-title>
              </v-list-item-content>
            </template>

            <!-- <Link
              href="/tasks"
              :class="{ 'active-list-item': $page.url.startsWith('/tasks') }"
              as="v-list-item"
            >
              <v-list-item-title
                :class="[$page.url.startsWith('/tasks') ? 'active-title' : 'not-active-title']"
                class="text-subtitle-2-edited"
                >Calendar</v-list-item-title
              >

              <v-list-item-icon>
                <calendar-icon
                  :class="[$page.url.startsWith('/tasks') ? 'active-icon' : 'not-active-icon']"
                  size="24"
                  as="v-icon"
                ></calendar-icon>
              </v-list-item-icon>
            </Link>

            <Link
              href="/authTasks"
              :class="{ 'active-list-item': $page.url.startsWith('/authTasks') }"
              as="v-list-item"
            >
              <v-list-item-title
                :class="[$page.url.startsWith('/authTasks') ? 'active-title' : 'not-active-title']"
                class="text-subtitle-2-edited"
                >Assigned tasks</v-list-item-title
              >

              <v-list-item-icon>
                <edit-icon
                  :class="[$page.url.startsWith('/authTasks') ? 'active-icon' : 'not-active-icon']"
                  size="24"
                  as="v-icon"
                ></edit-icon>
              </v-list-item-icon>
            </Link> -->
          </v-list-group>
        </v-list>

        <!-- Logout button inside drawer -->
        <template v-slot:append>
          <div class="pa-2">
            <form
              method="POST"
              @submit.prevent="logout"
            >
              <v-btn
                text
                block
                type="submit"
                >Logout
                <v-icon right>mdi-exit-to-app</v-icon>
              </v-btn>
            </form>
          </div>
        </template>
      </v-navigation-drawer>
    </v-card>
  </nav>
</template>
<script>
import { Link } from '@inertiajs/inertia-vue';
import { UserIcon, PieChartIcon } from 'vue-feather-icons';

export default {
  components: {
    Link,
    UserIcon,
    PieChartIcon,
  },
  data() {
    return {
      drawer: true,
      selected: 1,
    };
  },
  methods: {
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
  border: 2px solid rgb(107, 107, 241);
}

.active-list-item {
  background-color: rgba(134, 17, 236, 0.8);
}

.active-icon,
.active-title {
  color: #fff;
}

.not-active-icon,
.not-active-title {
  opacity: 0.7;
}

.v-list-group__header {
  color: #fff !important;
}
</style>
