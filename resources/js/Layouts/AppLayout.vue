<template>
  <v-app>
    <Navbar />

    <v-main class="color_main_background">
      <v-container class="">
        <slot></slot>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
import Navbar from '@/Components/Navbar';

export default {
  components: {
    Navbar,
  },

  data() {
    return {};
  },
};
</script>
