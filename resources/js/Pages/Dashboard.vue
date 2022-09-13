<template>
  <div class="management">
    <Head>
      <title>VILT-TEMPLATE Dashboard</title>
    </Head>

    <h1 class="subtitle-1 grey--text">Dashboard</h1>

    <v-container class="my-5">
      <!-- create modal -->
      <v-row>
        <v-dialog
          v-model="dialog"
          width="500"
          persistent
        >
          <template v-slot:activator="{ on, attrs }">
            <v-col class="text-right">
              <v-btn
                color="info mb-2"
                v-bind="attrs"
                v-on="on"
              >
                <v-icon left>mdi-account-plus</v-icon>
                <span>Add user</span>
              </v-btn>
            </v-col>
          </template>

          <v-card>
            <v-card-title class="text-h5"> Add new user </v-card-title>

            <v-divider></v-divider>

            <v-card-text>
              <v-form
                ref="form"
                v-model="valid"
              >
                <v-row>
                  <v-col>
                    <v-text-field
                      v-model="firstname"
                      :rules="nameRules"
                      outlined
                      label="First name"
                      required
                    ></v-text-field>

                    <v-text-field
                      v-model="lastname"
                      :rules="nameRules"
                      outlined
                      label="Last name"
                      required
                    ></v-text-field>

                    <v-text-field
                      v-model="email"
                      :rules="emailRules"
                      outlined
                      label="E-mail"
                      required
                    ></v-text-field>

                    <v-radio-group
                      v-model="gender"
                      :rules="genderRules"
                      label="Gender"
                      row
                    >
                      <v-radio
                        label="Male"
                        value="male"
                      ></v-radio>
                      <v-radio
                        label="Female"
                        value="female"
                      ></v-radio>
                    </v-radio-group>

                    <v-select
                      v-model="role"
                      :items="roles"
                      :rules="roleRules"
                      outlined
                      label="Role"
                      item-text="title"
                      item-value="id"
                    ></v-select>

                    <v-menu
                      ref="menu"
                      v-model="menu"
                      :close-on-content-click="false"
                      :return-value.sync="dateOfBirth"
                      transition="scale-transition"
                      offset-y
                      min-width="auto"
                    >
                      <template v-slot:activator="{ on, attrs }">
                        <v-text-field
                          v-model="dateOfBirth"
                          label="Date of birth"
                          :rules="dateOfBirthRules"
                          outlined
                          readonly
                          v-bind="attrs"
                          v-on="on"
                        ></v-text-field>
                      </template>
                      <v-date-picker
                        v-model="dateOfBirth"
                        no-title
                        scrollable
                      >
                        <v-spacer></v-spacer>
                        <v-btn
                          text
                          color="primary"
                          @click="menu = false"
                        >
                          Cancel
                        </v-btn>
                        <v-btn
                          text
                          color="primary"
                          @click="$refs.menu.save(dateOfBirth)"
                        >
                          OK
                        </v-btn>
                      </v-date-picker>
                    </v-menu>
                  </v-col>
                </v-row>
              </v-form>
            </v-card-text>

            <v-divider></v-divider>

            <v-card-actions>
              <v-spacer></v-spacer>
              <div>
                <v-btn
                  color="secondary"
                  text
                  @click="cancel"
                >
                  Cancel
                </v-btn>

                <v-btn
                  color="primary"
                  text
                  @click="cancel"
                >
                  Save
                </v-btn>
              </div>
            </v-card-actions>
          </v-card>
        </v-dialog>
      </v-row>
      <!-- end create modal -->

      <!-- data table  -->
      <v-card text>
        <v-card-title>
          <div>Users</div>
          <v-spacer></v-spacer>
          <v-text-field
            v-model="search"
            append-icon="mdi-magnify"
            label="Search"
            single-line
            hide-details
          ></v-text-field>
        </v-card-title>
        <v-data-table
          fixed-header
          :search="search"
          :headers="headers"
          :items="team"
          :items-per-page="5"
          class="elevation-1"
        >
          <template v-slot:item.actions="{ item }">
            <v-icon
              small
              class="mr-2"
              @click="editItem(item)"
            >
              mdi-pencil
            </v-icon>
            <v-icon
              small
              @click=""
            >
              mdi-delete
            </v-icon>
          </template>
        </v-data-table>
      </v-card>
      <!-- end data table  -->
    </v-container>
  </div>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout';
import { Head } from '@inertiajs/inertia-vue';

export default {
  layout: (h, page) => h(Layout, [page]),

  // Using the shorthand
  layout: AppLayout,
  components: {
    AppLayout,
  },
  data() {
    return {
      dialog: false,
      valid: true,
      url: null,
      firstname: '',
      lastname: '',
      nameRules: [(v) => !!v || 'Name is required'],
      email: '',
      emailRules: [(v) => !!v || 'E-mail is required', (v) => /.+@.+/.test(v) || 'E-mail must be valid'],
      gender: '',
      genderRules: [(v) => !!v || 'Gender is required'],
      role: 0,
      roles: [
        { id: 1, title: 'Admin' },
        { id: 2, title: 'User' },
      ],
      roleRules: [(v) => !!v || 'Role is required'],
      menu: false,
      dateOfBirth: '',
      dateOfBirthRules: [(v) => !!v || 'Date of birth is required'],
      search: '',
      headers: [
        {
          text: 'Name',
          align: 'start',
          sortable: false,
          value: 'name',
        },
        { text: 'Role', value: 'role' },
        { text: 'Email', value: 'email' },
        { text: 'Actions', value: 'actions', filterable: false, sortable: false },
      ],
      team: [
        { name: 'The Net Ninja', role: 'Web developer', email: 'nn@gmail.com' },
        { name: 'Ryu', role: 'Graphic designer', email: 'ryu@gmail.com' },
        { name: 'Chun Li', role: 'Web developer', email: 'chun@gmail.com' },
        { name: 'Gouken', role: 'Social media maverick', email: 'goukenn@email.com' },
        { name: 'Yoshi', role: 'Sales guru', email: 'yoshi@email' },
        { name: 'Max', role: 'Sales guru', email: 'Max@email' },
      ],
    };
  },
  methods: {
    cancel() {
      this.dialog = false;
      // reset form
      this.$refs.form.reset();
      // reset validation
      this.$refs.form.resetValidation();
    },
    editItem(item) {
      this.dialog = true;
    },
  },
};
</script>

<style scoped>
.vrow {
  border-style: solid;
  border-color: red;
}
.vcol {
  border-style: solid;
  border-color: purple;
}
.v-select .v-select__selections > input {
  display: none !important;
}
</style>
