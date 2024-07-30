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
          md6
        >
          <v-card
            elevation="20"
            tag="section"
          >
            <v-card-title>
              <v-layout
                align-center
                justify-space-between
              >
                <v-row class="d-flex align-center">
                  <v-col
                    v-if="$vuetify.breakpoint.smAndDown"
                    cols="12"
                    class="d-flex justify-center flex-column align-center"
                  >
                    <img
                      height="90px"
                      src="images/hosp_logo.png"
                      class="mr-4 mb-2"
                    />

                    <h4 class="text-h4-edited text-center prevent-wrap">HOSPITAL EDUCATION AND ADVOCACY PROGRAMS</h4>
                  </v-col>

                  <v-col
                    v-if="$vuetify.breakpoint.mdAndUp"
                    cols="12"
                    class="d-flex justify-center align-center"
                  >
                    <img
                      height="90px"
                      src="images/hosp_logo.png"
                      class="mr-4 mb-2"
                    />

                    <h4 class="text-h4-edited text-center prevent-wrap">HOSPITAL EDUCATION AND ADVOCACY PROGRAMS</h4>
                  </v-col>
                </v-row>
              </v-layout>
            </v-card-title>
            <v-divider></v-divider>
            <v-card-text>
              <div
                v-if="hasErrors"
                class="text-center red--text ma-2"
              >
                <p
                  class="font-weight-black test-h6 ma-0 pa-0"
                  v-for="(error, key) in errors"
                  :key="key"
                >
                  {{ error }}
                </p>
              </div>

              <p>Sign in with your username and password:</p>
              <v-form @submit.prevent="submit">
                <v-text-field
                  v-model="form.login"
                  prepend-icon="mdi-account"
                  color="color_primary"
                  name="login"
                  label="Username"
                  type="login"
                ></v-text-field>
                <v-text-field
                  v-model="form.password"
                  :append-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'"
                  :type="showPassword ? 'text' : 'password'"
                  @click:append="showPassword = !showPassword"
                  id="password"
                  prepend-icon="mdi-lock"
                  color="color_primary"
                  name="password"
                  label="Password"
                ></v-text-field>

                <v-card-actions :class="{ 'pa-3': $vuetify.breakpoint.smAndUp }">
                  <a href="register">Not yet registered?</a>
                  <v-spacer></v-spacer>
                  <v-btn
                    color="color_primary white--text pa-0"
                    :large="$vuetify.breakpoint.smAndUp"
                    type="submit"
                    x-small
                  >
                    Login
                  </v-btn>
                </v-card-actions>
              </v-form>
            </v-card-text>
            <v-divider></v-divider>
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
      showPassword: false,
      form: this.$inertia.form({
        login: '',
        password: '',
        remember: false,
      }),
    };
  },
  mounted() {},
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

<style scoped>
.v-select .v-select__selections > input {
  display: none !important;
}

.prevent-wrap {
  /* white-space: pre-wrap; */
  word-break: keep-all;
}
</style>
