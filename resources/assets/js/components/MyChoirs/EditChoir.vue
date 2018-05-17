<template>
    <div>
      <h3 v-if="isCreateNew()">Create new Choir</h3>
      <h3 v-else>Edit Choir</h3>
      
      <v-form>
        <v-text-field
          v-model="name"
          :rules="nameRules"
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
      </v-form>
    </div>
</template>


<script>
export default {
  methods: {
    isCreateNew: function() {
      return this.$route.params.id === "new";
    }
  }
};
</script>
