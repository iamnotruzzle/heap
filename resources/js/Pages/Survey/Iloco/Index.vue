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
              <!-- <Link
                as="v-tab"
                key="1"
                href="#"
                >Tagalog</Link
              > -->
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
                  <h6 class="text-h4-edited ma-0 pa-0">Mariano Marcos Memorial Hospital And Medical Center</h6>
                  <h4 class="text-h5-edited ma-0 pa-0">HOSPITAL CLIENT EXPERIENCE SURVEY (HCES)</h4>
                </v-col>
              </v-row>
            </v-card-title>

            <v-card-text>
              <v-row class="font-weight-black mb-4">
                <v-col cols="12">
                  <div class="font-italic text-center">
                    Dagiti sumaganad a saludsod ket pakaseknan iti pannakapnekyo iti serbisio ti MMMHC a naipaay
                    kadakayo. Iti gagemmi nga ad-adda pay a mapasayaat ti serbisiomi, dawatenmi iti naan-anay a
                    panangsungbatyo kadagiti sumaganad a saludsod basar iti kapadasanyo. Mangnamnamakayo nga aniaman a
                    sungbat ket agserbi iti pannakapasayaat ti serbisio ti ospital ken agtalinaed a palimed iti
                    siasinnoman.
                  </div>
                </v-col>
              </v-row>

              <v-form
                ref="form"
                class="no-wrap"
              >
                <div class="grey lighten-1 mb-4">
                  <p class="text-h6-edited mx-2 py-1">
                    Direksyon: Ikkan ti tsek (<v-icon>mdi-check</v-icon>) ti umno a sungbat:
                  </p>
                </div>

                <v-row class="font-weight-black">
                  <v-col cols="12">
                    <v-divider color="black"></v-divider>
                  </v-col>
                  <v-col cols="12">
                    <div
                      v-if="form.errors.respondent"
                      class="red--text my-2 mb-0 text-h6-edited font-weight-bold"
                    >
                      <p>Nagresponde kadaytoy a porma:</p>
                    </div>
                    <div
                      v-else
                      class="my-2 mb-0 text-h6-edited font-weight-bold"
                    >
                      <p>Nagresponde kadaytoy a porma:</p>
                    </div>
                    <div class="d-flex flex-column ma-0 pa-0">
                      <v-checkbox
                        v-model="form.respondent"
                        label="Pasiente"
                        value="Patient"
                        dense
                        hide-details
                        class="mx-2"
                      ></v-checkbox>

                      <v-checkbox
                        v-model="form.respondent"
                        label="Nangkadua (Kabagian)"
                        value="Companion"
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
                      Tawen
                    </label>
                    <label
                      for="age"
                      v-else
                    >
                      Tawen
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
                      Katatao
                    </label>
                    <label
                      for="sex"
                      v-else
                    >
                      Katatao
                    </label>

                    <div class="d-flex flex-row">
                      <v-checkbox
                        id="sex"
                        v-model="form.sex"
                        label="Babai"
                        value="Male"
                        dense
                        hide-details
                        class="mr-2"
                      ></v-checkbox>
                      <v-checkbox
                        id="sex"
                        v-model="form.sex"
                        label="Lalaki"
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
                      Relihion (Daduma pay, ilanad)
                    </label>
                    <label
                      for="religion"
                      v-else
                    >
                      Relihion (Daduma pay, ilanad)
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
                      Naturpos nga adal:
                    </label>
                    <label
                      for="educAt"
                      v-else
                    >
                      Naturpos nga adal:
                    </label>

                    <div :class="$vuetify.breakpoint.smAndDown == true ? 'd-flex flex-column' : 'd-flex flex-row'">
                      <v-checkbox
                        id="educAt"
                        :disabled="!enableElementary"
                        v-model="form.educationalAttainment"
                        label="Elementaria"
                        value="Elementary"
                        dense
                        hide-details
                        class="mr-2"
                      ></v-checkbox>

                      <v-checkbox
                        id="educAt"
                        :disabled="!enableSecondary"
                        v-model="form.educationalAttainment"
                        label="Sekondaria"
                        value="Secondary"
                        dense
                        hide-details
                        class="mr-2"
                      ></v-checkbox>

                      <v-checkbox
                        id="educAt"
                        :disabled="!enableVocational"
                        v-model="form.educationalAttainment"
                        label="Bokasional"
                        value="Vocational"
                        dense
                        hide-details
                        class="mr-2"
                      ></v-checkbox>

                      <v-checkbox
                        id="educAt"
                        :disabled="!enableCollege"
                        v-model="form.educationalAttainment"
                        label="Kolehio"
                        value="College"
                        dense
                        hide-details
                        class="mr-2"
                      ></v-checkbox>

                      <v-checkbox
                        id="educAt"
                        :disabled="!enablePGM"
                        v-model="form.educationalAttainment"
                        label="Nainayon nga adal wenno nagun-od kalpasan ti kolehiio"
                        value="Postgraduate/Masters"
                        dense
                        hide-details
                        class="mr-2"
                      ></v-checkbox>

                      <v-checkbox
                        id="educAt"
                        :disabled="!enableNoEduc"
                        v-model="form.educationalAttainment"
                        label="Awan pormal nga edukasion"
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
                      Petsa ti Konsultasyon:
                    </label>
                    <label
                      for="dateOfVisit"
                      v-else
                    >
                      Petsa ti Konsultasyon:
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

                  <!-- <v-col cols="12">
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
                  </v-col> -->

                  <!-- <v-col cols="12">
                    <v-divider color="black"></v-divider>
                  </v-col> -->

                  <!-- <v-col cols="12">
                    <div
                      v-if="form.errors.serviceAvailed"
                      class="red--text mx-2"
                    >
                      <p>Service Availed:</p>
                    </div>
                    <div v-else>
                      <p>Service Availed:</p>
                    </div>
                    <div
                      :class="
                        $vuetify.breakpoint.mdAndUp ? 'd-flex flex-row ma-0 pa-0' : 'd-flex flex-column ma-0 pa-0'
                      "
                    >
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
                          <v-text-field
                            v-model="form.otherServiceAvailed"
                            label="Others (Specify)"
                            dense
                          ></v-text-field>
                        </div>
                      </div>
                    </div>
                  </v-col> -->

                  <v-col cols="12">
                    <v-divider color="black"></v-divider>
                  </v-col>

                  <v-col cols="12">
                    <div
                      v-if="form.errors.frequentlyVisit"
                      class="red--text mx-2"
                    >
                      <p>Kasano ti kaadu a mabisita daytoy a pasilidad?</p>
                    </div>
                    <div v-else>
                      <p>Kasano ti kaadu a mabisita daytoy a pasilidad?</p>
                    </div>
                    <div class="ma-0 pa-0">
                      <div
                        :class="
                          $vuetify.breakpoint.mdAndUp ? 'd-flex flex-row ma-0 pa-0' : 'd-flex flex-column ma-0 pa-0'
                        "
                      >
                        <v-checkbox
                          v-model="form.frequentlyVisit"
                          label="Damdamo"
                          value="First time"
                          dense
                          hide-details
                          class="mx-2"
                        ></v-checkbox>

                        <v-checkbox
                          v-model="form.frequentlyVisit"
                          label="1-3x kada tawen"
                          value="1-3x a year"
                          dense
                          hide-details
                          class="mx-2"
                        ></v-checkbox>

                        <v-checkbox
                          v-model="form.frequentlyVisit"
                          label="4-6x kada tawen"
                          value="4-6x a year"
                          dense
                          hide-details
                          class="mx-2"
                        ></v-checkbox>

                        <v-checkbox
                          v-model="form.frequentlyVisit"
                          label="7-11x kada tawen"
                          value="7-11x a year"
                          dense
                          hide-details
                          class="mx-2"
                        ></v-checkbox>

                        <v-checkbox
                          v-model="form.frequentlyVisit"
                          label="Nasurok 12x kada tawen"
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
                      Daytoy Citizen’s Charter wenno CC ket opisyal a dokyumento nga mangipasimudaag ti serbisyo iti
                      ahensiya ti gobyerno, pakaramanan kadagiti kasapulan, pagbayad ken ti pannakaproseso kadagiti amin
                      nga nailanad.
                    </h4>

                    <h4 class="my-6">
                      <span class="font-weight-black">INSTRAKSYON:</span>
                      Ikkan ti tsek (✔) ti umno a sungbat.
                    </h4>

                    <!-- cc1 -->
                    <div>
                      <p
                        class="text-h6-edited ma-0 red--text mx-2 questions-font-style font-weight-bold"
                        v-if="form.errors.cc1"
                      >
                        Ana kadagitoy sumaganad tay pannakailadawan iti pannakaawatyo ti Citizen’s Charter?
                      </p>
                      <p
                        class="text-h6-edited ma-0 questions-font-style font-weight-bold"
                        v-else
                      >
                        Ana kadagitoy sumaganad tay pannakailadawan iti pannakaawatyo ti Citizen’s Charter?
                      </p>

                      <div>
                        <v-checkbox
                          v-model="form.cc1"
                          label="Ammok ti CC ket nakitak kadagiti opisina."
                          :value="1"
                          dense
                          hide-details
                          class="mx-2"
                        ></v-checkbox>

                        <v-checkbox
                          v-model="form.cc1"
                          label="Ammok ti CC ngem awan nakitak kadagiti opisina."
                          :value="2"
                          dense
                          hide-details
                          class="mx-2"
                        ></v-checkbox>

                        <v-checkbox
                          v-model="form.cc1"
                          label="Naamuak lang ti CC apaman a nakitak ditoy nga opisina."
                          :value="3"
                          dense
                          hide-details
                          class="mx-2"
                        ></v-checkbox>

                        <v-checkbox
                          v-model="form.cc1"
                          label="Awan ammok ti CC ken awan nakitak kadigitoy nga opisina."
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
                        class="text-h6-edited ma-0 red--text mx-2 questions-font-style font-weight-bold"
                        v-if="form.errors.cc1"
                      >
                        No ammom man ti CC (nasungbatan iti 1-3 idiay CC1), maibagam nga ti CC ditoy nga opisan ket?
                      </p>
                      <p
                        class="text-h6-edited ma-0 questions-font-style font-weight-bold"
                        v-else
                      >
                        No ammom man ti CC (nasungbatan iti 1-3 idiay CC1), maibagam nga ti CC ditoy nga opisan ket?
                      </p>
                      <div>
                        <v-checkbox
                          v-model="form.cc2"
                          label="Nalaka a makita"
                          :value="1"
                          dense
                          hide-details
                          :disabled="disableCC"
                          class="mx-2"
                        ></v-checkbox>

                        <v-checkbox
                          v-model="form.cc2"
                          label="Medio nalaka a Makita"
                          :value="2"
                          dense
                          hide-details
                          :disabled="disableCC"
                          class="mx-2"
                        ></v-checkbox>

                        <v-checkbox
                          v-model="form.cc2"
                          label="Narigat a makita"
                          :value="3"
                          dense
                          hide-details
                          :disabled="disableCC"
                          class="mx-2"
                        ></v-checkbox>

                        <v-checkbox
                          v-model="form.cc2"
                          label="Haan pulos a makita"
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
                      <p
                        class="text-h6-edited ma-0 red--text mx-2 questions-font-style font-weight-bold"
                        v-if="form.errors.cc1"
                      >
                        No ammom man ti CC (nasungbatan iti 1-3 idiay CC1), kasano kaadu iti naitulungan kenka iti
                        transakyon mo?
                      </p>
                      <p
                        class="text-h6-edited ma-0 questions-font-style font-weight-bold"
                        v-else
                      >
                        No ammom man ti CC (nasungbatan iti 1-3 idiay CC1), kasano kaadu iti naitulungan kenka iti
                        transakyon mo?
                      </p>
                      <div>
                        <v-checkbox
                          v-model="form.cc3"
                          label="Nakatulong unay"
                          :value="1"
                          dense
                          hide-details
                          :disabled="disableCC"
                          class="mx-2"
                        ></v-checkbox>

                        <v-checkbox
                          v-model="form.cc3"
                          label="Nakatulong lang"
                          :value="2"
                          dense
                          hide-details
                          :disabled="disableCC"
                          class="mx-2"
                        ></v-checkbox>

                        <v-checkbox
                          v-model="form.cc3"
                          label="Awan naitulong na"
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
                    <h5 class="text-h5-edited font-weight-black">Pannakapnek iti naipaay a serbisio</h5>
                    <p>
                      <span class="font-weight-black">Direksyon:</span>
                      Pilyen ti umno a rupa nga mangi-pakita ti rating mo ti kada damag.
                    </p>

                    <!-- partA -->
                    <div class="grey lighten-1 mb-4">
                      <span class="text-h6-edited mx-2">A. Maaramat a Pasilidad</span>
                    </div>

                    <!-- q1 The waiting areas were clean, orderly, and comfortable. -->
                    <div>
                      <p
                        v-if="form.errors[`q1.answer`]"
                        class="ma-0 red--text text-h6-edited questions-font-style"
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
                        v-model="form.q1.answer"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="form.q1.answer == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="form.q1.answer == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="form.q1.answer == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="form.q1.answer == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="form.q1.answer == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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
                        v-if="form.errors[`q2.answer`]"
                        class="ma-0 red--text text-h6-edited questions-font-style"
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
                        v-model="form.q2.answer"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="form.q2.answer == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="form.q2.answer == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="form.q2.answer == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="form.q2.answer == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="form.q2.answer == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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
                        v-if="form.errors[`q3.answer`]"
                        class="ma-0 red--text text-h6-edited questions-font-style"
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
                        v-model="form.q3.answer"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="form.q3.answer == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="form.q3.answer == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="form.q3.answer == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="form.q3.answer == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="form.q3.answer == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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
                        v-if="form.errors[`q4.answer`]"
                        class="ma-0 red--text text-h6-edited questions-font-style"
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
                        v-model="form.q4.answer"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="form.q4.answer == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="form.q4.answer == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="form.q4.answer == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="form.q4.answer == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="form.q4.answer == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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
                        v-if="form.errors[`q5.answer`]"
                        class="ma-0 red--text text-h6-edited questions-font-style"
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
                        v-model="form.q5.answer"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="form.q5.answer == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="form.q5.answer == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="form.q5.answer == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="form.q5.answer == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="form.q5.answer == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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
                        v-if="form.errors[`q6.answer`]"
                        class="ma-0 red--text text-h6-edited questions-font-style"
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
                        v-model="form.q6.answer"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="form.q6.answer == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="form.q6.answer == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="form.q6.answer == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="form.q6.answer == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="form.q6.answer == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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
                        v-if="form.errors[`q7.answer`]"
                        class="ma-0 red--text text-h6-edited questions-font-style"
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
                        v-model="form.q7.answer"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="form.q7.answer == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="form.q7.answer == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="form.q7.answer == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="form.q7.answer == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="form.q7.answer == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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
                      <span class="text-h6-edited mx-2"
                        >B. Pannakilangen dagiti empleado ti ospital kadagiti pasiente, kabagian ken nangkadua
                        kadagitoy</span
                      >
                    </div>

                    <!-- q8 The medical condition, procedures and instructions were discussed clearly.-->
                    <div>
                      <p
                        v-if="form.errors[`q8.answer`]"
                        class="ma-0 red--text text-h6-edited questions-font-style"
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
                        v-model="form.q8.answer"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="form.q8.answer == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="form.q8.answer == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="form.q8.answer == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="form.q8.answer == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="form.q8.answer == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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
                        v-if="form.errors[`q9.answer`]"
                        class="ma-0 red--text text-h6-edited questions-font-style"
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
                        v-model="form.q9.answer"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="form.q9.answer == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="form.q9.answer == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="form.q9.answer == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="form.q9.answer == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="form.q9.answer == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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
                        v-if="form.errors[`q10.answer`]"
                        class="ma-0 red--text text-h6-edited questions-font-style"
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
                        v-model="form.q10.answer"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="form.q10.answer == 5 ? 'white' : 'black'"
                            >mdi-emoticon-excited-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="form.q10.answer == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="form.q10.answer == 3 ? 'white' : 'black'"
                            >mdi-emoticon-neutral-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="form.q10.answer == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="form.q10.answer == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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
                        v-if="form.errors[`q11.answer`]"
                        class="ma-0 red--text text-h6-edited questions-font-style"
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
                        v-model="form.q11.answer"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="form.q11.answer == 5 ? 'white' : 'black'"
                            >mdi-emoticon-excited-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="form.q11.answer == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="form.q11.answer == 3 ? 'white' : 'black'"
                            >mdi-emoticon-neutral-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="form.q11.answer == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="form.q11.answer == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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
                        v-if="form.errors[`q12.answer`]"
                        class="ma-0 red--text text-h6-edited questions-font-style"
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
                        v-model="form.q12.answer"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="form.q12.answer == 5 ? 'white' : 'black'"
                            >mdi-emoticon-excited-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="form.q12.answer == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="form.q12.answer == 3 ? 'white' : 'black'"
                            >mdi-emoticon-neutral-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="form.q12.answer == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="form.q12.answer == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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
                      <span class="text-h6-edited mx-2">
                        C. Pannakapnek kadagiti serbisio a naipaay babaen kadagiti empleyado
                      </span>
                    </div>

                    <!-- staff survey -->
                    <h3 class="my-2 font-weight-black">
                      <!-- q13 I was treated courteously by the staff, and (if asked for help) the staff was helpful. (SQD7) -->
                      <p class="font-weight-black text-h6-edited questions-font-style">
                        13. {{ survey_questions[12].desc }}
                      </p>
                      <p class="text-h6-edited">
                        ***NOTE: Tsekan (✔) wenno isurat ti N/A no saanyo a nakalangen dagiti empleyado.
                      </p>
                    </h3>

                    <!-- doctor -->
                    <div>
                      <p
                        v-if="form.errors[`doctor.rating`]"
                        class="ma-0 red--text text-h6-edited"
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
                        class="ma-0 red--text text-h6-edited"
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
                        class="ma-0 red--text text-h6-edited"
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
                        class="ma-0 red--text text-h6-edited"
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
                        class="ma-0 red--text text-h6-edited"
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
                        class="ma-0 red--text text-h6-edited"
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
                        class="ma-0 red--text text-h6-edited"
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
                        class="ma-0 red--text text-h6-edited"
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
                        class="ma-0 red--text text-h6-edited"
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
                        class="ma-0 red--text text-h6-edited"
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
                        class="ma-0 red--text text-h6-edited"
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
                        class="ma-0 red--text text-h6-edited"
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
                        class="ma-0 red--text text-h6-edited"
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
                        class="ma-0 red--text text-h6-edited"
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

                    <!-- q14 I was treated fairly, or "walang palakasan" during my transaction.(SQD6)-->
                    <div>
                      <p
                        v-if="form.errors[`q14.answer`]"
                        class="ma-0 red--text text-h6-edited questions-font-style"
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
                        v-model="form.q14.answer"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="form.q14.answer == 5 ? 'white' : 'black'"
                            >mdi-emoticon-excited-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="form.q14.answer == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="form.q14.answer == 3 ? 'white' : 'black'"
                            >mdi-emoticon-neutral-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="form.q14.answer == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="form.q14.answer == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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
                        v-if="form.errors[`q15.answer`]"
                        class="ma-0 red--text text-h6-edited questions-font-style"
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
                        v-model="form.q15.answer"
                        dense
                      >
                        <v-btn
                          value="5"
                          active-class="green darken-2"
                        >
                          <v-icon :color="form.q15.answer == 5 ? 'white' : 'black'"
                            >mdi-emoticon-excited-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="4"
                          active-class="light-green accent-4"
                        >
                          <v-icon :color="form.q15.answer == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="3"
                          active-class="yellow"
                        >
                          <v-icon :color="form.q15.answer == 3 ? 'white' : 'black'"
                            >mdi-emoticon-neutral-outline</v-icon
                          >
                        </v-btn>
                        <v-btn
                          value="2"
                          active-class="amber darken-2"
                        >
                          <v-icon :color="form.q15.answer == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                        </v-btn>
                        <v-btn
                          value="1"
                          active-class="red accent-2"
                        >
                          <v-icon :color="form.q15.answer == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
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
                    <!-- HOSPITAL NUMBER-->
                    <label for="hospital_number">
                      <span class="font-weight-black ma-0">
                        HOSPITAL NUMBER TI PASIENTE <span class="red--text">(Masapol)</span>
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

                    <!-- preference-->
                    <div class="mt-6">
                      <label for="preference">
                        <span class="font-weight-black ma-0">
                          <p
                            v-if="form.errors[`preference`]"
                            class="font-weight-black ma-0 red--text"
                          >
                            Intuno maminsan, kayat ko usaren ket:
                          </p>
                          <p
                            v-else
                            class="font-weight-black ma-0"
                          >
                            Intuno maminsan, kayat ko usaren ket:
                          </p>
                        </span>
                      </label>

                      <div class="d-flex flex-row">
                        <v-checkbox
                          v-model="form.preference"
                          label="Computer Assisted Survey"
                          value="Computer Assisted Survey"
                          dense
                          hide-details
                          class="mr-2"
                        ></v-checkbox>

                        <v-checkbox
                          v-model="form.preference"
                          label="Pen and Paper Survey"
                          value="Pen and Paper Survey"
                          dense
                          hide-details
                        ></v-checkbox>
                      </div>
                    </div>

                    <!-- pss rating-->
                    <div class="mt-6">
                      <label for="pss_rating">
                        <span class="font-weight-black ma-0">
                          <p
                            v-if="form.errors[`pss_rating`]"
                            class="font-weight-black ma-0 red--text"
                          >
                            Kasanum i-rate iti Computer assisted satisfaction survey?
                          </p>
                          <p
                            v-else
                            class="font-weight-black ma-0"
                          >
                            Kasanum i-rate iti Computer assisted satisfaction survey?
                          </p>
                        </span>
                      </label>
                      <v-rating
                        id="pss_rating"
                        v-model="form.pss_rating"
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
                        Agyamankami iti inpaayyo nga oras para iti pannakaammo kadagiti suhestionyo para iti
                        pannakapasayaat ti serbisio ti MMMHMC.
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
  data() {
    return {
      selectedTab: 0,
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
        // serviceAvailed: [],
        // otherServiceAvailed: '',
        frequentlyVisit: '',
        age: null,
        sex: '',
        religion: '',
        educationalAttainment: '',
        dateOfVisit: new Date().toISOString().slice(0, -14),
        cc1: null,
        cc2: null,
        cc3: null,
        hospital_number: null,
        preference: null,
        pss_rating: null,
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
    // console.log(this.survey_questions);
  },
  methods: {
    submit() {
      this.form.post(route('iloco.store'), {
        onSuccess: () => {
          this.isLoading = true;
          this.form.reset();
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

.questions-font-style {
  font-family: Arial, Helvetica, sans-serif;
}
</style>
