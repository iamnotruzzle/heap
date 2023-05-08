<template>
  <div class="background">
    <v-app>
      <v-container
        fluid
        class="background"
      >
        <v-layout
          justify-center
          align-center
        >
          <v-card
            elevation="24"
            class="corners large-screen"
          >
            <v-tabs
              active-class="blue white--text"
              grow
              v-model="selectedTab"
            >
              <Link
                as="v-tab"
                key="0"
                href="iloco"
                >Iloco</Link
              >
              <Link
                as="v-tab"
                key="1"
                href="tagalog"
                >Tagalog</Link
              >
              <Link
                as="v-tab"
                key="2"
                href="eng"
                >English</Link
              >
            </v-tabs>

            <v-card-title>
              <v-row>
                <v-col cols="12">
                  <div class="d-flex flex-row justify-space-around align-center">
                    <v-img
                      height="90px"
                      width="20px"
                      src="images/doh-logo.png"
                      contain
                    />

                    <v-img
                      height="90px"
                      width="20px"
                      src="images/logo_2.jpg"
                      contain
                    />

                    <v-img
                      height="90px"
                      width="20px"
                      src="images/f1_plus.jpg"
                      contain
                    />

                    <v-img
                      height="90px"
                      width="20px"
                      src="images/logo_4.jpg"
                      contain
                    />

                    <v-img
                      height="90px"
                      width="20px"
                      src="images/socotec.jpg"
                      contain
                    />
                  </div>
                </v-col>

                <v-col
                  cols="12"
                  class="text-center word-break"
                >
                  <h6 class="text-h6-edited ma-0 pa-0">Mariano Marcos Memorial Hospital And Medical Center</h6>
                  <h4 class="text-h4-edited ma-0 pa-0">HOSPITAL CLIENT EXPERIENCE SURVEY (HCES)</h4>
                </v-col>
              </v-row>
            </v-card-title>

            <v-card-text>
              <v-row class="font-weight-black mb-4">
                <v-col cols="12">
                  <div class="font-italic text-center">
                    This survey will serve as a basis to help us to improve our services for you to have a better
                    experience in the facility because you are important to us. Any comments or suggestions you provide
                    through this survey will be highly-appreciated and will be treated with utmost confidentiality.
                  </div>
                </v-col>
              </v-row>

              <v-form
                ref="form"
                class="no-wrap"
              >
                <div class="grey lighten-1 mb-4">
                  <p class="text-h6-edited mx-2 py-1">
                    Direction: Put a check(<v-icon>mdi-check</v-icon>) mark on the appropriate box of your answer:
                  </p>
                </div>

                <v-row class="font-weight-black">
                  <v-col cols="12">
                    <div>
                      <p>The Respondent of this Survey Form:</p>
                    </div>
                    <div class="d-flex flex-column ma-0 pa-0">
                      <v-checkbox
                        v-model="form.respondent"
                        label="Patient"
                        value="Patient"
                        dense
                        hide-details
                        class="mx-2"
                      ></v-checkbox>

                      <v-checkbox
                        v-model="form.respondent"
                        label="Companion(Family/Relative)"
                        value="Companion"
                        dense
                        hide-details
                        class="mx-2"
                      ></v-checkbox>

                      <v-checkbox
                        v-model="form.respondent"
                        label="Business(Visited for business purposes)"
                        value="Business"
                        dense
                        hide-details
                        class="mx-2"
                      ></v-checkbox>

                      <v-checkbox
                        v-model="form.respondent"
                        label="Employee"
                        value="Employee"
                        dense
                        hide-details
                        class="mx-2"
                      ></v-checkbox>
                    </div>
                  </v-col>

                  <v-col cols="12">
                    <v-divider color="black"></v-divider>
                  </v-col>

                  <!-- age -->
                  <v-col
                    cols="12"
                    md="3"
                    class="font-weight-black ma-0 pb-0"
                  >
                    <label
                      for="age"
                      v-if="form.errors.age"
                      class="red--text"
                    >
                      Age
                    </label>
                    <label
                      for="age"
                      v-else
                    >
                      Age
                    </label>
                    <v-text-field
                      id="age"
                      v-model="form.age"
                      type="number"
                      hide-spin-buttons
                      outlined
                      dense
                    ></v-text-field>
                  </v-col>

                  <!-- sex -->
                  <v-col
                    cols="12"
                    md="3"
                    class="font-weight-black"
                  >
                    <label
                      for="sex"
                      v-if="form.errors.sex"
                      class="red--text"
                    >
                      Sex
                    </label>
                    <label
                      for="sex"
                      v-else
                    >
                      Sex
                    </label>

                    <div class="d-flex flex-row">
                      <v-checkbox
                        id="sex"
                        v-model="form.sex"
                        label="Male"
                        value="Male"
                        dense
                        hide-details
                        class="mr-2"
                      ></v-checkbox>
                      <v-checkbox
                        id="sex"
                        v-model="form.sex"
                        label="Female"
                        value="Female"
                        dense
                        hide-details
                      ></v-checkbox>
                    </div>
                  </v-col>

                  <!-- religion -->
                  <v-col
                    cols="12"
                    md="6"
                    class="font-weight-black ma-0"
                  >
                    <label
                      for="religion"
                      v-if="form.errors.religion"
                      class="red--text"
                    >
                      Religion (Please encode if your religion is not included in the list. )
                    </label>
                    <label
                      for="religion"
                      v-else
                    >
                      Religion (Please encode if your religion is not included in the list. )
                    </label>

                    <v-combobox
                      id="religion"
                      v-model="form.religion"
                      :items="religions"
                      dense
                      hide-details
                      outlined
                    ></v-combobox>
                  </v-col>

                  <v-col cols="12">
                    <v-divider color="black"></v-divider>
                  </v-col>

                  <!-- educational attainment -->
                  <v-col cols="12">
                    <label
                      for="educAt"
                      v-if="form.errors.educationalAttainment"
                      class="red--text"
                    >
                      Educational Attainment
                    </label>
                    <label
                      for="educAt"
                      v-else
                    >
                      Educational Attainment
                    </label>

                    <div :class="$vuetify.breakpoint.smAndDown == true ? 'd-flex flex-column' : 'd-flex flex-row'">
                      <v-checkbox
                        id="educAt"
                        :disabled="!enableElementary"
                        v-model="form.educationalAttainment"
                        label="Elementary"
                        value="Elementary"
                        dense
                        hide-details
                        class="mr-2"
                      ></v-checkbox>

                      <v-checkbox
                        id="educAt"
                        :disabled="!enableSecondary"
                        v-model="form.educationalAttainment"
                        label="Secondary"
                        value="Secondary"
                        dense
                        hide-details
                        class="mr-2"
                      ></v-checkbox>

                      <v-checkbox
                        id="educAt"
                        :disabled="!enableVocational"
                        v-model="form.educationalAttainment"
                        label="Vocational"
                        value="Vocational"
                        dense
                        hide-details
                        class="mr-2"
                      ></v-checkbox>

                      <v-checkbox
                        id="educAt"
                        :disabled="!enableCollege"
                        v-model="form.educationalAttainment"
                        label="College"
                        value="College"
                        dense
                        hide-details
                        class="mr-2"
                      ></v-checkbox>

                      <v-checkbox
                        id="educAt"
                        :disabled="!enablePGM"
                        v-model="form.educationalAttainment"
                        label="Postgraduate/Masters"
                        value="Postgraduate/Masters"
                        dense
                        hide-details
                        class="mr-2"
                      ></v-checkbox>

                      <v-checkbox
                        id="educAt"
                        :disabled="!enableNoEduc"
                        v-model="form.educationalAttainment"
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
                      v-if="form.errors.dateOfVisit"
                      class="red--text"
                    >
                      Date of Consultation/Visit
                    </label>
                    <label
                      for="dateOfVisit"
                      v-else
                    >
                      Date of Consultation/Visit
                    </label>

                    <v-menu
                      ref="datePickerMenu"
                      v-model="datePickerMenu"
                      :close-on-content-click="false"
                      return-value.sync="form.dateOfVisit"
                      transition="scale-transition"
                      offset-y
                      min-width="auto"
                    >
                      <template v-slot:activator="{ on, attrs }">
                        <v-text-field
                          v-model="form.dateOfVisit"
                          append-outer-icon="mdi-calendar"
                          readonly
                          v-bind="attrs"
                          v-on="on"
                          outlined
                          dense
                          hide-details
                          id="dateOfVisit"
                          class="change-width"
                        ></v-text-field>
                      </template>
                      <v-date-picker
                        v-model="form.dateOfVisit"
                        min="2022-01-01"
                        :max="maxDate"
                        no-title
                        scrollable
                        @input="datePickerMenu = false"
                      >
                      </v-date-picker>
                    </v-menu>
                  </v-col>

                  <v-col cols="12">
                    <v-divider color="black"></v-divider>
                  </v-col>

                  <v-col cols="12">
                    <label
                      for="pointOfEntry"
                      v-if="form.errors.pointOfEntry"
                      class="red--text"
                    >
                      Point of entry (Please encode if not on the list.)
                    </label>
                    <label
                      for="pointOfEntry"
                      v-else
                    >
                      Point of entry (Please encode if not on the list.)
                    </label>

                    <v-combobox
                      id="departments"
                      v-model="form.pointOfEntry"
                      :items="departments"
                      dense
                      hide-details
                      outlined
                    ></v-combobox>
                  </v-col>

                  <v-col cols="12">
                    <v-divider color="black"></v-divider>
                  </v-col>

                  <v-col cols="12">
                    <div
                      v-if="form.errors.serviceAvailed || form.errors.otherServiceAvailed"
                      class="red--text mx-2"
                    >
                      <p>Service Availed:</p>
                    </div>
                    <div v-else>
                      <p>Service Availed:</p>
                    </div>
                    <div class="d-flex flex-row ma-0 pa-0">
                      <div class="mr-14">
                        <v-checkbox
                          v-model="form.serviceAvailed"
                          label="Consultation"
                          value="Consultation"
                          dense
                          hide-details
                          class="mx-2"
                        ></v-checkbox>

                        <v-checkbox
                          v-model="form.serviceAvailed"
                          label="Admission"
                          value="Admission"
                          dense
                          hide-details
                          class="mx-2"
                        ></v-checkbox>

                        <v-checkbox
                          v-model="form.serviceAvailed"
                          label="Laboratory"
                          value="Laboratory"
                          dense
                          hide-details
                          class="mx-2"
                        ></v-checkbox>

                        <v-checkbox
                          v-model="form.serviceAvailed"
                          label="Radiology"
                          value="Radiology"
                          dense
                          hide-details
                          class="mx-2"
                        ></v-checkbox>

                        <v-checkbox
                          v-model="form.serviceAvailed"
                          label="Discharge"
                          value="Discharge"
                          dense
                          hide-details
                          class="mx-2"
                        ></v-checkbox>

                        <v-checkbox
                          v-model="form.serviceAvailed"
                          label="Settlement of fees"
                          value="Settlement of fees"
                          dense
                          hide-details
                          class="mx-2"
                        ></v-checkbox>
                      </div>

                      <div>
                        <v-checkbox
                          v-model="form.serviceAvailed"
                          label="Request for Medical Records"
                          value="Request for Medical Records"
                          dense
                          hide-details
                          class="mx-2"
                        ></v-checkbox>

                        <v-checkbox
                          v-model="form.serviceAvailed"
                          label="Request for Psychosocial Assessment/Intervention"
                          value="Request for Psychosocial Assessment/Intervention"
                          dense
                          hide-details
                          class="mx-2"
                        ></v-checkbox>

                        <v-checkbox
                          v-model="form.serviceAvailed"
                          label="Request for Financial Assistance"
                          value="Request for Financial Assistance"
                          dense
                          hide-details
                          class="mx-2"
                        ></v-checkbox>

                        <v-checkbox
                          v-model="form.serviceAvailed"
                          label="Counseling (i.e Nutrition and Dietetics)"
                          value="Counseling (i.e Nutrition and Dietetics)"
                          dense
                          hide-details
                          class="mx-2"
                        ></v-checkbox>

                        <div class="d-flex flex-row mx-2 mt-1">
                          <v-checkbox
                            v-model="enableServiceAvailed"
                            dense
                          ></v-checkbox>
                          <v-text-field
                            v-model="form.otherServiceAvailed"
                            :disabled="!enableServiceAvailed"
                            label="Others (Specify)"
                            dense
                          ></v-text-field>
                        </div>
                      </div>
                    </div>
                  </v-col>

                  <v-col cols="12">
                    <v-divider color="black"></v-divider>
                  </v-col>

                  <v-col cols="12">
                    <div>
                      <p>How frequent do you visit this facility?</p>
                    </div>
                    <div class="d-flex flex-row ma-0 pa-0">
                      <div class="mr-14 d-flex flex-row">
                        <v-checkbox
                          v-model="form.frequentlyVisit"
                          label="First time"
                          value="First time"
                          dense
                          hide-details
                          class="mx-2"
                        ></v-checkbox>

                        <v-checkbox
                          v-model="form.frequentlyVisit"
                          label="1-3x a year"
                          value="1-3x a year"
                          dense
                          hide-details
                          class="mx-2"
                        ></v-checkbox>

                        <v-checkbox
                          v-model="form.frequentlyVisit"
                          label="4-6x a year"
                          value="4-6x a year"
                          dense
                          hide-details
                          class="mx-2"
                        ></v-checkbox>

                        <v-checkbox
                          v-model="form.frequentlyVisit"
                          label="7-11x a year"
                          value="7-11x a year"
                          dense
                          hide-details
                          class="mx-2"
                        ></v-checkbox>

                        <v-checkbox
                          v-model="form.frequentlyVisit"
                          label=">12x a year"
                          value=">12x a year"
                          dense
                          hide-details
                          class="mx-2"
                        ></v-checkbox>
                      </div>
                    </div>
                  </v-col>

                  <v-col cols="12">
                    <v-divider color="black"></v-divider>
                  </v-col>

                  <v-col cols="12">
                    <h5 class="text-h5-edited font-weight-black text-center display-1">
                      The Citizen’s Charter is an official document that reflects the services of a government
                      agency/office including its requirements, fees, and processing times among others.
                    </h5>

                    <p class="my-6 title">
                      <span class="font-weight-black">INSTRUCTIONS:</span>
                      Put a check mark (✔) your answer to the Citizen’s Charter (CC) questions.
                    </p>

                    <!-- cc1 -->
                    <div>
                      <p class="font-weight-black ma-0 subtitle-1">
                        Which of the following best describes your awareness of a CC?
                      </p>
                      <div>
                        <v-checkbox
                          v-model="form.cc1"
                          label="I know what a CC is and I saw this office's CC."
                          :value="1"
                          dense
                          hide-details
                          class="mx-2"
                        ></v-checkbox>

                        <v-checkbox
                          v-model="form.cc1"
                          label="I know what a CC is but I did NOT see this office's CC."
                          :value="2"
                          dense
                          hide-details
                          class="mx-2"
                        ></v-checkbox>

                        <v-checkbox
                          v-model="form.cc1"
                          label="I learned of the CC only when I saw this office's CC."
                          :value="3"
                          dense
                          hide-details
                          class="mx-2"
                        ></v-checkbox>

                        <v-checkbox
                          v-model="form.cc1"
                          label="I do not know what a CC is and I did not see one in this office."
                          :value="4"
                          dense
                          hide-details
                          class="mx-2"
                        ></v-checkbox>
                      </div>
                    </div>

                    <!-- cc2 -->
                    <div class="mt-2">
                      <p class="font-weight-black ma-0 subtitle-1">
                        If aware of CC, would you say that the CC of this office was …?
                      </p>
                      <div>
                        <v-checkbox
                          v-model="form.cc2"
                          label="Easy to see"
                          :value="1"
                          dense
                          hide-details
                          :disabled="disableCC"
                          class="mx-2"
                        ></v-checkbox>

                        <v-checkbox
                          v-model="form.cc2"
                          label="Somewhat easy to see"
                          :value="2"
                          dense
                          hide-details
                          :disabled="disableCC"
                          class="mx-2"
                        ></v-checkbox>

                        <v-checkbox
                          v-model="form.cc2"
                          label="Difficult to see"
                          :value="3"
                          dense
                          hide-details
                          :disabled="disableCC"
                          class="mx-2"
                        ></v-checkbox>

                        <v-checkbox
                          v-model="form.cc2"
                          label="Not visible at all"
                          :value="4"
                          dense
                          hide-details
                          :disabled="disableCC"
                          class="mx-2"
                        ></v-checkbox>

                        <v-checkbox
                          v-model="form.cc2"
                          label="N/A"
                          :value="5"
                          dense
                          hide-details
                          class="mx-2"
                        ></v-checkbox>
                      </div>
                    </div>

                    <!-- cc3 -->
                    <div class="mt-2">
                      <p class="font-weight-black ma-0 subtitle-1">
                        If aware of CC, how much did the CC help you in your transaction?
                      </p>
                      <div>
                        <v-checkbox
                          v-model="form.cc3"
                          label="Helped very much"
                          :value="1"
                          dense
                          hide-details
                          :disabled="disableCC"
                          class="mx-2"
                        ></v-checkbox>

                        <v-checkbox
                          v-model="form.cc3"
                          label="Somewhat helped"
                          :value="2"
                          dense
                          hide-details
                          :disabled="disableCC"
                          class="mx-2"
                        ></v-checkbox>

                        <v-checkbox
                          v-model="form.cc3"
                          label="Did not help"
                          :value="3"
                          dense
                          hide-details
                          :disabled="disableCC"
                          class="mx-2"
                        ></v-checkbox>

                        <v-checkbox
                          v-model="form.cc3"
                          label="N/A"
                          :value="4"
                          dense
                          hide-details
                          class="mx-2"
                        ></v-checkbox>
                      </div>
                    </div>
                  </v-col>

                  <v-col cols="12">
                    <v-divider color="black"></v-divider>
                  </v-col>

                  <v-col cols="12">
                    <h5 class="text-h5-edited font-weight-black">How would you rate our service?</h5>
                    <p>
                      <span class="font-weight-black">Direction:</span>
                      Click on the emoticon that best corresponds to your rating for each item.
                    </p>

                    <!-- partA -->
                    <div class="grey lighten-1 mb-4">
                      <span class="text-h6-edited mx-2">A. Infrastructure and Process</span>
                    </div>

                    <!-- q1 The waiting areas were clean, orderly, and comfortable. -->
                    <div>
                      <p
                        v-if="form.errors[`q1.rating`]"
                        class="font-weight-black ma-0 red--text"
                      >
                        1. {{ survey_questions[0].desc }}
                      </p>
                      <p
                        v-else
                        class="font-weight-black ma-0"
                      >
                        1. {{ survey_questions[0].desc }}
                      </p>

                      <v-btn-toggle
                        v-model="form.q1.rating"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="form.q1.rating == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="form.q1.rating == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="form.q1.rating == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="form.q1.rating == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="form.q1.rating == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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

                    <!-- q2 The toilets and bathrooms inside the facility were kept clean, orderly and with a steady water supply.-->
                    <div>
                      <p
                        v-if="form.errors[`q2.rating`]"
                        class="font-weight-black ma-0 red--text"
                      >
                        2. {{ survey_questions[1].desc }}
                      </p>
                      <p
                        v-else
                        class="font-weight-black ma-0"
                      >
                        2. {{ survey_questions[1].desc }}
                      </p>

                      <v-btn-toggle
                        v-model="form.q2.rating"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="form.q2.rating == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="form.q2.rating == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="form.q2.rating == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="form.q2.rating == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="form.q2.rating == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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

                    <!-- q3 The patients' rooms were kept clean, tidy, and comfortable.-->
                    <div>
                      <p
                        v-if="form.errors[`q3.rating`]"
                        class="font-weight-black ma-0 red--text"
                      >
                        3. {{ survey_questions[2].desc }}
                      </p>
                      <p
                        v-else
                        class="font-weight-black ma-0"
                      >
                        3. {{ survey_questions[2].desc }}
                      </p>

                      <v-btn-toggle
                        v-model="form.q3.rating"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="form.q3.rating == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="form.q3.rating == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="form.q3.rating == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="form.q3.rating == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="form.q3.rating == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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

                    <!-- q4 The steps (including payment) I needed to do for my transaction were easy and simple.(SQD3).-->
                    <div>
                      <p
                        v-if="form.errors[`q4.rating`]"
                        class="font-weight-black ma-0 red--text"
                      >
                        4. {{ survey_questions[3].desc }}
                      </p>
                      <p
                        v-else
                        class="font-weight-black ma-0"
                      >
                        4. {{ survey_questions[3].desc }}
                      </p>

                      <v-btn-toggle
                        v-model="form.q4.rating"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="form.q4.rating == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="form.q4.rating == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="form.q4.rating == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="form.q4.rating == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="form.q4.rating == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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

                    <!-- q5 The office followed the transaction’s requirements and steps based on the information provided.(SQD2).-->
                    <div>
                      <p
                        v-if="form.errors[`q5.rating`]"
                        class="font-weight-black ma-0 red--text"
                      >
                        5. {{ survey_questions[4].desc }}
                      </p>
                      <p
                        v-else
                        class="font-weight-black ma-0"
                      >
                        5. {{ survey_questions[4].desc }}
                      </p>

                      <v-btn-toggle
                        v-model="form.q5.rating"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="form.q5.rating == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="form.q5.rating == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="form.q5.rating == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="form.q5.rating == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="form.q5.rating == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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

                    <!-- q6 I easily found information about my transaction from the office or its website.(SQD4).-->
                    <div>
                      <p
                        v-if="form.errors[`q6.rating`]"
                        class="font-weight-black ma-0 red--text"
                      >
                        6. {{ survey_questions[5].desc }}
                      </p>
                      <p
                        v-else
                        class="font-weight-black ma-0"
                      >
                        6. {{ survey_questions[5].desc }}
                      </p>

                      <v-btn-toggle
                        v-model="form.q6.rating"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="form.q6.rating == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="form.q6.rating == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="form.q6.rating == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="form.q6.rating == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="form.q6.rating == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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

                    <!-- q7 I spent a reasonable amount of time for my transaction.(SQD1).-->
                    <div>
                      <p
                        v-if="form.errors[`q7.rating`]"
                        class="font-weight-black ma-0 red--text"
                      >
                        7. {{ survey_questions[6].desc }}
                      </p>
                      <p
                        v-else
                        class="font-weight-black ma-0"
                      >
                        7. {{ survey_questions[6].desc }}
                      </p>

                      <v-btn-toggle
                        v-model="form.q7.rating"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="form.q7.rating == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="form.q7.rating == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="form.q7.rating == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="form.q7.rating == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="form.q7.rating == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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
                  </v-col>

                  <v-col cols="12 my-0 py-0">
                    <div class="grey lighten-1 mb-4">
                      <span class="text-h6-edited mx-2">B. Client Engagement and Empowerment</span>
                    </div>

                    <!-- q8 The medical condition, procedures and instructions were discussed clearly.-->
                    <div>
                      <p
                        v-if="form.errors[`q8.rating`]"
                        class="font-weight-black ma-0 red--text"
                      >
                        8. {{ survey_questions[7].desc }}
                      </p>
                      <p
                        v-else
                        class="font-weight-black ma-0"
                      >
                        8. {{ survey_questions[7].desc }}
                      </p>

                      <v-btn-toggle
                        v-model="form.q8.rating"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="form.q8.rating == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="form.q8.rating == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="form.q8.rating == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="form.q8.rating == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="form.q8.rating == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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

                    <!-- q9 Our sentiments, cultural background, and beliefs were heard and considered in the treatment procedure.-->
                    <div>
                      <p
                        v-if="form.errors[`q9.rating`]"
                        class="font-weight-black ma-0 red--text"
                      >
                        9. {{ survey_questions[8].desc }}
                      </p>
                      <p
                        v-else
                        class="font-weight-black ma-0"
                      >
                        9. {{ survey_questions[8].desc }}
                      </p>

                      <v-btn-toggle
                        v-model="form.q9.rating"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="form.q9.rating == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="form.q9.rating == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="form.q9.rating == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="form.q9.rating == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="form.q9.rating == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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

                    <!-- q10 We were given the chance to decide which treatment procedure shall be performed.-->
                    <div>
                      <p
                        v-if="form.errors[`q10.rating`]"
                        class="font-weight-black ma-0 red--text"
                      >
                        10. {{ survey_questions[9].desc }}
                      </p>
                      <p
                        v-else
                        class="font-weight-black ma-0"
                      >
                        10. {{ survey_questions[9].desc }}
                      </p>

                      <v-btn-toggle
                        v-model="form.q10.rating"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="form.q10.rating == 5 ? 'white' : 'black'"
                            >mdi-emoticon-excited-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="form.q10.rating == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="form.q10.rating == 3 ? 'white' : 'black'"
                            >mdi-emoticon-neutral-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="form.q10.rating == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="form.q10.rating == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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

                    <!-- q11 I got what I needed from the hospital, or (if denied) denial of request was sufficiently explained to me.(SQD8)-->
                    <div>
                      <p
                        v-if="form.errors[`q11.rating`]"
                        class="font-weight-black ma-0 red--text"
                      >
                        11. {{ survey_questions[10].desc }}
                      </p>
                      <p
                        v-else
                        class="font-weight-black ma-0"
                      >
                        11. {{ survey_questions[10].desc }}
                      </p>

                      <v-btn-toggle
                        v-model="form.q11.rating"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="form.q11.rating == 5 ? 'white' : 'black'"
                            >mdi-emoticon-excited-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="form.q11.rating == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="form.q11.rating == 3 ? 'white' : 'black'"
                            >mdi-emoticon-neutral-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="form.q11.rating == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="form.q11.rating == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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

                    <!-- q12 I paid a reasonable amount of fees for my transaction.(SQD5)-->
                    <div>
                      <p
                        v-if="form.errors[`q12.rating`]"
                        class="font-weight-black ma-0 red--text"
                      >
                        12. {{ survey_questions[11].desc }}
                      </p>
                      <p
                        v-else
                        class="font-weight-black ma-0"
                      >
                        12. {{ survey_questions[11].desc }}
                      </p>

                      <v-btn-toggle
                        v-model="form.q12.rating"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="form.q12.rating == 5 ? 'white' : 'black'"
                            >mdi-emoticon-excited-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="form.q12.rating == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="form.q12.rating == 3 ? 'white' : 'black'"
                            >mdi-emoticon-neutral-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="form.q12.rating == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="form.q12.rating == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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
                  </v-col>

                  <!-- partC -->
                  <v-col cols="12">
                    <div class="grey lighten-1 mb-4">
                      <span class="text-h6-edited mx-2"> C. Culture of Responsiveness </span>
                    </div>

                    <!-- staff survey -->
                    <h3 class="my-2 font-weight-black">
                      I was treated courteously by the staff, and (if asked for help) the staff was helpful. (SQD7)
                    </h3>

                    <!-- doctor -->
                    <div>
                      <p
                        v-if="form.errors[`doctor.rating`]"
                        class="ma-0 font-weight-black red--text"
                      >
                        Doctor
                      </p>
                      <p
                        v-else
                        class="ma-0 font-weight-black"
                      >
                        Doctor
                      </p>

                      <v-btn-toggle
                        v-model="form.doctor.rating"
                        dense
                        class="pb-2"
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="form.doctor.rating == 5 ? 'white' : 'black'"
                            >mdi-emoticon-excited-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="form.doctor.rating == 4 ? 'white' : 'black'"
                            >mdi-emoticon-happy-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="form.doctor.rating == 3 ? 'white' : 'black'"
                            >mdi-emoticon-neutral-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="form.doctor.rating == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="form.doctor.rating == 1 ? 'white' : 'black'"
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
                    </div>

                    <!-- nurse -->
                    <div>
                      <p
                        v-if="form.errors[`nurse.rating`]"
                        class="ma-0 font-weight-black red--text"
                      >
                        Nurse
                      </p>
                      <p
                        v-else
                        class="ma-0 font-weight-black"
                      >
                        Nurse
                      </p>

                      <v-btn-toggle
                        v-model="form.nurse.rating"
                        dense
                        class="pb-2"
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="form.nurse.rating == 5 ? 'white' : 'black'"
                            >mdi-emoticon-excited-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="form.nurse.rating == 4 ? 'white' : 'black'"
                            >mdi-emoticon-happy-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="form.nurse.rating == 3 ? 'white' : 'black'"
                            >mdi-emoticon-neutral-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="form.nurse.rating == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="form.nurse.rating == 1 ? 'white' : 'black'"
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
                    </div>

                    <!-- midwife -->
                    <div>
                      <p
                        v-if="form.errors[`midwife.rating`]"
                        class="ma-0 font-weight-black red--text"
                      >
                        Midwife
                      </p>
                      <p
                        v-else
                        class="ma-0 font-weight-black"
                      >
                        Midwife
                      </p>

                      <v-btn-toggle
                        v-model="form.midwife.rating"
                        dense
                        class="pb-2"
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="form.midwife.rating == 5 ? 'white' : 'black'"
                            >mdi-emoticon-excited-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="form.midwife.rating == 4 ? 'white' : 'black'"
                            >mdi-emoticon-happy-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="form.midwife.rating == 3 ? 'white' : 'black'"
                            >mdi-emoticon-neutral-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="form.midwife.rating == 2 ? 'white' : 'black'"
                            >mdi-emoticon-sad-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="form.midwife.rating == 1 ? 'white' : 'black'"
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
                    </div>

                    <!-- security -->
                    <div>
                      <p
                        v-if="form.errors[`security.rating`]"
                        class="ma-0 font-weight-black red--text"
                      >
                        Security
                      </p>
                      <p
                        v-else
                        class="ma-0 font-weight-black"
                      >
                        Security
                      </p>

                      <v-btn-toggle
                        v-model="form.security.rating"
                        dense
                        class="pb-2"
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="form.security.rating == 5 ? 'white' : 'black'"
                            >mdi-emoticon-excited-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="form.security.rating == 4 ? 'white' : 'black'"
                            >mdi-emoticon-happy-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="form.security.rating == 3 ? 'white' : 'black'"
                            >mdi-emoticon-neutral-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="form.security.rating == 2 ? 'white' : 'black'"
                            >mdi-emoticon-sad-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="form.security.rating == 1 ? 'white' : 'black'"
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
                    </div>

                    <!-- radiology -->
                    <div>
                      <p
                        v-if="form.errors[`radiology.rating`]"
                        class="ma-0 font-weight-black red--text"
                      >
                        Radiology
                      </p>
                      <p
                        v-else
                        class="ma-0 font-weight-black"
                      >
                        Radiology
                      </p>

                      <v-btn-toggle
                        v-model="form.radiology.rating"
                        dense
                        class="pb-2"
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="form.radiology.rating == 5 ? 'white' : 'black'"
                            >mdi-emoticon-excited-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="form.radiology.rating == 4 ? 'white' : 'black'"
                            >mdi-emoticon-happy-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="form.radiology.rating == 3 ? 'white' : 'black'"
                            >mdi-emoticon-neutral-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="form.radiology.rating == 2 ? 'white' : 'black'"
                            >mdi-emoticon-sad-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="form.radiology.rating == 1 ? 'white' : 'black'"
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
                    </div>

                    <!-- pharmacy -->
                    <div>
                      <p
                        v-if="form.errors[`pharmacy.rating`]"
                        class="ma-0 font-weight-black red--text"
                      >
                        Pharmacy
                      </p>
                      <p
                        v-else
                        class="ma-0 font-weight-black"
                      >
                        Pharmacy
                      </p>

                      <v-btn-toggle
                        v-model="form.pharmacy.rating"
                        dense
                        class="pb-2"
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="form.pharmacy.rating == 5 ? 'white' : 'black'"
                            >mdi-emoticon-excited-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="form.pharmacy.rating == 4 ? 'white' : 'black'"
                            >mdi-emoticon-happy-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="form.pharmacy.rating == 3 ? 'white' : 'black'"
                            >mdi-emoticon-neutral-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="form.pharmacy.rating == 2 ? 'white' : 'black'"
                            >mdi-emoticon-sad-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="form.pharmacy.rating == 1 ? 'white' : 'black'"
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
                    </div>

                    <!-- laboratory -->
                    <div>
                      <p
                        v-if="form.errors[`laboratory.rating`]"
                        class="ma-0 font-weight-black red--text"
                      >
                        Laboratory
                      </p>
                      <p
                        v-else
                        class="ma-0 font-weight-black"
                      >
                        Laboratory
                      </p>

                      <v-btn-toggle
                        v-model="form.laboratory.rating"
                        dense
                        class="pb-2"
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="form.laboratory.rating == 5 ? 'white' : 'black'"
                            >mdi-emoticon-excited-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="form.laboratory.rating == 4 ? 'white' : 'black'"
                            >mdi-emoticon-happy-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="form.laboratory.rating == 3 ? 'white' : 'black'"
                            >mdi-emoticon-neutral-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="form.laboratory.rating == 2 ? 'white' : 'black'"
                            >mdi-emoticon-sad-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="form.laboratory.rating == 1 ? 'white' : 'black'"
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
                    </div>

                    <!-- admitting_staff -->
                    <div>
                      <p
                        v-if="form.errors[`admitting_staff.rating`]"
                        class="ma-0 font-weight-black red--text"
                      >
                        Admitting staff
                      </p>
                      <p
                        v-else
                        class="ma-0 font-weight-black"
                      >
                        Admitting staff
                      </p>

                      <v-btn-toggle
                        v-model="form.admitting_staff.rating"
                        dense
                        class="pb-2"
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="form.admitting_staff.rating == 5 ? 'white' : 'black'"
                            >mdi-emoticon-excited-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="form.admitting_staff.rating == 4 ? 'white' : 'black'"
                            >mdi-emoticon-happy-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="form.admitting_staff.rating == 3 ? 'white' : 'black'"
                            >mdi-emoticon-neutral-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="form.admitting_staff.rating == 2 ? 'white' : 'black'"
                            >mdi-emoticon-sad-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="form.admitting_staff.rating == 1 ? 'white' : 'black'"
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
                    </div>

                    <!-- medical_records -->
                    <div>
                      <p
                        v-if="form.errors[`medical_records.rating`]"
                        class="ma-0 font-weight-black red--text"
                      >
                        Medical records
                      </p>
                      <p
                        v-else
                        class="ma-0 font-weight-black"
                      >
                        Medical records
                      </p>

                      <v-btn-toggle
                        v-model="form.medical_records.rating"
                        dense
                        class="pb-2"
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="form.medical_records.rating == 5 ? 'white' : 'black'"
                            >mdi-emoticon-excited-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="form.medical_records.rating == 4 ? 'white' : 'black'"
                            >mdi-emoticon-happy-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="form.medical_records.rating == 3 ? 'white' : 'black'"
                            >mdi-emoticon-neutral-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="form.medical_records.rating == 2 ? 'white' : 'black'"
                            >mdi-emoticon-sad-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="form.medical_records.rating == 1 ? 'white' : 'black'"
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
                    </div>

                    <!-- billing -->
                    <div>
                      <p
                        v-if="form.errors[`billing.rating`]"
                        class="ma-0 font-weight-black red--text"
                      >
                        Billing
                      </p>
                      <p
                        v-else
                        class="ma-0 font-weight-black"
                      >
                        Billing
                      </p>

                      <v-btn-toggle
                        v-model="form.billing.rating"
                        dense
                        class="pb-2"
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="form.billing.rating == 5 ? 'white' : 'black'"
                            >mdi-emoticon-excited-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="form.billing.rating == 4 ? 'white' : 'black'"
                            >mdi-emoticon-happy-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="form.billing.rating == 3 ? 'white' : 'black'"
                            >mdi-emoticon-neutral-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="form.billing.rating == 2 ? 'white' : 'black'"
                            >mdi-emoticon-sad-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="form.billing.rating == 1 ? 'white' : 'black'"
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
                    </div>

                    <!-- cashier -->
                    <div>
                      <p
                        v-if="form.errors[`cashier.rating`]"
                        class="ma-0 font-weight-black red--text"
                      >
                        Cashier
                      </p>
                      <p
                        v-else
                        class="ma-0 font-weight-black"
                      >
                        Cashier
                      </p>

                      <v-btn-toggle
                        v-model="form.cashier.rating"
                        dense
                        class="pb-2"
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="form.cashier.rating == 5 ? 'white' : 'black'"
                            >mdi-emoticon-excited-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="form.cashier.rating == 4 ? 'white' : 'black'"
                            >mdi-emoticon-happy-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="form.cashier.rating == 3 ? 'white' : 'black'"
                            >mdi-emoticon-neutral-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="form.cashier.rating == 2 ? 'white' : 'black'"
                            >mdi-emoticon-sad-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="form.cashier.rating == 1 ? 'white' : 'black'"
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
                    </div>

                    <!-- social_worker -->
                    <div>
                      <p
                        v-if="form.errors[`social_worker.rating`]"
                        class="ma-0 font-weight-black red--text"
                      >
                        Social worker
                      </p>
                      <p
                        v-else
                        class="ma-0 font-weight-black"
                      >
                        Social worker
                      </p>

                      <v-btn-toggle
                        v-model="form.social_worker.rating"
                        dense
                        class="pb-2"
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="form.social_worker.rating == 5 ? 'white' : 'black'"
                            >mdi-emoticon-excited-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="form.social_worker.rating == 4 ? 'white' : 'black'"
                            >mdi-emoticon-happy-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="form.social_worker.rating == 3 ? 'white' : 'black'"
                            >mdi-emoticon-neutral-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="form.social_worker.rating == 2 ? 'white' : 'black'"
                            >mdi-emoticon-sad-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="form.social_worker.rating == 1 ? 'white' : 'black'"
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
                    </div>

                    <!-- food_server -->
                    <div>
                      <p
                        v-if="form.errors[`food_server.rating`]"
                        class="ma-0 font-weight-black red--text"
                      >
                        Food server
                      </p>
                      <p
                        v-else
                        class="ma-0 font-weight-black"
                      >
                        Food server
                      </p>

                      <v-btn-toggle
                        v-model="form.food_server.rating"
                        dense
                        class="pb-2"
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="form.food_server.rating == 5 ? 'white' : 'black'"
                            >mdi-emoticon-excited-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="form.food_server.rating == 4 ? 'white' : 'black'"
                            >mdi-emoticon-happy-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="form.food_server.rating == 3 ? 'white' : 'black'"
                            >mdi-emoticon-neutral-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="form.food_server.rating == 2 ? 'white' : 'black'"
                            >mdi-emoticon-sad-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="form.food_server.rating == 1 ? 'white' : 'black'"
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
                    </div>

                    <!-- janitors_orderly -->
                    <div>
                      <p
                        v-if="form.errors[`janitors_orderly.rating`]"
                        class="ma-0 font-weight-black red--text"
                      >
                        Janitors / Orderly
                      </p>
                      <p
                        v-else
                        class="ma-0 font-weight-black"
                      >
                        Janitors / Orderly
                      </p>

                      <v-btn-toggle
                        v-model="form.janitors_orderly.rating"
                        dense
                        class="pb-2"
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="form.janitors_orderly.rating == 5 ? 'white' : 'black'"
                            >mdi-emoticon-excited-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="form.janitors_orderly.rating == 4 ? 'white' : 'black'"
                            >mdi-emoticon-happy-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="form.janitors_orderly.rating == 3 ? 'white' : 'black'"
                            >mdi-emoticon-neutral-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="form.janitors_orderly.rating == 2 ? 'white' : 'black'"
                            >mdi-emoticon-sad-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="form.janitors_orderly.rating == 1 ? 'white' : 'black'"
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
                    </div>

                    <div class="my-4"></div>

                    <!-- q13 I was treated fairly, or "walang palakasan" during my transaction.(SQD6)-->
                    <div>
                      <p
                        v-if="form.errors[`q13.rating`]"
                        class="font-weight-black ma-0 red--text"
                      >
                        13. {{ survey_questions[12].desc }}
                      </p>
                      <p
                        v-else
                        class="font-weight-black ma-0"
                      >
                        13. {{ survey_questions[12].desc }}
                      </p>

                      <v-btn-toggle
                        v-model="form.q13.rating"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="form.q13.rating == 5 ? 'white' : 'black'"
                            >mdi-emoticon-excited-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="form.q13.rating == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="form.q13.rating == 3 ? 'white' : 'black'"
                            >mdi-emoticon-neutral-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="form.q13.rating == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="form.q13.rating == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="0"
                          active-class="blue white--text"
                        >
                          N/A
                        </v-btn>
                      </v-btn-toggle>
                    </div>

                    <!-- q14 I am satisfied with the service that I availed.-->
                    <div class="my-4">
                      <p
                        v-if="form.errors[`q14.rating`]"
                        class="font-weight-black ma-0 red--text"
                      >
                        14. {{ survey_questions[13].desc }}
                      </p>
                      <p
                        v-else
                        class="font-weight-black ma-0"
                      >
                        14. {{ survey_questions[13].desc }}
                      </p>

                      <v-btn-toggle
                        v-model="form.q14.rating"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="form.q14.rating == 5 ? 'white' : 'black'"
                            >mdi-emoticon-excited-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="form.q14.rating == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="form.q14.rating == 3 ? 'white' : 'black'"
                            >mdi-emoticon-neutral-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="form.q14.rating == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="form.q14.rating == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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

                  <v-col cols="12">
                    <label for="hospital_number">
                      <span class="font-weight-black ma-0">
                        Hospital number <span class="red--text">(Required)</span>
                      </span>
                    </label>
                    <v-text-field
                      id="hospital_number"
                      v-model="form.hospital_number"
                      hide-details
                      dense
                      outlined
                    ></v-text-field>
                    <div
                      v-if="$page.props.errors[0]"
                      class="red--text"
                    >
                      {{ $page.props.errors[0] }}
                    </div>

                    <div class="mt-6">
                      <label for="survey_rating">
                        <span class="font-weight-black ma-0">
                          How would you rate our Computer assisted satisfaction survey?
                        </span>
                      </label>
                      <v-rating
                        id="survey_rating"
                        v-model="form.survey_rating"
                        background-color="orange darken-3"
                        class="ma-0 pa-0"
                        color="orange"
                      ></v-rating>
                    </div>
                  </v-col>

                  <v-col
                    cols="12"
                    class="text-right"
                  >
                    <!--  :loading="form.processing" -->
                    <v-btn
                      color="color_primary white--text"
                      :loading="form.processing"
                      @click="submit"
                    >
                      Submit
                    </v-btn>
                  </v-col>

                  <v-col
                    cols="12"
                    class="my-4"
                  >
                    <div class="d-flex justify-center align-center flex-column text-center">
                      <h5 class="text-h5-edited font-weight-black">
                        Thank you for your valuable time and opportunity to serve you better.
                      </h5>

                      <span class="font-weight-black mt-2">Patient Satisfaction Committee</span>
                      <span class="font-weight-black font-italic"
                        >Mariano Marcos Memorial Hospital and Medical Center</span
                      >
                      <span class="font-weight-black">Brgy. 06 San Julian, Batac City, Ilocos Norte</span>
                      <span class="font-weight-black">Trunk line: (077) 600-8000</span>
                      <span class="font-weight-black">Fax line: (077) 792-3133</span>
                      <span class="font-weight-black text-decoration-underline">
                        <a href="mailto: psc.mmmhmc@gmail.com">psc.mmmhmc@gmail.com</a>
                      </span>
                    </div>
                  </v-col>
                </v-row>
              </v-form>
            </v-card-text>
          </v-card>
        </v-layout>
      </v-container>

      <!-- snackbar -->
      <v-snackbar
        v-model="snack"
        :timeout="3000"
        :color="snackColor"
        timeout="8000"
      >
        <div class="d-flex align-center">
          <v-icon class="mr-2">mdi-check-circle-outline</v-icon>
          <span>{{ snackText }}</span>
        </div>

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
    </v-app>
  </div>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';
import Iloco from '@/Components/Iloco';
import English from '@/Components/English';
import Tagalog from '@/Components/Tagalog';
import { Link } from '@inertiajs/inertia-vue';

export default {
  components: {
    Iloco,
    English,
    Tagalog,
    Link,
  },
  props: {
    hospital_staffs: Array,
    survey_questions: Array,
    survey_opt_questions: Array,
    er_inpatient: Array,
    outpatient_depts: Array,
    other_depts: Array,
  },
  remember: 'form',
  data() {
    return {
      selectedTab: 2,
      datePickerMenu: false,
      datePickerModal: false,
      maxDate: new Date().toISOString().slice(0, -14),
      snack: '',
      snackColor: '',
      snackText: '',
      enableRespondent: false,
      enableServiceAvailed: false,
      isLoading: false,
      //   educational attainment enable checker
      enableElementary: false,
      enableSecondary: false,
      enableVocational: false,
      enableCollege: false,
      enablePGM: false,
      enableNoEduc: false,
      disableCC: false,
      religions: [
        'Aglipayan',
        'Roman Catholic',
        'Islam',
        'Protestant',
        'Iglesia ni Cristo',
        'Baptist',
        "Jehovah's Witnesses",
        'Born Again',
        'Evangelicals',
      ].sort(),
      departments: [
        'Clinics',
        'Surgery',
        'Family Medicine',
        'Internal Medicine',
        'Pedia',
        'Ob gyne',
        'ENT',
        'Ophthalmology',
        'Dental',
        'Rehabilitation',
        'Orthopaedic',
        'Emergency Room',
        'Inpatient/Ward',
        'Laboratory',
        'Radiology',
        'Medical Record',
        'Billing',
        'Cashier/Accounting',
        'Medical Social Work Department/Malasakit Center',
        'Outpatient Department',
        'Pharmacy',
        'Information & Admitting Section',
      ],
      form: this.$inertia.form({
        respondent: '',
        pointOfEntry: '',
        serviceAvailed: '',
        otherServiceAvailed: '',
        frequentlyVisit: '',
        age: null,
        sex: '',
        religion: '',
        educationalAttainment: '',
        dateOfVisit: new Date().toISOString().slice(0, -14),
        departments: [],
        visited_before: '',
        cc1: null,
        cc2: null,
        cc3: null,
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
          id: this.hospital_staffs[0].id,
          rating: null,
        },
        nurse: {
          id: this.hospital_staffs[1].id,
          rating: undefined,
        },
        midwife: {
          id: this.hospital_staffs[2].id,
          rating: undefined,
        },
        security: {
          id: this.hospital_staffs[3].id,
          rating: undefined,
        },
        radiology: {
          id: this.hospital_staffs[4].id,
          rating: undefined,
        },
        pharmacy: {
          id: this.hospital_staffs[5].id,
          rating: undefined,
        },
        laboratory: {
          id: this.hospital_staffs[6].id,
          rating: undefined,
        },
        admitting_staff: {
          id: this.hospital_staffs[7].id,
          rating: undefined,
        },
        medical_records: {
          id: this.hospital_staffs[8].id,
          rating: undefined,
        },
        billing: {
          id: this.hospital_staffs[9].id,
          rating: undefined,
        },
        cashier: {
          id: this.hospital_staffs[10].id,
          rating: undefined,
        },
        social_worker: {
          id: this.hospital_staffs[11].id,
          rating: undefined,
        },
        food_server: {
          id: this.hospital_staffs[12].id,
          rating: undefined,
        },
        janitors_orderly: {
          id: this.hospital_staffs[13].id,
          rating: undefined,
        },
        opt_q_1: {
          survey_question_id: this.survey_opt_questions[0].id,
          comment: '',
        },
        opt_q_2: {
          survey_question_id: this.survey_opt_questions[1].id,
          comment: '',
        },
        opt_q_3: {
          survey_question_id: this.survey_opt_questions[2].id,
          comment: '',
        },
        opt_q_4: {
          survey_question_id: this.survey_opt_questions[3].id,
          comment: '',
          why: '',
        },
      }),
    };
  },
  mounted() {
    // console.log(this.survey_questions);
  },
  watch: {
    'form.age': function (val) {
      if (val == null || val == 0) {
        this.enableElementary = false;
        this.enableSecondary = false;
        this.enableVocational = false;
        this.enableCollege = false;
        this.enablePGM = false;
        this.enableNoEduc = false;
      }
      if (val >= 11) {
        this.enableElementary = true;
      } else {
        this.enableElementary = false;
      }
      if (val >= 17) {
        this.enableSecondary = true;
      } else {
        this.enableSecondary = false;
      }
      if (val >= 18) {
        this.enableVocational = true;
      } else {
        this.enableVocational = false;
      }
      if (val >= 19) {
        this.enableCollege = true;
      } else {
        this.enableCollege = false;
      }
      if (val >= 22) {
        this.enablePGM = true;
      } else {
        this.enablePGM = false;
      }
      if (val > 6) {
        this.enableNoEduc = true;
      } else {
        this.enableNoEduc = false;
      }
    },
    'form.serviceAvailed': function (val) {
      if (this.form.serviceAvailed != '') {
        this.form.otherServiceAvailed = '';
        this.enableServiceAvailed = false;
      }
    },
    enableServiceAvailed: function (val) {
      if (this.enableServiceAvailed == true) {
        this.form.serviceAvailed = '';
      }
    },
    'form.cc1': function (val) {
      if (val == 4) {
        this.disableCC = true;
        this.form.cc2 = 5; // N/A
        this.form.cc3 = 4; // N/A
      } else {
        this.disableCC = false;
        this.form.cc2 = null; // N/A
        this.form.cc3 = null; // N/A
      }
    },
    // partA1: function (val) {
    //   if (this.partA1 == false) {
    //     this.form.q4.rating = undefined;
    //     this.form.q5.rating = undefined;
    //     this.form.q6.rating = undefined;
    //     this.form.q7.rating = undefined;
    //     this.form.q8.rating = undefined;
    //     this.form.q9.rating = undefined;
    //   }
    // },
    'form.doctor.rating': function (val) {
      if (this.form.doctor.rating == 0) {
        this.form.doctor.comment = '';
      }
    },
    'form.nurse.rating': function (val) {
      if (this.form.nurse.rating == 0) {
        this.form.nurse.comment = '';
      }
    },
    'form.midwife.rating': function (val) {
      if (this.form.midwife.rating == 0) {
        this.form.midwife.comment = '';
      }
    },
    'form.security.rating': function (val) {
      if (this.form.security.rating == 0) {
        this.form.security.comment = '';
      }
    },
    'form.radiology.rating': function (val) {
      if (this.form.radiology.rating == 0) {
        this.form.radiology.comment = '';
      }
    },
    'form.pharmacy.rating': function (val) {
      if (this.form.pharmacy.rating == 0) {
        this.form.pharmacy.comment = '';
      }
    },
    'form.laboratory.rating': function (val) {
      if (this.form.laboratory.rating == 0) {
        this.form.laboratory.comment = '';
      }
    },
    'form.admitting_staff.rating': function (val) {
      if (this.form.admitting_staff.rating == 0) {
        this.form.admitting_staff.comment = '';
      }
    },
    'form.medical_records.rating': function (val) {
      if (this.form.medical_records.rating == 0) {
        this.form.medical_records.comment = '';
      }
    },
    'form.billing.rating': function (val) {
      if (this.form.billing.rating == 0) {
        this.form.billing.comment = '';
      }
    },
    'form.cashier.rating': function (val) {
      if (this.form.cashier.rating == 0) {
        this.form.cashier.comment = '';
      }
    },
    'form.social_worker.rating': function (val) {
      if (this.form.social_worker.rating == 0) {
        this.form.social_worker.comment = '';
      }
    },
    'form.food_server.rating': function (val) {
      if (this.form.food_server.rating == 0) {
        this.form.food_server.comment = '';
      }
    },
    'form.janitors_orderly.rating': function (val) {
      if (this.form.janitors_orderly.rating == 0) {
        this.form.janitors_orderly.comment = '';
      }
    },
  },
  methods: {
    submit() {
      this.form.post(route('eng.store'), {
        onSuccess: () => {
          this.isLoading = true;
          this.form.reset();
          this.enableRespondent = false;
          this.enableOtherDepartment = false;
          this.partA1 = false;
          this.createdMsg();
        },
        onError: (errors) => {
          this.errorExistsMsg();
        },
      });
    },
    createdMsg() {
      this.snack = true;
      this.snackColor = 'color_primary';
      this.snackText = 'Survey saved.';
    },
    errorExistsMsg() {
      this.snack = true;
      this.snackColor = 'color_error';
      this.snackText = 'Failed to save survey, please answer the required questions.';
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

.change-width {
  width: 200px;
}
</style>
