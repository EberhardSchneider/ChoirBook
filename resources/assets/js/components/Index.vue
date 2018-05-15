<template>
    <v-app>
     <navigation-drawer/>
    <v-toolbar app></v-toolbar>
    <v-content>
        <v-container fluid>
            <router-view></router-view>
        </v-container>
    </v-content>
    <v-footer app></v-footer>
    </v-app>
</template>

<script>
Vue.component("navigation-drawer", require("./GUI/Navigation-Drawer"));
export default {
  data() {
    return {
      items: [
        { title: "Home", icon: "home", link: "/home" },
        { title: "My account", icon: "account_circle", link: "my-account" },
        { title: "Logout", icon: "close", link: "/logout" }
      ]
    };
  }
};
</script>

