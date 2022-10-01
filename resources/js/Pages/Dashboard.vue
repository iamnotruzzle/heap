<template>
  <div class="management">
    <Head title="Dashboard" />

    <h1 class="text-subtitle-1-edited grey--text">Dashboard</h1>

    <v-container class="my-5">
      <div>Dashboard</div>
    </v-container>
  </div>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout';
import { Head } from '@inertiajs/inertia-vue';

export default {
  layout: (h, page) => h(Layout, [page]),

  // Using the shorthand
  layout: AppLayout,
  components: {
    AppLayout,
    Head,
  },
  data() {
    return {
      dialog: false,
      valid: true,
      url: null,
      firstname: '',
      lastname: '',
      nameRules: [(v) => !!v || 'Name is required'],
      email: '',
      emailRules: [(v) => !!v || 'E-mail is required', (v) => /.+@.+/.test(v) || 'E-mail must be valid'],
      gender: '',
      genderRules: [(v) => !!v || 'Gender is required'],
      role: 0,
      roles: [
        { id: 1, title: 'Admin' },
        { id: 2, title: 'User' },
      ],
      roleRules: [(v) => !!v || 'Role is required'],
      menu: false,
      dateOfBirth: '',
      dateOfBirthRules: [(v) => !!v || 'Date of birth is required'],
      search: '',
      headers: [
        {
          text: 'Name',
          align: 'start',
          sortable: false,
          value: 'name',
        },
        { text: 'Role', value: 'role' },
        { text: 'Email', value: 'email' },
        { text: 'Actions', value: 'actions', filterable: false, sortable: false },
      ],
      team: [
        { name: 'The Net Ninja', role: 'Web developer', email: 'nn@gmail.com' },
        { name: 'Ryu', role: 'Graphic designer', email: 'ryu@gmail.com' },
        { name: 'Chun Li', role: 'Web developer', email: 'chun@gmail.com' },
        { name: 'Gouken', role: 'Social media maverick', email: 'goukenn@email.com' },
        { name: 'Yoshi', role: 'Sales guru', email: 'yoshi@email' },
        { name: 'Max', role: 'Sales guru', email: 'Max@email' },
      ],
    };
  },
  methods: {
    cancel() {
      this.dialog = false;
      // reset form
      this.$refs.form.reset();
      // reset validation
      this.$refs.form.resetValidation();
    },
    editItem(item) {
      this.dialog = true;
    },
  },
};
</script>

<style scoped>
.vrow {
  border-style: solid;
  border-color: red;
}
.vcol {
  border-style: solid;
  border-color: purple;
}
.v-select .v-select__selections > input {
  display: none !important;
}
</style>
