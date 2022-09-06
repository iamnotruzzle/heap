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
          <span>CRUD</span>
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
        <!-- <v-row>
          <v-col class="mt-5 text-center">
            <v-avatar size="100">
              <img src="/avatar-1.png" />
            </v-avatar>
            <p class="mt-1 blue--text subtitle-1">The Net ninja</p>
          </v-col>
        </v-row> -->

        <v-divider></v-divider>

        <v-list
          dense
          nav
        >
          <!-- TODO Fix active link -->
          <!-- Nav links-->
          <v-list-item-group
            color="color_list_item_group"
            mandatory
          >
            <!-- <v-list-item
              :href="route('dashboard')"
              link
            > -->

            <v-list-item
              v-for="(item, i) in items"
              :key="i"
              @click="goToPage(item.route)"
            >
              <v-list-item-icon>
                <v-icon>{{ item.icon }}</v-icon>
              </v-list-item-icon>

              <v-list-item-content>
                <v-list-item-title>{{ item.title }}</v-list-item-title>
              </v-list-item-content>
            </v-list-item>

            <!-- with sub-group -->
            <v-list-group
              color="color_list_item_group"
              :value="false"
              prepend-icon="mdi-account-circle-outline"
              no-action
            >
              <template v-slot:activator>
                <v-list-item-title>Teams</v-list-item-title>
              </template>

              <v-list-item
                v-for="team in teams"
                :key="team.title"
                :to="team.route"
                link
              >
                <v-list-item-title>{{ team.title }}</v-list-item-title>

                <v-list-item-icon>
                  <v-icon>{{ team.icon }}</v-icon>
                </v-list-item-icon>
              </v-list-item>
            </v-list-group>
          </v-list-item-group>
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
export default {
  data() {
    return {
      drawer: true,
      selected: 1,
      items: [
        { title: 'Dashboard', icon: 'mdi-view-dashboard-outline', route: 'dashboard' },
        // { title: 'Users', icon: 'mdi-help-circle-outline', route: 'users.index' },
      ],
      teams: [
        { title: 'Management', icon: 'mdi-account-multiple-outline' },
        { title: 'Settings', icon: 'mdi-cog-outline' },
      ],
    };
  },
  methods: {
    logout() {
      this.$inertia.post(route('logout'));
    },
    goToPage(page) {
      this.$inertia.visit(this.route(page));
    },
  },
};
</script>
