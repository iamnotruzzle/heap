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
                <v-text-field
                  v-model="search"
                  append-icon="mdi-magnify"
                  color="color_primary"
                  label="Search hospital #"
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
                      <v-radio-group
                        v-model="sex"
                        class="ma-0"
                        dense
                      >
                        <template v-slot:label>
                          <div>Gender</div>
                        </template>
                        <v-radio
                          value="Male"
                          color="color_primary"
                        >
                          <template v-slot:label>
                            <div>Male</div>
                          </template>
                        </v-radio>
                        <v-radio
                          value="Female"
                          color="color_primary"
                        >
                          <template v-slot:label>
                            <div>Female</div>
                          </template>
                        </v-radio>
                        <v-radio
                          value="NO FILTER"
                          color="color_primary"
                        >
                          <template v-slot:label>
                            <div>No Filter</div>
                          </template>
                        </v-radio>
                      </v-radio-group>

                      <v-select
                        :items="educationList"
                        v-model="education"
                        label="Level of education"
                        color="color_primary"
                        class="ma-0 pa-0"
                        dense
                        outlined
                      ></v-select>

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
          :headers="primary_answers"
          :items="surveyAnswers.data"
          :items-per-page="15"
          :options.sync="options"
          :server-items-length="surveyAnswers.total"
          class="elevation-1 row_pointer"
          :class="{
            color_main_dark_background: $vuetify.theme.dark,
          }"
        >
          <template #item.date_of_visit="{ item }">
            <span class="text-no-wrap">{{ tzone2(item.date_of_visit) }}</span>
          </template>

          <!-- previous_visit -->
          <template #item.previous_visit="{ item }">
            <span
              v-if="item.visited_before == 'y'"
              plain
              class="color_primary--text"
            >
              YES
            </span>
            <span
              v-else
              class="color_error--text"
            >
              NO
            </span>
          </template>

          <!-- Q1 -->
          <template #item.q1="{ item }">
            <span>{{ item.survey_answers[0].answer }}</span>
          </template>

          <!-- Q2 -->
          <template #item.q2="{ item }">
            <span>{{ item.survey_answers[1].answer }}</span>
          </template>

          <!-- Q3 -->
          <template #item.q3="{ item }">
            <span>{{ item.survey_answers[2].answer }}</span>
          </template>

          <!-- Q4 -->
          <template #item.q4="{ item }">
            <span>{{ item.survey_answers[3].answer }}</span>
          </template>

          <!-- Q5 -->
          <template #item.q5="{ item }">
            <span>{{ item.survey_answers[4].answer }}</span>
          </template>

          <!-- Q6 -->
          <template #item.q6="{ item }">
            <span>{{ item.survey_answers[5].answer }}</span>
          </template>

          <!-- Q7 -->
          <template #item.q7="{ item }">
            <span>{{ item.survey_answers[6].answer }}</span>
          </template>

          <!-- Q8 -->
          <template #item.q8="{ item }">
            <span>{{ item.survey_answers[7].answer }}</span>
          </template>

          <!-- Q9 -->
          <template #item.q9="{ item }">
            <span>{{ item.survey_answers[8].answer }}</span>
          </template>

          <!-- Q10 -->
          <template #item.q10="{ item }">
            <span>{{ item.survey_answers[9].answer }}</span>
          </template>

          <!-- Q11 -->
          <template #item.q11="{ item }">
            <span>{{ item.survey_answers[10].answer }}</span>
          </template>

          <!-- Q12 -->
          <template #item.q12="{ item }">
            <span>{{ item.survey_answers[11].answer }}</span>
          </template>

          <!-- Q13 -->
          <template #item.q13="{ item }">
            <span>{{ item.survey_answers[12].answer }}</span>
          </template>

          <!-- Q14 -->
          <template #item.q14="{ item }">
            <span>{{ item.survey_answers[13].answer }}</span>
          </template>

          <!-- Q15 -->
          <template #item.q15="{ item }">
            <!-- <span>{{ item.survey_answers[14].answer }}</span> -->
            <v-dialog max-width="600">
              <template v-slot:activator="{ on, attrs }">
                <v-btn
                  color="purple lighten-2 white--text"
                  v-bind="attrs"
                  v-on="on"
                  text
                  icon
                >
                  <v-icon dark> mdi-eye-outline </v-icon>
                </v-btn>
              </template>
              <template v-slot:default="dialog">
                <v-card>
                  <v-toolbar
                    color="purple lighten-2"
                    dark
                  >
                    Suggestions on how we can further improve our services.
                  </v-toolbar>
                  <v-card-text>
                    <div class="mt-4 font-weight-bold">{{ item.survey_answers[14].answer }}</div>
                  </v-card-text>
                  <v-card-actions class="justify-end">
                    <v-btn
                      text
                      @click="dialog.value = false"
                    >
                      Close
                    </v-btn>
                  </v-card-actions>
                </v-card>
              </template>
            </v-dialog>
          </template>

          <!-- Q16 -->
          <template #item.q16="{ item }">
            <!-- <span>{{ item.survey_answers[15].answer }}</span> -->
            <v-dialog max-width="600">
              <template v-slot:activator="{ on, attrs }">
                <v-btn
                  color="indigo lighten-2 white--text"
                  v-bind="attrs"
                  v-on="on"
                  text
                  icon
                >
                  <v-icon dark> mdi-eye-outline </v-icon>
                </v-btn>
              </template>
              <template v-slot:default="dialog">
                <v-card>
                  <v-toolbar
                    color="indigo lighten-2"
                    dark
                  >
                    Commendation
                  </v-toolbar>
                  <v-card-text>
                    <div class="mt-4 font-weight-bold">{{ item.survey_answers[15].answer }}</div>
                  </v-card-text>
                  <v-card-actions class="justify-end">
                    <v-btn
                      text
                      @click="dialog.value = false"
                    >
                      Close
                    </v-btn>
                  </v-card-actions>
                </v-card>
              </template>
            </v-dialog>
          </template>

          <!-- PSS RATING -->
          <template #item.pss_rating="{ item }">
            <span
              v-if="item.pss_rating <= 2"
              class="red--text"
            >
              {{ item.pss_rating }}
            </span>
            <span
              v-else-if="item.pss_rating == 3"
              class="amber--text darken-3"
            >
              {{ item.pss_rating }}
            </span>
            <span
              v-else
              class="green--text"
            >
              {{ item.pss_rating }}
            </span>
          </template>

          <!-- DOCTOR -->
          <template #item.doctor="{ item }">
            <div class="d-flex flex-row">
              {{ item.survey_abt_staffs[0].rating }}

              <span v-if="item.survey_abt_staffs[0].comment != null">,&nbsp;</span>

              <v-tooltip bottom>
                <template v-slot:activator="{ on, attrs }">
                  <span
                    v-bind="attrs"
                    v-on="on"
                    class="d-inline-block text-truncate"
                    style="max-width: 120px"
                  >
                    {{ item.survey_abt_staffs[0].comment }}
                  </span>
                </template>
                {{ item.survey_abt_staffs[0].comment }}
              </v-tooltip>
            </div>
          </template>

          <!-- NURSE -->
          <template #item.nurse="{ item }">
            <div class="d-flex flex-row">
              {{ item.survey_abt_staffs[1].rating }}

              <span v-if="item.survey_abt_staffs[1].comment != null">,&nbsp;</span>

              <v-tooltip bottom>
                <template v-slot:activator="{ on, attrs }">
                  <span
                    v-bind="attrs"
                    v-on="on"
                    class="d-inline-block text-truncate"
                    style="max-width: 120px"
                  >
                    {{ item.survey_abt_staffs[1].comment }}
                  </span>
                </template>
                {{ item.survey_abt_staffs[1].comment }}
              </v-tooltip>
            </div>
          </template>

          <!-- MIDWIFE -->
          <template #item.midwife="{ item }">
            <div class="d-flex flex-row">
              {{ item.survey_abt_staffs[2].rating }}

              <span v-if="item.survey_abt_staffs[2].comment != null">,&nbsp;</span>

              <v-tooltip bottom>
                <template v-slot:activator="{ on, attrs }">
                  <span
                    v-bind="attrs"
                    v-on="on"
                    class="d-inline-block text-truncate"
                    style="max-width: 120px"
                  >
                    {{ item.survey_abt_staffs[2].comment }}
                  </span>
                </template>
                {{ item.survey_abt_staffs[2].comment }}
              </v-tooltip>
            </div>
          </template>

          <!-- SECURITY -->
          <template #item.security="{ item }">
            <div class="d-flex flex-row">
              {{ item.survey_abt_staffs[3].rating }}

              <span v-if="item.survey_abt_staffs[3].comment != null">,&nbsp;</span>

              <v-tooltip bottom>
                <template v-slot:activator="{ on, attrs }">
                  <span
                    v-bind="attrs"
                    v-on="on"
                    class="d-inline-block text-truncate"
                    style="max-width: 120px"
                  >
                    {{ item.survey_abt_staffs[3].comment }}
                  </span>
                </template>
                {{ item.survey_abt_staffs[3].comment }}
              </v-tooltip>
            </div>
          </template>

          <!-- RADIOLOGY -->
          <template #item.radiology="{ item }">
            <div class="d-flex flex-row">
              {{ item.survey_abt_staffs[4].rating }}

              <span v-if="item.survey_abt_staffs[4].comment != null">,&nbsp;</span>

              <v-tooltip bottom>
                <template v-slot:activator="{ on, attrs }">
                  <span
                    v-bind="attrs"
                    v-on="on"
                    class="d-inline-block text-truncate"
                    style="max-width: 120px"
                  >
                    {{ item.survey_abt_staffs[4].comment }}
                  </span>
                </template>
                {{ item.survey_abt_staffs[4].comment }}
              </v-tooltip>
            </div>
          </template>

          <!-- PHARMACY -->
          <template #item.pharmacy="{ item }">
            <div class="d-flex flex-row">
              {{ item.survey_abt_staffs[5].rating }}

              <span v-if="item.survey_abt_staffs[5].comment != null">,&nbsp;</span>

              <v-tooltip bottom>
                <template v-slot:activator="{ on, attrs }">
                  <span
                    v-bind="attrs"
                    v-on="on"
                    class="d-inline-block text-truncate"
                    style="max-width: 120px"
                  >
                    {{ item.survey_abt_staffs[5].comment }}
                  </span>
                </template>
                {{ item.survey_abt_staffs[5].comment }}
              </v-tooltip>
            </div>
          </template>

          <!-- LABORATORY -->
          <template #item.laboratory="{ item }">
            <div class="d-flex flex-row">
              {{ item.survey_abt_staffs[6].rating }}

              <span v-if="item.survey_abt_staffs[6].comment != null">,&nbsp;</span>

              <v-tooltip bottom>
                <template v-slot:activator="{ on, attrs }">
                  <span
                    v-bind="attrs"
                    v-on="on"
                    class="d-inline-block text-truncate"
                    style="max-width: 120px"
                  >
                    {{ item.survey_abt_staffs[6].comment }}
                  </span>
                </template>
                {{ item.survey_abt_staffs[6].comment }}
              </v-tooltip>
            </div>
          </template>

          <!-- ADMITTING STAFF -->
          <template #item.admitting="{ item }">
            <div class="d-flex flex-row">
              {{ item.survey_abt_staffs[7].rating }}

              <span v-if="item.survey_abt_staffs[7].comment != null">,&nbsp;</span>

              <v-tooltip bottom>
                <template v-slot:activator="{ on, attrs }">
                  <span
                    v-bind="attrs"
                    v-on="on"
                    class="d-inline-block text-truncate"
                    style="max-width: 120px"
                  >
                    {{ item.survey_abt_staffs[7].comment }}
                  </span>
                </template>
                {{ item.survey_abt_staffs[7].comment }}
              </v-tooltip>
            </div>
          </template>

          <!-- MEDICAL RECORDS -->
          <template #item.medical_records="{ item }">
            <div class="d-flex flex-row">
              {{ item.survey_abt_staffs[8].rating }}

              <span v-if="item.survey_abt_staffs[8].comment != null">,&nbsp;</span>

              <v-tooltip bottom>
                <template v-slot:activator="{ on, attrs }">
                  <span
                    v-bind="attrs"
                    v-on="on"
                    class="d-inline-block text-truncate"
                    style="max-width: 120px"
                  >
                    {{ item.survey_abt_staffs[8].comment }}
                  </span>
                </template>
                {{ item.survey_abt_staffs[8].comment }}
              </v-tooltip>
            </div>
          </template>

          <!-- BILLING -->
          <template #item.billing="{ item }">
            <div class="d-flex flex-row">
              {{ item.survey_abt_staffs[9].rating }}

              <span v-if="item.survey_abt_staffs[9].comment != null">,&nbsp;</span>

              <v-tooltip bottom>
                <template v-slot:activator="{ on, attrs }">
                  <span
                    v-bind="attrs"
                    v-on="on"
                    class="d-inline-block text-truncate"
                    style="max-width: 120px"
                  >
                    {{ item.survey_abt_staffs[9].comment }}
                  </span>
                </template>
                {{ item.survey_abt_staffs[9].comment }}
              </v-tooltip>
            </div>
          </template>

          <!-- CASHIER -->
          <template #item.cashier="{ item }">
            <div class="d-flex flex-row">
              {{ item.survey_abt_staffs[10].rating }}

              <span v-if="item.survey_abt_staffs[10].comment != null">,&nbsp;</span>

              <v-tooltip bottom>
                <template v-slot:activator="{ on, attrs }">
                  <span
                    v-bind="attrs"
                    v-on="on"
                    class="d-inline-block text-truncate"
                    style="max-width: 120px"
                  >
                    {{ item.survey_abt_staffs[10].comment }}
                  </span>
                </template>
                {{ item.survey_abt_staffs[10].comment }}
              </v-tooltip>
            </div>
          </template>

          <!-- SOCIAL WORKER -->
          <template #item.social_worker="{ item }">
            <div class="d-flex flex-row">
              {{ item.survey_abt_staffs[11].rating }}

              <span v-if="item.survey_abt_staffs[11].comment != null">,&nbsp;</span>

              <v-tooltip bottom>
                <template v-slot:activator="{ on, attrs }">
                  <span
                    v-bind="attrs"
                    v-on="on"
                    class="d-inline-block text-truncate"
                    style="max-width: 120px"
                  >
                    {{ item.survey_abt_staffs[11].comment }}
                  </span>
                </template>
                {{ item.survey_abt_staffs[11].comment }}
              </v-tooltip>
            </div>
          </template>

          <!-- FOOD SERVER -->
          <template #item.food_server="{ item }">
            <div class="d-flex flex-row">
              {{ item.survey_abt_staffs[12].rating }}

              <span v-if="item.survey_abt_staffs[12].comment != null">,&nbsp;</span>

              <v-tooltip bottom>
                <template v-slot:activator="{ on, attrs }">
                  <span
                    v-bind="attrs"
                    v-on="on"
                    class="d-inline-block text-truncate"
                    style="max-width: 120px"
                  >
                    {{ item.survey_abt_staffs[12].comment }}
                  </span>
                </template>
                {{ item.survey_abt_staffs[12].comment }}
              </v-tooltip>
            </div>
          </template>

          <!-- JANITORS/ORDERLY -->
          <template #item.janitors_orderly="{ item }">
            <div class="d-flex flex-row">
              {{ item.survey_abt_staffs[13].rating }}

              <span v-if="item.survey_abt_staffs[13].comment != null">,&nbsp;</span>

              <v-tooltip bottom>
                <template v-slot:activator="{ on, attrs }">
                  <span
                    v-bind="attrs"
                    v-on="on"
                    class="d-inline-block text-truncate"
                    style="max-width: 120px"
                  >
                    {{ item.survey_abt_staffs[13].comment }}
                  </span>
                </template>
                {{ item.survey_abt_staffs[13].comment }}
              </v-tooltip>
            </div>
          </template>

          <!-- location -->
          <template #item.location="{ item }">
            <div class="d-flex flex-row">
              <span v-if="item.pss_location_detail != null"> {{ item.pss_location_detail.wardname }}</span>
              <span v-else> {{ item.ward_location_detail.wardname }}</span>
            </div>
          </template>

          <!-- assisted_by -->
          <template #item.assisted_by="{ item }">
            <span v-if="item.assisted_by != null">
              ({{ item.assisted_by.username }}) {{ item.assisted_by.firstName }} {{ item.assisted_by.lastName }}
            </span>
            <span v-else></span>
          </template>

          <template #item.created_at="{ item }">
            <span class="text-no-wrap">{{ tzone(item.created_at) }}</span>
          </template>

          <template v-slot:item.actions="{ item }">
            <!-- {{ item.roles[0].name }} -->
            <!-- $page.props.auth.user.roles[0] -->

            <div class="d-flex flex-no-wrap">
              <v-icon
                size="20"
                color="color_error"
                @click.stop="deleteItem(item)"
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
        <v-card-title>DELETE REQUESTS</v-card-title>

        <!-- delete request table -->
        <v-data-table
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
          <!-- requested by -->
          <template #item.requested_by="{ item }">
            <span>{{ item.users[0].firstName }} {{ item.users[0].lastName }}</span>
          </template>

          <template v-slot:item.actions="{ item }">
            <div
              class="d-flex flex-no-wrap"
              v-if="$page.props.auth.user.roles[0] == 'super-admin'"
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
        </v-data-table>
      </v-card>

      <v-btn
        fab
        dark
        fixed
        bottom
        right
        class="color_primary"
      >
        <!-- :name="filename.xls" -->
        <JsonExcel
          :data="json_data"
          worksheet="DATA 1"
          :name="`${user.firstName + ' ' + user.lastName}` + '-' + `${date.toLocaleDateString()}` + '.xls'"
          @click="processJsonData()"
        >
          <download-icon
            size="24"
            as="v-icon"
          ></download-icon>
        </JsonExcel>
      </v-btn>
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
    delete_requests: Object,
  },
  data() {
    return {
      date: new Date(),

      // filter menu
      from: null,
      to: null,
      sex: 'NO FILTER', // default selected
      sexList: ['NO FILTER', 'Male', 'Female'],
      education: 'NO FILTER', // default selected
      department: 0,
      educationList: [
        'NO FILTER',
        'Elementary',
        'Secondary',
        'Vocational',
        'College',
        'Postgraduate/Masters',
        'No formal Education',
      ],
      // end filter menu

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
      itemId: null,
      valid: true,
      url: null,
      isUpdate: false,
      isLoading: false,
      search: '',
      options: {},
      params: {},
      primary_answers: [
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
          sortable: true,

          class: 'color_main_dark_background',
        },
        {
          text: 'SEX',
          align: 'start',
          value: 'sex',
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
          text: 'POINT OF ENTRY',
          align: 'start',
          value: 'point_of_entry',
          sortable: false,
          class: 'color_main_dark_background',
        },
        {
          text: 'SERVICES AVAILED',
          align: 'start',
          value: 'service_availed',
          sortable: false,
          class: 'color_main_dark_background',
        },
        {
          text: 'VISIT PER YEAR',
          align: 'start',
          value: 'frequently_visit',
          sortable: false,
          class: 'color_main_dark_background',
        },
        {
          text: 'Hosp. #',
          align: 'start',
          value: 'hospital_number',
          sortable: false,
          class: 'color_main_dark_background',
        },
        {
          text: 'PREFERENCE',
          align: 'start',
          value: 'preference',
          sortable: false,
          class: 'color_main_dark_background',
        },
        {
          text: 'PSS RATING',
          align: 'start',
          value: 'pss_rating',
          sortable: false,
          class: 'color_main_dark_background',
        },
        {
          text: 'CC1',
          align: 'start',
          value: 'cc1',
          sortable: false,
          class: 'color_main_dark_background',
        },
        {
          text: 'CC2',
          align: 'start',
          value: 'cc2',
          sortable: false,
          class: 'color_main_dark_background',
        },
        {
          text: 'CC3',
          align: 'start',
          value: 'cc3',
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
        // {
        //   text: 'Q13',
        //   align: 'start',
        //   value: 'q13',
        //   sortable: false,
        //   class: 'color_main_dark_background',
        // },
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
          text: 'DOCTOR',
          align: 'start',
          value: 'doctor',
          sortable: false,
          class: 'color_main_dark_background',
        },
        // NURSE
        {
          text: 'NURSE',
          align: 'start',
          value: 'nurse',
          sortable: false,
          class: 'color_main_dark_background',
        },
        // MIDWIFE
        {
          text: 'MIDWIFE',
          align: 'start',
          value: 'midwife',
          sortable: false,
          class: 'color_main_dark_background',
        },
        // SECURITY
        {
          text: 'SECURITY',
          align: 'start',
          value: 'security',
          sortable: false,
          class: 'color_main_dark_background',
        },
        // RADIOLOGY
        {
          text: 'RADIOLOGY',
          align: 'start',
          value: 'radiology',
          sortable: false,
          class: 'color_main_dark_background',
        },
        // PHARMACY
        {
          text: 'PHARMACY',
          align: 'start',
          value: 'pharmacy',
          sortable: false,
          class: 'color_main_dark_background',
        },
        // ADMITTING STAFF
        {
          text: 'ADMITTING STAFF',
          align: 'start',
          value: 'admitting',
          sortable: false,
          class: 'color_main_dark_background',
        },
        // MEDICAL RECORDS
        {
          text: 'MEDICAL RECORDS',
          align: 'start',
          value: 'medical_records',
          sortable: false,
          class: 'color_main_dark_background',
        },
        // BILLING
        {
          text: 'BILLING',
          align: 'start',
          value: 'billing',
          sortable: false,
          class: 'color_main_dark_background',
        },
        // CASHIER
        {
          text: 'CASHIER',
          align: 'start',
          value: 'cashier',
          sortable: false,
          class: 'color_main_dark_background',
        },
        // SOCIAL WORKER
        {
          text: 'SOCIAL WORKER',
          align: 'start',
          value: 'social_worker',
          sortable: false,
          class: 'color_main_dark_background',
        },
        // FOOD SERVER
        {
          text: 'FOOD SERVER',
          align: 'start',
          value: 'food_server',
          sortable: false,
          class: 'color_main_dark_background',
        },
        // JANITORS/ORDERLY
        {
          text: 'JANITORS/ORDERLY',
          align: 'start',
          value: 'janitors_orderly',
          sortable: false,
          class: 'color_main_dark_background',
        },
        {
          text: 'LOCATION',
          align: 'start',
          value: 'location',
          sortable: false,
          class: 'color_main_dark_background',
        },
        {
          text: 'ASSISTED BY',
          align: 'start',
          value: 'assisted_by',
          sortable: false,
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
        { text: 'Actions', value: 'actions', sortable: false, class: 'color_main_dark_background' },
      ],
      delete_request_headers: [
        {
          text: 'PSS ID',
          value: 'pss_id',
          align: 'start',
          sortable: false,
          filterable: false,
          class: 'color_main_dark_background',
        },
        {
          text: 'REQUESTED BY',
          value: 'requested_by',
          align: 'start',
          sortable: false,
          filterable: false,
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
        { text: 'Actions', value: 'actions', sortable: false, class: 'color_main_dark_background' },
      ],
      form: this.$inertia.form({
        pss_id: null,
      }),
      formDeleteRequest: this.$inertia.form({
        pss_id: null,
        user_id: null,
        status: 'pending',
      }),
    };
  },
  mounted() {
    console.log(this.surveyAnswers.data);
    this.processJsonData();
  },
  methods: {
    updateData() {
      this.json_data = [];
      this.$inertia.get('answers', this.params, {
        preserveState: true,
        preserveScroll: true,
        onFinish: (visit) => {
          this.json_data = [];
          this.processJsonData();
        },
      });
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
      this.surveyAnswers.data.forEach((e) => {
        this.json_data.push({
          ID: e.pss_id,
          RESPONDENT: e.respondent,
          AGE: e.age,
          SEX: e.sex,
          RELIGION: e.religion,
          'LEVEL OF EDUCATION': e.educational_attainment,
          'DATE OF CONSULT/VISIT': this.tzone2(e.date_of_visit),
          'POINT OF ENTRY': e.point_of_entry,
          'SERVICES AVAILED': e.service_availed,
          'VISIT PER YEAR': e.frequently_visit,
          'HOSPITAL #': e.hospital_number,
          PREFERENCE: e.preference,
          'PSS RATING': e.pss_rating,
          CC1: e.cc1,
          CC2: e.cc2,
          CC3: e.cc3,
          Q1: e.survey_answers[0].answer,
          Q2: e.survey_answers[1].answer,
          Q3: e.survey_answers[2].answer,
          Q4: e.survey_answers[3].answer,
          Q5: e.survey_answers[4].answer,
          Q6: e.survey_answers[5].answer,
          Q7: e.survey_answers[6].answer,
          Q8: e.survey_answers[7].answer,
          Q9: e.survey_answers[8].answer,
          Q10: e.survey_answers[9].answer,
          Q11: e.survey_answers[10].answer,
          Q12: e.survey_answers[11].answer,
          Q13: e.survey_answers[12].answer,
          Q14: e.survey_answers[13].answer,
          Q15: e.survey_answers[14].answer,
          Q16: e.survey_answers[15].answer,
          // about staff
          DOCTOR: e.survey_abt_staffs[0].rating, // doctor
          NURSE: e.survey_abt_staffs[1].rating, // nurse
          MIDWIFE: e.survey_abt_staffs[2].rating, // midwife
          SECURITY: e.survey_abt_staffs[3].rating, // security
          RADIOLOGY: e.survey_abt_staffs[4].rating, // radiology
          PHARMACY: e.survey_abt_staffs[5].rating, // pharmacy
          'ADMITTING STAFF': e.survey_abt_staffs[6].rating, // admitting staff
          'MED. RECORDS': e.survey_abt_staffs[7].rating, // medical records
          BILLING: e.survey_abt_staffs[8].rating, // billing
          CASHIER: e.survey_abt_staffs[9].rating, // cashier
          'SOCIAL WORKER': e.survey_abt_staffs[10].rating, // social worker
          'FOOD SERVER': e.survey_abt_staffs[11].rating, // food server
          'JANITORS/ORDERLY': e.survey_abt_staffs[12].rating, // janitors/orderly
          LOCATION: e.pss_location_detail != null ? e.pss_location_detail.wardname : e.ward_location_detail.wardname,
          'ASSISTED BY': e.assisted_by == null ? null : e.assisted_by.username,
          'SUBMITTED AT': this.tzone2(e.created_at),
        });
      });
    },
    clearDateFilter() {
      this.from = null;
      this.to = null;
      this.sex = 'NO FILTER';
      this.education = 'NO FILTER';
      this.department = null;
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
    deleteItem(item) {
      this.itemId = item.pss_id;
      this.dialogDelete = true;
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
        this.formDeleteRequest.pss_id = this.itemId;
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
    // options_delete_requests: function (val) {
    //   this.params.page = val.page;
    //   this.params.page_size = val.itemsPerPage;
    //   this.updateData();
    // },
    from: function (val) {
      this.params.from = val;
      this.updateData();
    },
    to: function (val) {
      this.params.to = val;
      this.updateData();
    },
    search: function (val) {
      this.params.search = val;
      this.params.page = 1;
      this.updateData();
    },
    sex: function (val) {
      if (val == 'NO FILTER') {
        this.params.sex = '';
      } else {
        this.params.sex = val;
      }
      this.updateData();
    },
    education: function (val) {
      if (val == 'NO FILTER') {
        this.params.education = '';
      } else {
        this.params.education = val;
      }
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
</style>
