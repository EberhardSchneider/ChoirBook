
<template>
    <news-list/>
</template>

<script>
import Vue from "vue";

Vue.component("news-list", require("./NewsList"));
export default {
  computed: {}
};
</script>

