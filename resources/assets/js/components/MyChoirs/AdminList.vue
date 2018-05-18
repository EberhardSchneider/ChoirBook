<template>
    <div>
        <h4>Chor Admins:</h4>
        <v-chip v-for="admin in adminNames" :key="admin" label outline>{{admin}}</v-chip>
    </div>
</template>


<script>
export default {
  props: ["id"],
  data() {
    const admins = this.$store.state.admins[this.id];
    const adminNames = Object.values(admins);
    console.log(adminNames);
    return {
      admins,
      adminNames
    };
  }
};
</script>