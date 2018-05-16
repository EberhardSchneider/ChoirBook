<template>
    <h3 v-if="isCreateNew()">Create new Choir</h3>
    <h3 v-else>Edit Choir</h3>
    
</template>


<script>
export default {
  methods: {
    isCreateNew: () => {
      console.log(this.$route.params);
      return this.$route.params.id === "new";
    }
  }
};
</script>
