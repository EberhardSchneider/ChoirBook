<template>
    <div>
      <h3 v-if="isCreateNew()">Create new Choir</h3>
      <h3 v-else>Edit Choir</h3>
      
      <v-form v-model="valid" ref="form">
        <input type="hidden" :value="csrf">
        <v-text-field
          v-model="name"
          label="Name"
          required
        ></v-text-field>
        <v-text-field
          v-model="description"
          label="Beschreibung"
        ></v-text-field>
        <v-text-field
          v-model="location"
          label="Ort"
          required
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
    let data = { name: "", description: "", location: "", create: true };
    const choirId = parseInt(this.$route.params.id);
    const choir = this.$store.state.choirsMember.find(c => c.id === choirId);
    console.log(choir);

    if (choir) {
      data = {
        name: choir.name,
        description: choir.description,
        location: choir.location,
        create: false,
        csrf: document
          .querySelector('meta[name="csrf-token"]')
          .getAttribute("content")
      };
    }

    return data;
  },

  methods: {
    isCreateNew: function() {
      return this.$route.params.id === "new";
    },

    submit: function() {
      const id = this.$route.params.id;
      let url = "/choir/create";
      if (id !== "new") {
        url = "/choir/edit" + "/" + id;
      }
      console.log(id);
      if (this.$refs.form.validate) {
        axios.post(url, {
          name: this.name,
          description: this.description,
          location: this.location
        });
      }
    }
  }
};
</script>
