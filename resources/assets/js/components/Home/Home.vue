<template>
    <h1>Home</h1>
</template>

<script>
export default {
  computed: {
    news() {
      return this.$store.news;
    }
  }
};
</script>

