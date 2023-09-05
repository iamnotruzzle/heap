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

                    <h4 class="text-h4-edited text-center prevent-wrap">HOSPITAL CLIENT EXPERIENCE SURVEY</h4>
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

                    <h4 class="text-h4-edited text-center prevent-wrap">HOSPITAL CLIENT EXPERIENCE SURVEY</h4>
                  </v-col>
                </v-row>
              </v-layout>
            </v-card-title>
            <v-divider></v-divider>
            <v-card-text>
              <p>Register Account</p>
              <v-form @submit.prevent="submit">
                <v-text-field
                  v-model="form.firstName"
                  color="color_primary"
                  label="First name"
                  :error-messages="form.errors.firstName"
                ></v-text-field>
                <v-text-field
                  v-model="form.middleName"
                  color="color_primary"
                  label="Middle name"
                  :error-messages="form.errors.middleName"
                ></v-text-field>
                <v-text-field
                  v-model="form.lastName"
                  color="color_primary"
                  label="Last name"
                  :error-messages="form.errors.lastName"
                ></v-text-field>
                <v-text-field
                  v-model="form.suffix"
                  color="color_primary"
                  label="Suffix"
                ></v-text-field>
                <v-select
                  v-model="form.locations"
                  :items="locationList"
                  item-text="wardname"
                  item-value="wardcode"
                  label="Location"
                  persistent-hint
                  single-line
                  multiple
                  chips
                  :error-messages="form.errors.locations"
                  color="color_primary"
                >
                </v-select>
                <v-text-field
                  v-model="form.username"
                  color="color_primary"
                  label="Employee ID"
                  :error-messages="form.errors.username"
                ></v-text-field>
                <v-text-field
                  v-model="form.password"
                  :append-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'"
                  :type="showPassword ? 'text' : 'password'"
                  @click:append="showPassword = !showPassword"
                  id="password"
                  color="color_primary"
                  name="password"
                  label="Password"
                  :error-messages="form.errors.password"
                ></v-text-field>

                <v-card-actions :class="{ 'pa-3': $vuetify.breakpoint.smAndUp }">
                  <a href="/">Sign in</a>
                  <v-spacer></v-spacer>
                  <v-btn
                    color="blue darken-1 white--text pa-0"
                    :large="$vuetify.breakpoint.smAndUp"
                    @click="submit"
                    @keyup.enter="submit"
                    x-small
                  >
                    Register
                  </v-btn>
                </v-card-actions>
              </v-form>
            </v-card-text>
            <v-divider></v-divider>
          </v-card>
        </v-flex>
      </v-layout>
    </v-container>

    <!-- snackbar -->
    <v-snackbar
      v-model="snack"
      :timeout="50000"
      :color="snackColor"
    >
      <span class="text-body-1">{{ snackText }}</span>

      <template v-slot:action="{ attrs }">
        <v-btn
          v-bind="attrs"
          text
          @click="snack = false"
        >
          Close
        </v-btn>
      </template>
    </v-snackbar>
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
      loading: null,
      snack: false,
      snackColor: null,
      snackText: '',
      locationList: [],
      form: this.$inertia.form({
        firstName: null,
        middleName: null,
        lastName: null,
        suffix: null,
        username: null,
        password: null,
        locations: [],
      }),
    };
  },
  mounted() {
    // console.log(this.authUser);

    this.storeLocationInContainer();
  },
  methods: {
    storeLocationInContainer() {
      this.$page.props.pss_location.forEach((e) => {
        // if (e.wardcode != 'admin') {
        this.locationList.push({
          wardcode: e.wardcode,
          wardname: e.wardname,
        });
        // }
      });

      this.$page.props.ward_location.forEach((e) => {
        this.locationList.push({
          wardcode: e.wardcode,
          wardname: e.wardname,
        });
      });
    },
    submit() {
      //   console.log(this.$page.props);

      this.form.post(route('register.store'), {
        preserveScroll: true,
        onSuccess: () => {
          this.isLoading = true;
          this.dialog = false;
          this.form.reset();
          this.registeredMsg();
        },
      });
    },
    registeredMsg() {
      this.snack = true;
      this.snackColor = 'color_primary';
      this.snackText = 'Registered successfully, your account is being reviewed for approval.';
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
