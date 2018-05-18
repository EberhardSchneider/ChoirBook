
<template>
<div>
   <choirs-list type="member"/>
    <router-link to="choirs/edit/new">
        <v-card id="group-add-link" class="mt-4 pl-4 py-3">
            <v-container d-flex justify-center>
                <div class="d-inline">
                    <v-icon>group_add</v-icon>
                    <span class="ml-4">NEW CHOIR</span>
                </div>
            </v-container>
        </v-card>
    </router-link>
</div>
 
</template>

<style>
#group-add-link:hover {
  background: #eee;
}
#group-add-link i {
  font-size: 2rem;
  color: black;
}
</style>

<script>
import Vue from "vue";

Vue.component("choirs-list", require("./List"));
export default {
  computed: {}
};
</script>