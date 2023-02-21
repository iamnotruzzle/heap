<template>
  <div class="users">
    <Head title="Survey Answers" />

    <v-container class="my-5">
      <!-- add user dialog -->

      <h2 class="text-overline-edited">Survey Answers</h2>

      <v-card
        text
        :class="{
          color_main_dark_background: $vuetify.theme.dark,
        }"
        elevation="20"
      >
        <v-card-text>
          <v-row class="d-flex justify-end">
            <v-col
              cols="12"
              md="6"
              lg="4"
            >
              <v-text-field
                v-model="search"
                append-icon="mdi-magnify"
                color="color_primary"
                label="Search"
                dense
              ></v-text-field>
            </v-col>
          </v-row>
        </v-card-text>

        <v-data-table
          fixed-header
          dense
          :search="search"
          :headers="headers"
          :items="surveyAnswers.data"
          :items-per-page="15"
          :options.sync="options"
          :server-items-length="surveyAnswers.total"
          class="elevation-1 row_pointer"
          :class="{
            color_main_dark_background: $vuetify.theme.dark,
          }"
        >
          <!-- full name -->
          <template #item.departments_visited="{ item }">
            <!-- {{ item.departments_visited }} -->

            <span v-for="dv in item.departments_visited"> {{ dv.departments[0].name }}, </span>
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
    surveyAnswers: Object,
  },
  data() {
    return {
      roles: ['super-admin', 'admin', 'user'],
      rolesIfAdmin: ['admin', 'user'],
      selectedPermissions: [],
      userPermissionList: [],
      permissions: ['create-users', 'edit-users', 'delete-users'],
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
          text: 'PSS ID',
          value: 'pss_id',
          align: 'start',
          sortable: false,
          filterable: false,
          class: 'color_main_dark_background',
        },
        {
          text: 'Respondent',
          align: 'start',
          value: 'respondent',
          sortable: false,
          class: 'color_main_dark_background',
        },
        {
          text: 'AGE',
          align: 'start',
          value: 'age',
          sortable: false,
          class: 'color_main_dark_background',
        },
        {
          text: 'SEX',
          align: 'start',
          value: 'created_at',
          sortable: false,
          class: 'color_main_dark_background',
        },
        {
          text: 'RELIGION',
          align: 'start',
          value: 'religion',
          sortable: false,
          class: 'color_main_dark_background',
        },
        {
          text: 'LEVEL OF EDUCATION',
          align: 'start',
          value: 'educational_attainment',
          sortable: false,
          class: 'color_main_dark_background',
        },
        {
          text: 'DATE OF CONSULT/VISIT',
          align: 'start',
          value: 'date_of_visit',
          sortable: false,
          class: 'color_main_dark_background',
        },
        {
          text: 'DEPARTMENTS/OFFICE VISITED',
          align: 'start',
          value: 'departments_visited',
          sortable: false,
          class: 'color_main_dark_background',
        },
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
  mounted() {
    console.log(this.surveyAnswers);
  },
  methods: {
    updateData() {
      this.$inertia.get('answers', this.params, {
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
      this.form.post(route('answers.store'), {
        preserveScroll: true,
        onSuccess: () => {
          this.isLoading = true;
          this.dialog = false;
          this.form.reset();
          this.createdMsg();
        },
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
