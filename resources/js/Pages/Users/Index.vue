<template>
  <div class="users">
    <Head title="Users" />

    <h1 class="text-subtitle-1-edited grey--text">Users</h1>

    <v-container class="my-5">
      <!-- create user modal -->
      <v-row>
        <v-dialog
          v-model="dialog"
          @keydown.esc="cancel"
          @click:outside="cancel"
          width="500"
        >
          <template v-slot:activator="{ on, attrs }">
            <v-col class="text-right">
              <v-btn
                color="color_secondary white--text mb-2"
                v-bind="attrs"
                v-on="on"
              >
                <v-icon left>mdi-account-plus</v-icon>
                <span>Add user</span>
              </v-btn>
            </v-col>
          </template>

          <v-card>
            <v-card-title class="text-h6-edited color_primary white--text"> {{ formTitle }} </v-card-title>

            <!-- form -->
            <v-card-text class="mt-8">
              <v-form
                ref="form"
                v-model="valid"
              >
                <v-row>
                  <v-col
                    cols="12"
                    class="py-0"
                  >
                    <v-file-input
                      v-model="form.image"
                      @input="form.image = $event.target.files[0]"
                      :error-messages="form.errors.image"
                      outlined
                      color="black"
                      chips
                      show-size
                      small-chips
                      label="Image"
                      prepend-icon=""
                      truncate-length="15"
                    ></v-file-input>
                  </v-col>

                  <v-col
                    cols="12"
                    md="6"
                    class="py-0"
                  >
                    <v-text-field
                      v-model="form.firstName"
                      :error-messages="form.errors.firstName"
                      outlined
                      autofocus
                      clearable
                      color="black"
                      label="Given name"
                      required
                      @keyup.enter="submit"
                    ></v-text-field>
                  </v-col>

                  <v-col
                    cols="12"
                    md="6"
                    class="py-0"
                  >
                    <v-text-field
                      v-model="form.middleName"
                      :error-messages="form.errors.middleName"
                      outlined
                      clearable
                      color="black"
                      label="Middle name"
                      @keyup.enter="submit"
                    ></v-text-field>
                  </v-col>

                  <v-col
                    cols="12"
                    md="6"
                    class="py-0"
                  >
                    <v-text-field
                      v-model="form.lastName"
                      :error-messages="form.errors.lastName"
                      outlined
                      clearable
                      color="black"
                      label="Last name"
                      required
                      @keyup.enter="submit"
                    ></v-text-field>
                  </v-col>

                  <v-col
                    cols="12"
                    md="6"
                    class="py-0"
                  >
                    <v-text-field
                      v-model="form.suffix"
                      :error-messages="form.errors.suffix"
                      outlined
                      clearable
                      color="black"
                      label="Suffix"
                      @keyup.enter="submit"
                    ></v-text-field>
                  </v-col>

                  <v-col
                    cols="12"
                    class="py-0"
                  >
                    <v-text-field
                      v-model="form.email"
                      :error-messages="form.errors.email"
                      outlined
                      clearable
                      color="black"
                      label="E-mail"
                      required
                      @keyup.enter="submit"
                    ></v-text-field>
                  </v-col>

                  <v-col
                    cols="12"
                    class="py-0"
                  >
                    <v-text-field
                      v-model="form.username"
                      :error-messages="form.errors.username"
                      outlined
                      clearable
                      color="black"
                      label="Username"
                      @keyup.enter="submit"
                    ></v-text-field>
                  </v-col>

                  <v-col
                    cols="12"
                    class="py-0"
                  >
                    <v-text-field
                      v-model="form.password"
                      :error-messages="form.errors.password"
                      outlined
                      clearable
                      color="black"
                      label="Password"
                      type="password"
                      required
                      @keyup.enter="submit"
                    ></v-text-field>
                  </v-col>
                </v-row>
              </v-form>
            </v-card-text>
            <!-- end form -->

            <v-divider></v-divider>

            <v-card-actions>
              <v-spacer></v-spacer>
              <div>
                <v-btn
                  color="color_error"
                  text
                  :disabled="form.processing"
                  @click="cancel"
                >
                  Cancel
                </v-btn>

                <v-btn
                  color="color_primary"
                  text
                  :loading="form.processing"
                  @click="submit"
                >
                  Save
                </v-btn>
              </div>
            </v-card-actions>
          </v-card>
        </v-dialog>
      </v-row>
      <!-- end create user modal -->

      <!-- delete user modal -->
      <v-dialog
        v-model="dialogDelete"
        max-width="500"
      >
        <v-card>
          <v-card-title class="text-h5-edited"> Delete User </v-card-title>
          <v-card-text class="text-center text-h6-edited">
            Are you sure you want to delete this user account?
          </v-card-text>
          <v-card-actions>
            <v-spacer></v-spacer>
            <div>
              <v-btn
                text
                :disabled="form.processing"
                @click="dialogDelete = false"
              >
                Cancel
              </v-btn>

              <v-btn
                color="color_error"
                text
                :loading="form.processing"
                @click="destroy"
              >
                Yes, I'm sure
              </v-btn>
            </div>
          </v-card-actions>
        </v-card>
      </v-dialog>
      <!-- end delete user modal -->

      <!-- data table  -->
      <v-card
        text
        class="rounded-data__table"
      >
        <v-card-title>
          <div>Users</div>
          <v-spacer></v-spacer>
          <v-text-field
            color="black"
            dense
            outlined
            clearable
            v-model="search"
            append-icon="mdi-magnify"
            label="Search"
            hide-details
          ></v-text-field>
        </v-card-title>
        <!-- :items="users.data" -->
        <!-- :items="users" -->

        <!-- TODO fix column size -->
        <v-data-table
          fixed-header
          dense
          :search="search"
          :headers="headers"
          :items="users.data"
          :options.sync="options"
          :server-items-length="users.total"
          class="elevation-1"
        >
          <!-- avatar -->
          <template #item.image="{ item }">
            <v-avatar v-if="item.image != null">
              <img :src="`/storage/${item.image}`" />
            </v-avatar>
            <v-avatar v-else>
              <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" />
            </v-avatar>
          </template>

          <!-- full name -->
          <template #item.fullName="{ item }">
            {{ item.firstName }} {{ item.middleName }} {{ item.lastName }}
            <span v-if="item.suffix != null">{{ item.suffix }}</span>
          </template>

          <template v-slot:item.actions="{ item }">
            <v-icon
              small
              color="color_warning"
              @click="editItem(item)"
            >
              mdi-pencil
            </v-icon>

            <v-icon
              small
              color="color_error"
              @click="deleteItem(item)"
            >
              mdi-delete
            </v-icon>
          </template>

          <!-- pagination -->
          <template #[`item.index`]="{ index }">
            {{ (options.page - 1) * options.itemsPerPage + index + 1 }}
          </template>
        </v-data-table>
      </v-card>
      <!-- end data table  -->
    </v-container>

    <!-- snackbar -->
    <v-snackbar
      v-model="snack"
      :timeout="3000"
      :color="snackColor"
    >
      {{ snackText }}

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
  </div>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout';
import { Inertia } from '@inertiajs/inertia';
import { Head } from '@inertiajs/inertia-vue';

export default {
  layout: (h, page) => h(Layout, [page]),

  // Using the shorthand
  layout: AppLayout,

  components: {
    AppLayout,
    Head,
  },
  props: {
    users: Object,
  },
  data() {
    return {
      series: [44, 55, 41, 17, 15],
      chartOptions: {
        chart: {
          type: 'donut',
        },
        responsive: [
          {
            breakpoint: 480,
            options: {
              chart: {
                width: 200,
              },
              legend: {
                position: 'bottom',
              },
            },
          },
        ],
      },

      snack: '',
      snackColor: '',
      snackText: '',
      dialog: false,
      dialogDelete: false,
      itemId: null,
      valid: true,
      url: null,
      isUpdate: false,
      isLoading: false,
      search: '',
      options: {},
      params: {},
      headers: [
        {
          text: 'Avatar',
          align: 'start',
          value: 'image',
          sortable: false,
          filterable: false,
        },
        {
          text: 'NAME',
          align: 'start',
          value: 'fullName',
          sortable: false,
        },
        {
          text: 'USERNAME',
          align: 'start',
          value: 'username',
        },
        {
          text: 'EMAIL',
          align: 'start',
          value: 'email',
        },
        {
          text: 'CREATED AT',
          align: 'start',
          value: 'created_at',
          sortable: false,
        },
        { text: 'Actions', value: 'actions', sortable: false },
      ],
      form: this.$inertia.form({
        firstName: null,
        middleName: null,
        lastName: null,
        suffix: null,
        email: null,
        username: null,
        password: null,
        image: null,
      }),
    };
  },
  methods: {
    updateData() {
      this.$inertia.get('users', this.params, {
        preserveState: true,
        preserveScroll: true,
      });
    },
    cancel() {
      this.dialog = false;
      this.isUpdate = false;
      this.form.reset();
      this.form.clearErrors();
    },
    create() {
      this.dialog = true;
      this.form.reset();
      this.form.clearErrors();
    },
    submit() {
      if (this.isUpdate) {
        // NOTE: only use Inertia.post when updating with files included
        // use this.form.put when there is no need to upload files
        // TODO fix bug where in validation error
        // is not showing when updating
        // Alternative solution: using client side vuetify form validation
        Inertia.post(
          route('users.update', this.itemId),
          {
            _method: 'put',
            preserveScroll: true,
            firstName: this.form.firstName,
            middleName: this.form.middleName,
            lastName: this.form.lastName,
            suffix: this.form.suffix,
            email: this.form.email,
            username: this.form.username,
            password: this.form.password,
            image: this.form.image,
          },
          {
            onSuccess: () => {
              this.isLoading = false;
              this.dialog = false;
              this.isUpdate = false;
              this.itemId = null;
              this.form.reset();
              this.updatedMsg();
            },
          }
        );
      } else {
        this.form.post(route('users.store'), {
          preserveScroll: true,
          onSuccess: () => {
            this.isLoading = true;
            this.dialog = false;
            this.form.reset();
            this.createdMsg();
          },
        });
      }
    },
    editItem(item) {
      this.form.firstName = item.firstName;
      this.form.middleName = item.middleName;
      this.form.lastName = item.lastName;
      this.form.suffix = item.suffix;
      this.form.email = item.email;
      this.form.username = item.username;
      this.form.password = item.password;
      this.isUpdate = true;
      this.itemId = item.id;
      this.dialog = true;
    },
    deleteItem(item) {
      this.itemId = item.id;
      this.dialogDelete = true;
    },
    destroy() {
      this.form.delete(route('users.destroy', this.itemId), {
        preserveScroll: true,
        onSuccess: () => {
          this.dialogDelete = false;
          this.itemId = null;
          this.deletedMsg();
        },
      });
    },
    createdMsg() {
      this.snack = true;
      this.snackColor = 'color_primary';
      this.snackText = 'Account saved.';
    },
    updatedMsg() {
      this.snack = true;
      this.snackColor = 'warning';
      this.snackText = 'Account updated.';
    },
    deletedMsg() {
      this.snack = true;
      this.snackColor = 'color_error';
      this.snackText = 'Account deleted.';
    },
  },
  computed: {
    formTitle() {
      return this.isUpdate ? 'Edit User' : 'Create User';
    },
  },
  watch: {
    options: function (val) {
      this.params.page = val.page;
      this.params.page_size = val.itemsPerPage;
      if (val.sortBy.length != 0) {
        this.params.sort_by = val.sortBy[0];
        this.params.order_by = val.sortDesc[0] ? 'desc' : 'asc';
      } else {
        this.params.sort_by = null;
        this.params.order_by = null;
      }
      this.updateData();
    },
    search: function (val) {
      this.params.search = val;
      this.updateData();
    },
  },
};
</script>

<style scoped>
/* .vrow {
  border-style: solid;
  border-color: red;
}
.vcol {
  border-style: solid;
  border-color: purple;
} */
.v-select .v-select__selections > input {
  display: none !important;
}

.rounded-data__table {
  border-radius: 24px;
}
</style>
