<template>
  <div class="users">
    <Head title="Survey Answers" />

    <v-container class="my-5">
      <!-- add user dialog -->

      <h2 class="text-overline-edited">Survey Answers</h2>

      <!-- primary card -->
      <v-card
        text
        :class="{
          color_main_dark_background: $vuetify.theme.dark,
        }"
        elevation="20"
      >
        <!-- <v-card-title>Survey </v-card-title> -->

        <v-card-text>
          <v-row class="d-flex justify-end flex-row">
            <v-col
              cols="12"
              md="6"
              lg="4"
            >
              <div class="d-flex flex-row">
                <v-btn
                  v-if="search == null || search == ''"
                  class="mr-2"
                  color="indigo"
                  :disabled="true"
                >
                  <v-icon dark> mdi-download </v-icon>
                </v-btn>
                <v-btn
                  v-else
                  class="mr-2"
                  color="indigo"
                  dark
                  @click="exportToExcel()"
                >
                  <v-icon dark> mdi-download </v-icon>
                </v-btn>

                <v-text-field
                  v-model="search"
                  append-icon="mdi-magnify"
                  color="color_primary"
                  label="Search"
                  outlined
                  dense
                ></v-text-field>

                <v-menu
                  offset-y
                  :close-on-content-click="false"
                >
                  <template v-slot:activator="{ on, attrs }">
                    <v-btn
                      icon
                      v-bind="attrs"
                      v-on="on"
                    >
                      <v-icon large> mdi-filter </v-icon>
                    </v-btn>
                  </template>
                  <v-card style="width: 280px; padding: 1em">
                    <v-card-title class="ma-0 pa-0"> Filter </v-card-title>
                    <v-divider></v-divider>
                    <div class="d-flex flex-column mt-1 pa-0">
                      <v-text-field
                        v-model="from"
                        clearable
                        dense
                        outlined
                        type="date"
                        color="color_primary"
                        class="mb-2"
                        label="From"
                        hide-details
                      ></v-text-field>

                      <v-text-field
                        v-model="to"
                        clearable
                        dense
                        outlined
                        type="date"
                        color="color_primary"
                        class="mb-2"
                        label="To"
                        hide-details
                      ></v-text-field>

                      <v-select
                        :items="genderList"
                        v-model="gender"
                        label="Gender"
                        color="color_primary"
                        class="ma-0 pa-0"
                        dense
                        outlined
                      ></v-select>

                      <v-divider></v-divider>

                      <v-card-actions class="px-0 mb-0">
                        <v-btn
                          @click="clearDateFilter"
                          class="ma-0 pa-0 align-self-start"
                          color="color_error white--text"
                        >
                          Clear
                        </v-btn>
                      </v-card-actions>
                    </div>
                  </v-card>
                </v-menu>
              </div>
            </v-col>
          </v-row>
        </v-card-text>

        <!-- Primary answers -->
        <v-data-table
          fixed-header
          dense
          :search="search"
          :headers="answers"
          :items="surveyAnswers.data"
          :items-per-page="15"
          :options.sync="options"
          :server-items-length="surveyAnswers.total"
          class="elevation-1 row_pointer"
          :class="{
            color_main_dark_background: $vuetify.theme.dark,
          }"
        >
          <template #item.id="{ item }">
            <span>{{ item.id }}</span>
          </template>

          <template #item.questions="{ item }">
            <span>{{ item.questions.desc }}</span>
          </template>

          <template #item.created_at="{ item }">
            <span class="text-no-wrap">{{ tzone(item.created_at) }}</span>
          </template>

          <template #item.gender="{ item }">
            <span>{{ item.gender }}</span>
          </template>

          <!-- <template v-slot:item.actions="{ item }">
            <div class="d-flex flex-row">
              <div v-if="$page.props.user.role == 'super-admin' || $page.props.user.role == 'admin'">
                <v-icon
                  size="20"
                  color="color_error"
                  @click.stop="deleteItem(item)"
                >
                  mdi-delete
                </v-icon>
              </div>
            </div>
          </template> -->

          <!-- pagination -->
          <template #[`item.index`]="{ index }">
            {{ (options.page - 1) * options.itemsPerPage + index + 1 }}
          </template>
        </v-data-table>
      </v-card>

      <!-- delete data modal -->
      <v-dialog
        v-model="dialogDelete"
        max-width="500"
      >
        <v-card>
          <v-card-title class="text-h5-edited"> Delete data? </v-card-title>
          <v-card-text class="text-center text-h6-edited"> Are you sure you want to delete this data? </v-card-text>
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
      <!-- end delete data modal -->

      <div class="my-4"></div>

      <!-- end data table  -->

      <div class="my-4"></div>

      <!-- Third card -->
      <v-card
        v-if="$page.props.user.role == 'super-admin' || $page.props.user.role == 'admin'"
        text
        :class="{
          color_main_dark_background: $vuetify.theme.dark,
        }"
        elevation="20"
      >
        <!-- <v-card-title>DELETE REQUESTS</v-card-title> -->

        <!-- delete request table -->
        <!-- <v-data-table
          fixed-header
          dense
          :headers="delete_request_headers"
          :items="delete_requests.data"
          :items-per-page="15"
          :server-items-length="delete_requests.total"
          class="elevation-1 row_pointer pt-4"
          :class="{
            color_main_dark_background: $vuetify.theme.dark,
          }"
        >
          <template #item.requested_by="{ item }">
            <span>{{ item.users[0].firstName }} {{ item.users[0].lastName }}</span>
          </template>

          <template v-slot:item.actions="{ item }">
            <div
              class="d-flex flex-no-wrap"
              v-if="$page.props.auth.user.roles[0] == 'super-admin' || $page.props.auth.user.roles[0] == 'admin'"
            >
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
        </v-data-table> -->
      </v-card>
    </v-container>

    <div
      id="print"
      v-show="false"
      style="background-color: white"
    >
      <div style="width: 100%; display: flex; justify-content: center; align-items: center">
        <div style="padding: 0 2rem; color: #1f2937; margin: 0">
          <div
            style="
              display: flex;
              flex-direction: column;
              justify-content: center;
              align-items: center;
              text-align: center;
            "
          >
            <p style="font-weight: bold; font-size: 1.125rem; margin: 0; padding: 0">Survey Answers</p>
          </div>

          <div style="display: flex; justify-content: center; width: 100%; margin-bottom: 0.25rem">
            <table style="width: 100%; font-size: 0.75rem; border-collapse: collapse">
              <thead>
                <tr>
                  <th style="padding: 0.5rem; text-align: left; border-bottom-style: solid; border-top-style: solid">
                    EVENT NAME
                  </th>
                  <th style="padding: 0.5rem; text-align: left; border-bottom-style: solid; border-top-style: solid">
                    QUESTION
                  </th>
                  <th style="padding: 0.5rem; text-align: left; border-bottom-style: solid; border-top-style: solid">
                    RATE
                  </th>
                  <th style="padding: 0.5rem; text-align: left; border-bottom-style: solid; border-top-style: solid">
                    GENDER
                  </th>
                  <th style="padding: 0.5rem; text-align: left; border-bottom-style: solid; border-top-style: solid">
                    DATE
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr
                  v-for="item in surveyAnswers.data"
                  :key="item.id"
                >
                  <td style="padding: 0.5rem; text-align: left; border-bottom-style: solid">
                    {{ item.event_name }}
                  </td>
                  <td style="padding: 0.5rem; text-align: right; border-bottom-style: solid">
                    {{ item.questions.id }}
                  </td>
                  <td style="padding: 0.5rem; text-align: right; border-bottom-style: solid">
                    {{ item.answer }}
                  </td>
                  <td style="padding: 0.5rem; text-align: right; border-bottom-style: solid">
                    {{ item.gender }}
                  </td>
                  <td style="padding: 0.5rem; text-align: left; border-bottom-style: solid">
                    {{ tzone(item.created_at) }}
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <div
            style="
              display: flex;
              flex-direction: column;
              justify-content: flex-end;
              align-items: flex-end;
              text-align: flex-end;
            "
          >
            <span>Total response: {{ surveyAnswers.total }}</span>
          </div>
        </div>
      </div>
    </div>

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
import JsonExcel from 'vue-json-excel';
import { DownloadIcon } from 'vue-feather-icons';
import moment from 'moment';

export default {
  layout: (h, page) => h(Layout, [page]),

  // Using the shorthand
  layout: AppLayout,

  components: {
    AppLayout,
    Head,
    JsonExcel,
    DownloadIcon,
  },
  props: {
    surveyAnswers: Object,
    // delete_requests: Object,
  },
  data() {
    return {
      date: new Date(),
      survey_id: '',
      // filter menu
      from: null,
      to: null,
      // excel
      json_data: [],
      // end excel

      roles: ['super-admin', 'admin', 'user'],
      rolesIfAdmin: ['admin', 'user'],
      snack: '',
      snackColor: '',
      snackText: '',
      dialog: false,
      dialogDelete: false,
      dialogAttachment: false,
      gender: '',
      genderList: ['NO FILTER', 'Lalaki', 'Babae'],
      itemId: null,
      valid: true,
      url: null,
      isUpdate: false,
      isLoading: false,
      search: '',
      location: '',
      options: {},
      params: {},
      answers: [
        {
          text: 'EVENT NAME',
          value: 'event_name',
          align: 'start',
          sortable: false,
          filterable: true,
          class: 'color_main_dark_background',
        },
        {
          text: 'QUESTION',
          value: 'questions',
          align: 'start',
          sortable: false,
          filterable: true,
          class: 'color_main_dark_background',
        },
        {
          text: 'RATE',
          value: 'answer',
          align: 'end',
          sortable: false,
          filterable: false,
          class: 'color_main_dark_background',
        },
        {
          text: 'GENDER',
          align: 'start',
          value: 'gender',
          sortable: true,

          class: 'color_main_dark_background',
        },
        {
          text: 'CREATED AT',
          value: 'created_at',
          align: 'start',
          sortable: false,
          filterable: false,
          class: 'color_main_dark_background',
        },
        // { text: 'Actions', value: 'actions', sortable: false, class: 'color_main_dark_background' },
      ],
      form: this.$inertia.form({
        survey_id: null,
      }),
      formDeleteRequest: this.$inertia.form({
        survey_id: null,
        user_id: null,
        status: 'pending',
      }),
      formFile: this.$inertia.form({
        id: null,
        attachment: null,
      }),
    };
  },
  mounted() {
    console.log(this.surveyAnswers.data);
    // this.processJsonData();
    // this.storeOfficesListInContainer();
  },
  methods: {
    updateData() {
      this.json_data = [];
      this.$inertia.get('answers', this.params, {
        preserveState: true,
        preserveScroll: true,
        onFinish: (visit) => {
          //   this.json_data = [];
          //   this.processJsonData();
          //   console.log(this.surveyAnswers);
        },
      });
      this.json_data = [];
      this.processJsonData();
      //   console.log('e', this.surveyAnswers.data);
    },
    // timezone with timestamp
    tzone(date) {
      return moment.tz(date, 'Asia/Manila').format('LLL');
    },
    // timezone without timestamp
    tzone2(date) {
      return moment.tz(date, 'Asia/Manila').format('LL');
    },
    processJsonData() {
      //   this.surveyAnswers.data.forEach((e) => {
      //     this.json_data.push({
      //       ID: e.id,
      //       'EVENT NAME': e.event_name,
      //       Q1: e.survey_answers[0].answer,
      //     });
      //   });
    },
    exportToExcel() {
      const tableHTML = document.getElementById('print').outerHTML;
      const dataType = 'application/vnd.ms-excel';
      const tableStyle = `
        <style>
        body, table {
            font-family: Calibri, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }
        th, td {
            padding: 5px;
            border: 1px solid black;
            text-align: center;
        }
        </style>
    `;

      const excelHTML = `
        <html xmlns:o="urn:schemas-microsoft-com:office:office"
            xmlns:x="urn:schemas-microsoft-com:office:excel"
            xmlns="http://www.w3.org/TR/REC-html40">
        <head>
            <meta charset="UTF-8">
            <title>Export HTML to Excel</title>
            ${tableStyle}
        </head>
        <body>
            ${tableHTML}
        </body>
        </html>
    `;

      const blob = new Blob([excelHTML], { type: dataType });
      const link = document.createElement('a');
      link.href = URL.createObjectURL(blob);
      link.download = 'exported_table.xls';

      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
    },
    clearDateFilter() {
      this.visiting = null;
      this.from = null;
      this.to = null;
      this.gender = 'NO FILTER';
      this.education = null;
      this.department = null;
      this.location = null;
    },
    setFormFileId(item) {
      this.formFile.id = item.id;
    },
    cancel() {
      this.dialog = false;
      this.dialogAttachment = false;
      this.isUpdate = false;
      this.form.reset();
      this.form.clearErrors();
      this.formFile.reset();
      this.formFile.clearErrors();
    },
    create() {
      this.dialog = true;
      this.form.reset();
      this.form.clearErrors();
    },
    createdMsg() {
      this.snack = true;
      this.snackColor = 'color_primary';
      this.snackText = 'File attached.';
    },
    updatedMsg() {
      this.snack = true;
      this.snackColor = 'color_primary';
      this.snackText = 'Attached file updated.';
    },
    deletedMsg() {
      this.snack = true;
      this.snackColor = 'color_error';
      this.snackText = 'Data deleted.';
    },
    deleteRequestMsg() {
      this.snack = true;
      this.snackColor = 'color_primary';
      this.snackText = 'Delete request submitted.';
    },
    destroy() {
      if (this.$page.props.user.role == 'super-admin' || this.$page.props.user.role == 'admin') {
        this.form.delete(route('answers.destroy', this.itemId), {
          preserveScroll: true,
          onSuccess: () => {
            this.dialogDelete = false;
            this.itemId = null;
            this.deletedMsg();
          },
        });
      } else {
        this.formDeleteRequest.survey_id = this.itemId;
        this.formDeleteRequest.user_id = this.user.id;

        this.formDeleteRequest.post(route('deleterequest.store'), {
          preserveScroll: true,
          onSuccess: () => {
            this.dialogDelete = false;
            this.itemId = null;
            this.formDeleteRequest.reset();
            this.deleteRequestMsg();
          },
        });
      }
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

      this.params.sort_by = val.sortBy[0];
      this.params.order_by = val.sortDesc[0] ? 'asc' : 'desc';
      this.updateData();
    },
    search: function (val) {
      this.params.search = val;
      this.params.page = 1;
      this.updateData();
    },
    from: function (val) {
      if (val != null) {
        let from = moment(val).format('YYYY-MM-DD 12:00:00');
        // console.log('from', from);
        this.params.from = from;
      } else {
        this.params.from = null;
        this.from = null;
      }
      this.updateData();
    },
    to: function (val) {
      if (val != null) {
        let to = moment(val).format('YYYY-MM-DD 11:59:59');
        // console.log('to', to);
        this.params.to = to;
      } else {
        this.params.to = null;
        this.to = null;
      }
      this.updateData();
    },
    gender: function (val) {
      if (val == 'NO FILTER') {
        this.params.gender = '';
      } else {
        this.params.gender = val;
      }
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

.v-tooltip__content {
  opacity: 1 !important;
  background-color: rgb(220, 220, 220);
  color: black;
  width: 20% !important;
}

@media print {
  @page {
    margin: 0;
    /* font-size: 50px; */
    /* font-weight: bold; */
  }
  body {
    font-family: Calibri, sans-serif;
  }
  #print {
    font-family: Calibri, sans-serif;
  }
}
</style>
