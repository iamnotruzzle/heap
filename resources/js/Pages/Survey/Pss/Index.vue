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
</style>
