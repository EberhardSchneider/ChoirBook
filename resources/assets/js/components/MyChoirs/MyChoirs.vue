
<template>
    <choirs-list type="member"/>
</template>

<script>
import Vue from "vue";

Vue.component("choirs-list", require("./ChoirsList"));
export default {
  computed: {}
};
</script>