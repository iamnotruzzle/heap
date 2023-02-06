<template>
  <div class="background">
    <v-app>
      <v-container
        fluid
        class="background"
      >
        <v-layout
          align-center
          justify-center
        >
          <v-card
            elevation="24"
            class="corners large-screen"
          >
            <v-card-title>
              <v-row>
                <v-col cols="3">
                  <v-img
                    height="100"
                    src="images/logo_1.jpg"
                    contain
                  />
                </v-col>
                <v-col cols="3">
                  <v-img
                    height="100"
                    src="images/logo_2.jpg"
                    contain
                  />
                </v-col>
                <v-col cols="3">
                  <v-img
                    height="100"
                    src="images/logo_3.jpg"
                    contain
                  />
                </v-col>
                <v-col cols="3">
                  <v-img
                    height="100"
                    src="images/logo_4.jpg"
                    contain
                  />
                </v-col>
                <v-col
                  cols="12"
                  class="text-center word-break"
                >
                  <h6 class="text-h6-edited ma-0 pa-0">Mariano Marcos Memorial Hospital And Medical Center</h6>
                  <h4 class="text-h4-edited font-weight-bold ma-0 pa-0">PATIENT SATISFACTION QUESTIONNAIRE</h4>
                </v-col>
              </v-row>
            </v-card-title>

            <v-card-text>
              <v-row>
                <v-col cols="12">
                  <p>Dear <span class="font-weight-bold">Patient/Client,</span></p>
                  <div class="indent">
                    The following questions talk about your overall experience in this hospital. We wish to improve the
                    level of service we deliver our clients because you are important to us. Any comments or suggestions
                    you provide through this survey will be highly-appreciated and will be treated with utmost
                    confidentiality.
                  </div>
                </v-col>
              </v-row>

              <v-row>
                <v-col cols="12">
                  <p>
                    <b>Direction:</b> Put a check(<v-icon>mdi-check</v-icon>) mark on the appropriate box of your
                    answer:
                  </p>
                </v-col>
              </v-row>

              <v-form
                ref="form"
                class="no-wrap"
              >
                <v-row>
                  <v-col cols="12">
                    <p class="font-weight-bold">The Respondent of this Survey Form:</p>
                    <div class="d-flex flex-column ma-0 pa-0">
                      <v-checkbox
                        v-model="respondent"
                        label="Patient"
                        value="Patient"
                        dense
                        hide-details
                        class="mx-2"
                      ></v-checkbox>

                      <v-checkbox
                        v-model="respondent"
                        label="Companion(Family/Relative)"
                        value="Companion"
                        dense
                        hide-details
                        class="mx-2"
                      ></v-checkbox>

                      <div class="d-flex flex-row mx-2 mt-1">
                        <v-checkbox
                          v-model="enableRespondent"
                          dense
                        ></v-checkbox>
                        <v-text-field
                          v-model="otherRespondent"
                          :disabled="!enableRespondent"
                          label="Others (Specify)"
                          dense
                        ></v-text-field>
                      </div>
                    </div>
                  </v-col>

                  <v-col cols="12">
                    <v-divider color="black"></v-divider>
                  </v-col>

                  <!-- age -->
                  <v-col
                    cols="4"
                    md="2"
                  >
                    <label
                      for="age"
                      class="font-weight-bold"
                      >Age</label
                    >
                    <v-text-field
                      id="age"
                      v-model="age"
                      type="number"
                      hide-spin-buttons
                      dense
                    ></v-text-field>
                  </v-col>

                  <v-spacer></v-spacer>

                  <!-- sex -->
                  <v-col
                    cols="8"
                    md="2"
                  >
                    <label
                      for="sex"
                      class="font-weight-bold"
                      >Sex</label
                    >
                    <div class="d-flex flex-row">
                      <v-checkbox
                        id="sex"
                        v-model="sex"
                        label="Male"
                        value="Male"
                        dense
                        hide-details
                        class="mr-2"
                      ></v-checkbox>
                      <v-checkbox
                        id="sex"
                        v-model="sex"
                        label="Female"
                        value="Female"
                        dense
                        hide-details
                      ></v-checkbox>
                    </div>
                  </v-col>

                  <v-spacer></v-spacer>

                  <!-- religion -->
                  <v-col
                    cols="12"
                    md="6"
                  >
                    <label
                      for="religion"
                      class="font-weight-bold"
                      >Religion
                    </label>

                    <div class="d-flex flex-row">
                      <v-checkbox
                        id="religion"
                        v-model="religion"
                        label="Catholic"
                        value="Catholic"
                        dense
                        hide-details
                        class="mr-2"
                      ></v-checkbox>

                      <v-checkbox
                        id="religion"
                        v-model="religion"
                        label="Muslim"
                        value="Muslim"
                        dense
                        hide-details
                        class="mr-2"
                      ></v-checkbox>

                      <div class="d-flex flex-row">
                        <v-checkbox
                          id="religion"
                          v-model="enableReligion"
                          dense
                        ></v-checkbox>
                        <v-text-field
                          id="religion"
                          v-model="otherReligion"
                          :disabled="!enableReligion"
                          label="Others (Specify)"
                          dense
                        ></v-text-field>
                      </div>
                    </div>
                  </v-col>

                  <v-col cols="12">
                    <v-divider color="black"></v-divider>
                  </v-col>

                  <!-- educational attainment -->
                  <v-col cols="12">
                    <label
                      for="educAt"
                      class="font-weight-bold"
                    >
                      Educational Attainment
                    </label>

                    <div :class="$vuetify.breakpoint.smAndDown == true ? 'd-flex flex-column' : 'd-flex flex-row'">
                      <v-checkbox
                        id="educAt"
                        v-model="educationalAttainment"
                        label="Elementary"
                        value="Elementary"
                        dense
                        hide-details
                        class="mr-2"
                      ></v-checkbox>

                      <v-checkbox
                        id="educAt"
                        v-model="educationalAttainment"
                        label="Secondary"
                        value="Secondary"
                        dense
                        hide-details
                        class="mr-2"
                      ></v-checkbox>

                      <v-checkbox
                        id="educAt"
                        v-model="educationalAttainment"
                        label="Vocational"
                        value="Vocational"
                        dense
                        hide-details
                        class="mr-2"
                      ></v-checkbox>

                      <v-checkbox
                        id="educAt"
                        v-model="educationalAttainment"
                        label="College"
                        value="College"
                        dense
                        hide-details
                        class="mr-2"
                      ></v-checkbox>

                      <v-checkbox
                        id="educAt"
                        v-model="educationalAttainment"
                        label="Postgraduate/Masters"
                        value="Postgraduate/Masters"
                        dense
                        hide-details
                        class="mr-2"
                      ></v-checkbox>

                      <v-checkbox
                        id="educAt"
                        v-model="educationalAttainment"
                        label="No formal Education"
                        value="No formal Education"
                        dense
                        hide-details
                        class="mr-2"
                      ></v-checkbox>
                    </div>
                  </v-col>

                  <v-col cols="12">
                    <v-divider color="black"></v-divider>
                  </v-col>

                  <v-col
                    cols="12"
                    md="3"
                  >
                    <label
                      for="dateOfVisit"
                      class="font-weight-bold"
                    >
                      Date of Consultation/Visit
                    </label>
                    <v-text-field
                      id="dateOfVisit"
                      v-model="dateOfVisit"
                      type="date"
                      dense
                    ></v-text-field>
                  </v-col>

                  <v-col cols="12">
                    <v-divider color="black"></v-divider>
                  </v-col>

                  <!-- department visited -->
                  <v-col cols="12">
                    <label
                      for="department"
                      class="font-weight-bold"
                    >
                      Department Visited
                    </label>

                    <div :class="$vuetify.breakpoint.smAndDown == true ? 'd-flex flex-column' : 'd-flex flex-row'">
                      <v-checkbox
                        id="department"
                        v-model="department"
                        label="Emergency Room"
                        value="Emergency Room"
                        dense
                        hide-details
                        class="mr-2"
                      ></v-checkbox>

                      <v-checkbox
                        id="department"
                        v-model="department"
                        label="Outpatient Department"
                        value="Outpatient Department"
                        dense
                        hide-details
                        class="mr-2"
                      ></v-checkbox>

                      <v-checkbox
                        id="department"
                        v-model="department"
                        label="Inpatient/Ward"
                        value="Inpatient/Ward"
                        dense
                        hide-details
                        class="mr-2"
                      ></v-checkbox>

                      <div class="d-flex flex-row">
                        <v-checkbox
                          id="department"
                          v-model="enableDepartment"
                          dense
                        ></v-checkbox>
                        <v-text-field
                          id="department"
                          v-model="otherDepartment"
                          :disabled="!enableDepartment"
                          label="Other offices (Specify)"
                          dense
                        ></v-text-field>
                      </div>
                    </div>
                  </v-col>

                  <v-col cols="12">
                    <v-divider color="black"></v-divider>
                  </v-col>

                  <v-col cols="12">
                    <h5 class="text-h5-edited font-weight-bold">How would you rate our service?</h5>
                    <p>
                      <span class="font-weight-bold">Direction:</span>
                      Put a check mark(<v-icon>mdi-check</v-icon>) on the emoticon that best corresponds to your rating
                      for each item.
                    </p>

                    <!-- partA -->
                    <div class="grey lighten-1 mb-4">
                      <span class="text-h6-edited mx-2">A. Infrastructure and Process</span>
                    </div>

                    <!-- q1 -->
                    <div>
                      <p class="font-weight-bold ma-0">
                        1. The waiting areas we used were clean, orderly, and comfortable.
                      </p>
                      <v-btn-toggle
                        v-model="q1.rating"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="q1.rating == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="q1.rating == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="q1.rating == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="q1.rating == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="q1.rating == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="0"
                          active-class="blue white--text"
                        >
                          N/A
                        </v-btn>
                      </v-btn-toggle>
                    </div>

                    <div class="my-4"></div>

                    <!-- q2 -->
                    <div>
                      <p class="font-weight-bold ma-0">
                        2. The toilets and bathrooms inside the facility were kept clean, orderly and with steady water
                        supply.
                      </p>
                      <v-btn-toggle
                        v-model="q2.rating"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="q2.rating == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="q2.rating == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="q2.rating == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="q2.rating == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="q2.rating == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="0"
                          active-class="blue white--text"
                        >
                          N/A
                        </v-btn>
                      </v-btn-toggle>
                    </div>

                    <div class="my-4"></div>

                    <!-- q3 -->
                    <div>
                      <p class="font-weight-bold ma-0">3. The patients' rooms were kept clean, tidy and comfortable.</p>
                      <v-btn-toggle
                        v-model="q3.rating"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="q3.rating == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="q3.rating == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="q3.rating == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="q3.rating == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="q3.rating == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="0"
                          active-class="blue white--text"
                        >
                          N/A
                        </v-btn>
                      </v-btn-toggle>
                    </div>
                  </v-col>

                  <!-- partA1 -->
                  <v-col cols="12 my-0 py-0">
                    <div class="grey lighten-1 mb-4">
                      <v-checkbox
                        @click="togglePartA1"
                        label="The processes were done fast, promptly and clearly"
                        class="text-h6-edited pa-1 font-weight-bold"
                        hide-details
                      ></v-checkbox>
                    </div>

                    <!-- q4 -->
                    <div v-if="partA1">
                      <p class="font-weight-bold ma-0">4. Consultation process</p>
                      <v-btn-toggle
                        v-model="q4.rating"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="q4.rating == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="q4.rating == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="q4.rating == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="q4.rating == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="q4.rating == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="0"
                          active-class="blue white--text"
                        >
                          N/A
                        </v-btn>
                      </v-btn-toggle>
                    </div>

                    <div class="my-4"></div>

                    <!-- q5 -->
                    <div v-if="partA1">
                      <p class="font-weight-bold ma-0">5. Admission process</p>
                      <v-btn-toggle
                        v-model="q5.rating"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="q5.rating == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="q5.rating == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="q5.rating == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="q5.rating == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="q5.rating == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="0"
                          active-class="blue white--text"
                        >
                          N/A
                        </v-btn>
                      </v-btn-toggle>
                    </div>

                    <div class="my-4"></div>

                    <!-- q6 -->
                    <div v-if="partA1">
                      <p class="font-weight-bold ma-0">6. Laboratory and radiology processes</p>
                      <v-btn-toggle
                        v-model="q6.rating"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="q6.rating == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="q6.rating == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="q6.rating == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="q6.rating == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="q6.rating == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="0"
                          active-class="blue white--text"
                        >
                          N/A
                        </v-btn>
                      </v-btn-toggle>
                    </div>

                    <div class="my-4"></div>

                    <!-- q7 -->
                    <div v-if="partA1">
                      <p class="font-weight-bold ma-0">7. Discharge Process (Discharging, Billing , and Cashier)</p>
                      <v-btn-toggle
                        v-model="q7.rating"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="q7.rating == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="q7.rating == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="q7.rating == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="q7.rating == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="q7.rating == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="0"
                          active-class="blue white--text"
                        >
                          N/A
                        </v-btn>
                      </v-btn-toggle>
                    </div>

                    <div class="my-4"></div>

                    <!-- q8 -->
                    <div v-if="partA1">
                      <p class="font-weight-bold ma-0">8. Request of Documents from this Facility</p>
                      <v-btn-toggle
                        v-model="q8.rating"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="q8.rating == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="q8.rating == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="q8.rating == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="q8.rating == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="q8.rating == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="0"
                          active-class="blue white--text"
                        >
                          N/A
                        </v-btn>
                      </v-btn-toggle>
                    </div>

                    <div class="my-4"></div>

                    <!-- q9 -->
                    <div v-if="partA1">
                      <p class="font-weight-bold ma-0">
                        9. Process of Request for Assistance from Medical Social Service
                      </p>
                      <v-btn-toggle
                        v-model="q9.rating"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="q9.rating == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="q9.rating == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="q9.rating == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="q9.rating == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="q9.rating == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="0"
                          active-class="blue white--text"
                        >
                          N/A
                        </v-btn>
                      </v-btn-toggle>
                    </div>
                  </v-col>

                  <v-col cols="12">
                    <v-divider color="black"></v-divider>
                  </v-col>

                  <!-- partB -->
                  <v-col cols="12">
                    <div class="grey lighten-1 mb-4">
                      <span class="text-h6-edited mx-2">
                        B. Hospitals Staff's Relations towards patients, relative and companions
                      </span>
                    </div>

                    <!-- q10 -->
                    <div>
                      <p class="font-weight-bold ma-0">
                        10. The medical condition and procedures were discussed clearly.
                      </p>
                      <v-btn-toggle
                        v-model="q10.rating"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="q10.rating == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="q10.rating == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="q10.rating == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="q10.rating == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="q10.rating == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="0"
                          active-class="blue white--text"
                        >
                          N/A
                        </v-btn>
                      </v-btn-toggle>
                    </div>

                    <div class="my-4"></div>

                    <!-- q11 -->
                    <div>
                      <p class="font-weight-bold ma-0">
                        11. Our sentiments, cultural background, and beliefs were heard and considered in the treatment
                        procedure.
                      </p>
                      <v-btn-toggle
                        v-model="q11.rating"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="q11.rating == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="q11.rating == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="q11.rating == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="q11.rating == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="q11.rating == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="0"
                          active-class="blue white--text"
                        >
                          N/A
                        </v-btn>
                      </v-btn-toggle>
                    </div>

                    <div class="my-4"></div>

                    <!-- q12 -->
                    <div>
                      <p class="font-weight-bold ma-0">
                        12. We were given the chance to decide which treatment procedure shall be performed.
                      </p>
                      <v-btn-toggle
                        v-model="q12.rating"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="q12.rating == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="q12.rating == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="q12.rating == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="q12.rating == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="q12.rating == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="0"
                          active-class="blue white--text"
                        >
                          N/A
                        </v-btn>
                      </v-btn-toggle>
                    </div>

                    <div class="my-4"></div>

                    <!-- q13 -->
                    <div>
                      <p class="font-weight-bold ma-0">
                        13. The discharge instructions were discussed to us clearly before we were allowed to go home,
                        including the time/date and site of the follow-up consultation.
                      </p>
                      <v-btn-toggle
                        v-model="q13.rating"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="q13.rating == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="q13.rating == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="q13.rating == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="q13.rating == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="q13.rating == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="0"
                          active-class="blue white--text"
                        >
                          N/A
                        </v-btn>
                      </v-btn-toggle>
                    </div>

                    <div class="my-4"></div>

                    <!-- q14 -->
                    <div>
                      <p class="font-weight-bold ma-0">
                        14. For those eligible for assistance from Malasakit Center. All my medical costs were covered
                        for this particular medical treatment/admission.
                      </p>
                      <v-btn-toggle
                        v-model="q14.rating"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="q14.rating == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="q14.rating == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="q14.rating == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="q14.rating == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="q14.rating == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="0"
                          active-class="blue white--text"
                        >
                          N/A
                        </v-btn>
                      </v-btn-toggle>
                    </div>
                  </v-col>

                  <v-col cols="12">
                    <v-divider color="black"></v-divider>
                  </v-col>

                  <!-- partC -->
                  <v-col cols="12">
                    <div class="grey lighten-1 mb-4">
                      <span class="text-h6-edited mx-2"> C. Survey about the Hospital Staff </span>
                    </div>

                    <!-- survey staff -->
                    <div>
                      <p class="my-2 font-weight-bold">
                        15. The Hospital Staff we interacted with were courteous and helpful
                      </p>

                      <p class="ma-0 font-weight-bold">Doctor</p>
                      <v-btn-toggle
                        v-model="doctor.rating"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="doctor.rating == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="doctor.rating == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="doctor.rating == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="doctor.rating == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="doctor.rating == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="0"
                          active-class="blue white--text"
                        >
                          N/A
                        </v-btn>
                      </v-btn-toggle>

                      <div
                        v-if="doctor.rating != null && doctor.rating != 0"
                        class="mt-1"
                      >
                        <label for="doctor"> Comments/Suggestions (Optional) </label>
                        <v-textarea
                          id="doctor"
                          v-model="doctor.comment"
                          height="24"
                          outlined
                        ></v-textarea>
                      </div>
                    </div>

                    <div>
                      <p class="ma-0 font-weight-bold">Nurse</p>
                      <v-btn-toggle
                        v-model="nurse.rating"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="nurse.rating == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="nurse.rating == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="nurse.rating == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="nurse.rating == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="nurse.rating == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="0"
                          active-class="blue white--text"
                        >
                          N/A
                        </v-btn>
                      </v-btn-toggle>

                      <div
                        v-if="nurse.rating != null && nurse.rating != 0"
                        class="mt-1"
                      >
                        <label for="nurse"> Comments/Suggestions (Optional) </label>
                        <v-textarea
                          class="ma-0 pa-0"
                          id="nurse"
                          v-model="nurse.comment"
                          height="24"
                          outlined
                        ></v-textarea>
                      </div>
                    </div>

                    <div>
                      <p class="ma-0 font-weight-bold">Midwife</p>
                      <v-btn-toggle
                        v-model="midwife.rating"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="midwife.rating == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="midwife.rating == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="midwife.rating == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="midwife.rating == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="midwife.rating == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="0"
                          active-class="blue white--text"
                        >
                          N/A
                        </v-btn>
                      </v-btn-toggle>

                      <div
                        v-if="midwife.rating != null && midwife.rating != 0"
                        class="mt-1"
                      >
                        <label for="midwife"> Comments/Suggestions (Optional) </label>
                        <v-textarea
                          id="midwife"
                          v-model="midwife.comment"
                          height="24"
                          outlined
                        ></v-textarea>
                      </div>
                    </div>

                    <div>
                      <p class="ma-0 font-weight-bold">Security</p>
                      <v-btn-toggle
                        v-model="security.rating"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="security.rating == 5 ? 'white' : 'black'"
                            >mdi-emoticon-excited-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="security.rating == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="security.rating == 3 ? 'white' : 'black'"
                            >mdi-emoticon-neutral-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="security.rating == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="security.rating == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="0"
                          active-class="blue white--text"
                        >
                          N/A
                        </v-btn>
                      </v-btn-toggle>

                      <div
                        v-if="security.rating != null && security.rating != 0"
                        class="mt-1"
                      >
                        <label for="security"> Comments/Suggestions (Optional) </label>
                        <v-textarea
                          id="security"
                          v-model="security.comment"
                          height="24"
                          outlined
                        ></v-textarea>
                      </div>
                    </div>

                    <div>
                      <p class="ma-0 font-weight-bold">Radiology</p>
                      <v-btn-toggle
                        v-model="radiology.rating"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="radiology.rating == 5 ? 'white' : 'black'"
                            >mdi-emoticon-excited-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="radiology.rating == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="radiology.rating == 3 ? 'white' : 'black'"
                            >mdi-emoticon-neutral-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="radiology.rating == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="radiology.rating == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="0"
                          active-class="blue white--text"
                        >
                          N/A
                        </v-btn>
                      </v-btn-toggle>

                      <div
                        v-if="radiology.rating != null && radiology.rating != 0"
                        class="mt-1"
                      >
                        <label for="radiology"> Comments/Suggestions (Optional) </label>
                        <v-textarea
                          id="radiology"
                          v-model="radiology.comment"
                          height="24"
                          outlined
                        ></v-textarea>
                      </div>
                    </div>

                    <div>
                      <p class="ma-0 font-weight-bold">Pharmacy</p>
                      <v-btn-toggle
                        v-model="pharmacy.rating"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="pharmacy.rating == 5 ? 'white' : 'black'"
                            >mdi-emoticon-excited-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="pharmacy.rating == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="pharmacy.rating == 3 ? 'white' : 'black'"
                            >mdi-emoticon-neutral-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="pharmacy.rating == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="pharmacy.rating == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="0"
                          active-class="blue white--text"
                        >
                          N/A
                        </v-btn>
                      </v-btn-toggle>

                      <div
                        v-if="pharmacy.rating != null && pharmacy.rating != 0"
                        class="mt-1"
                      >
                        <label for="pharmacy"> Comments/Suggestions (Optional) </label>
                        <v-textarea
                          id="pharmacy"
                          v-model="pharmacy.comment"
                          height="24"
                          outlined
                        ></v-textarea>
                      </div>
                    </div>

                    <div>
                      <p class="ma-0 font-weight-bold">Laboratory</p>
                      <v-btn-toggle
                        v-model="laboratory.rating"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="laboratory.rating == 5 ? 'white' : 'black'"
                            >mdi-emoticon-excited-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="laboratory.rating == 4 ? 'white' : 'black'"
                            >mdi-emoticon-happy-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="laboratory.rating == 3 ? 'white' : 'black'"
                            >mdi-emoticon-neutral-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="laboratory.rating == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="laboratory.rating == 1 ? 'white' : 'black'"
                            >mdi-emoticon-angry-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="0"
                          active-class="blue white--text"
                        >
                          N/A
                        </v-btn>
                      </v-btn-toggle>

                      <div
                        v-if="laboratory.rating != null && laboratory.rating != 0"
                        class="mt-1"
                      >
                        <label for="laboratory"> Comments/Suggestions (Optional) </label>
                        <v-textarea
                          id="laboratory"
                          v-model="laboratory.comment"
                          height="24"
                          outlined
                        ></v-textarea>
                      </div>
                    </div>

                    <div>
                      <p class="ma-0 font-weight-bold">Admitting Staff</p>
                      <v-btn-toggle
                        v-model="admitting_staff.rating"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="admitting_staff.rating == 5 ? 'white' : 'black'"
                            >mdi-emoticon-excited-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="admitting_staff.rating == 4 ? 'white' : 'black'"
                            >mdi-emoticon-happy-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="admitting_staff.rating == 3 ? 'white' : 'black'"
                            >mdi-emoticon-neutral-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="admitting_staff.rating == 2 ? 'white' : 'black'"
                            >mdi-emoticon-sad-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="admitting_staff.rating == 1 ? 'white' : 'black'"
                            >mdi-emoticon-angry-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="0"
                          active-class="blue white--text"
                        >
                          N/A
                        </v-btn>
                      </v-btn-toggle>

                      <div
                        v-if="admitting_staff.rating != null && admitting_staff.rating != 0"
                        class="mt-1"
                      >
                        <label for="admitting_staff"> Comments/Suggestions (Optional) </label>
                        <v-textarea
                          id="admitting_staff"
                          v-model="admitting_staff.comment"
                          height="24"
                          outlined
                        ></v-textarea>
                      </div>
                    </div>

                    <div>
                      <p class="ma-0 font-weight-bold">Medical Records</p>
                      <v-btn-toggle
                        v-model="medical_records.rating"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="medical_records.rating == 5 ? 'white' : 'black'"
                            >mdi-emoticon-excited-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="medical_records.rating == 4 ? 'white' : 'black'"
                            >mdi-emoticon-happy-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="medical_records.rating == 3 ? 'white' : 'black'"
                            >mdi-emoticon-neutral-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="medical_records.rating == 2 ? 'white' : 'black'"
                            >mdi-emoticon-sad-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="medical_records.rating == 1 ? 'white' : 'black'"
                            >mdi-emoticon-angry-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="0"
                          active-class="blue white--text"
                        >
                          N/A
                        </v-btn>
                      </v-btn-toggle>

                      <div
                        v-if="medical_records.rating != null && medical_records.rating != 0"
                        class="mt-1"
                      >
                        <label for="medical_records"> Comments/Suggestions (Optional) </label>
                        <v-textarea
                          id="medical_records"
                          v-model="medical_records.comment"
                          height="24"
                          outlined
                        ></v-textarea>
                      </div>
                    </div>

                    <div>
                      <p class="ma-0 font-weight-bold">Billing</p>
                      <v-btn-toggle
                        v-model="billing.rating"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="billing.rating == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="billing.rating == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="billing.rating == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="billing.rating == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="billing.rating == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="0"
                          active-class="blue white--text"
                        >
                          N/A
                        </v-btn>
                      </v-btn-toggle>

                      <div
                        v-if="billing.rating != null && billing.rating != 0"
                        class="mt-1"
                      >
                        <label for="billing"> Comments/Suggestions (Optional) </label>
                        <v-textarea
                          id="billing"
                          v-model="billing.comment"
                          height="24"
                          outlined
                        ></v-textarea>
                      </div>
                    </div>

                    <div>
                      <p class="ma-0 font-weight-bold">Cashier</p>
                      <v-btn-toggle
                        v-model="cashier.rating"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="cashier.rating == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="cashier.rating == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="cashier.rating == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="cashier.rating == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="cashier.rating == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="0"
                          active-class="blue white--text"
                        >
                          N/A
                        </v-btn>
                      </v-btn-toggle>

                      <div
                        v-if="cashier.rating != null && cashier.rating != 0"
                        class="mt-1"
                      >
                        <label for="cashier"> Comments/Suggestions (Optional) </label>
                        <v-textarea
                          id="cashier"
                          v-model="cashier.comment"
                          height="24"
                          outlined
                        ></v-textarea>
                      </div>
                    </div>

                    <div>
                      <p class="ma-0 font-weight-bold">Social Worker</p>
                      <v-btn-toggle
                        v-model="social_worker.rating"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="social_worker.rating == 5 ? 'white' : 'black'"
                            >mdi-emoticon-excited-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="social_worker.rating == 4 ? 'white' : 'black'"
                            >mdi-emoticon-happy-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="social_worker.rating == 3 ? 'white' : 'black'"
                            >mdi-emoticon-neutral-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="social_worker.rating == 2 ? 'white' : 'black'"
                            >mdi-emoticon-sad-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="social_worker.rating == 1 ? 'white' : 'black'"
                            >mdi-emoticon-angry-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="0"
                          active-class="blue white--text"
                        >
                          N/A
                        </v-btn>
                      </v-btn-toggle>

                      <div
                        v-if="social_worker.rating != null && social_worker.rating != 0"
                        class="mt-1"
                      >
                        <label for="social_worker"> Comments/Suggestions (Optional) </label>
                        <v-textarea
                          id="social_worker"
                          v-model="social_worker.comment"
                          height="24"
                          outlined
                        ></v-textarea>
                      </div>
                    </div>

                    <div>
                      <p class="ma-0 font-weight-bold">Food Server</p>
                      <v-btn-toggle
                        v-model="food_server.rating"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="food_server.rating == 5 ? 'white' : 'black'"
                            >mdi-emoticon-excited-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="food_server.rating == 4 ? 'white' : 'black'"
                            >mdi-emoticon-happy-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="food_server.rating == 3 ? 'white' : 'black'"
                            >mdi-emoticon-neutral-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="food_server.rating == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="food_server.rating == 1 ? 'white' : 'black'"
                            >mdi-emoticon-angry-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="0"
                          active-class="blue white--text"
                        >
                          N/A
                        </v-btn>
                      </v-btn-toggle>

                      <div
                        v-if="food_server.rating != null && food_server.rating != 0"
                        class="mt-1"
                      >
                        <label for="food_server"> Comments/Suggestions (Optional) </label>
                        <v-textarea
                          id="food_server"
                          v-model="food_server.comment"
                          height="24"
                          outlined
                        ></v-textarea>
                      </div>
                    </div>

                    <div>
                      <p class="ma-0 font-weight-bold">Janitors/Orderly</p>
                      <v-btn-toggle
                        v-model="janitors_orderly.rating"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="janitors_orderly.rating == 5 ? 'white' : 'black'"
                            >mdi-emoticon-excited-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="janitors_orderly.rating == 4 ? 'white' : 'black'"
                            >mdi-emoticon-happy-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="janitors_orderly.rating == 3 ? 'white' : 'black'"
                            >mdi-emoticon-neutral-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="janitors_orderly.rating == 2 ? 'white' : 'black'"
                            >mdi-emoticon-sad-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="janitors_orderly.rating == 1 ? 'white' : 'black'"
                            >mdi-emoticon-angry-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="0"
                          active-class="blue white--text"
                        >
                          N/A
                        </v-btn>
                      </v-btn-toggle>

                      <div
                        v-if="janitors_orderly.rating != null && janitors_orderly.rating != 0"
                        class="mt-1"
                      >
                        <label for="janitors_orderly"> Comments/Suggestions (Optional) </label>
                        <v-textarea
                          id="janitors_orderly"
                          v-model="janitors_orderly.comment"
                          height="24"
                          outlined
                        ></v-textarea>
                      </div>
                    </div>

                    <div class="my-4"></div>

                    <!-- q15 -->
                    <div>
                      <p class="font-weight-bold ma-0">
                        16. The information with regard to our medical treatment was kept confidential.
                      </p>
                      <v-btn-toggle
                        v-model="q15.rating"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="q15.rating == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="q15.rating == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="q15.rating == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="q15.rating == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="q15.rating == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="0"
                          active-class="blue white--text"
                        >
                          N/A
                        </v-btn>
                      </v-btn-toggle>
                    </div>
                  </v-col>

                  <v-col cols="12">
                    <v-divider color="black"></v-divider>
                  </v-col>
                </v-row>
              </v-form>
            </v-card-text>
          </v-card>
        </v-layout>
      </v-container>
    </v-app>
  </div>
</template>

<script>
export default {
  props: {
    hospital_staffs: Array,
    survey_questions: Array,
  },
  data() {
    return {
      respondent: '',
      enableRespondent: false,
      otherRespondent: '',
      age: '',
      sex: '',
      religion: '',
      enableReligion: false,
      otherReligion: '',
      educationalAttainment: '',
      dateOfVisit: '',
      department: '',
      enableDepartment: false,
      otherDepartment: '',
      q1: {
        id: 1,
        rating: undefined,
      },
      q2: {
        id: 2,
        rating: undefined,
      },
      q3: {
        id: 3,
        rating: undefined,
      },
      partA1: false,
      q4: {
        id: 4,
        rating: undefined,
      },
      q5: {
        id: 5,
        rating: undefined,
      },
      q6: {
        id: 6,
        rating: undefined,
      },
      q7: {
        id: 7,
        rating: undefined,
      },
      q8: {
        id: 8,
        rating: undefined,
      },
      q9: {
        id: 9,
        rating: undefined,
      },
      q10: {
        id: 10,
        rating: undefined,
      },
      q11: {
        id: 11,
        rating: undefined,
      },
      q12: {
        id: 12,
        rating: undefined,
      },
      q13: {
        id: 13,
        rating: undefined,
      },
      q14: {
        id: 14,
        rating: undefined,
      },
      doctor: {
        staff_type: this.hospital_staffs[0].id,
        rating: null,
        comment: '',
      },
      nurse: {
        staff_type: this.hospital_staffs[1].id,
        rating: undefined,
        comment: '',
      },
      midwife: {
        staff_type: this.hospital_staffs[2].id,
        rating: undefined,
        comment: '',
      },
      security: {
        staff_type: this.hospital_staffs[3].id,
        rating: undefined,
        comment: '',
      },
      radiology: {
        staff_type: this.hospital_staffs[4].id,
        rating: undefined,
        comment: '',
      },
      pharmacy: {
        staff_type: this.hospital_staffs[5].id,
        rating: undefined,
        comment: '',
      },
      laboratory: {
        staff_type: this.hospital_staffs[6].id,
        rating: undefined,
        comment: '',
      },
      admitting_staff: {
        staff_type: this.hospital_staffs[7].id,
        rating: undefined,
        comment: '',
      },
      medical_records: {
        staff_type: this.hospital_staffs[8].id,
        rating: undefined,
        comment: '',
      },
      billing: {
        staff_type: this.hospital_staffs[9].id,
        rating: undefined,
        comment: '',
      },
      cashier: {
        staff_type: this.hospital_staffs[10].id,
        rating: undefined,
        comment: '',
      },
      social_worker: {
        staff_type: this.hospital_staffs[11].id,
        rating: undefined,
        comment: '',
      },
      food_server: {
        staff_type: this.hospital_staffs[12].id,
        rating: undefined,
        comment: '',
      },
      janitors_orderly: {
        staff_type: this.hospital_staffs[13].id,
        rating: undefined,
        comment: '',
      },
      q15: {
        id: 15,
        rating: undefined,
      },
    };
  },
  mounted() {
    console.log('hospital staffs', this.hospital_staffs);
    console.log('survey questions', this.survey_questions);
  },
  watch: {
    respondent: function (val) {
      if (this.respondent != '') {
        this.otherRespondent = '';
        this.enableRespondent = false;
      }
    },
    enableRespondent: function (val) {
      if (this.enableRespondent == true) {
        this.respondent = '';
      }
    },
    religion: function (val) {
      if (this.religion != '') {
        this.otherReligion = '';
        this.enableReligion = false;
      }
    },
    enableReligion: function (val) {
      if (this.enableReligion == true) {
        this.religion = '';
      }
    },
    department: function (val) {
      if (this.department != '') {
        this.otherDepartment = '';
        this.enableDepartment = false;
      }
    },
    enableDepartment: function (val) {
      if (this.enableDepartment == true) {
        this.department = '';
      }
    },
    partA1: function (val) {
      if (this.partA1 == false) {
        this.q4.rating = undefined;
        this.q5.rating = undefined;
        this.q6.rating = undefined;
        this.q7.rating = undefined;
        this.q8.rating = undefined;
        this.q9.rating = undefined;
      }
    },
    'doctor.rating': function (val) {
      if (this.doctor.rating == 0) {
        this.doctor.comment = '';
      }
    },
    'nurse.rating': function (val) {
      if (this.nurse.rating == 0) {
        this.nurse.comment = '';
      }
    },
    'midwife.rating': function (val) {
      if (this.midwife.rating == 0) {
        this.midwife.comment = '';
      }
    },
    'security.rating': function (val) {
      if (this.security.rating == 0) {
        this.security.comment = '';
      }
    },
    'radiology.rating': function (val) {
      if (this.radiology.rating == 0) {
        this.radiology.comment = '';
      }
    },
    'pharmacy.rating': function (val) {
      if (this.pharmacy.rating == 0) {
        this.pharmacy.comment = '';
      }
    },
    'laboratory.rating': function (val) {
      if (this.laboratory.rating == 0) {
        this.laboratory.comment = '';
      }
    },
    'admitting_staff.rating': function (val) {
      if (this.admittinh_staff.rating == 0) {
        this.admittinh_staff.comment = '';
      }
    },
    'medical_records.rating': function (val) {
      if (this.medical_records.rating == 0) {
        this.medical_records.comment = '';
      }
    },
    'billing.rating': function (val) {
      if (this.billing.rating == 0) {
        this.billing.comment = '';
      }
    },
    'cashier.rating': function (val) {
      if (this.cashier.rating == 0) {
        this.cashier.comment = '';
      }
    },
    'social_worker.rating': function (val) {
      if (this.social_worker.rating == 0) {
        this.social_worker.comment = '';
      }
    },
    'food_server.rating': function (val) {
      if (this.food_server.rating == 0) {
        this.food_server.comment = '';
      }
    },
    'janitors_orderly.rating': function (val) {
      if (this.janitors_orderly.rating == 0) {
        this.janitors_orderly.comment = '';
      }
    },
  },
  methods: {
    togglePartA1() {
      this.partA1 = !this.partA1;
    },
  },
};
</script>

<style scoped>
.background {
  height: 100%;
  background-color: #ffe9ec;
  font-family: 'Roboto', sans-serif;
}

.corners {
  border-radius: 8px;
}

.word-break {
  word-break: break-word;
}

.indent {
  text-indent: 50px;
  text-align: justify;
}

.large-screen {
  max-width: 1000px !important;
}

.no-wrap {
  white-space: no-wrap;
}

.active {
  color: green;
}
</style>
