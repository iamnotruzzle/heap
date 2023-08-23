<template>
  <v-app>
    <!-- app bar and sidebar -->
    <v-card class="mx-auto overflow-hidden">
      <v-app-bar
        :class="{
          color_main_dark_background: $vuetify.theme.dark,
        }"
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
          <span>Hospital Client Experience Survey</span>
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
            >mdi-weather-sunny</v-icon
          >
        </v-btn>
        <v-btn
          icon
          v-if="$vuetify.theme.dark"
          @click="toggleTheme()"
        >
          <v-icon color="yellow darken-3">mdi-weather-night</v-icon>
        </v-btn>

        <!-- <v-menu offset-y>
          <template v-slot:activator="{ on }">
            <v-btn
              icon
              v-on="on"
            >
              <v-badge
                color="color_primary"
                overlap
              >
                <template slot="badge">5</template>
                <bell-icon
                  icon
                  as="v-btn"
                ></bell-icon>
              </v-badge>
            </v-btn>
          </template>
          <v-card>
            <v-list dense>
              <v-subheader>Notifications</v-subheader>
              <v-divider></v-divider>

              <v-list-item
                v-for="notification in notifications"
                :key="notification.id"
              >
                <v-list-item-content>
                  <v-list-item-title> {{ notification.title }}</v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </v-list>
          </v-card>
        </v-menu> -->

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
        class="sidebar"
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
              <v-list-item-title class="text-h6-edited white--text">
                {{ user.firstName }} {{ user.middleName }} {{ user.lastName }}
              </v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </v-list>

        <v-divider class="white"></v-divider>

        <v-list
          dense
          nav
        >
          <Link
            href="answers"
            :class="{ 'color_primary--text': $page.component === 'SurveyAnswers/Index' }"
            as="v-list-item"
            @click="isGroupOpen = false"
          >
            <v-list-item-icon class="mr-3">
              <edit-icon
                :class="[$page.component === 'SurveyAnswers/Index' ? 'color_primary--text' : 'not-active white--text']"
                size="24"
                stroke-width="1"
              ></edit-icon>
            </v-list-item-icon>

            <v-list-item-content>
              <v-list-item-title
                :class="[$page.component === 'SurveyAnswers/Index' ? 'color_primary--text' : 'not-active white--text']"
                class="text-body-1-edited font-weight-regular white--text"
                >Survey answers</v-list-item-title
              >
            </v-list-item-content>
          </Link>

          <Link
            v-if="$page.props.user.role != 'user'"
            href="users"
            :class="{ 'color_primary--text': $page.component === 'Users/Index' }"
            as="v-list-item"
            @click="isGroupOpen = false"
          >
            <v-list-item-icon class="mr-3">
              <users-icon
                :class="[$page.component === 'Users/Index' ? 'color_primary--text' : 'not-active white--text']"
                size="24"
                stroke-width="1"
              ></users-icon>
            </v-list-item-icon>

            <v-list-item-content>
              <v-list-item-title
                :class="[$page.component === 'Users/Index' ? 'color_primary--text' : 'not-active white--text']"
                class="text-body-1-edited font-weight-regular white--text"
                >Users</v-list-item-title
              >
            </v-list-item-content>
          </Link>

          <!-- <Link
            href="iloco"
            :class="{ 'color_primary--text': $page.component === 'Iloco/Index' }"
            as="v-list-item"
            @click="isGroupOpen = false"
          >
            <v-list-item-icon class="mr-3">
              <file-text-icon
                :class="[$page.component === 'Iloco/Index' ? 'color_primary--text' : 'not-active white--text']"
                size="24"
                stroke-width="1"
              ></file-text-icon>
            </v-list-item-icon>

            <v-list-item-content>
              <v-list-item-title
                :class="[$page.component === 'Iloco/Index' ? 'color_primary--text' : 'not-active white--text']"
                class="text-body-1-edited font-weight-regular white--text"
                >Questionnaire</v-list-item-title
              >
            </v-list-item-content>
          </Link> -->
          <Link
            href="eng"
            :class="{ 'color_primary--text': $page.component === 'English/Index' }"
            as="v-list-item"
            @click="isGroupOpen = false"
          >
            <v-list-item-icon class="mr-3">
              <file-text-icon
                :class="[$page.component === 'English/Index' ? 'color_primary--text' : 'not-active white--text']"
                size="24"
                stroke-width="1"
              ></file-text-icon>
            </v-list-item-icon>

            <v-list-item-content>
              <v-list-item-title
                :class="[$page.component === 'English/Index' ? 'color_primary--text' : 'not-active white--text']"
                class="text-body-1-edited font-weight-regular white--text"
                >Questionnaire</v-list-item-title
              >
            </v-list-item-content>
          </Link>
        </v-list>
      </v-navigation-drawer>
    </v-card>
    <!-- end app bar and sidebar -->

    <v-main
      :class="{
        color_light_app_container_bg: !$vuetify.theme.dark,
        color_dark_app_container_bg: $vuetify.theme.dark,
      }"
    >
      <v-container
        fluid
        :style="($vuetify.breakpoint.xs = 'width: 100%')"
      >
        <slot></slot>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
import Navbar from '@/Components/Navbar';
import { Link } from '@inertiajs/inertia-vue';
import {
  CircleIcon,
  UserIcon,
  PackageIcon,
  EditIcon,
  BellIcon,
  CheckSquareIcon,
  UsersIcon,
  FileTextIcon,
  BarChart2Icon,
} from 'vue-feather-icons';

export default {
  components: {
    Navbar,
    Link,
    CircleIcon,
    UserIcon,
    PackageIcon,
    EditIcon,
    BellIcon,
    CheckSquareIcon,
    UsersIcon,
    FileTextIcon,
    BarChart2Icon,
  },

  data() {
    return {
      notifications: [
        { id: 1, title: 'Click Me' },
        { id: 2, title: 'Click Me' },
        { id: 3, title: 'Click Me' },
        { id: 4, title: 'Click Me 2' },
      ],
      isGroupOpen: false,
      mini: false,
      drawer: null,
      selected: 1,
    };
  },
  mounted() {
    // console.log(this.$page.props);

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
/* pulse animation */
.pulse {
  border-radius: 50%;
  background: #009f5b;
  cursor: pointer;
  box-shadow: 0 0 0 rgba(0, 159, 91, 0.5);
  animation: pulse 1s infinite;
}
.pulse:hover {
  animation: none;
}

@-webkit-keyframes pulse {
  0% {
    -webkit-box-shadow: 0 0 0 0 rgba(0, 159, 91, 0.5);
  }
  70% {
    -webkit-box-shadow: 0 0 0 10px rgba(0, 159, 91, 0);
  }
  100% {
    -webkit-box-shadow: 0 0 0 0 rgba(0, 159, 91, 0);
  }
}
@keyframes pulse {
  0% {
    -moz-box-shadow: 0 0 0 0 rgba(0, 159, 91, 0.5);
    box-shadow: 0 0 0 0 rgba(0, 159, 91, 0.4);
  }
  70% {
    -moz-box-shadow: 0 0 0 10px rgba(0, 159, 91, 0);
    box-shadow: 0 0 0 10px rgba(0, 159, 91, 0);
  }
  100% {
    -moz-box-shadow: 0 0 0 0 rgba(0, 159, 91, 0);
    box-shadow: 0 0 0 0 rgba(0, 159, 91, 0);
  }
}
/* end pulse animation */

.ava-border {
  border: 2px solid #01c68d;
}

.active {
  stroke-width: 2;
}

.clickable {
  -webkit-app-region: no-drag;
}

.cursor_pointer {
  cursor: pointer;
}
</style>
