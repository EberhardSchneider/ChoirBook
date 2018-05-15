<template>
  <v-navigation-drawer fixed right app>
    <v-card>
      <v-list two-line subheader class="pt-0">
        <v-subheader inset>My Choirs</v-subheader>
        <v-list-tile v-for="choir in choirsMember" :key="choir.id">
          <v-list-tile-action>
            <v-icon>arrow_right</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            {{ choir.name }}
          </v-list-tile-content>
        </v-list-tile>
      </v-list>
    </v-card>
  </v-navigation-drawer>
</template>

<script>
export default {
  data() {
    return {
      items: [
        { title: "Home", icon: "home", link: "home" },
        { title: "My account", icon: "account_circle", link: "my-account" },
        { title: "Logout", icon: "close", link: "logout" }
      ],
      right: null
    };
  },
  computed: {
    choirsMember() {
      return this.$store.state.choirsMember;
    }
  }
};
</script>