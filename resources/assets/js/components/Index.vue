<template>
    <v-app>
     <navigation-drawer/>
     <navigation-drawer-right/>
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
Vue.component(
  "navigation-drawer-right",
  require("./GUI/Navigation-Drawer-Right")
);

export default {};
</script>

