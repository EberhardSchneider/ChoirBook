<template>
  <v-navigation-drawer app permanent>
    <v-toolbar flat>
      <v-list>
        <v-list-tile>
          <v-list-tile-title class="title">
            ChoirBook
          </v-list-tile-title>
        </v-list-tile>
      </v-list>
    </v-toolbar>
    <v-divider></v-divider>
    <v-list dense class="pt-0">
      <router-link v-for="item in items" :key="item.title" :to="item.link">
          <v-list-tile @click="">
                <v-list-tile-action>
                  <v-icon>{{ item.icon }}</v-icon>
                </v-list-tile-action>
                <v-list-tile-content>
                  <v-list-tile-title>{{ item.title }}</v-list-tile-title>
                </v-list-tile-content>
          </v-list-tile>
      </router-link>
    </v-list>
 
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