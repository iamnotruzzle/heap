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
          <!-- large-screen -->
          <v-card
            elevation="24"
            class="corners large-screen"
          >
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
                  <h4 class="text-h5-edited ma-0 pa-0">HOSPITAL EDUCATION AND ADVOCACY PROGRAMS</h4>
                </v-col>
              </v-row>
            </v-card-title>

            <v-card-text>
              <v-row class="font-weight-black mb-4">
                <v-col cols="12">
                  <div class="font-italic text-center">
                    Ang survey na ito ay magsisilbing batayan upang tulungan kaming mapabuti ang aming mga serbisyo
                    upang magkaroon kayo ng mas magandang karanasan sa ospital dahil mahalaga kayo sa amin. Ang anumang
                    mga komento o mungkahi na inyong ibibigay sa pamamagitan ng survey na ito ay lubos na pahahalagahan
                    at ituturing na kumpidensiyal.
                  </div>
                </v-col>
              </v-row>

              <v-form
                ref="form"
                class="no-wrap"
              >
                <div class="grey lighten-1 mb-4">
                  <p class="text-h6-edited mx-2 py-1 font-weight-black">
                    PANUTO: Lagyan ng tsek(<v-icon>mdi-check</v-icon>) ang mga angkop na sagot:
                  </p>
                </div>

                <v-row class="font-weight-black">
                  <!-- Event name -->
                  <v-col cols="12">
                    <label
                      for="event_name"
                      v-if="v$.event_name.$error"
                      class="error-message ma-0 red--text text-h6-edited questions-font-style font-weight-black"
                    >
                      Pangalan ng programa
                    </label>
                    <label
                      for="event_name"
                      v-else
                      class="ma-0 text-h6-edited questions-font-style font-weight-black"
                    >
                      Pangalan ng programa
                    </label>
                    <v-textarea
                      id="event_name"
                      rows="3"
                      v-model="event_name"
                      outlined
                      dense
                    ></v-textarea>
                  </v-col>
                </v-row>

                <v-row class="font-weight-black">
                  <v-col cols="12">
                    <!-- q1 Gaano ka nasiyahan sa pataluntunang iyong dinaluhan sa pangkalahatan?-->
                    <div>
                      <p
                        v-if="v$.q1_answer.$error"
                        class="error-message ma-0 red--text text-h6-edited questions-font-style font-weight-black"
                      >
                        1. {{ survey_questions[0].desc }}
                      </p>
                      <p
                        v-else
                        class="ma-0 text-h6-edited questions-font-style font-weight-black"
                      >
                        1. {{ survey_questions[0].desc }}
                      </p>

                      <v-btn-toggle
                        dense
                        v-model="q1_answer"
                        :class="deviceWidth >= 600 ? 'w-full d-flex justify-space-between px-7' : 'w-full'"
                        class="font-weight-medium"
                      >
                        <div class="d-flex flex-column align-center text-center">
                          <v-btn
                            value="5"
                            active-class="green darken-2"
                          >
                            <v-icon :color="q1_answer == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                          </v-btn>
                          <span v-if="deviceWidth >= 600">Sobrang masaya</span>
                        </div>
                        <div class="d-flex flex-column align-center text-center">
                          <v-btn
                            value="4"
                            active-class="light-green accent-4"
                          >
                            <v-icon :color="q1_answer == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                          </v-btn>
                          <span v-if="deviceWidth >= 600">Masaya</span>
                        </div>
                        <div class="d-flex flex-column align-center text-center">
                          <v-btn
                            value="3"
                            active-class="yellow"
                          >
                            <v-icon :color="q1_answer == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                          </v-btn>
                          <span v-if="deviceWidth >= 600">Medyo masaya</span>
                        </div>
                        <div class="d-flex flex-column align-center text-center">
                          <v-btn
                            value="2"
                            active-class="amber darken-2"
                          >
                            <v-icon :color="q1_answer == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                          </v-btn>
                          <span v-if="deviceWidth >= 600">Medyo hindi</span>
                        </div>
                        <div class="d-flex flex-column align-center text-center">
                          <v-btn
                            value="1"
                            active-class="red accent-2"
                          >
                            <v-icon :color="q1_answer == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
                          </v-btn>
                          <span v-if="deviceWidth >= 600">Hindi masaya</span>
                        </div>
                        <div class="d-flex flex-column align-center">
                          <v-btn
                            value="0"
                            active-class="blue white--text"
                          >
                            N/A
                          </v-btn>
                          <!-- <span>Happy</span> -->
                        </div>
                      </v-btn-toggle>
                    </div>

                    <!-- q2 Nararamdaman mo ba ang iyong natutunan ay makabuluhan at nakatulong sa pang-araw araw mong buhay?-->
                    <div class="my-4">
                      <p
                        v-if="v$.q2_answer.$error"
                        class="error-message ma-0 red--text text-h6-edited questions-font-style font-weight-black"
                      >
                        2. {{ survey_questions[1].desc }}
                      </p>
                      <p
                        v-else
                        class="ma-0 text-h6-edited questions-font-style font-weight-black"
                      >
                        2. {{ survey_questions[1].desc }}
                      </p>

                      <v-btn-toggle
                        dense
                        v-model="q2_answer"
                        :class="deviceWidth >= 600 ? 'w-full d-flex justify-space-between px-4 ' : 'w-full'"
                        class="font-weight-medium"
                      >
                        <div class="d-flex flex-column align-center text-center">
                          <v-btn
                            value="5"
                            active-class="green darken-2"
                          >
                            <v-icon :color="q2_answer == 5 ? 'white' : 'black'">mdi-emoticon-excited-outline</v-icon>
                          </v-btn>
                          <span v-if="deviceWidth >= 600">Sobrang makakatulong </span>
                        </div>
                        <div class="d-flex flex-column align-center text-center">
                          <v-btn
                            value="4"
                            active-class="light-green accent-4"
                          >
                            <v-icon :color="q2_answer == 4 ? 'white' : 'black'">mdi-emoticon-happy-outline</v-icon>
                          </v-btn>
                          <span v-if="deviceWidth >= 600">Makakatulong</span>
                        </div>
                        <div class="d-flex flex-column align-center text-center">
                          <v-btn
                            value="3"
                            active-class="yellow"
                          >
                            <v-icon :color="q2_answer == 3 ? 'white' : 'black'">mdi-emoticon-neutral-outline</v-icon>
                          </v-btn>
                          <span v-if="deviceWidth >= 600">Medyo makakatulong</span>
                        </div>
                        <div class="d-flex flex-column align-center text-center">
                          <v-btn
                            value="2"
                            active-class="amber darken-2"
                          >
                            <v-icon :color="q2_answer == 2 ? 'white' : 'black'">mdi-emoticon-sad-outline</v-icon>
                          </v-btn>
                          <span v-if="deviceWidth >= 600">Medyo hindi</span>
                        </div>
                        <div class="d-flex flex-column align-center text-center">
                          <v-btn
                            value="1"
                            active-class="red accent-2"
                          >
                            <v-icon :color="q2_answer == 1 ? 'white' : 'black'">mdi-emoticon-angry-outline</v-icon>
                          </v-btn>
                          <span v-if="deviceWidth >= 600">Hindi makakatulong</span>
                        </div>
                        <div class="d-flex flex-column align-center text-center">
                          <v-btn
                            value="0"
                            active-class="blue white--text"
                          >
                            N/A
                          </v-btn>
                          <!-- <span>Happy</span> -->
                        </div>
                      </v-btn-toggle>
                    </div>
                  </v-col>

                  <v-col cols="12">
                    <v-divider color="black"></v-divider>
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
                        Salamat sa iyong mahalagang oras at pagkakataon upang mapaglingkuran ka ng mas mahusay.
                      </h5>

                      <span class="font-weight-black mt-2">Health Education and Advocacy Programs</span>
                      <span class="font-weight-black font-italic"
                        >Mariano Marcos Memorial Hospital and Medical Center</span
                      >
                      <span class="font-weight-black">Brgy. 06 San Julian, Batac City, Ilocos Norte</span>
                      <span class="font-weight-black">Trunk line: (077) 600-8000</span>
                      <span class="font-weight-black">Fax line: (077) 792-3133</span>
                      <!-- <span class="font-weight-black text-decoration-underline">
                        <a href="mailto: psc.mmmhmc@gmail.com">psc.mmmhmc@gmail.com</a>
                      </span> -->
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
    auth: Object,
    survey_questions: Array,
  },
  remember: 'form',
  setup() {
    return { v$: useVuelidate() };
  },
  validations() {
    const notWhitespace = (value) => !!value && value.trim().length > 0;

    return {
      q1_answer: { required },
      q2_answer: { required },
      event_name: { required, notWhitespace },
    };
  },
  data() {
    return {
      q1_answer: null,
      q2_answer: null,
      event_name: null,
      snackColor: null,
      snack: null,
      snackText: null,
      deviceWidth: null,

      form: this.$inertia.form({
        event_name: null,
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
      }),
    };
  },
  mounted() {
    this.deviceWidth = window.innerWidth;
  },
  methods: {
    // async submit() {
    async submit() {
      const isFormCorrect = await this.v$.$validate();

      if (isFormCorrect) {
        this.form.post(route('survey.store'), {
          onSuccess: () => {
            this.isLoading = true;
            this.form.reset();
            this.createdMsg();
            this.q1_answer = null;
            this.q2_answer = null;
            this.form.event_name = this.event_name;
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
    event_name(val) {
      this.form.event_name = val;
    },
    q1_answer(val) {
      this.form.q1.answer = val;
    },
    q2_answer(val) {
      this.form.q2.answer = val;
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
