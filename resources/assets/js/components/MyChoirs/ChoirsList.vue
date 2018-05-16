<template>
     <div>
        <v-toolbar color="pink">
            <v-toolbar-title class="white--text">
                MY CHOIRS
            </v-toolbar-title>
            <v-spacer></v-spacer>
            <v-btn icon><v-icon>search</v-icon></v-btn>
        </v-toolbar>
        <v-card>
            <v-container fluid style="min-height: 0;" class="" grid-list-kg>
                <v-layout row wrap>
                    <v-flex xs12 v-for="choir in getChoirs" :key="choir.id" class="mt-3">
                        <v-card color="blue-grey darken-2" class="white--text">
                            <v-card-title primary-title>
                                <div>
                                    <div class="headline">{{ choir.name }}</div>
                                    <div>{{ choir.description }}</div>
                                </div>
                            </v-card-title>
                            <a :href="getEditChoirUrl(choir)">
                                <v-card-actions v-if="isUserAdmin(choir.id)">
                                    <v-spacer></v-spacer>
                                    ADMIN
                                    <v-btn icon>
                                        <v-icon large light color="white">edit</v-icon>
                                    </v-btn>
                                </v-card-actions>
                            </a>
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
const self = this;

export default {
  props: {
    type: String
  },
  computed: {
    getChoirs() {
      return this.$store.state.choirsMember;
    }
  },
  methods: {
    isUserAdmin(choirId) {
      return this.$store.getters.isUserAdmin(choirId);
    },
    getEditChoirUrl: choir => {
      return "/edit-choir/" + choir.id;
    }
  }
};
</script>
