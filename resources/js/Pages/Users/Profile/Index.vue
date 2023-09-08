<template>
  <div class="users">
    <Head title="Users" />

    <v-container class="my-5">
      <!-- add user dialog -->

      <!-- <div style="width: 50%"> -->
      <div>
        <h2 class="text-overline-edited">PROFILE</h2>

        <v-form
          ref="form"
          width="500"
        >
          <div class="d-flex justify-center">
            <v-avatar size="200">
              <img
                v-if="user.image == null"
                src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png"
              />
              <img
                v-else
                :src="`/storage/${user.image}`"
              />
            </v-avatar>
          </div>

          <v-file-input
            v-model="form.image"
            @input="form.image = $event.target.files[0]"
            @change="preview_image"
            :error-messages="form.errors.image"
            color="color_primary"
            chips
            show-size
            small-chips
            label="Image"
            prepend-icon=""
            truncate-length="15"
          ></v-file-input>

          <v-text-field
            v-model="form.firstName"
            :error-messages="form.errors.firstName"
            color="color_primary"
            clearable
            label="Given name"
          ></v-text-field>

          <v-text-field
            v-model="form.middleName"
            :error-messages="form.errors.middleName"
            color="color_primary"
            clearable
            label="Middle name"
          ></v-text-field>

          <v-text-field
            v-model="form.lastName"
            :error-messages="form.errors.lastName"
            color="color_primary"
            clearable
            label="Last name"
          ></v-text-field>

          <v-text-field
            v-model="form.suffix"
            :error-messages="form.errors.suffix"
            color="color_primary"
            clearable
            label="Suffix"
          ></v-text-field>

          <v-text-field
            v-model="form.password"
            :append-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'"
            :type="showPassword ? 'text' : 'password'"
            @click:append="showPassword = !showPassword"
            id="password"
            name="password"
            label="Password"
            color="color_primary"
            valid="true"
            autofocus
            :error-messages="form.errors.password"
          ></v-text-field>

          <v-card-actions class="d-flex justify-end">
            <v-btn
              color="yellow darken-1 white--text pa-0 ma-0"
              :large="$vuetify.breakpoint.smAndUp"
              @click="submit"
              @keyup.enter="submit"
              x-small
            >
              UPDATE
            </v-btn>
          </v-card-actions>
        </v-form>
      </div>
    </v-container>
  </div>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout';
import { Inertia } from '@inertiajs/inertia';
import { Head } from '@inertiajs/inertia-vue';
import moment from 'moment';

export default {
  layout: (h, page) => h(Layout, [page]),

  // Using the shorthand
  layout: AppLayout,

  components: {
    AppLayout,
    Head,
  },
  props: {
    profile: Object,
  },
  data() {
    return {
      snack: '',
      snackColor: '',
      snackText: '',
      search: '',
      url: null,
      showPassword: false,

      form: this.$inertia.form({
        id: null,
        firstName: null,
        middleName: null,
        lastName: null,
        suffix: null,
        username: null,
        password: null,
        image: null,
      }),
    };
  },
  mounted() {
    // console.log(this.profile);
    this.hydrateData();
  },
  methods: {
    hydrateData() {
      this.form.id = this.profile.id;
      this.form.firstName = this.profile.firstName;
      this.form.middleName = this.profile.middleName;
      this.form.lastName = this.profile.lastName;
      this.form.suffix = this.profile.suffix;
      this.form.username = this.profile.username;
    },
    updateData() {
      this.$inertia.get('profile', {
        preserveState: true,
        preserveScroll: true,
      });
    },
    preview_image() {
      this.url = URL.createObjectURL(this.form.image);
    },
    create() {
      this.dialog = true;
      this.form.reset();
      this.form.clearErrors();
    },
    submit() {
      this.form.post(route('profile.store'), {
        preserveScroll: true,
        onSuccess: () => {
          this.form.reset();
          this.hydrateData();
          this.updatedMsg();
        },
      });
    },
    updatedMsg() {
      this.snack = true;
      this.snackColor = 'color_secondary';
      this.snackText = 'Account updated.';
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
.prevent-wrap {
  /* white-space: pre-wrap; */
  word-break: keep-all;
}
</style>
