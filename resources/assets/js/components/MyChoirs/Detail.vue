<template>
    <div>
       <v-toolbar color="pink">
            <v-toolbar-title class="white--text">
                CHOR
            </v-toolbar-title>
        </v-toolbar>
        <v-card>
            <v-container fluid style="min-height: 0;" class="" grid-list-kg>
                <v-layout row wrap>
                    <v-flex xs12 class="mt-3">
                        <v-card color="blue-grey darken-2" class="white--text">
                            <v-card-title primary-title>
                                <div>
                                    <div class="headline">{{ choir.name }}</div>
                                    <div class="description">{{ choir.description }}</div>
                                    <div class="location">{{ choir.location_id }}</div>
                                    <admin-list :id="choir.id"/>
                                </div>
                                
                            </v-card-title>
                                
                        </v-card>
                    </v-flex>
                </v-layout>
            </v-container>
        </v-card>
    </div>
</template>

<style>
</style>

<script>
import Vue from "vue";
Vue.component("admin-list", require("./AdminList"));
export default {
  data() {
    return {
      choir: this.$store.state.choirsMember[this.$route.params.id]
    };
  }
};
</script>
