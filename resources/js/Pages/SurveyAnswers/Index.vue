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

        <!-- Primary answers -->
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
          <!-- departments -->
          <template #item.departments_visited="{ item }">
            <span v-for="dv in item.departments_visited"> {{ dv.departments[0].name }}, </span>
          </template>

          <!-- previous_visit -->
          <template #item.previous_visit="{ item }">
            <span v-if="item.visited_before == 'y'">YES</span>
            <span v-else>NO</span>
          </template>

          <!-- Q1 -->
          <template #item.q1="{ item }">
            <span>{{ item.survey_answers[0].rating }}</span>
          </template>

          <!-- Q2 -->
          <template #item.q2="{ item }">
            <span>{{ item.survey_answers[1].rating }}</span>
          </template>

          <!-- Q3 -->
          <template #item.q3="{ item }">
            <span>{{ item.survey_answers[2].rating }}</span>
          </template>

          <!-- Q4 -->
          <template #item.q4="{ item }">
            <span>{{ item.survey_answers[3].rating }}</span>
          </template>

          <!-- Q5 -->
          <template #item.q5="{ item }">
            <span>{{ item.survey_answers[4].rating }}</span>
          </template>

          <!-- Q6 -->
          <template #item.q6="{ item }">
            <span>{{ item.survey_answers[5].rating }}</span>
          </template>

          <!-- Q7 -->
          <template #item.q7="{ item }">
            <span>{{ item.survey_answers[6].rating }}</span>
          </template>

          <!-- Q8 -->
          <template #item.q8="{ item }">
            <span>{{ item.survey_answers[7].rating }}</span>
          </template>

          <!-- Q9 -->
          <template #item.q9="{ item }">
            <span>{{ item.survey_answers[8].rating }}</span>
          </template>

          <!-- Q10 -->
          <template #item.q10="{ item }">
            <span>{{ item.survey_answers[9].rating }}</span>
          </template>

          <!-- Q11 -->
          <template #item.q11="{ item }">
            <span>{{ item.survey_answers[10].rating }}</span>
          </template>

          <!-- Q12 -->
          <template #item.q12="{ item }">
            <span>{{ item.survey_answers[11].rating }}</span>
          </template>

          <!-- Q13 -->
          <template #item.q13="{ item }">
            <span>{{ item.survey_answers[12].rating }}</span>
          </template>

          <!-- Q14 -->
          <template #item.q14="{ item }">
            <span>{{ item.survey_answers[13].rating }}</span>
          </template>

          <!-- Q15 -->
          <template #item.q15="{ item }">
            <span>{{ item.survey_answers[14].rating }}</span>
          </template>

          <!-- Q16 -->
          <template #item.q16="{ item }">
            <span>{{ item.survey_answers[15].rating }}</span>
          </template>

          <!-- Q17/DOCTOR -->
          <template #item.doctor="{ item }">
            <span>
              {{ item.survey_abt_staffs[0].rating }}
              <span v-if="item.survey_abt_staffs[0].comment != null">,</span>
              {{ item.survey_abt_staffs[0].comment }}
            </span>
          </template>

          <!-- Q18/NURSE -->
          <template #item.nurse="{ item }">
            <span>
              {{ item.survey_abt_staffs[1].rating }}
              <span v-if="item.survey_abt_staffs[1].comment != null">,</span>
              {{ item.survey_abt_staffs[1].comment }}
            </span>
          </template>

          <!-- Q19/MIDWIFE -->
          <template #item.midwife="{ item }">
            <span>
              {{ item.survey_abt_staffs[2].rating }}
              <span v-if="item.survey_abt_staffs[2].comment != null">,</span>
              {{ item.survey_abt_staffs[2].comment }}
            </span>
          </template>

          <!-- Q20/SECURITY -->
          <template #item.security="{ item }">
            <span>
              {{ item.survey_abt_staffs[3].rating }}
              <span v-if="item.survey_abt_staffs[3].comment != null">,</span>
              {{ item.survey_abt_staffs[3].comment }}
            </span>
          </template>

          <!-- Q21/RADIOLOGY -->
          <template #item.radiology="{ item }">
            <span>
              {{ item.survey_abt_staffs[4].rating }}
              <span v-if="item.survey_abt_staffs[4].comment != null">,</span>
              {{ item.survey_abt_staffs[4].comment }}
            </span>
          </template>

          <!-- Q22/PHARMACY -->
          <template #item.pharmacy="{ item }">
            <span>
              {{ item.survey_abt_staffs[5].rating }}
              <span v-if="item.survey_abt_staffs[5].comment != null">,</span>
              {{ item.survey_abt_staffs[5].comment }}
            </span>
          </template>

          <!-- Q23/LABORATORY -->
          <template #item.laboratory="{ item }">
            <span>
              {{ item.survey_abt_staffs[6].rating }}
              <span v-if="item.survey_abt_staffs[6].comment != null">,</span>
              {{ item.survey_abt_staffs[6].comment }}
            </span>
          </template>

          <!-- Q24/ADMITTING STAFF -->
          <template #item.admitting="{ item }">
            <span>
              {{ item.survey_abt_staffs[7].rating }}
              <span v-if="item.survey_abt_staffs[7].comment != null">,</span>
              {{ item.survey_abt_staffs[7].comment }}
            </span>
          </template>

          <!-- Q25/MEDICAL RECORDS -->
          <template #item.medical_records="{ item }">
            <span>
              {{ item.survey_abt_staffs[8].rating }}
              <span v-if="item.survey_abt_staffs[8].comment != null">,</span>
              {{ item.survey_abt_staffs[8].comment }}
            </span>
          </template>

          <!-- Q26/BILLING -->
          <template #item.billing="{ item }">
            <span>
              {{ item.survey_abt_staffs[9].rating }}
              <span v-if="item.survey_abt_staffs[9].comment != null">,</span>
              {{ item.survey_abt_staffs[9].comment }}
            </span>
          </template>

          <!-- Q27/CASHIER -->
          <template #item.cashier="{ item }">
            <span>
              {{ item.survey_abt_staffs[10].rating }}
              <span v-if="item.survey_abt_staffs[10].comment != null">,</span>
              {{ item.survey_abt_staffs[10].comment }}
            </span>
          </template>

          <!-- Q28/SOCIAL WORKER -->
          <template #item.social_worker="{ item }">
            <span>
              {{ item.survey_abt_staffs[11].rating }}
              <span v-if="item.survey_abt_staffs[11].comment != null">,</span>
              {{ item.survey_abt_staffs[11].comment }}
            </span>
          </template>

          <!-- Q29/FOOD SERVER -->
          <template #item.food_server="{ item }">
            <span>
              {{ item.survey_abt_staffs[12].rating }}
              <span v-if="item.survey_abt_staffs[12].comment != null">,</span>
              {{ item.survey_abt_staffs[12].comment }}
            </span>
          </template>

          <!-- Q30/JANITORS/ORDERLY -->
          <template #item.janitors_orderly="{ item }">
            <span>
              {{ item.survey_abt_staffs[13].rating }}
              <span v-if="item.survey_abt_staffs[13].comment != null">,</span>
              {{ item.survey_abt_staffs[13].comment }}
            </span>
          </template>

          <!-- pagination -->
          <template #[`item.index`]="{ index }">
            {{ (options.page - 1) * options.itemsPerPage + index + 1 }}
          </template>
        </v-data-table>

        <!-- Secondary answers -->
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
          <!-- departments -->
          <template #item.departments_visited="{ item }">
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
        {
          text: 'PREVIOUS VISIT',
          align: 'start',
          value: 'previous_visit',
          sortable: false,
          class: 'color_main_dark_background',
        },
        {
          text: 'Q1',
          align: 'start',
          value: 'q1',
          sortable: false,
          class: 'color_main_dark_background',
        },
        {
          text: 'Q2',
          align: 'start',
          value: 'q2',
          sortable: false,
          class: 'color_main_dark_background',
        },
        {
          text: 'Q3',
          align: 'start',
          value: 'q3',
          sortable: false,
          class: 'color_main_dark_background',
        },
        {
          text: 'Q4',
          align: 'start',
          value: 'q4',
          sortable: false,
          class: 'color_main_dark_background',
        },
        {
          text: 'Q5',
          align: 'start',
          value: 'q5',
          sortable: false,
          class: 'color_main_dark_background',
        },
        {
          text: 'Q6',
          align: 'start',
          value: 'q6',
          sortable: false,
          class: 'color_main_dark_background',
        },
        {
          text: 'Q7',
          align: 'start',
          value: 'q7',
          sortable: false,
          class: 'color_main_dark_background',
        },
        {
          text: 'Q8',
          align: 'start',
          value: 'q8',
          sortable: false,
          class: 'color_main_dark_background',
        },
        {
          text: 'Q9',
          align: 'start',
          value: 'q9',
          sortable: false,
          class: 'color_main_dark_background',
        },
        {
          text: 'Q10',
          align: 'start',
          value: 'q10',
          sortable: false,
          class: 'color_main_dark_background',
        },
        {
          text: 'Q11',
          align: 'start',
          value: 'q11',
          sortable: false,
          class: 'color_main_dark_background',
        },
        {
          text: 'Q12',
          align: 'start',
          value: 'q12',
          sortable: false,
          class: 'color_main_dark_background',
        },
        {
          text: 'Q13',
          align: 'start',
          value: 'q13',
          sortable: false,
          class: 'color_main_dark_background',
        },
        {
          text: 'Q14',
          align: 'start',
          value: 'q14',
          sortable: false,
          class: 'color_main_dark_background',
        },
        {
          text: 'Q15',
          align: 'start',
          value: 'q15',
          sortable: false,
          class: 'color_main_dark_background',
        },
        {
          text: 'Q16',
          align: 'start',
          value: 'q16',
          sortable: false,
          class: 'color_main_dark_background',
        },
        // DOCTOR
        {
          text: 'Q17/DOCTOR',
          align: 'start',
          value: 'doctor',
          sortable: false,
          class: 'color_main_dark_background',
        },
        // NURSE
        {
          text: 'Q18/NURSE',
          align: 'start',
          value: 'nurse',
          sortable: false,
          class: 'color_main_dark_background',
        },
        // MIDWIFE
        {
          text: 'Q19/MIDWIFE',
          align: 'start',
          value: 'midwife',
          sortable: false,
          class: 'color_main_dark_background',
        },
        // SECURITY
        {
          text: 'Q20/SECURITY',
          align: 'start',
          value: 'security',
          sortable: false,
          class: 'color_main_dark_background',
        },
        // RADIOLOGY
        {
          text: 'Q21/RADIOLOGY',
          align: 'start',
          value: 'radiology',
          sortable: false,
          class: 'color_main_dark_background',
        },
        // PHARMACY
        {
          text: 'Q22/PHARMACY',
          align: 'start',
          value: 'pharmacy',
          sortable: false,
          class: 'color_main_dark_background',
        },
        // ADMITTING STAFF
        {
          text: 'Q24/ADMITTING STAFF',
          align: 'start',
          value: 'admitting',
          sortable: false,
          class: 'color_main_dark_background',
        },
        // MEDICAL RECORDS
        {
          text: 'Q25/MEDICAL RECORDS',
          align: 'start',
          value: 'medical_records',
          sortable: false,
          class: 'color_main_dark_background',
        },
        // BILLING
        {
          text: 'Q26/BILLING',
          align: 'start',
          value: 'billing',
          sortable: false,
          class: 'color_main_dark_background',
        },
        // CASHIER
        {
          text: 'Q27/CASHIER',
          align: 'start',
          value: 'cashier',
          sortable: false,
          class: 'color_main_dark_background',
        },
        // SOCIAL WORKER
        {
          text: 'Q28/SOCIAL WORKER',
          align: 'start',
          value: 'social_worker',
          sortable: false,
          class: 'color_main_dark_background',
        },
        // FOOD SERVER
        {
          text: 'Q29/FOOD SERVER',
          align: 'start',
          value: 'food_server',
          sortable: false,
          class: 'color_main_dark_background',
        },
        // JANITORS/ORDERLY
        {
          text: 'Q30/JANITORS/ORDERLY',
          align: 'start',
          value: 'janitors_orderly',
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
