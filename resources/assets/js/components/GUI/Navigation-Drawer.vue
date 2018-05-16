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
          <v-list-tile class="headline" @click="">
                <v-list-tile-action>
                  <v-icon>{{ item.icon }}</v-icon>
                </v-list-tile-action>
                <v-list-tile-content>
                  <v-list-tile-title>{{ item.title }}</v-list-tile-title>
                </v-list-tile-content>
          </v-list-tile>
      </router-link>
      <a href="/logout">
        <v-list-tile @click="">
          <v-list-tile-action>
            <v-icon>close</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>LOGOUT</v-list-tile-title>
          </v-list-tile-content>
          </v-list-tile>
      </a>
    </v-list>
 
  </v-navigation-drawer>
</template>

<style>
a {
  text-decoration: none;
  color: black;
  font-size: 1.5rem;
}
</style>


<script>
export default {
  data() {
    return {
      items: [
        { title: "HOME", icon: "home", link: "/home" },
        { title: "MY ACCOUNT", icon: "account_circle", link: "/my-account" },
        { title: "MY FRIENDS", icon: "person", link: "/my-friends" },
        { title: "MY CHOIRS", icon: "group", link: "/my-choirs" }
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