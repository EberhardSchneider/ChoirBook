<template>
    <v-app>
    <NavigationDrawer>

    </NavigationDrawer>
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
import NavigationDrawer from "../GUI/Navigation-Drawer.vue";
export default {
  components: {
    NavigationDrawer
  }
};
</script>

