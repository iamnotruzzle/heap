<template>
  <v-app>
    <v-container
      fluid
      fill-height
    >
      <v-layout
        align-center
        justify-center
      >
        <v-flex
          xs12
          sm8
          md4
        >
          <v-card class="elevation-12">
            <v-toolbar
              dark
              color="color_add"
            >
              <v-toolbar-title>Login</v-toolbar-title>
            </v-toolbar>

            <div
              v-if="hasErrors"
              class="text-center red--text ma-2"
            >
              <div class="mb-2 font-weight-black">Whoops! Something went wrong.</div>

              <p
                class="ma-0 pa-0"
                v-for="(error, key) in errors"
                :key="key"
              >
                {{ error }}
              </p>
            </div>

            <v-card-text>
              <v-form @submit.prevent="submit">
                <v-text-field
                  v-model="form.login"
                  :rules="emailRules"
                  prepend-icon="mdi-account"
                  name="login"
                  label="Login"
                  type="login"
                ></v-text-field>
                <v-text-field
                  v-model="form.password"
                  id="password"
                  prepend-icon="mdi-lock"
                  name="password"
                  label="Password"
                  type="password"
                ></v-text-field>

                <v-card-actions>
                  <v-spacer></v-spacer>
                  <v-btn
                    color="color_add white--text"
                    type="submit"
                    >Login</v-btn
                  >
                </v-card-actions>
              </v-form>
            </v-card-text>
          </v-card>
        </v-flex>
      </v-layout>
    </v-container>
  </v-app>
</template>

<script>
import JetAuthenticationCard from '@/Jetstream/AuthenticationCard';
import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo';
import JetButton from '@/Jetstream/Button';
import JetInput from '@/Jetstream/Input';
import JetCheckbox from '@/Jetstream/Checkbox';
import JetLabel from '@/Jetstream/Label';
import JetValidationErrors from '@/Jetstream/ValidationErrors';

export default {
  components: {
    JetAuthenticationCard,
    JetAuthenticationCardLogo,
    JetButton,
    JetInput,
    JetCheckbox,
    JetLabel,
    JetValidationErrors,
  },

  props: {
    canResetPassword: Boolean,
    status: String,
  },

  data() {
    return {
      form: this.$inertia.form({
        login: '',
        password: '',
        remember: false,
      }),
    };
  },

  methods: {
    submit() {
      this.form
        .transform((data) => ({
          ...data,
          remember: this.form.remember ? 'on' : '',
        }))
        .post(this.route('login'), {
          onFinish: () => this.form.reset('password'),
        });
    },
  },

  computed: {
    errors() {
      return this.$page.props.errors;
    },
    hasErrors() {
      return Object.keys(this.errors).length > 0;
    },
  },
};
</script>
