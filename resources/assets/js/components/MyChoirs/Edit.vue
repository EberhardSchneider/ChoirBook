<template>
    <div>
      <h3 v-if="isCreateNew()">Create new Choir</h3>
      <h3 v-else>Edit Choir</h3>
      
      <v-form ref="form" v-model="valid">
        <input type="hidden" :value="csrf">
        <v-text-field
          v-model="name"
          :rules="nameRules"
          label="Name"
          @input="validateForm()"
          required
        ></v-text-field>
        <v-text-field
          v-model="description"
          label="Beschreibung"
        ></v-text-field>
        <v-text-field
          v-model="location"
          label="Ort"
          :rules="locationRules"
          @input="validateForm()"
          required
        ></v-text-field>
          <v-text-field
          v-model="rehearsalTimes"
          label="Probenzeiten"
        ></v-text-field>
         <v-text-field
          v-model="rehearsalLocation"
          label="Probenort(e)"
        ></v-text-field>

        <v-btn
          :disabled="!valid"
          @click="submit">submit</v-btn>
      </v-form>
    </div>
</template>


<script>
import axios from "axios";
export default {
  data() {
    let data = {
      name: "",
      description: "",
      location: "",
      rehearsalTimes: "",
      rehearsalLocation: "",
      create: true,
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
      nameRules: [v => !!v || "Name wird benötigt."],
      locationRules: [v => !!v || "Ort wird benötigt."],
      valid: false
    };
    const choirId = parseInt(this.$route.params.id);
    const choir = this.$store.state.choirsMember[choirId];

    if (choir) {
      data = {
        ...data,
        name: choir.name,
        description: choir.description,
        location: choir.location_id,
        rehearsalTimes: choir.rehearsal_times,
        rehearsalLocation: choir.rehearsal_location
      };
    }

    return data;
  },

  mounted: function() {
    this.validateForm();
  },

  computed: {},

  methods: {
    isCreateNew: function() {
      return this.$route.params.id === "new";
    },

    submit: function() {
      const id = this.$route.params.id;

      let url = "/choirs/create";
      if (id !== "new") {
        url = "/choirs/edit" + "/" + id;
      }
      if (this.$refs.form.validate()) {
        axios
          .post(url, {
            name: this.name,
            description: this.description,
            location: this.location,
            rehearsal_times: this.rehearsalTimes,
            rehearsal_location: this.rehearsalLocation
          })
          .then(response => {
            this.$store.dispatch("getChoirs");
            this.$router.push("/store-success");
          });
      }
    },

    validateForm: function() {
      this.valid = this.$refs.form.validate();
    }
  }
};
</script>
