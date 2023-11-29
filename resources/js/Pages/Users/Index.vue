<template>
  <div class="users">
    <Head title="Users" />

    <v-container class="my-5">
      <!-- add user dialog -->

      <h2 class="text-overline-edited">USERS</h2>

      <v-row>
        <v-col
          cols="12"
          class="text-right mb-2"
        >
          <v-dialog
            v-model="dialog"
            @keydown.esc="cancel"
            @click:outside="cancel"
            width="500"
          >
            <template v-slot:activator="{ on, attrs }">
              <v-btn
                color="color_primary white--text"
                v-bind="attrs"
                v-on="on"
              >
                <v-icon left>mdi-account-plus</v-icon>
                <span>Add user</span>
              </v-btn>
            </template>

            <v-card>
              <v-card-title
                class="text-h6-edited color_primary white--text"
                v-if="formTitle == 'Create User'"
              >
                {{ formTitle }}
              </v-card-title>
              <v-card-title
                class="text-h6-edited color_secondary white--text d-flex justify-space-between"
                v-if="formTitle == 'Edit User'"
              >
                {{ formTitle }}
              </v-card-title>

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
                        color="color_primary"
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
                      class="py-0"
                    >
                      <v-select
                        v-model="form.role"
                        :error-messages="form.errors.role"
                        color="color_primary"
                        :items="roles"
                        label="Role"
                      >
                      </v-select>
                    </v-col>

                    <v-col
                      cols="12"
                      md="6"
                      class="py-0"
                    >
                      <v-text-field
                        v-model="form.firstName"
                        :error-messages="form.errors.firstName"
                        color="color_primary"
                        autofocus
                        clearable
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
                        color="color_primary"
                        clearable
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
                        color="color_primary"
                        clearable
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
                        color="color_primary"
                        clearable
                        label="Suffix"
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
                        color="color_primary"
                        clearable
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
                        :append-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'"
                        :type="showPassword ? 'text' : 'password'"
                        @click:append="showPassword = !showPassword"
                        id="password"
                        color="color_primary"
                        name="password"
                        label="Password"
                        :error-messages="form.errors.password"
                        @keyup.enter="submit"
                      ></v-text-field>
                    </v-col>

                    <v-col
                      cols="12"
                      class="py-0"
                    >
                      <v-select
                        v-model="form.status"
                        :error-messages="form.errors.status"
                        color="color_primary"
                        :items="status"
                        label="Status"
                      >
                      </v-select>
                    </v-col>

                    <v-col
                      cols="12"
                      class="py-0"
                    >
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
                    </v-col>
                  </v-row>
                </v-form>
              </v-card-text>

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
                    v-if="isUpdate == false"
                    color="color_primary white--text"
                    :loading="form.processing"
                    @click="submit"
                    @keyup.enter="submit"
                  >
                    Save
                  </v-btn>

                  <v-btn
                    v-else
                    color="color_secondary white--text"
                    :loading="form.processing"
                    @click="submit"
                    @keyup.enter="submit"
                  >
                    Update
                  </v-btn>
                </div>
              </v-card-actions>
            </v-card>
          </v-dialog>
        </v-col>
      </v-row>

      <v-card
        text
        :class="{
          color_main_dark_background: $vuetify.theme.dark,
        }"
        elevation="20"
      >
        <v-card-text>
          <v-row class="d-flex justify-end">
            <v-menu
              offset-y
              :close-on-content-click="false"
            >
              <template v-slot:activator="{ on, attrs }">
                <v-btn
                  v-bind="attrs"
                  v-on="on"
                  color="primary"
                  class="ma-2"
                >
                  FILTER
                </v-btn>
              </template>
              <v-card style="width: 280px; padding: 1em">
                <v-card-title class="ma-0 pa-0"> Filter </v-card-title>
                <v-divider></v-divider>
                <div class="d-flex flex-column mt-1 pa-0">
                  <v-text-field
                    v-model="search"
                    append-icon="mdi-magnify"
                    color="color_primary"
                    label="Search Users"
                    outlined
                    clearable
                  ></v-text-field>

                  <v-select
                    v-model="filterStatus"
                    color="color_primary"
                    :items="status"
                    outlined
                    label="Status"
                    clearable
                    dense
                  >
                  </v-select>

                  <v-select
                    :items="locations"
                    v-model="filterLocation"
                    item-text="wardname"
                    item-value="wardcode"
                    label="Location"
                    color="color_primary"
                    class="ma-0 pa-0"
                    dense
                    outlined
                    clearable
                  ></v-select>

                  <v-divider></v-divider>

                  <v-card-actions class="px-0 mb-0">
                    <v-btn
                      @click="clearFilter"
                      class="ma-0 pa-0 align-self-start"
                      color="color_error white--text"
                    >
                      Clear
                    </v-btn>
                  </v-card-actions>
                </div>
              </v-card>
            </v-menu>
          </v-row>
        </v-card-text>

        <v-data-table
          fixed-header
          dense
          :search="search"
          :headers="headers"
          :items="users.data"
          :items-per-page="15"
          :options.sync="options"
          :server-items-length="users.total"
          class="elevation-1 row_pointer"
          :class="{
            color_main_dark_background: $vuetify.theme.dark,
          }"
        >
          <!-- avatar -->
          <template #item.image="{ item }">
            <v-avatar
              v-if="item.image != null"
              class="my-2"
              size="34"
            >
              <img :src="`/storage/${item.image}`" />
            </v-avatar>
            <v-avatar
              v-else
              class="my-2"
              size="34"
            >
              <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" />
            </v-avatar>
          </template>

          <!-- full name -->
          <template #item.fullName="{ item }">
            {{ item.firstName }} {{ item.middleName }} {{ item.lastName }}
            <span v-if="item.suffix != null">{{ item.suffix }}</span>
          </template>

          <template v-slot:item.status="{ item }">
            <v-chip
              v-if="item.status == 'activated'"
              class="pa-2 green--text darken-4 text-uppercase"
              label
              small
              input-value="true"
            >
              {{ item.status }}
            </v-chip>
            <v-chip
              v-else
              class="pa-2 pink--text darken-4 text-uppercase"
              label
              small
              input-value="true"
            >
              {{ item.status }}
            </v-chip>
          </template>

          <template v-slot:item.actions="{ item }">
            <div class="d-flex flex-no-wrap">
              <v-icon
                size="20"
                class="mr-1"
                color="color_secondary"
                @click="editItem(item)"
              >
                mdi-pencil
              </v-icon>

              <v-icon
                size="20"
                color="color_error"
                @click.stop="deleteItem(item)"
              >
                mdi-delete
              </v-icon>
            </div>
          </template>

          <template #item.created_at="{ item }">
            <span class="text-no-wrap">{{ tzone(item.created_at) }}</span>
          </template>

          <!-- pagination -->
          <template #[`item.index`]="{ index }">
            {{ (options.page - 1) * options.itemsPerPage + index + 1 }}
          </template>
        </v-data-table>
      </v-card>
      <!-- end data table  -->

      <!-- delete user modal -->
      <v-dialog
        v-model="dialogDelete"
        max-width="500"
      >
        <v-card>
          <v-card-title class="text-h5-edited"> Delete user </v-card-title>
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
                color="error"
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
    users: Object,
    locations: Array,
  },
  data() {
    return {
      filterStatus: null,
      filterLocation: null,
      showPassword: false,
      locationList: [],
      status: ['activated', 'deactivated'],
      roles: ['admin', 'user'],
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
          class: 'color_main_dark_background',
        },
        {
          text: 'ROLE',
          align: 'start',
          value: 'role',
          sortable: false,
          class: 'color_main_dark_background',
        },
        {
          text: 'NAME',
          align: 'start',
          value: 'fullName',
          sortable: false,
          class: 'color_main_dark_background',
        },
        {
          text: 'USERNAME',
          align: 'start',
          value: 'username',
          class: 'color_main_dark_background',
        },
        {
          text: 'STATUS',
          align: 'start',
          value: 'status',
          class: 'color_main_dark_background',
        },
        {
          text: 'CREATED AT',
          align: 'start',
          value: 'created_at',
          sortable: false,
          class: 'color_main_dark_background',
        },
        { text: 'Actions', value: 'actions', sortable: false, class: 'color_main_dark_background' },
      ],
      form: this.$inertia.form({
        firstName: null,
        middleName: null,
        lastName: null,
        suffix: null,
        username: null,
        password: null,
        image: null,
        status: null,
        role: null,
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
    updateData() {
      this.$inertia.get('users', this.params, {
        preserveState: true,
        preserveScroll: true,
      });
    },
    tzone(date) {
      return moment.tz(date, 'Asia/Manila').format('LLL');
    },
    clearFilter() {
      this.employee_id = null;
      this.pss_id = null;
      this.from = null;
      this.to = null;
      this.sex = 'NO FILTER';
      this.education = 'NO FILTER';
      this.department = null;
      this.location = null;
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
            _method: 'PUT',
            preserveScroll: true,
            firstName: this.form.firstName,
            middleName: this.form.middleName,
            lastName: this.form.lastName,
            suffix: this.form.suffix,
            username: this.form.username,
            password: this.form.password,
            image: this.form.image,
            status: this.form.status,
            locations: this.form.locations,
            role: this.form.role,
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
      // get the users locations
      let userLocationsCopy = [];
      if (item.user_locations.length != 0) {
        // console.log('test');
        item.user_locations.forEach((e) => {
          //   console.log('e', e);
          if (e.pss_location_detail != null) {
            userLocationsCopy.push(e.pss_location_detail.wardcode);
          }
          if (e.ward_location_detail != null) {
            userLocationsCopy.push(e.ward_location_detail.wardcode);
          }
        });
      }
      // end get the users locations

      this.form.firstName = item.firstName;
      this.form.middleName = item.middleName;
      this.form.lastName = item.lastName;
      this.form.suffix = item.suffix;
      this.form.username = item.username;
      this.form.password = item.password;
      this.form.status = item.status;
      this.form.role = item.role;
      this.form.locations = userLocationsCopy.slice(0);
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
      this.snackColor = 'color_secondary';
      this.snackText = 'Account updated.';
    },
    deletedMsg() {
      this.snack = true;
      this.snackColor = 'color_error';
      this.snackText = 'Account deleted.';
    },
  },
  computed: {
    user() {
      return this.$page.props.auth.user;
    },
    formTitle() {
      return this.isUpdate ? 'Edit User' : 'Create User';
    },
  },
  watch: {
    options: function (val) {
      this.params.page = val.page;
      this.params.page_size = val.itemsPerPage;
      // if (val.sortBy.length != 0) {
      this.params.sort_by = val.sortBy[0];
      this.params.order_by = val.sortDesc[0] ? 'asc' : 'desc';
      // } else {
      //   this.params.sort_by = null;
      //   this.params.order_by = null;
      // }
      this.updateData();
    },
    search: function (val) {
      this.params.search = val;
      this.params.page = 1;
      this.updateData();
    },
    filterStatus: function (val) {
      this.params.status = val;
      this.params.page = 1;
      this.updateData();
    },
    filterLocation: function (val) {
      this.params.location = val;
      this.updateData();
    },
  },
};
</script>

<style scoped>
.v-select .v-select__selections > input {
  display: none !important;
}

.row_pointer {
  cursor: pointer;
}
</style>
