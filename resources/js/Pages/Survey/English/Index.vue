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
            <!-- <v-tabs
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
            </v-tabs> -->

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
                  <h6 class="text-h4-edited ma-0 pa-0">Mariano Marcos Memorial Hospital And Medical Center</h6>
                  <h4 class="text-h5-edited ma-0 pa-0">HOSPITAL CLIENT EXPERIENCE SURVEY (HCES)</h4>
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
                    <v-divider color="black"></v-divider>
                  </v-col>

                  <!-- office/department/clinic -->
                  <v-col
                    cols="12"
                    md="5"
                    class="font-weight-black ma-0"
                  >
                    <label
                      for="office"
                      v-if="v$.office.$error"
                      class="error-message red--text d-flex flex-column"
                    >
                      <span>Office/Department/Clinic</span>
                      <span>(Choose the area that you are currently transacting with)</span>
                    </label>
                    <label
                      for="office"
                      v-else
                      class="d-flex flex-column"
                    >
                      <span>Office/Department/Clinic</span>
                      <span>(Choose the area that you are currently transacting with)</span>
                    </label>

                    <v-select
                      label="Select"
                      v-model="office"
                      :items="offices"
                      item-value="id"
                      item-text="name"
                      dense
                      hide-details
                      outlined
                    ></v-select>
                  </v-col>

                  <v-col cols="12">
                    <v-divider color="black"></v-divider>
                  </v-col>

                  <v-col cols="12">
                    <div
                      v-if="v$.respondent.$error"
                      class="error-message red--text my-2 mb-0 text-h6-edited font-weight-bold"
                    >
                      <p>The Respondent of this Survey Form:</p>
                    </div>
                    <div
                      v-else
                      class="my-2 mb-0 text-h6-edited font-weight-bold"
                    >
                      <p>The Respondent of this Survey Form:</p>
                    </div>
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

                      <v-checkbox
                        v-model="respondent"
                        label="Business(Visited for Business Purposes)"
                        value="Business"
                        dense
                        hide-details
                        class="mx-2"
                      ></v-checkbox>

                      <v-checkbox
                        v-model="respondent"
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
                      v-if="v$.age.$error"
                      class="error-message red--text"
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
                      v-model="age"
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
                    class="font-weight-black ma-0"
                  >
                    <label
                      for="sex"
                      v-if="v$.sex.$error"
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

                  <!-- pronoun -->
                  <v-col
                    cols="12"
                    md="3"
                    class="font-weight-black ma-0"
                  >
                    <label
                      for="pronoun"
                      v-if="v$.pronoun.$error"
                      class="error-message red--text"
                    >
                      Gender preferred pronoun
                    </label>
                    <label
                      for="pronoun"
                      v-else
                    >
                      Gender preferred pronoun
                    </label>

                    <v-select
                      label="Select"
                      v-model="pronoun"
                      :items="pronouns"
                      dense
                      hide-details
                      outlined
                    ></v-select>
                  </v-col>

                  <!-- religion -->
                  <v-col
                    cols="12"
                    md="3"
                    class="font-weight-black ma-0"
                  >
                    <label
                      for="religion"
                      v-if="v$.religion.$error"
                      class="error-message red--text"
                    >
                      <!-- Religion (Please encode if your religion is not included in the list. ) -->
                      Religion
                    </label>
                    <label
                      for="religion"
                      v-else
                    >
                      <!-- Religion (Please encode if your religion is not included in the list. ) -->
                      Religion
                    </label>

                    <!-- <v-combobox
                      id="religion"
                      v-model="religion"
                      :items="religions"
                      dense
                      hide-details
                      outlined
                    ></v-combobox> -->

                    <v-select
                      label="Select"
                      v-model="religion"
                      :items="religions"
                      dense
                      hide-details
                      outlined
                    ></v-select>
                  </v-col>

                  <v-col cols="12">
                    <v-divider color="black"></v-divider>
                  </v-col>

                  <!-- educational attainment -->
                  <v-col cols="12">
                    <label
                      for="educAt"
                      v-if="v$.educationalAttainment.$error"
                      class="error-message red--text"
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
                        v-model="educationalAttainment"
                        label="Elementary"
                        value="Elementary"
                        dense
                        hide-details
                        class="mr-2"
                      ></v-checkbox>

                      <v-checkbox
                        id="educAt"
                        :disabled="!enableSecondary"
                        v-model="educationalAttainment"
                        label="Secondary"
                        value="Secondary"
                        dense
                        hide-details
                        class="mr-2"
                      ></v-checkbox>

                      <v-checkbox
                        id="educAt"
                        :disabled="!enableVocational"
                        v-model="educationalAttainment"
                        label="Vocational"
                        value="Vocational"
                        dense
                        hide-details
                        class="mr-2"
                      ></v-checkbox>

                      <v-checkbox
                        id="educAt"
                        :disabled="!enableCollege"
                        v-model="educationalAttainment"
                        label="College"
                        value="College"
                        dense
                        hide-details
                        class="mr-2"
                      ></v-checkbox>

                      <v-checkbox
                        id="educAt"
                        :disabled="!enablePGM"
                        v-model="educationalAttainment"
                        label="Postgraduate/Masters"
                        value="Postgraduate/Masters"
                        dense
                        hide-details
                        class="mr-2"
                      ></v-checkbox>

                      <v-checkbox
                        id="educAt"
                        :disabled="!enableNoEduc"
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

                  <!-- date of consultation -->
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

                  <!-- point_of_entry -->
                  <v-col
                    cols="12"
                    md="3"
                    class="font-weight-black ma-0"
                  >
                    <label
                      for="point_of_entry"
                      v-if="v$.point_of_entry.$error"
                      class="error-message red--text"
                    >
                      Point of entry
                    </label>
                    <label
                      for="point_of_entry"
                      v-else
                    >
                      Point of entry
                    </label>

                    <v-select
                      label="Select"
                      v-model="point_of_entry"
                      :items="point_of_entries"
                      dense
                      hide-details
                      outlined
                    ></v-select>
                  </v-col>

                  <v-col cols="12">
                    <v-divider color="black"></v-divider>
                  </v-col>

                  <!-- service availed -->
                  <v-col
                    cols="12"
                    md="5"
                    class="font-weight-black ma-0"
                  >
                    <label
                      for="serviceAvailed"
                      v-if="v$.service.$error"
                      class="error-message red--text"
                    >
                      <span>Service Availed</span>
                    </label>
                    <label
                      for="serviceAvailed"
                      v-else
                    >
                      <span>Service Availed</span>
                    </label>

                    <v-select
                      label="Select"
                      v-model="service"
                      :items="services"
                      item-value="id"
                      item-text="name"
                      dense
                      hide-details
                      outlined
                    ></v-select>
                  </v-col>

                  <v-col cols="12">
                    <v-divider color="black"></v-divider>
                  </v-col>

                  <v-col cols="12">
                    <div
                      v-if="v$.frequentlyVisit.$error"
                      class="error-message red--text mx-2"
                    >
                      <p>How frequent do you visit this facility?</p>
                    </div>
                    <div v-else>
                      <p>How frequent do you visit this facility?</p>
                    </div>
                    <div class="ma-0 pa-0">
                      <div
                        :class="
                          $vuetify.breakpoint.mdAndUp ? 'd-flex flex-row ma-0 pa-0' : 'd-flex flex-column ma-0 pa-0'
                        "
                      >
                        <v-checkbox
                          v-model="frequentlyVisit"
                          label="First time"
                          value="First time"
                          dense
                          hide-details
                          class="mx-2"
                        ></v-checkbox>

                        <v-checkbox
                          v-model="frequentlyVisit"
                          label="1-3x a year"
                          value="1-3x a year"
                          dense
                          hide-details
                          class="mx-2"
                        ></v-checkbox>

                        <v-checkbox
                          v-model="frequentlyVisit"
                          label="4-6x a year"
                          value="4-6x a year"
                          dense
                          hide-details
                          class="mx-2"
                        ></v-checkbox>

                        <v-checkbox
                          v-model="frequentlyVisit"
                          label="7-11x a year"
                          value="7-11x a year"
                          dense
                          hide-details
                          class="mx-2"
                        ></v-checkbox>

                        <v-checkbox
                          v-model="frequentlyVisit"
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
                    <h4 class="font-weight-black text-center title">
                      The Citizen’s Charter is an official document that reflects the services of a government
                      agency/office including its requirements, fees, and processing times among others.
                    </h4>

                    <h4 class="my-6">
                      <span class="font-weight-black">INSTRUCTIONS:</span>
                      Put a check mark (✔) your answer to the Citizen’s Charter (CC) questions.
                    </h4>

                    <!-- cc1 -->
                    <div>
                      <p
                        class="error-message text-h6-edited ma-0 red--text mx-2 questions-font-style font-weight-bold"
                        v-if="v$.cc1.$error"
                      >
                        Which of the following best describes your awareness of a CC?
                      </p>
                      <p
                        class="text-h6-edited ma-0 questions-font-style font-weight-bold"
                        v-else
                      >
                        Which of the following best describes your awareness of a CC?
                      </p>

                      <div>
                        <v-checkbox
                          v-model="cc1"
                          label="I know what a CC is and I saw this office's CC."
                          :value="1"
                          dense
                          hide-details
                          class="mx-2"
                        ></v-checkbox>

                        <v-checkbox
                          v-model="cc1"
                          label="I know what a CC is but I did NOT see this office's CC."
                          :value="2"
                          dense
                          hide-details
                          class="mx-2"
                        ></v-checkbox>

                        <v-checkbox
                          v-model="cc1"
                          label="I learned of the CC only when I saw this office's CC."
                          :value="3"
                          dense
                          hide-details
                          class="mx-2"
                        ></v-checkbox>

                        <v-checkbox
                          v-model="cc1"
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
                      <p
                        class="error-message text-h6-edited ma-0 red--text mx-2 questions-font-style font-weight-bold"
                        v-if="v$.cc1.$error"
                      >
                        If aware of CC, would you say that the CC of this office was …?
                      </p>
                      <p
                        class="text-h6-edited ma-0 questions-font-style font-weight-bold"
                        v-else
                      >
                        If aware of CC, would you say that the CC of this office was …?
                      </p>
                      <div>
                        <v-checkbox
                          v-model="cc2"
                          label="Easy to see"
                          :value="1"
                          dense
                          hide-details
                          :disabled="disableCC"
                          class="mx-2"
                        ></v-checkbox>

                        <v-checkbox
                          v-model="cc2"
                          label="Somewhat easy to see"
                          :value="2"
                          dense
                          hide-details
                          :disabled="disableCC"
                          class="mx-2"
                        ></v-checkbox>

                        <v-checkbox
                          v-model="cc2"
                          label="Difficult to see"
                          :value="3"
                          dense
                          hide-details
                          :disabled="disableCC"
                          class="mx-2"
                        ></v-checkbox>

                        <v-checkbox
                          v-model="cc2"
                          label="Not visible at all"
                          :value="4"
                          dense
                          hide-details
                          :disabled="disableCC"
                          class="mx-2"
                        ></v-checkbox>

                        <v-checkbox
                          v-model="cc2"
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
                      <p
                        class="error-message text-h6-edited ma-0 red--text mx-2 questions-font-style font-weight-bold"
                        v-if="v$.cc1.$error"
                      >
                        If aware of CC, how much did the CC help you in your transaction?
                      </p>
                      <p
                        class="text-h6-edited ma-0 questions-font-style font-weight-bold"
                        v-else
                      >
                        If aware of CC, how much did the CC help you in your transaction?
                      </p>
                      <div>
                        <v-checkbox
                          v-model="cc3"
                          label="Helped very much"
                          :value="1"
                          dense
                          hide-details
                          :disabled="disableCC"
                          class="mx-2"
                        ></v-checkbox>

                        <v-checkbox
                          v-model="cc3"
                          label="Somewhat helped"
                          :value="2"
                          dense
                          hide-details
                          :disabled="disableCC"
                          class="mx-2"
                        ></v-checkbox>

                        <v-checkbox
                          v-model="cc3"
                          label="Did not help"
                          :value="3"
                          dense
                          hide-details
                          :disabled="disableCC"
                          class="mx-2"
                        ></v-checkbox>

                        <v-checkbox
                          v-model="cc3"
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
                        v-if="v$.q1_answer.$error"
                        class="error-message ma-0 red--text text-h6-edited questions-font-style"
                      >
                        1. {{ survey_questions[0].desc }}
                      </p>
                      <p
                        v-else
                        class="ma-0 text-h6-edited questions-font-style"
                      >
                        1. {{ survey_questions[0].desc }}
                      </p>

                      <v-btn-toggle
                        v-model="q1_answer"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="q1_answer == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="q1_answer == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="q1_answer == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="q1_answer == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="q1_answer == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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
                        v-if="v$.q2_answer.$error"
                        class="error-message ma-0 red--text text-h6-edited questions-font-style"
                      >
                        2. {{ survey_questions[1].desc }}
                      </p>
                      <p
                        v-else
                        class="ma-0 text-h6-edited questions-font-style"
                      >
                        2. {{ survey_questions[1].desc }}
                      </p>

                      <v-btn-toggle
                        v-model="q2_answer"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="q2_answer == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="q2_answer == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="q2_answer == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="q2_answer == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="q2_answer == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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
                        v-if="v$.q3_answer.$error"
                        class="error-message ma-0 red--text text-h6-edited questions-font-style"
                      >
                        3. {{ survey_questions[2].desc }}
                      </p>
                      <p
                        v-else
                        class="ma-0 text-h6-edited questions-font-style"
                      >
                        3. {{ survey_questions[2].desc }}
                      </p>

                      <v-btn-toggle
                        v-model="q3_answer"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="q3_answer == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="q3_answer == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="q3_answer == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="q3_answer == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="q3_answer == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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
                        v-if="v$.q4_answer.$error"
                        class="error-message ma-0 red--text text-h6-edited questions-font-style"
                      >
                        4. {{ survey_questions[3].desc }}
                      </p>
                      <p
                        v-else
                        class="ma-0 text-h6-edited questions-font-style"
                      >
                        4. {{ survey_questions[3].desc }}
                      </p>

                      <v-btn-toggle
                        v-model="q4_answer"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="q4_answer == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="q4_answer == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="q4_answer == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="q4_answer == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="q4_answer == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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
                        v-if="v$.q5_answer.$error"
                        class="error-message ma-0 red--text text-h6-edited questions-font-style"
                      >
                        5. {{ survey_questions[4].desc }}
                      </p>
                      <p
                        v-else
                        class="ma-0 text-h6-edited questions-font-style"
                      >
                        5. {{ survey_questions[4].desc }}
                      </p>

                      <v-btn-toggle
                        v-model="q5_answer"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="q5_answer == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="q5_answer == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="q5_answer == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="q5_answer == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="q5_answer == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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
                        v-if="v$.q6_answer.$error"
                        class="error-message ma-0 red--text text-h6-edited questions-font-style"
                      >
                        6. {{ survey_questions[5].desc }}
                      </p>
                      <p
                        v-else
                        class="ma-0 text-h6-edited questions-font-style"
                      >
                        6. {{ survey_questions[5].desc }}
                      </p>

                      <v-btn-toggle
                        v-model="q6_answer"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="q6_answer == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="q6_answer == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="q6_answer == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="q6_answer == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="q6_answer == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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
                        v-if="v$.q7_answer.$error"
                        class="error-message ma-0 red--text text-h6-edited questions-font-style"
                      >
                        7. {{ survey_questions[6].desc }}
                      </p>
                      <p
                        v-else
                        class="ma-0 text-h6-edited questions-font-style"
                      >
                        7. {{ survey_questions[6].desc }}
                      </p>

                      <v-btn-toggle
                        v-model="q7_answer"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="q7_answer == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="q7_answer == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="q7_answer == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="q7_answer == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="q7_answer == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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
                        v-if="v$.q8_answer.$error"
                        class="error-message ma-0 red--text text-h6-edited questions-font-style"
                      >
                        8. {{ survey_questions[7].desc }}
                      </p>
                      <p
                        v-else
                        class="ma-0 text-h6-edited questions-font-style"
                      >
                        8. {{ survey_questions[7].desc }}
                      </p>

                      <v-btn-toggle
                        v-model="q8_answer"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="q8_answer == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="q8_answer == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="q8_answer == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="q8_answer == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="q8_answer == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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
                        v-if="v$.q9_answer.$error"
                        class="error-message ma-0 red--text text-h6-edited questions-font-style"
                      >
                        9. {{ survey_questions[8].desc }}
                      </p>
                      <p
                        v-else
                        class="ma-0 text-h6-edited questions-font-style"
                      >
                        9. {{ survey_questions[8].desc }}
                      </p>

                      <v-btn-toggle
                        v-model="q9_answer"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="q9_answer == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="q9_answer == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="q9_answer == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="q9_answer == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="q9_answer == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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
                        v-if="v$.q10_answer.$error"
                        class="error-message ma-0 red--text text-h6-edited questions-font-style"
                      >
                        10. {{ survey_questions[9].desc }}
                      </p>
                      <p
                        v-else
                        class="ma-0 text-h6-edited questions-font-style"
                      >
                        10. {{ survey_questions[9].desc }}
                      </p>

                      <v-btn-toggle
                        v-model="q10_answer"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="q10_answer == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="q10_answer == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="q10_answer == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="q10_answer == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="q10_answer == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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
                        v-if="v$.q11_answer.$error"
                        class="error-message ma-0 red--text text-h6-edited questions-font-style"
                      >
                        11. {{ survey_questions[10].desc }}
                      </p>
                      <p
                        v-else
                        class="ma-0 text-h6-edited questions-font-style"
                      >
                        11. {{ survey_questions[10].desc }}
                      </p>

                      <v-btn-toggle
                        v-model="q11_answer"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="q11_answer == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="q11_answer == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="q11_answer == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="q11_answer == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="q11_answer == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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
                        v-if="v$.q12_answer.$error"
                        class="error-message ma-0 red--text text-h6-edited questions-font-style"
                      >
                        12. {{ survey_questions[11].desc }}
                      </p>
                      <p
                        v-else
                        class="ma-0 text-h6-edited questions-font-style"
                      >
                        12. {{ survey_questions[11].desc }}
                      </p>

                      <v-btn-toggle
                        v-model="q12_answer"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="q12_answer == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="q12_answer == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="q12_answer == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="q12_answer == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="q12_answer == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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
                      <!-- q13 I was treated courteously by the staff, and (if asked for help) the staff was helpful. (SQD7) -->
                      <p class="text-h6-edited questions-font-style">13. {{ survey_questions[12].desc }}</p>
                      <p class="text-h6-edited">
                        ***NOTE: Put a check mark (&check;) on N/A if you did not interact with the staff.
                      </p>
                    </h3>

                    <!-- doctor -->
                    <div>
                      <p
                        v-if="v$.doctor_rating.$error"
                        class="error-message ma-0 red--text text-h6-edited"
                      >
                        Doctor
                      </p>
                      <p
                        v-else
                        class="ma-0 text-h6-edited"
                      >
                        Doctor
                      </p>

                      <v-btn-toggle
                        v-model="doctor_rating"
                        dense
                        class="pb-2"
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="doctor_rating == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="doctor_rating == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="doctor_rating == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="doctor_rating == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="doctor_rating == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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
                        v-if="v$.nurse_rating.$error"
                        class="error-message ma-0 red--text text-h6-edited"
                      >
                        Nurse
                      </p>
                      <p
                        v-else
                        class="ma-0 text-h6-edited"
                      >
                        Nurse
                      </p>

                      <v-btn-toggle
                        v-model="nurse_rating"
                        dense
                        class="pb-2"
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="nurse_rating == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="nurse_rating == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="nurse_rating == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="nurse_rating == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="nurse_rating == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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
                        v-if="v$.midwife_rating.$error"
                        class="error-message ma-0 red--text text-h6-edited"
                      >
                        Midwife
                      </p>
                      <p
                        v-else
                        class="ma-0 text-h6-edited"
                      >
                        Midwife
                      </p>

                      <v-btn-toggle
                        v-model="midwife_rating"
                        dense
                        class="pb-2"
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="midwife_rating == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="midwife_rating == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="midwife_rating == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="midwife_rating == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="midwife_rating == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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
                        v-if="v$.security_rating.$error"
                        class="error-message ma-0 red--text text-h6-edited"
                      >
                        Security
                      </p>
                      <p
                        v-else
                        class="ma-0 text-h6-edited"
                      >
                        Security
                      </p>

                      <v-btn-toggle
                        v-model="security_rating"
                        dense
                        class="pb-2"
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="security_rating == 5 ? 'white' : 'black'"
                            >mdi-emoticon-excited-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="security_rating == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="security_rating == 3 ? 'white' : 'black'"
                            >mdi-emoticon-neutral-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="security_rating == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="security_rating == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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
                        v-if="v$.radiology_rating.$error"
                        class="error-message ma-0 red--text text-h6-edited"
                      >
                        Radiology
                      </p>
                      <p
                        v-else
                        class="ma-0 text-h6-edited"
                      >
                        Radiology
                      </p>

                      <v-btn-toggle
                        v-model="radiology_rating"
                        dense
                        class="pb-2"
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="radiology_rating == 5 ? 'white' : 'black'"
                            >mdi-emoticon-excited-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="radiology_rating == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="radiology_rating == 3 ? 'white' : 'black'"
                            >mdi-emoticon-neutral-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="radiology_rating == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="radiology_rating == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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
                        v-if="v$.pharmacy_rating.$error"
                        class="error-message ma-0 red--text text-h6-edited"
                      >
                        Pharmacy
                      </p>
                      <p
                        v-else
                        class="ma-0 text-h6-edited"
                      >
                        Pharmacy
                      </p>

                      <v-btn-toggle
                        v-model="pharmacy_rating"
                        dense
                        class="pb-2"
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="pharmacy_rating == 5 ? 'white' : 'black'"
                            >mdi-emoticon-excited-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="pharmacy_rating == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="pharmacy_rating == 3 ? 'white' : 'black'"
                            >mdi-emoticon-neutral-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="pharmacy_rating == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="pharmacy_rating == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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
                        v-if="v$.laboratory_rating.$error"
                        class="error-message ma-0 red--text text-h6-edited"
                      >
                        Laboratory
                      </p>
                      <p
                        v-else
                        class="ma-0 text-h6-edited"
                      >
                        Laboratory
                      </p>

                      <v-btn-toggle
                        v-model="laboratory_rating"
                        dense
                        class="pb-2"
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="laboratory_rating == 5 ? 'white' : 'black'"
                            >mdi-emoticon-excited-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="laboratory_rating == 4 ? 'white' : 'black'"
                            >mdi-emoticon-happy-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="laboratory_rating == 3 ? 'white' : 'black'"
                            >mdi-emoticon-neutral-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="laboratory_rating == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="laboratory_rating == 1 ? 'white' : 'black'"
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
                        v-if="v$.admitting_staff_rating.$error"
                        class="error-message ma-0 red--text text-h6-edited"
                      >
                        Admitting staff
                      </p>
                      <p
                        v-else
                        class="ma-0 text-h6-edited"
                      >
                        Admitting staff
                      </p>

                      <v-btn-toggle
                        v-model="admitting_staff_rating"
                        dense
                        class="pb-2"
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="admitting_staff_rating == 5 ? 'white' : 'black'"
                            >mdi-emoticon-excited-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="admitting_staff_rating == 4 ? 'white' : 'black'"
                            >mdi-emoticon-happy-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="admitting_staff_rating == 3 ? 'white' : 'black'"
                            >mdi-emoticon-neutral-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="admitting_staff_rating == 2 ? 'white' : 'black'"
                            >mdi-emoticon-sad-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="admitting_staff_rating == 1 ? 'white' : 'black'"
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
                        v-if="v$.medical_records_rating.$error"
                        class="error-message ma-0 red--text text-h6-edited"
                      >
                        Medical records
                      </p>
                      <p
                        v-else
                        class="ma-0 text-h6-edited"
                      >
                        Medical records
                      </p>

                      <v-btn-toggle
                        v-model="medical_records_rating"
                        dense
                        class="pb-2"
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="medical_records_rating == 5 ? 'white' : 'black'"
                            >mdi-emoticon-excited-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="medical_records_rating == 4 ? 'white' : 'black'"
                            >mdi-emoticon-happy-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="medical_records_rating == 3 ? 'white' : 'black'"
                            >mdi-emoticon-neutral-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="medical_records_rating == 2 ? 'white' : 'black'"
                            >mdi-emoticon-sad-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="medical_records_rating == 1 ? 'white' : 'black'"
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
                        v-if="v$.billing_rating.$error"
                        class="error-message ma-0 red--text text-h6-edited"
                      >
                        Billing
                      </p>
                      <p
                        v-else
                        class="ma-0 text-h6-edited"
                      >
                        Billing
                      </p>

                      <v-btn-toggle
                        v-model="billing_rating"
                        dense
                        class="pb-2"
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="billing_rating == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="billing_rating == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="billing_rating == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="billing_rating == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="billing_rating == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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
                        v-if="v$.cashier_rating.$error"
                        class="error-message ma-0 red--text text-h6-edited"
                      >
                        Cashier
                      </p>
                      <p
                        v-else
                        class="ma-0 text-h6-edited"
                      >
                        Cashier
                      </p>

                      <v-btn-toggle
                        v-model="cashier_rating"
                        dense
                        class="pb-2"
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="cashier_rating == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="cashier_rating == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="cashier_rating == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="cashier_rating == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="cashier_rating == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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
                        v-if="v$.social_worker_rating.$error"
                        class="error-message ma-0 red--text text-h6-edited"
                      >
                        Social worker
                      </p>
                      <p
                        v-else
                        class="ma-0 text-h6-edited"
                      >
                        Social worker
                      </p>

                      <v-btn-toggle
                        v-model="social_worker_rating"
                        dense
                        class="pb-2"
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="social_worker_rating == 5 ? 'white' : 'black'"
                            >mdi-emoticon-excited-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="social_worker_rating == 4 ? 'white' : 'black'"
                            >mdi-emoticon-happy-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="social_worker_rating == 3 ? 'white' : 'black'"
                            >mdi-emoticon-neutral-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="social_worker_rating == 2 ? 'white' : 'black'"
                            >mdi-emoticon-sad-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="social_worker_rating == 1 ? 'white' : 'black'"
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
                        v-if="v$.food_server_rating.$error"
                        class="error-message ma-0 red--text text-h6-edited"
                      >
                        Food server
                      </p>
                      <p
                        v-else
                        class="ma-0 text-h6-edited"
                      >
                        Food server
                      </p>

                      <v-btn-toggle
                        v-model="food_server_rating"
                        dense
                        class="pb-2"
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="food_server_rating == 5 ? 'white' : 'black'"
                            >mdi-emoticon-excited-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="food_server_rating == 4 ? 'white' : 'black'"
                            >mdi-emoticon-happy-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="food_server_rating == 3 ? 'white' : 'black'"
                            >mdi-emoticon-neutral-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="food_server_rating == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="food_server_rating == 1 ? 'white' : 'black'"
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
                        v-if="v$.janitors_orderly_rating.$error"
                        class="error-message ma-0 red--text text-h6-edited"
                      >
                        Janitors / Orderly
                      </p>
                      <p
                        v-else
                        class="ma-0 text-h6-edited"
                      >
                        Janitors / Orderly
                      </p>

                      <v-btn-toggle
                        v-model="janitors_orderly_rating"
                        dense
                        class="pb-2"
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="janitors_orderly_rating == 5 ? 'white' : 'black'"
                            >mdi-emoticon-excited-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="janitors_orderly_rating == 4 ? 'white' : 'black'"
                            >mdi-emoticon-happy-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="janitors_orderly_rating == 3 ? 'white' : 'black'"
                            >mdi-emoticon-neutral-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="janitors_orderly_rating == 2 ? 'white' : 'black'"
                            >mdi-emoticon-sad-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="janitors_orderly_rating == 1 ? 'white' : 'black'"
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

                    <!-- q14 I was treated fairly, or "walang palakasan" during my transaction.(SQD6)-->
                    <div>
                      <p
                        v-if="v$.q14_answer.$error"
                        class="error-message ma-0 red--text text-h6-edited questions-font-style"
                      >
                        14. {{ survey_questions[13].desc }}
                      </p>
                      <p
                        v-else
                        class="ma-0 text-h6-edited questions-font-style"
                      >
                        14. {{ survey_questions[13].desc }}
                      </p>

                      <v-btn-toggle
                        v-model="q14_answer"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="q14_answer == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="q14_answer == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="q14_answer == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="q14_answer == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="q14_answer == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="0"
                          active-class="blue white--text"
                        >
                          N/A
                        </v-btn>
                      </v-btn-toggle>
                    </div>

                    <!-- q15 I am satisfied with the service that I availed.-->
                    <div class="my-4">
                      <p
                        v-if="v$.q15_answer.$error"
                        class="error-message ma-0 red--text text-h6-edited questions-font-style"
                      >
                        15. {{ survey_questions[14].desc }}
                      </p>
                      <p
                        v-else
                        class="ma-0 text-h6-edited questions-font-style"
                      >
                        15. {{ survey_questions[14].desc }}
                      </p>

                      <v-btn-toggle
                        v-model="q15_answer"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="q15_answer == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="q15_answer == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="q15_answer == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="q15_answer == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="q15_answer == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="0"
                          active-class="blue white--text"
                        >
                          N/A
                        </v-btn>
                      </v-btn-toggle>
                    </div>

                    <!-- not_numbered1 Suggestions on how we can further improve our services? (Optional) -->
                    <div>
                      <p
                        v-if="form.errors[`not_numbered1.answer`]"
                        class="ma-0 red--text text-h6-edited questions-font-style"
                      >
                        {{ survey_questions[15].desc }}
                      </p>
                      <p
                        v-else
                        class="ma-0 text-h6-edited questions-font-style"
                      >
                        {{ survey_questions[15].desc }}
                      </p>
                      <v-textarea
                        filled
                        auto-grow
                        v-model="form.not_numbered1.answer"
                      ></v-textarea>
                    </div>

                    <!-- not_numbered2 If applicable, please indicate the name of any remarkable hospital staff you would like to commend, as well as reason. -->
                    <div>
                      <p
                        v-if="form.errors[`not_numbered2.answer`]"
                        class="ma-0 red--text text-h6-edited questions-font-style"
                      >
                        {{ survey_questions[16].desc }}
                      </p>
                      <p
                        v-else
                        class="ma-0 text-h6-edited questions-font-style"
                      >
                        {{ survey_questions[16].desc }}
                      </p>
                      <v-textarea
                        filled
                        auto-grow
                        v-model="form.not_numbered2.answer"
                      ></v-textarea>
                    </div>
                  </v-col>

                  <v-col cols="12">
                    <v-divider color="black"></v-divider>
                  </v-col>

                  <v-col cols="12">
                    <!-- preference-->
                    <div class="mt-6">
                      <label for="preference">
                        <span class="font-weight-black ma-0">
                          <p
                            v-if="v$.preference.$error"
                            class="error-message font-weight-black ma-0 red--text"
                          >
                            In the future, I prefer to answer using:
                          </p>
                          <p
                            v-else
                            class="font-weight-black ma-0"
                          >
                            In the future, I prefer to answer using:
                          </p>
                        </span>
                      </label>

                      <div class="d-flex flex-row">
                        <v-checkbox
                          v-model="preference"
                          label="Computer Assisted Survey"
                          value="Computer Assisted Survey"
                          dense
                          hide-details
                          class="mr-2"
                        ></v-checkbox>

                        <v-checkbox
                          v-model="preference"
                          label="Pen and Paper Survey"
                          value="Pen and Paper Survey"
                          dense
                          hide-details
                        ></v-checkbox>
                      </div>
                    </div>

                    <!-- pss rating-->
                    <div class="mt-6">
                      <label for="arta_rating">
                        <span class="font-weight-black ma-0">
                          <p
                            v-if="v$.arta_rating.$error"
                            class="error-message font-weight-black ma-0 red--text"
                          >
                            How would you rate our Computer assisted satisfaction survey?
                          </p>
                          <p
                            v-else
                            class="font-weight-black ma-0"
                          >
                            How would you rate our Computer assisted satisfaction survey?
                          </p>
                        </span>
                      </label>
                      <v-rating
                        id="arta_rating"
                        v-model="arta_rating"
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

        <v-btn
          fab
          dark
          fixed
          bottom
          left
          class="primary"
          as="a"
          href="answers"
        >
          <v-icon> mdi-arrow-left </v-icon>
        </v-btn>
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
import { useVuelidate } from '@vuelidate/core';
import { required } from '@vuelidate/validators';
import Vue from 'vue';
import Vuelidate from '@vuelidate/core';
Vue.use(Vuelidate);

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
    // er_inpatient: Array,
    // outpatient_depts: Array,
    // other_depts: Array,
  },
  remember: 'form',
  setup() {
    return { v$: useVuelidate() };
  },
  mounted() {
    // console.log(this.v$);
  },
  validations() {
    return {
      respondent: { required },
      frequentlyVisit: { required, $autoDirty: true },
      age: { required },
      sex: { required },
      pronoun: { required },
      office: { required },
      service: { required },
      point_of_entry: { required },
      religion: { required },
      educationalAttainment: { required },
      //   dateOfVisit: { required },
      cc1: { required },
      cc2: { required },
      cc3: { required },
      preference: { required },
      arta_rating: { required },
      q1_answer: { required },
      q2_answer: { required },
      q3_answer: { required },
      q4_answer: { required },
      q5_answer: { required },
      q6_answer: { required },
      q7_answer: { required },
      q8_answer: { required },
      q9_answer: { required },
      q10_answer: { required },
      q11_answer: { required },
      q12_answer: { required },
      q14_answer: { required },
      doctor_rating: { required },
      nurse_rating: { required },
      midwife_rating: { required },
      security_rating: { required },
      radiology_rating: { required },
      pharmacy_rating: { required },
      laboratory_rating: { required },
      admitting_staff_rating: { required },
      medical_records_rating: { required },
      billing_rating: { required },
      cashier_rating: { required },
      social_worker_rating: { required },
      food_server_rating: { required },
      janitors_orderly_rating: { required },
      q15_answer: { required },
      preference: { required },
      arta_rating: { required },
    };
  },
  data() {
    return {
      selectedTab: 2,
      datePickerMenu: false,
      datePickerModal: false,
      maxDate: new Date().toISOString().slice(0, -14),
      snack: '',
      snackColor: '',
      snackText: '',
      isLoading: false,
      //   educational attainment enable checker
      enableElementary: false,
      enableSecondary: false,
      enableVocational: false,
      enableCollege: false,
      enablePGM: false,
      enableNoEduc: false,
      disableCC: false,
      offices: [],
      services: [],
      religions: ['Christian', 'Iglesia Ni Cristo', 'Islam', 'Roman Catholic', 'None', 'Others'],
      point_of_entries: ['Emergency Room', 'Inpatient/Ward', 'Outpatient Department', 'Other Offices'],
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
      // for vuelidate
      respondent: '',
      frequentlyVisit: '',
      age: null,
      sex: '',
      pronouns: ['He/Him/His', 'She/Her/Hers', 'Others'],
      pronoun: '',
      office: null,
      service: null,
      religion: '',
      point_of_entry: '',
      educationalAttainment: '',
      dateOfVisit: new Date().toISOString().slice(0, -14),
      cc1: null,
      cc2: null,
      cc3: null,
      preference: null,
      arta_rating: null,
      // The waiting areas were clean, orderly, and comfortable.
      q1_answer: null,
      // The toilets and bathrooms inside the facility were kept clean, orderly and with a steady water supply.
      q2_answer: null,
      // The patients' rooms were kept clean, tidy, and comfortable.
      q3_answer: null,
      // The steps (including payment) I needed to do for my transaction were easy and simple.(SQD3).
      q4_answer: null,
      // The office followed the transaction’s requirements and steps based on the information provided.(SQD2).
      q5_answer: null,
      // I easily found information about my transaction from the office or its website.(SQD4).
      q6_answer: null,
      // I spent a reasonable amount of time for my transaction.(SQD1).
      q7_answer: null,
      // The medical condition, procedures and instructions were discussed clearly.
      q8_answer: null,
      // Our sentiments, cultural background, and beliefs were heard and considered in the treatment procedure.
      q9_answer: null,
      // We were given the chance to decide which treatment procedure shall be performed.
      q10_answer: null,
      // I got what I needed from the hospital, or (if denied) denial of request was sufficiently explained to me.(SQD8)
      q11_answer: null,
      // I paid a reasonable amount of fees for my transaction.(SQD5)
      q12_answer: null,
      // I was treated courteously by the staff, and (if asked for help) the staff was helpful. (SQD7)
      // q13: {
      //   id: this.survey_questions[12].id,
      //   answer: undefined,
      // },
      // I was treated fairly, or "walang palakasan" during my transaction.(SQD6)
      q14_answer: null,
      doctor_rating: null,
      nurse_rating: null,
      midwife_rating: null,
      security_rating: null,
      radiology_rating: null,
      pharmacy_rating: null,
      laboratory_rating: null,
      admitting_staff_rating: null,
      medical_records_rating: null,
      billing_rating: null,
      cashier_rating: null,
      social_worker_rating: null,
      food_server_rating: null,
      janitors_orderly_rating: null,
      // I am satisfied with the service that I availed
      q15_answer: null,
      preference: null,
      arta_rating: null,
      // end for vuelidate

      form: this.$inertia.form({
        respondent: '',
        // serviceAvailed: [],
        // otherServiceAvailed: '',
        frequentlyVisit: '',
        age: null,
        sex: '',
        pronoun: '',
        office: null,
        service: null,
        religion: '',
        point_of_entry: '',
        educationalAttainment: '',
        dateOfVisit: new Date().toISOString().slice(0, -14),
        cc1: null,
        cc2: null,
        cc3: null,
        preference: null,
        arta_rating: null,
        // The waiting areas were clean, orderly, and comfortable.
        q1: {
          id: this.survey_questions[0].id,
          answer: undefined,
        },
        // The toilets and bathrooms inside the facility were kept clean, orderly and with a steady water supply.
        q2: {
          id: this.survey_questions[1].id,
          answer: undefined,
        },
        // The patients' rooms were kept clean, tidy, and comfortable.
        q3: {
          id: this.survey_questions[2].id,
          answer: undefined,
        },
        // The steps (including payment) I needed to do for my transaction were easy and simple.(SQD3).
        q4: {
          id: this.survey_questions[3].id,
          answer: undefined,
        },
        // The office followed the transaction’s requirements and steps based on the information provided.(SQD2).
        q5: {
          id: this.survey_questions[4].id,
          answer: undefined,
        },
        // I easily found information about my transaction from the office or its website.(SQD4).
        q6: {
          id: this.survey_questions[5].id,
          answer: undefined,
        },
        // I spent a reasonable amount of time for my transaction.(SQD1).
        q7: {
          id: this.survey_questions[6].id,
          answer: undefined,
        },
        // The medical condition, procedures and instructions were discussed clearly.
        q8: {
          id: this.survey_questions[7].id,
          answer: undefined,
        },
        // Our sentiments, cultural background, and beliefs were heard and considered in the treatment procedure.
        q9: {
          id: this.survey_questions[8].id,
          answer: undefined,
        },
        // We were given the chance to decide which treatment procedure shall be performed.
        q10: {
          id: this.survey_questions[9].id,
          answer: undefined,
        },
        // I got what I needed from the hospital, or (if denied) denial of request was sufficiently explained to me.(SQD8)
        q11: {
          id: this.survey_questions[10].id,
          answer: undefined,
        },
        // I paid a reasonable amount of fees for my transaction.(SQD5)
        q12: {
          id: this.survey_questions[11].id,
          answer: undefined,
        },
        // I was treated courteously by the staff, and (if asked for help) the staff was helpful. (SQD7)
        // q13: {
        //   id: this.survey_questions[12].id,
        //   answer: undefined,
        // },
        // I was treated fairly, or "walang palakasan" during my transaction.(SQD6)
        q14: {
          id: this.survey_questions[13].id,
          answer: undefined,
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
        // I am satisfied with the service that I availed
        q15: {
          id: this.survey_questions[14].id,
          answer: undefined,
        },
        // Suggestions on how we can further improve our services? (Optional)
        not_numbered1: {
          id: this.survey_questions[15].id,
          answer: null,
        },
        // If applicable, please indicate the name of any remarkable hospital staff you would like to commend, as well as reason.
        not_numbered2: {
          id: this.survey_questions[16].id,
          answer: null,
        },
      }),
    };
  },
  mounted() {
    this.storeOfficesInContainer();
    this.storeServicesInContainer();
  },
  methods: {
    storeOfficesInContainer() {
      this.$page.props.offices.forEach((e) => {
        this.offices.push({
          id: e.id,
          name: e.name,
        });
      });
    },
    storeServicesInContainer() {
      this.$page.props.services.forEach((e) => {
        this.services.push({
          id: e.id,
          name: e.name,
        });
      });
    },
    async submit() {
      const isFormCorrect = await this.v$.$validate();
      //   console.log(this.v$);
      if (isFormCorrect) {
        this.form.post(route('eng.store'), {
          onSuccess: () => {
            this.isLoading = true;
            this.form.reset();
            this.createdMsg();
            // console.log(this.$page);
          },
          onError: (errors) => {
            // console.log(errors);
            this.errorExistsMsg();
          },
        });
      } else {
        // Form is invalid, scroll to the first error
        let firstErrorElement = document.querySelector('.error-message');
        if (firstErrorElement) {
          //   console.log('b');
          firstErrorElement.scrollIntoView({ behavior: 'smooth' });
        }
      }
    },
    // focusFirstError() {
    //   const errorElement = document.querySelector('.error-message');
    //   if (errorElement) {
    //     errorElement.previousElementSibling.focus();
    //   }
    // },
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
  watch: {
    respondent(val) {
      this.form.respondent = val;
    },
    frequentlyVisit(val) {
      this.form.frequentlyVisit = val;
    },
    frequentlyVisit(val) {
      this.form.frequentlyVisit = val;
    },
    age: function (val) {
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
      this.form.age = val;
    },
    sex(val) {
      this.form.sex = val;
    },
    pronoun(val) {
      this.form.pronoun = val;
    },
    office(val) {
      this.form.office = val;
    },
    service(val) {
      this.form.service = val;
    },
    religion(val) {
      this.form.religion = val;
    },
    point_of_entry(val) {
      this.form.point_of_entry = val;
    },
    educationalAttainment(val) {
      this.form.educationalAttainment = val;
    },
    dateOfVisit(val) {
      this.form.dateOfVisit = val;
    },
    cc1: function (val) {
      if (val == 4) {
        this.disableCC = true;
        this.form.cc2 = 5; // N/A
        this.form.cc3 = 4; // N/A
        this.cc2 = 5;
        this.cc3 = 4;
      } else {
        this.disableCC = false;
        this.form.cc2 = null; // N/A
        this.form.cc3 = null; // N/A
        this.cc2 = null;
        this.cc3 = null;
      }
      this.form.cc1 = val;
    },
    cc2(val) {
      this.form.cc2 = val;
    },
    cc3(val) {
      this.form.cc3 = val;
    },
    preference(val) {
      this.form.preference = val;
    },
    arta_rating(val) {
      this.form.arta_rating = val;
    },
    q1_answer(val) {
      console.log(val);

      this.form.q1.answer = val;
    },
    q2_answer(val) {
      this.form.q2.answer = val;
    },
    q3_answer(val) {
      this.form.q3.answer = val;
    },
    q4_answer(val) {
      this.form.q4.answer = val;
    },
    q5_answer(val) {
      this.form.q5.answer = val;
    },
    q6_answer(val) {
      this.form.q6.answer = val;
    },
    q7_answer(val) {
      this.form.q7.answer = val;
    },
    q8_answer(val) {
      this.form.q8.answer = val;
    },
    q9_answer(val) {
      this.form.q9.answer = val;
    },
    q10_answer(val) {
      this.form.q10.answer = val;
    },
    q11_answer(val) {
      this.form.q11.answer = val;
    },
    q12_answer(val) {
      this.form.q12.answer = val;
    },
    q14_answer(val) {
      this.form.q14.answer = val;
    },
    doctor_rating(val) {
      this.form.doctor.rating = val;
    },
    nurse_rating(val) {
      this.form.nurse.rating = val;
    },
    midwife_rating(val) {
      this.form.midwife.rating = val;
    },
    security_rating(val) {
      this.form.security.rating = val;
    },
    radiology_rating(val) {
      this.form.radiology.rating = val;
    },
    pharmacy_rating(val) {
      this.form.pharmacy.rating = val;
    },
    laboratory_rating(val) {
      this.form.laboratory.rating = val;
    },
    admitting_staff_rating(val) {
      this.form.admitting_staff.rating = val;
    },
    medical_records_rating(val) {
      this.form.medical_records.rating = val;
    },
    billing_rating(val) {
      this.form.billing.rating = val;
    },
    cashier_rating(val) {
      this.form.cashier.rating = val;
    },
    social_worker_rating(val) {
      this.form.social_worker.rating = val;
    },
    food_server_rating(val) {
      this.form.food_server.rating = val;
    },
    janitors_orderly_rating(val) {
      this.form.janitors_orderly.rating = val;
    },
    q15_answer(val) {
      this.form.q15.answer = val;
    },
    preference(val) {
      this.form.preference = val;
    },
    arta_rating(val) {
      this.form.arta_rating = val;
    },
  },
};
</script>

<style scoped>
.background {
  height: 100%;
  background-color: #add6c1;
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

.questions-font-style {
  font-family: Arial, Helvetica, sans-serif;
}
</style>
