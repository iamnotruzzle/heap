<template>
  <div class="users">
    <Head title="Users" />

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
                color="color_primary mb-2"
                v-bind="attrs"
                v-on="on"
              >
                <v-icon left>mdi-account-plus</v-icon>
                <span>Add user</span>
              </v-btn>
            </v-col>
          </template>

          <v-card>
            <v-card-title class="text-h6-edited color_secondary"> {{ formTitle }} </v-card-title>

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
                      label="Suffix"
                      @keyup.enter="submit"
                    ></v-text-field>
                  </v-col>

                  <v-col
                    cols="12"
                    class="py-0"
                  >
                    <v-select
                      v-model="form.role"
                      :error-messages="form.errors.role"
                      :items="roles"
                      label="Role"
                      outlined
                    >
                    </v-select>
                  </v-col>

                  <v-col
                    cols="12"
                    class="py-0"
                    v-if="form.role === 'editor'"
                  >
                    <v-select
                      v-model="form.permissions"
                      :items="permissions"
                      :menu-props="{ maxHeight: '300' }"
                      label="Authorization"
                      outlined
                      multiple
                    >
                      <template v-slot:prepend-item>
                        <v-list-item
                          ripple
                          @mousedown.prevent
                          @click="toggle"
                        >
                          <v-list-item-action>
                            <v-icon :color="selectedPermissions.length > 0 ? 'indigo darken-4' : ''">
                              {{ icon }}
                            </v-icon>
                          </v-list-item-action>
                          <v-list-item-content>
                            <v-list-item-title> Select All </v-list-item-title>
                          </v-list-item-content>
                        </v-list-item>
                        <v-divider class="mt-2"></v-divider>
                      </template>

                      <template v-slot:selection="{ item, index }">
                        <v-chip v-if="index === 0">
                          <span>{{ item }}</span>
                        </v-chip>
                        <span
                          v-if="index === 1"
                          class="grey--text text-caption"
                        >
                          (+{{ form.permissions.length - 1 }} others)
                        </span>
                      </template>
                    </v-select>
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
                  color="color_secondary_accent"
                  text
                  :loading="form.processing"
                  @click="submit"
                  @keyup.enter="submit"
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

      <!-- data table  -->
      <v-card
        text
        class="rounded-data__table"
      >
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
        <!-- :items="users.data" -->
        <!-- :items="users" -->

        <!-- TODO fix column size -->
        <v-data-table
          fixed-header
          dense
          :search="search"
          :headers="headers"
          :items="users.data"
          :items-per-page="15"
          :options.sync="options"
          :server-items-length="users.total"
          class="elevation-1"
        >
          <!-- avatar -->
          <template #item.image="{ item }">
            <v-avatar
              v-if="item.image != null"
              class="my-2"
            >
              <img :src="`/storage/${item.image}`" />
            </v-avatar>
            <v-avatar
              v-else
              class="my-2"
            >
              <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" />
            </v-avatar>
          </template>

          <!-- full name -->
          <template #item.fullName="{ item }">
            {{ item.firstName }} {{ item.middleName }} {{ item.lastName }}
            <span v-if="item.suffix != null">{{ item.suffix }}</span>
          </template>

          <!-- role -->
          <template #item.role="{ item }">
            {{ item.roles[0].name }}
          </template>

          <!-- permissions -->
          <template v-slot:item.permissions="{ item }">
            <v-chip
              v-if="item.roles[0].name === 'editor' && item.permissions.length > 0"
              class="pa-2 pink--text darken-4"
              label
              small
              input-value="true"
              @click="editItem(item)"
            >
              List
            </v-chip>
            <v-chip
              v-else-if="item.roles[0].name === 'editor'"
              class="pa-2 cyan--text"
              label
              small
              input-value="true"
            >
              Dashboards only
            </v-chip>
            <v-chip
              v-else
              class="pa-2 green--text"
              label
              small
              input-value="true"
            >
              Max authorization
            </v-chip>
          </template>

          <template v-slot:item.actions="{ item }">
            <!-- {{ item.roles[0].name }} -->
            <!-- $page.props.auth.user.roles[0] -->
            <div v-if="$page.props.auth.user.roles[0] == 'admin' && item.roles[0].name != 'super-admin'">
              <v-icon
                small
                color="yellow darken-4"
                @click="editItem(item)"
              >
                mdi-pencil
              </v-icon>

              <v-icon
                small
                color="red"
                @click="deleteItem(item)"
              >
                mdi-delete
              </v-icon>
            </div>

            <div v-if="$page.props.auth.user.roles[0] == 'super-admin'">
              <v-icon
                small
                color="yellow darken-4"
                @click="editItem(item)"
              >
                mdi-pencil
              </v-icon>

              <v-icon
                small
                color="red"
                @click="deleteItem(item)"
              >
                mdi-delete
              </v-icon>
            </div>
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
      roles: ['super-admin', 'admin', 'editor'],
      selectedPermissions: [],
      userPermissionList: [],
      permissions: [
        'create-icu-bed',
        'edit-icu-bed',
        'delete-icu-bed',
        'create-icu-bed-entry',
        'edit-icu-bed-entry',
        'delete-icu-bed-entry',
        'create-non-icu-bed',
        'edit-non-icu-bed',
        'delete-non-icu-bed',
        'create-non-icu-bed-entry',
        'edit-non-icu-bed-entry',
        'delete-non-icu-bed-entry',
        'create-suspect',
        'edit-suspect',
        'delete-suspect',
        'create-probable',
        'edit-probable',
        'delete-probable',
        'create-confirmed',
        'edit-confirmed',
        'delete-confirmed',
        'create-waitlisted',
        'edit-waitlisted',
        'delete-waitlisted',
        'create-ndd',
        'edit-ndd',
        'delete-ndd',
        'create-hcw-confirmed',
        'edit-hcw-confirmed',
        'delete-hcw-confirmed',
        'create-hcw-quarantined',
        'edit-hcw-quarantined',
        'delete-hcw-quarantined',
        'create-hcw-per-division',
        'edit-hcw-per-division',
        'delete-hcw-per-division',
        'create-c19-equipment',
        'edit-c19-equipment',
        'delete-c19-equipment',
        'create-c19-equipment-entry',
        'edit-c19-equipment-entry',
        'delete-c19-equipment-entry',
        'create-c19-mv-area',
        'edit-c19-mv-area',
        'delete-c19-mv-area',
        'create-c19-mv-area-entry',
        'edit-c19-mv-area-entry',
        'delete-c19-mv-area-entry',
        'create-non-c19-mv-area',
        'edit-non-c19-mv-area',
        'delete-non-c19-mv-area',
        'create-non-c19-mv-area-entry',
        'edit-non-c19-mv-area-entry',
        'delete-non-c19-mv-area-entry',
        'create-medical-oxygen',
        'edit-medical-oxygen',
        'delete-medical-oxygen',
        'create-compressed-air',
        'edit-compressed-air',
        'delete-compressed-air',
        'create-flask-type',
        'edit-flask-type',
        'delete-flask-type',
        'create-c19-supplies',
        'edit-c19-supplies',
        'delete-c19-supplies',
      ],
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
          text: 'ROLE',
          align: 'start',
          value: 'role',
          sortable: false,
        },
        {
          text: 'AUTHORIZATION',
          align: 'start',
          value: 'permissions',
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
        role: null,
        permissions: [],
        email: null,
        username: null,
        password: null,
        image: null,
      }),
    };
  },
  mounted() {},
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
            role: this.form.role,
            permissions: this.form.permissions,
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
      // get the users permissions
      let permissionsCopy = [];
      item.permissions.forEach((e) => {
        permissionsCopy.push(e.name);
      });
      // end get the users permissions

      this.form.firstName = item.firstName;
      this.form.middleName = item.middleName;
      this.form.lastName = item.lastName;
      this.form.suffix = item.suffix;
      this.form.role = item.roles[0].name;
      this.form.permissions = permissionsCopy.slice(0);
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
      this.snackColor = 'color_secondary';
      this.snackText = 'Account saved.';
    },
    updatedMsg() {
      this.snack = true;
      this.snackColor = 'color_primary';
      this.snackText = 'Account updated.';
    },
    deletedMsg() {
      this.snack = true;
      this.snackColor = 'color_error';
      this.snackText = 'Account deleted.';
    },
    toggle() {
      this.$nextTick(() => {
        if (this.selectedAllPermissions) {
          this.form.permissions = [];
        } else {
          this.form.permissions = this.permissions.slice();
        }
      });
    },
    can(permission) {
      // Check Permissions
      //   let data = this.$page.props.auth.user.permissions.filter((ability) => ability === permission);

      if (
        this.$page.props.auth.user.roles[0] === 'super-admin' ||
        this.$page.props.auth.user.roles[0] === 'admin' ||
        data.length > 0
      ) {
        return true;
      } else {
        return false;
      }
    },
  },
  computed: {
    user() {
      return this.$page.props.auth.user;
    },
    formTitle() {
      return this.isUpdate ? 'Edit User' : 'Create User';
    },
    selectedAllPermissions() {
      return this.form.permissions.length === this.permissions.length;
    },
    selectedSomePermissions() {
      return this.form.permissions.length > 0 && !this.selectedAllPermissions;
    },
    icon() {
      if (this.selectedAllPermissions) return 'mdi-close-box';
      if (this.selectedSomePermissions) return 'mdi-minus-box';
      return 'mdi-checkbox-blank-outline';
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

.rounded-data__table {
  border-radius: 24px;
}
</style>
