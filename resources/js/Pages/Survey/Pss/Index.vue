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
                      <p class="ma-0">1. The waiting areas we used were clean, orderly, and comfortable.</p>
                      <v-btn-toggle
                        v-model="q1"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="q1 == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="q1 == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="q1 == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="q1 == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="q1 == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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
                      <p class="ma-0">
                        2. The toilets and bathrooms inside the facility were kept clean, orderly and with steady water
                        supply.
                      </p>
                      <v-btn-toggle
                        v-model="q2"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="q2 == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="q2 == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="q2 == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="q2 == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="q2 == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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
                      <p class="ma-0">3. The patients' rooms were kept clean, tidy and comfortable.</p>
                      <v-btn-toggle
                        v-model="q3"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="q3 == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="q3 == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="q3 == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="q3 == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="q3 == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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
                        v-model="partA1"
                        label="The processes were done fast, promptly and clearly"
                        class="text-h6-edited pa-1 font-weight-bold"
                        hide-details
                      ></v-checkbox>
                    </div>

                    <!-- q4 -->
                    <div v-if="partA1">
                      <p class="ma-0">4. Consultation process</p>
                      <v-btn-toggle
                        v-model="q4"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="q4 == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="q4 == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="q4 == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="q4 == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="q4 == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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
                      <p class="ma-0">5. Admission process</p>
                      <v-btn-toggle
                        v-model="q5"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="q5 == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="q5 == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="q5 == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="q5 == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="q5 == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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
                      <p class="ma-0">6. Laboratory and radiology processes</p>
                      <v-btn-toggle
                        v-model="q6"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="q6 == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="q6 == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="q6 == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="q6 == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="q6 == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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
                      <p class="ma-0">7. Discharge Process (Discharging, Billing , and Cashier)</p>
                      <v-btn-toggle
                        v-model="q7"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="q7 == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="q7 == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="q7 == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="q7 == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="q7 == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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
                      <p class="ma-0">8. Request of Documents from this Facility</p>
                      <v-btn-toggle
                        v-model="q8"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="q8 == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="q8 == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="q8 == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="q8 == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="q8 == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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
                      <p class="ma-0">9. Process of Request for Assistance from Medical Social Service</p>
                      <v-btn-toggle
                        v-model="q9"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="q9 == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="q9 == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="q9 == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="q9 == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="q9 == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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
                      <p class="ma-0">10. The medical condition and procedures were discussed clearly.</p>
                      <v-btn-toggle
                        v-model="q10"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="q10 == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="q10 == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="q10 == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="q10 == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="q10 == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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
                      <p class="ma-0">
                        11. Our sentiments, cultural background, and beliefs were heard and considered in the treatment
                        procedure.
                      </p>
                      <v-btn-toggle
                        v-model="q11"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="q11 == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="q11 == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="q11 == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="q11 == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="q11 == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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
                      <p class="ma-0">
                        12. We were given the chance to decide which treatment procedure shall be performed.
                      </p>
                      <v-btn-toggle
                        v-model="q12"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="q12 == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="q12 == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="q12 == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="q12 == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="q12 == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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
                      <p class="ma-0">
                        13. The discharge instructions were discussed to us clearly before we were allowed to go home,
                        including the time/date and site of the follow-up consultation.
                      </p>
                      <v-btn-toggle
                        v-model="q13"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="q13 == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="q13 == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="q13 == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="q13 == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="q13 == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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
                      <p class="ma-0">
                        14. For those eligible for assistance from Malasakit Center. All my medical costs were covered
                        for this particular medical treatment/admission.
                      </p>
                      <v-btn-toggle
                        v-model="q14"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="q14 == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="q14 == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="q14 == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="q14 == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="q14 == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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
      q1: undefined,
      q2: undefined,
      q3: undefined,
      partA1: false,
      q4: undefined,
      q5: undefined,
      q6: undefined,
      q7: undefined,
      q8: undefined,
      q9: undefined,
      q10: undefined,
      q11: undefined,
      q12: undefined,
      q13: undefined,
      q14: undefined,
    };
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
        this.q4 = undefined;
        this.q5 = undefined;
        this.q6 = undefined;
        this.q7 = undefined;
        this.q8 = undefined;
        this.q9 = undefined;
      }
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
