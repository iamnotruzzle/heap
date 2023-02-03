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
                <v-col>
                  <p>Dear <span class="font-weight-bold">Patient/Client,</span></p>
                  <div class="indent">
                    The following questions talk about your overall experience in this hospital. We wish to improve the
                    level of service we deliver our clients because you are important to us. Any comments or suggestions
                    you provide through this survey will be highly-appreciated and will be treated with utmost
                    confidentiality.
                  </div>
                </v-col>
              </v-row>
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
    return {};
  },
};
</script>

<style scoped>
.background {
  height: 100vh;
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
}

.large-screen {
  max-width: 1000px !important;
}
</style>
